
[yutube-p1](https://youtu.be/1TlwP2cPrhg)

[youtube-p2](https://youtu.be/a3VPqcq-TaA)

[linuxoide-discover](https://linoxide.com/configure-iscsi-storage-redhat-linux/)

# iSCSI 

> подключается как блочное устройство

> iSCSI **клиент** подключается к iSCSI **серверу** на котором находится фоновое хранилище

> c8-vm01 - target;   c8-vm02 - initiator

Фоновое хранилище бывает в виде:
- 1.образа диска(img) - (fileio)
- 2.локального блочного устройства(sd*) или логоческого устройства(lvm) - (block)
- 3.объект хранилища, поддерживающий прямой проброс команд SCSI - (pscsi)
- 4.временное хранилище в RAM - (ramdisk)

1 - накладные расходы на драйвер файловой системы и драйвер блочного устройства

2 - накладные расходы только на драйвер блочного устройства

3 - самый быстрый способ. RFC команды SCSI

4 - временное


> Server (c8-vm01)
```nginx
yum install targetcli -y
systemctl enable targetclid && systemctl start targetclid
systemctl enable target && systemctl start target
    #firewall-cmd --zone=public --list-all
    #firewall-cmd --add-port=3260/tcp --permanent
targetcli ls

umount -l /dev/vdb

mkdir /iSCSI
targetcli
/> /backstores/fileio create size=2G name=file0 file_or_dev=/iSCSI/file0.img
/> saveconfig
/> /backstores/block create name=block0 dev=/dev/vdb
    #/> /backstores/pscsi create name=/ dev=/sr0
    #/> /backstores/ramdisk name=ram0 size=3G
/> /iscsi create wwn
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/luns create /backstores/block/block0
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/luns create /backstores/fileio/file0

/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/acls create iqn.2019-11.local.seele:c8-vm02
/> saveconfig
```

> Client (c8-vm02)
```nginx
yum install iscsi-initiator-utils
vim /etc/iscsi/initiatorname.iscsi
```

> cat /etc/iscsi/initiatorname.iscsi
```
InitiatorName=iqn.2019-11.local.seele:c8-vm02
```

```nginx
systemctl restart 
iscsiadm --mode discovery --type sendtargets --portal 192.168.0.1
ls  /var/lib/iscsi/nodes
iscsiadm --mode node --targetname iqn.2019-11.local.seele:c8-vm01 --login
lsblk
mkfs.ext4 /dev/sdb
mkfs.xfs /dev/sdc
blkid |tail -n2 >> /etc/fstab
```
> add fstab 
```
UUID... /mnt/lun0 ext4 _netdev 0 0
UUID... /mnt/lun1 xfs _netdev 0 0
```
```nginx
mount -a
```


### 2
> c8-vm02
```nginx
umount /mnt/lun?
#change fstab
iscsiadm --mode node --targetname iqn.2019-11.local.seele:c8-vm01 --logout
```

> c8-vm01
```nginx
targetcli
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/luns delete lun=1
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/luns delete lun=2
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/portals delete 0.0.0.0 3260
exit
```
```nginx
    #firewall-cmd --zone=public --list-all
firewall-cmd --remove-port 3260/tcp --permanent
    #firewall-cmd --get-zones
    #firewall-cmd --zone=work --add-interface=enp10s0 --permanent
    #firewall-cmd --zone=work --add-source=192.168.0.0/24 --permanent
    #firewall-cmd --reload
    #firewall-cmd --zone=work --add-port=3260/tcp --permanent
    #firewall-cmd --zone=work --remove-service=cockpit --permanent
    #firewall-cmd --zone=work --remove-service=dhcpv6-client --permanent
    #firewall-cmd --zone=work --remove-service=ssh --permanent
```
```nginx
targetcli
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/portals create ip_address=192.168.0.1 ip_port=3260
/> get global
/> set global auto_add_mapped_luns=false
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/acls/iqn.2019-11.local.seele:c8-vm02 create mapped_lun=0 tpg_lun_or_backstore=/backstores/block/block0 write_protect=0
/> /iscsi/iqn.2019-11.local.seele:c8-vm01/tpg1/acls/iqn.2019-11.local.seele:c8-vm02 create mapped_lun=0 tpg_lun_or_backstore=/backstores/fileio/file0 write_protect=1
```

> c8-vm02
```ngihx
iscsiadm --mode node --targetname iqn.2019-11.local.seele:c8-vm01 --login
iscsiadm --mode session -P 0
iscsiadm --mode session -P 1


```

```
iscsiadm -m discovery -t st -p 192.168.0.1
ls -l /var/lib/iscsi/nodes/
```
