<?php /* Public Education */ ?>
<?php get_header(); ?>


<main id="site-content" role="main" class="site-content">
	<?php # Header ?>
	<?= \TrevorWP\Theme\Helper\Page_Header::split_img( [
			'title',
			'desc',
			'img_id'
	] ) ?>

	<?php # Info Boxes ?>
	<?= \TrevorWP\Theme\Helper\Info_Boxes::three_up(
			[],
			[
					'title',
					'desc',
					'box_type' => 'text',
			]
	) ?>

	<?php # Offerings ?>

	<?php # Testimonials Carousel ?>
	<?= \TrevorWP\Theme\Helper\Carousel::testimonials( [], [] ); ?>

	<?php # Circulation ?>
	<?= \TrevorWP\Theme\Helper\Circulation_Card::render_circulation(
			'',
			'',
			[ 'donate', 'fundraiser' ],
	) ?>

</main>


