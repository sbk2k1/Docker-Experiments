FROM mysql:latest

COPY ./init.sql /docker-entrypoint-initdb.d/init.sql

COPY ./my.cnf /etc/mysql/conf.d/my.cnf