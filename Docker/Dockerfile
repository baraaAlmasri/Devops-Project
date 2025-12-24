FROM ubuntu:22.04

RUN apt update && apt install -y apache2 php libapache2-mod-php php-mysql

RUN apt clean

WORKDIR /var/www/html

EXPOSE 80

## to run apache in the foreground to keep the container running
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
