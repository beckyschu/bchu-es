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
