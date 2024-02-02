FROM nginx:alpine

ADD docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Copy public web files
COPY ./duck-site/public /var/www/site/public
COPY ./duck-game/public /var/www/game/public

