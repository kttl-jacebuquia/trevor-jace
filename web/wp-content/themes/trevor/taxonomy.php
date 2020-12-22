<?php get_header(); ?>

<main id="site-content" role="main">
	<div class="container mx-auto">
		<div class="flex flex-col items-center text-white mb-8 md:items-start">
			<?php
			/** @var \WP_Term $term */
			$term = get_queried_object();
			if ( $term ) { ?>
				<h1 class="font-bold text-px32 leading-px42 my-6 md:tracking-em001 lg:text-px46 lg:leading-px56"><?= esc_html( $term->name ) ?></h1>
				<?php if ( ! empty( $term->description ) ) { ?>
					<p class="font-normal text-px20 leading-px26 text-center mb-8 md:text-left md:text-px22 md:leading-px32 md:tracking-em005 lg:text-px26 lg:leading-px36"><?= esc_html( $term->description ) ?></p>
				<?php } ?>
			<?php }
			?>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php while ( have_posts() ) {
				the_post();
				echo \TrevorWP\Theme\Helper\Card::post( get_post() );
				?>
			<?php } ?>
			<?php get_template_part( 'template-parts/pagination' ); ?>
		</div>
	</div>
</main> <!-- #site-content -->

<?php get_footer(); ?>
