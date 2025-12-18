FROM debian
WORKDIR /app
RUN apt update
RUN apt install -y php8.4
RUN apt update
RUN apt install -y \
php8.4 \
php8.4-cli \
php8.4-fpm \
php8.4-common \
php8.4-mbstring \
php8.4-xml \
php8.4-curl \
php8.4-zip \
php8.4-mysql \
php8.4-bcmath \
php8.4-intl \
php8.4-gd \
php8.4-opcache \
unzip \
curl
RUN apt install -y composer


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist
COPY . .
RUN composer dump-autoload --optimize
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000" ]


EXPOSE 8000 