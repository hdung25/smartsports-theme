FROM php:8.1-apache

# ---- System dependencies (fixed package names) ----
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    libsqlite3-dev \
    unzip \
    curl \
    less \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_sqlite intl exif \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# ---- Enable Apache modules ----
RUN a2enmod rewrite headers

# ---- PHP config ----
RUN printf "upload_max_filesize=64M\npost_max_size=64M\nmemory_limit=256M\nmax_execution_time=120\nfile_uploads=On" \
    > /usr/local/etc/php/conf.d/wordpress.ini

# ---- Apache: allow .htaccess ----
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# ---- Install WP-CLI ----
RUN curl -o /usr/local/bin/wp \
    https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# ---- Download WordPress core ----
RUN wp core download \
    --path=/var/www/html \
    --version=latest \
    --allow-root \
    --force

# ---- Download & setup SQLite Database Integration plugin ----
RUN curl -L -o /tmp/sqlite-plugin.zip \
        "https://downloads.wordpress.org/plugin/sqlite-database-integration.zip" \
    && unzip -o /tmp/sqlite-plugin.zip \
        -d /var/www/html/wp-content/plugins/ \
    && cp /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy \
        /var/www/html/wp-content/db.php \
    && rm /tmp/sqlite-plugin.zip

# ---- Create SQLite database directory ----
RUN mkdir -p /var/www/html/wp-content/database

# ---- Copy Smart Sports theme ----
COPY . /var/www/html/wp-content/themes/smartsport/

# ---- Copy WordPress config ----
COPY wp-config-render.php /var/www/html/wp-config.php

# ---- Create .htaccess ----
RUN printf '# BEGIN WordPress\n\
<IfModule mod_rewrite.c>\n\
RewriteEngine On\n\
RewriteBase /\n\
RewriteRule ^index\\.php$ - [L]\n\
RewriteCond %%{REQUEST_FILENAME} !-f\n\
RewriteCond %%{REQUEST_FILENAME} !-d\n\
RewriteRule . /index.php [L]\n\
</IfModule>\n\
# END WordPress' > /var/www/html/.htaccess

# ---- Set permissions ----
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# ---- Pre-install WordPress with WP-CLI (baked into image) ----
RUN wp core install \
    --path=/var/www/html \
    --url="https://smartsports-demo.onrender.com" \
    --title="Smart Sports" \
    --admin_user="admin" \
    --admin_password="SmartSports2026!" \
    --admin_email="hahuyd25@gmail.com" \
    --skip-email \
    --allow-root

# ---- Activate theme & setup front page ----
RUN wp theme activate smartsport \
        --path=/var/www/html --allow-root \
    && PAGE_ID=$(wp post create \
        --path=/var/www/html \
        --post_type=page \
        --post_title="Home" \
        --post_status=publish \
        --porcelain \
        --allow-root) \
    && wp option update show_on_front page \
        --path=/var/www/html --allow-root \
    && wp option update page_on_front "$PAGE_ID" \
        --path=/var/www/html --allow-root

# ---- Remove defaults ----
RUN wp theme delete twentytwentythree twentytwentyfour \
        --path=/var/www/html --allow-root 2>/dev/null || true \
    && wp plugin delete hello akismet \
        --path=/var/www/html --allow-root 2>/dev/null || true

# ---- Final permissions ----
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
