FROM nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf
CMD /bin/bash -c "envsubst '\$PORT, \$HEROKU_CURL_B, \$HEROKU_API_URL' < /etc/nginx/conf.d/default.conf > /etc/nginx/conf.d/default.conf" && nginx -g 'daemon off;'
##