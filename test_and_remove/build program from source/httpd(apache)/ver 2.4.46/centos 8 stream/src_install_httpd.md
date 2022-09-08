<d>
<details>
    <summary> Links </summary>

### install src httpd

[install httpd centos](https://blacksaildivision.com/how-to-install-apache-httpd-on-centos)   [install httpd centos 7](https://sysadminforest.com/howto/how-to-compile-and-install-apache-from-source-on-centos-7/)

[install httpd centos 6](https://www.linuxpathfinder.com/install-apache-24-from-source-on-centos-6-rhel-6)

[install httpd](https://textsegment.com/apache-httpd-build/)

[install httpd](https://meterpreter.org/centos-how-to-compile-and-install-apache-from-source-code/)

[compile apache2](https://linuxadmin.io/compile-apache-2-4-source/)

[get source rpm](https://habr.com/ru/post/301292/)

[create source rpm](https://rigaruchey.ru/nastrojjka/osnovy-rpm-upravlenie-paketami-v-rhel---rpm-udalenie-rpm-paketa/)

[create source rpm](https://habr.com/ru/post/246177/)

</details>
</d>

#### install build libs
```nginx
dnf groupinstall "Development tools"
dnf install autoconf automake openssl-devel pcre-devel libxslt-devel libxslt-devel
yum install autoconf expat-devel libtool libnghttp2-devel pcre-devel -y
```

#### get complie(configure) options with build original centos httpd package
```nginx
mkdir -p ~/DOWNLOAD/src/
yumdownloader --source httpd
rpm -ivh httpd-2.4.37-47.module_el8.6.0+1111+ce6f4ceb.1.src.rpm
vim ~/rpmbuild/SPECS/httpd.spec (search configure options)
```

#### prepare to build
```bash
cd ~/DOWNLOAD/src/
wget https://github.com/apache/httpd/archive/2.4.46.tar.gz
tar -xzvf 2.4.46.tar.gz
cd httpd-2.4.46/
wget https://github.com/apache/apr/archive/1.7.0.tar.gz
wget https://github.com/apache/apr-util/archive/1.7.0.tar.gz
tar -xzf 1.6.1.tar.gz -C srclib/
tar -xzf 1.7.0.tar.gz -C srclib/
cd srclib/
mv apr-1.7.0/ apr
mv apr-util-1.6.1/ apr-util
cd ../
./buildconf
```

#### build
```ruby
ffppath="/usr/local/MY_LOCAL/InstalleD/hhttpd_2.4.46"

./configure --prefix=$ffppath \
--enable-ssl --with-ssl \
-disable-md \
--enable-mpms-shared=all \
--with-included-apr \
--with-pcre \
--enable-pie \
--with-brotli \
--enable-suexec --with-suexec \
--enable-suexec-capabilities \
--with-suexec-syslog --without-suexec-logfile \
--enable-proxy --enable-proxy-fdpass \
--enable-cache --enable-disk-cache \
--enable-cgid --enable-cgi \
--enable-authn-anon --enable-authn-alias \
--disable-imagemap --disable-file-cache \
--enable-data \
--enable-echo --enable-mime-magic \
--enable-slotmem-plain \
--enable-systemd \
--enable-http2 \

make
make install
```



> php7_module copy from original httpd modules
