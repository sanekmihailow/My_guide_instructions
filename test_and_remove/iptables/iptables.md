## Общее правило Ввода команды

``` 
iptables -t таблица действие цепочка дополнительные_параметры (https://losst.ru/nastrojka-iptables-dlya-chajnikov)

iptables [-t таблица] команда [критерии] [действие] (http://www.k-max.name/linux/netfilter-iptables-v-linux/)
```
```ruby
iptables -t <TABLE> -<COMMAND> <CHAIN> <NUMBER RULE> -j <TARGET ACTION> -<OPTIONS>

или

iptables -t <TABLE> -<COMMAND> <CHAIN> <NUMBER RULE> -<OPTIONS> -j <TARGET ACTION>
```
т.е.

```ruby
iptables -t <ТАЮЛИЦА> -<КОМАНДА> <ЦЕПЬ> <ВСТАВИТЬ правило в определенное место в цепи> -j <Конечное действие> <ОПЦИИ>
```
более подробно это выглядит так
```ruby
iptables -t <TABLE> -<COMMAND> <CHAIN> <NUMBER RULE> -j <TARGET ACTION> -p <PROTOCOL> -i <IN_INTERFACE> -o <OUT_INTERFACE> -s <SOURCE_IP-addr/nerwork> -d <DESTTINATION_IP-addr/network> -<ADDITIONAL MATCH>
```
> !* NUMBER RULE - не указывается для комманды -A or --append

```
если не указывать --protocol - по умолчанию "all"
                  --Additional options - по умолчанию "--"
                  --in - по умолчанию "*" т.е. все
                  --out - по умолчанию "*"
                  --source - по умолчанию 0.0.0.0/0
                  --destination - по умолчанию 0.0.0.0/0
```
```ruby
 pkts bytes target     prot   opt    in     out     source               destination          <additional match>
 56   20098 ACCEPT      all   --     *      *       0.0.0.0/0            0.0.0.0/0            ctstate RELATED,ESTABLISHED
```    
## КАК проходит маршрут


Видимо, в цепочке INPUT заложена возможность изменить source пакета после применения фильтра.
> Главное Помнить, что таблицы в цепочках всегда (!) применяются в одном и том же порядке: raw, mangle, nat, filter (за исключением теоретической возможности с таблицей nat, описанной выше)

raw:	PREROUTING -> OUTPUT

mangle:	PREROUTING -> INPUT -> FORWARD -> OUTPUT -> POSTROUTING

nat:	PREROUTING -> INPUT -> OUTPUT -> POSTROUTING

filter:	INPUT -> FORWARD -> OUTPUT

**--start--**

Сначала действия в цепи **PREROUTING**, т.е. сначала выполняются в :

1. в таблице **raw** --- - - PREROUTING (`iptables -nvL -t raw |grep -C2 -i prerouting`) -> затем
2. в таблице **mangle** - PREROUTING (`iptables -L -nvt mangle |grep -C2 -i prerouting`) -> 
3. в таблице **nat** -- - - - PREROUTING (`iptables -nvL -t nat |grep -C2 -i prerouting`) -> 

> Если пакет предназнакен локальному процессу (клиенту или серверу), тогда перемещаемся в цепь **INPUT** (позволяет модифицировать пакет, предназначенный самому хосту)

дальше перемещаемся в цепь **INPUT** 

5. в таблице **mangle** -- INPUT (`iptables -nvL -t mangle |grep -C2 -i input`) -> 
6. в таблице **nat** -- - - - INPUT (`iptables -nvL -t nat |grep -C2 -i input`) ->
7. в таблице **filter** -- - - INPUT (`iptables -nvL -t filter |grep -C2 -i input`) -> 

дальше перемещаемся в цепь **OUTPUT**

8. в таблице **raw** -- - - OUTPUT (`iptables -nvL -t raw |grep -C2 -i output`) -> затем
9. в таблице **mangle** - OUTPUT (`iptables -nvL -t mangle |grep -C2 -i output`) -> 
10. в таблице **nat** ------ OUTPUT (`iptables -nvL -t nat |grep -C2 -i output`) ->
11. в таблице **filter** - - - OUTPUT (`iptables -nvL -t filter |grep -C2 -i output`) -> 

дальше перемещаемся в цепь **POSTROUTING**

12. в таблице **mangle** - POSTROUTING (`iptables -nvL -t mangle |grep -C2 -i postrouting`) -> 
13. в таблице **nat** ---- - POSTROUTING (`iptables -nvL -t nat |grep -C2 -i postrouting`) -> 

> Иначе если пакет не предназначен локальному процессу, но предназначенные другому сетевому интерфейсу, тогда перемещаемся в цепь **FORWARD**  (позволяющая модифицировать транзитные пакеты, т.е. использовать компютер в качестве маршрутизатора)

дальше перемещаемся в цепь **FORWARD**

5. в таблице **mangle** - FORWARD (`iptables -nvL -t mangle |grep -C2 -i forward`) ->
6. в таблице **filter** ---- FORWARD (`iptables -nvL -t filter |grep -C2 -i forward`) ->

дальше перемещаемся в цепь **POSTROUTING**

7. в таблице **mangle** - POSTROUTING (`iptables -nvL -t mangle |grep -C2 -i postrouting`) -> 
8. в таблице **nat** ---- - POSTROUTING (`iptables -nvL -t nat |grep -C2 -i postrouting`) -> 

**--END--**

1## -
Терминальные и нетерминальные действия TARGET
