archlinux
==========
1.Install packages
```php
    sudo pacman -S ppp
    sudo pacman -S rp-pppoe
    sudo systemctl stop dhcpcd
```
2.	edit configs
3. setup config
```bash
    pppoe-setup
```
4. on pppoe connection
    ```php
    sudo pon rostelecom
    ```
>(simple pon if has file provider in catalog peers)

5. change routing table with dhcp on pppoe
```php
    ip route
    sudo ip route replace default dev ppp0
    ping 8.8.8.8
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/pppoe%20setup.png "")
### -------------------------------- BACK to dchp -----------------------------
6. off pppoe connection
```php    
    sudo poff rostelecom
```
>(simple poff if has file provider in catalog peers)

7. change the routing table back on dchp
```php
sudo systemctl start dchpcd
sudo ip route replace default dev enp2s0 
```
>(enp2s0 or other interface)

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/%D0%92%D1%8B%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5_005.png "")
