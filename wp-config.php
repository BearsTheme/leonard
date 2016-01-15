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
define('DB_NAME', 'leonard');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '.su@tp3G*2:>&`((.;+ck-K<BY-&: f{;ly~t-_*_SN o|(2+7F>Og~N?A$c?8v{');
define('SECURE_AUTH_KEY',  'c(-eNuVJY.x~g!p}I::0RBbWA7pi!_-B6%<cxc.*-TJ0kV@4PU)]a}1 k|Mw]V4/');
define('LOGGED_IN_KEY',    '.a3|bQ3NP^;GQ4JM+JyrKD_wgQ-iQv%~m%dcN5BNCGk)-& 6=`d+R4f6)*,vm_`5');
define('NONCE_KEY',        ':|H)fBf=jy`XK-4QRf51:<7>Q->hK.Lb`hw|p-%5{~p)8pWXk9mK01xRIUH?{o8(');
define('AUTH_SALT',        'DgR OR2V[p|u|V4yMAz:+BP32<+f+DD_k-3|&,40l~+J;%Cq?_&6VW}?W:sR0zia');
define('SECURE_AUTH_SALT', 'pMdi[Ekh2dpC_;:E##wT)o(?^~%*{9}fDSpi|)u8$`A=({:f9$3{9Nzs8[e 3Z5_');
define('LOGGED_IN_SALT',   'Q:P2{So2DXeq55f@$6Fy/9D3-CN2(Y=NSD*s~;LLo-aK}wHdN4;t]~O~DW&/j-Pp');
define('NONCE_SALT',       'H~g0Eu@C;zQ:Mxs +r_wS.yx5Q:6Rh+uw1e)!hJQ9BKE;V>D}t{|--CC$s1:NFZ~');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
