<?php namespace TrevorWP\Theme\ACF\Field_Group;

/**
 * Basic
 */
abstract class A_Basic_Section extends A_Field_Group {
	const FIELD_TITLE = 'title';
	const FIELD_TITLE_ATTR = 'title_attr';
	const FIELD_DESC = 'desc';
	const FIELD_DESC_ATTR = 'desc_attr';
	const FIELD_INNER_ATTR = 'inner_attr';
	const FIELD_BUTTONS = 'buttons';
	const FIELD_WRAPPER_ATTR = 'wrapper_attr';

	/**
	 * @return array
	 */
	protected static function _get_fields(): array {
		$title      = static::gen_field_key( static::FIELD_TITLE );
		$title_attr = static::gen_field_key( static::FIELD_TITLE_ATTR );
		$desc       = static::gen_field_key( static::FIELD_DESC );
		$desc_attr  = static::gen_field_key( static::FIELD_DESC_ATTR );
		$inner_attr = static::gen_field_key( static::FIELD_INNER_ATTR );
		$wrapper    = static::gen_field_key( static::FIELD_WRAPPER_ATTR );
		$buttons    = static::gen_field_key( static::FIELD_BUTTONS );

		return array_merge(
				static::_gen_tab_field( 'Title' ),
				[
						static::FIELD_TITLE      => [
								'key'   => $title,
								'name'  => static::FIELD_TITLE,
								'label' => 'Title',
								'type'  => 'text',
						],
						static::FIELD_TITLE_ATTR => DOM_Attr::clone( [
								'key'   => $title_attr,
								'name'  => static::FIELD_TITLE_ATTR,
								'label' => 'Title',
						] ),
				],
				static::_gen_tab_field( 'Description' ),
				[
						static::FIELD_DESC      => [
								'key'   => $desc,
								'name'  => static::FIELD_DESC,
								'label' => 'Description',
								'type'  => 'textarea',
						],
						static::FIELD_DESC_ATTR => DOM_Attr::clone( [
								'key'               => $desc_attr,
								'name'              => static::FIELD_DESC_ATTR,
								'label'             => 'Desc.',
								'conditional_logic' => [
										[
												[
														'field'    => $desc,
														'operator' => '!=empty',
												],
										],
								],
						] ),
				],
				static::_gen_tab_field( 'Inner' ),
				[
						static::FIELD_INNER_ATTR => DOM_Attr::clone( [
								'key'   => $inner_attr,
								'name'  => static::FIELD_INNER_ATTR,
								'label' => 'Inner'
						] ),
				],
				static::_gen_tab_field( 'Wrapper' ),
				[
						static::FIELD_WRAPPER_ATTR => DOM_Attr::clone( [
								'key'   => $wrapper,
								'name'  => static::FIELD_WRAPPER_ATTR,
								'label' => 'Wrapper'
						] ),
				],
				static::_gen_tab_field( 'Buttons' ),
				[
						static::FIELD_BUTTONS => Button_Group::clone( [
								'key'     => $buttons,
								'name'    => static::FIELD_BUTTONS,
								'display' => 'seamless',
								'layout'  => 'block',
								'label'   => ''
						] ),
				],
		);
	}

	/** @inheritdoc */
	public static function prepare_register_args(): array {
		return [
				'title'  => '', // Required,
				'fields' => static::_get_fields(),
		];
	}

	/**
	 * @param $block
	 * @param array $cls
	 * @param $content
	 */
	public static function render_block_part_wrap( $block, array $cls = [], $content ): void {
		# Add block's classnames
		if ( ! empty( $block['className'] ) ) {
			$cls[] = $block['className'];
		}
		?>
		<div <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_WRAPPER_ATTR ), $cls ) ?>>
			<?= $content ?>
		</div>
		<?php
	}

	/**
	 * @param array $cls
	 */
	public static function render_block_part_title( array $cls = [] ): void {
		if ( empty( $title = static::get_val( static::FIELD_TITLE ) ) ) {
			return;
		} ?>
		<h2 <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_TITLE_ATTR ), $cls ) ?>>
			<?= $title ?>
		</h2>
		<?php
	}

	/**
	 * @param array $cls
	 */
	public static function render_block_part_desc( array $cls = [] ): void {
		if ( empty( $desc = static::get_val( static::FIELD_DESC ) ) ) {
			return;
		} ?>
		<p <?= DOM_Attr::render_attrs_of( static::get_val( static::FIELD_DESC_ATTR ), $cls ) ?>>
			<?= $desc ?>
		</p>
		<?php
	}

	/**
	 * @param array $options
	 */
	public static function render_block_part_buttons( array $options = [] ): void {
		echo Button_Group::render( false, static::get_val( static::FIELD_BUTTONS ), $options );
	}

	/**
	 * @param $block
	 * @param $content
	 * @param array $options
	 */
	public static function render_block_wrapper( $block, $content, array $options = [] ): void {
		$wrap  = $options['wrap_cls'] ?? [];
		$inner = $options['inner_cls'] ?? [];
		$title = $options['title_cls'] ?? [];
		$desc  = $options['desc_cls'] ?? [];
		$btn   = $options['btn_cls'] ?? [];

		ob_start();
		echo '<div ' . DOM_Attr::render_attrs_of( static::get_val( static::FIELD_INNER_ATTR ), $inner ) . '>';
		static::render_block_part_title( $title );
		static::render_block_part_desc( $desc );
		echo $content;
		static::render_block_part_buttons( $btn );
		echo '</div>';
		static::render_block_part_wrap( $block, $wrap, ob_get_clean() );
	}
}
