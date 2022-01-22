ARG MYSQL_VERSION

FROM mysql:${MYSQL_VERSION}
RUN apt-get update
RUN apt-get -y install locales-all

ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP:ja
ENV LC_ALL ja_JP.UTF-8

COPY conf.d/mysqld_charset.cnf /etc/mysql/conf.d/mysqld_charset.cnf
COPY conf.d/my.cnf /etc/mysql/conf.d/my.cnf
