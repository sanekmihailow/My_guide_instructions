
### Use latest version in repo on Ubuntu 18.04
```nginx
wget -qO - http://packages.diladele.com/diladele_pub.asc | sudo apt-key add -
echo "deb http://squid410.diladele.com/ubuntu/ bionic main" > /etc/apt/sources.list.d/diladele_squid-4_10.list
apt update
apt-cache showpkg squid |grep 4.10
apt install squid-common squid squidclient
sudo systemctl start squid && sudo systemctl enable squid
```
* /etc/squid.conf

```java
# Авторизация по логину и паролю
#auth_param basic program /usr/lib/squid/basic_ncsa_auth /etc/squid/internet_users
#auth_param basic children 5
#auth_param basic realm =serveR=
#auth_param basic credentialsttl 2 hours
#auth_param basic blankpassword off

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
#acl Safe_ports port 631         # cups
#acl Safe_ports port 873         # rsync
#acl Safe_ports port 901         # SWAT

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

http_access allow internet_users
http_access allow GET
http_access allow HEAD 
http_access allow POST 
http_access allow PUT 
http_access allow PURGE 
http_access allow DELETE 
http_access allow OPTIONS 
http_access allow PATCH 
#С- Запретить доступ к портам, отсутствующим в списке открытых
http_access deny !Safe_ports
#С- Запретить метод CONNECT не на SSL-порты
http_access deny CONNECT !SSL_ports
#C- Разрешить только локальное управление кэшем
http_access allow localhost manager
#C- Не ограничивать локальный доступ с сервера
http_access deny manager
#C- Блокирует все, что не было разрешено выше
http_access deny all
#C- Подключения через прозрачный порт
http_port 55291 #accel defaultsite=85.234.9.47 vhost
access_log daemon:/var/log/squid/access.log squid
#C- log file
coredump_dir /var/spool/squid
#C- Время жизни объектов для протоколов FTP и GOPHE
refresh_pattern ^ftp:		1440	20%	10080
refresh_pattern ^gopher:	1440	0%	1440
refresh_pattern -i (/cgi-bin/|\?) 0	0%	0
refresh_pattern (Release|Packages(.gz)*)$      0       20%     2880
refresh_pattern .		0	20%	4320
#C- отключаем передачу заголовков в виде ip и user-agent
via off
request_header_access Via deny all
forwarded_for delete
```
