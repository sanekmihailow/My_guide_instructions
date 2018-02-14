archlinux
==========
1.Install packages
```bash
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
    ```bash
    sudo pon rostelecom
    ```
>(simple pon if has file provider in catalog peers)

5. change routing table with dhcp on pppoe
```bash
ip route
sudo ip route replace default dev ppp0
ping 8.8.8.8
```
-------------------------------- BACK to dchp ------------------------------------

6. off pppoe connection
```bash    
    sudo poff rostelecom
```
>(simple poff if has file provider in catalog peers)

7. change the routing table back on dchp
```bash
sudo systemctl start dchpcd
sudo ip route replace default dev enp2s0 
```
>(enp2s0 or other interface)

