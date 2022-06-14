<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mywebsite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'l:V:2jexV.Ux79M-WD)x$}5OAzm</6#S!x#j/XkTe.i24HvM5,l7WZUdDi,juN_:' );
define( 'SECURE_AUTH_KEY',  ';(?o$NK2jN2Qc_x_z0T+9=RFL9KgpU<{|=?cH`!Mx_%{hDDo5vV?Ys@Q`fq.Tv1g' );
define( 'LOGGED_IN_KEY',    'QeI.jWD0I~[ KATZs?4ED i/VI<=>u%/r5a&4;<l>ZSq)={Pe1cWS}0-z>w[#gGz' );
define( 'NONCE_KEY',        'O1gY[m(Zs:%Fj@Q,#?Rnhp@rec}c]?WQWEFGa*8/Rnk7x7zfwK*j5XRiK*:)`!q)' );
define( 'AUTH_SALT',        'dtGI_[B~Z]{CB.F4Idb{G/[7R%x7`~@2_ k>Lr7T-brR 4=X}M%tjUwAZ.r9d@8x' );
define( 'SECURE_AUTH_SALT', 'Ec{c@uHC`gGw]@U/u&[V@_u|]%b|T8_FRR|BBOXDuL= ;tu9O]%TUj#UaaA[`u*X' );
define( 'LOGGED_IN_SALT',   '@);En@u]tT7WxaN|?B[8@4c{0441LUTUFd1<[O%xYxTMcOi8er>;h!j^4G|Gx?ek' );
define( 'NONCE_SALT',       'e wnXAuU]`]W8&z8|D66W<=M_*^noO:z.j{h&XGBlWYk,PE$cF9-/Ook>o(0d{%D' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
