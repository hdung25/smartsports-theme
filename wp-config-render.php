<?php
/**
 * WordPress Config — Render.com Production
 * Uses SQLite via sqlite-database-integration plugin (no MySQL needed)
 */

// ---- Database: SQLite (via plugin) ----
// SQLite settings are handled by wp-content/db.php (copied from plugin)
// No DB_NAME / DB_USER / DB_PASSWORD needed for SQLite
define( 'DB_NAME',      'wordpress_sqlite' );
define( 'DB_USER',      'root' );
define( 'DB_PASSWORD',  '' );
define( 'DB_HOST',      'localhost' );
define( 'DB_CHARSET',   'utf8mb4' );
define( 'DB_COLLATE',   '' );

// ---- SQLite file location ----
define( 'DB_DIR',   WP_CONTENT_DIR . '/database/' );
define( 'DB_FILE',  'wordpress.db' );

// ---- Authentication Keys (production-safe) ----
define( 'AUTH_KEY',         'r7Kp2#mQ9vL$nX8wR3yT6uA1jC4hB_eG0z' );
define( 'SECURE_AUTH_KEY',  'd8Fn3@mM!qK6pW9sE2xV5tU0rJ4bH_cI1z' );
define( 'LOGGED_IN_KEY',    'g7No4%oL&rJ1mY8uD5wS3vQ6tA2fC_eH0z' );
define( 'NONCE_KEY',        'h0Ap5#pM$sK8nZ3xW6yV2uB9eG1jD_rF7z' );
define( 'AUTH_SALT',        'i1Bq6@qN!tL9oA4yX7zA8vC0fH2kE_sG8z' );
define( 'SECURE_AUTH_SALT', 'j2Cr7#rO%uM0pB5zA9aY4wD1gI3lF_tH9z' );
define( 'LOGGED_IN_SALT',   'k3Ds8$sP&vN1qC6bB0zA5xE2hJ4mG_uI0z' );
define( 'NONCE_SALT',       'l4Et9%tQ!wO2rD7cC1aA6yF3iK5nH_vJ1z' );

// ---- Table prefix ----
$table_prefix = 'wp_';

// ---- Site URL (auto-detect for Render) ----
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
    $protocol = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) ? 'https' : 'http';
    define( 'WP_HOME',    $protocol . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_SITEURL', $protocol . '://' . $_SERVER['HTTP_HOST'] );
}

// ---- Performance & Security ----
define( 'WP_DEBUG',           false );
define( 'WP_DEBUG_LOG',       false );
define( 'WP_DEBUG_DISPLAY',   false );
define( 'SCRIPT_DEBUG',       false );
define( 'WP_POST_REVISIONS',  3 );
define( 'DISALLOW_FILE_EDIT', true );  // Block theme editor in admin (security)

// ---- Absolute path ----
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
