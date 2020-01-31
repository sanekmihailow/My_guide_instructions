# без ipsec

> //etc/xl2tpd/xl2tpd.conf

```
[global]
access control = yes
auth file=/etc/ppp/chap-secrets

[lns default]
ppp debug = yes
pppoptfile = /etc/ppp/options.l2tpd
require chap = yes
require pap = no
assign ip = yes
require authentication = no
exclusive = no
hostname =  185.117.155.65
ip range = 192.168.8.10-192.168.8.20
local ip = 192.168.8.1
;#challenge = no
lac = 0.0.0.0 - 255.255.255.255
```

> /etc/ppp/options.l2tpd

```
ipcp-accept-local
ipcp-accept-remote
mtu 1410
mru 1410
ms-dns 8.8.8.8
require-mschap-v2
asyncmap 0
auth
crtscts
lock
hide-password
modem
debug
name xl2tpd # username for chap authentication (любое имя глвное чтоб совпало в chap)
proxyarp
lcp-echo-interval 10
lcp-echo-failure 100
connect-delay 5000
```

>
