# Ubuntu 16


##### 1) easy rsa
```nginx
apt install openvpn openssl easy-rsa iptables
mkdir /etc/openvpn/easy-rsa
cp  -r /usr/share/easy-rsa/* /etc/openvpn/easy-rsa/
vim /etc/openvpn/easy-rsa/vars
     -> "export KEY_country ....." change value
```
##### 2) create server and user key
```nginx
source ./vars && ./clean-all            #clean-all cleaned all files in folder keys
./build-ca
./build-key-server Serv
./build-key user1
./build-dh
openvpn --genkey --secret keys/ta.key
```
##### 3) create user folder and copy (server, user) key
```nginx
cd keys
mkdir -p /etc/openvpn/ccd/user1
cp Serv.crt Serv.key ca.crt dh2048.pem ta.key /etc/openvpn
cp user1.crt user1.key ca.crt ta.key /etc/openvpn/ccd/user1/
```
if you want use on client all in one config file add in you user.conf 

```
key-direction 1
```
and  use this script
<details>
     
```bash
#!/bin/bash
echo -e "\n \033[0;32m please enter the path to files\n \033[0m"
read thepath &&

echo -e "\n \033[0;32m please enter the name user\n \033[0m"
read conf &&

sed -i '$ a \\n\n<tls-auth>' $thepath/$conf.conf || echo "\n tls-err"
cat $thepath/ta.key >> $thepath/$conf.conf || echo "\n tls-err"
sed -i '$ a </tls-auth>' $thepath/$conf.conf || echo "\n tls-err"

sleep 1
sed -i '$ a \\n\n<ca>' $thepath/$conf.conf || echo "\n ca-err"
cat $thepath/ca.crt >> $thepath/$conf.conf || echo "\n ca-err"
sed -i '$ a </ca>' $thepath/$conf.conf || echo "\n ca-err"

sleep 1
sed -i '$ a \\n\n<cert>' $thepath/$conf.conf || echo "\n cert-err"
cat $thepath/$conf.crt >> $thepath/$conf.conf || echo "\n cert-err"
sed -i '$ a </cert>' $thepath/$conf.conf || echo "\n cert-err"

sleep 1
sed -i '$ a \\n\n<key>' $thepath/$conf.conf || echo "\n key-err"
cat $thepath/$conf.key >> $thepath/$conf.conf || echo "\n key-err"
sed -i '$ a </key>' $thepath/$conf.conf || echo "\n key-err"

mv $thepath/$conf.conf $thepath/$conf.ovpn || echo "\n mv-err"

echo -e "\n \033one-cert OK \n \033[0ma"

exit 0
```
</details>

##### 4) create server and user conf
```nginx
vim /etc/openvpn/Serv.conf
vim /etc/openvpn/ccd/user1/user1.conf
service openvpn restart
#openvpn --config Serv.conf (start specify directly config)    
#netstat -npl
```
##### 5) edit kernel sets for nat
```nginx
vim /etc/sysctl.conf
       -> uncomment net_ipv4.ip_forward=1
echo 1 >> /proc/sys/net/ipv4/conf/all/forwarding
iptables -t nat -A POSTROUTING -s 192.168.1.0/24 -o eth0 -j MASQUERADE
iptables-save > /etc/iptables-rules
vim /etc/network/interfaces
        |at the END add:
                     -> pre-up iptables-restore < /etc/iptables-rules
reboot
```
