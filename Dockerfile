FROM wordpress:latest

# install WP CLI
RUN curl -o /bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN mv /bin/wp-cli.phar /bin/wp
RUN chmod +x /bin/wp

# copy setup script
COPY ./scripts/wp-themes-setup.sh ./wp-themes-setup.sh 
RUN mv ./wp-themes-setup.sh /bin/wp-themes-setup && chmod +x /bin/wp-themes-setup
