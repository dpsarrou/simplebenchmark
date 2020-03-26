FROM php:7.4-cli-alpine
COPY --from=composer:1.9 /usr/bin/composer /usr/bin/composer
RUN composer global require phpbench/phpbench @dev
ENV PATH=/root/.composer/vendor/bin:$PATH
WORKDIR /app