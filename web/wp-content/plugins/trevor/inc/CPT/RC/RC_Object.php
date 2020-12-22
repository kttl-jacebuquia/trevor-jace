<?php namespace TrevorWP\CPT\RC;

use TrevorWP\Main;
use TrevorWP\Theme\Util\Is;
use TrevorWP\Util\Log;
use TrevorWP\CPT;

/**
 * Abstract Resource Center Object
 */
abstract class RC_Object {
	/* Flags */
	const IS_PUBLIC = true;

	/* Post Types */
	const POST_TYPE_PREFIX = Main::POST_TYPE_PREFIX . 'rc_';

	/* Taxonomies */
	const TAXONOMY_PREFIX = self::POST_TYPE_PREFIX;
	const TAXONOMY_CATEGORY = self::TAXONOMY_PREFIX . '_category';
	const TAXONOMY_TAG = self::TAXONOMY_PREFIX . '_tag';
	const TAXONOMY_SEARCH_KEY = self::TAXONOMY_PREFIX . '_search_key';

	/* Query Vars */
	const QV_BASE = Main::QV_PREFIX . 'rc';
	const QV_RESOURCES_LP = self::QV_BASE . '__lp';
	const QV_RESOURCES_NON_BLOG = self::QV_BASE . '__non_blog';

	/* Permalinks */
	const PERMALINK_BASE = 'resources';
	const PERMALINK_BASE_TAX_CATEGORY = self::PERMALINK_BASE . '/category';
	const PERMALINK_BASE_TAX_TAG = self::PERMALINK_BASE . '/tag';

	/* Collections */
	const _ALL_ = [
		Post::class,
		Guide::class,
		Article::class,
		External::class,
		Glossary::class,
	];

	/**
	 * @var string[]
	 */
	static $ALL_POST_TYPES = [];

	/**
	 * @var string[]
	 */
	static $PUBLIC_POST_TYPES = [];

	/**
	 * @see construct()
	 */
	abstract static function register_post_type(): void;

	/**
	 * @see \TrevorWP\Util\Hooks::init()
	 */
	final public static function construct(): void {
		# Init All
		/** @var RC_Object $cls */
		foreach ( self::_ALL_ as $cls ) {
			# Fill post types
			self::$ALL_POST_TYPES[] = $cls::POST_TYPE;

			if ( $cls::IS_PUBLIC ) {
				self::$PUBLIC_POST_TYPES[] = $cls::POST_TYPE;
			}
		}

		# Hooks
		add_action( 'init', [ self::class, 'init' ], 10, 0 );
		add_action( 'admin_menu', [ self::class, 'admin_menu' ], PHP_INT_MAX, 0 );
		add_filter( 'query_vars', [ self::class, 'query_vars' ], PHP_INT_MAX, 1 );
		add_filter( 'post_type_link', [ self::class, 'post_type_link' ], PHP_INT_MAX >> 1, 2 );
		add_filter( 'parent_file', [ self::class, 'parent_file' ], 10, 1 );
		add_action( 'parse_request', [ self::class, 'parse_request' ], 10, 1 );
		add_action( 'parse_query', [ self::class, 'parse_query' ], 10, 1 );
	}

	/**
	 * Fires after WordPress has finished loading but before any headers are sent.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/init/
	 *
	 * @see construct()
	 */
	public static function init(): void {
		# Post Types
		foreach ( self::_ALL_ as $cls ) {
			/** @var RC_Object $cls */
			$cls::register_post_type();
		}

		# Taxonomies
		## Category
		register_taxonomy( self::TAXONOMY_CATEGORY, self::$PUBLIC_POST_TYPES, [
			'public'            => true,
			'hierarchical'      => false,
			'show_in_rest'      => true,
			'show_tagcloud'     => false,
			'show_admin_column' => true,
			'rewrite'           => [
				'slug'         => self::PERMALINK_BASE_TAX_CATEGORY,
				'hierarchical' => false,
				'with_front'   => false,
			],
			'labels'            => get_taxonomy_labels( get_taxonomy( 'category' ) ),
		] );

		## Tag
		register_taxonomy( self::TAXONOMY_TAG, self::$PUBLIC_POST_TYPES, [
			'public'            => true,
			'hierarchical'      => false,
			'show_in_rest'      => true,
			'show_tagcloud'     => false,
			'show_admin_column' => true,
			'rewrite'           => [
				'slug'         => self::PERMALINK_BASE_TAX_TAG,
				'hierarchical' => false,
				'with_front'   => false,
			]
		] );

		## Search Key
		$name_sk = 'Search Key';
		register_taxonomy( self::TAXONOMY_SEARCH_KEY, self::$PUBLIC_POST_TYPES, [
			'labels'            => [
				'name'          => "{$name_sk}s",
				'singular_name' => $name_sk,
				'search_items'  => "{$name_sk}s",
				'popular_items' => "Popular {$name_sk}",
				'all_items'     => "All {$name_sk}",
				'edit_item'     => "Edit {$name_sk}",
				'view_item'     => "View {$name_sk}",
				'update_item'   => "Update {$name_sk}",
				'add_new_item'  => "Add New {$name_sk}",
				'new_item_name' => "New {$name_sk}",
			],
			'public'            => false,
			'hierarchical'      => false,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => false,
			'show_admin_column' => false,
			'rewrite'           => false
		] );

		# Rewrites
		## Main Page
		add_rewrite_rule(
			self::PERMALINK_BASE . "/?$",
			"index.php?" . http_build_query( array_merge(
				[
					self::QV_BASE         => 1,
					self::QV_RESOURCES_LP => 1
				],
				array_fill_keys( RC_Object::$PUBLIC_POST_TYPES, 1 ),
			) ),
			'top'
		);

		## Taxonomy
		add_filter( self::TAXONOMY_TAG . '_rewrite_rules', [ self::class, 'rewrite_rules_tag' ], PHP_INT_MAX, 0 );
		add_filter(
			self::TAXONOMY_CATEGORY . '_rewrite_rules',
			[ self::class, 'rewrite_rules_category' ],
			PHP_INT_MAX, 0
		);

		## Catch All
		add_rewrite_rule( self::PERMALINK_BASE . "/(\d+)-([^/]+)/?$", "index.php?" . http_build_query( [
				self::QV_BASE               => 1,
				self::QV_RESOURCES_NON_BLOG => 1
			] ) . "&p=\$matches[1]", 'top' );
	}

	/**
	 * Filters the permalink for a post of a custom post type.
	 *
	 * @param string $post_link The post's permalink.
	 * @param \WP_Post $post The post in question.
	 *
	 * @return string
	 *
	 * @link https://developer.wordpress.org/reference/hooks/post_type_link/
	 * @see construct()
	 */
	public static function post_type_link( string $post_link, \WP_Post $post ): string {
		switch ( $post->post_type ) {
			case CPT\RC\Article::POST_TYPE:
			case CPT\RC\Guide::POST_TYPE:
			case CPT\RC\External::POST_TYPE:
				return trailingslashit( home_url( static::PERMALINK_BASE . "/{$post->ID}-{$post->post_name}" ) );
			case CPT\Post::POST_TYPE:
			case CPT\RC\Post::POST_TYPE:
				if ( is_admin() || ( defined( 'DOING_AJAX' ) && DOING_AJAX /* TODO: We need a qVar flag to force it */ ) ) {
					$is_support = $post->post_type === CPT\RC\Post::POST_TYPE;
				} else {
					$is_support = Is::support();
				}

				$base = $is_support ? CPT\RC\Post::PERMALINK_BASE : CPT\Post::PERMALINK_BASE;

				return trailingslashit( home_url( "{$base}/{$post->ID}-{$post->post_name}" ) );
			default:
				return $post_link;
		}
	}

	/**
	 * Filters rewrite rules used for individual permastructs.
	 *
	 * @return string[]
	 *
	 * @link https://developer.wordpress.org/reference/hooks/permastructname_rewrite_rules/
	 * @see construct()
	 */
	public static function rewrite_rules_tag(): array {
		global $wp_rewrite;

		return [
			self::PERMALINK_BASE_TAX_TAG . "/([^/]+)/{$wp_rewrite->pagination_base}/?([0-9]{1,})/?$" => 'index.php?' . self::TAXONOMY_TAG . '=$matches[1]&paged=$matches[2]',
			self::PERMALINK_BASE_TAX_TAG . '/([^/]+)/?$'                                             => 'index.php?' . self::TAXONOMY_TAG . '=$matches[1]'
		];
	}

	/**
	 * Filters rewrite rules used for individual permastructs.
	 *
	 * @return string[]
	 *
	 * @link https://developer.wordpress.org/reference/hooks/permastructname_rewrite_rules/
	 * @see construct()
	 */
	public static function rewrite_rules_category(): array {
		global $wp_rewrite;

		return [
			self::PERMALINK_BASE_TAX_CATEGORY . "/([^/]+)/{$wp_rewrite->pagination_base}/?([0-9]{1,})/?$" => 'index.php?' . self::TAXONOMY_CATEGORY . '=$matches[1]&paged=$matches[2]',
			self::PERMALINK_BASE_TAX_CATEGORY . '/([^/]+)/?$'                                             => 'index.php?' . self::TAXONOMY_CATEGORY . '=$matches[1]'
		];
	}

	/**
	 * Fires before the administration menu loads in the admin.
	 *
	 * Modifies the admin menu tree to combine all post types into one main menu item.
	 *
	 * @see construct()
	 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
	 */
	public static function admin_menu(): void {
		global $menu, $submenu;

		$indexes  = [];
		$slug_map = [];
		$pt_map   = [];
		$sm_lists = [];

		# Produce slugs
		foreach ( self::$ALL_POST_TYPES as $post_type ) {
			$slug                 = "edit.php?" . http_build_query( compact( 'post_type' ) );
			$slug_map[ $slug ]    = $post_type;
			$pt_map[ $post_type ] = $slug;
		}

		# Find indexes
		foreach ( $menu as $idx => list( , , $slug ) ) {
			if ( array_key_exists( $slug, $slug_map ) ) {
				$post_type             = $slug_map[ $slug ];
				$indexes[ $post_type ] = $idx;
			}
		}

		# Count check
		if ( ( $idx_count = count( $indexes ) ) !== count( $slug_map ) ) {
			Log::alert( 'Some menu items could not find.', compact( 'indexes', 'slug_map' ) );

			return;
		}

		foreach ( $slug_map as $slug => $post_type ) {
			# Check the index
			if ( empty( $indexes[ $post_type ] ) ) {
				Log::alert( 'Could not find the menu index.', compact( 'slug', 'post_type' ) );

				return;
			}

			# Check the submenu
			if ( empty( $submenu[ $slug ] ) ) {
				Log::alert( 'Could not find the submenu.', compact( 'slug', 'post_type' ) );

				return;
			}
		}

		# Determine the lead post type
		$lead_pt         = reset( self::$ALL_POST_TYPES );
		$lead_idx        = $indexes[ $lead_pt ];
		$lead_slug       = $pt_map[ $lead_pt ];
		$lead_sm         = &$submenu[ $lead_slug ];
		$lead_sm_idx_map = array_keys( $lead_sm );

		# Main menu title
		$menu[ $lead_idx ][0] = 'Resource Center';

		# Make room on the lead submenu
		$lead_sm_rest = [];
		foreach ( array_slice( $lead_sm_idx_map, 2 ) as $idx => $old_idx ) {
			$lead_sm_rest[ $old_idx + $idx_count + 5 ] = $lead_sm[ $old_idx ];
		}

		foreach ( array_slice( self::$ALL_POST_TYPES, 1 ) as $pt ) {
			# Remove menu items except the lead
			unset( $menu[ $indexes[ $pt ] ] );

			# Collect the submenu list
			$slug = $pt_map[ $pt ];
			list( $sm_list ) = array_slice( $submenu[ $slug ], 0, 1 );
			$sm_lists[ $pt ] = $sm_list;

			# Remove submenu
			unset( $submenu[ $slug ] );
		}

		# Combine all
		$lead_sm_list = $lead_sm[ $lead_sm_idx_map[0] ];
		$lead_sm      = [ $lead_sm_idx_map[0] => $lead_sm_list ];

		for ( $i = 1; $i < $idx_count; $i ++ ) {
			$pt                                    = self::$ALL_POST_TYPES[ $i ];
			$lead_sm[ $lead_sm_idx_map[ $i ] + 1 ] = $sm_lists[ $pt ];
		}

		$lead_sm = $lead_sm + $lead_sm_rest;
	}

	/**
	 * Filters rewrite rules used for individual permastructs.
	 *
	 * @param array $vars
	 *
	 * @return array
	 * @see construct()
	 *
	 * @link https://developer.wordpress.org/reference/hooks/query_vars/
	 */
	public static function query_vars( array $vars ): array {
		return array_merge( $vars, [ self::QV_RESOURCES_LP, self::QV_RESOURCES_NON_BLOG ] );
	}

	/**
	 * Filters the parent file of an admin menu sub-menu item.
	 *
	 * @param string $parent_file
	 *
	 * @return string
	 * @see construct()
	 *
	 * @link https://developer.wordpress.org/reference/hooks/parent_file/
	 */
	public static function parent_file( string $parent_file ): string {
		# Fix glossary main menu
		if ( $parent_file == ( "edit.php?post_type=" . Glossary::POST_TYPE ) ||
		     $parent_file == ( "edit.php?post_type=" . External::POST_TYPE )
		) {
			$parent_file = "edit.php?post_type=" . reset( self::$ALL_POST_TYPES );
		}

		return $parent_file;
	}

	/**
	 * Fires once all query variables for the current request have been parsed.
	 *
	 * @param \WP $wp
	 * @param \WP_REWRITE
	 *
	 * @link https://developer.wordpress.org/reference/hooks/parse_request/
	 */
	public static function parse_request( \WP $wp ): void {
		# LP Post Types
		if ( $is_rc_lp = ! empty( $wp->query_vars[ self::QV_RESOURCES_LP ] ) ) {
			$wp->query_vars['post_type'] = self::$PUBLIC_POST_TYPES;
		}

		# Catch All
		if (
			( $is_rc_non_blog = ! empty( $wp->query_vars[ self::QV_RESOURCES_NON_BLOG ] ) ) &&
			( $p = intval( $wp->query_vars['p'] ?? 0 ) ) > 0 &&
			( $post = get_post( $p ) ) &&
			in_array( $post_type = get_post_type( $post ), self::$PUBLIC_POST_TYPES ) &&
			$post_type != Post::POST_TYPE // non blog
		) {
			$wp->query_vars['post_type']        = $post->post_type;
			$wp->query_vars[ $post->post_type ] = $post->post_name;
		}
	}

	/**
	 * Fires after the main query vars have been parsed.
	 *
	 * @param \WP_Query $query
	 *
	 * @link https://developer.wordpress.org/reference/hooks/parse_query/
	 */
	public static function parse_query( \WP_Query $query ): void {
		# Fix Resources LP
		$is_rc_lp = ! empty( $query->get( self::QV_RESOURCES_LP ) );
		if ( $is_rc_lp ) {
			if ( ! empty( $query->get( 's' ) ) ) {
				$query->is_search = true;
			}

			$query->is_single            = false;
			$query->is_singular          = false;
			$query->is_posts_page        = true;
			$query->is_post_type_archive = true;
			$query->set( 'name', null );
		}
	}
}