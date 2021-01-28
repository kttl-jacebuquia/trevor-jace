<?php /* Product Partnerships */ ?>
<?php get_header(); ?>
<?php

use \TrevorWP\Theme\Helper;
use \TrevorWP\Theme\Customizer\Product_Partnerships;

?>
	<main id="site-content" role="main" class="site-content">
		<?php /* Header */ ?>
		<?= Helper\Page_Header::text( [
				'title'  => Product_Partnerships::get_val( Product_Partnerships::SETTING_HOME_HERO_TITLE ),
				'desc'   => Product_Partnerships::get_val( Product_Partnerships::SETTING_HOME_HERO_DESC ),
		] ) ?>

		<?php /* Featured Stories */ ?>


		<?php /* Current Partners */ ?>


		<?php /* Recirculation */ ?>
		<?php $circulation_title = Product_Partnerships::get_val( Product_Partnerships::SETTING_HOME_CIRCULATION_TITLE ); ?>
		<?= Helper\Circulation_Card::render_fundraiser(); ?>
		<?= Helper\Circulation_Card::render_counselor(); ?>
	</main>

<?php get_footer();
