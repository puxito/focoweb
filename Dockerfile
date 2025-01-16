FROM php:8.1-apache

# Actualiza el sistema y instala las extensiones necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo_mysql

# Habilitar módulos de Apache (opcional, útil para .htaccess y reescrituras)
RUN a2enmod rewrite
