<?php namespace TrevorWP\Theme\Helper;

use TrevorWP\CPT\RC\Article;
use TrevorWP\CPT\RC\Guide;
use TrevorWP\CPT\RC\RC_Object;
use TrevorWP\Ranks\Taxonomy;
use TrevorWP\Meta;
use TrevorWP\Util\Tools;

class Header {
	/* Types */
	const TYPE_SPLIT = 'split';
	const TYPE_FULL = 'full';
	const TYPE_HORIZONTAL = 'horizontal';
	const TYPE_SQUARE = 'square';
	const TYPE_TEXT_ONLY = 'text_only';

	const ALL_TYPES = [
			self::TYPE_SPLIT,
			self::TYPE_FULL,
			self::TYPE_HORIZONTAL,
			self::TYPE_TEXT_ONLY,
	];

	const DEFAULT_TYPE = self::TYPE_TEXT_ONLY;

	static protected $_config = [
			self::TYPE_SPLIT      => [ 'name' => 'Split' ],
			self::TYPE_FULL       => [ 'name' => 'Full Bleed' ],
			self::TYPE_HORIZONTAL => [ 'name' => 'Horizontal' ],
			self::TYPE_SQUARE     => [ 'name' => 'Square' ],
			self::TYPE_TEXT_ONLY  => [ 'name' => 'Text Only' ],
	];

	public static function post( \WP_Post $post, array $options = [] ): string {
		$type = $options['type'] = self::get_header_type( $post );
		$cls  = [ 'post-header', "type-${type}" ];

		# BG Color
		if ( $type == self::TYPE_TEXT_ONLY && ! empty( $bg_clr = get_post_meta( $post->ID, Meta\Post::KEY_HEADER_BG_CLR, true ) ) ) {
			$cls[] = "bg-{$bg_clr}";
		}

		ob_start(); ?>
		<div class="<?= esc_attr( implode( ' ', $cls ) ) ?>">
			<div class="container post-header-inner">
				<?= self::_render_content_area( $post, $options ) ?>
				<div class="thumbnail-wrap">
					<?= self::_render_thumbnail( $post, $options ); ?>
				</div>
			</div>
			<div class="post-header-btm"></div>
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * @param \WP_Post $post
	 * @param array $options
	 *
	 * @return string|null
	 */
	protected static function _render_thumbnail( \WP_Post $post, array &$options = [] ): ?string {
		$variants = [];
		switch ( $options['type'] ) {
			case self::TYPE_TEXT_ONLY:
				return '<div class="w-full h-full bg-violet"></div>';
			case self::TYPE_SQUARE:
				$variants[] = Thumbnail::variant( Thumbnail::SCREEN_SM, Thumbnail::TYPE_SQUARE );
				break;
			case self::TYPE_FULL:
			case self::TYPE_HORIZONTAL:
				$variants[] = Thumbnail::variant( Thumbnail::SCREEN_SM, Thumbnail::TYPE_VERTICAL );
				$variants[] = Thumbnail::variant( Thumbnail::SCREEN_MD, Thumbnail::TYPE_HORIZONTAL );
				break;
			case self::TYPE_SPLIT:
			default:
				$variants[] = Thumbnail::variant( Thumbnail::SCREEN_SM, Thumbnail::TYPE_VERTICAL );
				break;
		}

		return Thumbnail::post( $post, ...$variants );
	}

	/**
	 * @param \WP_Post $post
	 * @param array $options
	 *
	 * @return string
	 */
	protected static function _render_content_area( \WP_Post $post, array &$options = [] ): string {
		# Title Top
		$title_top = null;
		if ( $post->post_type == Guide::POST_TYPE ) {
			$title_top = 'Guide';
		} else if ( $post->post_type == Article::POST_TYPE ) {
			$categories = Taxonomy::get_object_terms_ordered( $post, RC_Object::TAXONOMY_CATEGORY );
			$first_cat  = empty( $categories ) ? null : reset( $categories );
			$title_top  = $first_cat ? $first_cat->name : null;
		}

		# Title Bottom
		$title_btm = null;

		/* Blogs doesn't have excerpt */
		if ( ! in_array( $post->post_type, [ \TrevorWP\CPT\RC\Post::POST_TYPE, \TrevorWP\CPT\Post::POST_TYPE ] ) ) {
			$title_btm = nl2br( esc_html( $post->post_excerpt ) );
		}

		# Mid Row
		$mid_row = [];

		## Article Length
		$len_ind = get_post_meta( $post->ID, Meta\Post::KEY_LENGTH_IND, true );
		if ( ! empty( $len_ind ) ) {
			$mid_row[] = '<div class="length-indicator">' . esc_html( $len_ind ) . "</div>";
		}

		## Sharing Box
		if ( ! empty( get_post_meta( $post->ID, Meta\Post::KEY_HEADER_SNOW_SHARE, true ) ) ) {
			ob_start(); ?>
			<div class="sharing-box">
				<a target="_blank"
				   rel="noopener noreferrer nofollow"
				   class="post-social-share-btn"
				   href="https://www.facebook.com/sharer.php?<?= http_build_query( [ 'u' => get_permalink() ] ) ?>">
					<i class="share-icon trevor-ti-facebook"></i>
				</a>
				<a target="_blank"
				   rel="noopener noreferrer nofollow"
				   class="post-social-share-btn"
				   href="https://twitter.com/share?<?= http_build_query( [
						   'text' => get_the_title( $post ),
						   'url'  => get_permalink( $post )
				   ] ) ?>">
					<i class="share-icon trevor-ti-twitter"></i>
				</a>
				<a href="#" class="post-share-others-btn">
					<i class="share-icon trevor-ti-share-others"></i>
				</a>
			</div>
			<?php $mid_row[] = ob_get_clean();
		}

		# Tags
		$tags = get_the_terms( $post, Tools::get_post_tag_tax( $post ) );

		ob_start(); ?>
		<div class="post-header-content">
			<?php if ( $title_top ) { ?>
				<div class="title-top"><?= $title_top ?></div>
			<?php } ?>
			<h1 class="title "><?= esc_html( $post->post_title ) ?></h1>
			<?php if ( $title_btm ) { ?>
				<div class="title-btm"><?= $title_btm ?></div>
			<?php } ?>

			<?php if ( ! empty( $mid_row ) ) { ?>
				<div class="mid-row">
					<?php foreach ( $mid_row as $col ) { ?>
						<div class="mid-row-col">
							<?= $col ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

			<?php if ( ! empty( $tags ) ) { ?>
				<div class="tags-box">
					<?php foreach ( $tags as $tag ) { ?>
						<a href="<?= get_term_link( $tag ) ?>"
						   class="tag-box" rel="tag"><?= $tag->name ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * @param \WP_Post $post
	 *
	 * @return string
	 */
	public static function get_header_type( \WP_Post $post ): string {
		$type = get_post_meta( $post->ID, Meta\Post::KEY_HEADER_TYPE, true );

		if ( empty( $type ) || ! in_array( $type, self::ALL_TYPES ) ) {
			$type = self::DEFAULT_TYPE;
		}

		return $type;
	}

	/**
	 * @param string $header_type
	 *
	 * @return array|string[]
	 */
	public static function get_config_of( string $header_type ): array {
		return self::$_config[ $header_type ] ?? [];
	}
}
