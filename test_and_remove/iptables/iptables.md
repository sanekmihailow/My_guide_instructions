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

если не указывать --protocol - по умолчанию "all"
                  --Additional options - по умолчанию "--"
                  --in - по умолчанию "*" т.е. все
                  --out - по умолчанию "*"
                  --source - по умолчанию 0.0.0.0/0
                  --destination - по умолчанию 0.0.0.0/0


## КАК проходит маршрут


Видимо, в цепочке INPUT заложена возможность изменить source пакета после применения фильтра.

И немного по схеме фильтрации. С учетом всего вышеизложенного запомнить схему не так уж и сложно. Достаточно помнить 2 вещи:
1. Порядок цепочек (есть в схеме).
2. Помнить, что таблицы в цепочках всегда (!) применяются в одном и том же порядке: raw, mangle, nat, filter (за исключением теоретической возможности с таблицей nat, описанной выше)

raw:	PREROUTING OUTPUT

mangle:	PREROUTING INPUT FORWARD OUTPUT POSTROUTING

nat:	PREROUTING INPUT OUTPUT POSTROUTING

filter:	INPUT FORWARD OUTPUT


Сначала действия в цепи **PREROUTING**, т.е. сначала выполняются

1. в табице **raw** - - - - - PREROUTING (`iptables -L -t raw |grep -C2 -i prerouting`) -> затем
2. в таблице **mangle** - PREROUTING (`iptables -L -t mangle |grep -C2 -i prerouting`) -> дальше
3. в таблице **nat** -- - - - PREROUTING (`iptables -L -t nat |grep -C2 -i prerouting`) ->
4. в таблице **filter** - - - PREROUTING (`iptables -L -t nat |grep -C2 -i prerouting`) -> дальше перемещаемся в другую цепь

Узнаем сервис к которому мы прописываем правило наодится 




1## -
Терминальные и нетерминальные действия TARGET
