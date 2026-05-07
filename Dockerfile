FROM php:8.1-apache

# ---- System libraries ----
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

# ---- PHP extensions (all in one step) ----
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip intl exif pdo pdo_sqlite

# ---- Apache ----
RUN a2enmod rewrite headers \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# ---- PHP config ----
RUN printf "upload_max_filesize=64M\npost_max_size=64M\nmemory_limit=256M\nmax_execution_time=300\n" \
    > /usr/local/etc/php/conf.d/wordpress.ini

# ---- WP-CLI ----
RUN curl -o /usr/local/bin/wp \
    https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# ---- WordPress core ----
RUN wp core download --path=/var/www/html --allow-root --force

# ---- SQLite Database Integration plugin ----
RUN curl -L -o /tmp/sqlite.zip \
        "https://downloads.wordpress.org/plugin/sqlite-database-integration.zip" \
    && unzip -o /tmp/sqlite.zip -d /var/www/html/wp-content/plugins/ \
    && rm /tmp/sqlite.zip

# ---- Create required directories ----
RUN mkdir -p /var/www/html/wp-content/database \
    && mkdir -p /var/www/html/wp-content/uploads

# ---- Copy Smart Sports theme ----
COPY . /var/www/html/wp-content/themes/smartsport/

# ---- Copy WordPress config ----
COPY wp-config-render.php /var/www/html/wp-config.php

# ---- .htaccess ----
RUN printf '# BEGIN WordPress\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase /\nRewriteRule ^index\\.php$ - [L]\nRewriteCond %%{REQUEST_FILENAME} !-f\nRewriteCond %%{REQUEST_FILENAME} !-d\nRewriteRule . /index.php [L]\n</IfModule>\n# END WordPress\n' \
    > /var/www/html/.htaccess

# ---- Copy entrypoint script ----
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# ---- Permissions ----
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
