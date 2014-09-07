#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"

${SCRIPT_DIR}/db.sh

php -c .user.ini -S localhost:8000 -t ${SCRIPT_DIR}/../backend/www/ &
pid1=$!

cd ${SCRIPT_DIR}/../

php vendors/codecept.phar run

kill $pid1
