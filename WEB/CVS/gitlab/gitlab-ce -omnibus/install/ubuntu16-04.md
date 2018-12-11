verion (installed)
========

<d>
 <details>
            
1)php
```nginx
$ dpkg -l |grep php
```
```php
libapache2-mod-php7.0  7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  server-side,     HTML-embedded  scripting       language             (Apache        2            module)
php-apcu               5.1.11+4.0.11-1+ubuntu16.04.1+deb.sury.org+1              amd64  APC              User           Cache           for                  PHP
php-apcu-bc            1.0.4-1+ubuntu16.04.1+deb.sury.org+1                      amd64  APCu             Backwards      Compatibility   Module
php-bcmath             1:7.1+55+ubuntu16.04.1+deb.sury.org+1                     all    Bcmath           module         for             PHP                  [default]
php-common             1:55+ubuntu16.04.1+deb.sury.org+1                         all    Common           files          for             PHP                  packages
php-gettext            1.0.11-2+deb.sury.org~xenial+1                            all    read             gettext        MO              files                directly,      without      requiring     anything  other  than  PHP
php-igbinary           2.0.1-1+ubuntu16.04.1+deb.sury.org+2                      amd64  igbinary         PHP            serializer
php-ldap               1:7.1+55+ubuntu16.04.1+deb.sury.org+1                     all    LDAP             module         for             PHP                  [default]
php-memcached          3.0.4+2.2.0-1+ubuntu16.04.1+deb.sury.org+1                amd64  memcached        extension      module          for                  PHP,           uses         libmemcached
php-msgpack            2.0.2+0.5.7-1+ubuntu16.04.1+deb.sury.org+3                amd64  PHP              extension      for             interfacing          with           MessagePack
php-mysql              1:7.1+55+ubuntu16.04.1+deb.sury.org+1                     all    MySQL            module         for             PHP                  [default]
php-pear               1:1.10.5+submodules+notgz-1+ubuntu16.04.1+deb.sury.org+1  all    PEAR             Base           System
php-phpseclib          2.0.1-1build1                                             all    implementations  of             an              arbitrary-precision  integer        arithmetic   library
php-tcpdf              6.0.093+dfsg-1ubuntu1                                     all    PHP              class          for             generating           PDF            files        on-the-fly
php7.0                 7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     all    server-side,     HTML-embedded  scripting       language             (metapackage)
php7.0-bcmath          7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  Bcmath           module         for             PHP
php7.0-bz2             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  bzip2            module         for             PHP
php7.0-cgi             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  server-side,     HTML-embedded  scripting       language             (CGI           binary)
php7.0-cli             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  command-line     interpreter    for             the                  PHP            scripting    language
php7.0-common          7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  documentation,   examples       and             common               module         for          PHP
php7.0-curl            7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  CURL             module         for             PHP
php7.0-fpm             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  server-side,     HTML-embedded  scripting       language             (FPM-CGI       binary)
php7.0-gd              7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  GD               module         for             PHP
php7.0-imap            7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  IMAP             module         for             PHP
php7.0-json            7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  JSON             module         for             PHP
php7.0-mbstring        7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  MBSTRING         module         for             PHP
php7.0-mcrypt          7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  libmcrypt        module         for             PHP
php7.0-mysql           7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  MySQL            module         for             PHP
php7.0-opcache         7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  Zend             OpCache        module          for                  PHP
php7.0-readline        7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  readline         module         for             PHP
php7.0-xml             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  DOM,             SimpleXML,     WDDX,           XML,                 and            XSL          module        for       PHP
php7.0-zip             7.0.26-2+ubuntu16.04.1+deb.sury.org+2                     amd64  Zip              module         for             PHP
```

2)apache2 and nginx
```nginx
$ dpkg -l |grep apache2
```
```php
apache2                 2.4.18-2ubuntu3.5                      amd64  Apache        HTTP           Server
apache2-bin             2.4.18-2ubuntu3.5                      amd64  Apache        HTTP           Server     (modules      and       other         binary   files)
apache2-data            2.4.18-2ubuntu3.5                      all    Apache        HTTP           Server     (common       files)
apache2-dev             2.4.18-2ubuntu3.5                      amd64  Apache        HTTP           Server     (development  headers)
apache2-utils           2.4.18-2ubuntu3.5                      amd64  Apache        HTTP           Server     (utility      programs  for           web      servers)
libapache2-mod-fastcgi  2.4.7~0910052141-1.2                   amd64  Apache        2              FastCGI    module        for       long-running  CGI      scripts
libapache2-mod-php7.0   7.0.26-2+ubuntu16.04.1+deb.sury.org+2  amd64  server-side,  HTML-embedded  scripting  language      (Apache   2             module)
libapache2-mpm-itk      2.4.7-04-1                             amd64  multiuser     module         for        Apache
```
```nginx
sudo a2dismod 
```
```php
access_compat  authn_core     authz_user     env            mime           php7.0         rpaf           
actions        authn_file     autoindex      filter         mpm_itk        proxy          setenvif       
alias          authz_core     deflate        headers        mpm_prefork    proxy_http     status         
auth_basic     authz_host     dir            info           negotiation    rewrite        vhost_alias   
```
```nginx
nginx -V
```
```php
nginx version: nginx/1.10.3 (Ubuntu)
built with OpenSSL 1.0.2g  1 Mar 2016
TLS SNI support enabled
configure arguments: --with-cc-opt='-g -O2 -fPIE -fstack-protector-strong -Wformat -Werror=format-security -Wdate-time -D_FORTIFY_SOURCE=2' --with-ld-opt='-Wl,-Bsymbolic-functions -fPIE -pie -Wl,-z,relro -Wl,-z,now' --prefix=/usr/share/nginx --conf-path=/etc/nginx/nginx.conf --http-log-path=/var/log/nginx/access.log --error-log-path=/var/log/nginx/error.log --lock-path=/var/lock/nginx.lock --pid-path=/run/nginx.pid --http-client-body-temp-path=/var/lib/nginx/body --http-fastcgi-temp-path=/var/lib/nginx/fastcgi --http-proxy-temp-path=/var/lib/nginx/proxy --http-scgi-temp-path=/var/lib/nginx/scgi --http-uwsgi-temp-path=/var/lib/nginx/uwsgi --with-debug --with-pcre-jit --with-ipv6 --with-http_ssl_module --with-http_stub_status_module --with-http_realip_module --with-http_auth_request_module --with-http_addition_module --with-http_dav_module --with-http_geoip_module --with-http_gunzip_module --with-http_gzip_static_module --with-http_image_filter_module --with-http_v2_module --with-http_sub_module --with-http_xslt_module --with-stream --with-stream_ssl_module --with-mail --with-mail_ssl_module --with-threads
```


3)certbot
```nginx
           $ certbot --version
```
```php
certbot 0.22.2
```
```nginx      
         $ dpkg -l |grep certbot
  ```
  ```php
  certbot                              0.22.2-1+ubuntu16.04.1+certbot+1                         all          automatically configure HTTPS using Let's Encrypt
  python-certbot-apache                0.22.0-1+ubuntu16.04.1+certbot+2                         all          transitional dummy package
  python-certbot-nginx                 0.22.0-1+ubuntu16.04.1+certbot+2                         all          transitional dummy package
  python3-acme                         0.22.2-1+ubuntu16.04.1+certbot+1                         all          ACME protocol library for Python 3
  python3-asn1crypto                   0.22.0-2+ubuntu16.04.1+certbot+1                         all          Fast ASN.1 parser and serializer (Python 3)
  python3-augeas                       0.5.0-1+ubuntu16.04.1+certbot+1                          all          Python3 bindings for Augeas
  python3-certbot                      0.22.2-1+ubuntu16.04.1+certbot+1                         all          main library for certbot
  python3-certbot-apache               0.22.0-1+ubuntu16.04.1+certbot+2                         all          Apache plugin for Certbot
  python3-certbot-nginx                0.22.0-1+ubuntu16.04.1+certbot+2                         all          Nginx plugin for Certbot
  python3-cffi-backend                 1.10.0-0.1+ubuntu16.04.1+certbot+1                       amd64        Foreign Function Interface for Python 3 calling C code - runtime
  python3-configargparse               0.11.0-1+certbot~xenial+1                                all          replacement for argparse with config files and environment variables (Python 3)
  python3-configobj                    5.0.6-2+ubuntu16.04.1+certbot+1                          all          simple but powerful config file reader and writer for Python 3
  python3-cryptography                 1.9-1+ubuntu16.04.1+certbot+2                            amd64        Python library exposing cryptographic recipes and primitives (Python 3)
  python3-future                       0.15.2-4+ubuntu16.04.1+certbot+3                         all          Clean single-source support for Python 3 and 2 - Python 3.x
  python3-idna                         2.5-1+ubuntu16.04.1+certbot+1                            all          Python IDNA2008 (RFC 5891) handling (Python 3)
  python3-josepy                       1.0.1-1+ubuntu16.04.1+certbot+7                          all          JOSE implementation for Python 3.x
  python3-ndg-httpsclient              0.4.2-1+certbot~xenial+1                                 all          enhanced HTTPS support for httplib and urllib2 using PyOpenSSL for Python3
  python3-openssl                      17.3.0-1~0+ubuntu16.04.1+certbot+1                       all          Python 3 wrapper around the OpenSSL library
  python3-parsedatetime                2.4-3+ubuntu16.04.1+certbot+3                            all          Python 3 module to parse human-readable date/time expressions
  python3-pyasn1                       0.1.9-2+certbot~xenial+1                                 all          ASN.1 library for Python (Python 3 module)
  python3-rfc3339                      1.0-4+certbot~xenial+1                                   all          parser and generator of RFC 3339-compliant timestamps (Python 3)
  python3-zope.component               4.3.0-1+ubuntu16.04.1+certbot+3                          all          Zope Component Architecture
  python3-zope.hookable                4.0.4-4+ubuntu16.04.1+certbot+1                          amd64        Hookable object support
  python3-zope.interface               4.3.2-1+ubuntu16.04.1+certbot+1                          amd64        Interfaces for Python3
```

4)mysql
 ```nginx
         $ mysql -V
```
```php
mysql  Ver 14.14 Distrib 5.7.20, for Linux (x86_64) using  EditLine wrapper
```
```nginx
        $ dpkg -l |grep mysql
  ```
  ```php
  dbconfig-mysql                       2.0.4ubuntu1                                             all          dbconfig-common MySQL/MariaDB support
  libmysqlclient20:amd64               5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database client library
  mysql-client                         5.7.20-0ubuntu0.16.04.1                                  all          MySQL database client (metapackage depending on the latest version)
  mysql-client-5.7                     5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database client binaries
  mysql-client-core-5.7                5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database core client binaries
  mysql-common                         5.7.20-0ubuntu0.16.04.1                                  all          MySQL database common files, e.g. /etc/mysql/my.cnf
  mysql-server                         5.7.20-0ubuntu0.16.04.1                                  all          MySQL database server (metapackage depending on the latest version)
  mysql-server-5.7                     5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database server binaries and system database setup
  mysql-server-core-5.7                5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database server binaries
```
5)gitlab 
```nginx

$ cat /opt/gitlab/version-manifest.txt 
```

```php
gitlab-ce 10.7.0
Component                Installed Version                            
----------------------------------------------------------------------
acme-client              0.4.0                                      
awesome_print            1.8.0                                      
bundler                  1.13.7                                     
bzip2                    1.0.6                                        
cacerts                  2018.01.17                                   
chef-acme                b49c28d                                      
chef-gem                 13.6.4                                     
chef-zero                13.1.0                                     
compat_resource          v12.19.0                                     
config_guess             c9092d05347c925a26f6887980e185206e13f9d6     
curl                     7.56.1                                       
git                      2.14.3                                       
gitaly                   v0.95.0                                      
gitlab-config-template   10.7.0                                     
gitlab-cookbooks         10.7.0                                     
gitlab-ctl               10.7.0                                     
gitlab-healthcheck       a596f019c73c7aeb89ddd912d237addf           
gitlab-monitor           v2.5.0                                       
gitlab-pages             v0.8.0                                       
gitlab-psql              ff26e3be21c690dd34db5cc8fc6c9b55           
gitlab-rails             v10.7.0                                      
gitlab-scripts           10.7.0                                     
gitlab-selinux           10.7.0                                     
gitlab-shell             v7.1.2                                       
gitlab-workhorse         v4.1.0                                       
gnupg                    2.1.15                                       
go-crond                 0.6.1                                        
gpgme                    1.9.0                                        
jemalloc                 4.2.1                                        
krb5                     1.14.2                                       
libassuan                2.4.4                                        
libedit                  20120601-3.0                                 
libffi                   3.2.1                                        
libgcrypt                1.8.1                                        
libgpg-error             1.27                                         
libiconv                 1.14                                         
libicu                   57.1                                         
libksba                  1.3.5                                        
liblzma                  5.2.2                                        
libossp-uuid             1.6.2                                        
libre2                   2016-02-01                                   
libtool                  2.4                                          
libxml2                  2.9.6                                        
libxslt                  1.1.29                                       
libyaml                  0.1.7                                        
logrotate                r3-8-5                                       
makedepend               1.0.5                                        
mattermost               4.8.1                                        
mixlib-log               1.7.1                                      
ncurses                  5.9                                          
nginx                    1.12.1                                       
node-exporter            v0.15.2                                      
npth                     1.5                                          
ohai                     13.7.1                                     
omnibus-ctl              v0.5.0                                       
openssl                  1.0.2m                                       
package-scripts          46a41c0b9ff44d82dc0b38853e52d86f345bf2c0   
pcre                     8.40                                         
pkg-config-lite          0.28-1                                       
popt                     1.16                                         
postgres-exporter        v0.4.1                                       
postgresql               9.6.8                                        
prometheus               v1.8.2                                       
python-docutils          0.11                                       
python3                  3.4.8                                        
rb-readline              master                                       
redis                    3.2.11                                       
redis-exporter           v0.17.1                                      
registry                 2.6.2-with-patch                             
remote-syslog            1.6.15                                     
rsync                    3.1.2                                        
ruby                     2.3.6                                        
rubygems                 2.6.13                                     
runit                    2.1.1                                        
unzip                    6.0                                          
util-macros              1.18.0                                       
version-manifest         0.0.1                                      
xproto                   7.0.25                                       
zlib                     1.2.11                                     
```
 </details>
</d>

Links
=====
[1](https://about.gitlab.com/installation/#ubuntu)

[2](https://docs.gitlab.com/omnibus/README.html#installation-and-configuration-using-omnibus-package)

[3](https://gitlab.com/gitlab-org/omnibus-gitlab/blob/master/doc/settings/nginx.md#using-a-non-bundled-web-server)


Install
=========

# METHOD 1
### 1) Install neccessary packages
```nginx
sudo apt update
sudo apt install ca-certificates curl openssh-server postfix
```
### 2) Import gpg key
```nginx
curl -LO https://packages.gitlab.com/install/repositories/gitlab/gitlab-ce/script.deb.sh |sudo bash
```
### 3) Install package
```nginx
sudo install gitlab-ce
sudo gitlab-ctl reconfigure
```
### 4) edit config and off nginx bundled nginx
```nginx
sudo vim /etc/gitlab/gitlab.rb
```
```frege
 external_url 'http://domain_name'
 gitlab_rails['trusted_proxies'] = [ '192.168.0.0/19', '127.0.0.1/24' ]
 gitlab_workhorse['enable'] = true
 gitlab_workhorse['listen_network'] = "tcp"
 gitlab_workhorse['listen_addr'] = "127.0.0.1:8181"
 unicorn['port'] = 9081
 web_server['external_users'] = ['www-data']
 nginx['enable'] = false
 pages_external_url "http://subdomain.domain_name/"
 gitlab_pages['enable'] = true
 # git_data_dirs({ "default" => { "path" => "/var/www/gitlab/var/git-data" } })
 ```
 ### 5) Install gitlab-runner
 ##### 1. instal gpg
 ```nginx
 curl -L https://packages.gitlab.com/install/repositories/runner/gitlab-runner/script.deb.sh | sudo bash
 ```
 ##### 2.instaall packaege
 ```nginx
 sudo apt install gitlab-runner
 sudo service gitlab-runner restart
 sudo gitlab-ctl reconfigure
 ```
 
 edits post installation
 =====
 
 ```nginx 
 sudo a2enmod proxy proxy_http
 ```
 > nginx reverse proxy for apache -> apache proxied gitlab_work-horse (nginx -> apache -> work-horse)
 
 > create nginx and apache2 sites conf and enabled(activate)
 
 
 
 
 

