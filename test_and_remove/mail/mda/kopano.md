> ZG59G03R59L1AD8T7CHQ42V8B - ключ который высылают по почте (он всегда разный)
```nginx
sudo apt install apt-transport-https
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/core:/final/Ubuntu_18.04/Release.key |sudo apt-key add -
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_18.04/Release.key |sudo apt-key add -
```
* /etc/apt/source.list.d/kopano.list

```
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/core:/final/Ubuntu_18.04/ ./
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_18.04/ ./
```

```
sudo apt install mysql-server kopano-server-packages
sudo apt install kopano-webapp

#sudo apt install kopano-libs &&
#sudo apt install kopano-utils &&
#sudo apt install kopano-dagent kopano-gateway kopano-ical kopano-monitor kopano-search kopano-server kopano-spooler &&
#sudo apt install kopano-core python3-kopano
