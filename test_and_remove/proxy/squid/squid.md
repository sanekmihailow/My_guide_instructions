
### Use latest version in repo on Ubuntu 18.04
```nginx
wget -qO - http://packages.diladele.com/diladele_pub.asc | sudo apt-key add -
echo "deb http://squid410.diladele.com/ubuntu/ bionic main" > /etc/apt/sources.list.d/diladele_squid-4_10.list
apt update
apt-cache showpkg squid |grep 4.10
apt install squid-common squid squidclient
sudo systemctl start squid && sudo systemctl enable squid
vim /etc/squid/squid.conf
sqid -k parse &> parse.log && grep -iRn 'error' parse.log
openssl req -new -newkey rsa:1024 -days 36500 -nodes -x509 -keyout squidCA.pem -out squidCA.pem
/usr/lib/squid/security_file_certgen -c -s /var/lib/ssl_db -M 4MB
chown -R proxy. /var/lib/ssl_db
ifconfig enp1s0 192.168.5.2 netmask 255.255.255.0 nameserver 8.8.8.8 up
```
* /etc/squid.conf

```sh

### AUTH PARAMS ---start

#  TAG: auth_param
# Авторизация по логину и паролю
#auth_param basic program /usr/lib/squid/basic_ncsa_auth /etc/squid/internet_users
#auth_param basic children 5
#auth_param basic realm =serveR=
#auth_param basic credentialsttl 2 hours
#auth_param basic blankpassword off
### ---end

### DETERMINE ACLS ---start

#-- Declare local networks
#  TAG: acl
acl localnet src 192.168.0.0/23
#acl users src 192.168.0.200-192.168.0.246
#acl trusted src 192.168.0.248 192.168.0.247
#acl localnet src 10.0.0.0/8		# RFC 1918 local private network (LAN)
#acl localnet src 100.64.0.0/10		# RFC 6598 shared address space (CGN)
#acl localnet src 169.254.0.0/16 	# RFC 3927 link-local (directly plugged) machines
#acl localnet src 172.16.0.0/12		# RFC 1918 local private network (LAN)
#acl localnet src 192.168.0.0/16		# RFC 1918 local private network (LAN)
#acl localnet src fc00::/7       	# RFC 4193 local private network range
#acl localnet src fe80::/10      	# RFC 4291 link-local (directly plugged) machines

#-- Declare ports:
#С- объявляем список разрешенных портов через прокси-сервер по протоколу HTTP
#acl worktime time 08:00-15:00  #;рабочее время для правила
acl SSL_ports port 443
acl Safe_ports port 80		      # http
acl Safe_ports port 21		      # ftp
acl Safe_ports port 443		      # https
acl Safe_ports port 70		      # gopher
acl Safe_ports port 210		      # wais
acl Safe_ports port 1025-65535	# unregistered ports
acl Safe_ports port 280		      # http-mgmt
acl Safe_ports port 488		      # gss-http
acl Safe_ports port 591		      # filemaker
acl Safe_ports port 777		      # multiling http
#M- acl Safe_ports port 631         # cups
#M- acl Safe_ports port 873         # rsync
#M- acl Safe_ports port 901         # SWAT

#-- declare methods:
#С- объявляем список методов
acl CONNECT method CONNECT
acl GET method GET
acl HEAD method HEAD
acl POST method POST
acl PUT method PUT
acl PURGE method PURGE
acl DELETE method DELETE
acl OPTIONS method OPTIONS
acl PATCH method PATCH

#С- Правило указывающее доступ в интернет только через авторизацию
acl internet_users proxy_auth REQUIRED

#-- declare lists allowed deny...:
#C- черные, белые и расширенные списки для:
# HTTP
acl black_list url_regex -i "/etc/squid/black_urls"
acl white_list url_regex "/etc/squid/white_urls"
acl access_group src "/etc/squid/extended_access_group"
# HTTPS
acl white_ssl ssl::server_name_regex "/etc/squid/allowed_urls_ssl"
acl black_ssl ssl::server_name_regex -i "/etc/squid/denied_urls_ssl"
acl step1 at_step SslBump1
### ---end


### Allow deny rules ---start

#  TAG: http_access
#-- allowed methods:
#C- разрешенные методы
http_access allow internet_users
http_access allow GET
http_access allow HEAD 
http_access allow POST 
http_access allow PUT 
http_access allow PURGE 
http_access allow DELETE 
http_access allow OPTIONS 
http_access allow PATCH

#-- allow deny:
#С- Запретить доступ к портам, отсутствующим в списке открытых
http_access deny !Safe_ports
#С- Запретить метод CONNECT не на SSL-порты
http_access deny CONNECT !SSL_ports
#C- Разрешить только локальное управление кэшем
http_access allow localhost manager
#C- Не ограничивать локальный доступ с сервера
http_access deny manager
http_access allow CONNECT
http_access deny black_list
#C- разрешаем всем кто не в группе расширенного доступа ходить только на разрешенные сайты
#M- http_access allow white_list
http_access deny !access_group !white_list
#M- http_access deny all worktime
#C- Блокирует все, что не было разрешено выше
http_access deny all
### ---end

### DECLARE PORTS ---start

#  TAG: http_port 
#C- необходим, чтобы в логах бесконечно не появлялась ошибка «ERROR: No forward-proxy ports configured»
http_port 3130
#C- http transparent
http_port 3128 intercept
#  TAG: https_port
#C- https transarent
https_port 3129 intercept ssl-bump options=ALL:NO_SSLv3:NO_SSLv2 connection-auth=off cert=/etc/squid/squidCA.pem
### ---end

### SSL SETTINGS
#C- направлять весь трафик сразу в интернет, без использования кешей даже с ошибками проверки сертификата
#  TAG: always_direct
always_direct allow all
#  TAG: sslproxy_cert_error
sslproxy_cert_error allow all
#  TAG: sslproxy_flags
sslproxy_flags DONT_VERIFY_PEER
#-- ssl bump:
#  TAG: ssl_bump
ssl_bump peek step1
ssl_bump terminate black_ssl
ssl_bump splice access_group
ssl_bump terminate !white_ssl
#M- ssl_bump splice white_ssl
#M- ssl_bump terminate all worktime
ssl_bump splice all
#  TAG: sslcrtd_program
sslcrtd_program /usr/lib/squid/ssl_crtd -s /var/lib/ssl_db -M 4MB
### ---end

### CACHE SETTINGS ---start
#  TAG: cache_mem       (bytes)
cache_mem 2048 MB
#  TAG: maximum_object_size_in_memory   (bytes)
maximum_object_size_in_memory 512 KB
#  TAG: memory_replacement_policy
memory_replacement_policy heap GDSF
#  TAG: cache_replacement_policy
cache_replacement_policy heap LFUDA
#  TAG: cache_dir
cache_dir aufs /var/spool/squid 4096 16 256
### ---end

#C- log file
#  TAG: access_log
access_log daemon:/var/log/squid/access.log squid
#  TAG: logfile_rotate
#C- обновлять записи в логе раз в 7 дней
logfile_rotate 7
#  TAG: coredump_dir
coredump_dir /var/spool/squid
#C- Время жизни объектов в кэше
#  TAG: refresh_pattern
refresh_pattern ^ftp:		1440	20%	10080
refresh_pattern ^gopher:	1440	0%	1440
refresh_pattern -i (/cgi-bin/|\?) 0	0%	0
refresh_pattern (Release|Packages(.gz)*)$      0       20%     2880
refresh_pattern .		0	20%	4320
#C- отключаем передачу заголовков в виде ip и user-agent
#  TAG: via     on|off
via off
#  TAG: request_header_access
request_header_access Via deny all
#  TAG: forwarded_for   on|off|transparent|truncate|delete
forwarded_for delete
```
