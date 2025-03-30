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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'xB:H*@uoZ&S5V:A>BzdlJGVF|5%E1dm`7hFe9^ ez2MX^1Rg[8qILZDaJMXBo?[G' );
define( 'SECURE_AUTH_KEY',  ' gQ[ uqJ(t~aq><4A`:.wuE{7$mA/WJe}FE[pAo$3CS>N!:=a9yH/zj@2W~=;c;&' );
define( 'LOGGED_IN_KEY',    '?/+DVS$h!:v^M!E?i@h7m(P#z6=uaKqa-BcX=;X-%`DTYtsM6fkceY;hNrlg(9DG' );
define( 'NONCE_KEY',        '%H1m!$1-q %r1`2R2c&Yw=kB(mQRMVpO#7IY[e(~l,k;jQ^XcZ!Xg-OYh=K>zLY^' );
define( 'AUTH_SALT',        ')X[h5F|oF`JV:e3UY82^*{z#ROpWn]ERx,%eo`4iijQ$Vt;l;^,#fNwx3TOIfF`J' );
define( 'SECURE_AUTH_SALT', '7#AYtM)zJAbAz`c=k~8lyE>kqp2K2[$qJ,qF^8jzSjWw38L`.Tn>u({rs|7t,)0P' );
define( 'LOGGED_IN_SALT',   '(y~?*(`KzX^7f)r59]LMR][X(FXrt@sw Wia}^<Emv:d+(9*JTBi5EDzs|mg-Rq-' );
define( 'NONCE_SALT',       'NWHO=zQ8-{4tlDV(}i&{22;h}iaq%,#1>P_;lF|~iGnm_H|4a;ER~Hzy;;BQ=qW/' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
