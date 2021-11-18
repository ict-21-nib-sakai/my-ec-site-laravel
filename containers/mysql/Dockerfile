FROM mysql:8.0.27

COPY conf/etc/mysql/my.cnf            /etc/mysql/my.cnf
COPY conf/etc/mysql/conf.d/mysql.cnf  /etc/mysql/conf.d/mysql.cnf
COPY conf/etc/mysql/conf.d/docker.cnf /etc/mysql/conf.d/docker.cnf

RUN chmod 664 /etc/mysql/my.cnf \
&&  chmod 664 /etc/mysql/conf.d/docker.cnf \
&&  chmod 644 /etc/mysql/conf.d/mysql.cnf \
\
&&  mkdir -p /var/log/mysql \
&&  touch    /var/log/mysql/slow.log \
&&  touch    /var/log/mysql/mysqld.log \
\
&&  chown mysql:mysql /var/log/mysql/slow.log \
&&  chown mysql:mysql /var/log/mysql/mysqld.log \
&&  chmod 640         /var/log/mysql/slow.log \
&&  chmod 640         /var/log/mysql/mysqld.log

ARG MYSQL_USER
ARG MYSQL_PASSWORD

RUN { \
    echo "ALTER USER '${MYSQL_USER}'@'%' IDENTIFIED WITH mysql_native_password BY '${MYSQL_PASSWORD}';"; \
    echo "SET GLOBAL collation_server = 'utf8mb4_unicode_520_ci';"; \
} > ./docker-entrypoint-initdb.d/user_init.sql