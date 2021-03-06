#!/bin/bash
enuser="$1"
user_path="/etc/vsftpd/user_list"
path_home="/home/vtigers/${enuser}/domain"
enpass="$(awk '(NR==26)' ${path_home}/config.inc.php |awk '{print $3}' |sed "s/^'//" |sed "s/';$//")"
check_ht="$(echo $(grep "    RewriteRule.*domain.com/pay.*$" ${path_home}/.htaccess))"
check_htold="$(echo $(grep "    RewriteRule.*crm4team.com/pay.*$" ${path_home}/htaccessOld))"
check_user="$(echo $(grep "${enuser}" ${user_path}))"
mysqlroot="mysql --login-path=localRoot"

if [ -z "$enuser" ]; then
     echo 'empty enable user'
     exit 1
fi

if [[ "$check_user" ]];then
    echo '1' > /dev/null; else
    echo "$enuser" >> "$user_path"
fi

if [[ "$check_ht" ]]; then
    rm "$path_home"/.htacces
    if [ -f "$path_home"/htaccessOld ]; then
        if [[ "$check_htold" ]]; then
            echo 'Options -Indexes' > ${path_home}/htaccessOld
        fi
        cp "$path_home"/htaccessOld "$path_home"/.htaccess
        chown "$enuser":"$enuser" "$path_home"/.htaccess
    fi
    ${mysqlroot} -e "GRANT ALL ON ${enuser}.* to '${enuser}'@'%' IDENTIFIED by '${enpass}';"
    ${mysqlroot} -e "flush privileges;"   
fi
exit 0
