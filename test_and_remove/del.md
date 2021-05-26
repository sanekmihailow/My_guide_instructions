# ---------------------------- rb2011uias

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
    
<d>
  <details>
    <summary> vlan without isolation </summary>
    
```bash
# may/24/2021 21:20:13 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add name=Bridge_vlan3
add name=Bridge_vlan4
add admin-mac=B8:69:F4:2A:97:6C auto-mac=no comment=defconf name=bridge
/interface vlan
add interface=Bridge_vlan3 name=vlan3 vlan-id=3
add interface=Bridge_vlan4 name=vlan4 vlan-id=4
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip pool
add name=default-dhcp ranges=192.168.86.10-192.168.86.254
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.100.2-192.168.100.254
add name=dhcp_pool3 ranges=192.168.3.2-192.168.3.254
add name=dhcp_pool4 ranges=192.168.4.2-192.168.4.254
/ip dhcp-server
add address-pool=default-dhcp disabled=no interface=bridge name=defconf
add add-arp=yes address-pool=dhcp_pool3 disabled=no interface=Bridge_vlan3 name=dhcp3
add address-pool=dhcp_pool4 disabled=no interface=Bridge_vlan4 name=dhcp4
/ppp profile
add local-address=10.10.10.1 name=profile-OpenVPN-server remote-address=dhcp_pool-OpenVPN
add local-address=192.168.100.1 name=OVPN_server remote-address=OVPN_srv_pool
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=Bridge_vlan3 comment=defconf interface=ether3
add bridge=Bridge_vlan4 comment=defconf interface=ether4
add bridge=bridge comment=defconf interface=ether5
add bridge=bridge comment=defconf interface=ether6
add bridge=bridge comment=defconf interface=ether7
add bridge=bridge comment=defconf interface=ether8
add bridge=bridge comment=defconf interface=ether9
add bridge=bridge comment=defconf interface=ether10
add bridge=bridge comment=defconf interface=sfp1
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface bridge vlan
add bridge=Bridge_vlan3 tagged=Bridge_vlan3 untagged=ether3 vlan-ids=3
add bridge=Bridge_vlan4 tagged=Bridge_vlan4 untagged=ether4 vlan-ids=4
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=OVPN_server enabled=yes keepalive-timeout=disabled mode=ethernet
/ip address
add address=192.168.86.1/24 comment=defconf interface=bridge network=192.168.86.0
add address=192.168.3.1/24 interface=Bridge_vlan3 network=192.168.3.0
add address=192.168.4.1/24 interface=Bridge_vlan4 network=192.168.4.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server network
add address=192.168.3.0/24 dns-server=192.168.88.1,8.8.8.8 gateway=192.168.3.1 wins-server=192.168.86.5
add address=192.168.4.0/24 dns-server=192.168.88.1,8.8.8.8 gateway=192.168.4.1
add address=192.168.86.0/24 comment=defconf gateway=192.168.86.1
/ip dns
set allow-remote-requests=yes
/ip dns static
add address=192.168.88.1 comment=defconf name=router.lan
/ip firewall filter
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=accept chain=input comment=OVPN dst-port=1194 log=yes log-prefix=OVPN_pref protocol=tcp
add action=accept chain=output protocol=tcp src-port=1194
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=drop chain=input comment="defconf: drop all not coming from LAN" in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new in-interface-list=WAN
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

<d>
   <details>
     <summary> wlan with isolation 4> </summary>
     
```bash
# may/25/2021 02:17:54 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add fast-forward=no name=Bridge_vlan3
add fast-forward=no name=Bridge_vlan4
add admin-mac=B8:69:F4:2A:97:6C auto-mac=no comment=defconf fast-forward=no name=bridge
/interface vlan
add interface=Bridge_vlan3 name=vlan3 vlan-id=3
add interface=Bridge_vlan4 name=vlan4 vlan-id=4
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
add name=VLAN
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip pool
add name=default-dhcp ranges=192.168.86.10-192.168.86.254
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.100.2-192.168.100.254
add name=dhcp_pool3 ranges=192.168.3.2-192.168.3.254
add name=dhcp_pool4 ranges=192.168.4.2-192.168.4.254
/ip dhcp-server
add address-pool=default-dhcp disabled=no interface=bridge name=defconf
add address-pool=dhcp_pool3 disabled=no interface=Bridge_vlan3 name=dhcp3
add address-pool=dhcp_pool4 disabled=no interface=Bridge_vlan4 name=dhcp4
/ppp profile
add local-address=10.10.10.1 name=profile-OpenVPN-server remote-address=dhcp_pool-OpenVPN
add bridge=Bridge_vlan3 local-address=192.168.100.1 name=OVPN_server remote-address=OVPN_srv_pool
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=Bridge_vlan3 comment=defconf interface=ether3
add bridge=Bridge_vlan4 comment=defconf interface=ether4
add bridge=bridge comment=defconf interface=ether5
add bridge=bridge comment=defconf interface=ether6
add bridge=bridge comment=defconf interface=ether7
add bridge=bridge comment=defconf interface=ether8
add bridge=bridge comment=defconf interface=ether9
add bridge=bridge comment=defconf interface=ether10
add bridge=bridge comment=defconf interface=sfp1
/interface bridge settings
set use-ip-firewall=yes use-ip-firewall-for-vlan=yes
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface bridge vlan
add bridge=Bridge_vlan3 tagged=Bridge_vlan3 untagged=ether3 vlan-ids=3
add bridge=Bridge_vlan4 tagged=Bridge_vlan4 untagged=ether4 vlan-ids=4
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
add interface=Bridge_vlan3 list=VLAN
add interface=Bridge_vlan4 list=VLAN
add list=VLAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=OVPN_server enabled=yes keepalive-timeout=disabled mode=ethernet
/ip address
add address=192.168.86.1/24 comment=defconf interface=bridge network=192.168.86.0
add address=192.168.3.1/24 interface=Bridge_vlan3 network=192.168.3.0
add address=192.168.4.1/24 interface=Bridge_vlan4 network=192.168.4.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server network
add address=192.168.3.0/24 dns-server=192.168.88.1,8.8.8.8 gateway=192.168.3.1 wins-server=192.168.86.5
add address=192.168.4.0/24 dns-server=192.168.88.1,8.8.8.8 gateway=192.168.4.1
add address=192.168.86.0/24 comment=defconf gateway=192.168.86.1
/ip dns
set allow-remote-requests=yes
/ip dns static
add address=192.168.88.1 comment=defconf name=router.lan
/ip firewall address-list
add address=192.168.86.0/24 list=router_bridge
add address=192.168.3.0/24 list=ALL_VLAN
add address=192.168.4.0/24 list=ALL_VLAN
add address=192.168.4.0/24 list=ISOLATE_VLAN3
add address=192.168.101.0/24 list=ISOLATE_VLAN3
add address=192.168.100.0/24 list=VLAN3
/ip firewall filter
add action=drop chain=forward dst-address-list=router_bridge in-interface-list=VLAN log=yes log-prefix="forward reject guest" src-address-list=ALL_VLAN
add action=drop chain=forward dst-address-list=router_bridge in-interface-list=VLAN log=yes log-prefix="forward reject guest" src-address-list=VLAN3
add action=drop chain=forward disabled=yes dst-address=192.168.86.1 in-interface-list=VLAN log=yes log-prefix="forward reject guest" src-address-list=VLAN3
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=accept chain=input comment=OVPN dst-port=1194 log=yes log-prefix=OVPN_pref protocol=tcp
add action=accept chain=output disabled=yes protocol=tcp src-port=1194
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=drop chain=input comment="defconf: drop all not coming from LAN" in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new in-interface-list=WAN
add action=drop chain=forward dst-address=192.168.4.0/24 log=yes log-prefix="forward reject guest" src-address=192.168.100.0/24
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
/ip firewall service-port
set sip disabled=yes
/ip route rule
add action=unreachable disabled=yes dst-address=192.168.4.0/24 interface=Bridge_vlan3 src-address=192.168.100.0/24
/ppp secret
add name=oukitelk10000pro password=qwerty12345 profile=profile-OpenVPN-server service=ovpn
add name=test-user-1 password=1qaz2wsx3edc profile=OVPN_server service=ovpn
/system clock
set time-zone-name=Europe/Moscow
/system logging
add topics=ovpn,debug
add topics=ovpn,debug
/tool mac-server
set allowed-interface-list=
/tool mac-server mac-winbox
set allowed-interface-list=LAN
```
     
  </details>
</d>

<d>
  <details>
    <summary> isolated vlan + ovpn server </summary>

```bash
# may/25/2021 20:40:38 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add fast-forward=no name=Bridge_vlan3
add fast-forward=no name=Bridge_vlan4
add admin-mac=B8:69:F4:2A:97:6C auto-mac=no comment=defconf fast-forward=no name=bridge
/interface ovpn-server
add name=bind_ovpn4 user=test-user2
/interface vlan
add interface=Bridge_vlan3 name=vlan3 vlan-id=3
add interface=Bridge_vlan4 name=vlan4 vlan-id=4
/interface ovpn-client
add certificate=cert_export_clients-template.crt_0 cipher=aes256 connect-to=192.168.88.1 disabled=yes mac-address=02:E9:33:0C:98:65 name=container-test password=\
    1qaz2wsx3edc port=46200 user=ovpn_test_user1
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
add name=VLAN
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip pool
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.101.2-192.168.101.254
add name=dhcp_pool3 ranges=192.168.3.2-192.168.3.254
add name=dhcp_pool4 ranges=192.168.4.2-192.168.4.254
add name=ovpn1_101 ranges=192.168.100.101
add name=ovpn1 ranges=192.168.100.1
add name=ovpn1_102 ranges=192.168.100.102
add name=ovpn1_103 ranges=192.168.100.103
add name=DEF_186 ranges=192.168.186.100-192.168.186.252
/ip dhcp-server
add address-pool=DEF_186 disabled=no interface=bridge name=defconf_186
add address-pool=dhcp_pool3 disabled=no interface=Bridge_vlan3 name=dhcp3
add address-pool=dhcp_pool4 disabled=no interface=Bridge_vlan4 name=dhcp4
/ppp profile
add bridge=Bridge_vlan3 local-address=ovpn1 name=profile_ovpn3 remote-address=ovpn1_101
add bridge=Bridge_vlan4 local-address=192.168.101.1 name=profile_ovpn4 remote-address=192.168.101.102
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=Bridge_vlan3 comment=defconf interface=ether3
add bridge=Bridge_vlan4 comment=defconf interface=ether4
add bridge=bridge comment=defconf interface=ether5
add bridge=bridge comment=defconf interface=ether6
add bridge=bridge comment=defconf interface=ether7
add bridge=bridge comment=defconf interface=ether8
add bridge=bridge comment=defconf interface=ether9
add bridge=bridge comment=defconf interface=ether10
add bridge=bridge comment=defconf interface=sfp1
/interface bridge settings
set use-ip-firewall=yes use-ip-firewall-for-vlan=yes
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface bridge vlan
add bridge=Bridge_vlan3 tagged=Bridge_vlan3 untagged=ether3 vlan-ids=3
add bridge=Bridge_vlan4 tagged=Bridge_vlan4 untagged=ether4 vlan-ids=4
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
add interface=Bridge_vlan3 list=VLAN
add interface=Bridge_vlan4 list=VLAN
add list=VLAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=profile_ovpn3 enabled=yes keepalive-timeout=disabled mode=ethernet \
    require-client-certificate=yes
/ip address
add address=192.168.3.1/24 interface=Bridge_vlan3 network=192.168.3.0
add address=192.168.4.1/24 interface=Bridge_vlan4 network=192.168.4.0
add address=192.168.186.1/24 interface=bridge network=192.168.186.0
add address=192.168.220.1/24 interface=ether10 network=192.168.220.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server network
add address=192.168.3.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.3.1
add address=192.168.4.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.4.1
add address=192.168.186.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.186.1
/ip dns
set allow-remote-requests=yes servers=8.8.8.8
/ip dns static
add address=192.168.186.1 comment=defconf name=router.lan
/ip firewall address-list
add address=192.168.186.0/24 list=router_bridge
add address=192.168.3.0/24 list=isolated
add address=192.168.4.0/24 list=isolated
add address=192.168.4.0/24 list=ISOLATE_VLAN3
add address=192.168.101.0/24 list=ISOLATE_VLAN3
add address=192.168.100.0/24 list=ovpn3
add address=192.168.100.0/24 list=Internet_access
add address=192.168.101.0/24 list=Internet_access
add address=192.168.3.0/24 list=Internet_access
add address=192.168.4.0/24 list=Internet_access
add address=192.168.186.0/24 list=Internet_access
add address=192.168.3.0/24 list=ISOLATE_VLAN4
add address=192.168.100.0/24 list=ISOLATE_VLAN4
add address=192.168.101.0/24 list=isolated
add address=192.168.100.0/24 list=isolated
add address=192.168.101.0/24 list=ovpn4
add address=192.168.188.0/24 list=router_bridge
/ip firewall filter
add action=drop chain=forward dst-address-list=router_bridge dst-port=!53 in-interface-list=VLAN log-prefix="forward reject guest" protocol=tcp src-address-list=\
    isolated
add action=drop chain=forward dst-address-list=ISOLATE_VLAN3 in-interface-list=VLAN log-prefix="forward reject guest" src-address-list=ovpn3
add action=drop chain=forward dst-address-list=ISOLATE_VLAN4 in-interface-list=VLAN log-prefix="forward reject guest" src-address-list=ovpn4
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=accept chain=input protocol=icmp
add action=accept chain=input connection-state=established,related in-interface-list=WAN
add action=accept chain=forward connection-state=established,related in-interface-list=WAN
add action=accept chain=input comment=OVPN connection-state=new dst-port=1194 log=yes log-prefix=OVPN_pref protocol=tcp
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=drop chain=input connection-state=invalid in-interface-list=WAN
add action=drop chain=forward connection-state=invalid in-interface-list=WAN
add action=drop chain=input comment="Drop all other input connections" in-interface-list=WAN
add action=accept chain=forward comment="Access Internet From LAN" src-address-list=Internet_access
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=drop chain=forward comment="Drop all other forward connections"
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
/ip firewall service-port
set sip disabled=yes
/ip route rule
add action=unreachable disabled=yes dst-address=192.168.186.1/32 src-address=192.168.100.0/24
add action=unreachable disabled=yes dst-address=192.168.100.0/24 src-address=192.168.186.1/32
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=223
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=221
set www address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=222
set api address=192.168.186.0/24,192.168.188.0/24,192.168.220.0/24,192.168.230.0/24
set winbox address=192.168.186.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24
set api-ssl address=192.168.188.0/24 disabled=yes
/ppp secret
add name=oukitelk10000pro password=qwerty12345 service=ovpn
add name=test-user-1 password=1qaz2wsx3edc profile=profile_ovpn3 service=ovpn
add name=test-user2 password=1qaz2wsx profile=profile_ovpn4 service=ovpn
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

<details>

```bash
# may/25/2021 20:43:26 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add ageing-time=5m arp=enabled arp-timeout=auto auto-mac=yes dhcp-snooping=no disabled=no fast-forward=no forward-delay=15s igmp-snooping=no max-message-age=20s mtu=\
    auto name=Bridge_vlan3 priority=0x8000 protocol-mode=rstp transmit-hold-count=6 vlan-filtering=no
add ageing-time=5m arp=enabled arp-timeout=auto auto-mac=yes dhcp-snooping=no disabled=no fast-forward=no forward-delay=15s igmp-snooping=no max-message-age=20s mtu=\
    auto name=Bridge_vlan4 priority=0x8000 protocol-mode=rstp transmit-hold-count=6 vlan-filtering=no
add admin-mac=B8:69:F4:2A:97:6C ageing-time=5m arp=enabled arp-timeout=auto auto-mac=no comment=defconf dhcp-snooping=no disabled=no fast-forward=no forward-delay=\
    15s igmp-snooping=no max-message-age=20s mtu=auto name=bridge priority=0x8000 protocol-mode=rstp transmit-hold-count=6 vlan-filtering=no
/interface ovpn-server
add disabled=no name=bind_ovpn4 user=test-user2
/interface ethernet
set [ find default-name=ether1 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6B mtu=1500 name=ether1 orig-mac-address=B8:69:F4:2A:97:6B rx-flow-control=off speed=1Gbps tx-flow-control=off
set [ find default-name=ether2 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6C mtu=1500 name=ether2 orig-mac-address=B8:69:F4:2A:97:6C rx-flow-control=off speed=1Gbps tx-flow-control=off
set [ find default-name=ether3 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6D mtu=1500 name=ether3 orig-mac-address=B8:69:F4:2A:97:6D rx-flow-control=off speed=1Gbps tx-flow-control=off
set [ find default-name=ether4 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6E mtu=1500 name=ether4 orig-mac-address=B8:69:F4:2A:97:6E rx-flow-control=off speed=1Gbps tx-flow-control=off
set [ find default-name=ether5 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6F mtu=1500 name=ether5 orig-mac-address=B8:69:F4:2A:97:6F rx-flow-control=off speed=1Gbps tx-flow-control=off
set [ find default-name=ether6 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=B8:69:F4:2A:97:70 mtu=1500 \
    name=ether6 orig-mac-address=B8:69:F4:2A:97:70 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether7 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=B8:69:F4:2A:97:71 mtu=1500 \
    name=ether7 orig-mac-address=B8:69:F4:2A:97:71 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether8 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=B8:69:F4:2A:97:72 mtu=1500 \
    name=ether8 orig-mac-address=B8:69:F4:2A:97:72 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether9 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=B8:69:F4:2A:97:73 mtu=1500 \
    name=ether9 orig-mac-address=B8:69:F4:2A:97:73 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether10 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=B8:69:F4:2A:97:74 mtu=1500 \
    name=ether10 orig-mac-address=B8:69:F4:2A:97:74 poe-out=auto-on poe-priority=10 power-cycle-interval=none !power-cycle-ping-address power-cycle-ping-enabled=no \
    !power-cycle-ping-timeout rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=sfp1 ] advertise=10M-half,10M-full,100M-half,100M-full,1000M-half,1000M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=\
    unlimited/unlimited disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=\
    B8:69:F4:2A:97:6A mtu=1500 name=sfp1 orig-mac-address=B8:69:F4:2A:97:6A rx-flow-control=off speed=1Gbps tx-flow-control=off
/queue interface
set Bridge_vlan3 queue=no-queue
set Bridge_vlan4 queue=no-queue
set bridge queue=no-queue
/interface vlan
add arp=enabled arp-timeout=auto disabled=no interface=Bridge_vlan3 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mtu=1500 name=\
    vlan3 use-service-tag=no vlan-id=3
add arp=enabled arp-timeout=auto disabled=no interface=Bridge_vlan4 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mtu=1500 name=\
    vlan4 use-service-tag=no vlan-id=4
/queue interface
set vlan3 queue=no-queue
set vlan4 queue=no-queue
/interface ethernet switch
set 0 cpu-flow-control=yes mirror-source=none mirror-target=none name=switch1
set 1 cpu-flow-control=yes mirror-source=none mirror-target=none name=switch2
/interface ethernet switch port
set 0 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 1 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 2 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 3 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 4 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 5 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 6 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 7 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 8 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 9 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 10 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 11 default-vlan-id=auto vlan-header=leave-as-is vlan-mode=disabled
set 12 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
/interface list
set [ find name=all ] comment="contains all interfaces" exclude="" include="" name=all
set [ find name=none ] comment="contains no interfaces" exclude="" include="" name=none
set [ find name=dynamic ] comment="contains dynamic interfaces" exclude="" include="" name=dynamic
add comment=defconf exclude="" include="" name=WAN
add comment=defconf exclude="" include="" name=LAN
add exclude="" include="" name=VLAN
/interface lte apn
set [ find default=yes ] add-default-route=yes apn=internet default-route-distance=2 name=default use-peer-dns=yes
/interface wireless security-profiles
set [ find default=yes ] authentication-types="" disable-pmkid=no eap-methods=passthrough group-ciphers=aes-ccm group-key-update=5m interim-update=0s \
    management-protection=disabled management-protection-key="" mode=none mschapv2-password="" mschapv2-username="" name=default radius-called-format=mac:ssid \
    radius-eap-accounting=no radius-mac-accounting=no radius-mac-authentication=no radius-mac-caching=disabled radius-mac-format=XX:XX:XX:XX:XX:XX radius-mac-mode=\
    as-username static-algo-0=none static-algo-1=none static-algo-2=none static-algo-3=none static-key-0="" static-key-1="" static-key-2="" static-key-3="" \
    static-sta-private-algo=none static-sta-private-key="" static-transmit-key=key-0 supplicant-identity=MikroTik tls-certificate=none tls-mode=no-certificates \
    unicast-ciphers=aes-ccm wpa-pre-shared-key="" wpa2-pre-shared-key=""
/ip dhcp-client option
set clientid_duid code=61 name=clientid_duid value="0xff\$(CLIENT_DUID)"
set clientid code=61 name=clientid value="0x01\$(CLIENT_MAC)"
set hostname code=12 name=hostname value="\$(HOSTNAME)"
/ip hotspot profile
set [ find default=yes ] dns-name="" hotspot-address=0.0.0.0 html-directory=hotspot html-directory-override="" http-cookie-lifetime=3d http-proxy=0.0.0.0:0 login-by=\
    cookie,http-chap name=default rate-limit="" smtp-server=0.0.0.0 split-user-domain=no use-radius=no
/ip hotspot user profile
set [ find default=yes ] add-mac-cookie=yes address-list="" idle-timeout=none !insert-queue-before keepalive-timeout=2m mac-cookie-timeout=3d name=default \
    !parent-queue !queue-type shared-users=1 status-autorefresh=1m transparent-proxy=no
/ip ipsec mode-config
set [ find default=yes ] name=request-only responder=no
/ip ipsec policy group
set [ find default=yes ] name=default
/ip ipsec profile
set [ find default=yes ] dh-group=modp2048,modp1024 dpd-interval=2m dpd-maximum-failures=5 enc-algorithm=aes-128,3des hash-algorithm=sha1 lifetime=1d name=default \
    nat-traversal=yes proposal-check=obey
/ip ipsec proposal
set [ find default=yes ] auth-algorithms=sha1 disabled=no enc-algorithms=aes-256-cbc,aes-192-cbc,aes-128-cbc lifetime=30m name=default pfs-group=modp1024
/ip pool
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.101.2-192.168.101.254
add name=dhcp_pool3 ranges=192.168.3.2-192.168.3.254
add name=dhcp_pool4 ranges=192.168.4.2-192.168.4.254
add name=ovpn1_101 ranges=192.168.100.101
add name=ovpn1 ranges=192.168.100.1
add name=ovpn1_102 ranges=192.168.100.102
add name=ovpn1_103 ranges=192.168.100.103
add name=DEF_186 ranges=192.168.186.100-192.168.186.252
/ip dhcp-server
add address-pool=DEF_186 authoritative=yes bootp-support=static disabled=no interface=bridge lease-script="" lease-time=10m name=defconf_186 use-radius=no
add address-pool=dhcp_pool3 authoritative=yes bootp-support=static disabled=no interface=Bridge_vlan3 lease-script="" lease-time=10m name=dhcp3 use-radius=no
add address-pool=dhcp_pool4 authoritative=yes bootp-support=static disabled=no interface=Bridge_vlan4 lease-script="" lease-time=10m name=dhcp4 use-radius=no
/port
set 0 baud-rate=auto data-bits=8 flow-control=none name=serial0 parity=none stop-bits=1
/ppp profile
set *0 address-list="" !bridge !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=yes !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list !local-address name=default on-down="" on-up="" only-one=default !outgoing-filter !parent-queue !queue-type !rate-limit \
    !remote-address !session-timeout use-compression=default use-encryption=default use-mpls=default use-upnp=default !wins-server
add address-list="" bridge=Bridge_vlan3 !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=default !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list local-address=ovpn1 name=profile_ovpn3 on-down="" on-up="" only-one=default !outgoing-filter !parent-queue !queue-type \
    !rate-limit remote-address=ovpn1_101 !session-timeout use-compression=default use-encryption=default use-mpls=default use-upnp=default !wins-server
add address-list="" bridge=Bridge_vlan4 !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=default !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list local-address=192.168.101.1 name=profile_ovpn4 on-down="" on-up="" only-one=default !outgoing-filter !parent-queue \
    !queue-type !rate-limit remote-address=192.168.101.102 !session-timeout use-compression=default use-encryption=default use-mpls=default use-upnp=default \
    !wins-server
set *FFFFFFFE address-list="" !bridge !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=yes !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list !local-address name=default-encryption on-down="" on-up="" only-one=default !outgoing-filter !parent-queue !queue-type \
    !rate-limit !remote-address !session-timeout use-compression=default use-encryption=yes use-mpls=default use-upnp=default !wins-server
/interface ovpn-client
add add-default-route=no auth=sha1 certificate=cert_export_clients-template.crt_0 cipher=aes256 connect-to=192.168.88.1 disabled=yes mac-address=02:E9:33:0C:98:65 \
    max-mtu=1500 mode=ip name=container-test password=1qaz2wsx3edc port=46200 profile=default user=ovpn_test_user1 verify-server-certificate=no
/queue type
set 0 kind=pfifo name=default pfifo-limit=50
set 1 kind=pfifo name=ethernet-default pfifo-limit=50
set 2 kind=sfq name=wireless-default sfq-allot=1514 sfq-perturb=5
set 3 kind=red name=synchronous-default red-avg-packet=1000 red-burst=20 red-limit=60 red-max-threshold=50 red-min-threshold=10
set 4 kind=sfq name=hotspot-default sfq-allot=1514 sfq-perturb=5
set 5 kind=pcq name=pcq-upload-default pcq-burst-rate=0 pcq-burst-threshold=0 pcq-burst-time=10s pcq-classifier=src-address pcq-dst-address-mask=32 \
    pcq-dst-address6-mask=128 pcq-limit=50KiB pcq-rate=0 pcq-src-address-mask=32 pcq-src-address6-mask=128 pcq-total-limit=2000KiB
set 6 kind=pcq name=pcq-download-default pcq-burst-rate=0 pcq-burst-threshold=0 pcq-burst-time=10s pcq-classifier=dst-address pcq-dst-address-mask=32 \
    pcq-dst-address6-mask=128 pcq-limit=50KiB pcq-rate=0 pcq-src-address-mask=32 pcq-src-address6-mask=128 pcq-total-limit=2000KiB
set 7 kind=none name=only-hardware-queue
set 8 kind=mq-pfifo mq-pfifo-limit=50 name=multi-queue-ethernet-default
set 9 kind=pfifo name=default-small pfifo-limit=10
/queue interface
set ether1 queue=only-hardware-queue
set ether2 queue=only-hardware-queue
set ether3 queue=only-hardware-queue
set ether4 queue=only-hardware-queue
set ether5 queue=only-hardware-queue
set ether6 queue=only-hardware-queue
set ether7 queue=only-hardware-queue
set ether8 queue=only-hardware-queue
set ether9 queue=only-hardware-queue
set ether10 queue=only-hardware-queue
set sfp1 queue=only-hardware-queue
set bind_ovpn4 queue=only-hardware-queue
set container-test queue=only-hardware-queue
/routing bgp instance
set default as=65530 client-to-client-reflection=yes !cluster-id !confederation disabled=no ignore-as-path-len=no name=default out-filter="" redistribute-connected=\
    no redistribute-ospf=no redistribute-other-bgp=no redistribute-rip=no redistribute-static=no router-id=0.0.0.0 routing-table=""
/routing ospf instance
set [ find default=yes ] disabled=no distribute-default=never !domain-id !domain-tag in-filter=ospf-in metric-bgp=auto metric-connected=20 metric-default=1 \
    metric-other-ospf=auto metric-rip=20 metric-static=20 !mpls-te-area !mpls-te-router-id name=default out-filter=ospf-out redistribute-bgp=no \
    redistribute-connected=no redistribute-other-ospf=no redistribute-rip=no redistribute-static=no router-id=0.0.0.0 !routing-table !use-dn
/routing ospf area
set [ find default=yes ] area-id=0.0.0.0 disabled=no instance=default name=backbone type=default
/snmp community
set [ find default=yes ] addresses=::/0 authentication-password="" authentication-protocol=MD5 encryption-password="" encryption-protocol=DES name=public \
    read-access=yes security=none write-access=no
/system logging action
set 0 memory-lines=1000 memory-stop-on-full=no name=memory target=memory
set 1 disk-file-count=2 disk-file-name=log disk-lines-per-file=1000 disk-stop-on-full=no name=disk target=disk
set 2 name=echo remember=yes target=echo
set 3 bsd-syslog=no name=remote remote=0.0.0.0 remote-port=514 src-address=0.0.0.0 syslog-facility=daemon syslog-severity=auto syslog-time-format=bsd-syslog target=\
    remote
/user group
set read name=read policy=local,telnet,ssh,reboot,read,test,winbox,password,web,sniff,sensitive,api,romon,tikapp,!ftp,!write,!policy,!dude skin=default
set write name=write policy=local,telnet,ssh,reboot,read,write,test,winbox,password,web,sniff,sensitive,api,romon,tikapp,!ftp,!policy,!dude skin=default
set full name=full policy=local,telnet,ssh,ftp,reboot,read,write,policy,test,winbox,password,web,sniff,sensitive,api,romon,dude,tikapp skin=default
/caps-man aaa
set called-format=mac:ssid interim-update=disabled mac-caching=disabled mac-format=XX:XX:XX:XX:XX:XX mac-mode=as-username
/caps-man manager
set ca-certificate=none certificate=none enabled=no package-path="" require-peer-certificate=no upgrade-policy=none
/caps-man manager interface
set [ find default=yes ] disabled=no forbid=no interface=all
/certificate settings
set crl-download=yes crl-store=ram crl-use=yes
/interface bridge port
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether2 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=Bridge_vlan3 broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=\
    yes ingress-filtering=no interface=ether3 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=Bridge_vlan4 broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=\
    yes ingress-filtering=no interface=ether4 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether5 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether6 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether7 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether8 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether9 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether10 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=sfp1 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
/interface bridge settings
set allow-fast-path=yes use-ip-firewall=yes use-ip-firewall-for-pppoe=no use-ip-firewall-for-vlan=yes
/ip firewall connection tracking
set enabled=auto generic-timeout=10m icmp-timeout=10s loose-tcp-tracking=yes tcp-close-timeout=10s tcp-close-wait-timeout=10s tcp-established-timeout=1d \
    tcp-fin-wait-timeout=10s tcp-last-ack-timeout=10s tcp-max-retrans-timeout=5m tcp-syn-received-timeout=5s tcp-syn-sent-timeout=5s tcp-time-wait-timeout=10s \
    tcp-unacked-timeout=5m udp-stream-timeout=3m udp-timeout=10s
/ip neighbor discovery-settings
set discover-interface-list=LAN
/ip settings
set accept-redirects=no accept-source-route=no allow-fast-path=yes arp-timeout=30s icmp-rate-limit=10 icmp-rate-mask=0x1818 ip-forward=yes max-neighbor-entries=8192 \
    route-cache=yes rp-filter=no secure-redirects=yes send-redirects=yes tcp-syncookies=no
/interface bridge vlan
add bridge=Bridge_vlan3 disabled=no tagged=Bridge_vlan3 untagged=ether3 vlan-ids=3
add bridge=Bridge_vlan4 disabled=no tagged=Bridge_vlan4 untagged=ether4 vlan-ids=4
/interface detect-internet
set detect-interface-list=none internet-interface-list=none lan-interface-list=none wan-interface-list=none
/interface l2tp-server server
set allow-fast-path=no authentication=pap,chap,mschap1,mschap2 caller-id-type=ip-address default-profile=default-encryption enabled=no ipsec-secret="" \
    keepalive-timeout=30 max-mru=1450 max-mtu=1450 max-sessions=unlimited mrru=disabled one-session-per-host=no use-ipsec=no
/interface list member
add comment=defconf disabled=no interface=bridge list=LAN
add comment=defconf disabled=no interface=ether1 list=WAN
add disabled=no interface=Bridge_vlan3 list=VLAN
add disabled=no interface=Bridge_vlan4 list=VLAN
add disabled=no list=VLAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=profile_ovpn3 enabled=yes keepalive-timeout=disabled mac-address=\
    FE:82:E9:E6:73:E9 max-mtu=1500 mode=ethernet netmask=24 port=1194 require-client-certificate=yes
/interface pptp-server server
set authentication=mschap1,mschap2 default-profile=default-encryption enabled=no keepalive-timeout=30 max-mru=1450 max-mtu=1450 mrru=disabled
/interface sstp-server server
set authentication=pap,chap,mschap1,mschap2 certificate=none default-profile=default enabled=no force-aes=no keepalive-timeout=60 max-mru=1500 max-mtu=1500 mrru=\
    disabled pfs=no port=443 tls-version=any verify-client-certificate=no
/interface wireless align
set active-mode=yes audio-max=-20 audio-min=-100 audio-monitor=00:00:00:00:00:00 filter-mac=00:00:00:00:00:00 frame-size=300 frames-per-second=25 receive-all=no \
    ssid-all=no
/interface wireless cap
set bridge=none caps-man-addresses="" caps-man-certificate-common-names="" caps-man-names="" certificate=none discovery-interfaces="" enabled=no interfaces="" \
    lock-to-caps-man=no static-virtual=no
/interface wireless sniffer
set channel-time=200ms file-limit=10 file-name="" memory-limit=10 multiple-channels=no only-headers=no receive-errors=no streaming-enabled=no streaming-max-rate=0 \
    streaming-server=0.0.0.0
/interface wireless snooper
set channel-time=200ms multiple-channels=yes receive-errors=no
/ip accounting
set account-local-traffic=no enabled=no threshold=256
/ip accounting web-access
set accessible-via-web=no address=0.0.0.0/0
/ip address
add address=192.168.3.1/24 disabled=no interface=Bridge_vlan3 network=192.168.3.0
add address=192.168.4.1/24 disabled=no interface=Bridge_vlan4 network=192.168.4.0
add address=192.168.186.1/24 disabled=no interface=bridge network=192.168.186.0
add address=192.168.220.1/24 disabled=no interface=ether10 network=192.168.220.0
/ip cloud
set ddns-enabled=no ddns-update-interval=none update-time=yes
/ip cloud advanced
set use-local-address=no
/ip dhcp-client
add add-default-route=yes comment=defconf default-route-distance=1 dhcp-options=hostname,clientid disabled=no interface=ether1 use-peer-dns=yes use-peer-ntp=yes
/ip dhcp-server config
set accounting=yes interim-update=0s store-leases-disk=5m
/ip dhcp-server network
add address=192.168.3.0/24 caps-manager="" dhcp-option="" dns-server=192.168.188.1,8.8.8.8 gateway=192.168.3.1 ntp-server="" wins-server=""
add address=192.168.4.0/24 caps-manager="" dhcp-option="" dns-server=192.168.188.1,8.8.8.8 gateway=192.168.4.1 ntp-server="" wins-server=""
add address=192.168.186.0/24 caps-manager="" dhcp-option="" dns-server=192.168.188.1,8.8.8.8 gateway=192.168.186.1 ntp-server="" wins-server=""
/ip dns
set allow-remote-requests=yes cache-max-ttl=1w cache-size=2048KiB max-concurrent-queries=100 max-concurrent-tcp-sessions=20 max-udp-packet-size=4096 \
    query-server-timeout=2s query-total-timeout=10s servers=8.8.8.8
/ip dns static
add address=192.168.186.1 comment=defconf disabled=no name=router.lan regexp="" ttl=1d
/ip firewall address-list
add address=192.168.186.0/24 disabled=no list=router_bridge
add address=192.168.3.0/24 disabled=no list=isolated
add address=192.168.4.0/24 disabled=no list=isolated
add address=192.168.4.0/24 disabled=no list=ISOLATE_VLAN3
add address=192.168.101.0/24 disabled=no list=ISOLATE_VLAN3
add address=192.168.100.0/24 disabled=no list=ovpn3
add address=192.168.100.0/24 disabled=no list=Internet_access
add address=192.168.101.0/24 disabled=no list=Internet_access
add address=192.168.3.0/24 disabled=no list=Internet_access
add address=192.168.4.0/24 disabled=no list=Internet_access
add address=192.168.186.0/24 disabled=no list=Internet_access
add address=192.168.3.0/24 disabled=no list=ISOLATE_VLAN4
add address=192.168.100.0/24 disabled=no list=ISOLATE_VLAN4
add address=192.168.101.0/24 disabled=no list=isolated
add address=192.168.100.0/24 disabled=no list=isolated
add address=192.168.101.0/24 disabled=no list=ovpn4
add address=192.168.188.0/24 disabled=no list=router_bridge
/ip firewall filter
add action=drop chain=forward !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate !connection-state !connection-type !content \
    disabled=no !dscp !dst-address dst-address-list=router_bridge !dst-address-type !dst-limit dst-port=!53 !fragment !hotspot !icmp-options !in-bridge-port \
    !in-bridge-port-list !in-interface in-interface-list=VLAN !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix=\
    "forward reject guest" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port \
    !priority protocol=tcp !psd !random !routing-mark !routing-table !src-address src-address-list=isolated !src-address-type !src-mac-address !src-port !tcp-flags \
    !tcp-mss !time !tls-host !ttl
add action=drop chain=forward !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate !connection-state !connection-type !content \
    disabled=no !dscp !dst-address dst-address-list=ISOLATE_VLAN3 !dst-address-type !dst-limit !dst-port !fragment !hotspot !icmp-options !in-bridge-port \
    !in-bridge-port-list !in-interface in-interface-list=VLAN !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix=\
    "forward reject guest" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port \
    !priority !protocol !psd !random !routing-mark !routing-table !src-address src-address-list=ovpn3 !src-address-type !src-mac-address !src-port !tcp-flags \
    !tcp-mss !time !tls-host !ttl
add action=drop chain=forward !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate !connection-state !connection-type !content \
    disabled=no !dscp !dst-address dst-address-list=ISOLATE_VLAN4 !dst-address-type !dst-limit !dst-port !fragment !hotspot !icmp-options !in-bridge-port \
    !in-bridge-port-list !in-interface in-interface-list=VLAN !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix=\
    "forward reject guest" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port \
    !priority !protocol !psd !random !routing-mark !routing-table !src-address src-address-list=ovpn4 !src-address-type !src-mac-address !src-port !tcp-flags \
    !tcp-mss !time !tls-host !ttl
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=accept chain=input protocol=icmp
add action=accept chain=input !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate connection-state=established,related \
    !connection-type !content disabled=no !dscp !dst-address !dst-address-list !dst-address-type !dst-limit !dst-port !fragment !hotspot !icmp-options \
    !in-bridge-port !in-bridge-port-list !in-interface in-interface-list=WAN !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix=\
    "" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port !priority !protocol \
    !psd !random !routing-mark !routing-table !src-address !src-address-list !src-address-type !src-mac-address !src-port !tcp-flags !tcp-mss !time !tls-host !ttl
add action=accept chain=forward !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate connection-state=established,related \
    !connection-type !content disabled=no !dscp !dst-address !dst-address-list !dst-address-type !dst-limit !dst-port !fragment !hotspot !icmp-options \
    !in-bridge-port !in-bridge-port-list !in-interface in-interface-list=WAN !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix=\
    "" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port !priority !protocol \
    !psd !random !routing-mark !routing-table !src-address !src-address-list !src-address-type !src-mac-address !src-port !tcp-flags !tcp-mss !time !tls-host !ttl
add action=accept chain=input comment=OVPN !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate connection-state=new \
    !connection-type !content disabled=no !dscp !dst-address !dst-address-list !dst-address-type !dst-limit dst-port=1194 !fragment !hotspot !icmp-options \
    !in-bridge-port !in-bridge-port-list !in-interface !in-interface-list !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=yes log-prefix=\
    OVPN_pref !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port !priority \
    protocol=tcp !psd !random !routing-mark !routing-table !src-address !src-address-list !src-address-type !src-mac-address !src-port !tcp-flags !tcp-mss !time \
    !tls-host !ttl
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=drop chain=input connection-state=invalid in-interface-list=WAN
add action=drop chain=forward connection-state=invalid in-interface-list=WAN
add action=drop chain=input comment="Drop all other input connections" in-interface-list=WAN
add action=accept chain=forward comment="Access Internet From LAN" !connection-bytes !connection-limit !connection-mark !connection-nat-state !connection-rate \
    !connection-state !connection-type !content disabled=no !dscp !dst-address !dst-address-list !dst-address-type !dst-limit !dst-port !fragment !hotspot \
    !icmp-options !in-bridge-port !in-bridge-port-list !in-interface !in-interface-list !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no \
    log-prefix="" !nth !out-bridge-port !out-bridge-port-list !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port !priority \
    !protocol !psd !random !routing-mark !routing-table !src-address src-address-list=Internet_access !src-address-type !src-mac-address !src-port !tcp-flags \
    !tcp-mss !time !tls-host !ttl
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=drop chain=forward comment="Drop all other forward connections"
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN !to-addresses !to-ports
/ip firewall service-port
set ftp disabled=no ports=21
set tftp disabled=no ports=69
set irc disabled=no ports=6667
set h323 disabled=no
set sip disabled=yes ports=5060,5061 sip-direct-media=yes sip-timeout=1h
set pptp disabled=no
set udplite disabled=no
set dccp disabled=no
set sctp disabled=no
/ip hotspot service-port
set ftp disabled=no ports=21
/ip hotspot user
set [ find default=yes ] comment="counters and limits for trial users" disabled=no name=default-trial
/ip ipsec policy
set 0 disabled=no dst-address=::/0 group=default proposal=default protocol=all src-address=::/0 template=yes
/ip ipsec settings
set accounting=yes interim-update=0s xauth-use-radius=no
/ip proxy
set always-from-cache=no anonymous=no cache-administrator=webmaster cache-hit-dscp=4 cache-on-disk=no cache-path=web-proxy enabled=no max-cache-object-size=2048KiB \
    max-cache-size=unlimited max-client-connections=600 max-fresh-time=3d max-server-connections=600 parent-proxy=:: parent-proxy-port=0 port=8080 \
    serialize-connections=no src-address=::
/ip route rule
add action=unreachable disabled=yes dst-address=192.168.186.1/32 !interface !routing-mark src-address=192.168.100.0/24
add action=unreachable disabled=yes dst-address=192.168.100.0/24 !interface !routing-mark src-address=192.168.186.1/32
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=223
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=221
set www address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=80
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=222
set www-ssl address="" certificate=none disabled=yes port=443
set api address=192.168.186.0/24,192.168.188.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=8728
set winbox address=192.168.186.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 disabled=no port=8291
set api-ssl address=192.168.188.0/24 certificate=none disabled=yes port=8729
/ip smb
set allow-guests=yes comment=MikrotikSMB domain=MSHOME enabled=no interfaces=all
/ip smb shares
set [ find default=yes ] comment="default share" directory=/pub disabled=no max-sessions=10 name=pub
/ip smb users
set [ find default=yes ] disabled=no name=guest password="" read-only=yes
/ip socks
set connection-idle-timeout=2m enabled=no max-connections=200 port=1080
/ip ssh
set allow-none-crypto=no always-allow-password-login=no forwarding-enabled=no host-key-size=2048 strong-crypto=no
/ip tftp settings
set max-block-size=4096
/ip traffic-flow
set active-flow-timeout=30m cache-entries=32k enabled=no inactive-flow-timeout=15s interfaces=all
/ip traffic-flow ipfix
set bytes=yes dst-address=yes dst-address-mask=yes dst-mac-address=yes dst-port=yes first-forwarded=yes gateway=yes icmp-code=yes icmp-type=yes igmp-type=yes \
    in-interface=yes ip-header-length=yes ip-total-length=yes ipv6-flow-label=yes is-multicast=yes last-forwarded=yes nat-dst-address=yes nat-dst-port=yes \
    nat-src-address=yes nat-src-port=yes out-interface=yes packets=yes protocol=yes src-address=yes src-address-mask=yes src-mac-address=yes src-port=yes \
    tcp-ack-num=yes tcp-flags=yes tcp-seq-num=yes tcp-window-size=yes tos=yes ttl=yes udp-length=yes
/ip upnp
set allow-disable-external-interface=no enabled=no show-dummy-rule=yes
/lcd
set backlight-timeout=30m color-scheme=dark default-screen=main-menu enabled=yes flip-screen=no read-only-mode=no time-interval=min touch-screen=enabled
/lcd pin
set hide-pin-number=no pin-number=1234
/lcd interface
set sfp1 disabled=no max-speed=auto timeout=10s
set ether1 disabled=no max-speed=auto timeout=10s
set ether2 disabled=no max-speed=auto timeout=10s
set ether3 disabled=no max-speed=auto timeout=10s
set ether4 disabled=no max-speed=auto timeout=10s
set ether5 disabled=no max-speed=auto timeout=10s
set ether6 disabled=no max-speed=auto timeout=10s
set ether7 disabled=no max-speed=auto timeout=10s
set ether8 disabled=no max-speed=auto timeout=10s
set ether9 disabled=no max-speed=auto timeout=10s
set ether10 disabled=no max-speed=auto timeout=10s
/lcd interface pages
set 0 interfaces=sfp1,ether1,ether2,ether3,ether4,ether5,ether6,ether7,ether8,ether9,ether10
/lcd screen
set 0 disabled=no timeout=10s
set 1 disabled=no timeout=10s
set 2 disabled=no timeout=10s
set 3 disabled=no timeout=10s
set 4 disabled=no timeout=10s
set 5 disabled=no timeout=10s
/mpls
set dynamic-label-range=16-1048575 propagate-ttl=yes
/mpls interface
set [ find default=yes ] disabled=no interface=all mpls-mtu=1508
/mpls ldp
set distribute-for-default-route=no enabled=no hop-limit=255 loop-detect=no lsr-id=0.0.0.0 path-vector-limit=255 transport-address=0.0.0.0 use-explicit-null=no
/port firmware
set directory=firmware ignore-directip-modem=no
/ppp aaa
set accounting=yes interim-update=0s use-circuit-id-in-nas-port-id=no use-radius=no
/ppp secret
add caller-id="" disabled=no limit-bytes-in=0 limit-bytes-out=0 !local-address name=oukitelk10000pro password=qwerty12345 !remote-address routes="" service=ovpn
add caller-id="" disabled=no limit-bytes-in=0 limit-bytes-out=0 !local-address name=test-user-1 password=1qaz2wsx3edc profile=profile_ovpn3 !remote-address routes="" \
    service=ovpn
add caller-id="" disabled=no limit-bytes-in=0 limit-bytes-out=0 !local-address name=test-user2 password=1qaz2wsx profile=profile_ovpn4 !remote-address routes="" \
    service=ovpn
/radius incoming
set accept=no port=3799
/routing bfd interface
set [ find default=yes ] disabled=no interface=all interval=0.2s min-rx=0.2s multiplier=5
/routing mme
set bidirectional-timeout=2 gateway-class=none gateway-keepalive=1m gateway-selection=no-gateway origination-interval=5s preferred-gateway=0.0.0.0 timeout=1m ttl=50
/routing rip
set distribute-default=never garbage-timer=2m metric-bgp=1 metric-connected=1 metric-default=1 metric-ospf=1 metric-static=1 redistribute-bgp=no \
    redistribute-connected=no redistribute-ospf=no redistribute-static=no routing-table=main timeout-timer=3m update-timer=30s
/snmp
set contact="" enabled=no engine-id="" location="" trap-community=public trap-generators=temp-exception trap-target="" trap-version=1
/system clock
set time-zone-autodetect=yes time-zone-name=Europe/Moscow
/system clock manual
set dst-delta=+00:00 dst-end="jan/01/1970 00:00:00" dst-start="jan/01/1970 00:00:00" time-zone=+00:00
/system console
set [ find port=serial0 ] channel=0 disabled=no port=serial0 term=vt102
/system identity
set name=MikroTik
/system leds settings
set all-leds-off=never
/system logging
set 0 action=memory disabled=no prefix="" topics=info
set 1 action=memory disabled=no prefix="" topics=error
set 2 action=memory disabled=no prefix="" topics=warning
set 3 action=echo disabled=no prefix="" topics=critical
add action=memory disabled=no prefix="" topics=ovpn,debug
add action=memory disabled=no prefix="" topics=ovpn,debug
/system note
set note="" show-at-login=yes
/system ntp client
set enabled=no primary-ntp=0.0.0.0 secondary-ntp=0.0.0.0 server-dns-names=""
/system resource irq
set 0 cpu=auto
set 1 cpu=auto
set 2 cpu=auto
set 3 cpu=auto
set 4 cpu=auto
set 5 cpu=auto
/system routerboard settings
set auto-upgrade=no baud-rate=115200 boot-delay=2s boot-device=nand-if-fail-then-ethernet boot-protocol=bootp enable-jumper-reset=yes enter-setup-on=any-key \
    force-backup-booter=no protected-routerboot=disabled reformat-hold-button=20s reformat-hold-button-max=10m silent-boot=no
/system routerboard usb
set usb-mode=automatic
/system upgrade mirror
set check-interval=1d enabled=no primary-server=0.0.0.0 secondary-server=0.0.0.0 user=""
/system watchdog
set auto-send-supout=no automatic-supout=yes no-ping-delay=5m ping-timeout=1m watch-address=none watchdog-timer=yes
/tool bandwidth-server
set allocate-udp-ports-from=2000 authenticate=yes enabled=yes max-sessions=100
/tool e-mail
set address=0.0.0.0 from=<> password="" port=25 start-tls=no user=""
/tool graphing
set page-refresh=300 store-every=5min
/tool mac-server
set allowed-interface-list=LAN
/tool mac-server mac-winbox
set allowed-interface-list=LAN
/tool mac-server ping
set enabled=yes
/tool romon
set enabled=no id=00:00:00:00:00:00 secrets=""
/tool romon port
set [ find default=yes ] cost=100 disabled=no forbid=no interface=all secrets=""
/tool sms
set allowed-number="" auto-erase=no channel=0 port=none receive-enabled=no secret="" sim-pin=""
/tool sniffer
set file-limit=1000KiB file-name="" filter-cpu="" filter-direction=any filter-interface="" filter-ip-address="" filter-ip-protocol="" filter-ipv6-address="" \
    filter-mac-address="" filter-mac-protocol="" filter-operator-between-entries=or filter-port="" filter-stream=no memory-limit=100KiB memory-scroll=yes \
    only-headers=no streaming-enabled=no streaming-server=0.0.0.0
/tool traffic-generator
set latency-distribution-max=100us measure-out-of-order=yes stats-samples-to-keep=100 test-id=0
/user aaa
set accounting=yes default-group=read exclude-groups="" interim-update=0s use-radius=no
```

</details>
  
<d>
  <details>
    <summary> rb11 with vlan + isolation + ovpn server + ovpn client </summary>
    
```bash
# may/26/2021 00:11:52 by RouterOS 6.45.3
# software id = 1HCG-KR2L
#
# model = 2011UiAS
# serial number = 8C1709F7E8EC
/interface bridge
add fast-forward=no name=Bridge_vlan3
add fast-forward=no name=Bridge_vlan4
add admin-mac=B8:69:F4:2A:97:6C auto-mac=no comment=defconf fast-forward=no name=bridge
/interface ovpn-server
add name=bind_ovpn4 user=test-user2
/interface vlan
add interface=Bridge_vlan3 name=vlan3 vlan-id=3
add interface=Bridge_vlan4 name=vlan4 vlan-id=4
/interface ovpn-client
add certificate=cert_export_ovpn_client1.crt_0 cipher=aes256 connect-to=192.168.188.1 mac-address=02:E9:33:0C:98:65 name=container-test password=1qaz2wsx3edc port=41194 user=ovpn_client1
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
add name=VLAN
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip pool
add name=dhcp_pool-OpenVPN ranges=10.10.10.11-10.10.10.250
add name=OVPN_srv_pool ranges=192.168.101.2-192.168.101.254
add name=dhcp_pool3 ranges=192.168.3.2-192.168.3.254
add name=dhcp_pool4 ranges=192.168.4.2-192.168.4.254
add name=ovpn1_101 ranges=192.168.100.101
add name=ovpn1 ranges=192.168.100.1
add name=ovpn1_102 ranges=192.168.100.102
add name=ovpn1_103 ranges=192.168.100.103
add name=DEF_186 ranges=192.168.186.100-192.168.186.252
/ip dhcp-server
add address-pool=DEF_186 disabled=no interface=bridge name=defconf_186
add address-pool=dhcp_pool3 disabled=no interface=Bridge_vlan3 name=dhcp3
add address-pool=dhcp_pool4 disabled=no interface=Bridge_vlan4 name=dhcp4
/ppp profile
add bridge=Bridge_vlan3 local-address=ovpn1 name=profile_ovpn3 remote-address=ovpn1_101
add bridge=Bridge_vlan4 local-address=192.168.101.1 name=profile_ovpn4 remote-address=192.168.101.102
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=Bridge_vlan3 comment=defconf interface=ether3
add bridge=Bridge_vlan4 comment=defconf interface=ether4
add bridge=bridge comment=defconf interface=ether5
add bridge=bridge comment=defconf interface=ether6
add bridge=bridge comment=defconf interface=ether7
add bridge=bridge comment=defconf interface=ether8
add bridge=bridge comment=defconf interface=ether9
add bridge=bridge comment=defconf interface=ether10
add bridge=bridge comment=defconf interface=sfp1
/interface bridge settings
set use-ip-firewall=yes use-ip-firewall-for-vlan=yes
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface bridge vlan
add bridge=Bridge_vlan3 tagged=Bridge_vlan3 untagged=ether3 vlan-ids=3
add bridge=Bridge_vlan4 tagged=Bridge_vlan4 untagged=ether4 vlan-ids=4
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
add interface=Bridge_vlan3 list=VLAN
add interface=Bridge_vlan4 list=VLAN
add list=VLAN
/interface ovpn-server server
set auth=sha1 certificate=srv-OVPN cipher=blowfish128,aes128,aes192,aes256 default-profile=profile_ovpn3 enabled=yes keepalive-timeout=disabled mode=ethernet require-client-certificate=yes
/ip address
add address=192.168.3.1/24 interface=Bridge_vlan3 network=192.168.3.0
add address=192.168.4.1/24 interface=Bridge_vlan4 network=192.168.4.0
add address=192.168.186.1/24 interface=bridge network=192.168.186.0
add address=192.168.220.1/24 interface=ether10 network=192.168.220.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server network
add address=192.168.3.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.3.1
add address=192.168.4.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.4.1
add address=192.168.186.0/24 dns-server=192.168.188.1,8.8.8.8 gateway=192.168.186.1
/ip dns
set allow-remote-requests=yes servers=8.8.8.8
/ip dns static
add address=192.168.186.1 comment=defconf name=router.lan
/ip firewall address-list
add address=192.168.186.0/24 list=router_bridge
add address=192.168.3.0/24 list=isolated
add address=192.168.4.0/24 list=isolated
add address=192.168.4.0/24 list=ISOLATE_VLAN3
add address=192.168.101.0/24 list=ISOLATE_VLAN3
add address=192.168.100.0/24 list=ovpn3
add address=192.168.100.0/24 list=Internet_access
add address=192.168.101.0/24 list=Internet_access
add address=192.168.3.0/24 list=Internet_access
add address=192.168.4.0/24 list=Internet_access
add address=192.168.186.0/24 list=Internet_access
add address=192.168.3.0/24 list=ISOLATE_VLAN4
add address=192.168.100.0/24 list=ISOLATE_VLAN4
add address=192.168.101.0/24 list=isolated
add address=192.168.100.0/24 list=isolated
add address=192.168.101.0/24 list=ovpn4
add address=192.168.188.0/24 list=router_bridge
/ip firewall filter
add action=drop chain=forward dst-address-list=router_bridge dst-port=!53 in-interface-list=VLAN log-prefix="forward reject guest" protocol=tcp src-address-list=isolated
add action=drop chain=forward dst-address-list=ISOLATE_VLAN3 in-interface-list=VLAN log-prefix="forward reject guest" src-address-list=ovpn3
add action=drop chain=forward dst-address-list=ISOLATE_VLAN4 in-interface-list=VLAN log-prefix="forward reject guest" src-address-list=ovpn4
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=accept chain=input protocol=icmp
add action=accept chain=input connection-state=established,related in-interface-list=WAN
add action=accept chain=forward connection-state=established,related in-interface-list=WAN
add action=accept chain=input comment=OVPN connection-state=new dst-port=1194 log=yes log-prefix=OVPN_pref protocol=tcp
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=drop chain=input connection-state=invalid in-interface-list=WAN
add action=drop chain=forward connection-state=invalid in-interface-list=WAN
add action=drop chain=input comment="Drop all other input connections" in-interface-list=WAN
add action=accept chain=forward comment="Access Internet From LAN" src-address-list=Internet_access
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=drop chain=forward comment="Drop all other forward connections"
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
/ip firewall service-port
set sip disabled=yes
/ip route rule
add action=unreachable disabled=yes dst-address=192.168.186.1/32 src-address=192.168.100.0/24
add action=unreachable disabled=yes dst-address=192.168.100.0/24 src-address=192.168.186.1/32
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=223
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=221
set www address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=26535
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24 port=222
set api address=192.168.186.0/24,192.168.188.0/24,192.168.220.0/24,192.168.230.0/24
set winbox address=192.168.186.0/24,192.168.186.0/24,192.168.220.0/24,192.168.230.0/24
set api-ssl address=192.168.188.0/24 disabled=yes
/ppp secret
add name=oukitelk10000pro password=qwerty12345 service=ovpn
add name=test-user-1 password=1qaz2wsx3edc profile=profile_ovpn3 service=ovpn
add name=test-user2 password=1qaz2wsx profile=profile_ovpn4 service=ovpn
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
    
    
# ------------------------------------------ hap

<d>
  <details>
    <summary> def modificated hap lte </summary>
    
```bash
# may/25/2021 20:20:36 by RouterOS 6.45.9
# software id = EWEL-ZKSK
#
# model = RB952Ui-5ac2nD
# serial number = CC460CA43AE1
/interface lte
set [ find ] mac-address=AC:50:43:7F:EA:C9 name=lte1
/interface bridge
add admin-mac=48:8F:5A:E0:87:88 auto-mac=no comment=defconf name=bridge
/interface wireless
set [ find default-name=wlan1 ] band=2ghz-b/g/n channel-width=20/40mhz-XX disabled=no distance=indoors frequency=auto installation=indoor mode=ap-bridge ssid=\
    MikroTik-E0878D wireless-protocol=802.11
set [ find default-name=wlan2 ] band=5ghz-a/n/ac channel-width=20/40/80mhz-XXXX disabled=no distance=indoors frequency=auto installation=indoor mode=ap-bridge ssid=\
    MikroTik-E0878C wireless-protocol=802.11
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
/interface wireless security-profiles
set [ find default=yes ] authentication-types=wpa2-psk eap-methods="" mode=dynamic-keys supplicant-identity=MikroTik wpa2-pre-shared-key=q1w2e3r4t5y6u7i8o9p0
/ip hotspot profile
set [ find default=yes ] html-directory=flash/hotspot
/ip pool
add name=default-dhcp ranges=192.168.88.10-192.168.88.254
add name=DCHP_188 ranges=192.168.188.100-192.168.188.252
/ip dhcp-server
add address-pool=DCHP_188 disabled=no interface=bridge name=dchp_188
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=bridge comment=defconf interface=ether3
add bridge=bridge comment=defconf interface=ether4
add bridge=bridge comment=defconf disabled=yes interface=ether5
add bridge=bridge comment=defconf interface=wlan1
add bridge=bridge comment=defconf interface=wlan2
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
add interface=lte1 list=WAN
add interface=ether5 list=LAN
/ip address
add address=192.168.188.1/24 interface=bridge network=192.168.188.0
add address=192.168.230.1/24 interface=ether5 network=192.168.230.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server lease
add address=192.168.188.5 client-id=1:b8:69:f4:2a:97:6b mac-address=B8:69:F4:2A:97:6B server=dchp_188
/ip dhcp-server network
add address=192.168.188.0/24 gateway=192.168.188.1
/ip dns
set allow-remote-requests=yes servers=8.8.8.8
/ip dns static
add address=192.168.188.1 comment=defconf name=router.lan
/ip firewall filter
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=drop chain=input comment="defconf: drop all not coming from LAN" in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new in-interface-list=WAN
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
add action=dst-nat chain=dstnat dst-port=44500 protocol=tcp to-addresses=192.168.188.5 to-ports=1194
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set www address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=26535
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=222
set api address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set winbox address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set api-ssl disabled=yes
/system clock
set time-zone-name=Europe/Moscow
/tool mac-server
set allowed-interface-list=LAN
/tool mac-server mac-winbox
set allowed-interface-list=LAN
```
    
  </details>
  
<details>
  
```bash
# may/25/2021 20:21:41 by RouterOS 6.45.9
# software id = EWEL-ZKSK
#
# model = RB952Ui-5ac2nD
# serial number = CC460CA43AE1
/interface lte
set [ find ] disabled=no mac-address=AC:50:43:7F:EA:C9 mtu=1500 name=lte1
/interface bridge
add admin-mac=48:8F:5A:E0:87:88 ageing-time=5m arp=enabled arp-timeout=auto auto-mac=no comment=defconf dhcp-snooping=no disabled=no fast-forward=yes forward-delay=\
    15s igmp-snooping=no max-message-age=20s mtu=auto name=bridge priority=0x8000 protocol-mode=rstp transmit-hold-count=6 vlan-filtering=no
/interface ethernet
set [ find default-name=ether1 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=48:8F:5A:E0:87:87 mtu=1500 \
    name=ether1 orig-mac-address=48:8F:5A:E0:87:87 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether2 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=48:8F:5A:E0:87:88 mtu=1500 \
    name=ether2 orig-mac-address=48:8F:5A:E0:87:88 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether3 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=48:8F:5A:E0:87:89 mtu=1500 \
    name=ether3 orig-mac-address=48:8F:5A:E0:87:89 rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether4 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=48:8F:5A:E0:87:8A mtu=1500 \
    name=ether4 orig-mac-address=48:8F:5A:E0:87:8A rx-flow-control=off speed=100Mbps tx-flow-control=off
set [ find default-name=ether5 ] advertise=10M-half,10M-full,100M-half,100M-full arp=enabled arp-timeout=auto auto-negotiation=yes bandwidth=unlimited/unlimited \
    disabled=no full-duplex=yes l2mtu=1598 loop-protect=default loop-protect-disable-time=5m loop-protect-send-interval=5s mac-address=48:8F:5A:E0:87:8B mtu=1500 \
    name=ether5 orig-mac-address=48:8F:5A:E0:87:8B poe-out=auto-on poe-priority=10 power-cycle-interval=none !power-cycle-ping-address power-cycle-ping-enabled=no \
    !power-cycle-ping-timeout rx-flow-control=off speed=100Mbps tx-flow-control=off
/queue interface
set bridge queue=no-queue
set lte1 queue=no-queue
/interface ethernet switch
set 0 cpu-flow-control=yes mirror-source=none mirror-target=none name=switch1
/interface ethernet switch port
set 0 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 1 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 2 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 3 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 4 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
set 5 default-vlan-id=0 vlan-header=leave-as-is vlan-mode=disabled
/interface list
set [ find name=all ] comment="contains all interfaces" exclude="" include="" name=all
set [ find name=none ] comment="contains no interfaces" exclude="" include="" name=none
set [ find name=dynamic ] comment="contains dynamic interfaces" exclude="" include="" name=dynamic
add comment=defconf exclude="" include="" name=WAN
add comment=defconf exclude="" include="" name=LAN
/interface lte apn
set [ find default=yes ] add-default-route=yes apn=internet default-route-distance=2 name=default use-peer-dns=yes
/interface wireless security-profiles
set [ find default=yes ] authentication-types=wpa2-psk disable-pmkid=no eap-methods="" group-ciphers=aes-ccm group-key-update=5m interim-update=0s \
    management-protection=disabled management-protection-key="" mode=dynamic-keys mschapv2-password="" mschapv2-username="" name=default radius-called-format=\
    mac:ssid radius-eap-accounting=no radius-mac-accounting=no radius-mac-authentication=no radius-mac-caching=disabled radius-mac-format=XX:XX:XX:XX:XX:XX \
    radius-mac-mode=as-username static-algo-0=none static-algo-1=none static-algo-2=none static-algo-3=none static-key-0="" static-key-1="" static-key-2="" \
    static-key-3="" static-sta-private-algo=none static-sta-private-key="" static-transmit-key=key-0 supplicant-identity=MikroTik tls-certificate=none tls-mode=\
    no-certificates unicast-ciphers=aes-ccm wpa-pre-shared-key="" wpa2-pre-shared-key=q1w2e3r4t5y6u7i8o9p0
/interface wireless
set [ find default-name=wlan1 ] adaptive-noise-immunity=none allow-sharedkey=no ampdu-priorities=0 amsdu-limit=8192 amsdu-threshold=8192 antenna-gain=2 area="" arp=\
    enabled arp-timeout=auto band=2ghz-b/g/n basic-rates-a/g=6Mbps basic-rates-b=1Mbps bridge-mode=enabled channel-width=20/40mhz-XX compression=no country=etsi \
    default-ap-tx-limit=0 default-authentication=yes default-client-tx-limit=0 default-forwarding=yes disable-running-check=no disabled=no disconnect-timeout=3s \
    distance=indoors frame-lifetime=0 frequency=auto frequency-mode=regulatory-domain frequency-offset=0 guard-interval=any hide-ssid=no ht-basic-mcs=\
    mcs-0,mcs-1,mcs-2,mcs-3,mcs-4,mcs-5,mcs-6,mcs-7 ht-supported-mcs=\
    mcs-0,mcs-1,mcs-2,mcs-3,mcs-4,mcs-5,mcs-6,mcs-7,mcs-8,mcs-9,mcs-10,mcs-11,mcs-12,mcs-13,mcs-14,mcs-15,mcs-16,mcs-17,mcs-18,mcs-19,mcs-20,mcs-21,mcs-22,mcs-23 \
    hw-fragmentation-threshold=disabled hw-protection-mode=none hw-protection-threshold=0 hw-retries=7 installation=indoor interworking-profile=disabled \
    keepalive-frames=enabled l2mtu=1600 mac-address=48:8F:5A:E0:87:8D max-station-count=2007 mode=ap-bridge mtu=1500 multicast-buffering=enabled multicast-helper=\
    default name=wlan1 noise-floor-threshold=default nv2-cell-radius=30 nv2-downlink-ratio=50 nv2-mode=dynamic-downlink nv2-noise-floor-offset=default \
    nv2-preshared-key="" nv2-qos=default nv2-queue-count=2 nv2-security=disabled nv2-sync-secret="" on-fail-retry-time=100ms preamble-mode=both radio-name=\
    488F5AE0878D rate-selection=advanced rate-set=default rx-chains=0,1 scan-list=default secondary-channel="" security-profile=default skip-dfs-channels=disabled \
    ssid=MikroTik-E0878D station-bridge-clone-mac=00:00:00:00:00:00 station-roaming=enabled supported-rates-a/g=6Mbps,9Mbps,12Mbps,18Mbps,24Mbps,36Mbps,48Mbps,54Mbps \
    supported-rates-b=1Mbps,2Mbps,5.5Mbps,11Mbps tdma-period-size=2 tx-chains=0,1 tx-power-mode=default update-stats-interval=disabled vlan-id=1 vlan-mode=no-tag \
    wds-cost-range=50-150 wds-default-bridge=none wds-default-cost=100 wds-ignore-ssid=no wds-mode=disabled wireless-protocol=802.11 wmm-support=disabled wps-mode=\
    push-button
set [ find default-name=wlan2 ] adaptive-noise-immunity=none allow-sharedkey=no ampdu-priorities=0 amsdu-limit=8192 amsdu-threshold=8192 antenna-gain=2 area="" arp=\
    enabled arp-timeout=auto band=5ghz-a/n/ac basic-rates-a/g=6Mbps bridge-mode=enabled channel-width=20/40/80mhz-XXXX compression=no country=etsi \
    default-ap-tx-limit=0 default-authentication=yes default-client-tx-limit=0 default-forwarding=yes disable-running-check=no disabled=no disconnect-timeout=3s \
    distance=indoors frame-lifetime=0 frequency=auto frequency-mode=regulatory-domain frequency-offset=0 guard-interval=any hide-ssid=no ht-basic-mcs=\
    mcs-0,mcs-1,mcs-2,mcs-3,mcs-4,mcs-5,mcs-6,mcs-7 ht-supported-mcs=\
    mcs-0,mcs-1,mcs-2,mcs-3,mcs-4,mcs-5,mcs-6,mcs-7,mcs-8,mcs-9,mcs-10,mcs-11,mcs-12,mcs-13,mcs-14,mcs-15,mcs-16,mcs-17,mcs-18,mcs-19,mcs-20,mcs-21,mcs-22,mcs-23 \
    hw-fragmentation-threshold=disabled hw-protection-mode=none hw-protection-threshold=0 hw-retries=7 installation=indoor interworking-profile=disabled \
    keepalive-frames=enabled l2mtu=1600 mac-address=48:8F:5A:E0:87:8C max-station-count=2007 mode=ap-bridge mtu=1500 multicast-buffering=enabled multicast-helper=\
    default name=wlan2 nv2-cell-radius=30 nv2-downlink-ratio=50 nv2-mode=dynamic-downlink nv2-preshared-key="" nv2-qos=default nv2-queue-count=2 nv2-security=\
    disabled nv2-sync-secret="" on-fail-retry-time=100ms preamble-mode=both radio-name=488F5AE0878C rate-selection=advanced rate-set=default rx-chains=0 scan-list=\
    default secondary-channel="" security-profile=default skip-dfs-channels=disabled ssid=MikroTik-E0878C station-bridge-clone-mac=00:00:00:00:00:00 station-roaming=\
    enabled supported-rates-a/g=6Mbps,9Mbps,12Mbps,18Mbps,24Mbps,36Mbps,48Mbps,54Mbps tdma-period-size=2 tx-chains=0 tx-power-mode=default update-stats-interval=\
    disabled vht-basic-mcs=mcs0-7 vht-supported-mcs=mcs0-9,mcs0-9,mcs0-9 vlan-id=1 vlan-mode=no-tag wds-cost-range=50-150 wds-default-bridge=none wds-default-cost=\
    100 wds-ignore-ssid=no wds-mode=disabled wireless-protocol=802.11 wmm-support=disabled wps-mode=push-button
/interface wireless manual-tx-power-table
set wlan1 manual-tx-powers="1Mbps:17,2Mbps:17,5.5Mbps:17,11Mbps:17,6Mbps:17,9Mbps:17,12Mbps:17,18Mbps:17,24Mbps:17,36Mbps:17,48Mbps:17,54Mbps:17,HT20-0:17,HT20-1:17,H\
    T20-2:17,HT20-3:17,HT20-4:17,HT20-5:17,HT20-6:17,HT20-7:17,HT40-0:17,HT40-1:17,HT40-2:17,HT40-3:17,HT40-4:17,HT40-5:17,HT40-6:17,HT40-7:17"
set wlan2 manual-tx-powers="1Mbps:17,2Mbps:17,5.5Mbps:17,11Mbps:17,6Mbps:17,9Mbps:17,12Mbps:17,18Mbps:17,24Mbps:17,36Mbps:17,48Mbps:17,54Mbps:17,HT20-0:17,HT20-1:17,H\
    T20-2:17,HT20-3:17,HT20-4:17,HT20-5:17,HT20-6:17,HT20-7:17,HT40-0:17,HT40-1:17,HT40-2:17,HT40-3:17,HT40-4:17,HT40-5:17,HT40-6:17,HT40-7:17"
/ip dhcp-client option
set clientid_duid code=61 name=clientid_duid value="0xff\$(CLIENT_DUID)"
set clientid code=61 name=clientid value="0x01\$(CLIENT_MAC)"
set hostname code=12 name=hostname value="\$(HOSTNAME)"
/ip hotspot profile
set [ find default=yes ] dns-name="" hotspot-address=0.0.0.0 html-directory=flash/hotspot html-directory-override="" http-cookie-lifetime=3d http-proxy=0.0.0.0:0 \
    login-by=cookie,http-chap name=default rate-limit="" smtp-server=0.0.0.0 split-user-domain=no use-radius=no
/ip hotspot user profile
set [ find default=yes ] add-mac-cookie=yes address-list="" idle-timeout=none !insert-queue-before keepalive-timeout=2m mac-cookie-timeout=3d name=default \
    !parent-queue !queue-type shared-users=1 status-autorefresh=1m transparent-proxy=no
/ip ipsec mode-config
set [ find default=yes ] name=request-only responder=no
/ip ipsec policy group
set [ find default=yes ] name=default
/ip ipsec profile
set [ find default=yes ] dh-group=modp2048,modp1024 dpd-interval=2m dpd-maximum-failures=5 enc-algorithm=aes-128,3des hash-algorithm=sha1 lifetime=1d name=default \
    nat-traversal=yes proposal-check=obey
/ip ipsec proposal
set [ find default=yes ] auth-algorithms=sha1 disabled=no enc-algorithms=aes-256-cbc,aes-192-cbc,aes-128-cbc lifetime=30m name=default pfs-group=modp1024
/ip pool
add name=default-dhcp ranges=192.168.88.10-192.168.88.254
add name=DCHP_188 ranges=192.168.188.100-192.168.188.252
/ip dhcp-server
add address-pool=DCHP_188 authoritative=yes disabled=no interface=bridge lease-script="" lease-time=10m name=dchp_188 use-radius=no
/ppp profile
set *0 address-list="" !bridge !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=yes !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list !local-address name=default on-down="" on-up="" only-one=default !outgoing-filter !parent-queue !queue-type !rate-limit \
    !remote-address !session-timeout use-compression=default use-encryption=default use-mpls=default use-upnp=default !wins-server
set *FFFFFFFE address-list="" !bridge !bridge-horizon !bridge-path-cost !bridge-port-priority change-tcp-mss=yes !dns-server !idle-timeout !incoming-filter \
    !insert-queue-before !interface-list !local-address name=default-encryption on-down="" on-up="" only-one=default !outgoing-filter !parent-queue !queue-type \
    !rate-limit !remote-address !session-timeout use-compression=default use-encryption=yes use-mpls=default use-upnp=default !wins-server
/queue type
set 0 kind=pfifo name=default pfifo-limit=50
set 1 kind=pfifo name=ethernet-default pfifo-limit=50
set 2 kind=sfq name=wireless-default sfq-allot=1514 sfq-perturb=5
set 3 kind=red name=synchronous-default red-avg-packet=1000 red-burst=20 red-limit=60 red-max-threshold=50 red-min-threshold=10
set 4 kind=sfq name=hotspot-default sfq-allot=1514 sfq-perturb=5
set 5 kind=pcq name=pcq-upload-default pcq-burst-rate=0 pcq-burst-threshold=0 pcq-burst-time=10s pcq-classifier=src-address pcq-dst-address-mask=32 \
    pcq-dst-address6-mask=128 pcq-limit=50KiB pcq-rate=0 pcq-src-address-mask=32 pcq-src-address6-mask=128 pcq-total-limit=2000KiB
set 6 kind=pcq name=pcq-download-default pcq-burst-rate=0 pcq-burst-threshold=0 pcq-burst-time=10s pcq-classifier=dst-address pcq-dst-address-mask=32 \
    pcq-dst-address6-mask=128 pcq-limit=50KiB pcq-rate=0 pcq-src-address-mask=32 pcq-src-address6-mask=128 pcq-total-limit=2000KiB
set 7 kind=none name=only-hardware-queue
set 8 kind=mq-pfifo mq-pfifo-limit=50 name=multi-queue-ethernet-default
set 9 kind=pfifo name=default-small pfifo-limit=10
/queue interface
set ether1 queue=only-hardware-queue
set ether2 queue=only-hardware-queue
set ether3 queue=only-hardware-queue
set ether4 queue=only-hardware-queue
set ether5 queue=only-hardware-queue
set wlan1 queue=wireless-default
set wlan2 queue=wireless-default
/interface wireless nstreme
set wlan1 disable-csma=no enable-nstreme=no enable-polling=yes framer-limit=3200 framer-policy=none
set wlan2 disable-csma=no enable-nstreme=no enable-polling=yes framer-limit=3200 framer-policy=none
/routing bgp instance
set default as=65530 client-to-client-reflection=yes !cluster-id !confederation disabled=no ignore-as-path-len=no name=default out-filter="" redistribute-connected=\
    no redistribute-ospf=no redistribute-other-bgp=no redistribute-rip=no redistribute-static=no router-id=0.0.0.0 routing-table=""
/routing ospf instance
set [ find default=yes ] disabled=no distribute-default=never !domain-id !domain-tag in-filter=ospf-in metric-bgp=auto metric-connected=20 metric-default=1 \
    metric-other-ospf=auto metric-rip=20 metric-static=20 !mpls-te-area !mpls-te-router-id name=default out-filter=ospf-out redistribute-bgp=no \
    redistribute-connected=no redistribute-other-ospf=no redistribute-rip=no redistribute-static=no router-id=0.0.0.0 !routing-table !use-dn
/routing ospf area
set [ find default=yes ] area-id=0.0.0.0 disabled=no instance=default name=backbone type=default
/snmp community
set [ find default=yes ] addresses=::/0 authentication-password="" authentication-protocol=MD5 encryption-password="" encryption-protocol=DES name=public \
    read-access=yes security=none write-access=no
/system logging action
set 0 memory-lines=1000 memory-stop-on-full=no name=memory target=memory
set 1 disk-file-count=2 disk-file-name=flash/log disk-lines-per-file=1000 disk-stop-on-full=no name=disk target=disk
set 2 name=echo remember=yes target=echo
set 3 bsd-syslog=no name=remote remote=0.0.0.0 remote-port=514 src-address=0.0.0.0 syslog-facility=daemon syslog-severity=auto syslog-time-format=bsd-syslog target=\
    remote
/user group
set read name=read policy=local,telnet,ssh,reboot,read,test,winbox,password,web,sniff,sensitive,api,romon,tikapp,!ftp,!write,!policy,!dude skin=default
set write name=write policy=local,telnet,ssh,reboot,read,write,test,winbox,password,web,sniff,sensitive,api,romon,tikapp,!ftp,!policy,!dude skin=default
set full name=full policy=local,telnet,ssh,ftp,reboot,read,write,policy,test,winbox,password,web,sniff,sensitive,api,romon,dude,tikapp skin=default
/caps-man aaa
set called-format=mac:ssid interim-update=disabled mac-caching=disabled mac-format=XX:XX:XX:XX:XX:XX mac-mode=as-username
/caps-man manager
set ca-certificate=none certificate=none enabled=no package-path="" require-peer-certificate=no upgrade-policy=none
/caps-man manager interface
set [ find default=yes ] disabled=no forbid=no interface=all
/certificate settings
set crl-download=yes crl-store=ram crl-use=yes
/interface bridge port
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether2 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether3 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none hw=yes \
    ingress-filtering=no interface=ether4 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=yes edge=auto fast-leave=no frame-types=admit-all horizon=none \
    ingress-filtering=no interface=ether5 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none \
    ingress-filtering=no interface=wlan1 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
add auto-isolate=no bpdu-guard=no bridge=bridge broadcast-flood=yes comment=defconf disabled=no edge=auto fast-leave=no frame-types=admit-all horizon=none \
    ingress-filtering=no interface=wlan2 internal-path-cost=10 learn=auto multicast-router=temporary-query path-cost=10 point-to-point=auto priority=0x80 pvid=1 \
    restricted-role=no restricted-tcn=no tag-stacking=no trusted=no unknown-multicast-flood=yes unknown-unicast-flood=yes
/interface bridge settings
set allow-fast-path=yes use-ip-firewall=no use-ip-firewall-for-pppoe=no use-ip-firewall-for-vlan=no
/ip firewall connection tracking
set enabled=auto generic-timeout=10m icmp-timeout=10s loose-tcp-tracking=yes tcp-close-timeout=10s tcp-close-wait-timeout=10s tcp-established-timeout=1d \
    tcp-fin-wait-timeout=10s tcp-last-ack-timeout=10s tcp-max-retrans-timeout=5m tcp-syn-received-timeout=5s tcp-syn-sent-timeout=5s tcp-time-wait-timeout=10s \
    tcp-unacked-timeout=5m udp-stream-timeout=3m udp-timeout=10s
/ip neighbor discovery-settings
set discover-interface-list=LAN
/ip settings
set accept-redirects=no accept-source-route=no allow-fast-path=yes arp-timeout=30s icmp-rate-limit=10 icmp-rate-mask=0x1818 ip-forward=yes max-neighbor-entries=8192 \
    route-cache=yes rp-filter=no secure-redirects=yes send-redirects=yes tcp-syncookies=no
/interface detect-internet
set detect-interface-list=none internet-interface-list=none lan-interface-list=none wan-interface-list=none
/interface l2tp-server server
set allow-fast-path=no authentication=pap,chap,mschap1,mschap2 caller-id-type=ip-address default-profile=default-encryption enabled=no ipsec-secret="" \
    keepalive-timeout=30 max-mru=1450 max-mtu=1450 max-sessions=unlimited mrru=disabled one-session-per-host=no use-ipsec=no
/interface list member
add comment=defconf disabled=no interface=bridge list=LAN
add comment=defconf disabled=no interface=ether1 list=WAN
add disabled=no interface=lte1 list=WAN
add disabled=no interface=ether5 list=LAN
/interface ovpn-server server
set auth=sha1,md5 cipher=blowfish128,aes128 default-profile=default enabled=no keepalive-timeout=60 mac-address=FE:65:29:FC:B4:84 max-mtu=1500 mode=ip netmask=24 \
    port=1194 require-client-certificate=no
/interface pptp-server server
set authentication=mschap1,mschap2 default-profile=default-encryption enabled=no keepalive-timeout=30 max-mru=1450 max-mtu=1450 mrru=disabled
/interface sstp-server server
set authentication=pap,chap,mschap1,mschap2 certificate=none default-profile=default enabled=no force-aes=no keepalive-timeout=60 max-mru=1500 max-mtu=1500 mrru=\
    disabled pfs=no port=443 tls-version=any verify-client-certificate=no
/interface wireless align
set active-mode=yes audio-max=-20 audio-min=-100 audio-monitor=00:00:00:00:00:00 filter-mac=00:00:00:00:00:00 frame-size=300 frames-per-second=25 receive-all=no \
    ssid-all=no
/interface wireless cap
set bridge=none caps-man-addresses="" caps-man-certificate-common-names="" caps-man-names="" certificate=none discovery-interfaces="" enabled=no interfaces="" \
    lock-to-caps-man=no static-virtual=no
/interface wireless sniffer
set channel-time=200ms file-limit=10 file-name="" memory-limit=10 multiple-channels=no only-headers=no receive-errors=no streaming-enabled=no streaming-max-rate=0 \
    streaming-server=0.0.0.0
/interface wireless snooper
set channel-time=200ms multiple-channels=yes receive-errors=no
/ip accounting
set account-local-traffic=no enabled=no threshold=256
/ip accounting web-access
set accessible-via-web=no address=0.0.0.0/0
/ip address
add address=192.168.188.1/24 disabled=no interface=bridge network=192.168.188.0
add address=192.168.230.1/24 disabled=no interface=ether5 network=192.168.230.0
/ip cloud
set ddns-enabled=no ddns-update-interval=none update-time=yes
/ip cloud advanced
set use-local-address=no
/ip dhcp-client
add add-default-route=yes comment=defconf default-route-distance=1 dhcp-options=hostname,clientid disabled=no interface=ether1 use-peer-dns=yes use-peer-ntp=yes
/ip dhcp-server config
set accounting=yes interim-update=0s store-leases-disk=5m
/ip dhcp-server lease
add address=192.168.188.5 address-lists="" client-id=1:b8:69:f4:2a:97:6b dhcp-option="" disabled=no !insert-queue-before mac-address=B8:69:F4:2A:97:6B server=\
    dchp_188
/ip dhcp-server network
add address=192.168.188.0/24 caps-manager="" dhcp-option="" dns-server="" gateway=192.168.188.1 ntp-server="" wins-server=""
/ip dns
set allow-remote-requests=yes cache-max-ttl=1w cache-size=2048KiB max-concurrent-queries=100 max-concurrent-tcp-sessions=20 max-udp-packet-size=4096 \
    query-server-timeout=2s query-total-timeout=10s servers=8.8.8.8
/ip dns static
add address=192.168.188.1 comment=defconf disabled=no name=router.lan regexp="" ttl=1d
/ip firewall filter
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=drop chain=input comment="defconf: drop all not coming from LAN" in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new in-interface-list=WAN
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN !to-addresses !to-ports
add action=dst-nat chain=dstnat !connection-bytes !connection-limit !connection-mark !connection-rate !connection-type !content disabled=no !dscp !dst-address \
    !dst-address-list !dst-address-type !dst-limit dst-port=44500 !fragment !hotspot !icmp-options !in-bridge-port !in-bridge-port-list !in-interface \
    !in-interface-list !ingress-priority !ipsec-policy !ipv4-options !layer7-protocol !limit log=no log-prefix="" !nth !out-bridge-port !out-bridge-port-list \
    !out-interface !out-interface-list !packet-mark !packet-size !per-connection-classifier !port !priority protocol=tcp !psd !random !routing-mark !routing-table \
    !src-address !src-address-list !src-address-type !src-mac-address !src-port !tcp-mss !time !tls-host to-addresses=192.168.188.5 to-ports=1194 !ttl
/ip firewall service-port
set ftp disabled=no ports=21
set tftp disabled=no ports=69
set irc disabled=no ports=6667
set h323 disabled=no
set sip disabled=no ports=5060,5061 sip-direct-media=yes sip-timeout=1h
set pptp disabled=no
set udplite disabled=no
set dccp disabled=no
set sctp disabled=no
/ip hotspot service-port
set ftp disabled=no ports=21
/ip hotspot user
set [ find default=yes ] comment="counters and limits for trial users" disabled=no name=default-trial
/ip ipsec policy
set 0 disabled=no dst-address=::/0 group=default proposal=default protocol=all src-address=::/0 template=yes
/ip ipsec settings
set accounting=yes interim-update=0s xauth-use-radius=no
/ip proxy
set always-from-cache=no anonymous=no cache-administrator=webmaster cache-hit-dscp=4 cache-on-disk=no cache-path=web-proxy enabled=no max-cache-object-size=2048KiB \
    max-cache-size=unlimited max-client-connections=600 max-fresh-time=3d max-server-connections=600 parent-proxy=:: parent-proxy-port=0 port=8080 \
    serialize-connections=no src-address=::
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=23
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=21
set www address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=26535
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=222
set www-ssl address="" certificate=none disabled=yes port=443
set api address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=8728
set winbox address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 disabled=no port=8291
set api-ssl address="" certificate=none disabled=yes port=8729
/ip smb
set allow-guests=yes comment=MikrotikSMB domain=MSHOME enabled=no interfaces=all
/ip smb shares
set [ find default=yes ] comment="default share" directory=/flash/pub disabled=no max-sessions=10 name=pub
/ip smb users
set [ find default=yes ] disabled=no name=guest password="" read-only=yes
/ip socks
set connection-idle-timeout=2m enabled=no max-connections=200 port=1080
/ip ssh
set allow-none-crypto=no always-allow-password-login=no forwarding-enabled=no host-key-size=2048 strong-crypto=no
/ip tftp settings
set max-block-size=4096
/ip traffic-flow
set active-flow-timeout=30m cache-entries=16k enabled=no inactive-flow-timeout=15s interfaces=all
/ip traffic-flow ipfix
set bytes=yes dst-address=yes dst-address-mask=yes dst-mac-address=yes dst-port=yes first-forwarded=yes gateway=yes icmp-code=yes icmp-type=yes igmp-type=yes \
    in-interface=yes ip-header-length=yes ip-total-length=yes ipv6-flow-label=yes is-multicast=yes last-forwarded=yes nat-dst-address=yes nat-dst-port=yes \
    nat-src-address=yes nat-src-port=yes out-interface=yes packets=yes protocol=yes src-address=yes src-address-mask=yes src-mac-address=yes src-port=yes \
    tcp-ack-num=yes tcp-flags=yes tcp-seq-num=yes tcp-window-size=yes tos=yes ttl=yes udp-length=yes
/ip upnp
set allow-disable-external-interface=no enabled=no show-dummy-rule=yes
/mpls
set dynamic-label-range=16-1048575 propagate-ttl=yes
/mpls interface
set [ find default=yes ] disabled=no interface=all mpls-mtu=1508
/mpls ldp
set distribute-for-default-route=no enabled=no hop-limit=255 loop-detect=no lsr-id=0.0.0.0 path-vector-limit=255 transport-address=0.0.0.0 use-explicit-null=no
/port firmware
set directory=firmware ignore-directip-modem=no
/ppp aaa
set accounting=yes interim-update=0s use-circuit-id-in-nas-port-id=no use-radius=no
/radius incoming
set accept=no port=3799
/routing bfd interface
set [ find default=yes ] disabled=no interface=all interval=0.2s min-rx=0.2s multiplier=5
/routing mme
set bidirectional-timeout=2 gateway-class=none gateway-keepalive=1m gateway-selection=no-gateway origination-interval=5s preferred-gateway=0.0.0.0 timeout=1m ttl=50
/routing rip
set distribute-default=never garbage-timer=2m metric-bgp=1 metric-connected=1 metric-default=1 metric-ospf=1 metric-static=1 redistribute-bgp=no \
    redistribute-connected=no redistribute-ospf=no redistribute-static=no routing-table=main timeout-timer=3m update-timer=30s
/snmp
set contact="" enabled=no engine-id="" location="" trap-community=public trap-generators=temp-exception trap-target="" trap-version=1
/system clock
set time-zone-autodetect=yes time-zone-name=Europe/Moscow
/system clock manual
set dst-delta=+00:00 dst-end="jan/01/1970 00:00:00" dst-start="jan/01/1970 00:00:00" time-zone=+00:00
/system identity
set name=MikroTik
/system leds
set 0 disabled=no interface=ether1 leds=led1 type=interface-activity
set 1 disabled=no interface=ether2 leds=led2 type=interface-activity
set 2 disabled=no interface=ether3 leds=led3 type=interface-activity
set 3 disabled=no interface=ether4 leds=led4 type=interface-activity
set 4 disabled=no interface=ether5 leds=led5 type=interface-activity
/system leds settings
set all-leds-off=never
/system logging
set 0 action=memory disabled=no prefix="" topics=info
set 1 action=memory disabled=no prefix="" topics=error
set 2 action=memory disabled=no prefix="" topics=warning
set 3 action=echo disabled=no prefix="" topics=critical
/system note
set note="" show-at-login=yes
/system ntp client
set enabled=no primary-ntp=0.0.0.0 secondary-ntp=0.0.0.0 server-dns-names=""
/system resource irq
set 0 cpu=auto
set 1 cpu=auto
set 2 cpu=auto
set 3 cpu=auto
/system routerboard settings
set auto-upgrade=no boot-device=nand-if-fail-then-ethernet boot-protocol=bootp force-backup-booter=no protected-routerboot=disabled reformat-hold-button=20s \
    reformat-hold-button-max=10m silent-boot=no
/system upgrade mirror
set check-interval=1d enabled=no primary-server=0.0.0.0 secondary-server=0.0.0.0 user=""
/system watchdog
set auto-send-supout=no automatic-supout=yes ping-start-after-boot=5m ping-timeout=1m watch-address=none watchdog-timer=yes
/tool bandwidth-server
set allocate-udp-ports-from=2000 authenticate=yes enabled=yes max-sessions=100
/tool e-mail
set address=0.0.0.0 from=<> password="" port=25 start-tls=no user=""
/tool graphing
set page-refresh=300 store-every=5min
/tool mac-server
set allowed-interface-list=LAN
/tool mac-server mac-winbox
set allowed-interface-list=LAN
/tool mac-server ping
set enabled=yes
/tool romon
set enabled=no id=00:00:00:00:00:00 secrets=""
/tool romon port
set [ find default=yes ] cost=100 disabled=no forbid=no interface=all secrets=""
/tool sms
set allowed-number="" auto-erase=no channel=0 port=none receive-enabled=no secret="" sim-pin=""
/tool sniffer
set file-limit=1000KiB file-name="" filter-cpu="" filter-direction=any filter-interface="" filter-ip-address="" filter-ip-protocol="" filter-ipv6-address="" \
    filter-mac-address="" filter-mac-protocol="" filter-operator-between-entries=or filter-port="" filter-stream=no memory-limit=100KiB memory-scroll=yes \
    only-headers=no streaming-enabled=no streaming-server=0.0.0.0
/tool traffic-generator
set latency-distribution-max=100us measure-out-of-order=yes stats-samples-to-keep=100 test-id=0
/user aaa
set accounting=yes default-group=read exclude-groups="" interim-update=0s use-radius=no
```

  </details>
</d> 

  
<d>
  <details>
    <summary> hap ac with ovpn server + lte </summary>
    
```bash
# may/26/2021 00:10:53 by RouterOS 6.45.9
# software id = EWEL-ZKSK
#
# model = RB952Ui-5ac2nD
# serial number = CC460CA43AE1
/interface lte
set [ find ] mac-address=AC:50:43:7F:EA:C9 name=lte1
/interface bridge
add disabled=yes fast-forward=no name=Bridge_OVPN
add admin-mac=48:8F:5A:E0:87:88 auto-mac=no comment=defconf name=bridge
/interface wireless
set [ find default-name=wlan1 ] band=2ghz-b/g/n channel-width=20/40mhz-XX disabled=no distance=indoors frequency=auto installation=indoor mode=ap-bridge ssid=MikroTik-E0878D \
    wireless-protocol=802.11
set [ find default-name=wlan2 ] band=5ghz-a/n/ac channel-width=20/40/80mhz-XXXX disabled=no distance=indoors frequency=auto installation=indoor mode=ap-bridge ssid=MikroTik-E0878C \
    wireless-protocol=802.11
/interface list
add comment=defconf name=WAN
add comment=defconf name=LAN
/interface wireless security-profiles
set [ find default=yes ] authentication-types=wpa2-psk eap-methods="" mode=dynamic-keys supplicant-identity=MikroTik wpa2-pre-shared-key=q1w2e3r4t5y6u7i8o9p0
/ip hotspot profile
set [ find default=yes ] html-directory=flash/hotspot
/ip pool
add name=pool_188 ranges=192.168.188.100-192.168.188.252
add name=OVPN_pool ranges=172.16.21.2-176.16.21.252
/ip dhcp-server
add address-pool=pool_188 disabled=no interface=bridge name=dchp_188
/ppp profile
add local-address=172.16.21.1 name=OVPN_profile_switch remote-address=OVPN_pool
/interface bridge port
add bridge=bridge comment=defconf interface=ether2
add bridge=bridge comment=defconf interface=ether3
add bridge=bridge comment=defconf interface=ether4
add bridge=bridge comment=defconf disabled=yes interface=ether5
add bridge=bridge comment=defconf interface=wlan1
add bridge=bridge comment=defconf interface=wlan2
/ip neighbor discovery-settings
set discover-interface-list=LAN
/interface list member
add comment=defconf interface=bridge list=LAN
add comment=defconf interface=ether1 list=WAN
add interface=lte1 list=WAN
add interface=ether5 list=LAN
/interface ovpn-server server
set auth=sha1 certificate=OVPN_server_cross_switch cipher=blowfish128,aes128,aes192,aes256 enabled=yes keepalive-timeout=disabled port=41194 require-client-certificate=yes
/ip address
add address=192.168.188.1/24 interface=bridge network=192.168.188.0
add address=192.168.230.1/24 interface=ether5 network=192.168.230.0
/ip dhcp-client
add comment=defconf dhcp-options=hostname,clientid disabled=no interface=ether1
/ip dhcp-server lease
add address=192.168.188.5 client-id=1:b8:69:f4:2a:97:6b mac-address=B8:69:F4:2A:97:6B server=dchp_188
/ip dhcp-server network
add address=192.168.188.0/24 gateway=192.168.188.1
/ip dns
set allow-remote-requests=yes servers=8.8.8.8
/ip dns static
add address=192.168.188.1 comment=defconf name=router.lan
/ip firewall filter
add action=accept chain=input comment="defconf: accept established,related,untracked" connection-state=established,related,untracked
add action=accept chain=input connection-state=new dst-port=41194 in-interface-list=WAN protocol=tcp
add action=drop chain=input comment="defconf: drop invalid" connection-state=invalid
add action=accept chain=input comment="defconf: accept ICMP" protocol=icmp
add action=accept chain=input comment="defconf: accept to local loopback (for CAPsMAN)" dst-address=127.0.0.1
add action=drop chain=input comment="defconf: drop all not coming from LAN" in-interface-list=!LAN
add action=accept chain=forward comment="defconf: accept in ipsec policy" ipsec-policy=in,ipsec
add action=accept chain=forward comment="defconf: accept out ipsec policy" ipsec-policy=out,ipsec
add action=fasttrack-connection chain=forward comment="defconf: fasttrack" connection-state=established,related
add action=accept chain=forward comment="defconf: accept established,related, untracked" connection-state=established,related,untracked
add action=drop chain=forward comment="defconf: drop invalid" connection-state=invalid
add action=drop chain=forward comment="defconf: drop all from WAN not DSTNATed" connection-nat-state=!dstnat connection-state=new in-interface-list=WAN
/ip firewall nat
add action=masquerade chain=srcnat comment="defconf: masquerade" ipsec-policy=out,none out-interface-list=WAN
add action=dst-nat chain=dstnat dst-port=44500 protocol=tcp to-addresses=192.168.188.5 to-ports=1194
/ip service
set telnet address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=223
set ftp address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=221
set www address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=26535
set ssh address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24 port=222
set api address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set winbox address=192.168.188.0/24,192.168.186.0/24,192.168.230.0/24,192.168.220.0/24
set api-ssl disabled=yes
/ppp secret
add name=ovpn_client1 password=1qaz2wsx3edc profile=OVPN_profile_switch service=ovpn
/system clock
set time-zone-autodetect=no time-zone-name=Europe/Moscow
/system ntp client
set enabled=yes primary-ntp=128.138.141.172 secondary-ntp=51.105.208.173
/tool mac-server
set allowed-interface-list=LAN
/tool mac-server mac-winbox
set allowed-interface-list=LAN
```
    
  </details>
</d>  

      
