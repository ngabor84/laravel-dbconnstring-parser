FROM php:8.1-cli-alpine

RUN curl -Ss https://getcomposer.org/installer | php && \
    mv composer.phar /usr/bin/composer

RUN apk add --update linux-headers
RUN apk add --no-cache $PHPIZE_DEPS &&  \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    echo "xdebug.enable=1" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.discover_client_host = yes" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.log_level = 0" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/php.ini

RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini && \
    echo "display_errors = On" >> /usr/local/etc/php/php.ini && \
    echo "display_startup_errors = On" >> /usr/local/etc/php/php.ini

ENV XDEBUG_CONFIG idekey=PHPSTORM
