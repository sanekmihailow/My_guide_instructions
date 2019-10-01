
```miktrotik
sdasd
```

## FIREWALL SETUP

```c#
/ ip firewall filter
add chain=input connection-state=established comment="Accept established connections"
# Accept related connections
add chain=input connection-state=related
# Drop iтvalid connections
add chain=input connection-state=invalid action=drop

add chain=input protocol=udp action=accept disabled=no
# Allow limit pings
add chain=input protocol=icmp limit=50/5s,2
# drop excess pings
add chain=input protocol=icmp action=drop

add chain=input protocol=tcp dst-port=22
# winbox

add chain=input protocol=tcp dst-port=8291
# ISP
add chain=input src-address=159.148.172.192/28 comment="from mikrotik network"
add chain=input src-address=10.0.0.0/8 comment "from our private LAN"
# LOG DROP
add chain=input action=log log-prefix="DROP INPUT"
add chain=input action=drop comment="DROP everything else"
```
