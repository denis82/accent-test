FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
	build-essential \
	# For GD: PNG, WebP, JPEG, XPM, FreeType
	libpng-dev libwebp-dev libjpeg-dev libxpm-dev libfreetype6-dev \
	# For Imagick
	libmagickwand-dev \
	libpq-dev \
	locales \
	# ZIP Tools
	zlib1g-dev libzip-dev zip unzip \
	# 7ZIP Tools
	p7zip \
	libcurl3-dev curl \
	libicu-dev \
	libonig-dev \
	libxml2-dev \
	cron \
	# Office Documents (converting)
	#libreoffice-writer libreoffice-calc \
	# PNG and WebP Tools
	optipng webp \
	# HEIF/HEIC Tools
	libheif-examples \
	# PDF Tools
	poppler-utils \
	# Audio Tools
	sox libsox-fmt-all \
	# Video Tools
	ffmpeg \
	# Git
	git

# Clear cache
RUN apt-get dist-upgrade -y && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure GD PHP extension
RUN docker-php-ext-configure gd --with-webp --with-jpeg --with-xpm --with-freetype

# Configure Imagick PHP extension
## Install native Imagick extension
#RUN pecl install imagick && docker-php-ext-enable imagick
## Build Imagick extension
RUN git clone https://github.com/Imagick/imagick  &&  cd imagick  \
	&&  phpize  &&  ./configure  &&  make  &&  make install  \
	&&  docker-php-ext-enable imagick

# Install PECL extensions
RUN pecl install redis && docker-php-ext-enable redis

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) bcmath ctype curl exif gd intl mbstring pcntl pdo pdo_mysql pdo_pgsql xml zip

# Configure Exim4 to send emails from the container
RUN sed -i "s/dc_eximconfig_configtype='local'/dc_eximconfig_configtype='internet'/g" \
	/etc/exim4/update-exim4.conf.conf && update-exim4.conf

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NPM
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
	&&  apt-get install -y nodejs

# Add user for the application
# Replace 1000 with actual User ID in your environment OS (command: id -u)
RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Copy application files
COPY --chown=www:www . /var/www
RUN chown www:www -R /var/www/storage

# Change current user to www
USER www

# Set working directory
WORKDIR /var/www

CMD ["php-fpm"]
