FROM php:8.3-apache
WORKDIR /var/www/html
COPY . .
ENV TZ=America/Bogota
EXPOSE 80
CMD ["apache2-foreground"]
