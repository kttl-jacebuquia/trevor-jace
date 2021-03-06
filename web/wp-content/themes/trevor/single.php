<?php
use TrevorWP\CPT\Get_Involved\Bill;

$no_sidebar_singles = array(
	Bill::POST_TYPE,
);
$post_type          = get_post_type();
$with_sidebar       = ! in_array( $post_type, $no_sidebar_singles );
$after_post_content = \TrevorWP\Theme\Helper\Post::render_after_post( $post );

get_header();
?>

<main role="main" class="<?php echo apply_filters( 'main_class', 'site-content' ); ?>" tabindex="0" id="site-content">
	<article <?php post_class( array( 'post-single' ) ); ?> id="post-<?php the_ID(); ?>">
		<?php echo \TrevorWP\Theme\Helper\Post_Header::render( $post ); ?>

		<div class="post-content-wrap">
			<div class="container post-content-grid">
				<div class="post-content">
					<?php the_content(); ?>
					<?php echo \TrevorWP\Theme\Helper\Post::render_content_footer( $post ); ?>
				</div>
				<?php if ( $with_sidebar ) : ?>
					<?php $side_blocks = \TrevorWP\Theme\Helper\Post::render_side_blocks( $post ); ?>
					<div class="post-content-sidebar<?php echo empty( $side_blocks ) ? ' empty' : ''; ?>">
						<?php echo $side_blocks; ?>
						<div class="floating-blocks-home hidden lg:block"></div>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- .post-content-wrap -->
		<?php echo \TrevorWP\Theme\Helper\Post::render_bottom_blocks( $post ); ?>
	</article><!-- .post -->
	<?php if ( ! empty( $after_post_content ) ) : ?>
		<div class="recirculation-section">
			<?php echo $after_post_content; ?>
		</div>
	<?php endif; ?>
</main> <!-- #site-content -->

<?php get_footer(); ?>
