
```bash
cd ~/.ssh
mkdir -p .ssh/keys
ssh-keygen -t rsa -b 4096 -f <имя> 
cat <имя>.pub >> ~/.ssh/authorized_keys
``` 
> /etc/ssh/sshd_config
  |-> uncomment
```            
AuthorizedKeysFile      %h/.ssh/authorized_keys
```          
  |-> uncomment
```
PasswordAuthentication no
```
and
```bash
service ssh restart #systemctl restart ssh.service
```
