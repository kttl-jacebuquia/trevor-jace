<?php
/*
Template Name: Reform The Locker Room
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
	<link rel="icon" type="image/png" href="/favicon.png">
	<!-- <link rel="mask-icon" href="/favicon.svg" color="orange"> -->
	<!-- <link rel="icon" type="image/svg+xml" href="/favicon.svg"> -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,900,900i" rel="stylesheet">
	<link rel="stylesheet" media="screen" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" id="main-stylesheet-css" href="https://www.thetrevorproject.org/wp-content/themes/trevor/assets/stylesheets/foundation.css?ver=2.9.2" type="text/css" media="all">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="RTLR">
<?php while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile;?>

<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>

</body>