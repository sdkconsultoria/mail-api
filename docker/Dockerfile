FROM ubuntu

ARG DEBIAN_FRONTEND=noninteractive

RUN  apt-get update && \
     apt-get -y install \
             software-properties-common

# Install Apache and PHP
RUN add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get -y install \
            curl \
            apache2 \
            php7.4 \
            libapache2-mod-php \
            php7.4-mysql \
            php7.4-curl \
            php7.4-gd \
            php7.4-imagick \
            php7.4-cli \
            php7.4-mbstring \
            php7.4-zip \
            php7.4-xml \
            php7.4-dom \
       --no-install-recommends && \
       apt-get clean && \
       rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Enable apache mods
RUN a2enmod rewrite headers expires php7.4
#&& \
#    a2dismod php7.3

# RUN a2enmod proxy_fcgi && \
#     a2enconf php7.4-fpm

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    composer clear-cache

# Install NodeJS
RUN apt -y install dirmngr apt-transport-https lsb-release ca-certificates

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

RUN apt -y install nodejs

COPY image-files/ /

WORKDIR /app

EXPOSE 80

ADD start.sh /
RUN chmod +x /start.sh

CMD ["/start.sh"]
#CMD ["/usr/sbin/apachectl","-DFOREGROUND"]
