
```miktrotik
sdasd
```

## FIREWALL SETUP

```bash
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

```bash
# 1.1 save resourse
add action=accept chain=forward  connection-state=established,related comment="Forward connections"
add action=drop chain=forward connection-state=invalid
add action=accept chain=input connection-state=established,related
add action=drop chain=input connection-state=invalid
add action=drop chain=forward connection-nat-state=!dstnat connection-state=new in-interface-list=Internet

# 1.2 limit
add action=add-src-to-address-list address-list=ddos-blacklist address-list-timeout=1d chain=input connection-limit=100,32 in-interface-list=Internet protocol=tcp comment="DDoS Protect - Connection Limit"
add action=tarpit chain=input connection-limit=3,32 protocol=tcp src-address-list=ddos-blackli

# 1.3 secure SYN Flood
add action=jump chain=forward connection-state=new jump-target=SYN-Protect protocol=tcp tcp-flags=syn comment="DDoS Protect - SYN Flood"
add action=jump chain=input connection-state=new in-interface-list=Internet jump-target=SYN-Protect protocol=tcp tcp-flags=syn
add action=return chain=SYN-Protect connection-state=new limit=200,5:packet protocol=tcp tcp-flags=syn
add action=drop chain=SYN-Protect connection-state=new protocol=tcp tcp-flags=syn

# 1.4 seccure port scanner
add action=drop chain=input src-address-list="Port Scanners" comment="Protected - Ports Scanners"
add action=add-src-to-address-list address-list="Port Scanners" address-list-timeout=none-dynamic chain=input in-interface-list=Internet protocol=tcp psd=21,3s,3,1

# 1.5 security bruteforce winbox
add action=drop chain=input src-address-list="Black List Winbox" comment="Protected - WinBox Access"
add action=add-src-to-address-list address-list="Black List Winbox" address-list-timeout=none-dynamic chain=input connection-state=new dst-port=8291 in-interface-list=Internet log=yes log-prefix="BLACK WINBOX" protocol=tcp src-address-list="Winbox Stage 3"
add action=add-src-to-address-list address-list="Winbox Stage 3" address-list-timeout=1m chain=input connection-state=new dst-port=8291 in-interface-list=Internet protocol=tcp src-address-list="Winbox Stage 2"
add action=add-src-to-address-list address-list="Winbox Stage 2" address-list-timeout=1m chain=input connection-state=new dst-port=8291 in-interface-list=Internet protocol=tcp src-address-list="Winbox Stage 1"
add action=add-src-to-address-list address-list="Winbox Stage 1" address-list-timeout=1m chain=input connection-state=new dst-port=8291 in-interface-list=Internet protocol=tcp
add action=accept chain=input dst-port=8291 in-interface-list=Internet protocol=tcp

# 1.6 secure openvpn brute
add action=drop chain=input  src-address-list="Black List OpenVPN" comment="Protected - OpenVPN Connections"
add action=add-src-to-address-list address-list="Black List OpenVPN" address-list-timeout=none-dynamic chain=input connection-state=new dst-port=1194 in-interface-list=Internet log=yes log-prefix="BLACK OVPN" protocol=tcp src-address-list="OpenVPN Stage 3"
add action=add-src-to-address-list address-list="OpenVPN Stage 3" address-list-timeout=1m chain=input connection-state=new dst-port=1194 in-interface-list=Internet protocol=tcp src-address-list="OpenVPN Stage 2"
add action=add-src-to-address-list address-list="OpenVPN Stage 2" address-list-timeout=1m chain=input connection-state=new dst-port=1194 in-interface-list=Internet protocol=tcp src-address-list="OpenVPN Stage 1"
add action=add-src-to-address-list address-list="OpenVPN Stage 1" address-list-timeout=1m chain=input connection-state=new dst-port=1194 in-interface-list=Internet protocol=tcp
add action=accept chain=input dst-port=1194 in-interface-list=Internet protocol=tcp

# 1.7 Allow access VPN
add action=accept chain=input " in-interface-list=VPN

# 1.8 Allow normal ping
add action=accept chain=input in-interface-list=Internet limit=50/5s,2:packet protocol=icmp

# 1.9 Drop all other
add action=drop chain=input in-interface-list=Internet

/ip firewall raw
# Block netbios protocol
add action=drop chain=prerouting dst-port=137,138,139 in-interface-list=Internet protocol=udp

``` 
# ОБЩЕЕ4
```bash
add action=accept chain=input connection-state=established,related
add action=drop chain=input connection-state=invalid
