# =========================
# Composer Dependencies
# =========================
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader

COPY . .

RUN composer dump-autoload --optimize

# =========================
# Frontend Assets Build
# =========================
FROM node:22-bookworm-slim AS assets

WORKDIR /app

COPY package.json package-lock.json ./

# Clean install to avoid rollup optional dependency issue
RUN rm -rf node_modules package-lock.json

RUN npm install

# Force rebuild for Linux container
RUN npm rebuild rollup

COPY vite.config.js ./
COPY tailwind.config.js ./


COPY resources ./resources
COPY public ./public

# Build frontend assets
RUN npm run build

# Ensure build files exist
RUN ls -la public/build
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

# Apache Config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# Create Laravel required folders
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

# Final check
RUN test -f public/build/manifest.json

EXPOSE 80

CMD ["apache2-foreground"]