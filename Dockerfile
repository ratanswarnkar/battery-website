# =========================
# Composer Dependencies
# =========================
FROM composer:2 AS vendor

WORKDIR /app

COPY . .

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader

# =========================
# Frontend Assets Build
# =========================
FROM node:20-bullseye-slim AS assets

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

# Clean old builds
RUN rm -rf public/build

# Build Vite assets
RUN npm run build

# =========================
# Production PHP + Apache
# =========================
FROM php:8.3-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install \
        mbstring \
        pdo \
        pdo_mysql \
        zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copy app
COPY --from=vendor /app ./

# Copy Vite build assets
COPY --from=assets /app/public/build ./public/build

# Apache public root fix
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Laravel folders
RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache public/build

RUN chmod -R 775 storage bootstrap/cache public/build

EXPOSE 80

CMD ["apache2-foreground"]