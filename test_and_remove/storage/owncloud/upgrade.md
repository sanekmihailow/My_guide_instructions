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
occ app:disable files_videoplayer
occ app:disable ownbackup
2020-11-24T21:03:06+00:00 Repair warning: For manually updating, see https://doc.owncloud.org/server/10.5/go.php?to=admin-marketplace-apps
2020-11-24T21:03:06+00:00 OC\RepairException: Upgrade is not possible
2020-11-24T21:03:06+00:00 Update failed
```
> делаем, то что он просит (выше)
