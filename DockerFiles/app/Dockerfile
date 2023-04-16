FROM php:8.0-apache
RUN apt-get update && apt-get install php-mysqli -y 
RUN service apache2 restart
COPY ../ /var/www/html
EXPOSE 80
