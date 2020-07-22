### mount
```bash
in /etc/fstab
          add
             -> //192.168.1.50/data /mnt/data cifs         uid=1000,username=user,password=123456,iocharset=utf8
          description
                (//$server/$path /mnt/$any cifs  username=$user,password=$password,iocharset=utf8)
 or
 mount -t cifs //192.168.1.50/data /mnt/data -o username=user,password=123456,iocharset=utf8
```                
### create password smb user
```nginx
smbpasswd -a <user>
```
