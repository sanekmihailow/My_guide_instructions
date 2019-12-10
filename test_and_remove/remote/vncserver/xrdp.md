# xRDP

```nginx
apt install xfce4 xrdp
```
cat ~/.xsession

```bash
xfce4-session
```

**Сменить порт xRDP**

cat /etc/xrdp/xrdp.ini
```bash
...
port=3390
...
```
```nginx
systemctl restart xrdp
```
Из под Windows
Запускаем «Подключение к удаленному рабочему столу» — вводим IP-адрес нашего сервера:порт
