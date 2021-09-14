<?php
/*
Template Name: Empty Template (no branding or foundation)
*/
?>

<head>
	<?php if ( $_ENV['PANTHEON_ENVIRONMENT'] === 'live' ) : ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WV5P347');</script>
		<!-- End Google Tag Manager -->
	<?php endif ?>

	<?php wp_head(); ?>

	<link rel="icon" type="image/png" href="/favicon.png">
	<link rel="mask-icon" href="/favicon.svg" color="orange">
	<link rel="icon" type="image/svg+xml" href="/favicon.svg">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	
</head>
<body id="tech">
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile;?>
<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>

</body>