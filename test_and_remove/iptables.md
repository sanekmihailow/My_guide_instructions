## Вод команды

``` 
iptables -t таблица действие цепочка дополнительные_параметры (https://losst.ru/nastrojka-iptables-dlya-chajnikov)

iptables [-t таблица] команда [критерии] [действие] (http://www.k-max.name/linux/netfilter-iptables-v-linux/)
```
```ruby
iptables -t <TABLE> -<COMMAND> <CHAIN> <NUMBER RULE> -j <TARGET ACTION> -<OPTIONS>
```
т.е.
```
iptables -t <ТАЮЛИЦА> -<КОМАНДА> <ЦЕПЬ> <ВСТАВИТЬ правило в определенное место в цепи> -j <Конечное действие> <ОПЦИИ>
```
более подробно это выглядит так
```
iptables -t <TABLE> -<COMMAND> <CHAIN> <NUMBER RULE> -j <TARGET ACTION> -p <PROTOCOL> -i <IN_INTERFACE> -o <OUT_INTERFACE> -s <SOURCE_IP-addr/nerwork> -d <DESTTINATION_IP-addr/network> -<ADDITIONAL MATCH>
```
> !* NUMBER RULE - не указывается для комманды -A or --append
