FROM httpd
RUN yum update && yum install php-mysqli -y 
COPY ../ /var/www/html
EXPOSE 80
