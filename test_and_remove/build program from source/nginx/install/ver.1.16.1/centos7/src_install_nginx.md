```nginx
systemctl disable firewalld && systemctl stop firewalld
yum update -y
yum install -y vim vim-X11 vimx @x11 bash-completion bash-completion-extras yum-utils wget mc net-tools xcli screen git nano awk htop
yum groupinstall "Development tools"
yum install autoconf automake openssl-devel pcre-devel libxslt-devel libxslt-devel
git clone https://github.com/rspeed/xstow.git && cd xstow
autoreconf -i
autoconf
./configure
make
make install
mkdir nginx && cd nginx
wget https://nginx.org/download/nginx-1.16.1.tar.gz
git clone https://github.com/openresty/echo-nginx-module.git
git clone https://github.com/openresty/headers-more-nginx-module.git
git clone https://github.com/wandenberg/nginx-push-stream-module.git
git clone https://github.com/evanmiller/mod_zip.git
ffppath="/usr/local/MY_LOCAL/InstalleD/nginx-1.16.1"
mkdir /usr/LOCAL/nginx
cd /usr/local/MY_LOCAL/InstalleD
xstow nginx-1.16.1/ -t ../LOCAL/nginx/
mkdir -p /usr/LOCAL/nginx/etc/nginx/{sites-enabled,sites-available,conf,maps,default}
ln -s /usr/LOCAL/nginx/etc/* /etc/
ln -s /usr/LOCAL/nginx/sbin/* /sbin/
ln -s /usr/LOCAL/nginx/var/lib/nginx /var/lib/
ln -s /usr/LOCAL/nginx/var/lib/* /var/lib/
ln -s /usr/LOCAL/nginx/var/run /run/
vim /etc/systemd/system/nginx_local.service
systemctl start nginx_local.service
systemctl enable nginx_local.service
```

