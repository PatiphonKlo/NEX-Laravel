FROM asia-southeast2-docker.pkg.dev/striking-domain-409402/cloud-run-source-deploy/php-container:latest

RUN apk update && apk add --no-cache nginx wget
RUN mkdir -p /run/nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /var/www
COPY . /var/www
# COPY ./src /var/www

RUN wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer && apk add --update nodejs npm

RUN cd /var/www/src && \
    /usr/local/bin/composer install --no-dev 
    
RUN cd /var/www/src && \
    npm install 
    
RUN chown -R www-data: /var/www
RUN chmod +x /var/www/docker/startup.sh
CMD sh /var/www/docker/startup.sh