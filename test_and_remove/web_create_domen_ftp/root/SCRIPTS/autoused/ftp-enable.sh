#!/bin/bash
enuser="$1"
user_path="/etc/vsftpd/user_list"
path_home="/home/vtigers/${enuser}/crm4team"
check_ht="$(echo $(grep "    RewriteRule.*crm4team.com/pay.*$" ${path_home}/.htaccess))"
check_user="$(echo $(grep "${enuser}" ${user_path}))"

if [ -z "$enuser" ]; then
     echo 'empty enable user'
     exit 1
fi

if [[ "$check_user" ]];then
    echo '1' > /dev/null; else
    echo "$enuser" >> "$user_path"
fi

if [[ "$check_ht" ]]; then
    rm "$path_home"/.htaccess
    if [ -f "$path_home"/htaccessOld ]; then
        mv "$path_home"/htaccessOld "$path_home"/.htaccess
        chown "$enuser":"$enuser" "$path_home"/.htaccess
    fi    
fi
exit 0
