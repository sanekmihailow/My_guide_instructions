#!/bin/bash
rm -rf /home/vtigers/"$1"
userdel "$1"
rm /etc/apache2/vtigers-enabled/$1.conf
mysql --login-path=localRoot -e "DROP database $1;"
mysql --login-path=localRoot -e "DROP user '${1}'@'localhost';"
rm /etc/vsftpd/users/$1
rm /tmp/results/vtigers/${1}.txt
rm /tmp/results/vtigers/error_${1}
rm -rf /etc/letsencrypt/archive/${1}.domain.com/
rm -rf /etc/letsencrypt/live/${1}.domain.com/
rm /etc/letsencrypt/renewal/${1}.domain.com.conf
grep -n "$1" /etc/vsftpd/user_list   |awk -F : '{print $1}' > /tmp/results/grep_user
grep -n "$1" /etc/vsftpd/ftpd.passwd |awk -F : '{print $1}' > /tmp/results/grep_pass
grep -ni "$1" /etc/hosts |awk -F : '{print $1}' > /tmp/results/grep_hosts
us=$(echo $(/bin/cat /tmp/results/grep_user))
pas=$(echo $(/bin/cat /tmp/results/grep_pass))
host=$(echo $(/bin/cat /tmp/results/grep_hosts))

if [ -z "$us" ]; then
     echo 'empty grep_user'; else
     sed -i "${us}d" /etc/vsftpd/user_list
fi

if [ -z "$pas" ]; then
     echo 'emty grep_pass'; else
     sed -i "${pas}d" /etc/vsftpd/ftpd.passwd
fi

if [ -z "$host" ]; then
     echo 'emty host'; else
     sed -i "${host}d" /etc/hosts
     echo 'OK'
fi
exit 0
