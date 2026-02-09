FROM php:8.3-apache

# 1. Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# 2. Activar mod_rewrite
RUN a2enmod rewrite

# 3. Cambiar DocumentRoot a /public (MUY IMPORTANTE)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# 4. Copiar proyecto
WORKDIR /var/www/html
COPY . .

# 5. Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 6. Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# 7. Instalar dependencias PHP (🔥 clave)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --ignore-platform-reqs

# Ejecutar migraciones (no falla si ya existen)
RUN php artisan migrate --force || true

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


# 8. Exponer puerto
EXPOSE 80
