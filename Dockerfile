FROM php:8.2-fpm-alpine

RUN apk add --no-cache nginx bash supervisor \
    libzip libpng libjpeg-turbo freetype \
    && apk add --no-cache --virtual .build-deps \
       $PHPIZE_DEPS libzip-dev libpng-dev \
       libjpeg-turbo-dev freetype-dev \
    && docker-php-ext-configure gd \
       --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath exif gd zip opcache \
    && apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-dev --no-interaction \
    --prefer-dist --optimize-autoloader \
    && mkdir -p storage/framework/cache \
       storage/framework/sessions \
       storage/framework/views \
       bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY deploy/nginx.conf /etc/nginx/http.d/default.conf
COPY deploy/start.sh /start.sh
RUN chmod +x /start.sh

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

EXPOSE 10000
CMD ["/start.sh"]
