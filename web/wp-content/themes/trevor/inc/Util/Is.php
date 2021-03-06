<?php namespace TrevorWP\Theme\Util;

use TrevorWP\CPT;
use TrevorWP\Theme\ACF\Field_Group\Page_Header;
use TrevorWP\Theme\ACF\Options_Page\Header;

/**
 * Collection of boolean returning functions.
 */
class Is {
	/**
	 * Tells whether the current page whether related with the resources center or not.
	 *
	 * @return bool
	 */
	public static function rc(): bool {
		global $wp_query;

		# Resource Center LP
		if ( $wp_query->get( CPT\RC\Guide::QV_RESOURCES_LP ) ) {
			return true;
		}

		# Blog
		if ( is_singular( CPT\RC\Post::POST_TYPE ) ) {
			return $wp_query->get( CPT\RC\Post::QV_BLOG );
		}

		if ( is_singular( CPT\Post::POST_TYPE ) && $wp_query->get( CPT\RC\Post::QV_BLOG ) ) {
			return true;
		}

		# Any RC Post
		if ( is_singular( CPT\RC\RC_Object::$PUBLIC_POST_TYPES ) ) {
			return true;
		}

		# RC Taxonomies
		if ( is_tax( CPT\RC\RC_Object::TAXONOMY_CATEGORY ) || is_tax( CPT\RC\RC_Object::TAXONOMY_TAG ) ) {
			return true;
		}

		if ( self::is_in_menu() ) {
			return true;
		}

		if ( self::is_in_find_support() ) {
			return true;
		}

		if ( self::is_hero_type_support() ) {
			return true;
		}

		// TODO: Check search
		// TODO: Use static cache

		return ! empty( $wp_query->get( CPT\RC\RC_Object::QV_BASE ) );
	}

	/**
	 * Check if the specific hero type is support
	 *
	 * @return bool
	 */
	public static function is_hero_type_support(): bool {
		$hero_type = Page_Header::get_hero_type();

		if ( 'breathing_exercise' === $hero_type ) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the current page / tax is in find support link
	 *
	 * @return bool
	 */
	public static function is_in_find_support(): bool {
		$current_page = get_queried_object();

		$header = Header::get_header();

		if ( ! empty( $current_page->post_name ) && strpos( $header['find_support_link']['url'], $current_page->post_name ) ) {
			return true;
		} elseif ( ! empty( $current_page->slug ) && strpos( $header['find_support_link']['url'], $current_page->slug ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the current page / tax is in menu
	 *
	 * @return bool
	 */
	public static function is_in_menu(): bool {
		$menu_locations = get_nav_menu_locations();

		if ( ! empty( $menu_locations['header-support'] ) ) {
			$find_support_items = wp_get_nav_menu_items( $menu_locations['header-support'] );
			$current_page       = get_queried_object();
			$current_slug       = '';

			foreach ( $find_support_items as $item ) {
				$menu_url = rtrim( $item->url, '/' ) . '/';

				if ( ! empty( $current_page->slug ) ) {
					$current_slug = self::add_forward_slash( $current_page->slug );
				} elseif ( ! empty( $current_page->post_name ) ) {
					$current_slug = self::add_forward_slash( $current_page->post_name );
				}

				if ( ! empty( $current_slug ) && false !== strpos( $menu_url, $current_slug ) ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Add left/right forward slash in string
	 */
	public static function add_forward_slash( $string ): string {
		$string = '/' . ltrim( $string, '/' );

		$string = rtrim( $string, '/' ) . '/';

		return $string;
	}

	/**
	 * @return bool
	 */
	public static function trevorspace(): bool {
		global $wp_query;

		return ! empty( $wp_query->get( CPT\RC\RC_Object::QV_TREVORSPACE ) );
	}

	/**
	 * @return bool
	 */
	public static function get_help(): bool {
		global $wp_query;

		return ! empty( $wp_query->get( CPT\RC\RC_Object::QV_GET_HELP ) );
	}

	/**
	 * return bool
	 */
	public static function block_editor() {
		return function_exists( 'get_current_screen' ) && get_current_screen()->is_block_editor;
	}
}
