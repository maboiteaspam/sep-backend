#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
sh ${SCRIPT_DIR}/db.sh
sh ${SCRIPT_DIR}/backend.sh
