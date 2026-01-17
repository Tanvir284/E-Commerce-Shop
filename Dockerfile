# E-Shop Bangladesh - PHP Docker Configuration
# Using PHP CLI with built-in server (avoids Apache configuration issues)
FROM php:8.2-cli

# Install mysqli extension for MySQL connectivity
RUN docker-php-ext-install mysqli

# Copy project files
COPY . /app

# Set working directory
WORKDIR /app

# Railway uses PORT environment variable
ENV PORT=8080
EXPOSE 8080

# Use PHP built-in server
CMD php -S 0.0.0.0:${PORT} -t /app
