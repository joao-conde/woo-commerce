#!/bin/bash

function setup_themes {
    wp --allow-root --path=/var/www/html core install --url=$WORDPRESS_SITE_URL --title="HELLO" --admin_user=$WORDPRESS_ADMIN_USER --admin_password=$WORDPRESS_ADMIN_PASSWORD --admin_email=$WORDPRESS_ADMIN_EMAIL
    wp --allow-root --path=/var/www/html option update siteurl $WORDPRESS_SITE_URL
    wp --allow-root --path=/var/www/html option update home $WORDPRESS_HOME
    wp --allow-root --path=/var/www/html option update blogname "$WORDPRESS_SITE_TITLE"
    wp --allow-root --path=/var/www/html option update blogdescription "$WORDPRESS_SITE_DESCRIPTION"
    # wp --allow-root --path=/var/www/html theme install storefront 
    # wp --allow-root --path=/var/www/html theme activate storefront
    # wp --allow-root --path=/var/www/html plugin install woocommerce --activate
}

export WORDPRESS_ADMIN_USER=${WORDPRESS_ADMIN_USER:-"admin"}
export WORDPRESS_ADMIN_PASSWORD=${WORDPRESS_ADMIN_PASSWORD:-"adminadmin"}
export WORDPRESS_ADMIN_EMAIL=${WORDPRESS_ADMIN_EMAIL:-"my@email.com"}
export WORDPRESS_SITE_TITLE=${WORDPRESS_SITE_TITLE:-"My Woocommerce store"}
export WORDPRESS_SITE_DESCRIPTION=${WORDPRESS_SITE_DESCRIPTION:-"With WooCommerce + Theme preinstalled"}
export WORDPRESS_SITE_URL=${WORDPRESS_SITE_URL:-"http://localhost:8080"}
export WORDPRESS_HOME=${WORDPRESS_HOME:-"http://localhost:8080"}

setup_themes
