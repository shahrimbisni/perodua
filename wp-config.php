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
define('DB_NAME', 'perodua');

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
define('AUTH_KEY',         '1pv-(Emc?.*V_#efcM>}e~5:[tv-PmqnLhspE|Lct)Q(2:(g5?OqA>|(mjjqEVXF');
define('SECURE_AUTH_KEY',  'ET$&KI`cUk{8s=oZ]T9<FEm 4=N@SOQu=$6/uSdbDPm/~;D xzxk<=aG?99L|d*J');
define('LOGGED_IN_KEY',    '2i#lnUHp*@_fYW*n3SG|L`u_UHk[(hfb]&R[lH+_pbSz2[IK#-&}T$YaF*YJ}EDp');
define('NONCE_KEY',        'R@@_8s[se^C|_1R]eTJiCh &|lMz,+O <,%xV&P[4Dt1Pw+2kp4grxkivwF^?u.H');
define('AUTH_SALT',        'EcW^SY9?kHqnWs(VYfv-eMA(}8$aFZ4ieFxFL? Hw.3wUF<i&_^65<!y 0a9C<Vu');
define('SECURE_AUTH_SALT', '1p3#tB2JY K/9VyF<TDd)a$80M9qVj5uiTwl5]MEB}^%n0MD0jJ~2G&Vb1/}`<x%');
define('LOGGED_IN_SALT',   '6|!:eqm|e/XR!<FZ{0!Qi8fz3.o5%hu1()}Xi!$VE?Iws^jBrGk~jLeq3bW&u~@w');
define('NONCE_SALT',       '[aTaB;C_i>fPnUk?WgV[+pnnOM3/HI_x/i?_/8JKU|VB,t?5mQS+.:&zQ` 7hZ6M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pr_';

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
