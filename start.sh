#! /bin/bash

/etc/init.d/php5-fpm start

# if no ssl, turn ssl off
if [ $NO_SSL ]; then
	ln -s /etc/nginx/sites-available/cc_site.conf /etc/nginx/sites-enabled/cc_site.conf
else
	ln -s /etc/nginx/sites-available/cc_site_ssl.conf /etc/nginx/sites-enabled/cc_site_ssl.conf
fi

/usr/sbin/nginx -g "daemon off;"
