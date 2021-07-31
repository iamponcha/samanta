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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'samanta' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'fQq;n|{p)%K8w)APf:8EUHq~w@L9Wb?S}5ZIQ6+#t3(A%4*H$N-&7##T%E[6X/YJ' );
define( 'SECURE_AUTH_KEY',  'l,}IchiiZjU=67RuM@0j@QdlMldxy~^2bI%5!1OWBE;hYxZ#$b^cO}WNx`97#G(~' );
define( 'LOGGED_IN_KEY',    'NhE{nBrPAj(Uo)q` fg7C9krbA4Fq#1ARzjZ@UcF7jR>HO-vzt@<lS<YxnJ)iKdz' );
define( 'NONCE_KEY',        '|B/SpjrK_4|^4pOclDT+Jh73=4u5Am=&QddTPR/9p+`nu9=hFJ^cD`kV^lPpx%=o' );
define( 'AUTH_SALT',        'qF)P@v<`W^aJzp.V)U[sA3B+&cI}O#YS%rIl@g}oK fYjJ#w)[YQuEt7|6eL/OK7' );
define( 'SECURE_AUTH_SALT', '^L7gW3@CD(ACS6Q(EQBs^IWa:X^ddJ[gJFl{icTcMmrrP;JRVh3i@*`C=~s!46bN' );
define( 'LOGGED_IN_SALT',   '6 `{vbR*tb%R0c$WR%qp5~^>A<!NSM^E)b#gvf5)`J|dh}I4hZPHQ1sbk@.WQ)7`' );
define( 'NONCE_SALT',       '3N==f:sAfOkT_`tH$]+8`3Dl ~])Z_(^N>j#KefI3k!a!S(Z?n?u+S<K]y^t0B=G' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
