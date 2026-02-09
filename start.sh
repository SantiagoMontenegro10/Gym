#!/bin/sh

echo "🔧 Ajustando permisos..."
chown -R www-data:www-data /var/www/html
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🧹 Limpiando caché de Laravel..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo "🚀 Ejecutando migraciones..."
php artisan migrate --force

echo "🌐 Iniciando Apache..."
apache2-foreground
