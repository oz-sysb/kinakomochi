#!/bin/bash -u
PJROOT=$(cd $(dirname $0);pwd)
${PJROOT}/vendor/squizlabs/php_codesniffer/scripts/phpcs --standard=PSR2 ${PJROOT}/src/app/*
${PJROOT}/vendor/squizlabs/php_codesniffer/scripts/phpcs --standard=PSR2 ${PJROOT}/test/*/*