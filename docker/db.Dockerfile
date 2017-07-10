FROM mysql:5.7
ENV MYSQL_CONTAINER_NAME elastic_db
ENV MYSQL_DATABASE elastic_db
ENV MYSQL_USER elastic_user
ENV MYSQL_PASSWORD password
ENV MYSQL_ALLOW_EMPTY_PASSWORD yes

# ADD ./database/initial.sql /docker-entrypoint-initdb.d/initial.sql
