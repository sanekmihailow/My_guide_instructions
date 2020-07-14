#!/bin/bash
for i in {1..9}; do
    echo $(mysql -u root -pZ5fs299bQD4L -e "drop database vt$i")
done
