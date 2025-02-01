#!/bin/bash
fuser -k 8080/tcp
php -S localhost:8080 -t /workspaces/2425-v6in-eindopdracht-pythongame-receptenwebsite-informatica/v6-eindopdracht-php-startcode-main

