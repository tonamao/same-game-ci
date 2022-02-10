ARG PHP_FPM_VERSION

FROM php:${PHP_FPM_VERSION}-fpm-alpine

# install composer
COPY --from=composer:1.9.1 /usr/bin/composer /usr/bin/composer

ADD http://downloads3.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz /tmp/
ADD https://github.com/phpredis/phpredis/archive/5.1.1.tar.gz /tmp/

RUN apk update                       && \
    apk upgrade                      && \
    \
    docker-php-source extract        && \
    \
    apk add --no-cache                  \
        --virtual .build-dependencies   \
            $PHPIZE_DEPS                \
            zlib-dev                    \
            cyrus-sasl-dev              \
            git                         \
            autoconf                    \
            g++                         \
            libtool                     \
            make                        \
            pcre-dev                 && \
    \
    apk add --no-cache                  \
        mysql-client                    \
        tini                            \
        libintl                         \
        icu                             \
        icu-dev                         \
        libxml2-dev                     \
        postgresql-dev                  \
        freetype-dev                    \
        libjpeg-turbo-dev               \
        libpng-dev                      \
        gmp                             \
        gmp-dev                         \
        libmemcached-dev                \
        imagemagick-dev                 \
        libpng                          \
        libjpeg                         \
        libgcc                          \
        libgomp                         \
        libzip-dev                      \
        libssh2                         \
        libssh2-dev                     \
        libxslt-dev                  && \
    \
    apk add --no-cache --virtual build-dependencies \
    jpeg-dev                                        \
    libpng-dev                                      \
    imagemagick-dev                              && \
    \
    tar xfz /tmp/5.1.1.tar.gz   && \
    \
    mv phpredis-5.1.1 /usr/src/php/ext/redis    && \
    \
    git clone https://github.com/php-memcached-dev/php-memcached.git /usr/src/php/ext/memcached/    && \
    \
    docker-php-ext-configure memcached      &&  \
    \
    docker-php-ext-configure gd                 \
        --with-freetype-dir=/usr/include/       \
        --with-jpeg-dir=/usr/include/       &&  \
    \
    docker-php-ext-install -j"$(getconf _NPROCESSORS_ONLN)" \
        intl                                                \
        bcmath                                              \
        xsl                                                 \
        zip                                                 \
        soap                                                \
        mysqli                                              \
        pdo                                                 \
        pdo_mysql                                           \
        pdo_pgsql                                           \
        gmp                                                 \
        redis                                               \
        iconv                                               \
        gd                                                  \
        memcached                                       &&  \
    \
    tar -xvzf                                                       \
        /tmp/ioncube_loaders_lin_x86-64.tar.gz                      \
        -C /tmp/                                                &&  \
    \
    mkdir -p /usr/local/php/ext/ioncube                         &&  \
    \
    cp -a /tmp/ioncube/ioncube_loader_lin_${PHP_VERSION%.*}.so      \
        /usr/local/php/ext/ioncube/ioncube_loader.so            &&  \
    \
    docker-php-ext-configure opcache --enable-opcache           &&  \
    \
    docker-php-ext-install opcache                              &&  \
    \
    pecl install                                                    \
        apcu imagick                                            &&  \
    \
    docker-php-ext-enable                                           \
        apcu                                                    &&  \
    \
    docker-php-ext-enable                                           \
        --ini-name 20-imagick.ini imagick                       &&  \
    \
    apk del .build-dependencies                                 &&  \
    \
    docker-php-source delete                                    &&  \
    \
    rm -rf /tmp/* /var/cache/apk/*

# unix socket connection settings
COPY ./php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf

WORKDIR /var/www/support-tool

# set recommended PHP.ini settings
COPY conf.d/* /usr/local/etc/php/conf.d/
CMD  ["php-fpm"]

