# Usamos PHP 8.2 con Apache como base
FROM php:8.2-apache

# Copiamos el código de nuestra app al contenedor
COPY src/ /var/www/html/

# Habilitamos la extensión de PDO para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Exponemos el puerto 80
EXPOSE 80
