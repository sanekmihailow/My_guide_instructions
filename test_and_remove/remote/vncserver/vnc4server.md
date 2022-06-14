# VNC4server

```nginx
apt install vnc4server
adduser vncuser
passwd vncuser
```
> Теперь переключимся на этого пользователя (vncuser) для создания некоторых конфигурационных файлов для VNC

```nginx
su - vncuser
vncserver
```
> После запуска VNC-сервера, вам будет предложено создать VNC пароль. Устанавливаем любой удобный для вас пароль, но не более 9 символов ( если больше, то он обрежит его).

>Чтобы сделать настройку в сценарие запуска, мы должны убить сессию, что мы только что создали:

```nginx
vncserver -kill :1
vim ~/.vnc/xstartup
```
cat ~/.vnc/xstartup
```bash
#!/bin/sh
# Uncomment the following two lines for normal desktop:
unset SESSION_MANAGER
#exec /etc/X11/xinit/xinitrc
gnome-session --session=gnome-classic &

[ -x /etc/vnc/xstartup ] && exec /etc/vnc/xstartup
[ -r $HOME/.Xresources ] && xrdb $HOME/.Xresources
xsetroot -solid grey
vncconfig -iconic &
#x-terminal-emulator -geometry 1280x1024+10+10 -ls -title "$VNCDESKTOP Desktop" &
#x-window-manager &
```
> После чего запускаем нашу сессию с  разрешением экрана 1024×600:
```
vncserver -geometry 1024x600
```
> Установка Gnome X Window для Ubuntu (на стороне клиента, можно установить и другую среду):

cat ~/.vnc/xstartup
```
gnome-session &
or
startkde &
or
mate-session &
or
startlxde &
or
cinnamon &
or
openbox &
or
icewm
```
cat
```bash
#!/bin/sh
unset SESSION_MANAGER
unset DBUS_SESSION_BUS_ADDRESS
#startxfce4 &
gnome-session &
#startkde &
#mate-session &
#startlxde &
#cinnamon &
#openbox &

[ -x /etc/vnc/xstartup ] && exec /etc/vnc/xstartup
[ -r $HOME/.Xresources ] && xrdb $HOME/.Xresources
xsetroot -solid grey
vncconfig -iconic &
```

> После перезагрузки сервера, мы не будем иметь возможность подключиться к серверу с VNC, это потому, что команда «vncserver -geometry 1024×600» , что мы набрали выше не является постоянным. Чтобы решить эту проблему, я будем использовать отличный сценарий Джастин Buser.

```nginx
mkdir -p /etc/vncserver
touch /etc/vncserver/vncservers.conf
vim /etc/vncserver/vncservers.conf
```
cat /etc/vncserver/vncservers.conf
```bash
VNCSERVERS="1:vncuser"
VNCSERVERARGS[1]="-geometry 1024x600 -depth 24"
```
> Затем создайте пустой сценарий инициализации и сделайте его исполняемым

```nginx
touch /etc/init.d/vncserver
chmod +x /etc/init.d/vncserver
vim /etc/init.d/vncserver
```
cat /etc/init.d/vncserver

```bash
#!/bin/bash
unset VNCSERVERARGS
VNCSERVERS=""
[ -f /etc/vncserver/vncservers.conf ] && . /etc/vncserver/vncservers.conf
prog=$"VNC server"
start() {
 . /lib/lsb/init-functions
 REQ_USER=$2
 echo -n $"Starting $prog: "
 ulimit -S -c 0 >/dev/null 2>&1
 RETVAL=0
 for display in ${VNCSERVERS}
 do
 export USER="${display##*:}"
 if test -z "${REQ_USER}" -o "${REQ_USER}" == ${USER} ; then
 echo -n "${display} "
 unset BASH_ENV ENV
 DISP="${display%%:*}"
 export VNCUSERARGS="${VNCSERVERARGS[${DISP}]}"
 su ${USER} -c "cd ~${USER} && [ -f .vnc/passwd ] && vncserver :${DISP} ${VNCUSERARGS}"
 fi
 done
}
stop() {
 . /lib/lsb/init-functions
 REQ_USER=$2
 echo -n $"Shutting down VNCServer: "
 for display in ${VNCSERVERS}
 do
 export USER="${display##*:}"
 if test -z "${REQ_USER}" -o "${REQ_USER}" == ${USER} ; then
 echo -n "${display} "
 unset BASH_ENV ENV
 export USER="${display##*:}"
 su ${USER} -c "vncserver -kill :${display%%:*}" >/dev/null 2>&1
 fi
 done
 echo -e "\n"
 echo "VNCServer Stopped"
}
case "$1" in
start)
start $@
;;
stop)
stop $@
;;
restart|reload)
stop $@
sleep 3
start $@
;;
condrestart)
if [ -f /var/lock/subsys/vncserver ]; then
stop $@
sleep 3
start $@
fi
;;
status)
status Xvnc
;;
*)
echo $"Usage: $0 {start|stop|restart|condrestart|status}"
exit 1
esac
```
> Обновим все это

```nginx
update-rc.d vncserver defaults 99
service vncserver restart
iptables -A INPUT -m state --state NEW -m tcp -p tcp -m multiport --dports 5901:5903,6001:6003 -j ACCEPT
```
**Делаем возможность подключения для нескольких пользователей**

```nginx
aduser cap
su - cap
vncserver
```
> Перейдем в домашнюю директорию и отредактируем файл XStartup:

```nginx
cd ~
vim .vnc/xstartup
```
cat vim .vnc/xstartup
```bash
#!/bin/sh
# Uncomment the following two lines for normal desktop:
unset SESSION_MANAGER
#exec /etc/X11/xinit/xinitrc
gnome-session --session=gnome-classic &

[ -x /etc/vnc/xstartup ] && exec /etc/vnc/xstartup
[ -r $HOME/.Xresources ] && xrdb $HOME/.Xresources
xsetroot -solid grey
vncconfig -iconic &
#x-terminal-emulator -geometry 1280x1024+10+10 -ls -title "$VNCDESKTOP Desktop" &
#x-window-manager &
```
> Теперь откройте файл  /etc/vncserver/vncservers.conf как рут пользователь

```nginx
sudo vim /etc/vncserver/vncservers.conf
```
cat /etc/vncserver/vncservers.conf
```bash
SERVERS="1:vncuser 2:cap"
VNCSERVERARGS[1]="-geometry 1024x600 -depth 24"
VNCSERVERARGS[2]="-geometry 1024x600"
```

```nginx
service vncserver restart
```
> Предотвращение запуск Gnome при загрузке на сервере

```nginx
vim /etc/init/gdm.conf
```
cat /etc/init/gdm.conf

```bash
# Нужно в этом файле конфигурации закомментировать  6 строчек:
#start on ((filesystem
# and runlevel [!06]
# and started dbus
# and (drm-device-added card0 PRIMARY_DEVICE_FOR_DISPLAY=1
# or stopped udev-fallback-graphics))
# or runlevel PREVLEVEL=S)
```

**VNC шифрование через ssh туннель**
> По умолчанию, VNC не является безопасным протоколом, по этому  (так безопаснее) мы запустим сервер VNC только на 127.0.0.1 (локальный) и пробросим его через туннель SSH (для этого, есть варианты в Putty).

```nginx
vim /etc/vncserver/vncservers.conf
```
cat /etc/vncserver/vncservers.conf

```bash
SERVERS="1:captain 2:cap"
VNCSERVERARGS[1]="-geometry 1024x600 -depth 24 -localhost"
VNCSERVERARGS[2]="-geometry 1024x600 -depth 24 -localhost"
```
```nginx
service vncserver restart
```
Putty : Session->Connection->SSH -> Tunnels
```
Source port : 5901
Destanation : localhost:5901
```
* local
* auto
