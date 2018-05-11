links
==
<deatils>
<details>
 <summary>spoiler</summary>

[1](http://ittraveler.org/ustanovka-i-nastrojka-radius-servera-na-ubuntu-s-veb-interfejsom/)

[2](https://github.com/lirantal/daloradius/issues/5)

</deatils>
</details>

install daloradius (manage radius users and other)
==

### 1) install dependencies (for php7)
```nginx
           sudo apt install php-common php7.0-gd php7.0-curl php-mail php-mail-mime php-pear php-db
           pear install DB
```

### 2) download daloradius
```nginx
           cd /var/www
           sudo wget http://downloads.sourceforge.net/project/daloradius/daloradius/daloradius0.9-9/daloradius-0.9-9.tar.gz
           tar xvfz daloradius-0.9-9.tar.gz
           mv daloradius-0.9-9 daloradius
           chown -R www-data:www-data /var/www/daloradius
```

### 3) push dalo-sql in the database
```nginx
            mysql -u root -p db < /var/www/daloradius/contrib/db/mysql-daloradius.sql
```            

### 4) edit cfg daloraius for connect database
```nginx
            sudo vim /var/www/daloradius/library/daloradius.conf.php
```
edit
```bash
$configValues['CONFIG_DB_ENGINE'] = 'mysqli';
$configValues['CONFIG_DB_HOST'] = 'localhost';
$configValues['CONFIG_DB_PORT'] = '3306';
$configValues['CONFIG_DB_USER'] = 'db_user';
$configValues['CONFIG_DB_PASS'] = 'db_pass';
$configValues['CONFIG_DB_NAME'] = 'db';
```
```nginx
            sudo vim /var/www/daloradius/library/daloradius.conf.php
```
add to end
```bash
$dbSocket->query("SET GLOBAL sql_mode = '';");
```
```bash
def pass to daloradius
              login    -  administrator
              password -  radius
```
