#!/bin/bash

SCRIPT_DIRECTORY="$(dirname -- "$(readlink -f -- "${BASH_SOURCE[0]}")")"
cd "${SCRIPT_DIRECTORY}" || exit

docker run \
  --interactive \
  --name 'codewars-php70' \
  --rm \
  --tty \
  --user "$(id -u)":"$(id -g)" \
  --volume "${PWD}":/codewars/php70 \
  andrerademacher/codewars-php70 "$@"
