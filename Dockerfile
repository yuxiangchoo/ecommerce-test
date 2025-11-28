# main image
FROM php:8.3-apache
 
# 设置时区（可选）
ENV TZ=Asia/Singapore
 
# installing main dependencies
RUN apt-get update && apt-get install -y \
    git \
    ffmpeg
 
# installing unzip dependencies
RUN apt-get install -y \
    libzip-dev \
    zlib1g-dev \
    unzip
 
# gd extension configure and install
RUN apt-get install -y \
    libfreetype6-dev \
    libicu-dev \
    libgmp-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp && docker-php-ext-install gd
 
# imagick extension configure and install
RUN apt-get install -y libmagickwand-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick
 
# intl extension configure and install
RUN docker-php-ext-configure intl && docker-php-ext-install intl
 
# other extensions install
RUN docker-php-ext-install bcmath calendar exif gmp mysqli pdo pdo_mysql zip
 
# installing composer
COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer
 
# installing node js
COPY --from=node:23 /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node:23 /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm
 
# installing global node dependencies
RUN npm install -g npx
 
# arguments
# ARG container_project_path
# ARG uid
# ARG user
 
# adding user
# RUN useradd -G www-data,root -u $uid -d /home/$user $user
# RUN mkdir -p /home/$user/.composer && \
#     chown -R $user:$user /home/$user
 
# setting apache
COPY ./.configs/apache.conf /etc/apache2/sites-available/000-default.conf
COPY ./.configs/ports.conf /etc/apache2/ports.conf
RUN a2enmod rewrite
 
# changing user
USER root
ENV COMPOSER_ALLOW_SUPERUSER=1
 
# setting work directory
RUN mkdir -p /var/www/html/bagisto
COPY . /var/www/html/bagisto/
 
# setting up project from `src` folder
RUN chown -R root:www-data /var/www/html/bagisto
RUN chmod -R 775 /var/www/html/bagisto/storage
 
WORKDIR /var/www/html/bagisto/

RUN composer install --no-dev --prefer-dist --optimize-autoloader
# RUN composer create

RUN npm install && npm run build
 
RUN php artisan key:generate
 
RUN php artisan storage:link
RUN php artisan vendor:publish --tag=public --force
RUN php artisan vendor:publish --provider="Webkul\Marketplace\Providers\MarketplaceServiceProvider"

# copy storage-origin to public storage
RUN mkdir -p /var/www/html/bagisto/public/storage/admins \
    /var/www/html/bagisto/public/storage/locales \
    /var/www/html/bagisto/public/storage/product \
    /var/www/html/bagisto/public/storage/seller \
    /var/www/html/bagisto/public/storage/theme

RUN mkdir -p storage/framework/{cache/data,sessions,views} \
    && mkdir -p storage/logs
 
COPY public/storage-origin/admins   /var/www/html/bagisto/public/storage/admins
COPY public/storage-origin/locales /var/www/html/bagisto/public/storage/locales
COPY public/storage-origin/product /var/www/html/bagisto/public/storage/product
COPY public/storage-origin/seller  /var/www/html/bagisto/public/storage/seller
COPY public/storage-origin/theme   /var/www/html/bagisto/public/storage/theme

RUN chown -R www-data:www-data storage/ 
RUN chown -R www-data:www-data bootstrap/cache
RUN chown -R root:www-data vendor
RUN chmod -R 777 storage/

# For Data Transfer in Seller Page
RUN php artisan vendor:publish --provider="Webkul\MpDataTransfer\Providers\MpDataTransferServiceProvider" --force

# For Seller Signup
RUN composer require fakerphp/faker:^1.23 --no-interaction --prefer-dist
RUN composer dump-autoload -o

EXPOSE 8000

# RUN chown root:www-data storage/framework/cache/repository-cache-keys.json
# RUN chmod 775 storage/framework/cache/repository-cache-keys.json
# RUN chown -R www-data:www-data /var/www/html/bagisto
# RUN chown -R root:www-data /var/www/html/bagisto
# RUN chmod -R 755 /var/www/html/bagisto
# RUN chown -R www-data:www-data /var/www/html/bagisto/storage /var/www/html/bagisto/bootstrap/cache
# RUN chmod -R 775 /var/www/html/bagisto/storage /var/www/html/bagisto/bootstrap/cache
# setting up project from `src` folder
# RUN chown -R www-data:www-data .
# RUN chown -R root:www-data storage/
