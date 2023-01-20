FROM php:7.2-apache

COPY . /var/www/html/

RUN apt-get -y update
RUN apt-get -y install git

RUN docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

ADD docker-config/ /etc/apache2/sites-available

RUN service apache2 stop
RUN service apache2 start