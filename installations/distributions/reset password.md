# ubuntu / debian
```bash
1 - recovery mode (если сразу звходит , значитт пароля нет у рута)
2 - "shift+L" потом "e" и дописать в конце init=bin/sh
ctrl+X
#grep '\W/\W' /proc/mounts
#tail -1 /etc/shadow
mount -o remount,rw /
passwd user
exec /sbin/init
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/ubuntu_debian.png "")



# centos / fedora
```bash
1) "shift+L" потом "e" и дописать init=bin/sh
#grep '\W/\W' /proc/mounts
mount -o remount,rw /
#ls -Z /etc/shadow
/sbin/load_policy -i
#ls -Z /etc/shadow
passwd root
exec /sbin/init
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/centos_fedora.png "")
