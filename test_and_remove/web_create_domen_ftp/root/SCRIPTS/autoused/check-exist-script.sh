#!/bin/bash
path_cur="/home/vtigers"
path_def="/root/SCRIPTS/template"
path_temp="/tmp/results"

test -d /tmp/results || mkdir /tmp/results

#---- function check exist dirs and don't search <vtX> then create dir <vtX>
CreateDir(){
    clean_diff="$(echo $(cat /dev/null > "$path_temp"/diffDirs.txt))"
    temp_r="$(echo $(ls "$path_cur" > "$path_temp"/currentDir.txt))"
    td_r="$(echo $(ls "$path_cur" |grep "vt[1-9]"))"
    ed_r="$(echo $(cat "$path_def"/etalonDir.txt))"

    if [[ ${td_r} == ${ed_r} ]]; then
        echo    "OK_dir->$(date +%F_%H:%M:%S)" > "$path_temp"/OK.txt
        else    diff -bw "$path_def"/etalonDir.txt "$path_temp"/currentDir.txt |awk '{print $2}' |sed '/^$/d' |grep "vt[1-9]" > "$path_temp"/diffDirs.txt
    fi

    while read createDir; do
        mkdir -p "$path_cur"/$createDir/domain
        tar -xf "$path_def"/etalon.tar -C "$path_cur"/$createDir/domain
    done < "$path_temp"/diffDirs.txt
}

#---- function check exist databases and don't search <vtX> then create database <vtX>
CreateDB(){
    mysqlroot="mysql --login-path=localRoot"
    clean_diff="$(echo $(cat /dev/null > "$path_temp"/diffDB.txt))"
    temp_db="$(echo $(${mysqlroot} -e "SHOW DATABASES;" |grep "vt[1-9]" > "$path_temp"/currentDB.txt))"
    td_b="$(echo $(${mysqlroot} -e "SHOW DATABASES;" |grep "vt[1-9]"))"
    ed_b="$(echo $(cat "$path_def"/etalonDB.txt))"

    if [[ ${td_b} == ${ed_b} ]]; then
        echo    "OK_db->$(date +%F_%H:%M:%S)" >> "$path_temp"/OK.txt
        else    diff -bw "$path_def"/etalonDB.txt "$path_temp"/currentDB.txt |awk '{print $2}' |sed '/^$/d' |grep "vt[1-9]" > "$path_temp"/diffDB.txt
    fi

    #--- remove current databases vtX
    #for i in {1..9}; do
    #   echo $(${mysqlroot} -e "drop database vt$i;") && echo "I dropped vt$i"
    #done

    #--- for first start uncomment
    #${mysqlroot} -e "CREATE USER 'vtiger'@'localhost' IDENTIFIED by 'hICnMu.Q5B';"
    while read createDB; do
       ${mysqlroot} -e "CREATE DATABASE $createDB;"
        #--- for first start uncomment
        #${mysqlroot} -e "GRANT ALL ON $createDB.* to 'vtiger'@'localhost' IDENTIFIED by '123456wqQW.';"
       mysql --login-path=localVtiger -D $createDB < "$path_def"/etalon.sql
    done < "$path_temp"/diffDB.txt

    ${mysqlroot} -e "flush privileges;"
}

$(CreateDir)
$(CreateDB)
exit 0
