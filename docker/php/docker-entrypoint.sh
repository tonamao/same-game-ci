#!/bin/sh

#while true
#do
  sleep 15
#done

php spark migrate

php spark db:seed ScoreHistory

. /usr/local/bin/docker-php-entrypoint php-fpm
#exec php-fpm "$@"
#exec "$@"
