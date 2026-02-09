#!/bin/bash
set -e

echo "💡 Limpiando caché de Laravel..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache

echo "🔧 Ajustando permisos de storage y bootstrap/cache..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "🚀 Ejecutando migraciones..."
php artisan migrate --force

echo "🌐 Iniciando Apache..."
apache2-foreground
