
> /etc/pptpd.conf

```
option /etc/ppp/options.pptpd
logwtmp
#bcrelay eth1:1
localip 192.168.13.1
remoteip 192.168.13.30-50
```

> //etc/ppp/options.pptpd

```
name pptpd # любое имя , главное чтобы совпало в secrets

#refuse
refuse-pap
refuse-chap
refuse-mschap
#require
require-mschap-v2
#require-mppe-128
require-mppe
#require-mschap
#require chap
#require pap

#dns-server
ms-dns 77.88.8.1
ms-dns 8.8.8.8

proxyarp
nodefaultroute

#nologfd
debug
dump

novj
novjccomp
nobsdcomp

lock

asyncmap 0
auth
crtscts
hide-password
#local
modem

lcp-echo-interval 10
lcp-echo-failure 100
noipx
```

> /etc/ppp/chap-secrets

```
# Secrets for authentication using CHAP
# client	server	secret			IP addresses

newuser21 pptpd maoop67VrT 192.168.13.41
newuser22 pptpd maoop67VrT 192.168.13.42
newuser23 pptpd maoop67VrT 192.168.13.43
#user-02 pptpd passw88 192.168.10.42
#user-03 pptpd passw59 192.168.10.43
#user-04 pptpd passw27 192.168.10.44
newuser31 * maoop67VrT *
newuser32 * maoop67VrT
newuser33 * maoop67VrT
```
