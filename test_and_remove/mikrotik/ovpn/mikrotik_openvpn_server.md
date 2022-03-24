```java
/certificate add name=template-CA_root country="" state="" locality="" organization="" unit="" common-name="RBK_mikrot_OVPN-CA" key-size=4096 days-valid=36500 key-usage=crl-sign,key-cert-sign
/certificate sign template-CA_root ca-crl-host=127.0.0.1 name="OVPN-CA"  //#ca

/certificate add name=template-SRV_OVPN country="" state="" locality="" organization="" unit="" common-name="srv-OVPN" key-size=36500 days-valid=1095 key-usage=digital-signature,key-encipherment,tls-server
/certificate sign template-SRV_OVPN ca="OVPN-CA" name="srv-OVPN"         //# ovpn-server

/certificate add name=template-client country="" state="" locality="" organization="" unit="" common-name="client-ovpn-template" key-size=4096 days-valid=36500 key-usage=tls-client
/certificate add name=template-client-to-issue copy-from="template-client" common-name="rbk_client-1" //# ovpn-client
/certificate sign template-CL-to-issue ca="OVPN-CA" name="rbk_client-1"  //# ovpn-client
