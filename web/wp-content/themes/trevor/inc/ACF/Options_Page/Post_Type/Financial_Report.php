<?php namespace TrevorWP\Theme\ACF\Options_Page\Post_Type;


class Financial_Report extends A_Post_Type {
	const POST_TYPE = \TrevorWP\CPT\Financial_Report::POST_TYPE;
	const SLUG      = \TrevorWP\CPT\Financial_Report::SLUG;

	const OTHER_FIELDS = array(
		'sort',
		'pagination_type',
		'text_contents',
		'cta',
	);
}
