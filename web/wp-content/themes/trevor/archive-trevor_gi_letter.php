<?php get_header(); ?>

<?= TrevorWP\Theme\Helper\Page_Header::text( [
		'title_top' => 'ADVOCATE FOR CHANGE',
		'title'     => 'Our State Priorities',
		'desc'      => 'Letters that The Trevor Project sent to lawmakers in support of or opposition to bills federal and state.',
		'cta_txt'   => 'Take Action Now',
		'cta_url'   => '#',
] ) ?>

<main id="site-content" role="main" class="bg-white">
	<div class="container mx-auto">
		<?= \TrevorWP\Theme\Helper\Tile_Grid::posts( $wp_query->posts, [
				'tileClass' => [ 'border', 'border-blue_green', 'border-opacity-50' ]
		] ) ?>

		<?php get_template_part( 'template-parts/ajax-pagination' ); ?>
		<div class="anchor-container text-center w-full mb-px120 md:mb-px80 xl:mb-px100">
			<a href="#!" class="take-action-cta inline-block bg-teal-dark text-white text-px16 leading-px22 xl:text-px18 xl:leading-px26 font-bold text-center">Take Action Now</a>
		</div>
	</div>
</main> <!-- #site-content -->

<?php get_footer(); ?>
