#!/bin/bash

rempath="/var/www/bitrix_portal/public_html/bitrix/backup/"

list_remove=$(find ${rempath} -type f -mtime +1)
list_change=$(find ${rempath} -type f -mtime -1)

if [[ -z "${list_change}" ]]; then
        echo 'empty'
        exit 0
    else 
        for del in $list_remove; do
            rm -f ${del}
        done
fi    

exit 0
