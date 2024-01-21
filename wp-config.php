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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'basics' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'k`PX_pfRI/5QHxT>eUk^y35+z:c.u%>=O>$*74:XqMq%AIg[bH<v:abIO&nCp3u ' );
define( 'SECURE_AUTH_KEY',  'R^3WVw~za?}wu]ez!Gat6*PCjyC~TN@b{Nvk6O]_{}{Bl{RzD$y_4[|_?p_X,t*(' );
define( 'LOGGED_IN_KEY',    '*(,~9lwPcQFN%?eoF!N?{`JU9X9ep9Jl2E>#9yfh89_glX. /G=a:z!fO3[jNT([' );
define( 'NONCE_KEY',        'l!@e3?pOp-bg1OzdFd._H@[Ov%5[ rHSRsu4!p6Go)IcdFdvs>gD;TG==<#F@?;0' );
define( 'AUTH_SALT',        '?!CM)_&:u/Nn!?:Loqsi+ :&bKy062$%Hd`fNNDAAPGwUmSIZ4X.DcaBH6(lt@[+' );
define( 'SECURE_AUTH_SALT', 'nC!5.t4?65lS&F$[^i|Q5dbwpsXhojj)SdMNWhZJUWV#J*%!f+`@s^:~6k? Hu=L' );
define( 'LOGGED_IN_SALT',   'BFI~/Xp$%B/2nJN8Rf<lmk1SdZb7.Z5.`YjMef@:)AAXYjhe,SX8kpH21/Z%!7X;' );
define( 'NONCE_SALT',       '#~?do%co^HmhZ(T&-#!)[OCEb:niwxQj1caMn8S2O`X-eQ-~jvI?MntWo@F.c Uh' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
