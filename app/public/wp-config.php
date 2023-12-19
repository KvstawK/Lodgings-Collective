<?php
define('WP_CACHE', true); // WP-Optimize Cache
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
define( 'DB_NAME', 'local' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'root' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
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
define('AUTH_KEY',          'CegqoE14 a^Kz<+weSq-|p?%bBb[E|L</w%>4HOP)}$Fv^K*Ht^YO/Z#.-#6}M$/');
define('SECURE_AUTH_KEY',   '2->yV]gM*14%4t|.Q1T0rOzX$|C|V8-qC?MmPB1-a9TnC-wSYb`{d_(=-E0*gzT!');
define('LOGGED_IN_KEY',     'QVA *.1{Pdv-nw1g(w/36;|mZE<?i`!mrPpa _gC|Mg+n_~>OMfi_dq^mz%^sEpO');
define('NONCE_KEY',         'cHRM.@%/cj&MZ1Wp{K2`B+?&j{+?*brZ}8oG/cTL 86k(LFsM=7Zs~W}26~8R| R');
define('AUTH_SALT',         '=se?_%72}[o*AV}9hXj~>Qen2/nIxt@$3lK&)!4N}G5Rza]CHiJl+(g!]zK|)~-g');
define('SECURE_AUTH_SALT',  'QPEhXMRheU]lrb+YWjoo;K9jceHXSgd>;]Xz5}tSb/[N|E0Al9qAKHl>)Bm9vyb~');
define('LOGGED_IN_SALT',    '5A}-P_;lsz*ed1SnVm:8sk0 9;7bqqWPaK>.D[} MZ()$Du^Um&`>-u%QepPI`DE');
define('NONCE_SALT',        'Hg,/*m7FPqmATCL#Bl2Wm)nnSi/#/wc-7$,i&Q|Lqc5v7V^?B#*Sl-*~84<bzfy[');
define( 'WP_CACHE_KEY_SALT', '!MB#,sj~-%}q|T:2RQPDZo8t~h$OxGxK[H((v.q,0 m oc_15x8j65-;T*H?Spg@' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* Add any custom values between this line and the "stop editing" line. */
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
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('DISALLOW_FILE_EDIT', true);
