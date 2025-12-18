FROM debian

COPY . /app
WORKDIR /app
#CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000" ]

EXPOSE 8000 