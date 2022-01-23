#!/bin/sh

# wait for starting db container
sleep 15

chmod a+rwx -R /var/www/html/writable

# db migration
php spark migrate

php spark db:seed ScoreHistory

. /usr/local/bin/docker-php-entrypoint php-fpm
