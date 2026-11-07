
FROM php:8.2-apache

# Cài extension kết nối MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Bật Apache rewrite
RUN a2enmod rewrite

# Thiết lập thư mục website
WORKDIR /var/www/html

# Copy toàn bộ source code
COPY . /var/www/html/

# Cấp quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
