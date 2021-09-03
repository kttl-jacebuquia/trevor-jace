<?php
/*
Template Name: Empty Template (no branding or foundaiton)
*/
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile;?>
<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>



<?php get_footer();
