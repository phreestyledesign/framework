#!/bin/sh

####################
#  C L E A R . S H  ( Clear all temporary files using one command )
####################

# define your project path.
PROJECT_DIR='/var/www/framework'

# define your paths.
CAPTCHA_DIR="$PROJECT_DIR/modules/captcha/assets/images/"
APP_LOG_DIR="$PROJECT_DIR/app/core/logs/"
MOD_LOG_DIR="$PROJECT_DIR/modules/"

# delete application and module directory log files.
find $APP_LOG_DIR -name 'log-*.php' -exec rm -rf {} \;  # help https://help.ubuntu.com/community/find
find $MOD_LOG_DIR -name 'log-*.php' -exec rm -rf {} \;

# force delete captcha images.
find $CAPTCHA_DIR -name '*.jpg' -exec rm -rf {} \;