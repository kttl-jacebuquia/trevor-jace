<?php get_header(); ?>

<?= TrevorWP\Theme\Helper\Page_Header::text( [
		'title_top' => 'ADVOCATE FOR CHANGE',
		'title'     => 'Our State Priorities',
		'desc'      => 'Letters that The Trevor Project sent to lawmakers in support of or opposition to bills federal and state.',
		'cta_txt'   => 'Take Action Now',
		'cta_url'   => '#',
] ) ?>

<main id="site-content" role="main" class="bg-white">
	<div class="container mx-auto pt-10 md:pt-px50 lg:pt-20">

		<div class="custom-select">
			<ul>
				<li class="label">
					<button>Sort By: Newest to Oldest</button>
					<ul class="dropdown">
						<li class="active" data-sort="asc">Sort By: Newest to Oldest</li>
						<li data-sort="desc">Sort By: Oldest to Newest</li>
					</ul>
				</li>
			</ul>
		</div>

		<?= \TrevorWP\Theme\Helper\Tile_Grid::posts( $wp_query->posts, [
				'tileClass' => [ 'border', 'border-blue_green', 'border-opacity-50' ]
		] ) ?>
	</div>
</main> <!-- #site-content -->

<?php get_footer(); ?>
