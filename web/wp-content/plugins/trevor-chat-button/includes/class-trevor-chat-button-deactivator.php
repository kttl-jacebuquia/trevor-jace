<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.remedyone.com
 * @since      1.0.0
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 * @author     Simon Hunter <simon@remedyone.com>
 */
class Trevor_Chat_Button_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$timestamp = wp_next_scheduled( 'tcb_cron_hook' );
		wp_unschedule_event( $timestamp, 'tcb_cron_hook' );
	}

}
