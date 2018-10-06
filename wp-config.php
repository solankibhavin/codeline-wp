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
define('DB_NAME', 'codeline-wp');

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
define('AUTH_KEY',         'FJ y5)cdGGGCk[@i Dg*C*{jA+;2YrM-Mw.XNm}m~? (3<5,+1FHLvK%nSfZ4M!o');
define('SECURE_AUTH_KEY',  'QqX2V-A;=E#C4[7G,oB:@{%%2(9UY]If+.HR=xi?Z]U37Biy9DxeW$CW#V^,x3V.');
define('LOGGED_IN_KEY',    '8xP.&##-Gmp@pHyTF)c>}C#;4112QW6b;)S7C<f6*L;Qy.h[Nr|J6s`4iD3xU1J:');
define('NONCE_KEY',        'aQ-$,vopVhUpnnf8L;fj7=D( =*7nE1AhX[A;K=UTT2n8)|l#3l5]A~lUF&oD,%@');
define('AUTH_SALT',        '`~r%lF)xb:lh0*s;y|&uznj2,X{VQqu)B>skc^2>/Tj?Le1+T! 5%JV/*>bd<|Xq');
define('SECURE_AUTH_SALT', '0Fb-|E5rK,P$EQ=*IDZI4.lp+7=NM3^Do2orvD:39JY5^?o1kw5!?F9w?bX_vx1B');
define('LOGGED_IN_SALT',   'ingY|E7Ech.kEkT5+L5kh,5`^*fevTGa%!NEtYgOnveT6,4zQP*95:h6KDPxIFHR');
define('NONCE_SALT',       'V 7p1#.;jrKOx d}8Y u3tT1qA]RVrbXUJWmz]gFAu}]Y-XD#;+G0*ix+u+Yuhvp');

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
