FROM shincoder/homestead:php7.0

WORKDIR /home/elastic

RUN npm install -g yarn

CMD /home/elastic/docker/main.nginx.sh elastic.app /home/elastic/public && \
    /home/elastic/docker/main.install.sh && \
    chown -R homestead:homestead /home/elastic/storage /home/elastic/bootstrap/cache
