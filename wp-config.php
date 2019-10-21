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
define( 'DB_NAME', 'fatafat_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pnw*7Rg6{w_1hJ%Vlw!qwEf};nd/.J:kt@s^z#pcM3D8us+f1cqd(^gXs+6Nz59:' );
define( 'SECURE_AUTH_KEY',  'VH;Axb5eB*-md?kk;=A=S.?}K_ySTFd[xQM +0wzP.Yqp.|K-#d7%>`,k+caxWi`' );
define( 'LOGGED_IN_KEY',    'bTObS,F(2yrgkAb~vaMC~-l5|/DQ6`_Y$31C5at6R2(5KD<pH[:%;u-!ZAm?Wevj' );
define( 'NONCE_KEY',        '%!8#]z[ooRCQQeZL]%YgNLn?w_*V#6x3D7!xg=G~A$NK;yog04!nI*ZqlVQ*%yAq' );
define( 'AUTH_SALT',        'zG6!F@:}DOH6;0epx{8#v{dE2Gp[;&uU!M iOba-2Z5*+@5Kh?@E6m?^v:9-e|<l' );
define( 'SECURE_AUTH_SALT', 'sC|6CS>%z!eG|D)`/)eJP`Xqa`ep>-<9R6S!Cwv~}vK ~uvGa+oty1bSR3gu%X^@' );
define( 'LOGGED_IN_SALT',   '/{o${H$oY^2G#]4@+L&m~L{L6QDXtnCqkR_Cay}g.> f<h?<5EkU%`Mq(+B[969M' );
define( 'NONCE_SALT',       '[l*ODfu;(>LbyUIPVHryOqk0l0]]?C+#xd{uC.dnoRVvSxrikANt7.}$B<yRNnk_' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
