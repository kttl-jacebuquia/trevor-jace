<?php namespace TrevorWP\Meta;

use TrevorWP\CPT\RC\RC_Object;
use TrevorWP\Main;
use TrevorWP\Theme;
use TrevorWP\Util\Tools;

/**
 * Post Meta
 */
class Post {
	# Popularity
	const KEY_VIEW_COUNT_SHORT = Main::META_KEY_PREFIX . 'uniq_views_short';
	const KEY_VIEW_COUNT_LONG = Main::META_KEY_PREFIX . 'uniq_views_long';
	const KEY_POPULARITY_RANK = Main::META_KEY_PREFIX . 'popularity_rank';
	const KEY_AVG_VISITS = Main::META_KEY_PREFIX . 'avg_visits';

	# Images
	const KEY_IMAGE_SQUARE = Main::META_KEY_PREFIX . 'image_square';
	const KEY_IMAGE_HORIZONTAL = Main::META_KEY_PREFIX . 'image_horizontal';

	# Header
	const KEY_HEADER_TYPE = Main::META_KEY_PREFIX . 'header_type';
	const KEY_HEADER_BG_CLR = Main::META_KEY_PREFIX . 'header_bg_clr';
	const KEY_HEADER_TXT_CLR = Main::META_KEY_PREFIX . 'header_txt_clr';
	const KEY_HEADER_SNOW_SHARE = Main::META_KEY_PREFIX . 'show_share';

	# Misc
	const KEY_LENGTH_IND = Main::META_KEY_PREFIX . 'length_ind';

	# RC External
	const KEY_RC_EXTERNAL_URL = Main::META_KEY_PREFIX . 'rc_ext_url';

	/**
	 * Registers all registered post meta.
	 */
	public static function register_all(): void {
		$default = [
			'show_in_rest'  => true,
			'single'        => true,
			'type'          => 'string',
			'auth_callback' => [ self::class, 'auth_check_editors' ]
		];

		// Posts
		foreach (
			[
				self::KEY_HEADER_TYPE       => [
					'sanitize_callback' => [ self::class, 'sanitize_post_header_types' ],
					'default'           => Theme\Helper\Header::DEFAULT_TYPE,
					'object_subtype'
				],
				self::KEY_HEADER_BG_CLR     => [ 'default' => 'indigo' ],
				self::KEY_HEADER_TXT_CLR    => [ 'default' => 'white' ],
				self::KEY_HEADER_SNOW_SHARE => [ 'type' => 'boolean', 'default' => true ],
				self::KEY_LENGTH_IND        => [ 'default' => 'MEDIUM' ],
				self::KEY_IMAGE_SQUARE      => [],
				self::KEY_IMAGE_HORIZONTAL  => [],
			] as $meta_key => $args
		) {
			foreach ( Tools::get_public_post_types() as $post_type ) {
				register_post_meta( $post_type, $meta_key, array_merge( $default, $args ) );
			}
		}
	}

	/**
	 * A cb to check whether user can edit posts.
	 *
	 * @return bool
	 */
	public static function auth_check_editors(): bool {
		return current_user_can( 'edit_posts' );
	}

	/**
	 * Sanitizes post header type value.
	 *
	 * @param string $val
	 *
	 * @return string
	 */
	public static function sanitize_post_header_types( string $val ): string {
		return in_array( $val, Theme\Helper\Header::ALL_TYPES )
			? $val
			: Theme\Helper\Header::DEFAULT_TYPE;
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return array
	 */
	public static function get_editor_config( \WP_Post $post ): array {
		$ppt    = Tools::get_public_post_types();
		$config = [
			'meta_keys' => []
		];

		# Collect Meta Keys
		foreach ( ( new \ReflectionClass( self::class ) )->getConstants() as $constant => $key ) {
			if ( strpos( $constant, 'KEY_' ) === 0 ) {
				$config['metaKeys'][ $constant ] = $key;
			}
		}

		if ( in_array( $post->post_type, $ppt ) ) {
			# Header types
			$config[ self::KEY_HEADER_TYPE ] = [
				'types' => ( function () {
					$all = array_fill_keys( Theme\Helper\Header::ALL_TYPES, [] );
					foreach ( $all as $header_type => &$data ) {
						$config       = Theme\Helper\Header::get_config_of( $header_type );
						$data['name'] = $config['name'] ?? 'N/A';
					}

					return $all;
				} )()
			];
		}

		return $config;
	}
}
