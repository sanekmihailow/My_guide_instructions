

METHOD 1
===


### 1 install freeradius and dependencies
```nginx
             sudo add-apt-repository ppa:freeradius/stable-3.0
             sudo apt update
             sudo apt install freeradius freeradius-common freeradius-mysql freeradius-utils           
```
> or install dpkg
```nginx
            wget https://mirror.yandex.ru/ubuntu/pool/main/f/freeradius/freeradius_3.0.16+dfsg-3ubuntu1_amd64.deb
            wget https://mirror.yandex.ru/ubuntu/pool/main/f/freeradius/libfreeradius3_3.0.16+dfsg-3ubuntu1_amd64.deb 
            wget https://mirror.yandex.ru/ubuntu/pool/main/f/freeradius/freeradius-utils_3.0.16+dfsg-3ubuntu1_amd64.deb 
            wget https://mirror.yandex.ru/ubuntu/pool/main/f/freeradius/freeradius-common_3.0.16+dfsg-3ubuntu1_all.deb
            wget https://mirror.yandex.ru/ubuntu/pool/universe/f/freeradius/freeradius-mysql_3.0.16+dfsg-3ubuntu1_amd64.deb 
            dpkg -i *.deb
```

### 2 create database
```nginx        
        $ mysql -u root -p
              mysql> show databases;
              mysql> create database radius_db;
              mysql> GRANT ALL ON radius_db.* to 'radius_user'@'localhost' IDENTIFIED BY 'new_password_for_acceess_radius-user';
              mysql> flush priveleges;
              mysql> \q
 ```            
### 2 push freeradius sql schema to db

```nginx
           mysql -u root -p database < /etc/freeradius/mods-config/sql/main/mysql/schema.sql
```
##### crete testsql user
```nginx
            mysql -u root -p
            
```
```sql
                             mysql> use db;
                             mysql> INSERT INTO radcheck (UserName, Attribute, op, Value) VALUES ('sqltest', 'Cleartext-Password', ':=' , 'testpwd');
                             mysql> \q
```


### 3 check work freeradius serv

##### add user
```nginx
            sudo vim /etc/freeradius/users
```
add
```bash
test Cleartext-Password := “testp”
```

##### test user

> start in debug mode
```nginx
            sudo freeradius -Xx
```
> and open new window (new ssh session) and check it is works
```nginx
            radtest test testp localhost 0 testing123
```
or
```nginx
            radtest test test localhost 0 testing123
```

if you will view
```bash
Sending Access-Request of id 45 to 127.0.0.1 port 1812
        User-Name = "test"
        User-Password = "testp"
        NAS-IP-Address = 127.0.1.1
        NAS-Port = 0
        Message-Authenticator = 0x00000000000000000000000000000000
rad_recv: Access-Accept packet from host 127.0.0.1 port 1812, id=45, length=20
```
it means all ok

### 4 add sql

##### edit sql.conf

```nginx
            sudo vim /etc/freeradius/sql.conf
```            
```bash
driver = "rlm_sql_mysql"
server = "localhost"
login = "radius_user"
password = "db_password"
radius_db = "radius_db"
```

##### edit site conf
```nginx
            sudo vim etc/freeradius/sites-enabled/default
```
change "-sql" on "sql"
```bash
authorize {
sql
}
accounting {
sql
}
session {
sql
}
post-auth {
sql
}
```
##### include sql in radius.conf

```nginx
             sudo ln -s /etc/freeradius/mods-available/sql /etc/freeradius/mods-enabled/
```

### 5 check works sql

```nginx
            sudo freeradius -Xx
```
##### and open new window (new ssh session) and check it is works
```nginx
            radtest sqltest testpwd localhost 1812 testing123
```
if you will view
```bash
Sending Access-Request of id 45 to 127.0.0.1 port 1812
        User-Name = "sqltest"
        User-Password = "testpwd"
        NAS-IP-Address = 127.0.1.1
        NAS-Port = 18128
        Message-Authenticator = 0x00000000000000000000000000000000
rad_recv: Access-Accept packet from host 127.0.0.1 port 1812, id=45, length=20
```
it means all ok and sql worked

### 6 add wifi-AP in client.conf
```nginx
            sudo vim /etc/freeradius/clients.conf
```
after
```php
                     client localhost {
                     ....
                     }
```
add
```bash
client office1-wifi {
       ipaddr = 192.168.0.6 #addr widi-AP1
       secret = password1
       require_message_authentificator = no
}

client office1_2-wifi {
       ipaddr = 192.168.0.7 #addr wifi-AP2
       secret = password2
       require_message_authentificator = no
}
```
##### and restart freeradius

> Note in db, table "radcheck" contains users and passwords if you use sql may forget "users file" in radius directory.

> nas contains clients

> radacct contains session info


METHOD 2
===

## 1. isntall xstow for managing installed src (it's created symlinks in /usr/local)

```nginx
            sudo apt install xstow
```
## 2. install freeradius

### 1 install dependencies and headers
```nginx
           sudo apt install sqlite3 libsqlite3-dev libpcap0.8-dev libcap-dev libtalloc2 libtalloc-dev libssl-dev libperl-dev libpam0g-dev libmemcached-dev libjson0-dev libpython2.7-dev libsystemd-dev libmysqld-dev libevent-dev python-dev
```           
### 2 change directory and download src freeradius
```nginx
           sudo mkdir -p /usr/local/need_install/src/freeradius
           cd /usr/local/need_install/src/freeradius
           sudo wget https://github.com/FreeRADIUS/freeradius-server/archive/v3.0.x.zip
           sudo unzip v3.0.x.zip
           cd freeradius-server-3.0.x/
```
### 3 start configure
```nginx
           sudo ./configure --prefix=/usr/local/stow/freeradius-3 --enable-developer
           sudo make
           sudo ldconfig -v
           sudo make install
           cd /usr/local/stow/
           sudo xstow freeradius-3
```

###  create database ( 2-6 higher)

[higher](#2-create-database)


### 4 start in debug mode
##### add user
```nginx
            sudo vim /etc/freeradius/users
```
add
```bash
sqltest Cleartext-Password := “testpwd”
```
debug mode
```nginx
            sudo radiusd -Xx
```

and connect at wifi-ap (check works)
> kill radiusd
```nginx
            sudo pkill radiusd
```            
### 5 change permissions

##### create new user
```nginx
           sudo useradd -r -s /bin/false local_freerad
```           

<deatils>
<details>
  <summary>bash script</summary>

```bash 
 #!/bin/bash
raduser='local_freerad'
freepath="/usr/local/stow/freeradius-3"

list_etc="$freepath/etc/raddb/mods-enabled
	$freepath/etc/raddb/mods-available
	$freepath/etc/raddb/policy.d
	$freepath/etc/raddb/sites-enabled
	$freepath/etc/raddb/mods-config
	$freepath/etc/raddb/certs
	$freepath/etc/raddb/sites-available
	$freepath/etc/raddb/policy.d
	$freepath/etc/raddb/clients.conf
	$freepath/etc/raddb/users
	$freepath/etc/raddb/dictionary
	$freepath/etc/raddb/radiusd.conf
	$freepath/etc/raddb/proxy.conf"

list_var="$freepath/var/log/radius
	$freepath/var/run/radiusd"

chown -R root:root $freepath
chown -R root:"$raduser" $list_etc
chown -R "$raduser":"$raduser" $list_var

exit 0
```

</details>
</details>

### 6 create systemd daemon

```nginx
           sudo mkdir /usr/local/stow/freeradius-3/etc/default/
           sudo vim /usr/local/stow/freeradius-3/etc/default/freeradius
```
add
```bash
FREERADIUS_OPTIONS=""
```

```nginx
           sudo vim /etc/systemd/system/local_freeradius.service
```
add
<deatils>
<details>
 <summary>systemd</summary>
 
```bash
[Unit]                                                                                                                     
Description=Local freeradius service daemon                                                         
Before=multi-user.target                                                                                        
Before=multi-user.target                                                                                        
Before=multi-user.target                                                                                        
Before=graphical.target                                                                                         
Before=shutdown.target                                                                                         
After=remote-fs.target                                                                                         
After=network-online.target                                                                                     
After=systemd-journald-dev-log.socket                                                                           
After=time-sync.target                                                                                         
After=mysql.service                                                                                         
After=slapd.service                                                                                          
After=postgresql.service                                                                                       
After=samba.service                                                                                            
After=krb5-kdc.service                                                                                         
Wants=network-online.target                                                                                    
Conflicts=shutdown.target                                                                                                   
[Service]                                                                                                               
Type=forking                                                                                            
User=local_freerad                                                                                         
Group=local_freerad                                                                                          
PIDFile=/usr/local//var/run/radiusd/radiusd.pid                                                             
EnvironmentFile=-/usr/local/etc/default/freeradius                                                      
ExecStartPre=/usr/local/sbin/radiusd $FREERADIUS_OPTIONS -Cxm -lstdout                                  
ExecStart=/usr/local/sbin/radiusd $FREERADIUS_OPTION                                                    
Restart=on-abnormal                                                                                                         

[Install]                                                                                                                   
WantedBy=multi-user.target       
```
</details>
</details>

and

```nginx
           sudo systemctl enable local_freeradius.service # autostart after reboot
           sudo systemctl start local_freeradius.service
```
WELL DONE
