#!/bin/bash
template="/root/SCRIPTS/template/disable-htaccess"
disuser="$1"
path_home="/home/vtigers/${disuser}/domain"
mysqlroot="mysql --login-path=localRoot"

if [ -z "$disuser" ]; then
    echo 'empty disable user'
    exit 1
fi    

    grep -n "$disuser" /etc/vsftpd/user_list   |awk -F : '{print $1}' > /tmp/results/ftp-disable
dis=$(echo $(/bin/cat /tmp/results/ftp-disable))
    sed -i "${dis}d" /etc/vsftpd/user_list
    mv "$path_home"/.htaccess "$path_home"/htaccessOld
#M-    chown "$disuser":"$disuser" "$path_home"/htaccessOld
    cp "$template" "$path_home"/.htaccess
    sed -i "s/servweb/${disuser}/g" "$path_home"/.htaccess
    ${mysqlroot} -e "DROP USER '${disuser}'@'%';"
    ${mysqlroot} -e "flush privileges;"
exit 0
