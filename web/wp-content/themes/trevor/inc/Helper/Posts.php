<?php namespace TrevorWP\Theme\Helper;

use TrevorWP\Util\Tools;
use WP_Post;

/**
 * Post Collection Helper
 */
class Posts {
	/**
	 * Finds related posts to given post.
	 *
	 * @param WP_Post|null $post
	 * @param int $num Max number of items to return.
	 * @param array $options
	 *  $force_thumbnail
	 *  $force_main_category
	 *
	 * @return WP_Post[] Related posts.
	 */
	public static function get_recirculation( WP_Post $post = null, int $num = 2, array $options = array() ): array {
		$post       = get_post( $post );
		$post_type  = Tools::get_public_post_types();
		$meta_query = array();
		$tax_query  = array(
			'relation' => 'OR',
		);

		# Tax Query
		foreach (
			array(
				Tools::get_post_category_tax( $post ),
				Tools::get_post_tag_tax( $post ),
				Tools::get_post_search_tax( $post ),
			) as $tax
		) {
			if ( empty( $tax ) ) {
				continue;
			}

			$tax_query[] = array(
				'taxonomy' => $tax,
				'terms'    => wp_get_post_terms( $post->ID, $tax, array( 'fields' => 'ids' ) ),
				'operator' => 'IN',
			);
		}

		# Force Thumbnail
		if ( ! empty( $options['force_thumbnail'] ) ) {
			$meta_query[] = array(
				'key'     => '_thumbnail_id',
				'compare' => 'EXISTS',
			);
		}

		# Force Main Category
		if ( ! empty( $options['force_main_category'] ) && ! empty( $main_cat_id = \TrevorWP\Meta\Post::get_main_category_id( $post->ID ) ) ) {
			$tax_query = array(
				'relation' => 'AND',
				array(
					'taxonomy' => Tools::get_post_category_tax( $post ),
					'terms'    => array( $main_cat_id ),
					'operator' => 'IN',
				),
				$tax_query,
			);
		}

		return get_posts(
			array(
				'post_type'           => $post_type,
				'post_status'         => 'publish',
				'post__not_in'        => array( $post->ID ), // Exclude itself,
				'orderby'             => 'rand',
				'numberposts'         => $num,
				'ignore_sticky_posts' => true,
				'tax_query'           => $tax_query,
				'meta_query'          => $meta_query,
			)
		);
	}

	/**
	 * Returns the posts from a list with optional fallback query in case $found_posts < $num.
	 *
	 * @param array $ids
	 * @param int $num
	 * @param false $fallback
	 * @param array $default_filter
	 *
	 * @return array
	 */
	public static function get_from_list( array $ids, int $num, $fallback = false, array $default_filter = array() ): array {
		if ( ! is_array( $fallback ) ) {
			$fallback = false;
		}

		# Filter
		$def_args = array_merge(
			array(
				'post_type'           => Tools::get_public_post_types(),
				'post_status'         => 'publish',
				'no_found_rows'       => true, // No pagination
				'ignore_sticky_posts' => true,
			),
			$default_filter
		);

		# Ordering
		if ( empty( $def_args['orderby'] ) ) {
			$def_args['orderby'] = 'post__in';

			if ( empty( $def_args['order'] ) ) {
				$def_args['order'] = 'ASC';
			}
		}

		# Query
		$posts = empty( $ids )
			? array()
			: get_posts(
				array_merge(
					$def_args,
					array(
						'post__in'       => $ids,
						'posts_per_page' => $num,
					)
				)
			);

		# Fallback
		if ( ( $count = count( $posts ) ) < $num && is_array( $fallback ) ) {
			$posts        = array_merge(
				$posts,
				get_posts(
					$aaaa = array_merge(
						$def_args,
						array(
							'post__not_in'   => wp_list_pluck( $posts, 'ID' ),
							'posts_per_page' => $num - $count,
							'orderby'        => 'rand', // TODO: Rand from the Top 100 popular
						),
						$fallback
					)
				)
			);
		}

		return $posts;
	}

	/**
	 * @param array $ids
	 * @param false $fallback
	 * @param array $default_filter
	 *
	 * @return WP_Post|null
	 */
	public static function get_one_from_list( array $ids, $fallback = false, array $default_filter = array() ): ?\WP_Post {
		$results = self::get_from_list( $ids, 1, $fallback, $default_filter );

		return empty( $results ) ? null : reset( $results );
	}
}
