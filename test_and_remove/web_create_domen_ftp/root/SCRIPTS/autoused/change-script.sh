#!/bin/bash
path_cur="/home/vtigers"
path_def="/root/SCRIPTS/template"
path_temp="/tmp/results"
path_result="/tmp/results/vtigers"
vtname="$1"
vtpass="$2"
black_hole_email="noreply-domain-vtiger@yandex.ru"

test -d /tmp/results/vtigers || mkdir -p /tmp/results/vtigers

if [ -z "$vtname" ]; then
     echo 'empty username' > "$path_temp"/Result
     exit 1
elif [ -z "$vtpass" ]; then
     echo 'emty password' > "$path_temp"/Result
     exit 1
else echo 'OK' > "$path_temp"/Result
fi

#---- Replace config.inc.php
ChangeConfigInc(){
    c_inc="$(echo $(cat ${path_def}/etalon.inc.php > ${path_cur}/${vtname}/domain/config.inc.php))"
    genkey="$(echo $(head /dev/urandom | tr -dc a-z0-9 | head -c 32 ; echo ''))"
    changelist="25s/DBusername/${vtname}/ 26s/DBpassword/${vtpass}/ 27s/DBname/${vtname}/ 41s/DomainName/${vtname}.domain.com/ 45s/VtigerName/${vtname}/ 79s/RandomText/${genkey}/"

    for i in $changelist; do
        sed -i "${i}" "$path_cur"/"$vtname"/domain/config.inc.php
    done

    echo ${genkey} > "$path_def"/pass.txt
}

#---- Rename dir and database
RenameDir(){
    #M mysqlroot="mysql --login-path=localRoot"
    mysqlroot="mysql -u root -pdadadadaeqea"
    per_dir="$(echo $(ls ${path_cur} |grep vt |sort |head -n1))"
    params=$(${mysqlroot} -N -e "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='${per_dir}'")
    useradd -d "$path_cur"/"$vtname" -s /sbin/nologin "$vtname"
    mv "$path_cur"/"$per_dir" "$path_cur"/"$vtname"
    chown -R "$vtname":"$vtname" "$path_cur"/"$vtname"
    ${mysqlroot} -e "CREATE USER '${vtname}'@'localhost' IDENTIFIED by '${vtpass}';"
    ${mysqlroot} -e "CREATE DATABASE ${vtname};"
    ${mysqlroot} -e "GRANT ALL ON ${vtname}.* to '${vtname}'@'%' IDENTIFIED by '${vtpass}';"

    for tbname in ${params}; do
        ${mysqlroot} -e "RENAME TABLE ${per_dir}.$tbname to ${vtname}.$tbname"
    done

    ${mysqlroot} -e "DROP DATABASE ${per_dir};"
    ${mysqlroot} -e "flush privileges;"
}

#---- Create apache conf, if ok -> change http conf to https
CreateConf(){
    path_apache="/etc/apache2/vtigers-enabled"
    httplist="3 4 6 7 9 13"
    httpslist="3 12 13 14 15 18 19 30 33"
    
    cp "$path_def"/etalon-http.conf "$path_apache"/"$vtname".conf

    for i in ${httplist}; do
        sed -i "${i}s/servweb/${vtname}/g" "$path_apache"/"$vtname".conf
    done

    #echo -e "\napache is\n ${apache_check}"
    /bin/systemctl reload apache2
    #apache_check1=$(echo $(apache2ctl -t 2>&1 |tee))
    #echo -e "\napache1 is\n ${apache_check1}":
    apache_check=$(echo $(apache2ctl -t 2>&1 |tee))
    if [[ "$apache_check" == 'Syntax OK' ]]; then
            if [[ $(grep "$vtname" /etc/hosts) ]]; then
                echo '1' > /dev/null; else
                echo "127.0.0.1 ${vtname}.domain.com" >> /etc/hosts
            fi

            certbot certonly --apache --non-interactive --agree-tos -m "$black_hole_email" -d "$vtname".domain.com 2> /dev/null
            cp "$path_def"/etalon-redirect-https.conf "$path_apache"/"$vtname".conf
            rm "$path_apache"/"$vtname"-le-ssl.conf 2> /dev/null
            sed -i "41s/http\:/https\:/" "$path_cur"/"$vtname"/domain/config.inc.php

            for a in ${httpslist}; do
                sed -i "${a}s/servweb/${vtname}/g" "$path_apache"/"$vtname".conf
            done
            /bin/systemctl reload apache2
            apache_check2=$(apache2ctl -t 2>&1 |tee)
            
            if [[ "$apache_check2" == 'Syntax OK' ]]; then
                #echo -e "\n norm loading 2 ..."
                echo '3' > "$path_result"/${vtname}.txt
            else
                #echo -e "\n err loading 2 ..."
                echo "$apache_check2" 2> "$path_result"/error_${vtname}
                echo '2' > "$path_result"/${vtname}.txt
                echo '-----------------apache 2 error log------------' >> "$path_result"/error_${vtname}
                tail /var/log/apache2/error.log >> "$path_result"/error_${vtname}
                echo '----------------- virtual host error log ------' >> "$path_result"/error_${vtname}
                tail /var/log/apache2/vtigers/${vtname}_error.log >> "$path_result"/error_${vtname}
                #mail
                #M mail -s 'Error when create new user' "$black_hole_domain" < "$path_temp"/error_cr_conf.txt
                exit 1
            fi
    fi
}

#---- create ftp user on basic useradd
FtpCreate(){
    ftppath="/etc/vsftpd"
    if [[ $(grep "$vtname" "$ftppath"/ftpd.passwd) ]]; then
        echo '1' > /dev/null; else
        echo $(htpasswd -bd ${ftppath}/ftpd.passwd ${vtname} ${vtpass} 2> /dev/null)
        if [[ $(grep "$vtname" "$ftppath"/user_list) ]]; then
            echo '2' > /dev/null; else
            echo "${vtname}" >> "$ftppath"/user_list
            echo $(sed "1s/servweb/${vtname}/" ${path_def}/etalonFTP.txt |tee ${ftppath}/users/${vtname} > /dev/null)
            systemctl reload vsftpd
        fi
    fi
}

#---- Execute Functions in order
$(RenameDir)
$(ChangeConfigInc)
$(CreateConf)
$(FtpCreate)

echo '1' > "$path_result"/${vtname}.txt
exit 0
