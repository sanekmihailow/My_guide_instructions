### links

[https://hub.docker.com/r/antirek/asterisk-lua/~/dockerfile/](https://hub.docker.com/r/antirek/asterisk-lua/~/dockerfile/)

[https://goo.gl/vADGnT](https://goo.gl/vADGnT)

[https://goo.gl/yxpSbF](https://goo.gl/yxpSbF)


# Install src

### 0) add swap if not exit
```
fallocate -l 1G /swapfile
sudo chmod 600 /swapfile
sudo mkswap /swapfile
sudo swapon /swapfile
vim /etc/fstab
       |-> add
            /swapfile none swap sw 0 0
```

### 1) install headers and reqeries

```bash
apt install -y build-essential linux-headers-`uname -r` openssh-server apache2 mysql-server\
 mysql-client bison flex sox libncurses5-dev libssl-dev libmysqlclient-dev mpg123 libxml2-dev\
 libnewt-dev sqlite3 libsqlite3-dev pkg-config automake libtool autoconf git subversion unixodbc-dev\
 uuid uuid-dev libasound2-dev libogg-dev libvorbis-dev libcurl4-openssl-dev libical-dev libneon27-dev\
 libsrtp0-dev libspandsp-dev libopus-dev opus-tools libiksemel-dev libiksemel-utils libiksemel3 xmlstarlet curl
 ```
 
 ```bash
apt install -y software-properties-common python-software-properties
add-apt-repository ppa:ondrej/php
apt  update -y
apt install -y php5.6 php5.6-curl php5.6-cli php5.6-mysql php5.6-odbc php5.6-db php5.6-gd php5.6-xml libapache2-mod-php5.6
apt install -y php-pear
```

### 2) activate php5.6

```
a2dismod php7.0
a2enmod php5.6
systemctl restart apache2
update-alternatives --set php /usr/bin/php5.6
reboot # not necessary
a2enmod rewrite
service apache2 restart
pear install Console_Getopt
```
### 3) Create dir (not neccesary) and download requeries

```bash
cd /usr/local/INSTALL/src/asterisk
wget https://dev.mysql.com/get/Downloads/Connector-ODBC/5.3/mysql-connector-odbc-5.3.9-linux-ubuntu16.04-x86-64bit.tar.gz
wget http://sourceforge.net/projects/lame/files/lame/3.98.4/lame-3.98.4.tar.gz
wget http://downloads.asterisk.org/pub/telephony/dahdi-linux-complete/dahdi-linux-complete-current.tar.gz
wget http://downloads.asterisk.org/pub/telephony/libpri/libpri-current.tar.gz
git clone https://github.com/akheron/jansson.git
wget http://www.pjsip.org/release/2.5.5/pjproject-2.5.5.tar.bz2
wget http://downloads.asterisk.org/pub/telephony/asterisk/asterisk-13-current.tar.gz
```
### 4) make and install requeries

```
pathtoloc='/usr/local/MY_LOCAL/InstalleD/forAsterisk'
``` 
##### lame
```
./configure --prefix=$pathtoloc/lame-3.98.4
make
make install
```

##### dahdi
```
./configure --prefix=$pathtoloc/dahdi-2.11.1 
# хз работает ли префикс
make
make install
make config
```
if you have error after `atoconf -f -i` (error configure.ac:15: error: possibly undefined macro: AM_INIT_AUTOMAKE ....)  
 then use `autoreconf -fvi` and `./configure`

##### pipproject
```
CFLAGS='-DPJ_HAS_IPV6=1' ./configure --prefix=$pathtoloc/pipproject-2.5.5 --enable-shared --disable-sound --disable-resample --disable-video --disable-opencore-amr
make dep
make
make install
```

##### janson
```
autoreconf -i
./configure --prefix=$pathtoloc/jansson-git
make
make install
```

##### asterisk13.27
```ruby
./configure --prefix=$pathtoloc/asterisk-13.27 --with-pjproject-bundled --with-crypto --with-ssl=ssl --with-srtp --with-jansson-bundled
make menuselect.makeopts
#make menuselect

#menuselect/menuselect --list-options
#menuselect/menuselect --category-list

menuselect/menuselect --enable CORE-SOUNDS-EN-GSM \
--enable MOH-OPSOUND-WAV \
--enable EXTRA-SOUNDS-EN-GSM \
--enable cdr_mysql \
--enable app_mysql \
--enable app_setcallerid \
--enable func_audiohookinherit \
--enable CORE-SOUNDS-EN-G729 \
--enable CORE-SOUNDS-RU-G729 \
--enable codec_g729a \
--enable codec_dahdi \
--enable format_g729 \
--enable func_dialplan \
--enable func_dialgroup \
--enable app_dial \
--enable format_mp3 \
--enable res_config_mysql
menuselect.makeopts

make
make install
make config
make samples
ldconfig -v
```

> if asteerisk not start then use
```
asterisk -vvvvvvc
```

> /etc/asterisk/asterisk.conf
```
    |-> delete (!)
```

> /etc/init.d/asterisk
```
    |-> uncomment or add
                  AST_USER=asterisk
                  AST_GROUP=asterisk
```

<d>
       <details>
              <summary> systemd unit asterisk </summary>

```
[Unit]
Description=Asterisk PBX And Telephony Daemon
After=network.target

[Service]
User=asterisk
ExecStart=/usr/sbin/asterisk -g -f -U asterisk
ExecStop=/usr/sbin/asterisk -rx 'core stop now'
ExecReload=/usr/sbin/asterisk -rx 'core reload'

Restart=always
RestartSec=1
WorkingDirectory=/var/lib/asterisk
TimeoutStartSec=30
TimeoutStopSec=15

[Install]
WantedBy=multi-user.target
Alias=asterisk.service
```              

</details>
</d>

### owner
```
groupadd asterisk
useradd -d /var/lib/asterisk -g asterisk asterisk

chown -R asterisk:asterisk /usr/local/etc/asterisk/ &&
chown -R asterisk:asterisk /usr/local/lib/asterisk/ &&
chown -R asterisk:asterisk /usr/local/var/lib/asterisk/ &&
chown -R asterisk:asterisk /usr/local/var/spool/asterisk/ &&
chown -R asterisk:asterisk /usr/local/var/run/asterisk/ &&
chown -R asterisk:asterisk /usr/local/var/log/asterisk/ &&
chown  asterisk:asterisk /usr/local/sbin/asterisk
```

###### test calls (рабочий вариант т.е. звук в два направления)
> extensions.conf
<details>
       
if  
```
[general]
;static=yes
;writeprotect=no
autofallthrough=yes

[globals]                                                                                                                              
[default]
exten => _X.,1,Hangup()                                                                                                                                                                                   
[handup-sip]                                                                                                       
exten => _X!,1,HangUp()                                                                                                     

;внутренние
[call-out]
exten => _XXX,1,Dial(SIP/${EXTEN})
```
then
```

rtp set debug on
Sent RTP P2P packet to 217.118.93.173:31013 (type 08, len 000160)
Sent RTP P2P packet to 217.118.93.173:31013 (type 08, len 000160)
Sent RTP P2P packet to 85.234.9.47:10000 (type 08, len 000160)
Sent RTP P2P packet to 85.234.9.47:10000 (type 08, len 000160)
```

if 
```
[general]
;static=yes
;writeprotect=no
autofallthrough=yes

[globals]                                                                                                                              
[default]
exten => _X.,1,Hangup()                                                                                                                                                                                   
[handup-sip]                                                                                                       
exten => _X!,1,HangUp()                                                                                                     

;внутренние
[call-out]
exten => 100,1,Set(filename=${STRFTIME(${EPOCH},,%Y-%m-%d-%H_%M)}-${CALLERID(number)}-${EXTEN})
same => n,Dial(SIP/100,60,TtKkXx)
same => n,Background(abonent)
same => n,Background(zanjat)
same => n,Hangup()

exten => 102,1,Set(filename=${STRFTIME(${EPOCH},,%Y-%m-%d-%H_%M)}-${CALLERID(number)}-${EXTEN})
same => n,Dial(SIP/102,60,TtKkXx)
same => n,Background(abonent)
same => n,Background(zanjat)                                                                                                 
same => n,Hangup()

exten => 103,1,Set(filename=${STRFTIME(${EPOCH},,%Y-%m-%d-%H_%M)}-${CALLERID(number)}-${EXTEN})
same => n,Dial(SIP/103,60,TtKkXx)
same => n,Background(abonent)                                                                                               
same => n,Background(zanjat)                                                                                                 
same => n,Hangup()  
```
then
```
rtp set debug on
Sent RTP packet to      217.118.93.173:49375 (type 08, seq 027845, ts 3132475912, len 000160)
Got  RTP packet from    217.118.93.173:49375 (type 08, seq 008240, ts 1951058982, len 000160)
Sent RTP packet to      85.234.9.47:10000 (type 08, seq 025300, ts 1951058976, len 000160)
Got  RTP packet from    85.234.9.47:10000 (type 08, seq 055716, ts 3132476072, len 000160)
```
</details>



##### freepbx13
```
vim /var/www/html/admin/libraries/modulelist.class.php

vim /var/log/asterisk/cdr-csv/Master.csv
vim /etc/asterisk/manager.conf
vim /etc/asterisk/acl.conf
vim /etc/amportal.conf
ln -s fwconsole
./start_asterisk kill
./start_asterisk start   
fwconsole ma upgrade framework
fwconsole restart                                   
```

### CRONTAB
```
* * * * * [ -x /var/www/html/admin/modules/dashboard/scheduler.php ] && /var/www/html/admin/modules/dashboard/scheduler.php > /dev/nul$
33 * * * * /usr/sbin/fwconsole util cleanplaybackcache -q
2 6 * * * [ -e /usr/sbin/fwconsole ] && /usr/sbin/fwconsole ma listonline --sendemail -q > /dev/null 2>&1
2 8 * * * [ -e /usr/sbin/fwconsole ] && /usr/sbin/fwconsole ma installall --sendemail -q > /dev/null 2>&1
@daily [ -x /var/lib/asterisk/bin/freepbx_sipstation_check ] && /var/lib/asterisk/bin/freepbx_sipstation_check 2>&1 > /dev/null
@monthly ID=freepbx_backup_1 /var/lib/asterisk/bin/backup.php --id=1 >/dev/null 2>&1
*/15 * * * * /usr/sbin/fwconsole userman --syncall -q
6 1 * * * /usr/sbin/fwconsole certificates --updateall -q 2>&1 >/dev/null
*/1 * * * * /usr/sbin/fwconsole calendar --sync 2>&1 > /dev/null
```


