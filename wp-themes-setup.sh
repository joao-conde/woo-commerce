#!/bin/bash

export WORDPRESS_ADMIN_USER=${WORDPRESS_ADMIN_USER:-"root"}
export WORDPRESS_ADMIN_PASSWORD=${WORDPRESS_ADMIN_PASSWORD:-"root"}
export WORDPRESS_ADMIN_EMAIL=${WORDPRESS_ADMIN_EMAIL:-"root@email.com"}
export WORDPRESS_SITE_URL=${WORDPRESS_SITE_URL:-"http://localhost:8000"}
export WORDPRESS_HOME=${WORDPRESS_HOME:-"http://localhost:8000"}

# set store settings
wp --allow-root --path=/var/www/html core install --url=$WORDPRESS_SITE_URL --title="HELLO" --admin_user=$WORDPRESS_ADMIN_USER --admin_password=$WORDPRESS_ADMIN_PASSWORD --admin_email=$WORDPRESS_ADMIN_EMAIL
wp --allow-root --path=/var/www/html option update siteurl $WORDPRESS_SITE_URL
wp --allow-root --path=/var/www/html option update home $WORDPRESS_HOME

# uninstall default plugins
wp --allow-root --path=/var/www/html plugin delete akismet
wp --allow-root --path=/var/www/html plugin delete hello

# install and activate storefront (required by woocommerce)
wp --allow-root --path=/var/www/html theme install storefront
wp --allow-root --path=/var/www/html theme activate storefront

# install and activate woocommerce
wp --allow-root --path=/var/www/html plugin install woocommerce
wp --allow-root --path=/var/www/html plugin activate woocommerce

# activate Platforme's Bridge plugin
wp --allow-root --path=/var/www/html plugin activate bridge
