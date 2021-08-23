<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.remedyone.com
 * @since      1.0.0
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 * @author     Simon Hunter <simon@remedyone.com>
 */
class Trevor_Chat_Button_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'trevor-chat-button',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
