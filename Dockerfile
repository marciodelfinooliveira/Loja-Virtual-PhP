FROM php:8.2-apache

RUN apt-get update && apt-get upgrade -y 
RUN apt-get install -y git unzip zip
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html/

COPY . /var/www/html/

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install

RUN a2enmod rewrite

RUN echo '<Directory "/var/www/html">' >> /etc/apache2/apache2.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

EXPOSE 80
