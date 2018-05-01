How to move (migrate) on another (other) server
=======

links
====
[1](https://www.jetbrains.com/help/youtrack/standalone/Upgrade-YouTrack-ZIP.html)

[2](https://www.jetbrains.com/help/youtrack/standalone/Restore-ZIP-Installation.html)

#### 1) create backup
> go to web url
> Global settings --> database backup --> create zip backup
```nginx
sudo cp  /var/www/youtrack-2018.1.41051/backups/2018-04-26-16-13-35.zip ~/
 ```
#### 2) update youtrack to to avoid versions problems
> dowload last stable version
```nginx
sudo unzip yotrack-version
sudo chown -R www-data:www-data ./youtrack-version
sudo sh ./youtrack-version/bin/youtrack.sh start --no-browser
sudo cp ~/backups/2018-04-26-16-13-35.zip /var/www/youtrack-version/backups
```
go web url and press ```UPDATE ```

#### 3) create backup current version
> go to web url
> Global settings --> database backup --> create zip backup

copy to other server
```nginx
sudo scp -P $port /var/www/youtrack-version/backups/2018-04-26-16-15-39.zip remote-user@remote-ip:~/
```

#### 4) actions on another server
 
 > 1. dowload version (version server = version another server)
 > 2. unzip
 > 3. start --no-browser options
 > 4. copy your backup to youtrack-version/bakcups folder
 > 5. in web url select ```Update```



