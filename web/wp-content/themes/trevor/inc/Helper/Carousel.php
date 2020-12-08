<?php namespace TrevorWP\Theme\Helper;


class Carousel {
	public static function posts( array $posts, array $options = [] ): string {
		$options = array_merge( array_fill_keys( [
				'id', // Main wrapper DOM id
				'title',
				'subtitle',
				'class'
		], null ), [
				'title_cls' => '',
				'print_js'  => true
		], $options );

		# ID check
		$id = &$options['id'];
		if ( empty( $id ) ) {
			$id = uniqid( 'posts-carousel-' );
		}

		if ( $options['print_js'] ) {
			add_action( 'wp_footer', function () use ( $options ) {
				self::print_js( "#{$options['id']} .carousel-full-width-wrap" );
			}, PHP_INT_MAX >> 2, 0 );
		}

		ob_start(); ?>
		<div class="container mx-auto mt-5 mb-20" id="<?= esc_attr( $id ) ?>">
			<h2 class="text-2xl text-white font-bold <?= $options['title_cls']; ?>"><?= esc_html( $options['title'] ) ?></h2>
			<p class="text-lg text-white text-left mb-5 <?= $options['title_cls']; ?>"><?= esc_html( $options['subtitle'] ) ?></p>

			<div class="carousel-full-width-wrap">
				<div class="carousel-container">
					<div class="swiper-wrapper">
						<?php foreach ( $posts as $post ) { ?>
							<div class="swiper-slide">
								<?= Card::post( $post ) ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="swiper-button-prev">
					<i class="trevor-ti-arrow-left"></i>
				</div>
				<div class="swiper-button-next">
					<i class="trevor-ti-arrow-right"></i>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	public static function print_js( string $base_selector, array $options = [] ): void {
		$options = array_merge( [
				'slidesPerView'  => 'auto',
				'spaceBetween'   => 30,
				'centeredSlides' => true,
				'observer'       => true,
				'pagination'     => [
						'el'        => "{$base_selector} .swiper-pagination",
						'clickable' => true,
				],
				'navigation'     => [
						'nextEl' => "{$base_selector} .swiper-button-next",
						'prevEl' => "{$base_selector} .swiper-button-prev",
				],
				'breakpoints'    => [
						768  => [
								'slidesPerView'  => 2,
								'spaceBetween'   => 20,
								'centeredSlides' => false,
						],
						1024 => [
								'slidesPerView'  => 3,
								'spaceBetween'   => 27,
								'centeredSlides' => false,
						]
				]
		], $options );
		?>
		<script>
			new trevorWP.vendors.Swiper('<?= esc_js( $base_selector )?> .carousel-container', <?= json_encode( $options )?>);
		</script>
		<?php
	}
}
