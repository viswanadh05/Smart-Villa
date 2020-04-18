<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i3967714_wp1');

/** MySQL database username */
define('DB_USER', 'i3967714_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'M(u8Nqk4gJ~v5Jt~Xm&56.#5');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jA9j8IqBNqIeCEPwjl4zvB6CBMj7Tpxfyv4T99nXmlt2wDYyxHgSeN5pMxRTIEBY');
define('SECURE_AUTH_KEY',  'iJec26RpE5lRIMAv7KVFEHVaiXGUi6lhuV9iGjgINvkP4tNBP9o2xE8IeAElgLAG');
define('LOGGED_IN_KEY',    'maJm221MWKKha0LY70bqUNFRaWt4WUuTrp24RaL96E3CA32xQenBVFWAHFleUpt4');
define('NONCE_KEY',        'HnTHgrrO6E0L77xeIrGAotbpvvcNktgtnj28kZT1YXDolagMtFG7KFs41xeWKxMP');
define('AUTH_SALT',        'XbsuwdwjPzPEFANqtFSpf6kaFKlWJjTHIz38NFrW8wxgvQY74DNRvkOfmle5ughY');
define('SECURE_AUTH_SALT', '4jfiaKH3iOm40cfzPy8u4hAyf0FwPDQB2BEhvIFMVVCwv74Mb9cLAzjTbAFQAuMf');
define('LOGGED_IN_SALT',   't55PPQYHyS36QZcsHRdVPbGJZ6OFKNWHVYknEDdOSL79R3crVG3TjC2vQmUSS1Xc');
define('NONCE_SALT',       '74m6q04NaHqd7j1UtSd5PQLqhTr825u3y6YwVrx21Zs3Ji9oBaPbk3ahud8X7MfJ');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
