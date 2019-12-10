#  TightVNCServer
## 1
```nginx
iptables -A INPUT -p tcp --dport 5901 -j ACCEPT
apt install xfce4 xfce4-goodies tightvncserver
```
> Задаем пароль для доступа по удаленному рабочему столу. Для этого вводим команду

```nginx
vncserver
```
> ... на запрос пароля вводим его дважды. После будет предложено ввод пароля для гостевого доступа — можно согласиться (y) и ввести пароль или отказаться (n).

> Для начала, останавливаем экземпляр VNC сервера:

```nginx
vncserver -kill :1
```
cat ~/.vnc/xstartup
```bash
#!/bin/bash
xrdb $HOME/.Xresources
startxfce4
```
> Если используем Gnome

```bash
#!/bin/sh
# Uncomment the following two lines for normal desktop:
# unset SESSION_MANAGER
# exec /etc/X11/xinit/xinitrc

[ -x /etc/vnc/xstartup ] && exec /etc/vnc/xstartup
[ -r $HOME/.Xresources ] && xrdb $HOME/.Xresources
xsetroot -solid grey
vncconfig -iconic &
x-terminal-emulator -geometry 80x24+10+10 -ls -title "$VNCDESKTOP Desktop" &
x-window-manager &

gnome-panel &
gnome-settings-daemon &
metacity &
```
```nginx
vncserver
```
> Запускаем клиент VNC. Вводим IP-адрес компьютера с VNC и номер порта: 
> Чтобы VNC сервер запускался после перезагрузки, создаем новый юнит в systemd

cat /etc/systemd/system/vncserver.service
```bash
[Unit]
Description=VNC server
After=syslog.target network.target

[Service]
Type=forking
User=root
PAMName=login
PIDFile=/root/.vnc/%H:%i.pid
ExecStartPre=-/usr/bin/vncserver -kill :1 > /dev/null 2>&1
ExecStart=/usr/bin/vncserver
ExecStop=/usr/bin/vncserver -kill :1

[Install]
WantedBy=multi-user.target
```
```nginx
systemctl daemon-reload
systemctl enable vncserver
```
> Для смены пароля на подключения к VNC, вводим команду:

```nginx
vncpasswd
or
vncpasswd /path/to/file
```

## 2

```nginx
apt install xfce4 xfce4-goodies tightvncserver
adduser vnc
gpasswd -a vnc sudo
su - vnc
vncserver
```
> по умолчанию порт vnc сервера будет 5901, порт каждого следующего дисплея будет увеличиваться на 1 (5902,5903,...).
 > Убить конкретный дисплей можно так

```nginx
 vncserver -kill :1
```
**Создание скрипта автостарта vnc сервера**
> Сначала убьем запущенный дисплей :1 (если он запущен).
> создаем скрипт запуска

```nginx
chmod +x /usr/local/bin/myvnc
```
cat /usr/local/bin/myvnc
```bash
#!/bin/bash
PATH="$PATH:/usr/bin/"
DISPLAY="1"
DEPTH="16"
GEOMETRY="1024x768"
OPTIONS="-depth ${DEPTH} -geometry ${GEOMETRY} :${DISPLAY}"

case "$1" in
start)
/usr/bin/vncserver ${OPTIONS}
;;

stop)
/usr/bin/vncserver -kill :${DISPLAY}
;;

restart)
$0 stop
$0 start
;;
esac
exit 0
```
> systemd сервис myvnc.service

```bash
[Unit]
Description=MyVnc

[Service]
Type=forking
ExecStart=/usr/local/bin/myvnc start
ExecStop=/usr/local/bin/myvnc stop
ExecReload=/usr/local/bin/myvnc restart
User=vnc

[Install]
WantedBy=multi-user.target
```
or
```bash
[Unit]
Description=Remote desktop service (VNC)
After=syslog.target network.target

[Service]
Type=forking
User=sharer

Environment=HOME=/home/sharer
ExecStartPre=-/usr/bin/vncserver -kill :1
ExecStart=/usr/bin/vncserver -geometry 1280x720 -dpi 96 -localhost -nolisten tcp
ExecStop=/usr/bin/vncserver -kill :1

[Install]
WantedBy=multi-user.target
```
```nginx
systemctl daemon-reload
systemctl enable myvnc.service
systemctl start myvnc.service
````

**Шифрование трафика**
> Голый VNC не шифрует трафик, и оставлять его в таком виде не стоит.
> Изменяем строку /usr/local/bin/myvnc на

```bash
...
OPTIONS="-depth ${DEPTH} -geometry ${GEOMETRY} :${DISPLAY} -localhost"
```
> Теперь для подключения к серверу сначала нужно создать тунель
> *nix

```nginx
ssh vnc@xxx.xxx.xxx.xxx -L 5901:localhost:5901
vncviewer localhost:5901
````

