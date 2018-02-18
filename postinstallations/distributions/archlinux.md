# Links
### Post install
[1](https://www.2daygeek.com/install-xfce-mate-kde-gnome-cinnamon-lxqt-lxde-budgie-deepin-enlightenment-desktop-environment-on-arch-linux/)

[2](https://www.cio.com/article/3100413/linux/6-things-to-do-after-installing-arch-linux.html#slide6)

[3](https://www.ostechnix.com/arch-linux-2016-post-installation/)

[4](https://www.unixmen.com/top-things-installing-arch-linux/)
### Internet setup
[1](https://blackarch.ru/?p=483)

[2](https://bbs.archlinux.org/viewtopic.php?id=151042)


#### 1) update sysytem
```nginx
      pacman -Syu
```

#### 2) edit config files
```nginx
      visudo
```          
>          --> uncomment sudo

```nginx
      vim /etc/pacman.conf
```                        
```bash
            --> uncomment
```            
>                         [multilib]
>                         include = /etc/pacman.d/mirrorlis                  
>                         Color
```bash
            --> add
```
>                         [archlinuxfr]        
>                         SigLevel = Never
>                         Server = http://repo.archlinux.fr/$arch

#### 3) add new user and disable root
```nginx
useradd -m -s /bin/bash user
mkdir /home/user && chown user:user /home/user
groupadd sudo
usermod -aG sudo user
sudo passwd -l root
```

#### 4) update mirrorlist
```nginx
sudo pacman -Syu
yaourt -Syu
```

#### 5) internet setup
##### dhcp
###### dchp 1 start
```nginx
            sudo ifconfig eth0 up
            sudo dhcpcd
```
###### dchp autostart
```nginx
            sudo ifconfig eth0 up
            sudo dhcpcd
            sudo systemctl enable dhcpcd
 ```

##### static
###### static 1 start
```nginx
            sudo ifconfig eth0 up
            ip a add 192.168.1.101/24 dev eth0
            ip route add default via 192.168.1.1
            vim /etc/resolv.conf
```
```bash
                              add
                              --> nameserver 8.8.8.8
```
###### static autostart
```nginx
            cp /etc/netctl/examples/ethenet-static  /etc/netctl/static.eth0               ( or eth0 )
            sudo vim /etc/netctl/static.eth0
```
```bash
                        Description='A basic static ethernet connection'
                        Interface=eth0
                        Connection=ethernet
                        IP=static
                        Address=('192.168.1.101/24')
                        #Routes=('192.168.0.0/24 via 192.168.1.2')
                        Gateway='192.168.1.1'
                        DNS=('8.8.8.8')
                         
                        ## For IPv6 autoconfiguration
                        #IP6=stateless
                         
                        ## For IPv6 static address configuration
                        #IP6=static
                        #Address6=('1234:5678:9abc:def::1/64' '1234:3456::123/96')
                        #Routes6=('abcd::1234')
                        #Gateway6='1234:0:123::abcd'
```
```nginx
             sudo systemctl disable dhcpcd
             sudo systemctl enable static.eth0
             reboot
```
