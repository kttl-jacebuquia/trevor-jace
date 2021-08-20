<?php namespace TrevorWP\CPT\Get_Involved;

/**
 * Corporate Partner
 */
class Partner extends Get_Involved_Object {
	/* Flags */
	const IS_PUBLIC = false;

	/* Post Types */
	const POST_TYPE = self::POST_TYPE_PREFIX . 'partner';

	/** @inheritDoc */
	static function register_post_type(): void {
		# Post Type
		register_post_type(
			self::POST_TYPE,
			array(
				'labels'              => array(
					'name'          => 'Corporate Partners',
					'singular_name' => 'Corporate Partner',
					'add_new'       => 'Add New Corporate Partner',
				),
				'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_in_rest'        => true,
				'show_ui'             => true,
				'supports'            => array(
					'title',
					'thumbnail',
				),
				'has_archive'         => false,
				'rewrite'             => false,
				'menu_icon'           => 'dashicons-layout',
			)
		);
	}
}
