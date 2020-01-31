<d>
 <details>
   <summary> asterisk 13 + vtigercrm7 </summary>

<details>
   <summary> install </summary>

```nginx
apt install software-properties-common apache2 curl asterisk lame
add-apt-repository ppa:ondrej/php
apt install libapache2-mod-php7.2 mysql-client-5.7 mysql-client-core-5.7 mysql-server-5.7 mysql-server-core-5.7 mysql-utilities mysql-common libmysqlclient-dev\ 
php7.2-bcmath php7.2-common php7.2-bz2 php7.2-cgi php7.2-cli php7.2-curl php7.2-gd php7.2-imap php7.2-json php7.2-mbstring php-mysql php7.2-opcache php7.2-readline php7.2-zip php7.2-xml php7.2-dev\ 
fail2ban sngrep openjdk-8-jdk
```

     # при установке обязательно в каталоге vtigercrm
```    
wget https://sourceforge.net/projects/salesplatform/files/salesplatform-vtigercrm-7.1.0-201803.tar.gz
wget https://sourceforge.net/projects/salesplatform/files/addons/SPAsteriskConnector-1.4.2.zip
wget https://downloads.sourceforge.net/project/salesplatform/patches/7.1.0-201803/salesplatform-vtiger-sp-710201803-01.tar.gz?r=https%3A%2F%2Fsourceforge.net%2Fprojects%2Fsalesplatform%2Ffiles%2Fpatches%2F7.1.0-201803%2Fsalesplatform-vtiger-sp-710201803-01.tar.gz
```
```
cd /var/www/data
tar -xzvf salesplatform-vtigercrm-7.1.0-201803.tar.gz
mkdir SPAsteriskConnector
mkdir records
unzip SPAsteriskConnector-1.4.2.zip -d SPAsteriskConnector/
cd vtigercrm
chown -R www-data:www-data *
a2enmod php7.2
a2enmod rewrite
a2enmod expires
a2enmod eheaders
a2enmod headers
a2enmod include
service apache2 restart
vim /etc/php/7.2/apache2/php.ini
localedef -i ru_RU -f CP1251 CP1251
localedef -i ru_RU -f UTF-8 UTF-8 
localedef -i ru_RU -f ISO-8859-1 ISO-8859-1
localedef -i rn_US -f ISO-8859-1 ISO-8859-1
localedef -i en_US -f ISO-8859-1 ISO-8859-1
service mysql restart
# create database vtigercrm and user
# web install vtigercrm
     # установка исправлений
patch --dry-run -p 1 < salesplatform-vtiger-sp-710201803-01.patch
patch -p 1 < salesplatform-vtiger-sp-710201803-01.patch
mysql -u vtiger -p vtigercrm < salesplatform-vtiger-sp-710201803-01.sql
```

##### отключаем модуль Телефония (Интеграция с облачными АТС) и подключаем модуль Звонки
```
find . -type f -exec chmod 0644 {} \;
find . -type d -exec chmod 0755 {} \;
chmod +x /cron/vtigercron.sh
sudo -u www-data crontab -e
        |-> */5 * * * * www-data /usr/bin/flock -n /tmp/vtigercron.lock /var/www/vtigercrm/public_html/cron/vtigercron.sh
sudo -u www-data -s /bin/sh -c '/var/www/vtigercrm/SPAsteriskConnector/bin/start.sh'

```

</details>

<details>
  <summary> conf </summary>

  <details>
     <summary> php7.2/apache/php.ini </summary>

```bash
[PHP]                                                                                                                                                                                         
engine = On                                                                                                                                                                                   
short_open_tag = On                                                                                                                                                                           
precision = 14                                                                                                                                                                                
output_buffering = 4096                                                                                                                                                                       
zlib.output_compression = Off                                                                                                                                                                 
implicit_flush = Off                                                                                                                                                                          
unserialize_callback_func =                                                                                                                                                                   
serialize_precision = -1                                                                                                                                                                      
disable_functions = pcntl_alarm,pcntl_fork,pcntl_waitpid,pcntl_wait,pcntl_wifexited,pcntl_wifstopped,pcntl_wifsignaled,pcntl_wifcontinued,pcntl_wexitstatus,pcntl_wtermsig,pcntl_wstopsig,pcn$
l_signal,pcntl_signal_get_handler,pcntl_signal_dispatch,pcntl_get_last_error,pcntl_strerror,pcntl_sigprocmask,pcntl_sigwaitinfo,pcntl_sigtimedwait,pcntl_exec,pcntl_getpriority,pcntl_setprio$
ity,pcntl_async_signals,                                                                                                                                                                      
disable_classes =                                                                                                                                                                             
zend.enable_gc = On                                                                                                                                                                           
expose_php = Off                                                                                                                                                                              
max_execution_time = 600                                                                                                                                                                      
max_input_time = 60                                                                                                                                                                           
 max_input_vars = 100000                                                                                                                                                                      
memory_limit = 512M                                                                                                                                                                           
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE                                                                                                                               
display_errors = Off                                                                                                                                                                          
display_startup_errors = Off                                                                                                                                                                  
log_errors = On                                                                                                                                                                               
log_errors_max_len = 1024                                                                                                                                                                     
ignore_repeated_errors = Off                                                                                                                                                                  
ignore_repeated_source = Off                                                                                                                                                                  
report_memleaks = On                                                                                                                                                                          
html_errors = On                                                                                                                                                                              
variables_order = "GPCS"                                                                                                                                                                      
request_order = "GP"
register_argc_argv = Off
auto_globals_jit = On
post_max_size = 100M
auto_prepend_file =
auto_append_file =
default_mimetype = "text/html"
default_charset = "UTF-8"
doc_root =
user_dir =
enable_dl = Off
file_uploads = On                                                                                                                                                                             
upload_max_filesize = 100M                                                                                                                                                                    
max_file_uploads = 20
allow_url_fopen = On
allow_url_include = Off
default_socket_timeout = 60
[CLI Server]
cli_server.color = On
[Date]
date.timezone = Europe/Moscow
[filter]
[iconv]
[imap]
[intl]
[sqlite3]
[Pcre]
[Pdo]
[Pdo_mysql]
pdo_mysql.cache_size = 2000
pdo_mysql.default_socket=
[Phar]
[mail function]
SMTP = localhost
smtp_port = 25
mail.add_x_header = Off
[ODBC]
odbc.allow_persistent = On
odbc.check_persistent = On
odbc.max_persistent = -1
odbc.max_links = -1
odbc.defaultlrl = 4096
odbc.defaultbinmode = 1
[Interbase]
ibase.allow_persistent = 1                                                                                                                                                                    
ibase.max_persistent = -1
ibase.max_links = -1
ibase.timestampformat = "%Y-%m-%d %H:%M:%S"
ibase.dateformat = "%Y-%m-%d"
ibase.timeformat = "%H:%M:%S"
[MySQLi]
mysqli.max_persistent = -1
mysqli.allow_persistent = On
mysqli.max_links = -1
mysqli.cache_size = 2000
mysqli.default_port = 3306
mysqli.default_socket =
mysqli.default_host =
mysqli.default_user =
mysqli.default_pw =
mysqli.reconnect = Off
[mysqlnd]
mysqlnd.collect_statistics = On
mysqlnd.collect_memory_statistics = Off
[OCI8]
[PostgreSQL]
pgsql.allow_persistent = On
pgsql.auto_reset_persistent = Off
pgsql.max_persistent = -1
pgsql.max_links = -1
pgsql.ignore_notice = 0
pgsql.log_notice = 0
[bcmath]
bcmath.scale = 0
[browscap]
[Session]
session.save_handler = files
session.use_strict_mode = 0
session.use_cookies = 1
session.use_only_cookies = 1
session.name = PHPSESSID
session.auto_start = 0
session.cookie_lifetime = 0
session.cookie_path = /
session.cookie_domain =
session.cookie_httponly =
session.serialize_handler = php
session.gc_probability = 0
session.gc_divisor = 1000
session.gc_maxlifetime = 1440
session.referer_check =
session.cache_limiter = nocache
session.cache_expire = 180
session.use_trans_sid = 0
session.sid_length = 26
session.trans_sid_tags = "a=href,area=href,frame=src,form="
session.sid_bits_per_character = 5
[Assertion]
zend.assertions = -1
[COM]
[mbstring]
[gd]
[exif]
[Tidy]
tidy.clean_output = Off
[soap]
soap.wsdl_cache_enabled=1
soap.wsdl_cache_dir="/tmp"
soap.wsdl_cache_ttl=86400
soap.wsdl_cache_limit = 5
[sysvshm]
[ldap]
ldap.max_links = -1
[dba]
[opcache]
[curl]
[openssl]
safe_mode = off
```

 </details>

 <details>
   <summary> SPAsteriskConnector/conf/SPVtigerAsteriskConnector.properties </summary>

```bash
ServerIP   = 127.0.0.1
ServerPort = 5000
AsteriskAppDBPath = /var/www/vtigercrm/SPAsteriskConnector/db

AsteriskServerIP   = 127.0.0.1
AsteriskServerPort = 5038
AsteriskUsername   = usernamefrommanager
AsteriskPassword   = passfrommanager

VtigerURL = http://ipaddr_vtigercrm
VtigerSecretKey = seceretkey_from_vtigercrm_звонки
CheckKeyOnListenRequest=true
LookUpVariablesNames=
DefaultOriginateChannelProtocol = SIP
```

 </details>

 <details>
    <summary> /etc/asterisk/cdr.conf </summary>

```bash
[general]
enable=yes
[csv]
usegmtime=yes    ; log date/time in GMT.  Default is "no"
loguniqueid=yes  ; log uniqueid.  Default is "no"
loguserfield=yes ; log user field.  Default is "no"
accountlogs=yes  ; create separate log file for each account code. Default is "yes"
                   ; Default is "no".
```
 
 </details>

 <details>
    <summary> /etc/asterisk/cdr_manager.conf </summary>

```bash
[general]
enabled = yes
[mappings]
recordingpath => recordingpath

```

 </details>

 <details>
    <summary> /etc/asterisk/manager.conf </summary>

```bash
[general]
enabled = yes
port = 5038
bindaddr = 127.0.0.1
#include "manager.d/*.conf" 
displayconnects=yes 
[usernamefrommanager]
secret=passfrommanager
deny=0.0.0.0/0.0.0.0
permit = 127.0.0.1/255.255.255.0
read = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate
write = system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate
writetimeout = 5000
```

 </details>

 <details>
   <summary> /etc/asterisk/modules.conf </summary>

```bash
[modules]
autoload=yes
noload => pbx_gtkconsole.so
noload => pbx_kdeconsole.so
noload => app_intercom.so
noload => chan_modem.so
noload => chan_modem_aopen.so
noload => chan_modem_bestdata.so
noload => chan_modem_i4l.so
noload => chan_capi.so
load => res_musiconhold.so
noload => chan_alsa.so
noload => cdr_sqlite.so
noload => app_directory_odbc.so
noload => res_config_odbc.so
noload => res_config_pgsql.so
[global]
```

 </details>

 <details>
    <summary> /etc/asterisk/sip.conf </summary>

```bash
[general]                                                                                                                                                                                
register=>79XXXXXXX75@multifon.ru:qwerty:79XXXXXXX75@sbc.megafon.ru:5060/215                                                        
                                                                                                                                                                                                                              
context=default                                                                                                                        
language=ru                                                                                                                            
qualify=yes                                                                                                                            
nat=no                                                                                                                                 
encryption=yes                                                                                                                         
avpf=yes                                                                                                                               
maxcallbitrate=384                                                                                                                     
disallow=all                                                                                                                           
allow=alaw,ulaw,g729 ;vp8,h264,h263p,mpeg4                                                                                             
faxdetect=no                                                                                                                           
srvlookup=no                                                                                                                           
alwaysauthreject=yes                                                                                                                   
allowsubscribe=no                                                                                                                      
allowguest=no                                                                                                                          
allowoverlap=no                                                                                                                        
notifyringin=yes                                                                                                                       
limitonpeer=yes                                                                                                                        
notifyhold=yes                                                                                                                         
defaultexpiry=360                                                                                                                      
canreinvite=no                                                                                                                         
rtpkeepalive=10

[authentication]

[trunk-zadarma-num]                                                                                                                                                                                                                                   
host=sip.zadarma.com                                                                                                                   
insecure=invite,port                                                                                                                   
type=friend                                                                                                                            
fromdomain=sip.zadarma.com                                                                                                             
disallow=all                                                                                                                           
allow=alaw                                                                                                                             
allow=ulaw                                                                                                                             
dtmfmode=auto                                                                                                                          
secret=qwwerty                                                                                                                      
defaultuser=XXXXX                                                                                                                    
trunkname=XXXXXXX                                                                                                                       
fromuser=XXXXXX                                                                                                                        
callbackextension=XXXXXXXX                                                                                                              
context=call-in                                                                                                                        
qualify=400                                                                                                                            
directmedia=no                                                                                                                         
nat=force_rport,comedia                                                                                                                
allowsubscribe=yes  

[multifon-megafon]                                                                                           
dtmfmode=inband                                                                                                                        
username=79XXXXXXX75                                                                                                                   
type=peer                                                                                                                              
secret=qwerty                                                                                                                       
host=sbc.megafon.ru                                                                                                                    
fromuser=79XXXXXXX75                                                                                                                   
fromdomain=multifon.ru                                                                                                                 
port=5060                                                                                                                              
nat=yes                                                                                                                                
t38pt_udptl=yes,redundancy,maxdatagram=200                                                                                             
context=call-in                                                                                                                        
insecure=port,invite                                                                                                                   
disallow=all                                                                                                                           
allow=alaw                                                                                                                             
dtmfmode=rfc2833  

[def](!)                                                                                                                               
type=friend                                                                                                                            
context=call-out                                                                                                                       
secret=qwerty123                                                                                                                 
host=dynamic                                                                                                                           
nat=force_rport,comedia                                                                                                                
qualify=yes                                                                                                                            
canreinvite=no                                                                                                                         
callgroup=1                                                                                                                            
pickupgroup=1                                                                                                                          
call-limit=1                                                                                                                           
dtmfmode=auto                                                                                                                          
allowsubscribe=yes                                                                                                                     
disallow=all                                                                                                                           
allow=alaw                                                                                                                             
allow=ulaw                                                                                                                             
allow=g729                                                                                                                             
allow=g723                                                                                                                             
allow=g722

[200](def)                                                                                                                             
callerid="Number 300" <300>                                                                                                            
                                                                                                                                       
[201](def)                                                                                                                             
callerid="Number 301" <301>                                                                                                            
                                                                                                                                       
[202](def)                                                                                                                             
callerid="Number 302" <302>
```

 </details>

 <details>
    <summary> /etc/asterisk/extensions.conf </summary>

```bash
[general]                                                                                                                              
;static=yes                                                                                                                            
;writeprotect=no                                                                                                                       
autofallthrough=yes                                                                                                                    
                                                                                                                                       
[globals]                                                                                                                              
[default]                                                                                                                              
exten => _X.,1,Hangup()                                                                                                                
;exten => _X!,1,HangUp()                                                                                                               
                                                                                                                                       
; ---- Исходящие(outbound call) звонки                                                                                                 
[call-out]                                                                                                                             
include => phones-local                                                                                                                
include => phones-out                                                                                                                  
                                                                                                                                       
; ---- Входящие(inbound call) звонки                                                                                                   
[call-in]                                                                                                                              
include => phones-in                                                                                                                   
;include => phones-local ;вроде не нужно


; -- Исходящий Звонок на внутренний номер (Outbound call for local users(numbers) )                                                    
[phones-local]                                                                                                                         
exten => _2XX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.${EXTEN})                               
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/${EXTEN},10)                                                                                                    
    same => n,Background(abonent-zanyat)                                                                                               
    same => n,Hangup()                                                                                                                 
                                                                                                                                       
; -- Исходящий Звонок на внешний номер (Outbount call throught trunk)                                                                  
[phones-out]                                                                                                                           
;mobile_start                                                                                                                          
exten => _+7XXXXXXXXXX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.${EXTEN})                      
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/${EXTEN}@trunk-zadarma-num)                                                                                     
    same => n,Hangup()                                                                                                                 
                                                                                                                                                                                                                                                                        
exten => _[7-8]XXXXXXXXXX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.+7${EXTEN:1})               
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/+7${EXTEN:1}@trunk-zadarma-num)                                                                                 
    same => n,Hangup()                                                                                                                 
;mobile_end       

;city_start                                                                                                                            
exten => _+78352XXXXXX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.${EXTEN})                      
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/${EXTEN}@trunk-zadarma-num)                                                                                     
    same => n,Hangup()                                                                                                                 
                                                                                                                                       
exten => _[7-8]8352XXXXXX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.+7${EXTEN:1})               
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/+7${EXTEN:1}@trunk-zadarma-num)                                                                                 
    same => n,Hangup()                                                                                                                 
                                                                                                                                       
exten => _XXXXXX,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.+78352${EXTEN})                      
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/+78352${EXTEN}@trunk-zadarma-num)                                                                               
    same => n,Hangup()                                                                                                                 
;city_end

; -- Входящий звонок на внешний номер                                                                                                  
; -- Inbound call throught trunk                                                                                                       
[phones-in]
exten => 215,1,Set(filename=${STRFTIME(${EPOCH},,%Y.%m.%d_%H-%M)}_From.${CALLERID(number)}_To.${EXTEN})                                
    same => n,MixMonitor(/var/www/vtigercrm/records/${filename}.wav)                                                                   
    same => n,Set(CDR(recordingpath)=/var/www/vtigercrm/records/${filename}.wav)                                                       
    same => n,Dial(SIP/200,60)                                                                                                                                                                                                                 
    same => n,Dial(SIP/202,60)                                                                                                                                                                                                           
    same => n,Hangup()
```

 </details>

</details>

<details>
    <summary> Permissions </summary>

```bash

[/var/www/vtigercrm]
drwxr-xr-x 23 www-data www-data     4096 Jun 26 11:29 vtigercrm

[/var/www/records]
drwxrwxr-x  2 asterisk asterisk    12288 Jul  1 09:52 records

[/var/www/SPAsteriskConnector]
drwxr-xr-x  8 www-data www-data     4096 Jun 26 08:52 SPAsteriskConnector
```

</details>

<details>
   <summary> ps -aux </summary>

```bash
www-data  1059  0.1  6.8 2695772 68656 ?       Sl   Jun26   8:00 java -cp ../source/classes:../libs/* spasteriskconnector.SPAsteriskConnector

asterisk   487  0.8  3.1 2220688 32084 ?       Ssl  Jun26  61:13 /usr/sbin/asterisk -g -f -U asterisk
```

</details>
</d>


