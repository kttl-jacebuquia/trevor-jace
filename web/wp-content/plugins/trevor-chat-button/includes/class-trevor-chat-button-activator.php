<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.remedyone.com
 * @since      1.0.0
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/includes
 * @author     Simon Hunter <simon@remedyone.com>
 */
class Trevor_Chat_Button_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
			self::createLogsTable();
			self::tcb_create_cron_schedule();
	}

	/**
	 * Creates the table for logs using dbDelta
	 */
	private static function createLogsTable() {
		global $wpdb;
		$table_name = $wpdb->prefix . "tcb_ip_log";

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			created_at timestamp DEFAULT CURRENT_TIMESTAMP,
			ip_address text NOT NULL,
			country text NOT NULL,
			notes text,
			was_accepted boolean NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta($sql);
	}

	/**
	 * Schedules the recurring cron job
	 */
	private static function tcb_create_cron_schedule() {
		if ( !wp_next_scheduled( 'tcb_cron_hook' ) ) {
			wp_schedule_event( time(), 'daily', 'tcb_cron_hook' );
		}
	}

	
}
