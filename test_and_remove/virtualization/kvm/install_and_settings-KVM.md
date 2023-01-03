


# Links
<d>
    <details>

<table>
 <tr>
   <td> Centos 6 </td>
   <td>
   
[habr](https://habr.com/ru/post/168791/), 
[rus-linux.net](http://rus-linux.net/MyLDP/vm/ustanovka-kvm-v-centOS.html) , 
[adminunix.ru](https://adminunix.ru/ustanovka-i-nastrojka-kvm-pod-upravlenie/)
   
   </td>
 </tr>  
 <tr>
  <td> Centos 7 </td>
  <td>

[infoit.com.ua](https://infoit.com.ua/linux/ustanovka-i-nastrojka-gipervizora-kvm-na-centos/) , 
[poseti.net](https://www.poseti.net/articles/centos-7-nastrojka-kvm) , 
[dmosk.ru](https://www.dmosk.ru/miniinstruktions.php?mini=kvm-centos7) , 
[winitpro.ru](https://winitpro.ru/index.php/2020/02/04/ustanovka-zapusk-kvm-v-linux-centos/) , 
[goload.ru](https://goload.ru/ustanovka-virtualizatsii-kvm-centos-b/)

  </td>
 </tr>
 <tr>
  <td> Ubuntu </td>
  <td>

[khashtamov.com](https://khashtamov.com/ru/kvm-setup-server/) , 
[less-it.ru](https://less-it.ru/virtualization/ustanovka-i-nastrojka-qemu-kvm) , 
[losst.pro](https://losst.pro/ustanovka-kvm-ubuntu-16-04) , 
[dmosk](https://www.dmosk.ru/miniinstruktions.php?mini=kvm-ubuntu) , 

  </td>

 </tr>
</table>

</details>
</d>

# Настройка и Установка KVM

### поддержка виртуализации

```bash
cat /proc/cpuinfo | egrep "vmx|svm"
```



### установка пакетов kvm

~~`yum install libvirt libvirt-python libguestfs-tools qemu-kvm virt-install –y`~~

```nginx
yum install @virt virt-manager -y
yum install virt-top libguestfs-tools  virt-install virt-viewer -y
```

#### Проверим, правильно ли установлен KVM
```bash
lsmod | grep kvm
```

1. Запустим libvirtd
```nginx
sudo systemctl start libvirtd.service && sudo systemctl enable libvirtd.service
```

2. нужно настроить сеть через bridge
```nginx
yum install bridge-utils -y
# > ip a (show virb0)
cp /etc/sysconfig/network-scripts/ifcfg-enp1s0{,.bak}
```
3. редактируем содержимое
```nginx
vim /etc/sysconfig/network-scripts/ifcfg-enp1s0
```
```bash
DEVICE="enp1s0f0"
ONBOOT="yes"
BRIDGE=br0
#BOOTPROTO=none #(не использоватоь DCHP т.е. Static)
```
4. создать новый конф файл
```nginx
vim /etc/sysconfig/network-scripts/ifcfg-br0
```
```
DEVICE="br0"
TYPE=BRIDGE
ONBOOT=yes
BOOTPROTO=static
IPADDR="<192.168.0.5>"
NETMASK="255.255.255.0"
GATEWAY="<192.168.0.1>"
DNS1="77.88.8.8"
DNS2="8.8.4.4"
```
5. перезапуск ес сервиса
```nginx
service network restart
```

`brctl show`
6. Настроить сервер в качестве роутера
```nginx
echo -e "net.ipv4.ip_forward=1" >> /etc/sysctl.conf && sysctl -p
```
`service libvirtd restart`


# Создание виртуальных машин
### Перед созданием виртуальной машины, скачиваем образ
~~`mkdir -p /vz/{disk,iso} && cd /vz/iso && wget https://mirror.yandex.ru/centos/8.1.1911/isos/x86_64/CentOS-8.1.1911-x86_64-dvd1.iso`~~

`mkdir -p /kvm/{images,iso}`

1. Обновление базы операционный систем
> Со временем список операционных устаревает и его необходимо обновлять.
```nginx
wget https://releases.pagure.org/libosinfo/osinfo-db-20221130.tar.xz

osinfo-db-import --system osinfo-db-20210621.tar.xz
```

Смотрим доступные варианты гостевых операционных систем

`osinfo-query os`

2. Создать новую виртуалную машину KVM
```nginx
virt-install -n test-centos \
--noautoconsole \
--network=bridge:br0 \
--ram 1024 \
--arch=x86_64 \
--vcpus=1 \
--cpu host \
--check-cpu \
--disk path=/kvm/images/test-centos.img,size=32 \
--cdrom /kvm/iso/CentOS-8.1.1911-x86_64-dvd1.iso \
--graphics vnc,listen=0.0.0.0,password=123456789 \
--os-type linux \
--os-variant=rhel7 \
--boot cdrom,hd,menu=on
```

3. Чтобы ВМ загружалась автоматически, выполните:
```nginx
virsh autostart test-centos
```

4. получим порт vnc для подключения
```nginx
virsh vncdisplay test-centos
# 0 (означает 5900), 10 (5910) .....
```

# Команды virsh

<table>
 <tr>
  <td> 
  
  ```nginx
  virsh shutdown test-centos
   ``` 
   </td>
  <td> выключить вирт машину </td>
 </tr>
  <tr>
  <td>
    
  ```nginx
  virsh list --all
   ``` 
   </td>
  <td> показать список всех имеющихчся виртуальных машин </td>
 </tr> 
  <tr>
  <td>
    
  ```nginx
 virsh net-list
   ``` 
   </td>
  <td> Посмотреть список возможных сетей </td>
 </tr> 
  <tr>
  <td> </td>
  <td> </td>
 </tr> 
</table>

```bash
virsh start vm1
virsh destroy vm1
virsh suspend vm1
virsh resume FirstTest
virsh attach-disk vm1 /home/iso/CentOS-7-x86_64-Minimal-1503-01.iso hda --type cdrom --mode readonly
virsh attach-disk vm1 "" hda --type cdrom --mode readonly
virsh autostart vm1 --disable Domain vm1 unmarked as autostarted
virsh undefine FirstTest
virsh edit FirstTest
virsh snapshot-create-as --domain FirstTest --name FirstTest_snapshot_$(date +%F)
virsh snapshot-list --domain FirstTest
virsh snapshot-delete --domain FirstTest --snapshotname FirstTest_snapshot_2020-03-21
```

- Для применения снапшота, сначала мы должны остановить виртуальную машину
```bash
virsh shutdown FirstTest
virsh snapshot-revert --domain FirstTest --snapshotname FirstTest_snapshot_2020-03-21 --running

```

-  отправить команду всем гостевым операционным системам:
```bash
for i in $(virsh list --name --state-shutoff); do virsh start $i; done
for i in $(virsh list --name --state-running); do virsh shutdown $i; done
```

-  Клонирование виртуальных машин
```bash
virsh suspend FirstTest
virt-clone --original FirstTest --name SecondTest --file /kvm/images/SecondTest-disk1.img
virsh resume FirstTest
```

- Добавление диска
```bash
qemu-img create -f raw /kvm/images/FirstTest-disk2.img 4G
virsh attach-disk --persistent VMname /kvm/images/FirstTest-disk2.img vdb --cache none
virsh blockresize VMname /kvm/images/FirstTest-disk2.img 4G
```

- Изменение размера диска
```bash
virsh domblklist FirstTest
virsh shutdown FirstTest
qemu-img resize /kvm/images/FirstTest-disk1.img +100G
virsh start FirstTest
virsh blockresize FirstTest /kvm/images/FirstTest-disk1.img 200G
qemu-img info /kvm/images/FirstTest-disk1.img
```

# Установка вебморды для управления

## 1) Ovirt
```nginx
yum install http://resources.ovirt.org/pub/yum-repo/ovirt-release41.rpm
yum install ovirt-engine
engine-setup
```
> После окончания установки в браузере вводим **https://ip.kvm-server/ovirt-engine/sso/**

- Selinux
```bash
semanage fcontext --add -t virt_image_t '/kvm/images(/.*)?'
#yum provides /usr/sbin/semanage
#yum -y install policycoreutils-python
```

-    7 шагов
```
1. Шаг — Подготовка
2. Шаг — Создание хранилища для виртуальных машин (Storage Pool)
3. Шаг — Настройка сети на хост-сервере
4. Шаг — Установка новой виртуальной машины
5. Шаг — Настройка сети в случае «серых» IP-адресов в ВМ
6. Шаг — Подготовка к управлению виртуальными машинами удаленного сервера с удобным графическим интерфейсом (используя virt-manager)
7. Шаг — Непосредственный запуск virt-manager
```

Опционально: можно улучшить быстродействие соединения bridge, поправив настройки `vim /etc/sysctl.conf`
```bash
net.bridge.bridge-nf-call-ip6tables = 0 
net.bridge.bridge-nf-call-iptables = 0 
net.bridge.bridge-nf-call-arptables = 0
```
`sysctl -p /etc/sysctl.conf && service libvirtd reload`
