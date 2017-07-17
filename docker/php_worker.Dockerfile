FROM ubuntu:xenial

# Let the container know that there is no tty
ENV DEBIAN_FRONTEND noninteractive
ENV COMPOSER_NO_INTERACTION 1

# Install tools
RUN apt-get update \
	&& apt-get -y install php7.0 supervisor

COPY docker/php_worker.supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Add new user to ubuntu system
RUN groupadd elastic
RUN useradd -g elastic -ms /bin/bash elastic

RUN rm -r /var/lib/apt/lists/*
WORKDIR /etc/supervisor/conf.d/

# Resolves following error:
# /home/elastic/docker/php_worker.install.sh && \
# php_worker.install.sh => ... INFO spawnerr: can't find command 'php'
CMD chown -R elastic:elastic /home/elastic/storage /home/elastic/bootstrap/cache && \
 	supervisord
