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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'element_kit' );

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
define( 'AUTH_KEY',         '.&.bP~wva6m?b0YkyIcGera[2btK6n;f,c{] YR71|M[eL@e1z90om+tQ/.7K*@K' );
define( 'SECURE_AUTH_KEY',  'kq7b!}|R?s0e6=qD_7#&k2}9*7~5Q13-aTraAQ8y3+(qfdcS0_aE@@~TG3|?09sJ' );
define( 'LOGGED_IN_KEY',    '0h=b2S$#g W7x^m)M=]N&,S;X_19?X]f+n+yP7}p2!/9U3<^JEM$ a07lgUJ<.Uh' );
define( 'NONCE_KEY',        '3k@,Tj_bI(M/zC9eSy24>7&dB:rL..<[USMlTIIWvV@^=YV(0J,?z=>U~ryz6{+;' );
define( 'AUTH_SALT',        'W5RRS2Spc9ior(tZ}1;OF2wit;UK:@#g7L64wArJN]=s-+|T!B-xj(Q&zvug+=_3' );
define( 'SECURE_AUTH_SALT', 'brxY~m32566qozEGm=W: u=wM33,uud1]Ke5T!b0_dD>2b+i]:>2ZdgpUi(K]wY2' );
define( 'LOGGED_IN_SALT',   '3){M{G5GTk,FjI+ye:o1d:e53@hSJ7)=WuL;gS){$?Pf!f9|]&^FwX&&t_.]0|+G' );
define( 'NONCE_SALT',       'v0.4FUol|9L%{k;9h=q.kh:~paJ$o>/d=$F*0^L{Yf42jivOt=3u.4uV$o[h*#KY' );

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
