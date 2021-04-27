<?php namespace TrevorWP\Theme\ACF;

class ACF {
	const ALL_GROUPS = [
		// Common Fields
		Field_Group\DOM_Attr::class,
		Field_Group\Button::class,
		Field_Group\Button_Group::class,
		Field_Group\Carousel_Data::class,
		// Options
		Options_Page\Page_Circulation_Options::class,
		// - Post Type Options
		Options_Page\Post_Type\Financial_Report::class,
		Options_Page\Post_Type\Research::class,
		// Misc
		Field_Group\Page_Circulation_Card::class,
		// Blocks
		Field_Group\Page_Section::class,
		Field_Group\Testimonials_Carousel::class,
		Field_Group\Page_Circulation::class,
		Field_Group\Info_Boxes::class,
		Field_Group\Post_Grid::class,
		Field_Group\Post_Carousel::class,
		Field_Group\Info_Card::class,
		Field_Group\Info_Card_Grid::class,
		Field_Group\Address::class,
		// Page Specific
		Field_Group\Page_Header::class,
		Field_Group\Team_Member::class,
		Field_Group\Partners::class,
		Field_Group\Post_Images::class,
	];

	public static function construct() {
		add_action( 'acf/init', [ self::class, 'acf_init' ], 10, 0 );
	}

	/**
	 * @link https://www.advancedcustomfields.com/resources/acf-init/
	 */
	public static function acf_init(): void {
		# Groups
		/** @var Field_Group\A_Field_Group $group */
		foreach ( static::ALL_GROUPS as $group ) {
			$group::register();

			if ( $group::is_block() ) {
				# Block
				$group::register_block();

				# Block Patterns
				if ( $group::has_patterns() ) {
					$group::register_patterns();
				}
			} elseif ( $group::is_options_page() ) {
				# Options Page
				/* acf_init is at init:5,
				   we should wait until init:10 to get post types to be registered */
				add_action( 'init', [ $group, 'register_page' ], 10, 0 );
			}
		}
	}
}