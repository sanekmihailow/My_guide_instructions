# kopano version database 8.5.5
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
* script "kopano-localized-folders_custom"
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

* script "kopano-create-user"

```sh
#!/bin/bash

user="$1"
pass="$2"
fname="$3"
email="${user}@chemz.ru"

    echo "$(kopano-admin -c ${user} -p ${pass} -e ${email} -f "${fname}")" 1> /dev/null  &&
    echo "$(kopano-localized-folders_custom -u ${user} --lang ru_RU.UTF-8)" 1> /dev/null &&
    echo -e "login - ${user}; password - ${pass}; email - ${email}; ФИО - ${fname} \nwas created"
    
exit 0
```


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
drwxr-xr-x  2 kopano kopano  340 фев  7 01:14 .
drwxr-xr-x 34 root   root   1100 фев  7 01:21 ..
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 dagent.pid
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 gateway.pid
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 ical.pid
-rw-rw-rw-  2 kopano kopano    0 фев  7 01:02 kopano.6708c740-2210
-rw-rw-rw-  2 kopano kopano    0 фев  7 01:03 kopano.6e332740-2910
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 monitor.pid
-rw-r--r--  1 kopano kopano    5 фев  7 01:03 presence.pid
-rw-rw-rw-  2 kopano kopano    0 фев  7 01:03 presence.pid.lock
srw-rw----  1 kopano kopano    0 фев  7 01:14 prio.sock
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 search.pid
-rw-rw-rw-  2 kopano kopano    0 фев  7 01:02 search.pid.lock
srwx------  1 kopano kopano    0 фев  7 01:14 search.sock
-rw-r--r--  1 kopano kopano    5 фев  7 01:14 server.pid
srw-rw-rw-  1 kopano kopano    0 фев  7 01:14 server.sock
-rw-r--r--  1 kopano kopano    5 фев  7 01:02 spooler.pid
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

### Change Rlimit
> [error  ] WARNING: setrlimit(RLIMIT_NOFILE, 8192) failed, you will only be able to connect up to 1024 sockets. Either start the process as root, or increase user limits for open file descriptors (Operation not permitted)
```nginx
mkdir -p /etc/systemd/system/kopano-{server,spooler,dagent}.service.d
```
* /etc/systemd/system/kopano-[server,spooler,dagent].service.d/override.conf
```
[Service]
LimitNOFILE=8192:16384
```
* /etc/systemd/system.conf
```
DefaultLimitNOFILE=65536
```
* /etc/systemd/user.conf
```
DefaultLimitNOFILE=65536
```
* etc/security/limits.conf
```
* hard nofile 94000
* soft nofile 94000
* hard nproc 64000
* soft nproc 64000
root hard nofile 65000
root soft nofile 65000
root hard nproc 64000
root soft nproc 64000
```
* /etc/pam.d/common-session (add)
```
session required pam_limits.so
```
* /etc/pam.d/common-session-noninteractive (add)
```
session required pam_limits.so
```


#### kopani-migration-imap
> wants perl packager
```
apt install libfile-copy-recursive-perl libio-socket-ssl-perl libio-tee-perl libunicode-string-perl libarchive-cpio-perl \
libarchive-zip-perl libauthen-sasl-perl libbytes-random-secure-perl libcrypt-passwdmd5-perl libcrypt-random-seed-perl \
libdata-dump-perl libdigest-hmac-perl libfile-listing-perl libfile-stripnondeterminism-perl libfont-afm-perl libhtml-format-perl \
libhtml-form-perl libhtml-tree-perl libhttp-cookies-perl libhttp-daemon-perl libhttp-negotiate-perl liblwp-protocol-https-perl \
libmail-imapclient-perl libmail-sendmail-perl libmailtools-perl libmath-random-isaac-perl libmath-random-isaac-xs-perl \
libnet-http-perl libnet-smtp-ssl-perl libnginx-mod-http-perl libparse-recdescent-perl libreadonly-perl libsys-hostname-long-perl \
libtry-tiny-perl libwww-perl libwww-robotrules-perl
```

### Trouble shootings

<d>
  <details>
    <summary> AttributeError: /usr/bin/python: undefined symbol: magic_open </summary>
    
```python
kopano-search --reindex -u Daniel

Traceback (most recent call last):
  File "/usr/sbin/kopano-search", line 3, in <module>
    import kopano_search
  File "/usr/lib/python2.7/dist-packages/kopano_search/__init__.py", line 21, in <module>
    from kopano_search import plaintext
  File "/usr/lib/python2.7/dist-packages/kopano_search/plaintext.py", line 2, in <module>
    import magic
  File "/usr/lib/python2.7/dist-packages/magic/__init__.py", line 361, in <module>
    add_compat(globals())
  File "/usr/lib/python2.7/dist-packages/magic/__init__.py", line 325, in add_compat
    from magic import compat
  File "/usr/lib/python2.7/dist-packages/magic/compat.py", line 61, in <module>
    _open = _libraries['magic'].magic_open
  File "/usr/lib/python2.7/ctypes/__init__.py", line 379, in getattr
    func = self.getitem(name)
  File "/usr/lib/python2.7/ctypes/__init__.py", line 384, in getitem
    func = self._FuncPtr((name_or_ordinal, self))
AttributeError: /usr/bin/python: undefined symbol: magic_open
```
> solution: add magic in 8 str and edit 23 str and comment 101-103 str
```nginx
pip install python-magic
```
* /usr/lib/python2.7/dist-packages/magic/compat.py
```python
...
  7 import ctypes
  8 import magic
  9 from collections import namedtuple
...
15 def _init():
 16     """
 17     Loads the shared library through ctypes and returns a library
 18     L{ctypes.CDLL} instance
 19     """
 20     return ctypes.cdll.LoadLibrary(find_library('magic'))
 21 
 22 _libraries = {}
 23 _libraries['magic'] = magic
 24 #_libraries['magic'] = _init()
...
 98 _check = _libraries['magic'].magic_check
 99 _check.restype = c_int
 100 _check.argtypes = [magic_t, c_char_p]
 101 
 102 #_list = _libraries['magic'].magic_list
 103 #_list.restype = c_int
 104 #_list.argtypes = [magic_t, c_char_p]
...
```

</details>
</d>
