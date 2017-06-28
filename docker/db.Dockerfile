FROM mysql:5.7
ENV MYSQL_CONTAINER_NAME elastic-mysql
ENV MYSQL_DATABASE elastic_db
ENV MYSQL_USER bchu
ENV MYSQL_PASSWORD bchu1
ENV MYSQL_ALLOW_EMPTY_PASSWORD yes

ADD ./database/initial.sql /docker-entrypoint-initdb.d/initial.sql
