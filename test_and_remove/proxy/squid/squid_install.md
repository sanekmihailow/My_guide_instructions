
### Use latest version in repo
```nginx
wget -qO - http://packages.diladele.com/diladele_pub.asc | sudo apt-key add -
echo "deb http://squid410.diladele.com/ubuntu/ bionic main" > /etc/apt/sources.list.d/diladele_squid-4_10.list
apt update
apt install squid-common squid squidclient
```
