FROM php:8.1-apache

RUN apt-get update && apt-get upgrade -y 
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html/

COPY . /var/www/html/

RUN a2enmod rewrite

RUN echo '<Directory "/var/www/html">' >> /etc/apache2/apache2.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

EXPOSE 80
