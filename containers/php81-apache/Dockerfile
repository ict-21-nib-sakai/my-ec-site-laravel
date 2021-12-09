FROM php:8.1.0-apache

COPY provision/*.sh /usr/local/bin/
COPY conf /tmp/conf

ARG PHP_APACHE_USER_NAME
ARG PHP_APACHE_USER_ID

RUN adduser ${PHP_APACHE_USER_NAME} --disabled-password --uid ${PHP_APACHE_USER_ID} --gecos "" --shell /sbin/nologin \
&& apt-get update \
\
&& apt-get install -y --no-install-recommends \
  libfreetype6-dev \
  libgmp-dev \
  libicu-dev \
  libjpeg-dev \
  libonig-dev \
  libpng-dev \
  libxml2-dev \
  libzip-dev \
\
&& docker-php-ext-install \
  bcmath \
  calendar \
  ctype \
  dba \
  dom \
  exif \
  fileinfo \
  gd \
  gettext \
  gmp \
  iconv \
  intl \
  mbstring \
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
\
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
\
&& docker-php-ext-enable \
  gd \
  mysqli \
  pdo \
  pdo_mysql \
\
&& apt-get clean \
&& rm -rf /var/lib/apt/lists/* \
\
&& a2enmod rewrite

USER ${PHP_APACHE_USER_NAME}
WORKDIR /var/www/code