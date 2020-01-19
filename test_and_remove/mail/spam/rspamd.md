
# Install

```bash
#REDIS
add-apt-repository ppa:chris-lea/redis-server
apt update
apt install redis-server

#RSPAMD
apt install -y lsb-release wget # optional
CODENAME=$(lsb_release -c -s)
wget -O- https://rspamd.com/apt-stable/gpg.key | apt-key add -
echo "deb [arch=amd64] http://rspamd.com/apt-stable/ $CODENAME main" > /etc/apt/sources.list.d/rspamd.list
echo "deb-src [arch=amd64] http://rspamd.com/apt-stable/ $CODENAME main" >> /etc/apt/sources.list.d/rspamd.list
apt update
apt-get --no-install-recommends install rspamd
```


