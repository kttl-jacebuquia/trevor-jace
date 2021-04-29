<?php namespace TrevorWP\Theme\ACF\Field_Group;

class Grid_Row extends A_Field_Group implements I_Block {
	const FIELD_IMAGE = 'img';
	const FIELD_IMAGE_OPTIONS = 'img_options';
	const FIELD_IMAGE_ATTR = 'img_attr';
	const FIELD_ATTR = 'attr';
	const FIELD_CONTENT_ATTR = 'content_attr';

	const IMG_TYPE_NORMAL = 'normal';
	const IMG_TYPE_EXPAND_WINDOW = 'Expand to Window Edge';

	/** @inheritDoc */
	protected static function prepare_register_args(): array {
		$img          = static::gen_field_key( static::FIELD_IMAGE );
		$img_opt      = static::gen_field_key( static::FIELD_IMAGE_OPTIONS );
		$img_attr     = static::gen_field_key( static::FIELD_IMAGE_ATTR );
		$attr         = static::gen_field_key( static::FIELD_ATTR );
		$content_attr = static::gen_field_key( static::FIELD_CONTENT_ATTR );

		return [
				'title'  => 'Grid Row',
				'fields' => [
						static::FIELD_IMAGE         => [
								'key'           => $img,
								'name'          => static::FIELD_IMAGE,
								'label'         => 'Image',
								'type'          => 'image',
								'return_format' => 'array',
								'preview_size'  => 'medium',
								'library'       => 'all',
						],
						static::FIELD_IMAGE_OPTIONS => [
								'key'        => $img_opt,
								'name'       => static::FIELD_IMAGE_OPTIONS,
								'label'      => 'Image Options',
								'type'       => 'group',
								'sub_fields' => [/* todo: Sub Fields */ ],
						],
						static::FIELD_IMAGE_ATTR    => DOM_Attr::clone( [
								'key'   => $img_attr,
								'name'  => static::FIELD_IMAGE_ATTR,
								'label' => 'Image',
						] ),
						static::FIELD_ATTR          => DOM_Attr::clone( [
								'key'   => $attr,
								'name'  => static::FIELD_ATTR,
								'label' => 'Wrapper',
						] ),
						static::FIELD_CONTENT_ATTR  => DOM_Attr::clone( [
								'key'   => $content_attr,
								'name'  => static::FIELD_CONTENT_ATTR,
								'label' => 'Content',
						] ),
				],
		];
	}

	/** @inheritDoc */
	public static function render_block( $block, $content = '', $is_preview = false, $post_id = 0 ): void {
		$img_id = static::get_val( static::FIELD_IMAGE );
		if ( ! empty( $img_id ) ) {
			$img_id = $img_id['id'];
		}

		$cls_wrap         = [
				'grid-row',
				'flex flex-col xl:flex-none xl:grid xl:grid-cols-12 xl:gap-8 absolute-side-parent',
		];
		$cls_img_wrap     = [
				'grid-row-img-wrap',
				'w-full h-px375 mb-10 md:mb-12 md:h-px445 md:w-full md:ml-0 xl:h-px706 xl:col-span-5 xl:absolute-left',
		];
		$cls_img          = [
				'grid-row-img',
				'h-full w-full object-cover md:rounded-px10 xl:rounded-l-none',
		];
		$cls_content_wrap = [
				'grid-row-content-wrap',
				'xl:col-span-7 xl:col-start-7 xl:flex xl:flex-col xl:justify-center'
		];
		?>
		<div <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_ATTR ), $cls_wrap ) ?>>
			<div <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_IMAGE_ATTR ), $cls_img_wrap ) ?>>
				<?= $img_id ? wp_get_attachment_image( $img_id, 'large', false, [ 'class' => implode( ' ', $cls_img ) ] ) : '' ?>
			</div>
			<div <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_CONTENT_ATTR ), $cls_content_wrap ) ?>>
				<InnerBlocks/>
			</div>
		</div>
		<?php
	}

	/** @inheritDoc */
	public static function get_block_args(): array {
		return array_merge( parent::get_block_args(), [
				'name'       => static::get_key(),
				'title'      => 'Grid Row',
				'post_types' => [ 'page' ],
				'parent'     => [
						'acf/' . Grid_Rows_Container::get_key(),
				],
				'supports'   => [
						'jsx' => true,
				],
		] );
	}
}
