#!/usr/bin/env bash

cd /var/www/html
composer install
./bin/console doctrine:migrations:migrate -n

/start.sh
