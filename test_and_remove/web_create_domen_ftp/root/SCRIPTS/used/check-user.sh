#!/bin/bash

vtuser="$1"
vtpass="$2"

echo "---HOME---"
ls -la /home/vtigers |grep -i "$vtuser"
echo -e "\n"

echo "---PASSWD---"
/bin/cat /etc/passwd |grep -i "$vtuser"
echo -e "\n"

echo "---APACHE---"
ls -la /etc/apache2/vtigers-enabled |grep -i "$vtuser"
echo -e "\n"

echo "---CERTBOT---"
ls -la /etc/letsencrypt/live |grep -i "$vtuser"
echo -e "\n"

echo "---FTP---"
grep "$vtuser" /etc/vsftpd/ftpd.passwd
grep "$vtuser" /etc/vsftpd/user_list
ls -la /etc/vsftpd/users/"$vtuser"
echo -e "\n"

echo "---DATABASE---"
echo database = $(mysql --login-path=localRoot -e "SHOW DATABASES;" |grep "$vtuser")
echo user = $(mysql --login-path=localRoot -e "select user,host from mysql.user;" |grep "$vtuser")
echo -e "\n"

echo "---HOSTS---"
/bin/cat /etc/hosts |grep -i "$vtuser"
echo -e "\n"

echo "---RESULTS---"
echo $(/bin/cat /tmp/results/vtigers/${vtuser}.txt)
exit 0
