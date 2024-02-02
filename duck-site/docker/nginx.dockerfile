FROM nginx:alpine

ADD docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copy public web files
COPY ./duck-site/public /var/www/site/public
COPY ./duck-game/public /var/www/game/public

