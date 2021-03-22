<?php namespace TrevorWP\Theme\Customizer\Component;

use TrevorWP\Theme\Helper\Circulation_Card;

/**
 * Circulation Component Customizer
 */
class Circulation extends Abstract_Component {
	const SETTING_TITLE = 'title';
	const SETTING_DESC = 'desc';

	/** @inheritDoc */
	public function register_section(): void {
		// Other Ways to Help
		$this->get_customizer()->get_manager()->add_section(
			$this->get_section_id(),
			array(
				'panel' => $this->get_panel_id(),
				'title' => 'Circulation',
			)
		);
	}

	/** @inheritDoc */
	public function register_controls(): void {
		$manager = $this->get_manager();
		$sec_id  = $this->get_section_id();

		// Circulation
		$manager->add_control(
			$setting_title = $this->get_setting_id( self::SETTING_TITLE ),
			array(
				'setting' => $setting_title,
				'section' => $sec_id,
				'label'   => 'Title',
				'type'    => 'text',
			)
		);

		$manager->add_control(
			$setting_desc = $this->get_setting_id( self::SETTING_DESC ),
			array(
				'setting' => $setting_desc,
				'section' => $sec_id,
				'label'   => 'Description',
				'type'    => 'text',
			)
		);
	}

	/** @inheritDoc */
	public function render( array $ext_options = [] ): ?string {
		return Circulation_Card::render_circulation(
			$this->get_val( self::SETTING_TITLE ),
			$this->get_val( self::SETTING_DESC ),
			$ext_options['cards'] ?? $this->get_option( 'cards' ),
			$ext_options['options'] ?? []
		);
	}
}
