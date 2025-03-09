FROM php:8.3-apache
WORKDIR /var/www/html
COPY ./src/ .
COPY ./music/ ./music/
ENV TZ=America/Bogota
EXPOSE 80
CMD ["apache2-foreground"]
