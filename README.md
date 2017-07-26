# Installation of laravel
install composer
install homebrew
install laravel
install mysql (via brew): brew install mysql

Good links:
https://blog.madewithlove.be/post/how-to-integrate-your-laravel-app-with-elasticsearch/ = DB setup and Elastic Search
https://severalnines.com/blog/mysql-docker-containers-understanding-basics = MySql Docker
https://yarnpkg.com/en/docs/install = yarn install
http://docs.brew.sh/Manpage.html = brew manpage
https://laravel.com/docs/5.4/installation = laravel install

==================== BACKING UP DB
mysqldump --all-databases > dump.sql -


==================== ONCE everything is installed ======================

# To manually startup mysql:
brew services start mysql

# Initial DB setup includes:
mysql -uroot
create database elastic_db;
show databases;

# Setup elastic_user in DB
CREATE USER 'elastic_user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'elastic_user'@'localhost';
FLUSH PRIVILEGES;

# To startup app:
rm -rf node_modules
npm install
npm run dev
php artisan serve

===================== DOCKER CLEANUP =====================================
docker system prune

===================== DOCKER Laravel Lightweight =====================================

1) For development environment: LaraDock? or Laravel + Homestead on Docker (nginx/supervisor/php-fpm)
2) For production environment: Kubernetes/Swarm + Docker

Some good articles
https://medium.com/@shakyShane/laravel-docker-part-1-setup-for-development-e3daaefaf3c
https://www.digitalocean.com/community/tutorials/an-introduction-to-kubernetes
http://laradock.io/
https://github.com/LaraDock/laradock/issues/143


Last commit before docker:
https://github.com/opmonk/dan-laravel/blob/f2c9afcc9ec817181574637402ad697a773515ef/server.md

==================== DOCKER COMMAND TO CHECK ON INSTALLATION OF NPM
docker run -v "$PWD":/usr/src/app -w /usr/src/app node:8.1.2 npm install


==================== DOCKER COMMANDS to remove images
docker images | grep bchues
docker rmi -f 93a5823f6701
https://docs.docker.com/compose/compose-file/compose-file-v2/#links

=================== DOCKER networks
https://docs.docker.com/engine/userguide/networking/#user-defined-networks
docker network ls
docker network inspect bchues_default

https://docs.docker.com/engine/tutorials/dockervolumes/#mount-a-shared-storage-volume-as-a-data-volume

PDO issue
https://forums.docker.com/t/php-ini-file-makes-it-to-my-container-but-has-no-impact-on-phpinfo/17576

==================== BEANSTALK LOCAL ENV CHANGES ==============
.env = DB_HOST, QUEUE_DRIVER
configs/queue.php (needs to point to elastic_beanstalkd instead of localhost)

brew services start mysql
brew services start beanstalkd
php artisan queue:listen --queue discovery

npm install
npm run dev
php artisan serve

telnet localhost 11300
stats

more storage/logs/laravel.log

php artisan config:cache
php artisan config:clear


https://hub.docker.com/r/schickling/beanstalkd-console/
docker run -d -p 11300:11300 --name beanstalkd schickling/beanstalkd

===================== SUPERVISORD installation localhost =========
https://nicksergeant.com/running-supervisor-on-os-x/

========= TODO next week
1) CLEANUP my example - i.e., take out myqueue, etc - figure out why getting index.blade.php example error
2) research beanstalkd console
3) incorporate docker settings:
.env
configs/queue.php
stop services running on local machine (mysql & beanstalkd)

Moving onto Prod:
1) package.json - make sure the scripts area isn't getting installed by npm installed
2) backing up database
3) hot deploy: moving code into its own data volume
4) CREATE STRESS TESTS (timing) on staging
5) READ PRODUCTION DOCUMENTATION - considerations

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'discovery',
            'retry_after' => 90,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'elastic_beanstalkd',
            'queue' => 'discovery',
            'retry_after' => 90,
        ],
===============   BACKING UP DB
docker exec bchues_elastic_db_1 /usr/bin/mysqldump -u elastic_user --password=password elastic_db > sqldump.sql

===================== REDIS queue

1) Multiple ways to monitor redis
ON STAGING and PRODUCTION (via redis-cli command as ipshark user)

[ipshark@cl-t178-343cl code]$ redis-cli
redis 127.0.0.1:6379> monitor
OK
1500337516.296072 "monitor"
1500337550.236409 "SELECT" "0"
1500337550.236669 "PUBLISH" "crawl.2003" "{\"event\":\"App\\\\Events\\\\Broadcast\\\\CrawlWasUpdated\",\"data\":{\"crawl\":{\"id\":2003,\"keyword\":\"Jaybird\",\"predicted_count\":0,\"submission_count\":0,\"accepted_count\":0,\"rejected_count\":0,\"status\":\"crawling\",\"generatedStatus\":\"crawling\",\"crawl_started_at\":\"2017-07-18T00:25:50+00:00\",\"crawl_ended_at\":null,\"created_at\":\"2017-07-18T00:25:49+00:00\",\"updated_at\":\"2017-07-18T00:25:50+00:00\"},\"socket\":null},\"socket\":null}"

ON LOCAL DEV:
telnet localhost 6379
monitor
---- browser activity comes here
quit

2) Had to add redis-cli to composer php container

====================== PRODUCTION VIEW DOCKER ===============
https://medium.com/@shakyShane/laravel-docker-part-2-preparing-for-production-9c6a024e9797
https://wiki.ubuntu.com/Lvm = volumes on linux
http://www.tricksofthetrades.net/2016/03/14/docker-data-volumes/ = talk on data volumes
https://github.com/CWSpear/local-persist = docker plugin for local-persist data volumes
https://forums.docker.com/t/host-path-of-volume/12277/9

https://docs.docker.com/compose/production/#running-compose-on-a-swarm-cluster
https://docs.docker.com/compose/install/
