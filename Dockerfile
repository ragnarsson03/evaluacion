# Usa la imagen oficial de PHP con Apache (por ejemplo PHP 8.0)
FROM php:8.0-apache

# Instala las dependencias necesarias para PostgreSQL y otras extensiones
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Copia el contenido de tu proyecto en el contenedor
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]
