FROM php:7.0-cli-alpine as build

# install latest Xdebug compatible with PHP 7.0, see https://xdebug.org/docs/compat
RUN apk add \
        --no-cache \
        --update \
        autoconf \
        g++ \
        make

ADD xdebug-2.7.2.tgz /
RUN cd /xdebug-2.7.2 \
    && phpize \
    && ./configure --enable-xdebug \
    && make \
    && make install

# done, copy binaries from build stage
FROM php:7.0-cli-alpine as final
LABEL maintainer="andre.rademacher.business@googlemail.com"
COPY --from=build /usr/local/lib/php/extensions/no-debug-non-zts-20151012/xdebug.so /usr/local/lib/php/extensions/no-debug-non-zts-20151012/xdebug.so
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY --from=composer/composer:2.2-bin /composer /usr/local/bin/composer
WORKDIR /codewars/php70
