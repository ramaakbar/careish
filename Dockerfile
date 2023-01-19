FROM php:8.1
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql sockets
WORKDIR /app/
COPY . /app/.
RUN composer install --optimize-autoloader --no-dev
# FROM node:18-slim
# WORKDIR /app/
# RUN npm install && npm run build
# RUN php artisan optimize
# RUN php artisan key:generate
# RUN php artisan config:clear
# RUN php artisan cache:clear
# RUN php artisan view:clear

RUN php artisan config:cache
RUN php artisan route:clear
RUN php artisan view:clear
RUN php artisan migrate:fresh
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181