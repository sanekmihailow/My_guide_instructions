<d>
  <details>
    <summary> links </summary>
    
[voxlink.ru](https://voxlink.ru/kb/voip-devices-configuration/ovpnclientmikrotik/)
    
[mikrotiklab.ru](https://mikrotiklab.ru/nastrojka/artga-openvpn.html) 
    
</details>
</d>

```java
/certificate add name=template-CA_root country="" state="" locality="" organization="" unit="" common-name="RBK_mikrot_OVPN-CA" key-size=4096 days-valid=36500 key-usage=crl-sign,key-cert-sign
/certificate sign template-CA_root ca-crl-host=127.0.0.1 name="OVPN-CA"  //#ca

/certificate add name=template-SRV_OVPN country="" state="" locality="" organization="" unit="" common-name="srv-OVPN" key-size=4096 days-valid=36500 key-usage=digital-signature,key-encipherment,tls-server
/certificate sign template-SRV_OVPN ca="OVPN-CA" name="srv-OVPN"         //# ovpn-server

/certificate add name=template-client country="" state="" locality="" organization="" unit="" common-name="client-ovpn-template" key-size=4096 days-valid=36500 key-usage=tls-client
/certificate add name=template-client-to-issue copy-from="template-client" common-name="rbk_client-1"
/certificate sign template-client-to-issue ca="OVPN-CA" name="rbk_client-1"  //# ovpn-client


/ip pool add name=OVPN_srv_pool ranges=192.168.120.2-192.168.120.254
/ppp profile add name=OVPN_server local-address=192.168.120.1 remote-address=OVPN_srv_pool
/ppp aaa set accounting=yes
/ppp secret add name=test-user-1 password=P@ssword1 service=ovpn profile=OVPN_server
/interface ovpn-server server set auth=sha1 cipher=blowfish128 default-profile=OVPN_server mode=ip netmask=24 require-client-certificate=yes certificate=srv-OVPN enabled=yes


/certificate export-certificate OVPN-CA export-passphrase=""
/certificate export-certificate rbk_client-1 export-passphrase=11111111
