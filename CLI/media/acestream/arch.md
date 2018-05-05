# Method 1 ( do not worked playlist play )

### Version installs
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/acestream_version.png)

### Intsall acestream
##### 1) install qtwebkit and python2 crypto in tar.xz 
> because in aur(qtwebkit) created loop (install 2 hours and the end show massage that not installed)

[qtwebkit-2.3.4-5-x86_64.pkg.tar.xz](https://drive.google.com/open?id=1Fq7yscyUzmdkF09oBQEkCyCKfbndBL5f)
```nginx
sudo pacman -U qtwebkit-2.3.4-5-x86_64.pkg.tar.xz
```
[python2-m2crypto-0.23.0-2-x86_64.pkg.tar.xz](https://drive.google.com/open?id=1r122pI46Zg2kjPiNtjF2AsuOgpgB9Apk)
```nginx
sudo pacman -U python2-m2crypto-0.23.0-2-x86_64.pkg.tar.xz
```
> or
```nginx
sudo pacman -U https://archive.archlinux.org/packages/p/python2-m2crypto/python2-m2crypto-0.23.0-2-x86_64.pkg.tar.xz
```
##### 2) install dependencies
```nginx
sudo pacman -S python2-setuptools python2-xlib python2-apsw python2-lxml python2-typing python-psutil
```

##### 3) install acestream
```nginx
yaourt -S acestream-engine acestream-mozilla-plugin acestream-player acestream-proxy acestream-proxy-player
```

##### 4) add repo and install libappindicator (then created icons in trey)
```nginx
vim /etc/pacman.conf 
```
```bash
              add  --> 
                      [ayatana]
                      # http://pkgbuild.com/~bgyorgy/ayatana.html
                      SigLevel = PackageRequired
                      Server = http://pkgbuild.com/~bgyorgy/$repo/os/$arch
```                  
```nginx
sudo pacman -Syy
sudo pacman -S libappindicator
```
### Configure acestream player for DLNA
> 1) play video content on tv or other device (without local plays) (min 1 stream transport)
```bash
#std{access=http,mux=ts,dst=:8902}
```
> 2) play video content on tv or other device and local plays (min 2 steam transport)
```bash
#duplicate{dst=std{access=http,mux=ts,dst=:8902},dst=display}
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/acestream_transport_dlna.png)

##### save torrent files in /home/acestream/streams
```bash
sudo chown -R $USER /home/acestream/streams
```

# Method 2 ( worked playlist switching him )
```nginx
yaourt -S snapd
systemctl start snapd.service
sudo snap install acestreamplayer --beta
```
