# Links
[raspberry serviio](https://linuxconfig.org/how-to-install-serviio-media-server-on-raspberry-pi)

### Version
```python
 $ yaourt -Q serviio
local/serviio 1.9-1
```

##### Install
```nginx
yaourt -S serviio
```
##### Start
```nginx
sudo systemctl enable serviio.service
/usr/bin/serviio-console
```

`localhost:23423/console/#/app/welcome`


### Acestream + Serviio
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/serviio.png)
