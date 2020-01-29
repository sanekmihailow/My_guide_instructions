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
### Install php
```nginx
apt install php7.2-fpm php-gettext php7.2-common php7.2-curl php7.2-cgi php7.2-cli php7.2-gd php7.2-imap php7.2-json \
php7.2-mbstring php7.2-mysql php7.2-opcache php7.2-readline php7.2-xml php7.2-zip php php-common php-gettext php-mapi \
php-pear php-php-gettext php-tcpdf phpmyadmin

update-alternatives --set php /usr/bin/php7.2
```
### Install postfix + mysql
> libsasl2-modules sasl2-bin нужно для нормального IMAP
```nginx
apt install postfix libsasl2-modules sasl2-bin mysql-server mysql-server mysql-common mysql-utilities postfix-mysql
```
### Install rspamd
```nginx
wget -O- https://rspamd.com/apt-stable/gpg.key | apt-key add -
echo "deb http://rspamd.com/apt-stable/ $(lsb_release -cs) main" | sudo tee -a /etc/apt/sources.list.d/rspamd.list
apt update
apt install rspamd redis-server
```
### Install kopano
```nginx
apt install kopano-core kopano-common kopano-server kopano-spooler kopano-search kopano-presence kopano-monitor \
kopano-gateway kopano-dagent kopano-utils kopano-webapp-nginx kopano-webapp-common kopano-webapp-folderwidgets \
kopano-webapp-pimfolder kopano-webapp-quickitems kopano-contacts kopano-backup kopano-archiver kopano-libs
```

