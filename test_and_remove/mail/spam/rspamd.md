
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
rspamadm configwizard 
```
<details>
  
```
root@mail:/etc/postfix# rspamadm configwizard
  ____                                     _
 |  _ \  ___  _ __    __ _  _ __ ___    __| |
 | |_) |/ __|| '_ \  / _` || '_ ` _ \  / _` |
 |  _ < \__ \| |_) || (_| || | | | | || (_| |
 |_| \_\|___/| .__/  \__,_||_| |_| |_| \__,_|
             |_|
 
 
Welcome to the configuration tool
We use /etc/rspamd/rspamd.conf configuration file, writing results to /etc/rspamd
Modules enabled: mime_types, hfilter, phishing, dkim_signing, asn, settings, regexp, arc, trie, bayes_expiry, rspamd_update, rbl, ip_score, metadata_exporter, elastic, fuzzy_check, mid, multimap, chartable, surbl, dkim, maillist, once_received, emails, dmarc, forged_recipients, milter_headers, whitelist, force_actions, spf
Modules disabled (explicitly): spamtrap, url_tags, mx_check, url_reputation
Modules disabled (unconfigured): spamassassin, reputation, metric_exporter, dynamic_conf, antivirus, fuzzy_collect, dcc, maps_stats, clickhouse
Modules disabled (no Redis): greylist, url_redirector, replies, neural, ratelimit, history_redis
Modules disabled (experimental):
Modules disabled (failed):
Do you wish to continue?[Y/n]: y
Setup WebUI and controller worker:
Controller password is not set, do you want to set one?[Y/n]: n
Redis servers are not set:
The following modules will be enabled if you add Redis servers:
* greylist
* url_redirector
* replies
* neural
* ratelimit
* history_redis
Do you wish to set Redis servers?[Y/n]: y
Input read only servers separated by `,` [default: localhost]:
Input write only servers separated by `,` [default: localhost]:
Do you have any password set for your Redis?[y/N]:
Do you have any specific database for your Redis?[y/N]:
Do you want to setup dkim signing feature?[y/N]: y
Enter output directory for the keys [default: /var/lib/rspamd/dkim/]:
Enter domain to sign: domain1.ru
Enter selector [default: dkim]:
Do you want to create privkey /var/lib/rspamd/dkim/domain1.ru.dkim.key[Y/n]:
To make dkim signing working, you need to place the following record in your DNS zone:
dkim._domainkey IN TXT ( "v=DKIM1; k=rsa; "
"p=MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDHoXvfq8caMJdEMmCpDqw0ghmw5eCvT9bIpnyaUeCWfCXoyPJTg2KtMfNEgybOernM+nDFugemVziOJOawAA/R/dfHtTGVaqlbmOuwKdoNHfyI4DLrsp6a6ZnWRw6GGj2/Di0wI1F32+dAlOwIDAQAB" ) ;
 
Do you wish to add another DKIM domain?[y/N]:n

You have 1 sqlite classifiers
Expire time for new tokens [100d]:
Reset previous data?[y/N]: y~
Do you wish to convert them to Redis?[Y/n]: y
Convert spam tokens

Convert ham tokens
 
Migrated 0 tokens for 2 users for symbols (BAYES_SPAM, BAYES_HAM)
Converted classifier to the from sqlite to redis
File: /etc/rspamd/local.d/classifier-bayes.conf, changes list:
backend => redis
new_schema => true
expire => 8640000
 
File: /etc/rspamd/local.d/redis.conf, changes list:
write_servers => localhost
read_servers => localhost
 
File: /etc/rspamd/local.d/dkim_signing.conf, changes list:
domain => {[domain1.ru] = {[selector] = dkim, [privkey] = /var/lib/rspamd/dkim/domain1.ru.dkim.key}}
 
Apply changes?[Y/n]: y
Create file /etc/rspamd/local.d/classifier-bayes.conf
Create file /etc/rspamd/local.d/redis.conf
Create file /etc/rspamd/local.d/dkim_signing.conf
3 changes applied, the wizard is finished now
*** Please reload the Rspamd configuration ***
```
</details>

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

# CONFIGURE
* /etc/rspamd/local.d/classifier-bayes.conf
```
backend => redis
new_schema => true
expire => 8640000
```
* /etc/rspamd/local.d/redis.conf
```
write_servers = "localhost";
read_servers = "localhost";
```
* /etc/rspamd/local.d/dkim_signing.conf
```
domain {
    example.com {
        selector = "dkim";
        path = "/var/lib/rspamd/dkim/example.com.dkim.key";
    }
}
allow_hdrfrom_mismatch = true;
allow_hdrfrom_mismatch_sign_networks = true;
allow_username_mismatch = true;
use_domain = "header";
auth_only = true;
use_esld = true;
```
