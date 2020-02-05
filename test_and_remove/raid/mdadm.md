```nginx
apt install mdadm
```
```nginx
mdadm -Es
mdadm --zero-superblock --force /dev/sd{b,c}
sfdisk -d /dev/sdb | sfdisk /dev/sdc
mdadm --create -v /dev/md0 -e1.2 -l1 -n2 -N <name> /dev/sd{b,c}
cat /proc/mdstat

mkdir /etc/mdadm
echo "DEVICE partitions" > /etc/mdadm/mdadm.conf
mdadm -Dsv | awk '/ARRAY/ {print}' >> /etc/mdadm/mdadm.conf
echo 'MAILADDR root' >> /etc/mdadm/mdadm.conf

echo 'check' > /sys/block/md0/md/sync_action
cat /sys/block/md0/md/mismatch_cnt
echo 'idle' > /sys/block/md0/md/sync_action

mkfs.ext4 /dev/md0
mount /dev/md0 /mnt
```

```
fdisk /dev/vd*
n
..
..
w
```
