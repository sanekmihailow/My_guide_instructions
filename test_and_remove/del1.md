`pvdisplay`
`vgdisplay`
`lvdisplay`
# Lv increase
Run `pvresize /dev/sd*` to have LVM pick up the new space.
`lvextend -r -L+20G`
на всякий `resize2fs /dev/myserver/mylogicalvolume`
#### Alternatives
`lvresize --size +40G /dev/vg0/foo`

# Lv reduce
https://irternus.blogspot.com/2011/07/lvm.html

`lvdisplay /dev/lv/home`
```
PE Size               4,00 MiB
Current LE             55578
Это кол-во логических блоков Current LE 55578, каждый блок как мы помним 4M. Получается что общий объем /home 222312M мы хотим отрезать от него 2048M в конечном итоге /home должен стать размером 220264M.
```
`umount /dev/vg/home`

`e2fsck -f /dev/lv/home`

`resize2fs /dev/irt.ds/home 220264M`

`lvreduce -L-2G /dev/lv/home`

`e2fsck /dev/lv/home`

`lvdisplay /dev/lv/home`

`vgdisplay`
#### Alternatives
`umount /dev/vg/home`

`e2fsck -f /dev/vg_ss/lv_home`

`lvreduce -r -L -500G /dev/vg_ss/lv_home`
> если resize2gf не сработал, на всякий `resize2fs /dev/vg_ss/lv_home 500G`
> 
> 500 - это размер, который мы откусим от основной, т.е. 2Tb - 500gb = 1.5 Tb.

`e2fsck /dev/lv/home`

`lvdisplay /dev/vg_ss/lv_home`

`vgdisplay`
#### Alternatives
`umount /dev/vg/home`

`e2fsck -f /dev/pve/data`

Затем уменьшаем файловую систему на размер, меньший, чем будет раздел в итоге.
`resize2fs /dev/pve/data 900G`

Потом уменьшаем раздел LVM
`lvreduce -L 1000G /dev/pve/data`

И наконец, расширяем файловую систему до полного размера раздела
`resize2fs /dev/pve/data`

`e2fsck /dev/lv/home`

`lvdisplay /dev/vg_ss/lv_home`

`vgdisplay`
#### Alternatives
```
umount /dev/mapper/vg_d620-lv_example
e2fsck -f /dev/mapper/vg_d620-lv_exampl
resize2fs -p /dev/mapper/vg_d620-lv_example 30G
lvreduce -L 30G /dev/mapper/vg_d620-lv_example
e2fsck -f /dev/mapper/vg_d620-lv_example
mount /dev/mapper/vg_d620-lv_example /mnt/example
```



