## ===========================
# Links

## 1) IN Docker

### #Install

**OnlyOffice Community Server & Document Server & Mail Server**

[https://helpcenter.onlyoffice.com](https://helpcenter.onlyoffice.com/ru/server/docker/document/install-integrated.aspx)

[https://www.digitalocean.com](https://www.digitalocean.com/community/tutorials/how-to-organize-your-teamwork-with-onlyoffice-on-ubuntu-14-04)

[https://www.linuxbabe.com](https://www.linuxbabe.com/linux-server/install-onlyoffice-ubuntu-16-04)

[https://github.com/](https://github.com/ONLYOFFICE/Docker-DocumentServer/blob/master/README.md)

[https://hub.docker.com](https://hub.docker.com/r/onlyoffice/communityserver/)

**Document Server**

[https://helpcenter.onlyoffice.com](https://helpcenter.onlyoffice.com/ru/server/docker/document/docker-installation.aspx)

[https://github.com](https://github.com/ONLYOFFICE/Docker-DocumentServer)

**Community Server**

[https://github.com](https://github.com/ONLYOFFICE/Docker-CommunityServer)

###  #Useful Links

**behind proxy**

[https://helpcenter.onlyoffice.com](https://helpcenter.onlyoffice.com/ru/server/document/document-server-proxy.aspx)

[https://github.com](https://github.com/ONLYOFFICE/Docker-CommunityServer/issues/10)

[https://github.com](https://github.com/ONLYOFFICE/onlyoffice-owncloud/issues/108)

[https://dev.onlyoffice.org](https://dev.onlyoffice.org/ru/viewtopic.php?f=7&t=5075)

#### ---------------------------------

 
## 2) In Package

Comming Soon

#### ---------------------------------
## ===========================


# Description

`Onlyoffice community edition` состоит из 3 серверов:
<ul>1) DocumentServer</ul>
<ul>2) CommunityServer</ul>
<ul>3) Mailserver</ul>

**Document Server** - сервер для онлайн просмотра документов в microsoft форматах (.doc,xlxs и т.д.) 

**Community Server** - сервер для совместного и личного доступа, что то вроде хранилища, по сути он не нужен, если уже есть хранилище где-то еще, к которому можно подключить onlyoffice
 
 **Mail Server** -сервер для почтовой рассылки 
 
## ===========================


# INSTALL


## 1) Docker Installations

#### -Docker Install
```nginx
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
```


#### -OnlyOffice Install
```nginx
#обновляем текущую базу
sudo apt update
#создает сетевой мост
sudo docker network create --driver bridge onlyoffice-network
#загружает последнюю версию из докера
sudo docker pull onlyoffice/documentserver
sudo docker pull onlyoffice/communityserver
mkdir /var/Docker_Volumes/

#запускает докер контейнер c DocumentServer на порте :9971 вне контейнера. и :80 внутри контейнера
sudo docker run -itd -p 9971:80 -p 9944:443 --restart always --cap-add MKNOD \
-v /var/Docker_Volumes/onlyoffice/DocumentServer/logs:/var/log/onlyoffice \
-v /var/Docker_Volumes/onlyoffice/DocumentServer/data:/var/www/onlyoffice/Data \
-v /var/Docker_Volumes/onlyoffice/DocumentServer/lib:/var/lib/onlyoffice \
-v /var/Docker_Volumes/onlyoffice/DocumentServer/db:/var/lib/postgresql \
--net onlyoffice-network --name Onlyoffice_Document-server onlyoffice/documentserver

#запускает докер контейнер c CommunityServer на порте :9970 вне контейнера и :80 внутри контейнера
sudo docker run -itd -p 9970:80 -p 9943:443 --restart always --cap-add MKNOD \
-v /var/Docker_Volumes/onlyoffice/CommunityServer/logs:/var/log/onlyoffice \
-v /var/Docker_Volumes/onlyoffice/CommunityServer/data:/var/www/onlyoffice/Data \
-v /var/Docker_Volumes/onlyoffice/CommunityServer/db:/var/lib/mysql \
--net onlyoffice-network --name Onlyoffice_Community-server onlyoffice/communityserver

a2enmod proxy proxy_http
service apache2 restart
```


Примеры для `Document Server` reverse proxy configs: (Раскомментировать `#` если соединение будет по https)

**1) for nginx**

<d>
	<details>
		<summary>/etc/nginx/sites-enabled/onlyoffice-doc </summary> 

```nginx 		
upstream docservice {
  server 127.0.0.1:9971;
}
	
map $http_host $this_host {
    "" $host;
    default $http_host;
}

map $http_x_forwarded_proto $the_scheme {
     default $http_x_forwarded_proto;
     "" $scheme;
}

map $http_x_forwarded_host $the_host {
    default $http_x_forwarded_host;
    "" $this_host;
}

map $http_upgrade $proxy_connection {
  default upgrade;
  "" close;
}

proxy_set_header Upgrade $http_upgrade;
proxy_set_header Connection $proxy_connection;
proxy_set_header X-Forwarded-Host $the_host;
proxy_set_header X-Forwarded-Proto $the_scheme;
proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;


server {
    listen       80;
    server_name  onlyoffice-doc.example.com;
#   return 301 https://$host$request_uri;
#}

#server {
#        listen 443;
#	server_name onlyoffice-doc.example.com;

#    ssl_certificate /etc/letsencrypt/live/onlyoffice-doc.example.com/fullchain.pem; # managed by Certbot
#    ssl_certificate_key /etc/letsencrypt/live/onlyoffice-doc.example.com/privkey.pem; # managed by Certbot
#    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbo
#    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot

  location / {
    proxy_pass http://docservice;
    proxy_http_version 1.1;
  }
	
}
```

</details>
</d>

**2) for apache2**

<d>
<details>
		<summary> /etc/apache2/sites-enabled/onlyoffice-doc.conf </summary>

```apache
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        ServerName onlyoffice-doc.example.com
        DocumentRoot /var/www/onlyoffice

#       RewriteEngine on
#       RewriteCond %{HTTPS} !=on
#       RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L]

#</VirtualHost>

#<IfModule mod_ssl.c>
#<VirtualHost *:443>
        ServerAdmin webmaster@localhost
        ServerName onlyoffice-doc.example.com


#      SSLCertificateFile /etc/letsencrypt/live/onlyoffice-doc.example.com/fullchain.pem
#      SSLCertificateKeyFile /etc/letsencrypt/live/onlyoffice-doc.example.com/privkey.pem
#      Include /etc/letsencrypt/options-ssl-apache.conf

        ErrorLog /var/log/apache2/onlyoffice_error.log
        CustomLog /var/log/apache2/onlyoffice_access.log combined


        AllowEncodedSlashes On
#       SSLEngine On
#       SSLProxyEngine On
        ProxyPreserveHost On
        ProxyRequests Off
        SetEnvIf Host "^(.*)$" THE_HOST=$1
		
		#http если без SSL
        RequestHeader setifempty X-Forwarded-Proto https 
        RequestHeader setifempty X-Forwarded-Host %{THE_HOST}e
        ProxyAddHeaders Off

        ProxyPassMatch (.*)(\/websocket)$ "ws://127.0.0.1/$1$2"
        ProxyPass / http://127.0.0.1:9971/
        ProxyPassReverse / http://127.0.0.1:9971/

</VirtualHost>
#</IfModule>
```

</details>
</d>


### ---------------------------------


## 2) Package Installations


Comming Soon !


### ---------------------------------

## ===========================
