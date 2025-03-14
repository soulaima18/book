# استخدام صورة PHP من Docker Hub
FROM php:8.0-apache

# نسخ جميع ملفات المشروع إلى مجلد /var/www/html داخل الصورة
COPY . /var/www/html/

# فتح المنفذ 80
EXPOSE 80

# تشغيل Apache في الصورة
CMD ["apache2-foreground"]
