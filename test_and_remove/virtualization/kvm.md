# ARCHLINUX

```nginx
pacman -S openssh-askpass polkit virt-manager qemu vde2 ebtables dnsmasq bridge-utils openbsd-netcat dmidecode x11-ssh-askpass virt-viewer
systemctl enable libvirtd && systemctl start libvirtd
```
```python
 $  systemctl status libvirtd
● libvirtd.service - Virtualization daemon
     Loaded: loaded (/usr/lib/systemd/system/libvirtd.service; disabled; vendor preset: disabled)
     Active: active (running) since Sun 2020-01-26 20:48:19 MSK; 12h ago
TriggeredBy: ● libvirtd.socket
             ● libvirtd-admin.socket
             ● libvirtd-ro.socket
       Docs: man:libvirtd(8)
             https://libvirt.org
   Main PID: 655627 (libvirtd)
      Tasks: 17 (limit: 32768)
     Memory: 11.8M
     CGroup: /system.slice/libvirtd.service
             └─655627 /usr/bin/libvirtd

янв 26 20:48:19 WorkplaCe systemd[1]: Started Virtualization daemon.
янв 26 20:48:20 WorkplaCe libvirtd[655627]: libvirt version: 5.10.0
янв 26 20:48:20 WorkplaCe libvirtd[655627]: hostname: WorkplaCe
янв 26 20:48:20 WorkplaCe libvirtd[655627]: Libvirt doesn't support VirtualBox API version 6001000
янв 26 20:48:20 WorkplaCe libvirtd[655627]: Не удалось проверить QEMU /usr/libexec/qemu-kvm: Нет такого файла или каталога
янв 26 20:48:20 WorkplaCe libvirtd[655627]: Не удалось проверить QEMU /usr/libexec/qemu-kvm: Нет такого файла или каталога

```
