<deatils>
<details>
 <summary>spoiler</summary>

```php
const x = 1
```
</details>
</details>

```
dpkg -l |grep freeraddius
ii  freeradius                           2.2.8+dfsg-0.1ubuntu0.1                                  amd64        high-performance and highly configurable RADIUS server
ii  freeradius-common                    2.2.8+dfsg-0.1ubuntu0.1                                  all          FreeRADIUS common files
ii  freeradius-mysql                     2.2.8+dfsg-0.1ubuntu0.1                                  amd64        MySQL module for FreeRADIUS server
ii  freeradius-utils                     2.2.8+dfsg-0.1ubuntu0.1                                  amd64        FreeRADIUS client utilities
ii  libfreeradius2                       2.2.8+dfsg-0.1ubuntu0.1                                  amd64        FreeRADIUS shared library

```


method 1 (package installation)
====

### 1) install freeradius
```nginx
             sudo apt update
             sudo apt install freeradius freeradius-common freeradius-mysql freeradius-utils           
```
> if you want package install version 3, you need
```nginx
            sudo add-apt-repository ppa:freeradius/stable-3.0
            sudo apt-get update
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
### 2) create database

### 3) push freeradius sql schema
> version 2.x
```nginx
            mysql -u root -p database < /etc/freeradius/sql/mysql/schema.sql
```
> version 3.x
```nginx
            mysql -u root -p database < /etc/freeradius/mods-config/sql/main/mysql/schema.sql
```
### 4) edit sql.conf
> version 2.x
```nginx
            sudo vim /etc/freeradius/sql.conf
```            
```bash
server = "localhost"
database = "mysql"
login =  "db_user"
password =  "db_password"
readclients = "yes"
radius_db = “db”
```
> version 3.x
```nginx

            sudo vim /etc/freeradius/mods-available/sql
```
```bash
sql {
driver = “rlm_sql_mysql”
server = “localhost”
login = “db_user”
password = “db_password”
radius_db = “db”
}
```
### 5) edit site conf
```nginx
            sudo vim etc/freeradius/sites-enabled/default
```
> ver 2.x
uncomment sql in the next sections
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
> ver 3.x 
change "-sql" on "sql" in section higher

### 6) include sql in radius.conf
```nginx
            sudo vim /etc/freeradius/radiusd.conf
```
> version 2.x
uncomment 
```bash
$INCLUDE sql.conf
```
> version 3.x
```nginx
            sudo ln -s /etc/freeradius/mods-available/sql /etc/freeradius/mods-enabled/
```

### 7) check work freeradius serv

##### add user
```nginx
            sudo vim /etc/freeradius/users
```
add
```bash
test Cleartext-Password := “testp”
```

##### start in debug mode
```nginx
            sudo freeradius -Xx
```
##### and new window (new ssh session) chek works
```nginx
            radtest test testp localhost 0 testing123
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

### 8) add wifi-AP in client.conf
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

METHOD 2 (src installation)
=========




















