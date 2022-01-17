FROM wordpress:latest

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
 echo $(ls) && \
 php wp-cli.phar --info && \
 chmod +x wp-cli.phar && \
 mv wp-cli.phar /usr/local/bin/wp && \
 wp --allow-root plugin uninstall akismet hello
#  wp --allow-root theme uninstall --all && \
#  wp --allow-root plugin install woocommerce && \
#  wp --allow-root theme install storefront
