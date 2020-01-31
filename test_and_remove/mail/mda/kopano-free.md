### first install
```nginx
apt install git vim vim-gtk cifs-utils samba nfs-common curl apt-rdepends software-properties-common lsb-release
```

### Xorg + DE
```nginx
apt install icewm icewm-themes icewm-gnome-support firefox xorg
```

### Install webserver
```nginx
apt install nginx-light nginx-common nginx-doc python-certbot-nginx
```
### Install postfix + mysql
> libsasl2-modules sasl2-bin нужно для нормального IMAP
```nginx
apt install postfix libsasl2-modules sasl2-bin mysql-server mysql-server mysql-common mysql-utilities postfix-mysql
sudo mysql_secure_installation
```
### Install php
```nginx
apt install php7.2-fpm php-gettext php7.2-common php7.2-curl php7.2-cgi php7.2-cli php7.2-gd php7.2-imap php7.2-json \
php7.2-mbstring php7.2-mysql php7.2-opcache php7.2-readline php7.2-xml php7.2-zip \
php php-common php-gettext php-mapi php-pear php-php-gettext php-tcpdf

update-alternatives --set php /usr/bin/php7.2
phpenmod mapi
```
### Install phpmyadmin
```nginx
apt install phpmyadmin
```
### Install rspamd
```nginx
wget -O- https://rspamd.com/apt-stable/gpg.key |sudo apt-key add -
echo "deb http://rspamd.com/apt-stable/ $(lsb_release -cs) main" |sudo tee -a /etc/apt/sources.list.d/rspamd.list
apt update
apt install rspamd redis-server
```
### Install kopano
```nginx
apt install kopano-core kopano-common kopano-server kopano-spooler kopano-search kopano-presence kopano-monitor \
kopano-gateway kopano-dagent kopano-utils \
kopano-webapp-nginx kopano-webapp-common kopano-webapp-folderwidgets kopano-webapp-pimfolder kopano-webapp-quickitems \
kopano-contacts kopano-backup kopano-archiver kopano-libs kopano-dev
```
### Install z-push (if problem with php7-mapi
> потом не сможешь обновляться
```nginx
#apt install --ignore-depends z-push-backend-kopano
#apt-get install --nodeps z-push-backend-kopano
#apt-get install --no-install-recommends z-push-backend-kopano
#C- Download
apt-get download z-push-backend-kopano
apt-get download z-push-kopano
apt-get download z-push-common
apt-get download z-push-ipc-sharedmemory
apt download z-push-backend-imap
#C- Install
#dpkg --ignore-depends -i z-push-kopano_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-backend-kopano_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-kopano_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-common_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-ipc-sharedmemory_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-backend-imap_2.5.1+0-0_all.deb
dpkg --force-all -i z-push-config-nginx_2.5.1+0-0_all.deb
#C- Hold
apt-mark hold z-push*
vim /etc/apt/preferences.d/z-push.pref

```
