# Use the official PHP image with Apache
FROM php:7.4-apache
LABEL authors="blecat"

# Install system dependencies
RUN apt-get update && apt-get install -y \
  build-essential \
  git \
  curl \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /app

# Copy composer.json
COPY composer.json ./

# Change ownership of the /app directory to www-data
RUN chown -R www-data:www-data /app

# Créer les répertoires de cache pour Composer et les attribuer à www-data
RUN mkdir -p /var/www/.composer && chown -R www-data:www-data /var/www/.composer

# Switch to www-data user before running composer install
USER www-data

# Run composer install as www-data
RUN composer install --no-scripts --no-interaction

# Switch back to root to perform any system operations
USER root

# Copy the rest of the application code
COPY . .

# Correct ownership might be needed after copying new files
RUN chown -R www-data:www-data /app

# Configure Apache and other root-required operations
RUN a2enmod rewrite && cp docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Rediriger les logs php vers apache
RUN echo "error_log = /var/log/apache2/error.log" >> /usr/local/etc/php/php.ini-production

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Set Symfony to listen on port 8080
ENV APP_PORT=80

# Start Apache
CMD ["apache2-foreground"]