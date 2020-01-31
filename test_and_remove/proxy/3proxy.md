<d>
  <details>
     <summary> 3proxy </summary>
     
```nginx
apt install -y build-essential nano wget tar gzip
cd /usr/local/src
wget --no-check-certificate https://github.com/z3APA3A/3proxy/archive/0.8.12.tar.gz
tar -xzf 0.8.12.tar.gz
cd 3proxy-0.8.12
make -f Makefile.Linux
mkdir /usr/local/etc/3proxy /var/log/3proxy
cp /usr/local/src/3proxy-0.8.12/src/3proxy /usr/loca/bin/
sudo adduser --system --no-create-home --disabled-login --group 3proxy
id 3proxy
        |-> uid=117(3proxy) gid=125(3proxy) groups=125(3proxy
        
vim /usr/local//etc/3proxy/3proxy.cfg
```
* /usr/local/etc/3proxy/3proxy.cfg

<details>

```bash
        #C Запускаем сервер от пользователя proxy3
setgid 125
setuid 117
        #C see in /etc/resolv.conf
nserver 8.8.8.8
nserver 77.88.8.8

nscache 65536
timeouts 1 5 30 60 180 1800 15 60
external 22.22.22.22
        #C закомментировать если используется vps/vds
internal 192.168.0.67
        #C Указываем на расположение файла с пользователями и паролями
users $/usr/local/etc/3proxy/.proxyauth

daemon
        #C путь к логам и формат лога, к имени лога будет добавляться дата создания
log /var/log/3proxy/3proxy.log D
logformat "- +_L%t.%. %N.%p %E %U %C:%c %R:%r %O %I %h %T"
        #C Включаем авторизацию по логинам и паролям
auth cache strong
        #С порты для подклчения
proxy -n -p55295 -a
socks -p 55290
```

</details>

```nginx
vim /usr/local/etc/3proxy/.proxyauth
```
* /usr/local/etc/3proxy/.proxyauth

<details>

```bash
        ##C addusers in this format:
#F <user>:CL:<password>
        #C new user start from new string
        ##C see for documentation: http://www.3proxy.ru/howtoe.asp#USERS
#Pr 
vasya:CL:pupkin
```

</details>

```nginx
chown 3proxy:3proxy -R /usr/local/etc/3proxy /var/log/3proxy /usr/local/bin/3proxy
chmod 444 /usr/local/etc/3proxy/3proxy.cfg
chmod 400 /usr/local/etc/3proxy/.proxyauth
vim /etc/systemd/system/3proxy.service
# or vim /usr/lib/systemd/system/3proxy.service
```
* /etc/systemd/system/3proxy.service

<details>

```bash
[Unit]
Description=3proxy proxy server
After=network.target

[Service]
Type=forking
ExecStart=/usr/local/bin/3proxy /usr/local/etc/3proxy/3proxy.cfg
ExecStop=/usr/bin/pkill 3proxy
#ExecStop=/usr/bin/killall 3proxy
RemainAfterExit=yes

[Install]
WantedBy=multi-user.target
```

</details>

```nginx
systemctl daemon-reload
systemctl start 3proxy
systemctl enable 3proxy
iptables -I INPUT -p tcp -m multiport --dports 55290,55295 -j ACCEPT
```

</details>
</d>
