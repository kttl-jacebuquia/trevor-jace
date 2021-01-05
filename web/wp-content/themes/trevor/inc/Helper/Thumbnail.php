<?php namespace TrevorWP\Theme\Helper;


use TrevorWP\Util\Log;

class Thumbnail {
	/* Screens */
	const SCREEN_SM = '';
	const SCREEN_MD = 'md';
	const SCREEN_LG = 'lg';
	const SCREEN_XL = 'xl';

	/* Types */
	const TYPE_VERTICAL = 'vertical';
	const TYPE_HORIZONTAL = 'horizontal';
	const TYPE_SQUARE = 'square';

	/* Sizes */
	const SIZE_MD = 'medium';
	const SIZE_LG = 'large';

	/* Screen Order */
	const _SCREEN_ORDER = [
		self::SCREEN_SM => 0,
		self::SCREEN_MD => 1,
		self::SCREEN_LG => 2,
		self::SCREEN_XL => 3,
	];

	/* Defaults */
	const _DEFAULT_SCREEN = self::SCREEN_SM;
	const _DEFAULT_TYPE = self::TYPE_VERTICAL;
	const _DEFAULT_SIZE = self::SIZE_LG;
	const _DEFAULT_VARIANT = [ self::_DEFAULT_SCREEN, self::_DEFAULT_TYPE, self::_DEFAULT_SIZE, [] ];

	/**
	 * @param int|\WP_Post $post
	 * @param array ...$variants
	 *
	 * @return string|null
	 */
	public static function post( $post = null, ...$variants ): ?string {
		$post = get_post( $post );

		if ( ! $post ) {
			return null;
		}

		return implode( "\n", wp_list_pluck( self::post_image( $post->ID, ...$variants ), 0 ) );
	}

	/**
	 * @param int $post_id
	 * @param mixed ...$variants
	 *
	 * @return array|null
	 */
	public static function post_image( int $post_id, ...$variants ): ?array {
		$found_images = [];

		# Check variants
		if ( empty( $variants ) ) {
			$variants = [ self::_DEFAULT_VARIANT ];
		}

		# Order variants
		usort( $variants, [ self::class, '_order_variant' ] );

		# Group by screen
		$screen_groups = array_fill_keys( array_keys( self::_SCREEN_ORDER ), [] );
		foreach ( $variants as $variant ) {
			list( $screen ) = $variant;
			$screen_groups[ $screen ][] = $variant;
		}

		# Make sure the default screen is defined
		if ( empty( $screen_groups[ self::SCREEN_SM ] ) ) {
			$screen_groups[ self::SCREEN_SM ] = [ self::_DEFAULT_VARIANT ];
			Log::warning( 'Small screen variant should be defined.', compact( 'variants', 'img_id' ) );
		}

		# Find the appropriate images
		foreach ( $screen_groups as $screen => $variants ) {
			foreach ( $variants as $idx => $variant ) {
				list( , $type ) = $variant;

				$img_id = call_user_func( [ \TrevorWP\Meta\Post::class, "get_{$type}_img_id" ], $post_id );
				if ( empty( $img_id ) ) {
					continue;
				}

				if ( wp_attachment_is_image( $img_id ) ) {
					$found_images[] = [ $img_id, $variant ];
					continue 2;
				}
			}
		}

		$img_count = count( $found_images );
		$out       = [];
		foreach ( $found_images as $idx => $img_data ) {
			list( $img_id, $variant ) = $img_data;
			list( $screen, , $size, $attr ) = $variant;
			$prev_count = count( $out );
			$prev       = $prev_count > 0 ? $out[ $prev_count - 1 ] : null;
			$next       = $idx + 1 < $img_count ? $found_images[ $idx + 1 ] : null;

			# Class
			if ( empty( $attr['class'] ) ) {
				$attr['class'] = [];
			} else if ( ! is_array( $attr['class'] ) ) {
				$attr['class'] = explode( ' ', $attr['class'] );
			}
			$class = &$attr['class'];

			if ( $next ) {
				list( , list( $next_screen ) ) = $next;
				$class[] = $next_screen . ( empty( $next_screen ) ? '' : ':' ) . 'hidden';
			}

			if ( $prev ) {
				$class[] = 'hidden'; // tailwindcss md:hidden lg:hidden md:block lg:block
				$class[] = $screen . ( empty( $screen ) ? '' : ':' ) . 'block';
			}

			$class = implode( ' ', $class );
			if ( ! empty( $html = wp_get_attachment_image( $img_id, $size, false, $attr ) ) ) {
				$out[] = [ $html, $variant ];
			}
		}

		return $out;
	}

	/**
	 * @param $a
	 * @param $b
	 *
	 * @return int
	 */
	protected static function _order_variant( $a, $b ): int {
		list( $screen_a ) = $a;
		list( $screen_b ) = $b;

		$idx_a = self::_SCREEN_ORDER[ $screen_a ];
		$idx_b = self::_SCREEN_ORDER[ $screen_b ];

		return $idx_a <=> $idx_b;
	}

	/**
	 * Generates a image variant.
	 *
	 * @param string $screen
	 * @param string $type
	 * @param string $size
	 * @param string[] $attr
	 *
	 * @return array [$screen, $type, $size, $attr]
	 */
	public static function variant( $screen = self::_DEFAULT_SCREEN, $type = self::_DEFAULT_TYPE, $size = self::_DEFAULT_SIZE, array $attr = [] ): array {
		return [ $screen, $type, $size, $attr ];
	}


	// TODO: FIND a way for variant <-> multiple image variations, it is important for the RC home heros
}
