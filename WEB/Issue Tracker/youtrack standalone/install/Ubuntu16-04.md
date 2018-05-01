How to install youtrack
====

links
=======
[1](http://maxmikheev.ru/blog/2016/05/05/how-to-selfhost-youtrack-in-digital-ocean/)

[2](https://www.jetbrains.com/help/youtrack/standalone/Install-YouTrack-ZIP-Installation.html)

[last stable version](https://www.jetbrains.com/youtrack/download/get_youtrack.html)

#### 1) install dependencies
```nginx
sudo apt install openjdk-9-jre 
```

#### 2) download youtrack and unzip 
```nginx
cd /var/www/
sudo unzip youtrack-2018.1.41051.zip
sudo chown -R www-data:www-data ./youtrack-2018.1.41051
```
create database
```mysql
        $ mysql -u root -p
              mysql> create database youtrack_db;
              mysql> GRANT ALL ON youtrack_db.* to 'youtrack_user'@'localhost' IDENTIFIED BY 'new_password_for_acceess_youtrack-user';
              mysql> flush priveleges;
              mysql> \q
 ```             

#### 3) start youtrack
```nginx
cd youtrack-2018.1.41051
sudo sh ./bin/youtrack.sh start --no-browser
```
and go to url
