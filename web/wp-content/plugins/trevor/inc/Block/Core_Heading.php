<?php namespace TrevorWP\Block;

use WP_Post;

/**
 * core/heading Block Controller
 */
class Core_Heading implements Post_Save_Handler {
	const BLOCK_NAME = 'core/heading';

	/** @inheritDoc */
	public static function save_post( array $block, WP_Post $post, array &$state ): void {
		// TODO: Implement save_post() method.
		error_log( 123 );
	}

	/** @inheritDoc */
	public static function save_post_finalize( WP_Post $post, array &$state ): void {
		// TODO: Implement save_post_finalize() method.
		error_log( 345 );
	}
}
