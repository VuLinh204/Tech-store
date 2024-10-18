# Sử dụng image PHP chính thức
FROM php:8.0-apache

# Kích hoạt mod_rewrite cho Apache
RUN a2enmod rewrite

# Copy mã nguồn vào thư mục gốc của Apache
COPY public/ /var/www/html/

# Thiết lập quyền truy cập cho thư mục
RUN chown -R www-data:www-data /var/www/html
