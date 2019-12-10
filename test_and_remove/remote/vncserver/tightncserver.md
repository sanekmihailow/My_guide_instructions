#  TightVNCServer

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
