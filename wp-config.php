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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mediaper_perawat' );

/** MySQL database username */
define( 'DB_USER', 'mediaper_perawat' );

/** MySQL database password */
define( 'DB_PASSWORD', '@p731S4ER-' );

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
define( 'AUTH_KEY',         'wqsnuypk7vmlabvj769igi5jgeyobmqfudhufchgzvyllfs6drfnugq6jkooonqb' );
define( 'SECURE_AUTH_KEY',  'jj16dyuc7bxm2gwtzdgqksnuws6gaunbyjglhldpwngj588alrpbneavcn7lvv0t' );
define( 'LOGGED_IN_KEY',    '2gkwu09imynty7pyxqb93qhdslgsz2ofogh9h6vmuczqqmbr6mguwrvt0eekrgbx' );
define( 'NONCE_KEY',        'dkmfnhajoqp7dnefxbu6tnnk4cdcaza23blrpae43f36avepyvjgfurcv9tocign' );
define( 'AUTH_SALT',        'zybkaukoznp60qfhbfyl6pii4v0qbde28l1lgry0yhosiljut7rm6eu8q6pxiz7u' );
define( 'SECURE_AUTH_SALT', '78zeb6jkjz6cmsgfyjwc9a55gtdktvsezjti9rd7xwfuof8s5l8d3tkjzwbtcsrp' );
define( 'LOGGED_IN_SALT',   'ydj4gvembqtuhzoshdikfxn3vaewb5lp1uo1yrklmfw1gyv6roz8vkz1srukh2da' );
define( 'NONCE_SALT',       'cbj4k295u3jlypwqx3axmwzjjfh3exxop7i20vzwdgk5mkbbggiw8zd1hcqpwum1' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp1c_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
