<?php namespace TrevorWP\Theme\ACF\Field_Group;

class Page_Circulation_Card extends A_Basic_Section {
	const FIELD_CARD_BG = 'card_bg';

	/** @inheritDoc */
	public static function prepare_register_args(): array {
		$card_bg  = static::gen_field_key( static::FIELD_CARD_BG );

		return [
			'title'  => 'Page Circulation Card',
			'fields' => array_merge(
				static::_get_fields(),
				static::_gen_tab_field( 'Background' ),
				[
					static::FIELD_CARD_BG => [
						'key'     => $card_bg,
						'name'    => static::FIELD_CARD_BG,
						'label'   => 'Type',
						'type'    => 'select',
						'choices' => [
							''
						]
					],
				],
			)
		];
	}
}
