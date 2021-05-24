<d>
  <details>
    <summary> broken isolation </summary>
    
```python
    # may/24/2021 19:54:25 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add admin-mac=B8:69:F4:2A:97:6C auto-mac=no comment=defconf name=bridge
add name=bridge3 pvid=3 vlan-filtering=yes
add ether-type=0x88a8 name=bridge4 pvid=4 vlan-filtering=yes
/interface vlan
add interface=bridge3 name=vlan3 vlan-id=3
add interface=bridge4 name=vlan4 vlan-id=4
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip pool
add name=default-dhcp ranges=192.168.86.10-192.168.86.254
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.100.2-192.168.100.254
add name=dchp1 ranges=192.168.80.100-192.168.100.254
add name=dhcp2 ranges=192.168.81.100-192.168.81.254
/ip dhcp-server
add address-pool=default-dhcp disabled=no interface=bridge name=defconf
add address-pool=dchp1 disabled=no interface=bridge3 name=server1
add address-pool=dhcp2 disabled=no interface=bridge4 name=server2
/ppp profile
add local-address=10.10.10.1 name=profile-OpenVPN-server remote-address=dhcp_pool-OpenVPN
add bridge=bridge3 local-address=192.168.100.1 name=OVPN_server remote-address=OVPN_srv_pool
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=bridge3 comment=defconf interface=ether3 pvid=3
add bridge=bridge4 comment=defconf interface=ether4 pvid=4
add bridge=bridge comment=defconf interface=ether5
add bridge=bridge comment=defconf interface=ether6
add bridge=bridge comment=defconf interface=ether7
add bridge=bridge comment=defconf interface=ether8
add bridge=bridge comment=defconf interface=ether9
add bridge=bridge comment=defconf interface=ether10
add bridge=bridge comment=defconf interface=sfp1
add bridge=bridge3 disabled=yes interface=vlan3 pvid=3
add bridge=bridge4 disabled=yes interface=vlan4 pvid=4
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface bridge vlan
add bridge=bridge3 tagged=bridge3 untagged=ether3 vlan-ids=3
add bridge=bridge4 tagged=bridge4 untagged=ether4 vlan-ids=4
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=OVPN_server enabled=yes keepalive-timeout=disabled mode=ethernet
/ip address
add address=192.168.81.1/24 comment=defconf interface=bridge4 network=192.168.81.0
add address=192.168.85.1/24 disabled=yes interface=ether4 network=192.168.85.0
add address=192.168.80.1/24 interface=bridge3 network=192.168.80.0
add address=192.168.86.1/24 interface=bridge network=192.168.86.0
add address=192.168.85.1/24 interface=ether5 network=192.168.85.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server lease
add address=192.168.86.152 client-id=1:f0:de:f1:e4:a:45 comment=mypk disabled=yes mac-address=F0:DE:F1:E4:0A:45 server=defconf
add address=192.168.86.123 client-id=1:54:a0:50:39:17:e1 comment=pk1 disabled=yes mac-address=54:A0:50:39:17:E1 server=defconf
/ip dhcp-server network
add address=192.168.80.0/24 dns-server=192.168.80.1 gateway=192.168.80.1
add address=192.168.81.0/24 dns-server=192.168.81.1 gateway=192.168.81.1
add address=192.168.86.0/24 comment=defconf gateway=192.168.86.1
/ip dns
set allow-remote-requests=yes servers=8.8.8.8
/ip dns static
add address=192.168.88.1 comment=defconf name=router.lan
/ip firewall filter
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=accept chain=input comment=OVPN dst-port=1194 log=yes log-prefix=OVPN_pref protocol=tcp
add action=accept chain=output protocol=tcp src-port=1194
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid disabled=yes
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=drop chain=input comment="defconf: drop all not coming from LAN" disabled=yes in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid disabled=yes
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new disabled=yes in-interface-list=WAN
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
/ip firewall service-port
set sip disabled=yes
/ppp secret
add name=oukitelk10000pro password=qwerty12345 profile=profile-OpenVPN-server service=ovpn
add name=test-user-1 password=1qaz2wsx3edc profile=OVPN_server service=ovpn
/system clock
set time-zone-name=Europe/Moscow
/system logging
add topics=ovpn,debug
add topics=ovpn,debug
/tool mac-server
set allowed-interface-list=LAN
/tool mac-server mac-winbox
set allowed-interface-list=LAN
```

  </details>
</d>  
    
