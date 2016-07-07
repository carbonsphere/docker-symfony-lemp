############################################################
# Dockerfile: Nginx:Stable
############################################################
FROM nginx:stable

MAINTAINER CarbonSphere <CarbonSphere@gmail.com>

ADD nginx.conf /etc/nginx/nginx.conf
ADD symfony.conf /etc/nginx/conf.d/default.conf
#Insert server conf to add more hosts
#ADD server.conf /etc/nginx/conf.d/

ADD symfony /usr/local/bin/
ADD wait-for-it.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/symfony

RUN echo "upstream php-upstream { server phpserver:9000; }" > /etc/nginx/conf.d/upstream.conf

CMD ["symfony"]
