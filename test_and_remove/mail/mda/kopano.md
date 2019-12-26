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
 ```
 mysql_user = kopano
mysql_password = 123456

mysql_host = localhost
mysql_port = 3306
mysql_socket =
mysql_database = kopanoDB
user_plugin = db
```
* /etc/postfix/mysql-users.cf --- 
(create)
```
user = kopano
password = 123456
hosts = 127.0.0.1
dbname = kopanoDB
query = select value from objectproperty where objectid=(select objectid from objectproperty where value='%s' limit 1) and propname='loginname';
```
```nginx
sudo systemctl restart kopano-server
se kopano-admin -d admin -p 123 -e admin@example.com -f 'Administrator' -a yes

```
