### first install
```nginx
apt install openssh-server openssh-client
```
```nginx
apt install git vim vim-gtk cifs-utils samba nfs-common curl apt-rdepends software-properties-common lsb-release
#apt install nfs-kernel-server 
```
```nginx
apt install kopano-core kopano-webapp-common kopano-l10n z-push-backend-kopano kopano-archiver \
kopano-webapp-folderwidgets kopano-webapp-nginx kopano-webapp-quickitems kopano-webapp-titlecounter

```

### Install postfix
> libsasl2-modules sasl2-bin нужно для нормального IMAP
```nginx
apt install postfix libsasl2-modules sasl2-bin postfix-mysql
sudo mysql_secure_installation
```

### Install webserver
```nginx
apt install nginx-light certbot
update-alternatives --set php /usr/bin/php7.2
```

### Install rspamd
```nginx
wget -O- https://rspamd.com/apt-stable/gpg.key |sudo apt-key add -
echo "deb http://rspamd.com/apt-stable/ $(lsb_release -cs) main" |sudo tee -a /etc/apt/sources.list.d/rspamd.list
apt update
apt install rspamd redis-server
```

