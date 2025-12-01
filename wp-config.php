<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'duecuochi' );

/** Database username */
define( 'DB_USER', 'duecuochi' );

/** Database password */
define( 'DB_PASSWORD', 'Nt8L1faquZMVVkstU0AU' );

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
define( 'AUTH_KEY',         'Y{:2=8F3<s;drw;Id{AoitU zXQ~M*vyZ,t%Bn~^x~NGU.GOPQ07x/ v%V7onf-G' );
define( 'SECURE_AUTH_KEY',  '1 yn+MqaxMT2 ik/**YD@`=}?pN%CYDs3u/2LhrXA9R:(Kr>n[{UtMo0wTT;i=-a' );
define( 'LOGGED_IN_KEY',    'n}Q=>KRx%7,<zPw#FN@<G/ b!alYM;WW-X(1RJco?*%Gh!ehO|dT&beIK^i4t-|c' );
define( 'NONCE_KEY',        'jtTw/3Q$2VRMyCJ<%7VlOT5tY<}V3Mb$ -=0E;% vwXokK53!ysk$>L3%-%HkiPT' );
define( 'AUTH_SALT',        '832hnvT+z}wT)3B%PG:vs.ce1vrv;-oZnMpK9N.LbCRijiUQQU6U0~;/o!<b3/iX' );
define( 'SECURE_AUTH_SALT', '*:>^GQf*>4QncMc-CSXakV)?:b2huwZ1fWXCNauYwn(kt:Cz5dWe5!t%n3DL1RMQ' );
define( 'LOGGED_IN_SALT',   '+i=p9K-6G+w7uD_UlbLt#9fh#EHCFQ5Hh<0h/[x_&h/SyO=5Ea6cc+@-Fe(H2Khm' );
define( 'NONCE_SALT',       ' E_z]`7wE7hj0yPzuo~zn4Srj~O`YX^(jXy(&v3<^63)$D~.[QLq?V-PZq[)_AvO' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
if( isset($_GET['debug']) && $_GET['debug'] === 'true') {
    define('WP_DEBUG', true);
    define( 'SCRIPT_DEBUG', true );
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    define('WP_DEBUG', true);
}
/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */
@ini_set( 'upload_max_filesize' , '2048M' );
@ini_set( 'post_max_size', '2048M');
@ini_set( 'memory_limit', '2048M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
