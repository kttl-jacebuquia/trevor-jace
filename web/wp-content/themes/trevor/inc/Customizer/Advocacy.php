<?php namespace TrevorWP\Theme\Customizer;

/**
 * Trevor Advocacy Pages
 */
class Advocacy extends Abstract_Customizer {
	/* Panels */
	const PANEL_ID = self::ID_PREFIX . 'resources_center';

	/* Sections */
	/* * Home */
	const SECTION_HOME_PREFIX = self::PANEL_ID . '_home';
	const SECTION_HOME_GENERAL = self::SECTION_HOME_PREFIX . '_general';
	const SECTION_HOME_FEATURED_POSTS = self::SECTION_HOME_PREFIX . '_featured_posts';

	/* Settings */
	/* * Home */
	const SETTING_HOME_PREFIX = self::SECTION_HOME_PREFIX . '_';
	const SETTING_HOME_HERO_IMG = self::SETTING_HOME_PREFIX . 'hero_img';
	const SETTING_HOME_HERO_TITLE = self::SETTING_HOME_PREFIX . 'hero_title';
	const SETTING_HOME_HERO_DESC = self::SETTING_HOME_PREFIX . 'hero_desc';
	const SETTING_HOME_HERO_CTA = self::SETTING_HOME_PREFIX . 'hero_cta';
	const SETTING_HOME_CAROUSEL_TITLE = self::SETTING_HOME_PREFIX . 'carousel_title';
	const SETTING_HOME_CAROUSEL_NUM = self::SETTING_HOME_PREFIX . 'carousel_num';
	const SETTING_HOME_CAROUSEL_CAROUSEL_DATA_PREFIX = self::SETTING_HOME_PREFIX . 'carousel_carousel_data_prefix';
	const SETTING_HOME_OUR_WORK_TITLE = self::SETTING_HOME_PREFIX . 'our_work_title';
	const SETTING_HOME_OUR_WORK_DESC = self::SETTING_HOME_PREFIX . 'our_work_desc';
	const SETTING_HOME_QUOTE_IMG = self::SETTING_HOME_PREFIX . 'quote_img';
	const SETTING_HOME_QUOTE_CONTENT = self::SETTING_HOME_PREFIX . 'quote_content';
	const SETTING_HOME_QUOTE_CITE = self::SETTING_HOME_PREFIX . 'quote_cite';
	const SETTING_HOME_BILL_TITLE = self::SETTING_HOME_PREFIX . 'bill_title';
	const SETTING_HOME_BILL_DESC = self::SETTING_HOME_PREFIX . 'bill_desc';
	const SETTING_HOME_LETTER_TITLE = self::SETTING_HOME_PREFIX . 'letter_title';
	const SETTING_HOME_LETTER_DESC = self::SETTING_HOME_PREFIX . 'letter_desc';
	const SETTING_HOME_TAN_CTA = self::SETTING_HOME_PREFIX . 'tan_cta';
	const SETTING_HOME_PARTNER_ORG_TITLE = self::SETTING_HOME_PREFIX . 'partner_org_title';
	const SETTING_HOME_PARTNER_ORG_DESC = self::SETTING_HOME_PREFIX . 'partner_org_desc';
	const SETTING_HOME_PARTNER_ORG_LIST = self::SETTING_HOME_PREFIX . 'partner_org_list';
	const SETTING_HOME_FEATURED_BILLS = self::SETTING_HOME_PREFIX . 'featured_bills';
	const SETTING_HOME_FEATURED_LETTERS = self::SETTING_HOME_PREFIX . 'featured_letters';

	/* All Defaults */
	const DEFAULTS = [
		self::SETTING_HOME_HERO_TITLE        => 'Creating a more <tilt>inclusive world.</tilt>',
		self::SETTING_HOME_HERO_DESC         => 'Through legislation, litigation and public education, The Trevor Project is the leading advocate for LGBTQ youth in preventative efforts that address the discrimination, stigma and other factors that place LGBTQ youth at significantly higher risk of suicide.',
		self::SETTING_HOME_HERO_CTA          => 'Take Action Now',
		self::SETTING_HOME_CAROUSEL_TITLE    => 'Making the difference.',
		self::SETTING_HOME_CAROUSEL_NUM      => 4,
		self::SETTING_HOME_OUR_WORK_TITLE    => 'Our Work',
		self::SETTING_HOME_QUOTE_CONTENT     => 'Thank you for everything you do for our community and humans around the world.',
		self::SETTING_HOME_QUOTE_CITE        => '@itsannawalker',
		self::SETTING_HOME_BILL_TITLE        => 'Our Federal Priorities',
		self::SETTING_HOME_BILL_DESC         => 'At The Trevor Project, we have a few priorities that we want to let members of congress know that we care about.',
		self::SETTING_HOME_LETTER_TITLE      => 'Our State Priorities',
		self::SETTING_HOME_LETTER_DESC       => 'Letters that The Trevor Project sent to lawmakers in support of or opposition to bills federal and state. Lorem ipsum dolor sit.',
		self::SETTING_HOME_TAN_CTA           => 'Take Action Now',
		self::SETTING_HOME_PARTNER_ORG_TITLE => 'Our Partner Organizations',
		self::SETTING_HOME_PARTNER_ORG_DESC  => 'The Trevor Project works with the following organizations to further suicide prevention efforts among LGBTQ young people across the country.',
	];


	/** @inheritDoc */
	protected function _register_panels(): void {
		$this->_manager->add_panel( self::PANEL_ID, [ 'title' => 'Advocate For Change' ] );
	}

	/** @inheritDoc */
	protected function _register_sections(): void {
		# Home
		## General
		$this->_manager->add_section( self::SECTION_HOME_GENERAL, [
			'panel' => self::PANEL_ID,
			'title' => '[Home] General',
		] );

		## Featured Bills & Letters
		$this->_manager->add_section( self::SECTION_HOME_FEATURED_POSTS, [
			'panel' => self::PANEL_ID,
			'title' => '[Home] Featured Bills & Letters',
		] );
	}

	/** @inheritDoc */
	protected function _register_controls(): void {

	}
}
