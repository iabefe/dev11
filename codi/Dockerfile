# Usamos una imagen base con PHP 8.3 y Apache
FROM php:8.3-apache

# Instalamos dependencias necesarias para PHP y Apache
RUN apt-get update && apt-get install -y \
    libapache2-mod-php \
    && rm -rf /var/lib/apt/lists/*

# Habilitamos el módulo de reescritura de Apache (para URLs amigables)
RUN a2enmod rewrite

# Copiamos los archivos del proyecto (HTML y PHP) al contenedor
COPY . /var/www/html/

# Configuramos los permisos de los archivos
RUN chown -R www-data:www-data /var/www/html

# Exponemos el puerto 80 para acceder a la aplicación web
EXPOSE 80

# Iniciamos el servidor Apache
CMD ["apache2-foreground"]

