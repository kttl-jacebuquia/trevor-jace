<?php
/*
Template Name: Info Page Template
*/
?>

<?php get_header(); ?>

<main id="site-content" role="main" class="site-content">
	<div class="site-content-inner">
		<div class="info-page-wrap">
			<h1 class="info-page-heading"><?php the_title(); ?></h1>
			<div class="info-page-content">
				<div class="info-page-body">
					<?php the_content(); ?>
				</div>
				<div class="info-page-sidebar">
					<?php echo \TrevorWP\Theme\ACF\Field_Group\Page_Sidebar::render(); ?>
					<div class="floating-blocks-home hidden lg:block"></div>
				</div>
			</div>
		</div><!-- .info-page-wrap -->
	</div>
</main> <!-- #site-content -->

<?php get_footer(); ?>
