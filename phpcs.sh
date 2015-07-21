#!/bin/bash -u
PJROOT=$(cd $(dirname $0);pwd)
${PJROOT}/vendor/squizlabs/php_codesniffer/scripts/phpcs ${PJROOT}/src/app/*
