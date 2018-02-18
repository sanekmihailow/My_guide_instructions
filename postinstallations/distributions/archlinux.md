# Links
[1](https://www.2daygeek.com/install-xfce-mate-kde-gnome-cinnamon-lxqt-lxde-budgie-deepin-enlightenment-desktop-environment-on-arch-linux/)

[2](https://www.cio.com/article/3100413/linux/6-things-to-do-after-installing-arch-linux.html#slide6)

[3](https://www.ostechnix.com/arch-linux-2016-post-installation/)

[4](https://www.unixmen.com/top-things-installing-arch-linux/)


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
