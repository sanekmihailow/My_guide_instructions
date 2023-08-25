### Resize sdX disk size without restart server'

<d>
<details>
    <summary>Details</summary>

0. Проверка значений 
- df -h
```bash
Filesystem      Size  Used Avail Use% Mounted on
devtmpfs        1.9G     0  1.9G   0% /dev
tmpfs           1.9G     0  1.9G   0% /dev/shm
tmpfs           1.9G   82M  1.8G   5% /run
tmpfs           1.9G     0  1.9G   0% /sys/fs/cgroup
/dev/sda3        35G  3.8G   32G  11% /
/dev/sda2      1014M  173M  842M  18% /boot
/dev/sdb1       100G  100G   0G  100% /data
/dev/sda1       200M   12M  189M   6% /boot/efi
tmpfs           379M     0  379M   0% /run/user/1000
tmpfs           379M     0  379M   0% /run/user/1003
```

1. Посмотрим на каком диске у нас находится раздепл /dev/sdb
- sudo ls -l /sys/class/scsi_device/__*__/device/block
```ioke
lrwxrwxrwx 1 root root 0 Aug 25 10:16 /sys/class//scsi_device/0:0:0:0/device -> ../../../0:0:0:0
lrwxrwxrwx 1 root root 0 Aug 25 10:16 /sys/class//scsi_device/0:0:1:0/device -> ../../../0:0:1:0
```

2. Сделаем рескан чтобы обновить место на диске и провим что у нас размер перечитался
- sudo sh -c " 1 > /sys/class/scsi_device/***0:0:1:0***/device/rescan"
- dmesg |tail
```ioke
[20769327.847320] sd 0:0:1:0: [sdb] 314572800 512-byte logical blocks: (161 GB/150 GiB)
[20769327.847614] sdb: detected capacity change from 107374182400 to 161061273600
```

3. Сохраним информацию о таблице на всякий случай
- sudo fdisk -l > fdisk.save || cat fdisk.save
```ioke
Disk /dev/sda: 42.9 GB, 42949672960 bytes, 83886080 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: gpt
Disk identifier: 844BD212-975C-4EB9-B2F8-0BC3C4739589


#         Start          End    Size  Type            Name
 1         2048       411647    200M  EFI System      EFI System Partition
 2       411648      2508799      1G  Microsoft basic
 3      2508800     75755519   34.9G  Microsoft basic
 4     75755520     83884031    3.9G  Linux swap

Disk /dev/sdb: 161.1 GB, 161061273600 bytes, 314572800 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: dos
Disk identifier: 0x00000000
 
   Device Boot      Start         End      Blocks   Id  System
/dev/sdb1            2048   314572799   157285376   83  Linux
```

4. Пересоздадим патрицию (для этого придется удалить предыдущую)
- sudo fdisk /dev/sdb
```ioke
Disk /dev/sdb: 161.1 GB, 161061273600 bytes, 314572800 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: dos
Disk identifier: 0x00000000
 
   Device Boot      Start         End      Blocks   Id  System
/dev/sdb1            2048   314572799   157285376   83  Linux
 
 
Command (m for help): p
 
Disk /dev/sdb: 161.1 GB, 161061273600 bytes, 314572800 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: dos
Disk identifier: 0x00000000
 
   Device Boot      Start         End      Blocks   Id  System
/dev/sdb1               1   209715199   104857599+  ee  GPT
 
Command (m for help): d
Selected partition 1
Partition 1 is deleted
 
Command (m for help): n
Partition type:
   p   primary (0 primary, 0 extended, 4 free)
   e   extended
Select (default p): p
Partition number (1-4, default 1): 1
First sector (2048-314572799, default 2048):
Using default value 2048
Last sector, +sectors or +size{K,M,G} (2048-314572799, default 314572799):
Using default value 314572799
Partition 1 of type Linux and of size 150 GiB is set
 
Command (m for help): p
 
Disk /dev/sdb: 161.1 GB, 161061273600 bytes, 314572800 sectors
Units = sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
Disk label type: dos
Disk identifier: 0x00000000
 
   Device Boot      Start         End      Blocks   Id  System
/dev/sdb1            2048   314572799   157285376   83  Linux
 
Command (m for help): w
The partition table has been altered!
 
Calling ioctl() to re-read partition table.
 
WARNING: Re-reading the partition table failed with error 16: Device or resource busy.
The kernel still uses the old table. The new table will be used at
the next reboot or after you run partprobe(8) or kpartx(8)
Syncing disks.
 
Command (m for help): q
```

5. Обновим таюлицу разделов
- sudo partx -u /dev/sd**b**

6. Сделаем resize места для файловой системы
- sudo xfs_growfs /dev/sd**b1**
```ioke
meta-data=/dev/sdb1              isize=512    agcount=4, agsize=6553472 blks
         =                       sectsz=512   attr=2, projid32bit=1
         =                       crc=1        finobt=0 spinodes=0
data     =                       bsize=4096   blocks=26213888, imaxpct=25
         =                       sunit=0      swidth=0 blks
naming   =version 2              bsize=4096   ascii-ci=0 ftype=1
log      =internal               bsize=4096   blocks=12799, version=2
         =                       sectsz=512   sunit=0 blks, lazy-count=1
realtime =none                   extsz=4096   blocks=0, rtextents=0
data blocks changed from 26213888 to 39321344
```

7. Проверка изменений
- df -h
```bash
Filesystem      Size  Used Avail Use% Mounted on
devtmpfs        1.9G     0  1.9G   0% /dev
tmpfs           1.9G     0  1.9G   0% /dev/shm
tmpfs           1.9G   82M  1.8G   5% /run
tmpfs           1.9G     0  1.9G   0% /sys/fs/cgroup
/dev/sda3        35G  3.8G   32G  11% /
/dev/sda2      1014M  173M  842M  18% /boot
/dev/sdb1       150G  100G   51G  67% /data
/dev/sda1       200M   12M  189M   6% /boot/efi
tmpfs           379M     0  379M   0% /run/user/1000
tmpfs           379M     0  379M   0% /run/user/1003
```

</details>
</d>    

--------------

- sudo ls -l /sys/class/scsi_device/ ${\color{purple}*}$ /device/block
- sudo sh -c " 1 > /sys/class/scsi_device/ ${\color{purple}0:0:1:0}$ /device/rescan"
- dmesg |tail

- sudo fdisk -l
- sudo fdisk /dev/sd ${\color{purple}X}$
```
Command (m for help): m
Command (m for help): p
Command (m for help): d
Command (m for help): n
primary
Command (m for help): w
Command (m for help): q
```

- sudo partx -u /dev/sd<pr>*X*</pr>
- sudo resize2fs -p /dev/sd**X1** || </r> sudo xfs_growfs /dev/sd**X1**
