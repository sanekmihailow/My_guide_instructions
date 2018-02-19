# Ubuntu 16

##### 1) easy rsa
```nginx
mkdir /etc/openvpn/easy-rsa
cp  -r /usr/share/easy-rsa/* /etc/openvpn/easy-rsa/
vim /etc/openvpn/easy-rsa/vars
     -> "export KEY" change value
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
       -> uncomment net_ipv4_forward=1
echo 1 >> /proc/sys/net/ipv4/conf/all/forwarding
iptables -t nat -A POSTROUTING -s 192.168.1.0/24 -o eth0 -j MASQUERADE
iptables-save > /etc/iptables/iptables-rules
vim /etc/network/interfaces
        |at the END add:
                     -> pre-up iptables-restore < /etc/iptables/iptables-rules
reboot
```
