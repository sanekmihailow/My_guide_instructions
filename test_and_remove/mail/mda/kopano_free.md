### first install
```nginx
apt install openssh-server openssh-client
```
```nginx
apt install git vim vim-gtk cifs-utils samba nfs-common curl apt-rdepends software-properties-common lsb-release
#apt install nfs-kernel-server 
```
```nginx
apt install kopano-core kopano-webapp-common kopano-l10n z-push-backend-kopano z-push-backend-combined kopano-archiver kopano-presence \
kopano-webapp-folderwidgets kopano-webapp-nginx kopano-webapp-quickitems kopano-webapp-titlecounter

```

### Install postfix
> libsasl2-modules sasl2-bin нужно для нормального IMAP
```nginx
apt install postfix libsasl2-modules sasl2-bin postfix-mysql
sudo mysql_secure_installation
```

### Install webserver
```nginx
apt install nginx-light certbot
update-alternatives --set php /usr/bin/php7.2
```

### Install rspamd
```nginx
wget -O- https://rspamd.com/apt-stable/gpg.key |sudo apt-key add -
echo "deb http://rspamd.com/apt-stable/ $(lsb_release -cs) main" |sudo tee -a /etc/apt/sources.list.d/rspamd.list
apt update
apt install rspamd redis-server
```

##### script localize-folders
```nginx
apt install pip
apt install python-mapi
apt install python-pip
pip install mapi
$PYTHONPATH

```
* script
<details>
  
```python
# cat HOME_root/folders.py 
#! /usr/bin/python3
# SPDX-License-Identifier: AGPL-3.0-or-later
# -*- coding: utf-8 -*-
# vim: tabstop=8 expandtab shiftwidth=4 softtabstop=4
#
import gettext
import kopano
import locale
import sys
#C- add this to resolve error: "NameError: global name 'MAPI' is not defined"
from MAPI.Util import *
reload(sys)
sys.setdefaultencoding('utf-8')
#

if sys.hexversion >= 0x03000000:
    def _encode(s):
        return s
else: # pragma: no cover
    def _encode(s):
        return s.encode(sys.stdout.encoding or 'utf8')
def opt_args():
    parser = kopano.parser('skpfuc')
    parser.add_option("--lang", dest="lang", action="store", help="A <lang> could be: nl_NL.UTF-8")
    parser.add_option("--reset", dest="reset", action="store_true", help="Reset the folder names to Default English")
    parser.add_option("--dry-run", dest="dryrun", action="store_true", help="Run script without making modifications")
    parser.add_option("--verbose", dest="verbose", action="store_true", help="Run script with output")
    return parser.parse_args()
def translate(lang, reset):
    if reset or 'en_gb' in lang.lower():
        trans = {"sentmail": "Sent Items",
                 "outbox": "Outbox",
                 "wastebasket": "Deleted Items",
                 "inbox": "Inbox",
                 "calendar": "Calendar",
                 "contacts": "Contacts",
                 "suggested_contacts": "Suggested Contacts",
                 "drafts": "Drafts",
                 "journal": "Journal",
                 "notes": "Notes",
                 "tasks": "Tasks",
                 "rss": "RSS Feeds",
                 "junk": "Junk E-mail"}
    else:
        try:
            locale.setlocale(locale.LC_ALL, lang)
        except locale.Error:
            print('Error: %s Is not a language pack or is not installed' % _encode(lang))
            sys.exit(1)
        encoding = locale.getlocale()[1]
        if "UTF-8" not in encoding:
            print('Error: Locale "%s" is in "%s" not in UTF-8, please select an appropriate UTF-8 locale.' % (
                _encode(lang), _encode(encoding)))
            sys.exit(1)
        try:
            t = gettext.translation('kopano', "/usr/share/locale", languages=[locale.getlocale()[0]])
            _ = t.gettext
        except (ValueError, IOError):
            print('Error: kopano is not translated in %s' % _encode(lang))
            sys.exit(1)
        trans = {"sentmail": _("Sent Items"),
                 "outbox": _("Outbox"),
                 "wastebasket": _("Deleted Items"),
                 "inbox": _("Inbox"),
                 "calendar": _("Calendar"),
                 "contacts": _("Contacts"),
                 "suggested_contacts": _("Suggested Contacts"),
                 "drafts": _("Drafts"),
                 "journal": _("Journal"),
                 "notes": _("Notes"),
                 "tasks": _("Tasks"),
                 "rss": _("RSS Feeds"),
                 "junk": _("Junk E-mail")}
    return trans
def main():
    options, args = opt_args()
    if not options.lang and not options.reset:
        print('Usage:\n%s -u <username> --lang <language>' % sys.argv[0])
        sys.exit(1)
    trans = translate(options.lang, options.reset)
    for user in kopano.Server(options).users(options.users):
        print(_encode(user.name))
        if options.reset:
            print('%s: Changing localized folder names to \"en_GB.UTF-8\"' % _encode(user.name))
        else:
            print('%s: Changing localized folder names to \"%s\"' % (_encode(user.name), _encode(options.lang)))
        if options.verbose:
            print('Running in verbose mode')
        if options.dryrun:
            print('Running in dry mode no changes will be made')
        for mapifolder in trans:
            try:
                folderobject = getattr(user.store, mapifolder)
            except AttributeError as e:
                print('Warning: Cannot find MAPI folder %s, error code: %s' % (_encode(mapifolder), e))
                continue
            localizedname = trans[mapifolder]
            if options.verbose or options.dryrun:
                print('Changing MAPI "%s" -> Renaming "%s" to "%s"' % (_encode(mapifolder), _encode(folderobject.name), _encode(localizedname)))
            if not options.dryrun:
                try:
                    folderobject.name = localizedname
                except MAPI.Struct.MAPIErrorCollision:
                    print('%s is already being used' % _encode(localizedname))
                    sys.exit(1)
if __name__ == "__main__":
    main()
```

</details>

### ADD legal ssl cert
```nginx
certbot certonly --standalone --preferred-challenges http -d chemz.ru --dry-run
```

### Check folder
```nginx
ls -la /var/run/kopano
```
<details>
  
```
drwxr-xr-x  2 kopano kopano  260 фев  6 15:02 .
drwxr-xr-x 34 root   root   1140 фев  6 14:55 ..
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 dagent.pid
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 gateway.pid
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 ical.pid
-rw-rw-rw-  2 kopano kopano    0 фев  5 22:46 kopano.fb09c740-1973
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 monitor.pid
srw-rw----  1 kopano kopano    0 фев  6 15:02 prio.sock
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 search.pid
-rw-rw-rw-  2 kopano kopano    0 фев  5 22:46 search.pid.lock
-rw-r--r--  1 kopano kopano    6 фев  6 15:02 server.pid
srw-rw-rw-  1 kopano kopano    0 фев  6 15:02 server.sock
-rw-r--r--  1 kopano kopano    5 фев  5 22:46 spooler.pid
```
  
</details>

### Create legal certs
```nginx
systemct stop nginx
certbot certonly --standalone --preferred-challenges http -d examle.com --dry-run
certbot certonly --standalone --preferred-challenges http -d example.com
ln -s /etc/letsencrypt/live/example.com/fullchain.pem /etc/kopano/ssl/
ln -s /etc/letsencrypt/live/example.com/privkey.pem /etc/kopano/ssl/
systemctl start nginx
```
