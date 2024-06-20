FROM sanda3cs/wordpress5.6 as main

EXPOSE 80

# Use a specific mirror
# Use a different mirror and add retry logic

RUN apk add php7-simplexml

# Nginx Config
COPY ./live-config/local/www.conf /etc/nginx/http.d/www.conf
COPY ./live-config/local/nginx-conf/randholeeresort.conf /etc/nginx/http.d/randholeeresort.conf
COPY ./live-config/local/nginx-conf/firs.conf /etc/nginx/http.d/firs.conf
COPY ./live-config/local/nginx-conf/ellens.conf /etc/nginx/http.d/ellens.conf

# Uncomment if the container uses PHP and you need a php override
#COPY ./live-config/local/php.ini /etc/php7/php.override.ini

COPY ./app/. /var/www/.

RUN ln -sf /var/www/public_html/includes /var/www/public_html/hotels/ellens
RUN ln -sf /var/www/public_html/includes /var/www/public_html/hotels/firs
RUN ln -sf /var/www/public_html/includes /var/www/public_html/hotels/randholee

RUN chown -R www-data:www-data *
RUN chmod -R 775 *

COPY ./live-config/local/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

ENTRYPOINT ["/docker-entrypoint.sh"]