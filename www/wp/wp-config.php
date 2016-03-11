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
define('DB_NAME', 'mytrader_base');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'hcto18ykplcgmfwq6pb2ecksyui29usv4wcp7qrr16yi9vjskplwo7wic3ximr3b');
define('SECURE_AUTH_KEY',  'jnpgxcm1nu0tudsvomwzyxomjwxlncuizcrbhrspqxohhoflanhex96udiwjoa05');
define('LOGGED_IN_KEY',    'cl73wtbabajrvzul66vtq9hv5rlvmdqggh4ofxwrrgjx5xdxkum1vbhpwergqsjr');
define('NONCE_KEY',        '7tnwbrsmc4bennoo6qhpvhe3pjr1x3vyrolhpu52klelgtmpozukphrpaa6tbxua');
define('AUTH_SALT',        'y3unn0hfv1idpuis4ty1vxekfiwwce8bmlakmglimfsmbs7rsd7lbzsi8g6zkigd');
define('SECURE_AUTH_SALT', 'genxxdcwmman4amrdnth4muzpwyhfoqayysmm76vrjgubwdyl2rdwea94htepx7g');
define('LOGGED_IN_SALT',   'nioqnp2cnnkkhaytve980pa0inbzs6ltmlvg600ktzqkovgcxsfiqobkmoqts7wz');
define('NONCE_SALT',       '8upyyeacgyqdoev7zrste2x3vhnve3urwu6uiylmc7s5btdtl9t1gei5ouqxcajc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplo_';

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
