<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.remedyone.com
 * @since      1.0.0
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/public
 * @author     Simon Hunter <simon@remedyone.com>
 */

use GeoIp2\Database\Reader;

class Trevor_Chat_Button_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Country codes for US territories
	 *
	 */
	private $us_country_codes = ['US', 'AS', 'GU', 'MP', 'PR', 'UM', 'VI'];

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trevor_Chat_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trevor_Chat_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trevor-chat-button-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trevor_Chat_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trevor_Chat_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trevor-chat-button-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'tcb_ajax', [
			'interval' => get_option( 'tcb_refresh_interval' ),
			'ajax_url' => admin_url( 'admin-ajax.php' ),
		]);
	}

	/**
	 * Register the shortcodes for the public-facing side of the site.
	 */
	public function register_shortcodes() {
		add_shortcode( 'trevor-chat-button', array( $this, 'trevor_chat_button_wrap_function') );
		add_shortcode( 'trevor-chat-button-link', array( $this, 'trevor_chat_button_link_function') );
		add_shortcode( 'trevor-wait-time', array( $this, 'trevor_wait_time_message_function') );
		add_shortcode( 'trevorspace-online-users', array( $this, 'trevorspace_online_users_function' ) );
	}

	/**
	 *  Inserts the #tcb div to be filled with the chat button by JS
	 */
	public function trevor_chat_button_wrap_function() {
		return '<div class="tcb"></div>';
	}

	/**
	 * Returns an opening and closing anchor tag that will open the chat window.
	 * Opens a javascript alert if the user is outside the US.
	 */
	public function trevor_chat_button_link_function( $attrs, $content ) {
		if ( $this->is_disabled() ) {
			$output = '<a onclick="alert(\''. addslashes(get_option( 'tcb_away_message' )) .'\');">';
		} elseif ( !$this->is_in_us() ) {
			$output = '<a onclick="alert(\'' . addslashes(get_option( 'tcb_outside_us_message' )) . '\');">';
		} elseif ( $this->is_24_hrs() || $this->is_within_timerange() ) {
			if ( get_option( 'tcb_in_uat') ) {
				$output = '<a href="https://webchat-load-balancer-uat.thetrevorproject.workers.dev/">';
			} else {
				$output = '<a href="https://www.thetrevorproject.org/webchat">';
			}
		} else {
			$output = '<a onclick="alert(\''. addslashes(get_option( 'tcb_away_message' )) .'\');">';
		}

		return $output . $content;
	}

	/**
	 * Displays the Long Wait Time message if a long wait time is reported.
	 */
	public function trevor_wait_time_message_function() {
		if ( $this->is_long_wait_time() ) {
			$msg = '<div class="long-wait-time">';
			$msg .=	'<p class="long-wait-time-msg">' . get_option( 'tcb_wait_time_message' );

			$count = $this->get_trevorspace_user_count();
			if ($count >= 5) {
				$msg .= '<br /><span class="trevorspace-user-count">There are currently ' . $count .' LGBTQ youth online at TrevorSpace. Sign up and ask questions!</span>';
			}
			$msg .= '</p>';
			$msg .= '</div>';
			return $msg;
		}
	}

	/**
	 * Returns the count of online users on Trevorspace at the moment
	 */
	public function trevorspace_online_users_function() {

		$online_users_count = $this->get_trevorspace_user_count();

		if ($online_users_count >= 5) {
			$msg = '<div class="trevorspace-online-users-count">';
			$msg .= 'There are currently ' . $online_users_count .' LGBTQ youth online at TrevorSpace. Sign up and ask questions!';
			$msg .= '</div>';
			return $msg;
		}
	}

	/**
	 * Gets the trevorspace online user count
	 */
	private function get_trevorspace_user_count() {
		if (!get_option('tcb_enable_trevorspace_user_count')) {
			return 0;
		}
		// append a query string to bust the cache
		$response = wp_remote_get('https://www.trevorspace.org/active-count/?' . time());

		$online_users_count = 0;

		if ( !is_wp_error( $response ) ) {
			$online_users_count = (int) $response['body'];
			return $online_users_count;
		}
	}


	/**
	 * Runs the function over ajax - used when the button shortcode is displayed
	 */
	public function tcb_check_time() {
		echo $this->trevor_chat_button_function();
		die();
	}

	/**
	 * Returns the correct anchor tag - used when the trevor_chat_button_link_function is used
	 */
	public function tcb_get_anchor() {
		$string = base64_encode(random_bytes(10));

		$output = [];

		if ( $this->is_disabled() ) {
			$output['status'] = 'disabled';
			$output['message'] = get_option( 'tcb_away_message' );
		} elseif ( !$this->is_in_us() ) {
			$output['status'] = 'outside-us';
			$output['message'] = get_option( 'tcb_outside_us_message' );
		} elseif ( $this->is_in_us() && ( $this->is_24_hrs() || $this->is_within_timerange() ) ) {
			$output['status'] = 'ok';
			if ( get_option('tcb_in_uat') ) {
				$output['href'] = 'https://webchat-load-balancer-uat.thetrevorproject.workers.dev/';
				$output['onclick'] = "window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=500,height=900');return false;";
			} else {
				$output['href'] = 'https://www.thetrevorproject.org/webchat';
				$output['onclick'] = "window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=900');return false;";
			}
		} else {
			$output['status'] = 'other';
			$output['message'] = get_option( 'tcb_away_message' );
		}

		echo json_encode($output);
		die();
	}

	/**
	 * The main function, mostly copied from the original one.
	 */
	public function trevor_chat_button_function() {
		$string = base64_encode(random_bytes(10));
		$button = '<div id="chatPortal" class="text-center">';

		if ( $this->is_disabled() ) {
			$button .= '<h5>'. get_option( 'tcb_away_message' ) .'</h5>';
		} elseif ( !$this->is_in_us() ) {
			$button .= '<h5>' . get_option( 'tcb_outside_us_message' ) . '</h5>';
		} elseif ( $this->is_24_hrs() || $this->is_within_timerange() ) {
			$button .= '<a class="button white" href="https://www.thetrevorproject.org/webchat" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=900\');return false;">Connect With a TrevorChat Counselor</a>';
		} else {
			$button .= '<h5>'. get_option( 'tcb_away_message' ) .'</h5>';
		}
		$button .= '</div>';

		return $button;
	}

	/**
	 * Checks if the global time override setting is enabled.
	 * If this is set to true, the form will always show the away message.
	 */
	private function is_disabled() {
		return get_option('tcb_disable_button');
	}

	/**
	 * Checks if the chat button should be available 24 hrs, bypassing the time check function
	 */
	private function is_24_hrs() {
		return get_option('tcb_24_hrs');
	}

	/**
	 * Check if the current time is within the timerange from settings
	 */
	private function is_within_timerange() {

		$start_time = get_option('tcb_start_time');
		$end_time = get_option('tcb_end_time');

		$current_time = new DateTime;
		$current_time = $current_time->format('H:i');

		return ($this->isBetween($start_time, $end_time, $current_time));
	}

	/**
	 * Checks if a time is between two times, even in case the time spans over midnight.
	 */
	private function isBetween($from, $till, $input) {
		$f = DateTime::createFromFormat('!H:i', $from);
		$t = DateTime::createFromFormat('!H:i', $till);
		$i = DateTime::createFromFormat('!H:i', $input);
		if ($f > $t) $t->modify('+1 day');
		return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
	}

	/**
	 * Check if the current user is within the US.
	 */
	private function is_in_us() {
		if ( isset($_SERVER['HTTP_CF_IPCOUNTRY']) ) {
			return $this->is_in_us_cloudflare();
		} elseif ( get_option( 'tcb_use_ipstack' ) ) {
			return $this->is_in_us_ipstack();
		} else {
			return $this->is_in_us_geoip();
		}
	}

	/**
	 * Check if the user is within the US according to Cloudflare
	 */
	private function is_in_us_cloudflare() {

		$remote_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
		$country_code = $_SERVER['HTTP_CF_IPCOUNTRY'];

		$in_us = in_array($country_code, $this->us_country_codes);
		$this->log_ip_in_db($remote_ip, $country_code, 'cloudflare country code header', ($in_us ? 1 : 0));
		return $in_us;
	}

	/**
	 * Check if the current user is within the US via a local copy of the maxmind GeoIP database
	 */
	private function is_in_us_geoip() {

		$method = 'geoip2';

		if ( isset($_SERVER['HTTP_CF_CONNECTING_IP']) ) {
			$remote_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
			$method = 'geoip2 with cloudflare provided IP';
		} else {
			$remote_ip = $_SERVER['REMOTE_ADDR'];
		}

		$reader = new GeoIp2\Database\Reader(plugin_dir_path( __DIR__ ) . 'database/geolite/GeoLite2-Country.mmdb');
		try {
			$record = $reader->country($remote_ip);
		} catch (GeoIp2\Exception\AddressNotFoundException $e) {
			if (get_option('tcb_debug_front_end')) {
				echo $e;
			}
			$this->log_ip_in_db($remote_ip, $method, $e, 1);
			// Fall back to allowing visitors if there are errors rather than denying them.
			return true;
		}

		$is_in_us = in_array($record->country->isoCode, $this->us_country_codes);
		$this->log_ip_in_db($remote_ip, $record->country->isoCode, $method, ($is_in_us) ? 1 : 0);

		if (get_option('tcb_debug_front_end')) {
			echo 'Your IP: ' . $remote_ip;
			echo '<br />Your country (geoip): ' . $record->country->name;
			echo '<br />is in us?: ' . $is_in_us;
		}

		return $is_in_us;
	}

	/**
	 * Check if the current user is within the US via ipstack API
	 */
	private function is_in_us_ipstack() {

		if ( !get_option( 'tcb_only_us' ) ) {
			return true;

		} else {
			$remote_ip = $_SERVER['REMOTE_ADDR'];
			$ipstack_access_key = get_option('tcb_ipstack_access_key');
			$ipstack = wp_remote_get( 'http://api.ipstack.com/' . $remote_ip . '?access_key=' . $ipstack_access_key);

			// Returns true on error, this way if the geolocation service is not available
			// the chat button will fall back to being available.
			if ( is_wp_error( $ipstack ) ) {
				$this->log_ip_in_db($remote_ip, 'ipstack - error', $ipstack->get_error_message(), 0);
				return true;

			} else {
				$ipstack = json_decode(wp_remote_retrieve_body( $ipstack ));

				$this->log_ip_in_db($remote_ip, $ipstack->country_code, 'ipstack', ($ipstack->country_code === 'US') ? 1 : 0);
				return ($ipstack->country_code === 'US' );
			}
		}
	}
	/**
	 * Log IP result in DB
	 */
	private function log_ip_in_db($ip, $country, $notes, $was_accepted) {
		global $wpdb;
		$wpdb->insert($wpdb->prefix . 'tcb_ip_log', [
				'ip_address' => $ip,
				'country' => $country,
				'notes' => $notes,
				'was_accepted' => $was_accepted,
		]);
		return;
	}
	/**
	 * Check if there is a long wait time by checking against the API.
	 */
	private function is_long_wait_time() {
		if (get_option('tcb_enable_wait_time')) {
			$url = get_option( 'tcb_wait_time_url' );
			if ($url) {
				$response = wp_remote_get($url);

				if (is_array($response)) {
					$body = json_decode($response['body']);
						return $body->isLongWait;
				}
			}
		}
		return false;
	}

	/**
	 * Remove IP Logs older than 1 month from the IP Logs table
	 */
	public function tcb_cron_exec() {
		global $wpdb;
		$table_name = $wpdb->prefix . "tcb_ip_log";
		$delete = $wpdb->query(
			"DELETE FROM $table_name
			WHERE created_at < (NOW() - INTERVAL 1 MONTH)"
		);
	}

}
