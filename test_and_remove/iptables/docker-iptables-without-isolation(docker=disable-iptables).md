https://fralef.me/docker-and-iptables.html , https://switch-case.ru/71592679
```haskell
-A INPUT -i lo -j ACCEPT
-A INPUT -p tcp -m multiport --dports 22,53,80,443,25,465,587,993,995 -j ACCEPT
-A INPUT -p tcp -m tcp --dport 10000 -s 0.0.0.0/0 -j ACCEPT
-A OUTPUT -o lo -j ACCEPT

-A FORWARD -i docker0 -o eth0 -j ACCEPT
-A FORWARD -i eth0 -o docker0 -j ACCEPT
```
https://www.casp.ru/docker-iptables/
```haskell
iptables -t nat -N DOCKER
iptables -t nat -A PREROUTING -m addrtype --dst-type LOCAL -j DOCKER
iptables -t nat -A OUTPUT ! -d 127.0.0.0/8 -m addrtype --dst-type LOCAL -j DOCKER
iptables -t nat -A POSTROUTING -s 172.17.0.0/16 ! -o docker0 -j MASQUERADE
iptables -t nat -A DOCKER -i docker0 -j RETURN

iptables -A INPUT -p udp -m udp --dport 53 -j ACCEPT
iptables -A INPUT -p tcp -m tcp --dport 53 -j ACCEPT
iptables -A INPUT -p tcp -m tcp -m multiport --dports 80,443 -m comment --comment "WEB ACCESS" -j ACCEPT
iptables -N DOCKER
iptables -A FORWARD -o docker0 -j DOCKER
```
https://www.reddit.com/r/docker/comments/a7omgx/what_are_proper_iptables_rules_for_docker_host/
```haskell
-A INPUT -i lo -j ACCEPT
-A INPUT -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT
-A INPUT -p icmp -m icmp --icmp-type 8 -j ACCEPT
-A INPUT -p tcp -m multiport --dports 22,3306 -j ACCEPT # Open SSH, MySQL ports on host <<<<<<<<<<<
-A INPUT -j REJECT --reject-with icmp-port-unreachable
-A FORWARD -j REJECT --reject-with icmp-port-unreachable
-A OUTPUT -j ACCEPT
-A DOCKER-USER -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT
-A DOCKER-USER -p tcp --dport 3306 -j ACCEPT
-A DOCKER-USER -j DROP # Drop everything else from Docker
```
https://medium.com/@ebuschini/iptables-and-docker-95e2496f0b45
```haskell
iptables -A INPUT -p tcp --dport 443 -s 172.16.0.0/26 -m state --state NEW,ESTABLISHED
iptables -A DOCKER -d 172.17.0.2/32 ! -i docker0 -o docker0 -p tcp -m tcp — dport 443 -j ACCEPT
-A PREROUTING -m addrtype — dst-type LOCAL -j DOCKER
-A DOCKER ! -i docker0 -p tcp -m tcp — dport 443 -j DNAT — to-destination 172.17.0.2:443
```
https://www.michelebologna.net/2018/preventing-docker-from-manipulating-iptables-rules/
```haskell
-A POSTROUTING -s 172.17.0.0/24 -o eth0 -j MASQUERADE
```
https://stroebitzer.com/2018/10/07/iptables-vs-docker.html
```haskell
-A DOCKER-USER -s 10.0.41.0/24 -j RETURN
-A DOCKER-USER -m conntrack --ctstate RELATED,ESTABLISHED -j RETURN
-A DOCKER-USER -m set --match-set whitelist src -j RETURN
-A DOCKER-USER -p tcp -m tcp --dport 80 -j RETURN
-A DOCKER-USER -p tcp -m tcp --dport 443 -j RETURN
-A DOCKER-USER -j DROP
```
https://kamranzafar.org/2017/04/05/docker-and-iptables-firewall/
```haskell
iptables -t nat -A POSTROUTING -s 172.17.0.0/16 ! -o docker0 -j MASQUERADE
iptables -t filter -A FORWARD -o docker0 -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT
iptables -t filter -A FORWARD -i docker0 ! -o docker0 -j ACCEPT
iptables -t filter -A FORWARD -i docker0 -o docker0 -j ACCEPT

iptables -N DOCKER
iptables -A FORWARD -o docker0 -j DOCKER
iptables -A DOCKER -j RETURN
```
https://madcoda.com/2016/03/make-docker-work-with-iptables/
```haskell
iptables -A INPUT -i lo -j ACCEPT
iptables -A OUTPUT -o lo -j ACCEP

iptables -A INPUT -i docker0 -j ACCEPT
iptables -A OUTPUT -o docker0 -j ACCEPT
iptables -A FORWARD -i docker0 -j ACCEPT
iptables -A FORWARD -o docker0 -j ACCEPT
```
https://forums.docker.com/t/docker-and-iptables-configuration-startup/904
```
x3
```
https://stackoverflow.com/questions/54769872/iptables-with-docker-port-mapping
```haskell
-A INPUT -i lo -j ACCEPT
-A INPUT ! -i lo -s 127.0.0.0/8 -j REJECT
-A INPUT -p icmp --icmp-type any -j ACCEPT

-A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
-A INPUT -m state --state NEW -m tcp -p tcp --dport 22 -j ACCEPT
-A INPUT -j REJECT --reject-with icmp-host-prohibited

-A DOCKER-USER -i eth0 -m state --state ESTABLISHED,RELATED -j ACCEPT
-A DOCKER-USER -i eth0 -m state --state NEW -m tcp -p tcp --dport 25 -j ACCEPT
-A DOCKER-USER -j REJECT --reject-with icmp-host-prohibited
iptables -A FILTERS -p tcp --dport 25 -m conntrack --ctstate NEW --ctorigdstport 465 -j ACCEPT
```
https://serverfault.com/questions/894683/using-iptables-rules-arent-working-with-docker-container
```haskell
-A INPUT -i lo -j ACCEPT
-A INPUT -p icmp --icmp-type any -j ACCEPT
-A INPUT -j FILTERS

-A DOCKER-USER -i ens33 -j FILTERS

-A FILTERS -m state --state ESTABLISHED,RELATED -j ACCEPT
-A FILTERS -m state --state NEW -m tcp -p tcp --dport 22 -j ACCEPT
-A FILTERS -j REJECT --reject-with icmp-host-prohibited
```
https://unix.stackexchange.com/questions/503280/iptables-forward-inbound-traffic-to-internal-ip-docker-interface
```haskell
iptables -t nat -I PREROUTING -i eno1 -p tcp --dport 8443 -j DNAT --to-destination 172.17.0.2:8443
iptables -t nat -I OUTPUT -o lo -p tcp --dport 8443 -j DNAT --to-destination 172.17.0.2:8443
iptables -t nat -I POSTROUTING -s 127.0.0.1 -d 172.17.0.2 -j MASQUERADE
#  hairpin
iptables -t nat -I POSTROUTING -s 172.17.0.0/16 -d 172.17.0.0/16 -j NETMAP --to 10.17.0.0/16
```
https://blog.kalrong.net/en/2017/05/16/iptables-for-docker-in-an-internet-exposed-server/
```haskell
iptables -A FORWARD -i docker0 -o eth0 -j ACCEPT
iptables -A FORWARD -i eth0 -o docker0 -j ACCEPT
iptables -t nat -A POSTROUTING -s 172.17.0.0/24 -o eth0 -j MASQUERADE
```
http://www.geekpills.com/operating-system/linux/port-forwarding-for-docker-container-through-iptables
```haskell
iptables -t nat -A POSTROUTING --source 172.17.0.3 --destination 172.17.0.3 -p tcp --dport 80 -j MASQUERADE
iptables -t nat -A DOCKER ! -i docker0 --source 0.0.0.0/0 --destination 0.0.0.0/0 -p tcp --dport 80  -j DNAT --to 172.17.0.3:80
iptables -A DOCKER ! -i docker0 -o docker0 --source 0.0.0.0/0 --destination 172.17.0.3 -p tcp --dport 80 -j ACCEPT
```
https://blog.donnex.net/docker-and-iptables-filtering/
```haskell
-A INPUT -i lo -j ACCEPT
-A INPUT -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT
-A INPUT -p icmp -m icmp --icmp-type 8 -j ACCEPT
-A INPUT -p tcp -m tcp --dport 22 -j ACCEPT
-A INPUT -j DROP
-A DOCKER-USER -i eth0 -m conntrack --ctstate RELATED,ESTABLISHED -j ACCEPT
-A DOCKER-USER -i eth0 -p tcp -m tcp --dport 443 -j ACCEPT
-A DOCKER-USER -i eth0 -j DROP
-A DOCKER-USER -i eth0 -p tcp -s 1.2.3.4 -m tcp --dport 443 -j ACCEPT
```
https://blog.andyet.com/2014/09/11/docker-host-iptables-forwarding/
```haskell
iptables -N LOGGING
iptables -A OUTPUT -j LOGGING
iptables -A INPUT -j LOGGING
iptables -A FORWARD -j LOGGING
iptables -A LOGGING -m limit --limit 2/min -j LOG --log-prefix "IPTables-Dropped: " --log-level 4
iptables -A LOGGING -j DROP

iptables -A FORWARD -i docker0 -o eth0 -j ACCEPT
iptables -A FORWARD -i eth0 -o docker0 -j ACCEPT
```
