#!/bin/sh

####################
#  C L E A R . S H  ( Clear all temporary files using one command )
####################

# use your terminal below the command will clear all 
# log, cache and captcha temp files.
# sh clear.sh

# define your project path
PROJECT_DIR='/var/www/framework'

# define your captcha path
CAPTCHA_DIR="$PROJECT_DIR/modules/captcha/assets/images/"
APP_LOG_DIR="$PROJECT_DIR/application/core/logs/"
MOD_LOG_DIR="$PROJECT_DIR/modules/"

# delete application and module directory log files.
find $APP_LOG_DIR -name 'log-*.php' -exec rm {} \;  # help https://help.ubuntu.com/community/find
find $MOD_LOG_DIR -name 'log-*.php' -exec rm {} \;

# force delete captcha images
find $CAPTCHA_DIR -name '*.jpg' -exec rm -rf {} \;