<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo' );

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
define( 'AUTH_KEY',         ';G_OJ<83=h@P,9^;i5S>sp%p%;7AC1ZzzVY_S?BGryB+L;mG1,1Eo#a/%g4J%I5j' );
define( 'SECURE_AUTH_KEY',  '?^1YkO*/;V@:OwcCm_3037QqV$@(_:qP}2rBA_7us]g4J~;NG%r<J(bM,vCeBfs0' );
define( 'LOGGED_IN_KEY',    'InU^ qA}(;EY#^zZU,]2fjmdAdfYuQ;+-=MPw?C((U$o%<(M =!Wn0PM(C9}Fc2x' );
define( 'NONCE_KEY',        'G`1Ekev/k%Li/40A/~G?PB!E_jezyIw5Fcmb9q|p]N,>gLqOm%8zzbp`M;)7WWGD' );
define( 'AUTH_SALT',        'P<$PaiUkuALcg4M:xe]M:wL5u6=6Tn&7B:YJSrW<w?D?qBzg:?iA`*5+)/vIY4)]' );
define( 'SECURE_AUTH_SALT', 'P_,3pWfkS# ByKS$X^NM^sez%@d{;:%XdO_>{?>oP(#PwWRNIg|YAqJh6!AG(:)t' );
define( 'LOGGED_IN_SALT',   '<U}!TBfUT/hrR+=r.!qFA@EPG@t =96j}-FiAXqK*m,@}HF}Ev0sOZI/idQA+!ip' );
define( 'NONCE_SALT',       '+]t5/BT$,FXHXeh{=)l?kB<t-oC&WzPt0:@FPDvaXSn,YZ(ih^iE;vlhJ6&we[@A' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
