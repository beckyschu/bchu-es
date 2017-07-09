FROM node:8.1.2
WORKDIR /home/elastic

RUN npm install -g yarn

CMD /home/elastic/docker/app.install.sh
