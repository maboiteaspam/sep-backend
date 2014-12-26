#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
php -c .user.ini -S 0.0.0.0:8000 ${SCRIPT_DIR}/../backend/www/index.php
