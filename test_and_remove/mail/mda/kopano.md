[https://kb.kopano.io/display/WIKI](https://kb.kopano.io/display/WIKI)

[https://documentation.kopano.io/](https://documentation.kopano.io/)

[https://documentation.kopano.io/webapp_admin_manual/index.html](https://documentation.kopano.io/webapp_admin_manual/index.html)

> ZG59G03R59L1AD8T7CHQ42V8B - ключ который высылают по почте (он всегда разный)
```nginx
sudo apt install apt-transport-https
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/core:/final/Ubuntu_18.04/Release.key |sudo apt-key add -
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_18.04/Release.key |sudo apt-key add -
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webmeetings:/final/Debian_8.0/Release.key |sudo apt-key add -
```
* /etc/apt/source.list.d/kopano.list

```
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/core:/final/Ubuntu_18.04/ ./
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_18.04/ ./
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webmeetings:/final/Debian_8.0/ ./
```

```
sudo apt install mysql-server kopano-server-packages
sudo mysql_secure_installation
sudo apt install kopano-webapp
sudo apt install kopano-webmeetings kopano-webapp-plugin-meetings


#sudo apt install kopano-libs &&
#sudo apt install kopano-utils &&
#sudo apt install kopano-dagent kopano-gateway kopano-ical kopano-monitor kopano-search kopano-server kopano-spooler &&
#sudo apt install kopano-core python3-kopano
```

#### MYSQL

```mysql
create database kopanoDB character set utf8 collate utf8_general_ci;
create user 'kopano'@'localhost' identified by '123456';
grant all privileges on kopanoDB.* to 'kopano'@'localhost';
flush privileges;
```
 * /etc/kopano/webapp/config.php ---
 (change false on true)
 ```php
 define("INSECURE_COOKIES", True);
 ```
 * /etc/kopano/server.cfg ---
 (create)
 ```bash
 mysql_user = kopano
mysql_password = 123456

mysql_host = localhost
mysql_port = 3306
mysql_socket =
mysql_database = kopanoDB
user_plugin = db

# server_listen = *:26
local_admin_users = root kopano
run_as_user = kopano
run_as_group = kopano
log_method = file
log_file = /var/log/kopano/server.log
log_level = 6
log_timestamp = yes
log_buffer_size = 0
#!include debian-db.cfg
```
* /etc/postfix/mysql-users.cf --- 
(create)
```bash
user = kopano
password = 123456
hosts = 127.0.0.1
dbname = kopanoDB
query = select value from objectproperty where objectid=(select objectid from objectproperty where value='%s' limit 1) and propname='loginname';
```
* /etc/postfix/master.cf
```
smtp      inet  n       -       n       -       -       smtpd
pickup    unix  n       -       y       60      1       pickup
cleanup   unix  n       -       y       -       0       cleanup
qmgr      unix  n       -       n       300     1       qmgr
tlsmgr    unix  -       -       y       1000?   1       tlsmgr
rewrite   unix  -       -       y       -       -       trivial-rewrite
bounce    unix  -       -       y       -       0       bounce
defer     unix  -       -       y       -       0       bounce
trace     unix  -       -       y       -       0       bounce
verify    unix  -       -       y       -       1       verify
flush     unix  n       -       y       1000?   0       flush
proxymap  unix  -       -       n       -       -       proxymap
proxywrite unix -       -       n       -       1       proxymap
smtp      unix  -       -       y       -       -       smtp
relay     unix  -       -       y       -       -       smtp
        -o syslog_name=postfix/$service_name
showq     unix  n       -       y       -       -       showq
error     unix  -       -       y       -       -       error
retry     unix  -       -       y       -       -       error
discard   unix  -       -       y       -       -       discard
local     unix  -       n       n       -       -       local
virtual   unix  -       n       n       -       -       virtual
lmtp      unix  -       -       y       -       -       lmtp
anvil     unix  -       -       y       -       1       anvil
scache    unix  -       -       y       -       1       scache
maildrop  unix  -       n       n       -       -       pipe
  flags=DRhu user=vmail argv=/usr/bin/maildrop -d ${recipient}
uucp      unix  -       n       n       -       -       pipe
  flags=Fqhu user=uucp argv=uux -r -n -z -a$sender - $nexthop!rmail ($recipient)
ifmail    unix  -       n       n       -       -       pipe
  flags=F user=ftn argv=/usr/lib/ifmail/ifmail -r $nexthop ($recipient)
bsmtp     unix  -       n       n       -       -       pipe
  flags=Fq. user=bsmtp argv=/usr/lib/bsmtp/bsmtp -t$nexthop -f$sender $recipient
scalemail-backend unix	-	n	n	-	2	pipe
  flags=R user=scalemail argv=/usr/lib/scalemail/bin/scalemail-store ${nexthop} ${user} ${extension}
mailman   unix  -       n       n       -       -       pipe
  flags=FR user=list argv=/usr/lib/mailman/bin/postfix-to-mailman.py
  ${nexthop} ${user}
```
* /etc/postfix/main.cf
```bash
smtpd_banner = $myhostname ESMTP $mail_name (Ubuntu)
biff = no
append_dot_mydomain = no
readme_directory = no
compatibility_level = 2
smtpd_tls_cert_file=/etc/ssl/certs/ssl-cert-snakeoil.pem
smtpd_tls_key_file=/etc/ssl/private/ssl-cert-snakeoil.key
smtpd_use_tls=yes
smtpd_tls_session_cache_database = btree:${data_directory}/smtpd_scache
smtp_tls_session_cache_database = btree:${data_directory}/smtp_scache
smtpd_relay_restrictions = permit_mynetworks permit_sasl_authenticated defer_unauth_destination
myhostname = ih1843494.vds.myihor.ru
alias_maps = hash:/etc/aliases
alias_database = hash:/etc/aliases
#_add-start:
virtual_alias_maps = mysql:/etc/postfix/mysql-users.cf
virtual_transport = lmtp:127.0.0.1:2003
#_add-end.
myorigin = /etc/mailname
mydestination = $myhostname, localhost
virtual_mailbox_domains = example.com
relayhost = 
mynetworks = 127.0.0.0/8 [::ffff:127.0.0.0]/104 [::1]/128
mailbox_size_limit = 0
recipient_delimiter = +
inet_interfaces = loopback-only
inet_protocols = all
```



```nginx
sudo systemctl restart kopano-server
se kopano-admin -d admin -p 123 -e admin@example.com -f 'Administrator' -a yes

```
