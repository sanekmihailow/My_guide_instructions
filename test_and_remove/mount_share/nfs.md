# server
```nginx
apt install nfs-kernel-server nfs-common
systemctl status nfs-server
```
* /etc/exports
```
/var/lib/kopano/attachments/ 192.168.1.103(rw,sync,insecure,no_root_squash,anonuid=112,anongid=114,no_subtree_check)
```
```
cat /etc/passwd
kopano:x:112:114:Kopano,,,:/var/lib/kopano:/usr/sbin/nologin
cat /etc/group
kopano:x:114:administrator

echo 219136 > /proc/sys/net/core/rmem_default && echo 219136 > /proc/sys/net/core/rmem_max && echo 219136 > /proc/sys/net/core/wmem_default && echo 219136 > /proc/sys/net/core/wmem_max
```
```nginx
sudo exportfs -a
showmount -e
```

# client
```nginx
apt install nfs-common
```
```
mount -t nfs 192.168.1.106:/var/lib/kopano/attachments /home/administrator/kopano-mount -o rsize=65536,wsize=65536
```
