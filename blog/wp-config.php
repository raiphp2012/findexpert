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
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/carashmmi/public_html/visheshagya.in/blog/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'visheshagya1');

/** MySQL database username */
define('DB_USER', 'visheshagya');

/** MySQL database password */
define('DB_PASSWORD', 'visheshagya');

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
define('AUTH_KEY',         'GnIcIZIV6zdJP2lhpnpQoDRu39JVmxEnZN1XuskpBW2jBVkZLQHG3LOnuY0AmctU');
define('SECURE_AUTH_KEY',  'I3ApsJVT6qHa5mX1f55pmNC97Z8R3h0rwvX7Z6urvtHwxXqgulTnSDJjTMNRvNdu');
define('LOGGED_IN_KEY',    '6BxurhwX7rfUU4P7e6TGQFyFRh9r41yQiV3Fexqf75b6HzxzLKkqABPugaU9jwcL');
define('NONCE_KEY',        'ToN2FJ1Sl4ALkb6alfbLAWqI7Lbu6hPRMkESSjUi4PFEIPCtZHr9dHZY5zwHIHSm');
define('AUTH_SALT',        'p8iEq3rhGfDLkvyZkcVLONx8BJMAJ0TSzxSHPLh473IGCSRtb7WsOCMuGA2JEM4C');
define('SECURE_AUTH_SALT', 'KOmGlw6NrXLocQRt7VpMsKXQ6TJ53AOuZ1gwKb0RtZP2bGGCvAqmSjflfTYBMgDe');
define('LOGGED_IN_SALT',   'dT1KLvMYeWHS9Zs19U4FRYA8ogpft8edWwYYMVvDeVyl4em5aMM3OcVQjsd4d04K');
define('NONCE_SALT',       'Iqf2wThD6zQMQOiVtVjzwIsi0kWtAJetliUV44PKm0HFg66YRXW3QE7e2JE3E0tx');

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
define('WP_MEMORY_LIMIT', '64MB');

