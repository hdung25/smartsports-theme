FROM php:8.1-apache

# ---- Step 1: Install system libraries ----
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg-dev \
        libpng-dev \
        libzip-dev \
        libicu-dev \
        libsqlite3-dev \
        sqlite3 \
        unzip \
        curl \
        less \
    && rm -rf /var/lib/apt/lists/*

# ---- Step 2: Configure & install GD ----
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# ---- Step 3: Install other PHP extensions ----
RUN docker-php-ext-install zip intl exif

# ---- Step 4: Install PDO + SQLite ----
RUN docker-php-ext-install pdo pdo_sqlite

# ---- Step 5: Enable Apache modules ----
RUN a2enmod rewrite headers

# ---- Step 6: PHP config ----
RUN printf "upload_max_filesize=64M\npost_max_size=64M\nmemory_limit=256M\nmax_execution_time=120\nfile_uploads=On" \
    > /usr/local/etc/php/conf.d/wordpress.ini

# ---- Step 7: Apache allow .htaccess ----
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# ---- Step 8: Install WP-CLI ----
RUN curl -o /usr/local/bin/wp \
    https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# ---- Step 9: Download WordPress core ----
RUN wp core download \
    --path=/var/www/html \
    --version=latest \
    --allow-root \
    --force

# ---- Step 10: Install SQLite plugin ----
RUN curl -L -o /tmp/sqlite-plugin.zip \
        "https://downloads.wordpress.org/plugin/sqlite-database-integration.zip" \
    && unzip -o /tmp/sqlite-plugin.zip \
        -d /var/www/html/wp-content/plugins/ \
    && cp /var/www/html/wp-content/plugins/sqlite-database-integration/db.copy \
        /var/www/html/wp-content/db.php \
    && rm /tmp/sqlite-plugin.zip

# ---- Step 11: Create SQLite directory ----
RUN mkdir -p /var/www/html/wp-content/database

# ---- Step 12: Copy theme ----
COPY . /var/www/html/wp-content/themes/smartsport/

# ---- Step 13: Copy WP config ----
COPY wp-config-render.php /var/www/html/wp-config.php

# ---- Step 14: Create .htaccess ----
RUN printf '# BEGIN WordPress\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase /\nRewriteRule ^index\\.php$ - [L]\nRewriteCond %%{REQUEST_FILENAME} !-f\nRewriteCond %%{REQUEST_FILENAME} !-d\nRewriteRule . /index.php [L]\n</IfModule>\n# END WordPress\n' \
    > /var/www/html/.htaccess

# ---- Step 15: Set permissions ----
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# ---- Step 16: Install WordPress via WP-CLI ----
RUN wp core install \
    --path=/var/www/html \
    --url="https://smartsports-demo.onrender.com" \
    --title="Smart Sports" \
    --admin_user="admin" \
    --admin_password="SmartSports2026!" \
    --admin_email="hahuyd25@gmail.com" \
    --skip-email \
    --allow-root

# ---- Step 17: Activate theme + set front page ----
RUN wp theme activate smartsport --path=/var/www/html --allow-root

RUN PAGE_ID=$(wp post create \
        --path=/var/www/html \
        --post_type=page \
        --post_title="Home" \
        --post_status=publish \
        --porcelain \
        --allow-root) \
    && wp option update show_on_front page --path=/var/www/html --allow-root \
    && wp option update page_on_front "$PAGE_ID" --path=/var/www/html --allow-root

# ---- Step 18: Cleanup defaults ----
RUN wp theme delete twentytwentythree twentytwentyfour \
        --path=/var/www/html --allow-root 2>/dev/null || true
RUN wp plugin delete hello akismet \
        --path=/var/www/html --allow-root 2>/dev/null || true

# ---- Step 19: Final permissions ----
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
