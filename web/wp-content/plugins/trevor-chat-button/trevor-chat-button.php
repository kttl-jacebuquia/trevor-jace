<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.remedyone.com
 * @since             1.0.0
 * @package           Trevor_Chat_Button
 *
 * @wordpress-plugin
 * Plugin Name:       Trevor Chat Button
 * Plugin URI:        https://thetrevorproject.org
 * Description:       Enables a shortcode to display a chat button to US visitors during certain times of day. Updated MaxMind GeoIP DB on 2019-06-27
 * Version:           1.0.10
 * Author:            Simon Hunter
 * Author URI:        https://www.remedyone.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       trevor-chat-button
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TCB_PLUGIN_NAME_VERSION', '1.0.10' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-trevor-chat-button-activator.php
 */
function activate_trevor_chat_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trevor-chat-button-activator.php';
	Trevor_Chat_Button_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-trevor-chat-button-deactivator.php
 */
function deactivate_trevor_chat_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-trevor-chat-button-deactivator.php';
	Trevor_Chat_Button_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_trevor_chat_button' );
register_deactivation_hook( __FILE__, 'deactivate_trevor_chat_button' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-trevor-chat-button.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_trevor_chat_button() {

	$plugin = new Trevor_Chat_Button();
	$plugin->run();

}
run_trevor_chat_button();
