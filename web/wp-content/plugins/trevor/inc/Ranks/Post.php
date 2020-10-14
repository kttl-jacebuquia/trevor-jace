<?php namespace TrevorWP\Ranks;

use TrevorWP\Meta;
use TrevorWP\Util\Log;

class Post {
	/**
	 * Updates post rankings.
	 *
	 * @param string $post_type
	 * @param string $post_status
	 *
	 * @return int
	 */
	public static function update_post_type_ranks( string $post_type = 'post', string $post_status = 'publish' ) {
		global $wpdb;

		$results = $wpdb->get_results( $wpdb->prepare( "
		SELECT p.ID id
		FROM {$wpdb->posts} p
		LEFT JOIN {$wpdb->postmeta} pm_short ON p.ID = pm_short.post_id and pm_short.meta_key = %s
		LEFT JOIN {$wpdb->postmeta} pm_long ON p.ID = pm_long.post_id and pm_long.meta_key = %s
		WHERE
			p.post_type = %s AND
			p.post_status = %s
		ORDER BY
			(IFNULL(pm_long.meta_value, 0)/4 + IFNULL(pm_short.meta_value, 0)) DESC,
			p.post_date DESC
		", Meta\Post::KEY_VIEW_COUNT_SHORT, Meta\Post::KEY_VIEW_COUNT_LONG, $post_type, $post_status ), ARRAY_N );

		foreach ( $results as $rank => list( $post_id ) ) {
			update_post_meta( $post_id, Meta\Post::KEY_POPULARITY_RANK, $rank + 1 );
		}

		# Clear other rank meta values if there are any
		$id_list = call_user_func_array( 'array_merge', array_values( $results ) );
		if ( ! empty( $id_list ) ) {
			$id_list       = implode( ',', array_map( 'intval', $id_list ) );
			$deleted_count = $wpdb->query( $wpdb->prepare( "
			DELETE pm
			FROM {$wpdb->postmeta} pm
			LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
			WHERE
				pm.meta_key = %s AND
				p.ID NOT IN ({$id_list}) AND
				p.post_type = %s
			", Meta\Post::KEY_POPULARITY_RANK, $post_type ) );

			if ( $deleted_count ) {
				Log::info( "Unused {$deleted_count} popularity meta values are deleted." );
			}
		}

		return count( $results );
	}
}
