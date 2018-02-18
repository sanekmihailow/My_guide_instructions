better way use ubuntu-grub from all OS

# Arch

> After installations arch and use grub ubuntu, you need edit cfg

### links
[1](https://archlinux.org.ru/forum/topic/13994/?page=3)

[2](https://askubuntu.com/questions/628206/how-can-i-boot-into-arch-linux-using-initramfs-in-ubuntus-grub/842802#842802)

[3](https://bugs.launchpad.net/ubuntu/+source/os-prober/+bug/1635781)

[4](https://askubuntu.com/questions/932536/fixing-arch-ubuntu-multiboot/932606#932606)

### instructions arch + ubuntu
```nginx
            1) vim /usr/lib/linux-boot-probes/mounted/40grub2
```
```bash
            comment 
                    -> initrd="$(echo "$2" ...)"
            add
                    -> shift 1
                       initrd="$(echo "$@" | sed 's/(.*)//')"
```
```nginx
            2) vim /etc/grub.d/30_os-prober
```
```bash
            add
                    -> | tr '^' ' '
           like this
                          for LINUX in ${LINUXPROBED}; do
                          ...
                          LINITRD="`echo ${LINUX} | cut -d ':' -f 5 | tr '^' ' '`"
```                          
```nginx
           3) sudo update-grub
```            
