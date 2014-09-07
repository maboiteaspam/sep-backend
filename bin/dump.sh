#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
mkdir -p ${SCRIPT_DIR}/../tests/_data/
php -c .user.ini ${SCRIPT_DIR}/../db/main.php dump > ${SCRIPT_DIR}/../tests/_data/dump.sql
