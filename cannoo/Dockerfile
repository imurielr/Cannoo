FROM php:7.2-alpine 
 
# Totally necessary?
RUN docker-php-ext-install pdo_mysql
 
# Composer installation
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
 
# Setup the work directory
COPY . /cannoo
COPY ./public/.htaccess /laravel-app/.htaccess
WORKDIR /cannoo
 
#Laravel Composer Dependencies 
RUN composer install \
 --ignore-platform-reqs \
 --no-interaction \
 --no-plugins \
 --no-scripts \
 --prefer-dist
 
# Node.js Installation for alpine
RUN apk add --update nodejs npm
 
# Laravel Node dependenciees
RUN npm install
# RUN npm install -g react-tools 
RUN npm run dev
 
# RUN php artisan migrate
RUN php artisan key:generate
# RUN php artisan migrate
RUN chmod -R 777 storage
# RUN php artisan migrate
RUN php artisan migrate
# RUN php artisan storage:link
RUN php artisan storage:link  

CMD php artisan serve --port=80 --host=0.0.0.0
 
EXPOSE 80