#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
php -c .user.ini ${SCRIPT_DIR}/../db/main.php fixtures
