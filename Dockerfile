FROM php:8.1-cli

RUN apt-get update && \
    apt-get -y install \
            git \
            unzip && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install xdebug-3.1.4 \
	&& docker-php-ext-enable xdebug

RUN cd /tmp && \
    git clone https://github.com/BitOne/php-meminfo.git && \
    cd php-meminfo/extension/ && \
    phpize && \
    ./configure --enable-meminfo && \
    make && \
    make install && \
    docker-php-ext-enable meminfo.so

