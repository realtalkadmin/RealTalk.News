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
define('DB_NAME', 'realtalk_news_6');

/** MySQL database username */
define('DB_USER', 'realtalknews6');

/** MySQL database password */
define('DB_PASSWORD', 'superomnemveritatem');

/** MySQL hostname */
define('DB_HOST', 'mysql.realtalk.news');

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
define( 'AUTH_KEY', '28z5Z}7!Yo)mrL}{GWlMnU>5)oc[g;BE0jG!qW&7,Fv=-7W}dc+GNeE0eaR&7p3O' );
define( 'SECURE_AUTH_KEY', 'F7KftL[r)PBtOgk]+q~TDWWO9<]0(#4Y7F7P4JL^W/M2c4G7as25l|E;!=%Kj{0n' );
define( 'LOGGED_IN_KEY', 'MW350dbc{v_*./8lf[?N;31/5wq#s6m$7L$v4-pa_-SE3f`)g$cx%0Zg$Cn>BsGE' );
define( 'NONCE_KEY', 'pxmk#Gc|a{4J*!iip)VWjRxd3MoyMJ!{?R^1hHN7#G]>>v@t`7EbhWI/DF28|B_R' );
define( 'AUTH_SALT', 'Hf1 ;Fpr8hXwOQYefSkZ2XD6IPhl~wt#_[o^rp+d=r&Wf2IjvTwmO4:0s_HRS2ET' );
define( 'SECURE_AUTH_SALT', 'y)Xq6xD+#R6Sk_#SjL>V*@`Q&,2ZXc:B|I>WCy_QeJ/u0Lo%z)f&ARE&i>*Esms2' );
define( 'LOGGED_IN_SALT', '/D2 ZaA82Gk>vvN^gUVvb9;rNPVp+~)o:r=Y3l1sLNpQ*t|u)w=*gN%~G8peeXl4' );
define( 'NONCE_SALT', '}N5uA)r]l)cxFUFDlY#+BO-V(},OS4;:%,5U1vbaWzr=9x=JYv=>nS:!?:v$[DwA' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_d3mxiz_';

define( 'DISALLOW_FILE_EDIT', true );

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

define('WP_CACHE', true);



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

