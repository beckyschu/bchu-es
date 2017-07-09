FROM nginx:1.10
WORKDIR /home/elastic

ADD docker/vhost.conf /etc/nginx/conf.d/default.conf
