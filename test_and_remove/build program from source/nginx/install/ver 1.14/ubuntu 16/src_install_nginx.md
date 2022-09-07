```
ffppath="/usr/LOCAL/InstalleD/nginx1.14"

sudo ./configure --prefix=$ffppath \
--conf-path=$ffppath/etc/nginx/nginx.conf \
--http-log-path=$ffppath/var/log/nginx/access.log \
--error-log-path=$ffppath/var/log/nginx/error.log \
--lock-path=$ffppath/var/lock/nginx.lock \
--pid-path=$ffppath/var/run/nginx.pid \
--http-proxy-temp-path=$ffppath/var/lib/nginx/proxy \
--http-client-body-temp-path=$ffppath/var/lib/nginx/body \
--http-fastcgi-temp-path=$ffppath/var/lib/nginx/fastcgi \
--http-client-body-temp-path=$ffppath/var/lib/nginx/body \
--with-debug \
--with-pcre-jit \
--with-http_ssl_module \
--with-http_stub_status_module \
--with-http_realip_module \
--with-http_auth_request_module \
--with-http_addition_module \
--with-http_dav_module \
--with-http_flv_module \
--with-http_geoip_module \
--with-http_gunzip_module \
--with-http_image_filter_module \
--with-http_mp4_module \
--with-http_perl_module \
--with-http_random_index_module \
--with-http_secure_link_module \
--with-http_v2_module \
--with-http_sub_module \
--with-http_xslt_module \
--with-stream \
--with-stream_ssl_module \
--with-threads \
--with-http_gzip_static_module \
--with-file-aio \
--without-http_uwsgi_module \
--without-http_scgi_module \
--add-module=$PWD/../modules/echo-nginx-module-0.61 \
--add-module=$PWD/../modules/headers-more-nginx-module-0.33 \
--add-module=$PWD/../modules/nginx-push-stream-module-0.5.4 \
--add-module=$PWD/../modules/mod_zip-1.1.6_evanmller_master \
--with-cc-opt='-O2 -g -pipe -Wall -Wp,-D_FORTIFY_SOURCE=2 -fexceptions -fstack-protector --param=ssp-buffer-size=4 -m64 -mtune=generic'
```
