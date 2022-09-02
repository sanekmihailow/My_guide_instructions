Shadowsocks
====

<d>
<details>
    <summary> links details </summary>

[arch](https://wiki.archlinux.org/title/Shadowsocks)

[habr](https://habr.com/ru/post/358126/)

[shadowsocks.org](https://shadowsocks.org/guide/stream.html)

[crypt compare](https://crypto.stackexchange.com/questions/18266/use-aes-256-or-aes-ctr-256-for-one-block#18271)

[Optimizing shadowsocks](https://github.com/shadowsocks/shadowsocks/wiki/Optimizing-Shadowsocks)

[4pda](https://4pda.to/forum/index.php?showtopic=744431&st=3040)

</details>
</d>

<d>
<details>
    <summary> link installation </summary>

[python](https://github.com/dgkang/shadowsocks-python)

<ul>
<li>

[libev ubuntu](https://supporthost.in/how-to-install-shadowsocks-on-ubuntu/)</li>
<li>

[libev ubuntu chinese](https://pioneerlfn.github.io/2019/12/02/shadowsocks/)</li>
<li>

[libev ubuntu and client sets](https://www.linuxbabe.com/ubuntu/shadowsocks-libev-proxy-server-ubuntu)</li>
<li>

[libev ubuntu 2](https://blog.wtigga.com/shadowsocks/)</li>
</ul>

<li>-----------</li>

<ul>
<li>

[libev src](https://losst.ru/nastrojka-shadowsocks)</li>
<li>

[libev src centos7 + client settings](https://serverdiary.com/linux/how-to-install-shadowsocks-server-on-centos-7/)</li>
<li>

[libev centos](https://www.hostens.com/knowledgebase/how-to-install-and-configure-shadowsocks-server/)</li>
</ul>

<li>-----------</li>

<ul>
<li>

[libev snap](https://upcloud.com/resources/tutorials/install-shadowsocks-libev-socks5-proxy)</li>
<li>

[libev snap 1](https://ip-calculator.ru/blog/ask/kak-ustanovit-proksi-server-shadowsocks-libev-socks5/)</li>
</ul>

[many method](https://www.oilandfish.com/posts/shadowsocks-libev.html)

[rust](https://4pda.to/forum/index.php?showtopic=744431&st=1580#entry96860833)

[vray plugin ubuntu](http://renbuar.blogspot.com/2020/04/ubuntu-2004-shadowsocks-over-websocket.html)

[install and settings client](https://www.linode.com/docs/guides/create-a-socks5-proxy-server-with-shadowsocks-on-ubuntu-and-centos7/?amp;_ga=2.220322520.1193236751.1582119770-1740799406.1579098235&lang=en)

</details>
</d>

<d>
<details>
    <summary> link to systemd unit </summary>

[gist](https://gist.github.com/zhiguangwang/a8e51a90b5b902529af9dd517849d568)

[github](https://github.com/shadowsocks/shadowsocks-rust/issues/103)

[chinese](https://yuyi.io/2015/12/29/shadowsocks-systemd/)

<ul>
<li>

[solutions superuser.com](https://superuser.com/questions/1436616/systemctl-cannot-start-service-code-exited-status-0-success)</li>
<li>

[solutions github](https://github.com/shadowsocks/shadowsocks-libev/issues/1949)</li>
<li>

[solutions stackexchange](https://unix.stackexchange.com/questions/679837/where-is-the-user-shadows-shadowsocks-defined)
</li>
</ul>

</details>
</d>


# Installations

> Method 1 - Python
```nginx
# --- Ubuntu ---
apt install python-pip
pip install shadowsocks
#or
apt install shadowsocks
# ---------------

# --- Centos ---
yum install python-setuptools
yum install python-pip
pip install shadowsocks
# or
easy_install pip
pip install shadowsocks
# ---------------
```

> Method 2 - libev pkg
```nginx
# --- Ubuntu ---
apt install shadowsocks-libev


```

> Method 2 - libev src
```nginx
# --- Ubuntu ---
# install requiries
apt update -y
apt install pkg-config gettext build-essential autoconf libtool \
    libpcre3-dev asciidoc xmlto libev-dev libudns-dev automake \
    libmbedtls-dev libsodium-dev git libc-ares-dev devscripts \
    equivs mk-build-deps libssl-dev apg zlib1g-dev
# add --no-install-recommends
# ---------------

# --- Centos 7 ---
# install requiries
yum update -y
yum install epel-release -y
yum group install "Development Tools" -y
## or 
# yum install gcc gettext autoconf libtool automake make
yum install m2crypto asciidoc c-ares-devel libev-devel pcre-devel xmlto udns-devel git
#---------------

# --- Centos 8 ---
# install requiries
yum install gcc gettext autoconf libtool automake make \
    pcre-devel asciidoc xmlto c-ares-devel libev-devel \
    libsodium-devel mbedtls-devel
#---------------

git clone https://github.com/shadowsocks/shadowsocks-libev.git
cd shadowsocks-libev/
git submodule update --init --recursive
## or 
# git submodule init && git submodule update
./autogen.sh
## if you want create dpkg file
# dpkg-buildpackage -b -us -uc
# dpkg -i ../shadowsocks-libev*.deb
./configure
make
make install
```

# Configure

> create **/etc/shadowsocks/config.json** or **/etc/shadowsocks-libev/config.json**

```json
{
    "server":"77.77.88.88",
    "server_port":8388,
    "local_address": "127.0.0.1",
    "local_port":1080,
    "password":"q8?o6ZvHjWy}w6cz~n*",
    "timeout":600,
    "method":"aes-256-cfb",
    "fast_open": true,
    "workers": 1
}
```

> create environment file for systemd if not exist **/etc/default/shadowsocks** or **/etc/default/shadowsocks-libev** (use environment variables on systemd unit)

```haskell
#/etc/default/shadowsocks
START=yes
CONFFILE="/etc/shadowsocks/config.json"
DAEMON_ARGS=
USER=nobody
GROUP=nogroup
# Number of maximum file descriptors
MAXFD=32768
```
----------
```haskell
#/etc/default/shadowsocks-libev
START=yes
CONFFILE="/etc/shadowsocks-libev/config.json"
RUNFILE="/run/shadowsocks"
DAEMON_ARGS="-u"
USER=nobody
GROUP=nogroup
# Number of maximum file descriptors
MAXFD=32768:
```

> create unit systemd file if not exist. To bind Shadowsocks to a privileged port (less than 1024), the server should be started as user root.
```js
# python ver
# /usr/lib/systemd/system/shadowsocks.service
# /etc/systemd/system/shadowsocks.service
[Unit]
Description=Shadowsocks Server
After=network.target

[Service]
PermissionsStartOnly=true
EnvironmentFile=/etc/default/shadowsocks
ExecStartPre=/bin/mkdir -p $RUNFILE
ExecStartPre=/bin/chown nobody:nobody $RUNFILE

ExecStart=/usr/bin/ssserver -c /etc/shadowsocks/config.json
Restart=on-abort
User=nobody
Group=nobody
UMask=0027

[Install]
WantedBy=multi-user.target
```
---------
```js
#libev ver
# /etc/systemd/system/multi-user.target.wants/shadowsocks-libev.service
[Unit]
Description=Shadowsocks-libev Default Server Service
Documentation=man:shadowsocks-libev(8)
After=network.target

[Service]
Type=simple
EnvironmentFile=/etc/default/shadowsocks-libev
User=nobody
Group=nogroup
LimitNOFILE=32768
ExecStart=/usr/bin/ss-server -c $CONFFILE $DAEMON_ARGS

[Install]
WantedBy=multi-user.target
```
--------
```js
# custom unit
[Unit]
Description=Shadowsocks proxy server

[Service]
User=root
Group=root
Type=simple
ExecStart=/usr/local/bin/ss-server -c /etc/shadowsocks/shadowsocks.json -a shadowsocks -v start
ExecStop=/usr/local/bin/ss-server -c /etc/shadowsocks/shadowsocks.json -a shadowsocks -v stop

[Install]
WantedBy=multi-user.target
```

```php
# /etc/sysctl.d/local.conf
fs.file-max = 65356
net.core.netdev_max_backlog = 4096
net.core.somaxconn = 4096
# resist SYN flood attacks
net.ipv4.tcp_syncookies = 1
net.ipv4.tcp_tw_reuse = 1
#net.ipv4.tcp_tw_recycle = 0
net.ipv4.tcp_max_syn_backlog = 4096
# turn on TCP Fast Open on both client and server side
net.ipv4.tcp_fastopen = 3
```

```nginx
systemctl restart shadowsocks-libev
systemctl enable shadowsocks-libev
sysctl -p /etc/sysctl.d/local.conf
ulimit -n 65356
```

### Additional
 
```bash
 adduser --system --no-create-home -s /bin/false shadowsocks
 
```
