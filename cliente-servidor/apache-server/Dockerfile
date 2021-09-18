FROM php:7.4-apache

WORKDIR '/client'
RUN apt-get update
RUN apt-get install gettext-base
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# COPY "/php/src" "/var/www/html/"
# RUN chown -R www-data:www-data /mysql
EXPOSE 80
CMD /bin/bash -c "envsubst '\$herokusqlHost,\$herokusqlDatabase,\$herokusqlPassword,\$herokusqlUser' < /var/www/html/php/conexao.php > /var/www/html/php/conexao.php" && apachectl -D FOREGROUND

