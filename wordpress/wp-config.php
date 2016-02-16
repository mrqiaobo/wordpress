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
define('AUTH_KEY',         '@R{Lr/f5X-?X[L1JWV^iS=YouE]#00q*|37@{6`CASJ%W_Q,wq<Fa*pdX40H-5sS');
define('SECURE_AUTH_KEY',  'w8zBwvh|ibpS};bufb>x_=/}^qL3ZCe(-!oe:9Q#.N&m!-!Bc/*4QR/^kG?+#*Sx');
define('LOGGED_IN_KEY',    'u~z3gX+%||~<VFyU&+KO7We[05]k{?w:ds89*P{z0QL>WMa]Q-Wwk7kp7]~E@-90');
define('NONCE_KEY',        'L7)8~}h_`qOPN?T7SwY3tD<zWX$%pCw~TlYZ88X=V94V9Lvb@^CEJ%-%iPc#[!(/');
define('AUTH_SALT',        'uXZd!$RT>V[y_k+ixjtA=wQjiL1kY<!f+tXP+CfFA9H|okcra5S5-u}LZEMEwd)J');
define('SECURE_AUTH_SALT', '(#n&v;%;I:0Wqde)mr$+*jr}E9L?i4hAU1Nn#$&kA8R3R}3r$}}fMILR//9,P.Ks');
define('LOGGED_IN_SALT',   'D(O[kj=<4_tPy_(q+{#ePESNE]$?WLDswZH#+1sUw`GuNFt7@ 0p;6A|-1*gfh6g');
define('NONCE_SALT',       'U.I$r})OUoT@h.}FS{|V9Z+/PW6Dk8q1L<{#@v+R7r w++:q2Q3hhmsVH+]b-H2a');

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
