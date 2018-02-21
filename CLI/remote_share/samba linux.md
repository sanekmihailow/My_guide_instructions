### mount
```bash
in /etc/fstab
          add
             -> mount /192.168.1.50/data /mnt/data cifs,uid=1000,username=user,password=123456,iocharset=utf8 defaults 0 0
          description
                (mount /$server/$path /mnt/$any cifs,uid=1000,username=$user,password=$password,iocharset=utf8 defaults 0 0)
```                
