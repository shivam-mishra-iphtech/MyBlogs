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
define( 'DB_NAME', 'MyBlogs' );

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

define('FS_METHOD', 'direct');
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
define( 'AUTH_KEY',         'i,#=o7Xh~^KjD-Xt9<q{Wa@P(rYix|iCN_3Y+&mU^I!JJA`0B&-Cu@|q -,(U_70' );
define( 'SECURE_AUTH_KEY',  'XD3d.t=}Y]cWDG3HKTh>n.{Q$Yxe}$&Eh,q8D-?Y&u1`WovV7L#1HHiUy5(VbmvP' );
define( 'LOGGED_IN_KEY',    '#%:HJ[dCi(_<MZ3+>v}5_>V6!2d.eD)k&2)xb(Ic_g89{#{6:?yNa6&Q3#;GD$e^' );
define( 'NONCE_KEY',        '@@EbhoAk1A/@l#rD;&8Ud&C.5z6AO*$3&{EA&YfPENTYr9TvH8*{zbsc[B{1Q zK' );
define( 'AUTH_SALT',        'wYq;ka0[RYMH>nwy,N|y?kN<wSIMN<N/qPYY:^lj;Hqw!w,B~4a5FvS1e}BeLF2=' );
define( 'SECURE_AUTH_SALT', 'EA)TnY|WkQ`-;<H)sthY*0KA(&syM$n-FZG`Q=+=lEV,&Y/,%Aeuo*7fdq*(gW0N' );
define( 'LOGGED_IN_SALT',   't+:k!3Zi4Tuva|X|H.|TZeTttyPV=]zt~q}C:2awvq@G(; c.!?{U!OG*rtybDFX' );
define( 'NONCE_SALT',       ',$voz5e&r|`>Ec%OaMLEYF9t^zf!:5I92OgK^ %W4|^i96.h$;w5wd#>?7Zo;uje' );

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
