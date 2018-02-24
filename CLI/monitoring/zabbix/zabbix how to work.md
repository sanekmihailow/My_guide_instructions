# Последовательность (chain)
```sh
Группа узлов сети (Host group)
          --> узел сети (Host)
               --> шаблон (Template)
                    --> группы элементов (applications)
                         --> элементы данных n-кол-во (items)
                                        --> триггеры (triggers)
                                        --> графики (graphs)
                                        --> панел экранов (screens)
                          --> правила обнаружения (discovery rules)
                                        --> прототипы элементов данных (item prototypes)
                                        --> прототипы триггеров (trigger prototypes)
                                        --> прототипы графиков (graph prototypes)
```                                        


### How to work agents with userparametr

### client (zabbix-agent)
###### /etc/zabbix/zabbix_agent.d/
```sh
In this folder store userparametr files
May add or edit folder (contents userparams files) in config file (/etc/zabbix/zabbix_agentd.conf)
          string content (Include=/etc/zabbix/zabbix_agentd.d/)
                    Example add
                            --> Include=/usr/local/etc/zabbix/zabbix_conf/
```
###### /etc/zabbix/zabbix_scripts
```sh
This folder created by me
and sets permissions (in conf file set path/to/script, see top)
```
```nginx
chown -R root:zabbix /etc/zabbix/zabbix_scripts
chmod -R 750 /etc/zabbix/zabbix_scripts
```
##### how to work
```sh
1) UserParameter=<key>,<command>
          Description:
          UserParameter=<any-key>,<command or path/to/your/script>

2) UserParameter=<key>[*],<command>
          Description:
          UserParameter=<any-key>[all usable metric],<command or path/to/your/script>
```
##### how to check
 ```sh
 1) sudo -u zabbix path/to/your/script <metric>
          Decription:
          sudo -u user-zabbix path/to/your/script any-usable-metric
          
 2) zabbix_get -s host -p port -k "<key>[<metric>]"
          Description:
          zabbix_get -s host-ip(or dns-name) -p port(def:10050) -k "key-you-use-in-userparametr[metic-arguments]"
```

On example mysql and apache2:

[mysql_scipt](http://wiki.enchtex.info/howto/zabbix/advanced_mysql_monitoring)

[apache2_script](http://wiki.enchtex.info/howto/zabbix/zabbix_apache_monitoring)

3 options for applying the method:
```sh

1)
UserParameter=ech,echo 1
```
```python
 $ zabbix_get -s 127.0.0.1 -p 10050 -k "ech"      (ech - it a key)
1                                          
```
```sh
2)
UserParameter=mysql-stats[*],/etc/zabbix/zabbix_scripts/mysql-stats.sh "$1" Andrey 123456
```
```python
  $ sudo -u zabbix /etc/zabbix/zabbix_scripts/mysql-stats.sh Uptime                 (Uptime - it a metric)
4833943 
 
  $ zabbix_get -s 127.0.0.1 -p 10050 -k mysql-stats[questions]
 28945841
```
 
```sh 
 3)
 UserParameter=apache2[*],/etc/zabbix/zabbix_scripts/apache-stats.sh "$1" "$2"
 ```
 ```python
  $ sudo -u zabbix /etc/zabbix/zabbix_scripts/apache-stats.sh uptime http://my-localserver.com/server-status
 1464106

  $ zabbix_get -s 127.0.0.1 -p 10050 -k "apache2[cpuload,http://my-localserver.com/server-status]"
 2.04868e-6
```
If in template use {ARG} on zabbix-server then need to add macros

like this

ARG
![ARG](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/zabbix_arg.png)
MACROS
![MACROS](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/zabbix_macros.png)
```sh
any examples:

UserParameter=mysql.p[*],mysqladmin -u$1 -p$2 ping | grep -c alive

UserParameter=mysql-stats[*],/etc/zabbix/zabbix_scripts/mysql-stats.sh "$1" Andrey 123456 

          Description:
          UserParameter=mysql-stats[*],/etc/zabbix/zabbix_scripts/mysql-stats.sh "argument_in_your_script" "user_for_DB_your_mysq_DB" "password_for_user_mysql_DB" (without quotes)

### check script work throught zabbix user

 $ sudo -u zabbix /etc/zabbix/zabbix_scripts/mysql-stats.sh version
Ver 14.14 Distrib 5.7.20, for Linux (x86_64) using  EditLine wrapper
```

in /etc/zabbix/zabbix_agent.conf
```sh
Hostname wiil be a match of agent.conf and web on zabbix-server
like this:
```
```python
 $ egrep -v "^#|^$|^;" /etc/zabbix/zabbix_agentd.conf
PidFile=/var/run/zabbix/zabbix_agentd.pid
LogFile=/var/log/zabbix/zabbix_agentd.log
LogFileSize=0
Server=192.168.1.7
ServerActive=192.168.1.7
Hostname=develop
Include=/etc/zabbix/zabbix_agentd.d/
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/zabbix_host.png)

and
```sh 
<key> and <metric> in client (zabbix-agent)  and  <key> <metric> in template ( zabbix-server(web) ) must match
```
