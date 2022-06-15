### GREP (grep - print lines that match patterns)
```nginx
grep [OPTION...] PATTERNS [FILE...]
grep “text string” directory          #empty options
grep -r "redeem reward" /home/tom     #OPTION -r, PATTERNS - "redeem reward", FILE - /home/tom
```

<table>
<tr>
    <td> опции </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
  
<tr>
 <td> -E, --extended-regexp </td>
 <td> позволяет расширить регулярные шаблоны </td>
 <td> 
   
```nginx
#найти слова содержащие vivek и raj
grep -E 'vivek|raj' /etc/passwd
# или
egrep 'vivek|raj' /etc/passwd 
   # egrep аналогично grep -E   
``` 
  </td>
</tr>
  
<tr>
 <td> -F, --fixed-strings </td>
 <td> вемсто регулярного выражения искать текст </td>
 <td>
  
```nginx
#найти слова содержащее dosada*. а не dosada
grep -F 'dosada*' /home/example
# или
fgrep 'dosada*' /home/example 
   #fgrep аналогично grep -F   
```
  </td>
</tr>
  
<tr>
 <td> -G, --basic-regexp </td>
 <td> тоже самое что и просто grep без опций </td>
 <td>
  
```nginx
grep -G 'dosada*' /home/example
# или
grep 'dosada*' /home/example
``` 
  </td>
</tr>
  
<tr>
 <td> -P, --perl-regexp </td>
 <td> интерпретирует образец как совместимое с Perl регулярное выражение (PCRE) </td>
 <td>
  
```nginx
grep -P 'PATTERN' file.txt
  #same as
perl -nle 'print if m{PATTERN}' file.txt
```
```bash 
#найти все строки, перед которыми две или более пустых строк
cat file
Here's a line.

This line has one blank line above it.


This line has two blank lines above it.



This line has three blank lines above it.




This line has four blank lines above it.
```   
   
> ~  grep-2.20
```nginx   
grep -Pzo '(?<=\n\n\n).*' ~/file 
```
```bash
This line has two blank lines above it.
This line has three blank lines above it.
This line has four blank lines above it.
```
</td>
</tr>

<tr>
    <td> -e PATTERNS, --regexp=PATTERNS </td> 
    <td> позволяет объединить нeсколько шаблонов для поиска </td> 
    <td>
  
```nginx
#найти слово содержащее e и l    
echo "hello" | grep -e 'h' -e 'l'
```
`hello`   
  
или
  
```nginx
#вывести буквы построчно  e и l в слове  
echo "hello" | grep -o -e 'h' -e 'l'
```
```   
h
l
l    
```  
  </td>
</tr>
    
<tr>
    <td> -f FILE, --file=FILE </td> 
    <td> применяет шаблоны из файла </td> 
     <td> 
   
```bash
#найти строки где есть people и nice
cat /home/f.txt
people
nice
```
```
cat example
hello people
this day a nice
we are people
we are strong  
```    
```nginx    
grep -f /home/f.txt /home/example
```
```
hello people
this day a nice
we are people    
``` 
  </td>
</tr>    

    
<tr>
    <td> -i, --ignore-case </td> 
    <td> игнорировать строчные и заглавные буквы </td> 
     <td> 
   
```nginx
#ничего не выведет
echo 'Uppercase' |grep 'uppercase'
# Выведет Uppercase
echo 'Uppercase' |grep -i 'uppercase'
```
`Uppercase`
  </td>
</tr>    
    
 <tr>
    <td> --no-ignore-case </td> 
    <td> не игнорировать строчные и заглавные буквы </td> 
    <td> применяется по умолчанию </td>
</tr>

<tr>
    <td> -v, --invert-match </td> 
    <td> убирает из вывода строки содержащие шаблон </td> 
     <td> 
   
```bash
#убрать Uppercase из вывода
cat example

lowercase
Uppercase
```
```nginx
grep -vi 'uppercase' example
```
`lowercase`
  </td>
</tr>

<tr>
    <td> опции </td> 
    <td> применение </td> 
     <td> 
   
```nginx
#найти слова содержащие vivek и raj
grep -E 'vivek|raj' /etc/passwd
``` 
  </td>
</tr> 
    
</table>
