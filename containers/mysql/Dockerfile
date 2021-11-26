FROM mysql:8.0.27

COPY conf/etc/mysql/my.cnf            /etc/mysql/my.cnf
COPY conf/etc/mysql/conf.d/mysql.cnf  /etc/mysql/conf.d/mysql.cnf
COPY conf/etc/mysql/conf.d/docker.cnf /etc/mysql/conf.d/docker.cnf

ARG MYSQL_CONTAINER_USER_NAME
ARG MYSQL_CONTAINER_USER_ID

RUN adduser ${MYSQL_CONTAINER_USER_NAME} --disabled-password --uid ${MYSQL_CONTAINER_USER_ID} --gecos "" --shell /sbin/nologin \
&&  chmod 664 /etc/mysql/my.cnf \
&&  chmod 664 /etc/mysql/conf.d/docker.cnf \
&&  chmod 644 /etc/mysql/conf.d/mysql.cnf \
\
&&  mkdir -p /var/log/mysql \
&&  touch    /var/log/mysql/slow.log \
&&  touch    /var/log/mysql/mysqld.log \
\
&&  chown ${MYSQL_CONTAINER_USER_NAME}:${MYSQL_CONTAINER_USER_NAME} /var/log/mysql/slow.log \
&&  chown ${MYSQL_CONTAINER_USER_NAME}:${MYSQL_CONTAINER_USER_NAME} /var/log/mysql/mysqld.log \
&&  chmod 640 /var/log/mysql/slow.log \
&&  chmod 640 /var/log/mysql/mysqld.log

ARG MYSQL_USER
ARG MYSQL_PASSWORD

RUN { \
    echo "ALTER USER '${MYSQL_USER}'@'%' IDENTIFIED WITH mysql_native_password BY '${MYSQL_PASSWORD}';"; \
    echo "SET GLOBAL collation_server = 'utf8mb4_unicode_520_ci';"; \
} > ./docker-entrypoint-initdb.d/user_init.sql

USER ${MYSQL_CONTAINER_USER_NAME}