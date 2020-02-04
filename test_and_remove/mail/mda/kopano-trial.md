<d>
 <details>
  <summary> Installed kopano packages </summary>

```bash
ii  kopano-archiver                     8.7.9.0-0+16.1
ii  kopano-backup                       8.7.9.0-0+11.2
ii  kopano-client                       8.7.9.0-0+16.1
ii  kopano-common                       8.7.9.0-0+16.1
ii  kopano-dagent                       8.7.9.0-0+16.1
ii  kopano-dagent-pytils                8.7.9.0-0+11.2
ii  kopano-gateway                      8.7.9.0-0+16.1
ii  kopano-grapi                        8.7.9.0-0+11.2
ii  kopano-ical                         8.7.9.0-0+16.1
ii  kopano-kapid                        0.13.0-0+2.1
ii  kopano-konnectd                     0.25.2-0+4.1
ii  kopano-kwebd                        0.8.1-0+3.1
ii  kopano-kwmserverd                   0.16.1-0+3.1
ii  kopano-lang                         8.7.9.0-0+16.1
ii  kopano-meet                         1.1.1-0+5.1
ii  kopano-meet-packages                1.1.1-0+5.1
ii  kopano-meet-webapp                  1.1.1-0+5.1
ii  kopano-migration-imap               8.7.9.0-0+16.1
ii  kopano-migration-pst                8.7.9.0-0+11.2
ii  kopano-monitor                      8.7.9.0-0+16.1
ii  kopano-python-utils                 8.7.9.0-0+11.2
ii  kopano-python3-extras               0.1.2+0-0+53.1
ii  kopano-search                       8.7.9.0-0+11.2
ii  kopano-server                       8.7.9.0-0+16.1
ii  kopano-server-packages              8.7.9.0-0+16.1
ii  kopano-spooler                      8.7.9.0-0+16.1
ii  kopano-webapp                       3.5.14.2539+111.1
ii  kopano-webapp-plugin-filepreviewer  2.2.0.26+24.1
ii  kopano-webapp-plugin-files          2.1.5.305+101.1
ii  kopano-webapp-plugin-meetings       3.0.6.34
ii  kopano-webapp-plugin-smime          2.2.2.240+23.1
ii  kopano-webmeetings                  0.29.5-1
ii  libgsoap-kopano-2.8.95              2.8.95-0+1.1
ii  libvmime-kopano3                    0.9.2.96+3.1
ii  php-kopano-smime                    1.0.00+4.1
ii  python3-kopano                      8.7.9.0-0+11.2
ii  python3-kopano-rest                 8.7.9.0-0+11.2
ii  python3-kopano-search               8.7.9.0-0+11.2
ii  python3-kopano-utils                8.7.9.0-0+11.2
ii  z-push-backend-kopano               2.5.1+0-0
ii  z-push-kopano                       2.5.1+0-0
```

</details>
</d>

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

>or use
* /etc/apt/auth.conf.d/kopano.conf
```
#machene <host> login <login> password <pass>
machine download.kopano.io login serial password ZG59G03R59L1AD8T7CHQ42V8B
```
and source list
* /etc/apt/source.list.d/kopano.list
```
deb https://download.kopano.io/supported/core:/final/Ubuntu_18.04/ ./
deb https://download.kopano.io/supported/webapp:/final/Ubuntu_18.04/ ./
deb https://download.kopano.io/supported/webmeetings:/final/Debian_8.0/ ./
```

```nginx
sudo apt install mysql-server kopano-server-packages
sudo mysql_secure_installation
sudo apt install kopano-webapp
sudo apt install kopano-webmeetings kopano-webapp-plugin-meetings
```
```bash
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

disabled_features = pop3
server_ssl_key_file = /etc/letsencrypt/live/sub.example.com/privkey.key
server_ssl_ca_file = /etc/letsencrypt/live/sub.example.com/fullchain.pem
```

* /etc/kopano/admin.cfg ---
(create)
```bash
default_store_locale = ru_RU.UTF-8
```

* /etc/kopano/gateway.cfg
(create)
```
imap_expunge_on_delete = yes
imap_ignore_command_idle = yes
ssl_private_key_file = /etc/kopano/ssl/sub.example.com/privkey.pem
ssl_certificate_file = /etc/kopano/ssl/sub.example.com/fullchain.pem
log_method = file
log_level = 5
log_file = /var/log/kopano/gateway.log
log_timestamp = yes
imaps_listen = *:993
```

* /etc/default/kopano ---
(create)
```bash
LANG=ru_RU.UTF-8
KOPANO_USERSCRIPT_LOCALE="ru_RU.utf8"
```

* /etc/postfix/mysql-users.cf --- 
(create)
```bash
user = kopano
password = 123456
hosts = 127.0.0.1
dbname = kopanoDB
#query = select value from objectproperty where objectid=(select objectid from objectproperty where value='%s' limit 1) and propname='loginname';
query = select value from objectproperty where objectid=(select objectid from objectproperty where value='%s' limit 1) and propname='emailaddress';

```
* /etc/postfix/master.cf
```bash
# service type  private unpriv  chroot  wakeup  maxproc command + args
#               (yes)   (yes)   (no)    (never) (100)
smtp      inet  n       -       y       -       -       smtpd
submission inet n       -       y       -       -       smtpd
  -o smtpd_sasl_auth_enable=yes
  -o smtpd_enforce_tls=yes
smtps     inet  n       -       y       -       -       smtpd
  -o smtpd_tls_wrappermode=yes
  -o smtpd_sasl_auth_enable=yes
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
smtpd_banner = $myhostname ESMTP Who are you gonna pretend to be today?
biff = no
# appending .domain is the MUA's job.
append_dot_mydomain = no
readme_directory = no
compatibility_level = 2

### TLS SETTINGS ---start

smtpd_use_tls=yes
smtpd_tls_auth_only = yes
smtpd_starttls_timeout = 300s
smtpd_timeout = 300s
smtpd_tls_mandatory_protocols = !SSLv2,!SSLv3
smtpd_tls_protocols = 
smtpd_tls_exclude_ciphers = RC4, aNULL
#-- SSL
smtpd_tls_cert_file=/etc/letsencrypt/live/sub.example.com/fullchain.pem
smtpd_tls_key_file =/etc/letsencrypt/live/sub.example.com/privkey.pem
smtpd_tls_session_cache_database = btree:${data_directory}/smtpd_scache
smtp_tls_session_cache_database = btree:${data_directory}/smtp_scache
smtpd_tls_received_header = no
smtpd_tls_session_cache_timeout = 3600s
tls_random_source = dev:/dev/urandom
smtpd_sasl_local_domain =
smtpd_sasl_security_options = noanonymous
smtpd_sasl_auth_enable = yes
smtp_sasl_tls_security_options = noanonymous
#-- EDH config
smtpd_tls_dh1024_param_file = /etc/postfix/dh2048.pem
# use the Postfix SMTP server's cipher preference order instead of the remote client's cipher preference order.
tls_preempt_cipherlist = yes
# The Postfix SMTP server security grade for ephemeral elliptic-curve Diffie-Hellman (EECDH) key exchang
smtpd_tls_eecdh_grade = strong    
#-- tls logging
smtp_tls_loglevel = 0
smtpd_tls_loglevel = 0

#-- SMTP client
smtp_tls_security_level = may
smtp_tls_mandatory_protocols = !SSLv2,!SSLv3
smtp_tls_protocols = !SSLv2,!SSLv3
smtp_tls_exclude_ciphers = RC4, aNULL
# Support broken clients like Microsoft Outlook Express 4.x which expect AUTH=LOGIN instead of AUTH LOGIN
broken_sasl_auth_clients = yes
     
### TLS SETTINGS ---end



smtpd_relay_restrictions = permit_mynetworks permit_sasl_authenticated defer_unauth_destination
myhostname = sub.example.com
smtp_helo_name = sub.example.com
alias_maps = hash:/etc/aliases
alias_database = hash:/etc/aliases
virtual_alias_maps = mysql:/etc/postfix/mysql-users.cf
virtual_transport = lmtp:127.0.0.1:2003
mydestination = localhost $myhostname
virtual_mailbox_domains = example.com, new.example.com, example.ru
relayhost = 
mynetworks = 127.0.0.0/8 [::ffff:127.0.0.0]/104 [::1]/128, 192.168.0.0/23
mailbox_size_limit = 0
recipient_delimiter = +
inet_interfaces = all
inet_protocols = all
# SIZE MAIL (30 mb)
message_size_limit = 31457280

### OPENDKIM ---start

milter_default_action = accept
milter_protocol = 2
smtpd_milters = inet:localhost:8891
non_smtpd_milters = inet:localhost:8891

### OPENDKIM --end

### SENDER ACCESS RESTRICT ---start

smtpd_recipient_restrictions = 
    permit_mynetworks,
    permit_sasl_authenticated,
    hash:/etc/postfix/sender_access,
    reject_unauth_destination,
    reject_unlisted_recipient

### SENDER ACCESS RESTRICT ---end

```



```nginx
sudo systemctl restart kopano-server
sudo kopano-admin -c admin -p 123 -e admin@example.com -f 'Administrator' -a yes #create administrator
udo kopano-admin -c user -p 123 -e user@example.com -f 'User'                    #crete user
```


```nginx
kopano-cli --create --group Administration  #cretae group
```

```
cd /etc/postfix/
umask 022
openssl dhparam -out dh2048.pem 2048
chmod 644 dh2048.pem



mkdir /etc/kopano/ssl
chown root:kopano /etc/kopano/ssl
cp -r /etc/letsencrypt/archive/sub.example.com/* /etc/kopano/ssl/
chgrp -R kopano /etc/kopano/ssl/
chmod -R g+Xr /etc/kopano/ssl/
```

```
opendkim-genkey -D /etc/postfix/dkim/chemz.ru/ --domain chemz.ru --selector mail -b 1024
```

```
apt-get install libsasl2-modules sasl2-bin

```
* /etc/default/saslauthd
```
START=yes
DESC="SASL Authentication Daemon"
NAME="saslauthd"
MECHANISMS="rimap"
MECH_OPTIONS="127.0.0.1"
THREADS=5
OPTIONS="-r -c -m /var/spool/postfix/var/run/saslauthd"
```
```
dpkg-statoverride --add root sasl 750 /var/spool/postfix/var/run/saslauthd
adduser postfix sasl
```
* /etc/postfix/sasl/smtpd.conf
```
pwcheck_method: saslauthd
mech_list: plain login
```
```
postconf -e "smtpd_sasl_path = smtpd"
/etc/init.d/saslauthd restart
/etc/init.d/postfix restart
```





