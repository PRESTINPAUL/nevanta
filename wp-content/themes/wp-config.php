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
define('DB_NAME', 'tv');

/** MySQL database username */
define('DB_USER', 'tv');

/** MySQL database password */
define('DB_PASSWORD', 'JbFcO9gOcW');

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
define('AUTH_KEY',         'l@1^G;c7X/TJ=8*#M/[C`hOgaOA#GpE0(6bD ?,cSliL(]=kbFV-_2^4[?s]$5,O');
define('SECURE_AUTH_KEY',  '#3N;O#WYM-dmxT.PXOhMAzmu_&uf}oZ@mU ;D8#k4NF&.S@cu:NVyqX%k(8^D$n4');
define('LOGGED_IN_KEY',    'a-XZ.3fg| DzL-1^!4)R5EB#ns2L-w;q_vbqc{[7/^[J&oR0QP0P1dcPT!X]Bx8L');
define('NONCE_KEY',        ' YpUqLcy/R[-m7Go+e+N`_PJ_*0eC,EOz:b$!fH ?uQb|?;s?1_n@5_!Dr[0G~>+');
define('AUTH_SALT',        'o$[:TaE>c~EM6c#72oZ>GUHq27q>Y+6## BUoqgRK-$GkZ$k*{tzz~WKHNZ-s1G ');
define('SECURE_AUTH_SALT', 'P>vj9|95S6,-pLuoUTsUi}PLbVxQPNU`3LG+nH0]mksay.N;A+oL~7.,?_-EIG[G');
define('LOGGED_IN_SALT',   'a),l?OsBmU C4u7q@UAh :o0#@wC )R&qph#<|h{P iTFn`*26tPTBa),:P_1s~F');
define('NONCE_SALT',       '0Hnd{9^kKRmUyYklA-+<$/+5>?f@s)c1H}<{ aP!um< 5ltpDF~Y,xlVYJ`LCrN]');

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

//define('FORCE_SSL_ADMIN', true);

/*if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
       $_SERVER['HTTPS']='on';
*/
