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
   
~  grep-2.20
```nginx   
grep -Pzo '(?<=\n\n\n).*' ~/file 
```
  ```
  This line has two blank lines above it.
  This line has three blank lines above it.
  This line has four blank lines above it.
  ```
</td>
</tr>
  
  
</table>
