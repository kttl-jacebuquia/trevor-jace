<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.remedyone.com
 * @since      1.0.0
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Trevor_Chat_Button
 * @subpackage Trevor_Chat_Button/admin
 * @author     Simon Hunter <simon@remedyone.com>
 */
class Trevor_Chat_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		if (isset($_POST['download-logs'])) {
			$this->download_ip_logs();
			die();
		}

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trevor_Chat_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trevor_Chat_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trevor-chat-button-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Trevor_Chat_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trevor_Chat_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trevor-chat-button-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Chat Button', 'trevor-chat-button' ),
			__( 'Chat Button', 'trevor-chat-button' ),
			'manage_options',
			'trevor-chat-button',
			array( $this, 'display_options_page' )
		);
	}
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		$logs = $this->get_ip_logs();
		include_once 'partials/trevor-chat-button-admin-options-display.php';
	}

	/**
	 * Register the settings
	 */
	public function settings_api_init() {

		register_setting( 'trevor-chat-button', 'tcb_disable_button' );
		register_setting( 'trevor-chat-button', 'tcb_debug_front_end' );
		register_setting( 'trevor-chat-button', 'tcb_use_ipstack' );
		register_setting( 'trevor-chat-button', 'tcb_ipstack_access_key' );
		register_setting( 'trevor-chat-button', 'tcb_only_us' );
		register_setting( 'trevor-chat-button', 'tcb_outside_us_message' );
		register_setting( 'trevor-chat-button', 'tcb_24_hrs' );
		register_setting( 'trevor-chat-button', 'tcb_start_time' );
		register_setting( 'trevor-chat-button', 'tcb_end_time' );
		register_setting( 'trevor-chat-button', 'tcb_allow_weekends' );
		register_setting( 'trevor-chat-button', 'tcb_away_message' );
		register_setting( 'trevor-chat-button', 'tcb_refresh_interval' );
		register_setting( 'trevor-chat-button', 'tcb_enable_wait_time' );
		register_setting( 'trevor-chat-button', 'tcb_wait_time_url' );
		register_setting( 'trevor-chat-button', 'tcb_wait_time_message' );
		register_setting( 'trevor-chat-button', 'tcb_enable_trevorspace_user_count' );
		register_setting( 'trevor-chat-button', 'tcb_in_uat' );

		add_settings_section(
		 'trevor-chat-button-section',
		 'Chat Button Settings',
		 [$this, 'trevor_chat_button_callback_function'],
		 'trevor-chat-button'
		);

		add_settings_field(
			'tcb_use_ipstack',
			'Use ipstack?',
			[$this, 'tcb_use_ipstack'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_ipstack_access_key',
			'ipstack Access Key',
			[$this, 'tcb_ipstack_access_key'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
		 'tcb_only_us',
		 'Only Show to US Visitors',
		 [$this, 'tcb_only_us'],
		 'trevor-chat-button',
		 'trevor-chat-button-section'
	 	);
		
		add_settings_field(
			'tcb_outside_us_message',
			'Outside US Message',
			[$this, 'tcb_outside_us_message'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_24_hrs',
			'24 Hrs Mode (Always Available)',
			[$this, 'tcb_24_hrs'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_start_time',
			'Start Time',
			[$this, 'tcb_start_time'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_end_time',
			'End Time',
			[$this, 'tcb_end_time'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_away_message',
			'Away Message (outside time range)',
			[$this, 'tcb_away_message'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_disable_button',
			'Always Away',
			[$this, 'tcb_disable_button'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_refresh_interval',
			'Refresh Interval (minutes)',
			[$this, 'tcb_refresh_interval'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_debug_front_end',
			'Enable debug mode',
			[$this, 'tcb_debug_front_end'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_enable_wait_time',
			'Enable Long Wait Time Check',
			[$this, 'tcb_enable_wait_time'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_wait_time_url',
			'Salesforce URL',
			[$this, 'tcb_wait_time_url'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_wait_time_message',
			'Long Wait Time Message',
			[$this, 'tcb_wait_time_message'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_enable_trevorspace_user_count',
			'Enable Trevorspace Online Users Message',
			[$this, 'tcb_enable_trevorspace_user_count'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

		add_settings_field(
			'tcb_in_uat',
			'Use UAT for chat testing',
			[$this, 'tcb_in_uat'],
			'trevor-chat-button',
			'trevor-chat-button-section'
		);

	} 

	public function trevor_chat_button_callback_function() {
		echo '<p>Trevor Chat Button settings</p>';
	}

	public function tcb_debug_front_end() {
		echo '<p>Show GeoIP debug information with the button.</p>';
		echo '<input name="tcb_debug_front_end" id="tcb_debug_front_end" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_debug_front_end' ), false ) . ' />';
	}

	public function tcb_use_ipstack() {
		echo '<p>Should we use ipstack to check the users location? If unchecked, MaxMind GeoIP database will be used instead.</p>';
		echo '<input name="tcb_use_ipstack" id="tcb_use_ipstack" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_use_ipstack' ), false ) . ' />';
	}
	
	public function tcb_ipstack_access_key() {
		echo '<input name="tcb_ipstack_access_key" id="tcb_ipstack_access_key" type="text" size="40" value="'.get_option( 'tcb_ipstack_access_key' ).'" />';
	}

	public function tcb_only_us() {
		echo '<input name="tcb_only_us" id="tcb_only_us" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_only_us' ), false ) . ' />';
	}

	public function tcb_outside_us_message() {
		echo '<textarea name="tcb_outside_us_message" id="tcb_outside_us_message" rows="10" style="width:100%;" type="text">'.get_option( 'tcb_outside_us_message' ).'</textarea>';
	}

	public function tcb_24_hrs() {
		echo '<input name="tcb_24_hrs" id="tcb_24_hrs" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_24_hrs' ), false ) . ' />';
	}

	public function tcb_start_time() {
		echo '<p>In 24-hour format, HH:mm, (your current blog time is: '. current_time('H:i:s') . ') </p>';
		echo '<input name="tcb_start_time" id="tcb_start_time" type="text" value="'.get_option( 'tcb_start_time' ).'" />';
	}

	public function tcb_end_time() {
		echo '<input name="tcb_end_time" id="tcb_end_time" type="text"  value="'.get_option( 'tcb_end_time' ).'" />';
	}

	public function tcb_away_message() {
		echo '<textarea name="tcb_away_message" id="tcb_away_message" rows="10" style="width:100%;" type="text">'.get_option( 'tcb_away_message' ).'</textarea>';
	}

	public function tcb_disable_button() {
		echo '<p>Set to Away: Always display the away message and disable the button.</p>';
		echo '<input name="tcb_disable_button" id="tcb_disable_button" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_disable_button' ), false ) . ' />';
	}

	public function tcb_refresh_interval() {
		echo '<input name="tcb_refresh_interval" id="tcb_refresh_interval" type="text" size="4" value="'.get_option( 'tcb_refresh_interval' ).'" />';
	}

	public function tcb_enable_wait_time() {
		echo '<p>If enabled the system will check Salesforce for a long expected wait time and display a message if the wait time is expected to be long.</p>';
		echo '<input name="tcb_enable_wait_time" id="tcb_enable_wait_time" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_enable_wait_time' ), false ) . ' />';
	}

	public function tcb_wait_time_url() {
		echo '<p>The URL to the Salesforce endpoint that returns Wait Time information.</p>';
		echo '<input name="tcb_wait_time_url" id="tcb_wait_time_url" rows="1" type="text" style="width:100%;" value="'.get_option( 'tcb_wait_time_url' ).'"/>';
	}

	public function tcb_wait_time_message() {
		echo '<textarea name="tcb_wait_time_message" id="tcb_wait_time_message" rows="5" style="width:100%;" type="text">'.get_option( 'tcb_wait_time_message' ).'</textarea>';
	}

	public function tcb_enable_trevorspace_user_count() {
		echo '<p>If enabled the system will check Trevorspace for the count of online users. If the count is greater than 5, a message will be displayed.</p>';
		echo '<input name="tcb_enable_trevorspace_user_count" id="tcb_enable_trevorspace_user_count" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_enable_trevorspace_user_count' ), false ) . ' />';
	}

	public function tcb_in_uat() {
		echo '<p>If enabled the chat button will open in the UAT sandbox chat system for testing. Only check this if you would like to use UAT chat system.</p>';
		echo '<input name="tcb_in_uat" id="tcb_in_uat" type="checkbox" value="1" ' . checked( 1, get_option( 'tcb_in_uat' ), false ) . ' />';
	}

	/**
	 * Gets the last 10 logs Logs
	 */
	private function get_ip_logs() {
		global $wpdb;

		$tablename = $wpdb->prefix . 'tcb_ip_log';
		$logs = $wpdb->get_results(
			"
				SELECT *
				FROM $tablename
				ORDER BY created_at DESC
				LIMIT 10
			"
		);
		return $logs;
	}

	/**
	 * Export the last 24 hours of IP logs as CSV
	 */
	private function download_ip_logs() {
		global $wpdb;
		$tablename = $wpdb->prefix . 'tcb_ip_log';
		$logs = $wpdb->get_results(
			"
				SELECT *
				FROM $tablename
				WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 DAY)
			"
		);

		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="ip_logs.csv";');
		
		$f = fopen('php://output', 'w');

		$headers = [];
		foreach((array) $logs[0] as $key=>$value) {
			$headers[] = $key;
		}
		fputcsv($f, $headers); 
		
		foreach ($logs as $log ) {
			fputcsv($f, (array) $log);
		}
	}
}
