<?php namespace TrevorWP\Theme\Helper;

use TrevorWP\Block;
use TrevorWP\CPT\RC\External;
use TrevorWP\CPT\RC\RC_Object;
use TrevorWP\Meta;
use TrevorWP\Util\Tools;
use TrevorWP\Theme\Customizer;

/**
 * Post Helper
 */
class Post {
	/**
	 * @param \WP_Post $post
	 *
	 * @return string
	 */
	public static function render_side_blocks( \WP_Post $post ): string {
		$out = [];

		# Highlight Block
		if ( is_singular( Block\Core_Heading::HIGHLIGHT_POST_TYPES ) && ! empty( $highlights = Meta\Post::get_highlights( $post->ID ) ) ) {
			$out['highlights'] = Block\Core_Heading::render_highlights_block( $post, $highlights );
		}

		# File
		if ( is_singular( Meta\Post::FILE_ENABLED_POST_TYPES ) && ! empty( $file_id = Meta\Post::get_file_id( $post->ID ) ) ) {
			$out['file_button'] = self::_render_file_button( $file_id );
		}

		return implode( "\n", array_filter( $out ) );
	}

	/**
	 * @param int $attachment_id
	 *
	 * @return string
	 */
	protected static function _render_file_button( int $attachment_id ): string {
		ob_start();
		?>
		<div class="post-file-wrap">
			<a class="btn post-file-btn" href="<?= esc_attr( wp_get_attachment_url( $attachment_id ) ); ?>">
				<span class="post-file-btn-cta">Download PDF Format</span> <i
						class="trevor-ti-download post-file-btn-icn"></i>
			</a>
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string
	 */
	public static function render_bottom_blocks( \WP_Post $post ): string {
		$out = [];

		# Featured Categories
		if ( $post->post_type == External::POST_TYPE ) {
			$out[] = Categories::render_rc_featured_hero();
		}

		$inner = implode( "\n", array_filter( $out ) );

		return "<div class='post-bottom-blocks'>{$inner}</div>";
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string
	 */
	public static function render_after_post( \WP_Post $post ): string {
		$out = [
				self::_render_bottom_recirculation( $post ),
		];

		return implode( "\n", array_filter( $out ) );

		return "<div class='post-after-blocks'>{$inner}</div>";
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string|null
	 */
	protected static function _render_bottom_recirculation( \WP_Post $post ): ?string {
		if ( empty( $main_cat = Meta\Post::get_main_category( $post ) ) ) {
			return null;
		}

		$posts = Posts::get_recirculation( $post, 2, [
				'force_main_category' => true,
		] );

		if ( empty( $posts ) || count( $posts ) != 2 ) {
			return null;
		}

		ob_start(); ?>
		<div class="container mx-auto py-12 md:py-24 lg:py-28">
			<div class="lg:w-8/12 lg:mx-auto">
				<h3 class="text-white mb-11">
					<span class="font-medium text-px28 leading-px38 md:text-px24 md:leading-px34">Learn more about</span>
					<br>
					<span class="font-bold text-px32 leading-px42 tracking-em001"><?= $main_cat->name ?></span>
				</h3>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-y-7 md:gap-x-7">
					<?php foreach ( $posts as $post ) {
						echo Card::post( $post );
					}
					?>
				</div>
			</div>
		</div>
		<?php return ob_get_clean();
	}

	protected static function _render_bottom_tags( \WP_Post $post ): ?string {
		$tax   = Tools::get_post_tag_tax( $post );
		$terms = wp_get_object_terms( $post->ID, $tax );

		if ( empty( $terms ) ) {
			return null;
		}

		ob_start(); ?>
		<div class="post-bottom-tags">
			<hr class="wp-block-separator is-style-wave hr-top">
			<div class="list-container">
				<?php foreach ( $terms as $term ) { ?>
					<a href="<?= esc_attr( get_term_link( $term ) ) ?>" rel="tag"><?= esc_attr( $term->name ) ?></a>
				<?php } ?>
			</div>
			<hr class="wp-block-separator is-style-wave hr-btm">
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string|null
	 */
	protected static function _render_bottom_categories( \WP_Post $post ): ?string {
		$featured_cat_ids = wp_parse_id_list( Customizer\Resource_Center::get_val( Customizer\Resource_Center::SETTING_HOME_CATS ) );
		$terms            = get_terms( [
				'taxonomy'   => RC_Object::TAXONOMY_CATEGORY,
				'orderby'    => 'include',
				'include'    => $featured_cat_ids,
				'parent'     => 0,
				'hide_empty' => false,
		] );

		if ( empty( $terms ) ) {
			return null;
		}

		ob_start(); ?>
		<div class="post-bottom-categories">
			<h3 class="list-title">Browse trending content below or choose a topic category to explore.</h3>
			<div class="list-container">
				<?php foreach ( $terms as $term ) { ?>
					<a href="<?= esc_attr( get_term_link( $term ) ) ?>" rel="tag"><?= esc_attr( $term->name ) ?></a>
				<?php } ?>
			</div>
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string|null
	 */
	protected static function _render_content_bottom_recirculation( \WP_Post $post ): ?string {
		$cards = Meta\Post::get_recirculation_cards( $post->ID );
		if ( empty( $cards ) ) {
			return null;
		}

		ob_start();
		?>
		<div class="circulation-cards">
			<?php foreach ( $cards as $card ) {
				$method = "render_{$card}";
				if ( ! method_exists( Circulation_Card::class, $method ) ) {
					continue;
				}

				?>
				<div class="circulation-card-wrap">
					<?= Circulation_Card::$method(); ?>
				</div>
			<?php } ?>
		</div>
		<?php return ob_get_clean();
	}

	public static function render_content_footer( \WP_Post $post ): string {
		$out = [
			# All tags
				self::_render_bottom_tags( $post ),

			# Content Bottom Recirculation
				self::_render_content_bottom_recirculation( $post ),

			# All Categories
				self::_render_bottom_categories( $post ),
		];

		$inner = implode( "\n", array_filter( $out ) );

		return "<div class='post-content-footer'>{$inner}</div>";
	}
}
