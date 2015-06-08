FROM ubuntu:latest
MAINTAINER Coin Culture <support@coinculture.info>

RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get dist-upgrade -y && apt-get install -y nginx php5-common php5-cli php5-fpm php5-curl && apt-get clean all

ENV repo /coinculture
RUN mkdir -p $repo
COPY . $repo/

RUN rm /etc/nginx/sites-enabled/*
COPY cc_site.conf /etc/nginx/sites-enabled/cc_site.conf
COPY php.ini /etc/php5/fpm/php.ini

EXPOSE 80
EXPOSE 443

RUN chmod 755 /coinculture/start.sh

CMD ["/coinculture/start.sh"]
