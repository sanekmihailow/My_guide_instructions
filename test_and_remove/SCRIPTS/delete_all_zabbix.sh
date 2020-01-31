#!/bin/bash

list="/etc/zabbix
/etc/zabbix/zabbix_server.conf.dpkg-new
/etc/zabbix/zabbix.conf.php
/etc/zabbix/zabbix_server.conf
/etc/zabbix/zabbix_agentd.d
/etc/zabbix/zabbix_agentd.conf
/etc/rc2.d/S04zabbix-server
/etc/rc2.d/S01zabbix-agent
/etc/rc5.d/S04zabbix-server
/etc/rc5.d/S01zabbix-agent
/etc/logrotate.d/zabbix-agent
/etc/logrotate.d/zabbix-server-mysql
/etc/init.d/zabbix-agent
/etc/init.d/zabbix-server
/etc/rc3.d/S04zabbix-server
/etc/rc3.d/S01zabbix-agent
/etc/rc0.d/K01zabbix-server
/etc/rc0.d/K01zabbix-agent
/run/zabbix
/run/systemd/generator.late/zabbix-server.service
/run/systemd/generator.late/zabbix-agent.service
/run/systemd/generator.late/graphical.target.wants/zabbix-server.service
/run/systemd/generator.late/graphical.target.wants/zabbix-agent.service
/run/systemd/generator.late/multi-user.target.wants/zabbix-server.service
/run/systemd/generator.late/multi-user.target.wants/zabbix-agent.service
/usr/share/doc/zabbix-get
/usr/share/doc/zabbix-release
/usr/share/man/man1/zabbix_get.1.gz
/usr/local/scripts/zabbix
/usr/local/scripts/zabbix/zabbix-scripts
/usr/local/src/zabbix
/usr/local/src/zabbix/zabbix-frontend-php_3.0.0-1+trusty_all.deb
/usr/local/src/zabbix/zabbix-server-mysql_3.0.0-1+trusty_amd64.deb
/var/log/zabbix
/var/lib/ucf/cache/:etc:zabbix:zabbix_agentd.conf
/var/lib/ucf/cache/:etc:zabbix:zabbix_server.conf
/var/lib/dpkg/info/zabbix-frontend-php.postrm
/var/lib/dpkg/info/zabbix-release.list
/var/lib/dpkg/info/zabbix-get.md5sums
/var/lib/dpkg/info/zabbix-agent.list
/var/lib/dpkg/info/zabbix-get.list
/var/lib/dpkg/info/zabbix-frontend-php.list
/var/lib/dpkg/info/zabbix-agent.postrm
/var/lib/dpkg/info/zabbix-release.md5sums
/var/lib/dpkg/info/zabbix-release.conffiles
/var/lib/dpkg/info/zabbix-server-mysql.list
/var/lib/dpkg/info/zabbix-server-mysql.postrm
/var/lib/apt/lists/repo.zabbix.com_zabbix_3.0_ubuntu_dists_bionic_main_binary-i386_Packages
/var/lib/apt/lists/repo.zabbix.com_zabbix_3.0_ubuntu_dists_bionic_InRelease
/var/lib/apt/lists/repo.zabbix.com_zabbix_3.0_ubuntu_dists_bionic_main_source_Sources
/var/lib/apt/lists/repo.zabbix.com_zabbix_3.0_ubuntu_dists_bionic_main_binary-amd64_Packages"

for i in $list; do
	rm -rf $list
done
exit 0
