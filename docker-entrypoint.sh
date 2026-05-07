#!/bin/bash
set -e

WP_PATH="/var/www/html"
SITE_URL="${SITE_URL:-https://smartsports-demo.onrender.com}"

echo "==> Smart Sports: Starting WordPress setup..."

# ---- Copy db.php from SQLite plugin (enables SQLite mode) ----
if [ ! -f "$WP_PATH/wp-content/db.php" ]; then
    echo "==> Enabling SQLite database driver..."
    cp "$WP_PATH/wp-content/plugins/sqlite-database-integration/db.copy" \
       "$WP_PATH/wp-content/db.php"
fi

# ---- Fix permissions ----
chown -R www-data:www-data "$WP_PATH/wp-content"
chmod -R 755 "$WP_PATH/wp-content"

# ---- Install WordPress if not already installed ----
if ! wp core is-installed --path="$WP_PATH" --allow-root 2>/dev/null; then
    echo "==> Installing WordPress core..."
    wp core install \
        --path="$WP_PATH" \
        --url="$SITE_URL" \
        --title="Smart Sports" \
        --admin_user="admin" \
        --admin_password="SmartSports2026!" \
        --admin_email="hahuyd25@gmail.com" \
        --skip-email \
        --allow-root

    echo "==> Activating Smart Sports theme..."
    wp theme activate smartsport --path="$WP_PATH" --allow-root

    echo "==> Creating Home page and setting as front page..."
    PAGE_ID=$(wp post create \
        --path="$WP_PATH" \
        --post_type=page \
        --post_title="Home" \
        --post_status=publish \
        --porcelain \
        --allow-root)
    wp option update show_on_front page  --path="$WP_PATH" --allow-root
    wp option update page_on_front "$PAGE_ID" --path="$WP_PATH" --allow-root

    echo "==> Removing default themes and plugins..."
    wp theme delete twentytwentythree twentytwentyfour \
        --path="$WP_PATH" --allow-root 2>/dev/null || true
    wp plugin delete hello akismet \
        --path="$WP_PATH" --allow-root 2>/dev/null || true

    echo "==> WordPress setup complete!"
else
    echo "==> WordPress already installed, skipping setup."
fi

echo "==> Starting Apache..."
exec "$@"
