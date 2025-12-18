FROM debian
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


COPY . /app
WORKDIR /app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000" ]


EXPOSE 8000 