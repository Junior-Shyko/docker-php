FROM php:7.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite

ADD docker-config/ /etc/apache2/sites-available

RUN service apache2 stop
RUN service apache2 start