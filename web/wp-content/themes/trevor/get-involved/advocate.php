<?php /* Get Involved: Advocate For Change */ ?>
<?php get_header(); ?>
<?php

use \TrevorWP\Theme\Customizer\Advocacy;
use \TrevorWP\Theme\Helper;

$featured_bill_ids = wp_parse_id_list( Advocacy::get_val( Advocacy::SETTING_HOME_FEATURED_BILLS ) );
$featured_bills    = Helper\Posts::get_from_list( $featured_bill_ids, 6 );

$featured_letter_ids = wp_parse_id_list( Advocacy::get_val( Advocacy::SETTING_HOME_FEATURED_LETTERS ) );
$featured_letters    = Helper\Posts::get_from_list( $featured_letter_ids, 6 );

?>
<main id="site-content" role="main" class="site-content">
	<?= Helper\Page_Header::img_bg( [
			'title'   => Advocacy::get_val( Advocacy::SETTING_HOME_HERO_TITLE ),
			'img_id'  => Advocacy::get_val( Advocacy::SETTING_HOME_HERO_IMG ),
			'cta_txt' => Advocacy::get_val( Advocacy::SETTING_HOME_HERO_CTA ),
			'cta_url' => '#',
	] ) ?>

	<?php if ( ! empty( $hero_desc = Advocacy::get_val( Advocacy::SETTING_HOME_HERO_DESC ) ) ) { ?>
		<p class="hero-description"><?= $hero_desc ?></p>
	<?php } ?>

	<?= Helper\Carousel::big_img( Advocacy::get_val( Advocacy::SETTING_HOME_CAROUSEL_DATA ), [
			'title'  => Advocacy::get_val( Advocacy::SETTING_HOME_CAROUSEL_TITLE ),
			'class'  => ['text-white', 'body-carousel'],
			'swiper' => [
					'centeredSlides' => true
			]
	] ) ?>

	<div class="our-work-container w-full">
		<?= Helper\Tile_Grid::custom( [
				[
						'title'   => 'Ending Conversion Therapy',
						'desc'    => 'The largest campaign in the nation working to protect LGBTQ youth from conversion therapy.',
						'cta_txt' => 'Read more',
						'cta_url' => home_url( \TrevorWP\CPT\Get_Involved\Get_Involved_Object::PERMALINK_ECT )
				],
				[
						'title'   => 'Collecting LGBTQ Life Data',
						'desc'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio lorem pellentesque facilisis fermentum nisl neque id. Integer.',
						'cta_txt' => 'Read more',
						'cta_url' => '#'
				],
				[
						'title'   => 'Preventing Suicide In Schools',
						'desc'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio lorem pellentesque facilisis fermentum nisl neque id. Integer.',
						'cta_txt' => 'Read more',
						'cta_url' => '#'
				],
				[
						'title'   => 'Research Studies',
						'desc'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio lorem pellentesque facilisis fermentum nisl neque id. Integer.',
						'cta_txt' => 'Read more',
						'cta_url' => '#'
				],
				[
						'title'   => 'Resources & Guides',
						'desc'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio lorem pellentesque facilisis fermentum nisl neque id. Integer.',
						'cta_txt' => 'Read more',
						'cta_url' => home_url( \TrevorWP\CPT\RC\RC_Object::PERMALINK_BASE ),
				],
		], [
				'title'       => Advocacy::get_val( Advocacy::SETTING_HOME_OUR_WORK_TITLE ),
				'desc'        => Advocacy::get_val( Advocacy::SETTING_HOME_OUR_WORK_DESC ),
				'smAccordion' => true,
				'tileClass'   => [ 'text-teal-dark' ],
				'class'       => [ 'text-white', 'md:container', 'mx-auto' ]
		] ) ?>
	</div>

	<?php
	// TODO: Create a helper from it and use on RC Home
	$quotes = (array) Advocacy::get_val( Advocacy::SETTING_HOME_QUOTE_DATA );
	if ( ! empty( $quotes ) ) :
		$quote = $quotes[ array_rand( $quotes, 1 ) ];
		?>

		<div class="quote-breaker bg-gold relative">
			<figure class="container mx-auto text-left text-teal-dark">
				<div class="flex flex-row justify-start md:mb-2 lg:mb-5">
					<i class="trevor-ti-quote-open -mt-2 mr-0.5 md:text-px26 lg:text-px32 lg:mr-2"></i>
					<i class="trevor-ti-quote-close md:text-px26 lg:text-px32"></i>
				</div>
				<blockquote class="font-bold">
					<?= $quote['quote'] ?>
				</blockquote>
				<?php if ( ! empty( $quote['cite'] ) ) { ?>
					<figcaption>
						<?= $quote['cite'] ?>
					</figcaption>
				<?php } ?>
			</figure>

			<?php
			if ( ! empty( $quote['img'] ) && ! empty( $quote['img']['id'] ) ) {
				echo wp_get_attachment_image( $quote['img']['id'], 'medium' );
			}
			?>

		</div>

	<?php endif; ?>

	<?= Helper\Tile_Grid::posts( $featured_bills, [
			'title'     => Advocacy::get_val( Advocacy::SETTING_HOME_BILL_TITLE ),
			'desc'      => Advocacy::get_val( Advocacy::SETTING_HOME_BILL_DESC ),
			'tileClass' => [ 'text-teal-dark' ],
			'class'     => [ 'text-white', 'container', 'mx-auto', 'tile-grid-cards' ]
	] ) ?>
	<a class="view-all-cta font-bold text-px24 leading-px34 tracking-em001 border-b-2 text-white self-center -mt-10 md:-mt-14 lg:-mt-36"
	   href="<?= get_post_type_archive_link( \TrevorWP\CPT\Get_Involved\Bill::POST_TYPE ) ?>">
		View All
	</a>

	<?= Helper\Tile_Grid::posts( $featured_letters, [
			'title'     => Advocacy::get_val( Advocacy::SETTING_HOME_LETTER_TITLE ),
			'desc'      => Advocacy::get_val( Advocacy::SETTING_HOME_LETTER_DESC ),
			'tileClass' => [ 'text-teal-dark' ],
			'class'     => [ 'text-white', 'container', 'mx-auto', 'tile-grid-cards' ]
	] ) ?>

	<a class="view-all-cta font-bold text-px24 leading-px34 tracking-em001 border-b-2 text-white self-center -mt-10 md:-mt-14 lg:-mt-36"
	   href="<?= get_post_type_archive_link( \TrevorWP\CPT\Get_Involved\Letter::POST_TYPE ) ?>">View All</a>

	<div class="text-center lg:mb-px120 action-cta">
		<a href="#"
		   class="inline-block font-bold text-white py-3 px-8 rounded-px10 md:px-8 lg:text-px18 lg:leading-px26 lg:py-5 lg:px-10 self-center">
			<?= Advocacy::get_val( Advocacy::SETTING_HOME_TAN_CTA ) ?>
		</a>
	</div>

	<div class="pt-20 pb-20 text-teal-dark bg-white lg:pt-28 lg:pb-48">
		<div class="container mx-auto site-content-inner text-center">
			<h2 class="font-semibold text-px32 leading-px42 mb-3.5 md:mx-0 lg:text-px46 lg:leading-px56">
				<?= Advocacy::get_val( Advocacy::SETTING_HOME_PARTNER_ORG_TITLE ) ?></h2>
			<p class="text-px18 leading-px26 mb-px50 md:mx-20 md:mb-4 lg:text-px26 lg:leading-px36 lg:mb-20 lg:mx-44">
				<?= Advocacy::get_val( Advocacy::SETTING_HOME_PARTNER_ORG_DESC ) ?></p>

			<div class="w-full flex flex-row flex-wrap mb-px72 mx-auto md:justify-center lg:w-3/4">
				<?php if (
						! empty( $partner_ids = Advocacy::get_val( Advocacy::SETTING_HOME_PARTNER_ORG_LIST ) ) &&
						! empty( $partner_ids = wp_parse_id_list( $partner_ids ) )
				) {
					foreach (
							get_posts( [
									'post__in'    => $partner_ids,
									'post_type'   => \TrevorWP\CPT\Get_Involved\Partner::POST_TYPE,
									'numberposts' => - 1,
									'orderby'     => 'post__in',
									'order'       => 'DESC',
							] ) as $partner
					) {
						if ( has_post_thumbnail( $partner ) ) { ?>
							<div class="w-1/2 md:w-1/3 lg:w-1/4 py-2" data-aspectRatio="2:1">
								<?php $has_url = ! empty( $partner_url = \TrevorWP\Meta\Post::get_partner_url( $partner->ID ) ); ?>
								<a class="w-3/4 mx-auto flex items-center content-center"
								   rel="nofollow noreferrer noopener"
								   target="_blank" href="<?= $has_url ? esc_attr( $partner_url ) : '#' ?>">
									<?= wp_get_attachment_image( get_post_thumbnail_id( $partner ), 'medium', false, [
											'class' => implode( ' ', [
													'mx-auto',
													'object-center',
													'object-contain'
											] )
									] ) ?>
								</a>
							</div>
							<?php
						}
					}
				} ?>
			</div>
		</div>
</main>
<?php get_footer(); ?>
