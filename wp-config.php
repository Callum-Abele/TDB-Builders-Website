<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'N@NqH[?,Qg~$+axNeJ3%S9ZO<p;3P@tKDu``M&8| rW)!+zcCi=~e[uAr>5|UW?f');
define('SECURE_AUTH_KEY',  'Qm(|.9:ogsVh)`Bj+&2?LHjxE|Ze+;WmQ]l#J],XA&c9w1YugD|OartTR:EK{~Az');
define('LOGGED_IN_KEY',    'r11fS{}vd<5lGMS^t_M0~VsS<yh?a:>@n1ZHQP^k<0FA}7O/.CFJ8Fm)xI|*G|0o');
define('NONCE_KEY',        '`N{2 _fNZoA]-|Mh-ON#q`-]$NV|.P!mr,vYM>?C.3ac;/+(&H-(d |YwUdr|0Dq');
define('AUTH_SALT',        'B ]ALN)D:ZAJj4nGZp}6|8yF%+ZAAZ 1tDZ9X|N-Od4kl:;c]?R8`!r#QR(2}iox');
define('SECURE_AUTH_SALT', 'eP|B<gU#9-I0z@(4-:_)1j+i}$G6GaNV|h*n/41B?JR:IzW$Iw sc~_((`|oaAO+');
define('LOGGED_IN_SALT',   '.Od-gWQqDfb,8p-XK4uk7x+?p-=>v,Z.Xx9Eva-+m|(oK[kN.0.nOL+U&=[0%g8l');
define('NONCE_SALT',       'UrZ$uJ$+frY[Dg(hjp:v3z;^{7+>dt MXS-a$ZK9CKcZW_%D{O1/0*h7OgcBOR-D');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
