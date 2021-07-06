<?php namespace TrevorWP\Theme\ACF\Field_Group;

class Center_Text_Full_Width_Image extends A_Field_Group implements I_Block, I_Renderable {
	const FIELD_TITLE       = 'title';
	const FIELD_DESCRIPTION = 'description';
	const FIELD_IMAGE       = 'image';

	/**
	 * @inheritDoc
	 */
	protected static function prepare_register_args(): array {
		$title       = static::gen_field_key( static::FIELD_TITLE );
		$description = static::gen_field_key( static::FIELD_DESCRIPTION );
		$image       = static::gen_field_key( static::FIELD_IMAGE );

		return array(
			'title'  => 'Center Text + Full Width Image',
			'fields' => array(
				static::FIELD_TITLE       => array(
					'key'     => $title,
					'name'    => static::FIELD_TITLE,
					'label'   => 'Title',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '50%',
					),
				),
				static::FIELD_DESCRIPTION => array(
					'key'     => $description,
					'name'    => static::FIELD_DESCRIPTION,
					'label'   => 'Description',
					'type'    => 'textarea',
					'wrapper' => array(
						'width' => '50%',
					),
				),
				static::FIELD_IMAGE       => array(
					'key'           => $image,
					'name'          => static::FIELD_IMAGE,
					'label'         => 'Image',
					'type'          => 'image',
					'required'      => 1,
					'return_format' => 'array',
					'preview_size'  => 'thumbnail',
					'library'       => 'all',
				),
			),
		);
	}

	/**
	 * @inheritDoc
	 */
	public static function get_block_args(): array {
		return array_merge(
			parent::get_block_args(),
			array(
				'name'       => static::get_key(),
				'title'      => 'Center Text + Full Width Image',
				'post_types' => array( 'page' ),
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public static function render( $post = false, array $data = null, array $options = array() ): ?string {
		$title       = static::get_val( static::FIELD_TITLE );
		$description = static::get_val( static::FIELD_DESCRIPTION );
		$image       = static::get_val( static::FIELD_IMAGE );

		ob_start();
		?>

		<div class="center-text-with-full-image">
			<div class="center-text-with-full-image__container">
				<h2 class="center-text-with-full-image__title"><?php echo esc_html( $title ); ?></h2>
				<p class="center-text-with-full-image__description"><?php echo esc_html( $description ); ?></p>
				<?php if ( $image ) : ?>
					<figure class="center-text-with-full-image__figure">
						<img
							src="<?php echo esc_url( $image['url'] ); ?>""
							alt="<?php echo ( ! empty( $image['alt'] ) ) ? esc_attr( $image['alt'] ) : esc_attr( $title ); ?>"
							class="center-text-with-full-image__image" />
						<figcaption class="center-text-with-full-image__caption">
							Pinch to zoom into this image.
						</figcaption>
					</figure>
				<?php endif; ?>
			</div>
		</div>

		<?php
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public static function render_block( $block, $content = '', $is_preview = false, $post_id = 0 ): void {
		echo static::render( $post_id, null, compact( 'is_preview' ) );
	}
}