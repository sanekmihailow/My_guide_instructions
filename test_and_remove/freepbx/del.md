
create cdr_manager.conf
```
sudo -u asterisk vim /etc/asterisk/cdr_manager.conf
```
```
[general]
enabled = yes
```
```
asterisl -rx 'module load cdr_manager.so'
```
