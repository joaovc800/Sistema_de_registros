# Utilizar está versão CASO for necessário passar testes pelo TRAVIS.CI com packages sendo instalados por : docker-php-ext
FROM php:7.3.28-fpm-alpine3.12

# adicionar os packages do alpine necessários para configurar o cache/ configs do nginx/ adicionar envsub
RUN apk upgrade && apk update && apk add -U libmcrypt-dev \
    autoconf \
    build-base \
    openrc --no-cache \
    icu-dev \
    gettext

# Adicionar o nginx
RUN apk add nginx

# PHP_CPPFLAGS é utilizado pelos scripts do docker-php-ext-* 
ENV PHP_CPPFLAGS="$PHP_CPPFLAGS -std=c++11"

# Instalando as dependências do PHP e ativando elas
RUN docker-php-ext-install mysqli \
    opcache \
    intl \
    && docker-php-ext-enable mysqli \
    opcache \
    intl 

# Configuar o opcache
RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/php-opocache-cfg.ini

# COPY ./php.ini /usr/local/etc/php/php.ini Caso necessite de modificar a .ini
RUN openrc && touch /run/openrc/softlevel 

#Caso nginx diga que está iniciando infinito
COPY ./config/default.conf /etc/nginx/conf.d/default.conf

# Copiar e modificar as permissões para utilizar no APP
COPY --chown=www-data:www-data ./src /var/www/src
WORKDIR /var/www/src

# Serve para expor pelo server as portas, porém nao tem outro app rodando junto
EXPOSE 80 443

# Criar permissões para poder execultar o script de inicialização
COPY ./config/iniciar-servicos.sh /etc/iniciar-servicos.sh
RUN chmod +x /etc/iniciar-servicos.sh

# concertar o problema de PID
RUN mkdir /run/nginx

CMD /bin/sh -c "envsubst '\$PORT' < /etc/nginx/conf.d/default.conf > /etc/nginx/conf.d/default.conf && /etc/iniciar-servicos.sh"