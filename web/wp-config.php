<?php
/**
 * Pantheon platform settings.
 *
 * IMPORTANT NOTE:
 * Do not modify this file. This file is maintained by Pantheon.
 *
 * Site-specific modifications belong in wp-config.php, not this file. This
 * file may change in future releases and modifications would cause conflicts
 * when attempting to apply upstream updates.
 */

define( 'WP_MEMORY_LIMIT', '512M' );

// ** MySQL settings - included in the Pantheon Environment ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname; on Pantheon this includes a specific port number. */
define( 'DB_HOST', $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Increase Memory limit */
define( 'WP_MEMORY_LIMIT', '512M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Changing these will force all users to have to log in again.
 * Pantheon sets these values for you. If you want to shuffle them you must
 * contact support: https://pantheon.io/docs/getting-support
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', $_ENV['AUTH_KEY'] );
define( 'SECURE_AUTH_KEY', $_ENV['SECURE_AUTH_KEY'] );
define( 'LOGGED_IN_KEY', $_ENV['LOGGED_IN_KEY'] );
define( 'NONCE_KEY', $_ENV['NONCE_KEY'] );
define( 'AUTH_SALT', $_ENV['AUTH_SALT'] );
define( 'SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT'] );
define( 'LOGGED_IN_SALT', $_ENV['LOGGED_IN_SALT'] );
define( 'NONCE_SALT', $_ENV['NONCE_SALT'] );
/**#@-*/

/** A couple extra tweaks to help things run well on Pantheon. **/
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
	// HTTP is still the default scheme for now.
	$scheme = 'http';
	// If we have detected that the end use is HTTPS, make sure we pass that
	// through here, so <img> tags and the like don't generate mixed-mode
	// content warnings.
	if ( isset( $_SERVER['HTTP_USER_AGENT_HTTPS'] ) && $_SERVER['HTTP_USER_AGENT_HTTPS'] == 'ON' ) {
		$scheme           = 'https';
		$_SERVER['HTTPS'] = 'on';
	}
	define( 'WP_HOME', $scheme . '://' . $_SERVER['HTTP_HOST'] );
	define( 'WP_SITEURL', $scheme . '://' . $_SERVER['HTTP_HOST'] );
}
// Don't show deprecations; useful under PHP 5.5
error_reporting( E_ALL ^ E_DEPRECATED );
/** Define appropriate location for default tmp directory on Pantheon */
define( 'WP_TEMP_DIR', $_SERVER['HOME'] . '/tmp' );

// FS writes aren't permitted in test or live, so we should let WordPress know to disable relevant UI
if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], array( 'test', 'live' ) ) && ! defined( 'DISALLOW_FILE_MODS' ) ) {
	define( 'DISALLOW_FILE_MODS', true );
}

/**
 * Set WP_ENVIRONMENT_TYPE according to the Pantheon Environment
 */
if ( getenv( 'WP_ENVIRONMENT_TYPE' ) === false ) {
	switch ( $_ENV['PANTHEON_ENVIRONMENT'] ) {
		case 'live':
			putenv( 'WP_ENVIRONMENT_TYPE=production' );
			break;
		case 'test':
			putenv( 'WP_ENVIRONMENT_TYPE=staging' );
			break;
		default:
			putenv( 'WP_ENVIRONMENT_TYPE=development' );
			break;
	}
}

if ( file_exists( $lando_wp_config = dirname( __FILE__ ) . '/wp-config-lando.php' ) && isset( $_ENV['LANDO'] ) ) {
	require_once $lando_wp_config;
}


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * You may want to examine $_ENV['PANTHEON_ENVIRONMENT'] to set this to be
 * "true" in dev, but false in test and live.
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy Pressing. */


/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
