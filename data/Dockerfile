############################################################
# Dockerfile: BusyBox/Data Volume
############################################################
FROM busybox

MAINTAINER CarbonSphere <CarbonSphere@gmail.com>

ADD symfony/ /var/www/html/

RUN mkdir -p /var/log/nginx

# Add Parameter replacer file
ADD params.php /var/www/html/app/config/params.php

# Add params.php to config.yml after parameters.yml
RUN sed -i "s/parameters.yml }/parameters.yml }\n    - { resource: params.php }/g" /var/www/html/app/config/config.yml;


VOLUME /var/www
VOLUME /var/log
