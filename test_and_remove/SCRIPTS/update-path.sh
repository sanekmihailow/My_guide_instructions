#!/bin/bash
path_out="/usr/LOCAL/*/ "
path_to="$HOME/.shell_source/exports"
sbin_out=$(find $path_out -name 'sbin'    |sed ':a;N;$!ba;s/\n/:/g')
bin_out=$(find $path_out -name 'bin'	    |sed ':a;N;$!ba;s/\n/:/g')
lib_out=$(find $path_out -name 'lib'	    |sed ':a;N;$!ba;s/\n/:/g')
check_sbin_out=$(find $path_out -name 'sbin' |wc -l)
check_bin_out=$(find $path_out -name 'bin' |wc -l)
check_lib=$(find $path_out -name 'lib' |wc -l)
curr_path=$(echo 'PATH="$HOME/.local/bin:$PATH:/usr/local/bin:/usr/local/sbin:/usr/bin:/usr/sbin"')
lib_path=$(echo 'LD_LIBRARY_PATH="$HOME/.local/lib:/lib:/usr/lib:/usr/local/lib"')

sb=$(echo "$sbin_out:$bin_out")

if [[ $check_sbin_out = "0" ]]; then
    sb=$(echo "$sb" |sed 's/^://')
fi

if [[ $check_bin_out = "0" ]]; then
    sb=$(echo "$sb" |sed 's/:$//')
fi

curr_path=$(echo "$curr_path" 	    |sed 's/"$//')
curr_path=$(echo "$curr_path:$sb\"" |sed 's/\//\\\//g')
sed -i "9s/^.*$/$curr_path/" $path_to

if [[ $check_lib = "0" ]]; then
    echo '/usr/LOCAL/*/lib not found'
else	lib_path=$(echo "$lib_path" |sed 's/"$//')	
   lib_path=$(echo "$lib_path:$lib_out\"" |sed 's/\//\\\//g')
   sed -i "11s/^.*$/$lib_path/" $path_to
fi
exit 0
