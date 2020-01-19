
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
```
/etc/rspamd/local.d/worker-normal.inc
/etc/rspamd/local.d/worker-proxy.inc
/etc/rspamd/local.d/worker-controller.inc
/etc/rspamd/local.d/statistic.conf
/etc/rspamd/local.d/redis.conf
/etc/rspamd/local.d/dmarc.conf
/etc/rspamd/local.d/multimap.conf
/etc/rspamd/local.d/fann_redis.conf
/etc/rspamd/local.d/classifier-bayes.conf
/etc/rspamd/local.d/milter_headers.conf
```
* maps.d
* modules.d
* override.d - заменяют стандартные настройки
* scores.d

**/etc/rspamd/rspamd.conf** - основной файл
**etc/rspamd/filename.map** - файл с запрещенными расширениями атачей в письме
**etc/rspamd/rspamd.conf.local** - нужен для fann

```
# pidfile - это опция, указывающая расположение PID файла
# .include - это подключение доп. файлов конфигурации
# .include(try=true; priority=1,duplicate=merge) "$LOCAL_CONFDIR/local.d/options.inc" в данном случае если мы хотим добавить новые директивы в секцию options, то мы должны написать их в нашем пользовательском файле /etc/rspamd/local.d/options.inc priority=1 - указывает приоритет файла
# duplicate=merge - указывает режим слияния
# Если же мы хотим заменить некоторые стандартные настройки, в частности те, что устанавливаются их файла /etc/rspamd/options.inc, то мы должны описать их в файле /etc/rspamd/override.d/options.inc


```
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
```


У Rspamd есть интерфейс cli для управления — rspamc

rspamadm configtest

