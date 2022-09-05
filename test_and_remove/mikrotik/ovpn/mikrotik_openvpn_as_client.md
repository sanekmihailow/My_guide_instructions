
<d>
  <details>
    <summary> links </summary>
      
[it4it.club](https://it4it.club/topic/30-markiruem-pakety-i-zavorachivaet-trafik-do-konkretnyh-serverov-v-vpn/)
  
[forummikrotik.ru](https://forummikrotik.ru/viewtopic.php?t=8884)   
  
[cloud4you.pro](https://cloud4you.pro/371)

[qna.habr.com](https://qna.habr.com/q/638083)

[routeworld.ru](http://routeworld.ru/set-i-internet/web_practice/201-mikrotik-zavorachivaem-trafik.html)

[disnetern.ru](https://disnetern.ru/mikrotik-vpn-restricted-access/)
    
[qna.habr.com](https://qna.habr.com/q/255203)    
    
[forum.mikrotik.com -> fetch](https://forum.mikrotik.com/viewtopic.php?t=108237) 
    
[serveradmin.ru](https://serveradmin.ru/nastroyka-openvpn-client-na-mikrotik-s-zamenoy-shlyuza/)
    
</details>
</d>
  
```
Пустить весь траффик с локалки через VPN
1) создать ovpn-client
2) создать маркировку траффика через ovpn
3) создать nat маскарад для ovpn Траффика
4) создать route Для маркированного траффика
```

1)
> Добавляем сертификаты в **Files**, затем импортируем их в **system -> certificates**  (сначала сертификат, затем ключ)
    
> Потом создаем интерфес
```nginx
/interface ovpn-client add certificate=mikrot-client.crt_0 cipher=aes256 connect-to=173.173.173.173 disabled=yes mac-address=00:00:00:00:00:63 name=ovpn-out1 user=ovpn-mikrot-client
```
2)
```nginx
/ip firewall mangle add action=mark-routing chain=prerouting disabled=yes new-routing-mark=OVPN_traffic passthrough=yes src-address-list="Private ip - RFC 1918"    
```    
3)
```nginx
/ip firewall nat add action=masquerade chain=srcnat disabled=yes out-interface=ovpn-out1 src-address-list="Private ip - RFC 1918"
```
4)
```nginx
/ip route add check-gateway=ping distance=1 gateway=ovpn-out1 routing-mark=OVPN_traffic
```
