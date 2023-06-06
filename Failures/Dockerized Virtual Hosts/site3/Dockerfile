FROM php:5.6-apache


RUN mkdir -p /var/www/site3
COPY ./index.php /var/www/site3/
COPY ./apache.conf /etc/apache2/sites-available/site3.conf
RUN ln -s /etc/apache2/sites-available/site3.conf /etc/apache2/sites-enabled/site3.conf
RUN echo "Include /etc/apache2/sites-enabled/site3.conf" >> /etc/apache2/apache2.conf

RUN a2enmod lbmethod_byrequests


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
