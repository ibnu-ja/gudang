## Stage 1: Composer build step
#FROM composer:latest AS build
#
#WORKDIR /app
#
## Copy the necessary files for composer installation
#COPY composer.json composer.lock ./
#
## Install composer dependencies
#RUN composer install --no-dev --optimize-autoloader

# Stage 2: FrankenPHP base
FROM dunglas/frankenphp:latest

## Set the working directory
#WORKDIR /var/www
#
## Copy vendor folder from the build step
#COPY --from=build /app/vendor ./vendor
#
## Copy the rest of the application, excluding vendor (adjust .dockerignore for this)
#COPY . .

# Download and install Rclone
RUN apt-get update && \
    apt-get install -y wget && \
    wget https://downloads.rclone.org/v1.68.1/rclone-v1.68.1-linux-amd64.deb && \
    dpkg -i rclone-v1.68.1-linux-amd64.deb && \
    rm rclone-v1.68.1-linux-amd64.deb && \
    mkdir -p ~/.config/rclone/

# Expose necessary ports
EXPOSE 80 443
