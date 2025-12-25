FROM ubuntu:22.04

# اجعل تثبيت الحزم غير تفاعلي
ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && apt install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    tzdata

WORKDIR /var/www/html

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
