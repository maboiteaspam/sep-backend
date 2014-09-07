#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
php -c .user.ini -S localhost:8000 -t ${SCRIPT_DIR}/../backend/www/
