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

# To startup app:
rm -rf node_modules
npm install
npm run dev
php artisan serve

