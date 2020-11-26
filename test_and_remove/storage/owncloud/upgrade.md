https://download.owncloud.org/community/owncloud-10.5.0.tar.bz2

https://itdraft.ru/2020/07/16/obnovlenie-owncloud-vruchnuyu/
https://doc.owncloud.com/server/admin_manual/release_notes.html#changes-in-10-5-0
https://doc.owncloud.com/server/admin_manual/maintenance/upgrade.html

```bash
mc
tar -cf 7.4.tar 7.4
a2dismod php7.4 && a2enmod php7.2
sudo update-alternatives --set php /usr/bin/php7.2
systemctl restart apache2
sudo -u www-data php /var/www/owncloud/occ -V #проверим версию или в Docroot/config/config.php

mysqldump -u root -p owncloud > owncloud_10.1.0.4_backup.sql
sudo -u www-data php /var/www/owncloud/occ maintenance:mode --on
systemctl stop apache2
wget https://download.owncloud.org/community/owncloud-10.5.0.tar.bz2 -P /tmp/

mv /var/www/owncloud/ /var/www/owncloud_bak
tar xjf /tmp/owncloud-10.5.0.tar.bz2 -C /var/www
# rsync -avpP /var/www/owncloud_bak/data/ /var/www/owncloud/
sudo -u www-data mkdir /var/www/owncloud/data
mv /var/www/owncloud_bak/data/ /var/www/owncloud/data/ -v
rsync -avp /var/www/owncloud_bak/config/ /var/www/owncloud/config/

sudo -u www-data php /var/www/owncloud/occ upgrade
sudo -u www-data php /var/www/owncloud/occ app:disable files_videoplayer
sudo -u www-data php /var/www/owncloud/occ app:disable ownbackup
sudo -u www-data php /var/www/owncloud/occ upgrade
sudo -u www-data php /var/www/owncloud/occ -V
sudo -u www-data php /var/www/owncloud/occ maintenance:mode --off

a2dismod php7.2 && a2enmod php7.4
sudo update-alternatives --set php /usr/bin/php7.4
cp /var/www/owncloud_bak/.htaccess /var/www/owncloud/
chown -R www-data. /var/www/owncloud
```

### ошибка во время upgrade
```bash
2020-11-24T21:03:06+00:00 Repair warning: You have incompatible or missing apps enabled that could not be found or updated via the marketplace.
2020-11-24T21:03:06+00:00 Repair warning: Please install or update the following apps manually or disable them with:
```
```nginx
occ app:disable files_videoplayer
occ app:disable ownbackup
```
```
2020-11-24T21:03:06+00:00 Repair warning: For manually updating, see https://doc.owncloud.org/server/10.5/go.php?to=admin-marketplace-apps
2020-11-24T21:03:06+00:00 OC\RepairException: Upgrade is not possible
2020-11-24T21:03:06+00:00 Update failed
```
> делаем, то что он просит (выше)

> Исправляем ошибки после обновления
![](https://raw.githubusercontent.com/sanekmihailow/My_guide_instructions/master-origin/images/owncloud_10.5.0._warn_after_upgrade.jpg)
```nginx
apt install php-apcu redis php-redis
systemctl enable redis-server
systemctl restart apache2
```
> Docroot/config/config.php
```php
<?php
$CONFIG = array (
  'updatechecker' => false,
  'instanceid' => 'fdsfdsfsfsfs',
  'passwordsalt' => 'sfsdffsfsgdfgdgfgdgf',
  'secret' => 'dssfgfsdgggsgfdsgfgfsdgds',
  'trusted_domains' => 
  array (
    0 => 'example.com',
  ),
  'datadirectory' => '/var/www/owncloud/data',
  'overwrite.cli.url' => 'http://example.com',
  'dbtype' => 'mysql',
  'version' => '10.5.0.10',
  'dbname' => 'owncloud',
  'dbhost' => 'localhost',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'owncloud',
  'dbpassword' => '123456',
  'logtimezone' => 'UTC',
  'installed' => true,
  'mail_domain' => 'user.ru',
  'mail_from_address' => 'admin',
  'mail_smtpmode' => 'smtp',
  'mail_smtpsecure' => 'ssl',
  'mail_smtpauth' => 1,
  'mail_smtphost' => 'smtp.gmail.com',
  'mail_smtpport' => '465',
  'mail_smtpname' => 'admin@user.ru',
  'mail_smtppassword' => '123456',
  'mail_smtpauthtype' => 'PLAIN',
  'theme' => '',
  'loglevel' => 2,
  'maintenance' => false,
  'memcache.local' => '\OC\Memcache\APCu',
  'filelocking.enabled' => true,
  'memcache.locking' => '\OC\Memcache\Redis',
  'redis' => array(
	'host' => 'localhost',
	'port' => 6379,
	'timeout' => 0.0,
	'password' => '', // Optional, if not defined no password will be used.
  ),
  'onlyoffice' => array ( 'verify_peer_off' => true )
);
