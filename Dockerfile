# E-Shop Bangladesh - PHP Docker Configuration
FROM php:8.2-apache

# Disable the conflicting MPM modules and enable prefork
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true
RUN a2enmod mpm_prefork

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Install mysqli extension for MySQL connectivity
RUN docker-php-ext-install mysqli

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Railway uses PORT environment variable
ENV PORT=80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
