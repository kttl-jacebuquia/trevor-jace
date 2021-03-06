<?php namespace TrevorWP\Theme\ACF\Field_Group;

class FAQ extends A_Field_Group implements I_Block, I_Renderable {
	const FIELD_ANCHOR_ID                = 'anchor_id';
	const FIELD_TITLE                    = 'title';
	const FIELD_FAQ_ENTRIES              = 'faq_entries';
	const FIELD_FAQ_ENTRY_LABEL          = 'faq_entry_label';
	const FIELD_FAQ_ENTRY_WITH_FORMAT    = 'faq_entry_with_format';
	const FIELD_FAQ_ENTRY_FORMAT_CONTENT = 'faq_entry_format_content';
	const FIELD_FAQ_ENTRY_CONTENT        = 'faq_entry_content';
	const FIELD_FOOTER                   = 'footer';

	/**
	 * @inheritDoc
	 */
	protected static function prepare_register_args(): array {
		$anchor_id                = static::gen_field_key( static::FIELD_ANCHOR_ID );
		$title                    = static::gen_field_key( static::FIELD_TITLE );
		$faq_entries              = static::gen_field_key( static::FIELD_FAQ_ENTRIES );
		$faq_entry_label          = static::gen_field_key( static::FIELD_FAQ_ENTRY_LABEL );
		$faq_entry_with_format    = static::gen_field_key( static::FIELD_FAQ_ENTRY_WITH_FORMAT );
		$faq_entry_format_content = static::gen_field_key( static::FIELD_FAQ_ENTRY_FORMAT_CONTENT );
		$faq_entry_content        = static::gen_field_key( static::FIELD_FAQ_ENTRY_CONTENT );
		$footer                   = static::gen_field_key( static::FIELD_FOOTER );

		return array(
			'title'  => 'FAQ Drawer',
			'fields' => array(
				static::FIELD_ANCHOR_ID   => array(
					'key'          => $anchor_id,
					'name'         => static::FIELD_ANCHOR_ID,
					'label'        => 'Anchor ID',
					'type'         => 'text',
					'instructions' => 'Please use dash (-) and lowercase letters (a-z) only.',
				),
				static::FIELD_TITLE       => array(
					'key'   => $title,
					'name'  => static::FIELD_TITLE,
					'label' => 'Title',
					'type'  => 'text',
				),
				static::FIELD_FAQ_ENTRIES => array(
					'key'        => $faq_entries,
					'name'       => static::FIELD_FAQ_ENTRIES,
					'label'      => 'FAQ Entries',
					'type'       => 'repeater',
					'required'   => true,
					'layout'     => 'block',
					'sub_fields' => array(
						static::FIELD_FAQ_ENTRY_LABEL   => array(
							'key'   => $faq_entry_label,
							'name'  => static::FIELD_FAQ_ENTRY_LABEL,
							'label' => 'Label',
							'type'  => 'text',
						),
						static::FIELD_FAQ_ENTRY_WITH_FORMAT => array(
							'key'           => $faq_entry_with_format,
							'name'          => static::FIELD_FAQ_ENTRY_WITH_FORMAT,
							'label'         => 'With Format?',
							'type'          => 'button_group',
							'choices'       => array(
								'yes' => 'Yes',
								'no'  => 'No',
							),
							'default_value' => 'no',
						),
						static::FIELD_FAQ_ENTRY_FORMAT_CONTENT => array(
							'key'               => $faq_entry_format_content,
							'name'              => static::FIELD_FAQ_ENTRY_FORMAT_CONTENT,
							'label'             => 'Content',
							'type'              => 'wysiwyg',
							'tabs'              => 'all',
							'toolbar'           => 'bullink',
							'media_upload'      => 0,
							'delay'             => 0,
							'conditional_logic' => array(
								array(
									array(
										'field'    => $faq_entry_with_format,
										'operator' => '==',
										'value'    => 'yes',
									),
								),
							),
						),
						static::FIELD_FAQ_ENTRY_CONTENT => array(
							'key'               => $faq_entry_content,
							'name'              => static::FIELD_FAQ_ENTRY_CONTENT,
							'label'             => 'Content',
							'type'              => 'textarea',
							'conditional_logic' => array(
								array(
									array(
										'field'    => $faq_entry_with_format,
										'operator' => '==',
										'value'    => 'no',
									),
								),
							),
						),
					),
				),
				static::FIELD_FOOTER      => array(
					'key'          => $footer,
					'name'         => static::FIELD_FOOTER,
					'label'        => 'Footer',
					'type'         => 'wysiwyg',
					'toolbar'      => 'basic',
					'media_upload' => 0,
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
				'title'      => 'FAQ Drawer',
				'post_types' => array( 'page' ),
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public static function render( $post = false, array $data = null, array $options = array() ): ?string {
		$anchor_id   = static::get_val( static::FIELD_ANCHOR_ID );
		$title       = static::get_val( static::FIELD_TITLE );
		$faq_entries = static::get_val( static::FIELD_FAQ_ENTRIES );
		$footer      = static::get_val( static::FIELD_FOOTER );

		ob_start();
		?>
		<div id="<?php echo esc_attr( esc_html( $anchor_id ) ); ?>" tabindex="0" class="faqs">
			<div class="container mx-auto faqs__container">
				<h3 class="faqs-heading"><?php echo $title; ?></h3>

				<?php if ( ! empty( $faq_entries ) ) : ?>
					<div class="faq-list">
						<?php foreach ( $faq_entries as $faq ) : ?>
							<div class="faq-list__item">
								<div class="faq-list__heading">
									<div class="faq-list__heading-headline">
										<h4><?php echo $faq['faq_entry_label']; ?></h4>

										<button class="faq-list__toggle" data-title="<?php echo $faq['faq_entry_label']; ?>">
											<svg aria-hidden="true" class="plus" width="20" height="20" viewBox="0 0 20 20" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M10 0C9.44771 0 9 0.447715 9 1V9H1C0.447715 9 0 9.44771 0 10C0 10.5523 0.447715 11 1 11H9V19C9 19.5523 9.44771 20 10 20C10.5523 20 11 19.5523 11 19V11H19C19.5523 11 20 10.5523 20 10C20 9.44771 19.5523 9 19 9H11V1C11 0.447715 10.5523 0 10 0Z"
													fill="#003A48"/>
											</svg>

											<svg aria-hidden="true" class="minus" width="20" height="20" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M25.1108 13.0378C25.1108 13.8662 24.4392 14.5378 23.6108 14.5378L2.6134 14.5381C1.78497 14.5382 1.11341 13.8666 1.11342 13.0382C1.11343 12.2097 1.78502 11.5382 2.61344 11.5381L23.6108 11.5378C24.4393 11.5378 25.1108 12.2094 25.1108 13.0378Z" fill="#003A48"/>
											</svg>
										</button>
									</div>
								</div>
								<div class="faq-list__content">
									<div class="faq-list__body">
										<?php if ( 'yes' === $faq[ static::FIELD_FAQ_ENTRY_WITH_FORMAT ] ) : ?>
											<?php echo $faq[ static::FIELD_FAQ_ENTRY_FORMAT_CONTENT ]; ?>
										<?php elseif ( 'no' === $faq[ static::FIELD_FAQ_ENTRY_WITH_FORMAT ] ) : ?>
											<?php echo $faq['faq_entry_content']; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<div class="faq-footer">
					<p><?php echo $footer; ?></p>
				</div>
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
