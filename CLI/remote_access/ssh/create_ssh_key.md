
```bash
mkdir -p .ssh/keys
cd ~/.ssh/keys
ssh-keygen -t rsa -b 4096 -f <имя> 
cat <имя>.pub >> ~/.ssh/authorized_keys
``` 
> /etc/ssh/sshd_config

 |-> uncomment
```            
AuthorizedKeysFile      %h/.ssh/authorized_keys
```          
 |-> uncomment and change "yes" on "no"
```
PasswordAuthentication no
```
and
```bash
service ssh restart #systemctl restart ssh.service
```
