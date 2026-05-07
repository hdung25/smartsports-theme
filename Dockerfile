# ============================================================
# Smart Sports WordPress — Docker Image for Render.com
# Strategy: PHP + Apache + WordPress + SQLite (no MySQL needed)
#            WP-CLI pre-installs WordPress during BUILD
#            → SQLite DB baked into image, no external DB required
# ============================================================
FROM php:8.1-apache

# ---- System dependencies ----
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    unzip \
    curl \
    less \
    sudo \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_sqlite intl exif \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ---- Enable Apache modules ----
RUN a2enmod rewrite headers expires

# ---- PHP config ----
RUN echo "upload_max_filesize = 64M\n\
post_max_size = 64M\n\
memory_limit = 256M\n\
max_execution_time = 120\n\
file_uploads = On" > /usr/local/etc/php/conf.d/wordpress.ini

# ---- Apache config (allow .htaccess) ----
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# ---- Install WP-CLI ----
RUN curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# ---- Download WordPress core ----
RUN wp core download \
    --path=/var/www/html \
    --version=latest \
    --allow-root \
    --force

# ---- Download SQLite Database Integration plugin ----
RUN curl -L -o /tmp/sqlite-plugin.zip \
        https://downloads.wordpress.org/plugin/sqlite-database-integration.1.7.0.zip \
    && unzip -o /tmp/sqlite-plugin.zip \
        -d /var/www/html/wp-content/plugins/ \
    && cp /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy \
        /var/www/html/wp-content/db.php \
    && rm /tmp/sqlite-plugin.zip

# ---- Create SQLite database directory ----
RUN mkdir -p /var/www/html/wp-content/database

# ---- Copy WordPress theme ----
COPY . /var/www/html/wp-content/themes/smartsport/

# ---- Copy WordPress config ----
COPY wp-config-render.php /var/www/html/wp-config.php

# ---- Create .htaccess for WordPress permalinks ----
RUN echo '# BEGIN WordPress\n\
<IfModule mod_rewrite.c>\n\
RewriteEngine On\n\
RewriteBase /\n\
RewriteRule ^index\.php$ - [L]\n\
RewriteCond %{REQUEST_FILENAME} !-f\n\
RewriteCond %{REQUEST_FILENAME} !-d\n\
RewriteRule . /index.php [L]\n\
</IfModule>\n\
# END WordPress' > /var/www/html/.htaccess

# ---- Pre-install WordPress with WP-CLI (baked into image) ----
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && sudo -u www-data wp core install \
        --path=/var/www/html \
        --url="https://smartsports-demo.onrender.com" \
        --title="Smart Sports" \
        --admin_user="admin" \
        --admin_password="SmartSports2026!" \
        --admin_email="hahuyd25@gmail.com" \
        --skip-email \
        --allow-root

# ---- Activate theme + configure front page ----
RUN sudo -u www-data wp theme activate smartsport \
        --path=/var/www/html --allow-root \
    && PAGE_ID=$(sudo -u www-data wp post create \
        --path=/var/www/html \
        --post_type=page \
        --post_title="Home" \
        --post_status=publish \
        --porcelain \
        --allow-root) \
    && sudo -u www-data wp option update show_on_front page \
        --path=/var/www/html --allow-root \
    && sudo -u www-data wp option update page_on_front "$PAGE_ID" \
        --path=/var/www/html --allow-root

# ---- Activate SQLite plugin ----
RUN sudo -u www-data wp plugin activate sqlite-database-integration \
        --path=/var/www/html --allow-root 2>/dev/null || true

# ---- Delete default themes & plugins ----
RUN sudo -u www-data wp theme delete twentytwentythree twentytwentyfour \
        --path=/var/www/html --allow-root 2>/dev/null || true \
    && sudo -u www-data wp plugin delete hello akismet \
        --path=/var/www/html --allow-root 2>/dev/null || true

# ---- Final permissions ----
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
