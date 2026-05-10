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
FROM node:22-bookworm-slim AS assets

WORKDIR /app

COPY . .

RUN npm install

# Fix Rollup Linux optional dependency
RUN npm rebuild rollup

# Build Vite assets
RUN npm run build || cat /root/.npm/_logs/*

# Verify build output
RUN test -f public/build/manifest.json

# =========================
# Production PHP + Apache
# =========================
FROM php:8.3-apache AS production

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public \
    APP_ENV=production \
    APP_DEBUG=false

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

# Copy Laravel app
COPY --from=vendor /app ./

# Copy built assets
COPY --from=assets /app/public/build ./public/build

# Apache public root
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
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache \
    public/build

RUN chmod -R 775 \
    storage \
    bootstrap/cache \
    public/build

# Final manifest check
RUN test -f public/build/manifest.json

EXPOSE 80

CMD ["apache2-foreground"]