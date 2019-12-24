> ZG59G03R59L1AD8T7CHQ42V8B - ключ который высылают по почте (он всегда разный)
```nginx
sudo curl https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_16.04/Release.key |sudo apt-key add -
```
* /etc/apt/source.list.d/kopano.list

```
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/core:/final/Ubuntu_16.04/ ./
deb https://serial:ZG59G03R59L1AD8T7CHQ42V8B@download.kopano.io/supported/webapp:/final/Ubuntu_16.04/ ./
```
