FROM debian

COPY . .
RUN php artisan migrate
CMD [ "php", "artisan", "serve", "--host=0.0.0.0", "--port=8000" ]

EXPOSE 8000 