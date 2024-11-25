# Usar una imagen base de PHP con soporte para Composer
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar los archivos del backend a la imagen
WORKDIR /var/www/backend
COPY ./backend /var/www/backend

# Dar permisos a la carpeta de almacenamiento
RUN chown -R www-data:www-data /var/www/backend/storage

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando para ejecutar PHP-FPM
CMD ["php-fpm"]
