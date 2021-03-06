<?php

namespace TrevorWP\Theme\Ajax;

/**
 * ADP API
 */
class ADP {


	public static function construct() {
		/**
		 * Ajax for ADP
		 */
		add_action( 'wp_ajax_nopriv_adp', array( self::class, 'adp' ) );
		add_action( 'wp_ajax_adp', array( self::class, 'adp' ) );
	}

	/**
	 * Retrives cached jobs data from the transient
	 */
	public static function adp() {
		$page                 = isset( $_GET['page'] ) ? $_GET['page'] : 1;
		$count                = isset( $_GET['count'] ) ? $_GET['count'] : 0;
		$filter['location']   = isset( $_GET['location'] ) ? $_GET['location'] : '';
		$filter['department'] = isset( $_GET['department'] ) ? $_GET['department'] : '';

		if ( empty( self::get_jobs() ) ) {
			self::adp_refresh();
		}

		$job_requisitions = self::get_jobs();

		$data = self::paginate_job_requisitions( $job_requisitions, $filter, $page, $count );

		wp_die(
			json_encode(
				array(
					'status' => 'SUCCESS',
					'data'   => $data,
				)
			),
			200
		);
	}

	/**
	 * Clears jobs data from transient to fetch for a new one
	 */
	public static function adp_refresh() {
		$api_settings = array(
			'grant_type'    => 'client_credentials',
			'client_id'     => '3fa636f4-4704-4ef2-9f79-a49973718b33',
			'client_secret' => 'a535b1ba-b16e-4916-a65f-6da3d8a5fc94',
			'pem_file'      => dirname( __FILE__ ) . '/Keys/thetrevorproject_auth.pem',
			'key_file'      => dirname( __FILE__ ) . '/Keys/thetrevorproject_auth.key',
		);

		# get token
		$response = self::get_token( $api_settings );
		$response = json_decode( $response, true );

		if ( ! empty( $response['error'] ) ) {
			wp_die( json_encode( array( 'status' => $response['error'] ) ), 400 );
		}

		$access_token = $response['access_token'];

		# get job requisitions
		# ADP always show maximum of 20 items, so we need to make paginated requests
		$page = 1;
		$jobs = array();

		# NOTE: "break" should be present inside the loop, to avoid infinite loop.
		while ( true ) {
			$response = self::get_job_requisitions( $access_token, $api_settings, $page );
			$response = json_decode( $response, true );

			if ( empty( $response ) ) {
				// No more results for the page
				break;
			}

			if ( ! empty( $response['error'] ) ) {
				wp_die( json_encode( array( 'status' => $response['error'] ) ), 400 );
				break;
			}

			$jobs = array_merge( $jobs, $response['jobRequisitions'] );

			// Increment page request
			$page++;
		}

		$jobs = self::filter_active_jobs( $jobs );

		set_transient( 'trevor_adp_job_requisitions', $jobs, 12 * HOUR_IN_SECONDS );
	}

	/**
	 * Get jobs data from cache
	 */
	public static function get_jobs(): array {
		$jobs = get_transient( 'trevor_adp_job_requisitions' );

		return ! empty( $jobs ) ? $jobs : array();
	}

	/**
	 * Get token
	 *
	 * @param array $settings
	 *
	 * @return string $response
	 */
	public static function get_token( $settings ) {
		/*
			ADP: https://developers.adp.com/
			Create Token api reference: https://accounts.adp.com/auth/oauth/v2/token
			Postman:
			POST: https://accounts.adp.com/auth/oauth/v2/token
		*/
		$url = 'https://accounts.adp.com/auth/oauth/v2/token';

		$headers = array(
			'Content-Type: application/x-www-form-urlencoded',
		);

		$payload = array(
			'grant_type'    => $settings['grant_type'],
			'client_id'     => $settings['client_id'],
			'client_secret' => $settings['client_secret'],
		);

		return self::curl( $url, $headers, http_build_query( $payload ), $settings, 'POST', true );
	}

	/**
	 * Get Job Requisitions
	 *
	 * @param string $access_token
	 * @param array $settings
	 *
	 * @return string $response
	 */
	public static function get_job_requisitions( $access_token, $settings, $page = 1 ) {
		/*
			ADP: https://developers.adp.com/
			Get Job Requisitions api reference: https://accounts.adp.com/staffing/v1/job-requisitions
			Postman:
			POST: https://accounts.adp.com/staffing/v1/job-requisitions
		*/
		$url = 'https://accounts.adp.com/staffing/v1/job-requisitions';

		$headers = array(
			'Connection: keep-alive',
			"Authorization: Bearer $access_token",
			'sm_transactionid: reques12',
		);

		$payload = array(
			'$skip'   => ( $page - 1 ) * 20,
			'$filter' => 'requisitionStatusCode/codeValue eq ON',
		);

		// Append request parameters
		$url .= '?' . http_build_query( $payload );

		return self::curl( $url, $headers, $payload, $settings, 'GET', true );
	}

	/**
	 * Paginate Job Requisitions
	 *
	 * @param array $data
	 * @param array $filter
	 * @param int $page
	 * @param int $count
	 *
	 * @return array $data
	 */
	public static function paginate_job_requisitions( $job_requisitions, $filter, $page = 1, $count = 0 ) {
		if ( empty( $job_requisitions ) ) {
			return array();
		}

		$departments = self::get_departments( $job_requisitions );
		$locations   = self::get_locations( $job_requisitions );

		if ( in_array( $filter['location'], $locations, true ) || in_array( $filter['department'], $departments, true ) ) {
			$job_requisitions = self::filter_job_requisitions( $job_requisitions, $filter );
		}

		$total = count( $job_requisitions );

		if ( 0 === $count ) {
			$count = $total;
		}

		# calculate total pages
		$total_pages = ceil( $total / $count );

		if ( $page <= 0 ) {
			# get 1 page when page <= 0
			$page = max( $page, 1 );
		}

		$offset = ( $page - 1 ) * $count;

		$offset = ( $offset > 0 ) ? $offset : 0;

		$jobs = array_slice( $job_requisitions, $offset, $count );

		usort(
			$jobs,
			function( $a, $b ) {
				$t1 = strtotime( $a['requisitionStatusCode']['effectiveDate'] );
				$t2 = strtotime( $b['requisitionStatusCode']['effectiveDate'] );
				return $t2 - $t1;
			}
		);

		$data = array(
			'departments'  => $departments,
			'locations'    => $locations,
			'total_jobs'   => $total,
			'total_pages'  => $total_pages,
			'current_page' => $page,
			'count'        => $count,
			'jobs'         => $jobs,
		);

		return $data;
	}

	/**
	 * Filter active Job Requisitions
	 *
	 * @param array $data
	 * @param array $filter
	 *
	 * @return array $data
	 */
	public static function filter_active_jobs( $jobs ) {
		if ( empty( $jobs ) ) {
			return array();
		}

		$data = array();

		$current_date = current_datetime();
		$current_date = wp_date( 'Y-m-d H:i:s', $current_date->date, $current_date->timezone );

		// Filter jobs to include only positions with posting channel ID "19000101_000001"
		// Referrence: https://workforcenow.adp.com/mascsr/default/mdf/recruitment/recruitment.html?cid=0a93e956-1064-47e3-9771-6768b425b346&ccId=19000101_000001&type=MP&lang=en_US
		foreach ( $jobs as $job ) {
			foreach ( $job['postingInstructions'] as $post ) {
				if ( '19000101_000001' === $post['postingChannel']['channelID'] && $current_date <= $post['expireDate'] ) {
					if ( $post['nameCode']['codeValue'] !== $job['job']['jobTitle'] ) {
						$job['job']['jobTitle'] = $post['nameCode']['codeValue'];
					}

					$job['requisitionStatusCode']['effectiveDate'] = gmdate( 'Y-m-d H:i:s', strtotime( $post['postDate'] ) );

					$data[] = $job;
				}
			}
		}

		return $data;
	}

	/**
	 * Filter Job Requisitions
	 *
	 * @param array $data
	 * @param array $filter
	 *
	 * @return array $data
	 */
	public static function filter_job_requisitions( $job_requisitions, $filter ) {
		if ( ! empty( $filter['location'] ) ) {
			$job_requisitions = array_filter(
				$job_requisitions,
				function( $d ) use ( $filter ) {
					return array_filter(
						$d['requisitionLocations'],
						function( $v ) use ( $filter ) {
							return ( $v['nameCode']['longName'] === $filter['location'] || $v['nameCode']['shortName'] === $filter['location'] || $v['address']['countryCode'] === $filter['location'] );
						}
					);
				}
			);
		}

		if ( ! empty( $filter['department'] ) ) {
			$job_requisitions = array_filter(
				$job_requisitions,
				function( $d ) use ( $filter ) {
					return array_filter(
						$d['organizationalUnits'],
						function( $v ) use ( $filter ) {
							return ( $v['nameCode']['longName'] === $filter['department'] || $v['nameCode']['shortName'] === $filter['department'] );
						}
					);
				}
			);
		}

		return $job_requisitions;
	}

	/**
	 * Get Departments
	 *
	 * @param array $job_requisitions
	 *
	 * @return array $departments
	 */
	public static function get_departments( $job_requisitions ) {
		$departments = array();
		$units       = array_column( $job_requisitions, 'organizationalUnits' );

		foreach ( $units as $unit ) {
			foreach ( $unit as $v ) {
				if ( 'Department' === $v['typeCode']['codeValue'] ) {
					$departments[] = ! empty( $v['nameCode']['longName'] ) ? $v['nameCode']['longName'] : $v['nameCode']['shortName'];
				}
			}
		}

		$departments = array_values( array_unique( $departments ) );
		sort( $departments );

		return $departments;
	}

	/**
	 * Get Locations
	 *
	 * @param array $job_requisitions
	 *
	 * @return array $locations
	 */
	public static function get_locations( $job_requisitions ) {
		$locations     = array();
		$req_locations = array_column( $job_requisitions, 'requisitionLocations' );

		foreach ( $req_locations as $loc ) {
			foreach ( $loc as $v ) {
				$locations[] = ! empty( $v['nameCode']['longName'] ) ? $v['nameCode']['longName'] : ( ! empty( $v['nameCode']['shortName'] ) ? $v['nameCode']['shortName'] : $v['address']['countryCode'] );
			}
		}

		$locations = array_values( array_unique( $locations ) );
		sort( $locations );

		return $locations;
	}

	/**
	 * Perform a curl
	 *
	 * @param string $url
	 * @param array $headers
	 * @param array $payload
	 * @param array $settings
	 * @param boolean $is_ssl
	 *
	 * @return string $response
	 */
	public static function curl( $url, $headers, $payload, $settings, $method = 'POST', $is_ssl = false ) {
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
		if ( $is_ssl ) {
			curl_setopt( $ch, CURLOPT_SSLKEY, $settings['key_file'] );
			curl_setopt( $ch, CURLOPT_SSLCERT, $settings['pem_file'] );
		}
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		if ( 'POST' === $method ) {
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
			curl_setopt( $ch, CURLOPT_POST, 1 );
		}
		$response = curl_exec( $ch );
		curl_close( $ch );

		return $response;
	}
}
