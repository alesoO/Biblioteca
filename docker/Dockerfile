FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www

# Arguments defined in docker-compose.yml
ARG user
ARG group
ARG uid

# Enviroment variables defined
ENV NPM_VERSION 8.1.3
ENV NODE_VERSION v14.18.1

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    mariadb-client \
    libmagickwand-dev --no-install-recommends && \
    pecl install imagick && \
    docker-php-ext-enable imagick

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets intl
RUN pecl install xdebug
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions imagick
RUN docker-php-ext-enable xdebug \
    && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/xdebug.so" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug,develop,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=docker" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.show_error_trace=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.max_nesting_level=250" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.var_display_max_depth=10" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log=/var/www/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log_level=7" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && touch /var/www/xdebug.log
RUN docker-php-ext-configure zip \
  && docker-php-ext-install zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$group /home/$user

# Node.js and NPM configuration and install
ENV NVM_DIR /usr/local/nvm
RUN mkdir -p $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.39.4/install.sh | bash
RUN /bin/bash -c "source $NVM_DIR/nvm.sh && nvm install $NODE_VERSION && nvm use --delete-prefix $NODE_VERSION"
ENV NODE_PATH $NVM_DIR/versions/node/$NODE_VERSION/lib/node_modules
ENV PATH      $NVM_DIR/versions/node/$NODE_VERSION/bin:$PATH
RUN rm -df "node_modules/"

# Install Node.js dependencies
COPY package*.json ./
RUN npm install -g npm@$NPM_VERSION
RUN rm -f /usr/local/bin/npm
RUN ln -s /usr/bin/npm@$NPM_VERSION /usr/local/bin/npm

# Copy existing contents
COPY . /var/www

USER $user
