#!/bin/sh
SCRIPT_DIR="$(dirname "$(readlink -f "$0")")"
${SCRIPT_DIR}/schema_db.sh
${SCRIPT_DIR}/fixtures_db.sh
${SCRIPT_DIR}/dump.sh
