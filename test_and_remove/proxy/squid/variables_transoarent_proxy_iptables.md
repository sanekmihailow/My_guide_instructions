```bash
iptables -t nat -A PREROUTING -s 192.168.8.3 -p tcp --dport 80 -j ACCEPT
iptables -t nat -A PREROUTING -p tcp --dport 80 -j DNAT --to-destination 192.168.8.3:8080
iptables -t nat -A POSTROUTING -j MASQUERADE
```
```bash
iptables -t nat -A PREROUTING -i eth1 -p tcp --dport 80 -j DNAT --to SQUID_IP:3128
iptables -t nat -A PREROUTING -i eth0 -p tcp --dport 80 -j REDIRECT --to-port 3128
```
```bash
iptables -t mangle -F
iptables -t mangle -A PREROUTING -d 10.80.2.2 -j ACCEPT
iptables -t mangle -N DIVERT
iptables -t mangle -A DIVERT -j MARK --set-mark 1
iptables -t mangle -A DIVERT -j ACCEPT
iptables -t mangle -A PREROUTING -p tcp -m socket -j DIVERT
iptables -t mangle -A PREROUTING -p tcp --dport 80 -j TPROXY --tproxy-mark 0x1/0x1 --on-port 3129
```
```bash
iptables -A INPUT -p TCP -s 192.168.10.0/24 --dport 3128 -j ACCEPT
iptables -t nat -A PREROUTING  -s 192.168.10.0/24 -p tcp -m tcp --dport 80 -j REDIRECT --to-ports 3128
```
```bash
iptables -t nat -A PREROUTING -s 192.168.0.0/24 -p tcp -m tcp --dport 80 -j REDIRECT --to-ports 3129
```
```bash
iptables -I INPUT -i lo -j ACCEPT
iptables -t filter -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -t filter -A FORWARD -i eth0 -p tcp --dport 443 -j ACCEPT
iptables -t nat -A POSTROUTING -o eth1 -j SNAT --to-source x.x.x.x - внешний IP eth0 lan, eth1 wan
```
```bash
# Включаем форвардинг пакетов
 echo 1 > /proc/sys/net/ipv4/ip_forward
 # Разрешаем трафик на loopback-интерфейсе
 iptables -A INPUT -i lo -j ACCEPT
 # Разрешаем доступ из внутренней сети наружу
 iptables -A FORWARD -i eth1 -o eth0 -j ACCEPT
 # Включаем NAT
 iptables -t nat -A POSTROUTING -o eth0 -s 10.0.0.0/24 -j MASQUERADE 
 # Разрешаем ответы из внешней сети
 iptables -A FORWARD -i eth0 -m state --state ESTABLISHED,RELATED -j ACCEPT
 # Запрещаем доступ снаружи во внутреннюю сеть
 iptables -A FORWARD -i eth0 -o eth1 -j REJECT
  # Делаем прозрачный прокси
 iptables -t nat -A PREROUTING -i eth1 -d ! 10.0.0.0/24 -p tcp -m multiport --dport 80,8080 -j DNAT --t o 10.0.0.1:3128
```
```bash
iptables -t NAT -A PREROUTING -d ! адрес_самого_сервера -i внутренний_сетевой_интерфейс -p tcp -m tcp --dport 80 -j REDIRECT --to-ports 3128
или так
iptables -t nat -A PREROUTING -p tcp -d 0/0 --dport www -i внутренний_сетевой_интерфейс -j DNAT --to локальный_адрес_на_котором_слушает_прокси:3128
```
```bash
iptables -t nat -A PREROUTING -p tcp -i eth0 --dport 80 -j DNAT --to-destination 192.168.0.251:3128
```
```bash
iptables -t nat -A PREROUTING -i tun0 ! -d 10.8.0.0/24 -p tcp -m multiport --dports 80 -j REDIRECT --to-ports 3128
```
```bash
# Включаем NAT 
-A POSTROUTING -o eth0 -s 192.168.0.0/24 -j MASQUERADE
#for squid 
-A PREROUTING -s 192.168.0.0/24 ! -d  192.168.0.100 -p tcp -m multiport --dport 80,8080 -j REDIRECT --to-port 3128
-A PREROUTING -s 192.168.0.0/24 ! -d  192.168.0.100 -p udp -m multiport --dport 80,8080 -j REDIRECT --to-port 3128
```
```bash
sudo iptables -t nat -A PREROUTING -i eth1 -d ! 192.168.1.0/24 -p tcp -m multiport --dport 80,8080 -j DNAT --to 192.168.0.1:3128
sudo iptables -t nat -A PREROUTING -i eth2 -d ! 192.168.2.0/24 -p tcp -m multiport --dport 80,8080 -j DNAT --to 192.168.0.1:3128
```
```bash
# Включаем форвардинг пакетов
echo 1 > /proc/sys/net/ipv4/ip_forward
# Разрешаем трафик на loopback-интерфейсе
iptables -A INPUT -i lo -j ACCEPT
# Разрешаем доступ из внутренней сети наружу
iptables -A FORWARD -i eth1 -o eth0 -j ACCEPT
# Включаем NAT
iptables -t nat -A POSTROUTING -o eth0 -s 192.168.5.0/24 -j MASQUERADE
# Разрешаем ответы из внешней сети
iptables -A FORWARD -i eth0 -m state —state ESTABLISHED,RELATED -j ACCEPT
# Запрещаем доступ снаружи во внутреннюю сеть
iptables -A FORWARD -i eth0 -o eth1 -j REJECT
#Заворачиваем http на прокси
iptables -t nat -A PREROUTING -i eth1 -d ! 192.168.5.0/24 -p tcp -m multiport --dport 80,8080 -j DNAT --to 192.168.5.104:3128
```

* много

```bash
#-------------УДАЛЯЕМ ВСЕ НАСТРОЙКИ----------------
IPTABLES="/sbin/iptables"
$IPTABLES -P INPUT ACCEPT
$IPTABLES -P FORWARD ACCEPT
$IPTABLES -P OUTPUT ACCEPT
$IPTABLES -t nat -P PREROUTING ACCEPT
$IPTABLES -t nat -P POSTROUTING ACCEPT
$IPTABLES -t nat -P OUTPUT ACCEPT
$IPTABLES -t mangle -P PREROUTING ACCEPT
$IPTABLES -t mangle -P OUTPUT ACCEPT
$IPTABLES -F
$IPTABLES -t nat -F
$IPTABLES -t mangle -F
$IPTABLES -X
$IPTABLES -t nat -X
$IPTABLES -t mangle -X
###############################################################################
#-------------Настраиваем----------------
# 1.1 Настройки сети 
INET_IP="10.10.0.2/30"
INET_IFACE="eth0"
INET_BROADCAST="255.255.255.255"
# локалка
LAN_IP="192.168.0.0/24"
LANN="192.168.0.1"
LAN_IP_RANGE="192.168.10.0/24"
LAN_IP_RANGE2="192.168.20.0/24"
LAN_IFACE="eth1"
# локалхост
LO_IFACE="lo"
LO_IP="127.0.0.1"
#Открытые порты (через пробел)
open_tcp_ports="22 80 443 3126 3127 3128 10000"
open_udp_ports="123"
open_icmp_state="8 11"
###########################################################################
# 2. Module loading.
/sbin/depmod -a
/sbin/modprobe ip_tables
/sbin/modprobe ip_conntrack
/sbin/modprobe iptable_filter
/sbin/modprobe iptable_mangle
/sbin/modprobe iptable_nat
/sbin/modprobe ipt_LOG
/sbin/modprobe ipt_limit
/sbin/modprobe ipt_state
###########################################################################
# 3.1 Включаем режим роутера
echo "1" > /proc/sys/net/ipv4/ip_forward
# ----------------------Правила----------------------------------
# 4.1 ТАБЛИЦА Filter
#Умолчания
$IPTABLES -P INPUT DROP
$IPTABLES -P OUTPUT DROP
$IPTABLES -P FORWARD DROP
#Создаем цепочки
$IPTABLES -N bad_tcp_packets
                $IPTABLES -A bad_tcp_packets -p tcp --tcp-flags SYN,ACK SYN,ACK -m state --state NEW -j REJECT --reject-with tcp-reset
                $IPTABLES -A bad_tcp_packets -p tcp ! --syn -m state --state NEW -j LOG --log-prefix "New not syn:"
                $IPTABLES -A bad_tcp_packets -p tcp ! --syn -m state --state NEW -j DROP

$IPTABLES -N allowed
                $IPTABLES -A allowed -p TCP --syn -j ACCEPT
                $IPTABLES -A allowed -p TCP -m state --state ESTABLISHED,RELATED -j ACCEPT
                $IPTABLES -A allowed -p TCP -j DROP

$IPTABLES -N tcp_packets
                for open_tcp in $open_tcp_ports
                        do
                        $IPTABLES -A tcp_packets -p TCP --dport $open_tcp -j allowed
                done

$IPTABLES -N udp_packets
                for open_udp in $open_udp_ports
                        do
                        $IPTABLES -A udp_packets -p UDP --dport $open_udp -j allowed
                done

$IPTABLES -N icmp_packets
                for open_icmp in $open_icmp_state
                        do
                        $IPTABLES -A icmp_packets -p ICMP --icmp-type $open_icmp -j ACCEPT
                done
                
# 4.1.4 ТАБЛИЦА INPUT
# Подключения к прокси
# Сначала пропускаем уже ранее установленые соединения
$IPTABLES -A INPUT -p tcp -j bad_tcp_packets
$IPTABLES -A INPUT -i $INET_IFACE -d $INET_IP -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A INPUT -i $LAN_IFACE -d $LAN_IP -m state --state ESTABLISHED,RELATED -j ACCEPT
# пропускаем соединения к прокси от локалки и лупбак
$IPTABLES -A INPUT -i $LAN_IFACE -s $LAN_IP_RANGE -j ACCEPT
$IPTABLES -A INPUT -i $LAN_IFACE -s $LAN_IP_RANGE2 -j ACCEPT
$IPTABLES -A INPUT -i $LO_IFACE -s $LO_IP -j ACCEPT
$IPTABLES -A INPUT -i $LO_IFACE -s $LAN_IP -j ACCEPT
$IPTABLES -A INPUT -i $LO_IFACE -s $INET_IP -j ACCEPT
# фильтруем открытые порты для разных протоколов
$IPTABLES -A INPUT -p TCP -i $LAN_IFACE -s $LAN_IP_RANGE  -j tcp_packets
$IPTABLES -A INPUT -p TCP -i $LAN_IFACE -s $LAN_IP_RANGE2  -j tcp_packets
$IPTABLES -A INPUT -p UDP -i $LAN_IFACE -s $LAN_IP_RANGE -j udp_packets
$IPTABLES -A INPUT -p UDP -i $LAN_IFACE -s $LAN_IP_RANGE2 -j udp_packets
$IPTABLES -A INPUT -p ICMP -i $LAN_IFACE -s $LAN_IP_RANGE -j icmp_packets
$IPTABLES -A INPUT -p ICMP -i $LAN_IFACE -s $LAN_IP_RANGE2 -j icmp_packets
$IPTABLES -A INPUT -i $INET_IFACE -d 224.0.0.0/8 -j DROP
$IPTABLES -A INPUT -m limit --limit 3/minute --limit-burst 3 -j LOG --log-level debug --log-prefix "IPT INPUT packet died: "
# 4.1.5 ТАБЛИЦА FORWARD
$IPTABLES -A FORWARD -p tcp -j bad_tcp_packets
#$IPTABLES -A FORWARD -i $LAN_IFACE -j ACCEPT
$IPTABLES -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPTABLES -A FORWARD -m limit --limit 3/minute --limit-burst 3 -j LOG --log-level debug --log-prefix "IPT FORWARD packet died: "
# 4.1.6 ТАБЛИЦА OUTPUT
$IPTABLES -A OUTPUT -p tcp -j bad_tcp_packets
$IPTABLES -A OUTPUT -s $LO_IP -j ACCEPT
$IPTABLES -A OUTPUT -s $LAN_IP -j ACCEPT
$IPTABLES -A OUTPUT -s $INET_IP -j ACCEPT
$IPTABLES -A OUTPUT -m limit --limit 3/minute --limit-burst 3 -j LOG --log-level debug --log-prefix "IPT OUTPUT packet died: "
# 4.2 ТАБЛИЦА nat
$IPTABLES -A PREROUTING ! -d $LAN_IP -i eth1 -p tcp -m tcp --dport 80 -j DNAT --to-destination $LANN:3126
$IPTABLES -A PREROUTING ! -d $LAN_IP -i eth1 -p tcp -m tcp --dport 443 -j DNAT --to-destination $LANN:3127
#$IPTABLES -A POSTROUTING -o eth0 -j MASQUERADE
```
* не мало
```
#!/bin/sh
IF_INT="eth0"
IF_EXT="eth1"
IPT="/sbin/iptables"

$IPT --flush
$IPT -t nat --flush
$IPT -t mangle --flush
$IPT -X

$IPT -A INPUT -i lo -j ACCEPT
$IPT -A OUTPUT -o lo -j ACCEPT

$IPT -P INPUT DROP
$IPT -P OUTPUT DROP
$IPT -P FORWARD DROP

echo 1 > /proc/sys/net/ipv4/ip_forward

$IPT -t nat -A PREROUTING -i $IF_INT -p tcp -m multiport --dport 80,8080 -j REDIRECT --to-port 3128

$IPT -A FORWARD -i $IF_INT -o $IF_EXT -m state --state NEW,ESTABLISHED,RELATED -j ACCEPT

$IPT -A FORWARD -i $IF_EXT -o $IF_INT -m state --state ESTABLISHED,RELATED -j ACCEPT

$IPT -t nat -A POSTROUTING -p tcp -o $IF_EXT -j SNAT --to-source 11.22.33.44

$IPT -A INPUT -p tcp ! --syn -m state --state NEW -j DROP
$IPT -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPT -A INPUT -i $IF_INT -p tcp --dport 3128 -j ACCEPT
$IPT -A INPUT -i $IF_INT -p tcp --dport 22 -j ACCEPT
$IPT -A INPUT -i $IF_INT -p icmp -j ACCEPT

$IPT -A OUTPUT -m state --state  NEW,ESTABLISHED,RELATED -j ACCEPT
$IPT -A OUTPUT -o $IF_INT -p tcp --dport 3128 -m state --state ESTABLISHED,RELATED -j ACCEPT
```
## zerg
```bash
#!/bin/bash

export IPT="iptables"

# Внешний интерфейс
export WAN=eth0
export WAN_IP=85.31.203.127

# Локальная сеть
export LAN1=eth1
export LAN1_IP_RANGE=10.1.3.0/24

# Очищаем правила
$IPT -F
$IPT -F -t nat
$IPT -F -t mangle
$IPT -X
$IPT -t nat -X
$IPT -t mangle -X

# Запрещаем все, что не разрешено
$IPT -P INPUT DROP
$IPT -P OUTPUT DROP
$IPT -P FORWARD DROP

# Разрешаем localhost и локалку
$IPT -A INPUT -i lo -j ACCEPT
$IPT -A INPUT -i $LAN1 -j ACCEPT
$IPT -A OUTPUT -o lo -j ACCEPT
$IPT -A OUTPUT -o $LAN1 -j ACCEPT

# Рзрешаем пинги
$IPT -A INPUT -p icmp --icmp-type echo-reply -j ACCEPT
$IPT -A INPUT -p icmp --icmp-type destination-unreachable -j ACCEPT
$IPT -A INPUT -p icmp --icmp-type time-exceeded -j ACCEPT
$IPT -A INPUT -p icmp --icmp-type echo-request -j ACCEPT

# Разрешаем исходящие подключения сервера
$IPT -A OUTPUT -o $WAN -j ACCEPT
#$IPT -A INPUT -i $WAN -j ACCEPT

# разрешаем установленные подключения
$IPT -A INPUT -p all -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPT -A OUTPUT -p all -m state --state ESTABLISHED,RELATED -j ACCEPT
$IPT -A FORWARD -p all -m state --state ESTABLISHED,RELATED -j ACCEPT

# Отбрасываем неопознанные пакеты
$IPT -A INPUT -m state --state INVALID -j DROP
$IPT -A FORWARD -m state --state INVALID -j DROP

# Отбрасываем нулевые пакеты
$IPT -A INPUT -p tcp --tcp-flags ALL NONE -j DROP

# Закрываемся от syn-flood атак
$IPT -A INPUT -p tcp ! --syn -m state --state NEW -j DROP
$IPT -A OUTPUT -p tcp ! --syn -m state --state NEW -j DROP

# Блокируем доступ с указанных адресов
#$IPT -A INPUT -s 84.122.21.197 -j REJECT

# Пробрасываем порт в локалку
#$IPT -t nat -A PREROUTING -p tcp --dport 23543 -i ${WAN} -j DNAT --to 10.1.3.50:3389
#$IPT -A FORWARD -i $WAN -d 10.1.3.50 -p tcp -m tcp --dport 3389 -j ACCEPT

# Разрешаем доступ из локалки наружу
$IPT -A FORWARD -i $LAN1 -o $WAN -j ACCEPT
# Закрываем доступ снаружи в локалку
$IPT -A FORWARD -i $WAN -o $LAN1 -j REJECT


# Включаем NAT
$IPT -t nat -A POSTROUTING -o $WAN -s $LAN1_IP_RANGE -j MASQUERADE

# открываем доступ к SSH
$IPT -A INPUT -i $WAN -p tcp --dport 22 -j ACCEPT

# Открываем доступ к почтовому серверу
#$IPT -A INPUT -p tcp -m tcp --dport 25 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 465 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 110 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 995 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 143 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 993 -j ACCEPT

#Открываем доступ к web серверу
#$IPT -A INPUT -p tcp -m tcp --dport 80 -j ACCEPT
#$IPT -A INPUT -p tcp -m tcp --dport 443 -j ACCEPT

#Открываем доступ к DNS серверу
#$IPT -A INPUT -i $WAN -p udp --dport 53 -j ACCEPT

# Включаем логирование
#$IPT -N block_in
#$IPT -N block_out
#$IPT -N block_fw

#$IPT -A INPUT -j block_in
#$IPT -A OUTPUT -j block_out
#$IPT -A FORWARD -j block_fw

#$IPT -A block_in -j LOG --log-level info --log-prefix "--IN--BLOCK"
#$IPT -A block_in -j DROP
#$IPT -A block_out -j LOG --log-level info --log-prefix "--OUT--BLOCK"
#$IPT -A block_out -j DROP
#$IPT -A block_fw -j LOG --log-level info --log-prefix "--FW--BLOCK"
#$IPT -A block_fw -j DROP

# Сохраняем правила
/sbin/iptables-save  > /etc/sysconfig/iptables
```
