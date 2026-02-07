# ใช้ image PHP พร้อม Apache
FROM php:8.2-apache
# ติดตั้งส่วนขยาย PHP ที่จำเป็น
RUN docker-php-ext-install pdo pdo_mysql mysqli

# กำหนดโฟลเดอร์ทำงาน
WORKDIR /var/www/html
# คัดลอกไฟล์โปรเจคเข้า container
COPY . /var/www/html
# เปิดพอร์ต 80
EXPOSE 80
