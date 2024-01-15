<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jobstati_wp_jt3qg' );

/** Database username */
define( 'DB_USER', 'jobstati_wp_nzqjg' );

/** Database password */
define( 'DB_PASSWORD', 'EhD9#DW?*1yh024U' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '(Il;|5&MT63@AZo3W/A4Lff6_9I1HIw--1@3&[LqgO635QmFr6cCYxu7@)N|7!Q6');
define('SECURE_AUTH_KEY', 'GOoWh&3[0p1g2-:Iw[@/1YH4P%7&13l%2)3phou_6vv4QNg~4anIG!N7O(cL5LfF');
define('LOGGED_IN_KEY', '@2M5-iO62!p*V7xd]-jNkV7)M0Nfm6%E02OX_6+DDP46qN4w%Y(827ay82i]+8L|');
define('NONCE_KEY', 'kkZ[6:/zK1--s@8sYDjBJB9nlD*805o5S!Q)IfSHx*211D)/;~Kc:)U(996gSf/9');
define('AUTH_SALT', 'r7]#L!~lgs3dLKz@2jN5G-7-Rg472iANI%TZS*A9I%J&J6IC8*R:fw1w;xGhFh(8');
define('SECURE_AUTH_SALT', '63!M5)8L~LC*d%qjXI5l9+3;0eak(!8Hj3/Dry2J&vw-5vl#O|/|AaUcb49]_;92');
define('LOGGED_IN_SALT', 'U5se18TMW[&@mWXI1n%8&HPz0@69t1x6]u83)E[]O81-x)C+lh26Da8x)2w;FbpF');
define('NONCE_SALT', 'y4Aw5MqG:Zf8:@c;fmFHohtK-g1_29ff;4eN;:4t8X8[71_I8X2i(|e+|rJAT0V!');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kmpSCex1m_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
