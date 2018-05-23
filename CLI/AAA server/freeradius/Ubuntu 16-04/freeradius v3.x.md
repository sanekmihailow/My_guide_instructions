

METHO 1
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
