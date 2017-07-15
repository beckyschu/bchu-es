FROM ubuntu:xenial

# Let the container know that there is no tty
ENV DEBIAN_FRONTEND noninteractive
ENV COMPOSER_NO_INTERACTION 1

# Install tools
RUN apt-get update \
	&& apt-get -y install supervisor

COPY docker/php_worker.supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN rm -r /var/lib/apt/lists/*
WORKDIR /etc/supervisor/conf.d/
