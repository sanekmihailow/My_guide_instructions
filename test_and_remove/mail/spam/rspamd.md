
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

# DETAILS
#### /etc/rspamd
* local.d - для файлов пользовательских настроек, которые добавляют новые настройки к существующей конфигурации
* maps.d
* modules.d
* override.d - заменяют стандартные настройки
* scores.d

**/etc/rspamd**


```
/etc/rspamd/local.d/dkim_signing.conf
/etc/rspamd/dkim_selectors.map
/etc/rspamd/dkim_paths.map
/var/lib/rspamd/dkim/domain.eu.mail.key
/etc/rspamd/rspamd.conf


/etc/rspamd/local.d/multimap.conf
/etc/rspamd/local.d/regex_block.map
/etc/rspamd/local.d/ip_whitelist.map
/etc/rspamd/local.d/whitelist.sender.domain.map






