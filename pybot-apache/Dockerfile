FROM php:5.6-apache
MAINTAINER RAKOTOARISOA Jeremy <jeremy.rakotoarisoa@orange.com>

# RobotFramework installation
RUN apt-get update
RUN apt-get -y install python-pip python-dev
RUN pip install robotframework
RUN pip install robotframework-selenium2library

# Apache configuration
# Expose 8080 because 80 is allowed only for root and change log files
RUN a2enmod rewrite
RUN chmod -R a+rwx /var/www/html/
RUN sed -e 's/Listen 80/Listen 8080/' -i /etc/apache2/apache2.conf /etc/apache2/ports.conf \
 && sed -i 's/ErrorLog .*/ErrorLog \/var\/log\/apache2\/error.log/' /etc/apache2/apache2.conf \
 && sed -i 's/CustomLog .*/CustomLog \/var\/log\/apache2\/custom.log combined/' /etc/apache2/apache2.conf \
 && sed -i 's/LogLevel .*/LogLevel info/' /etc/apache2/apache2.conf \
 && touch /var\/log\/apache2\/error.log \
 && touch \/var\/log\/apache2\/custom.log \
 && chmod -R a+rwx /var/log/apache2 \
 && chmod -R a+rwx /var/lock/apache2 \
 && chmod -R a+rwx /var/run/apache2

EXPOSE 8080

# Pybot configuration
RUN chmod +x /usr/local/bin/pybot

USER 1001

# Some RobotFramework Test
COPY /robot_test /tmp
