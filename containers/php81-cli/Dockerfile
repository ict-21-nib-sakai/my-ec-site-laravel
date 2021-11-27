FROM php:8.1.0RC6-cli-alpine3.14

COPY provision/*.sh /usr/local/bin/
COPY conf /tmp/conf

ARG PHP_CLI_USER_NAME
ARG PHP_CLI_USER_ID

RUN adduser -D ${PHP_CLI_USER_NAME} --uid ${PHP_CLI_USER_ID} --shell /sbin/nologin \
&& /usr/local/bin/install-composer.sh \
&& apk update \
&& apk add --no-cache \
    bzip2-dev \
    curl-dev \
    gettext-dev \
    gmp-dev \
    icu-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    supervisor \
  && docker-php-ext-configure gd --enable-gd \
  && docker-php-ext-install \
    bcmath \
    bz2 \
    calendar \
    ctype \
    curl \
    dba \
    dom \
    exif \
    fileinfo \
    gd \
    gettext \
    gmp \
    iconv \
    intl \
    mysqli \
    opcache \
    pdo \
    pdo_mysql \
    posix \
    session \
    simplexml \
    soap \
    sockets \
    xml \
    xmlwriter \
    zip \
  && rm -rf /var/cache/apk/*

COPY conf/etc/supervisord.default.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

USER ${PHP_CLI_USER_NAME}
WORKDIR /var/www/code