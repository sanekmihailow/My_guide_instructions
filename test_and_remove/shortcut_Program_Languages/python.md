###### ////////////////////////////////////

# 1) Базовые

###### ////////////////////////////////////

### Комментарии

```python
# city_pop = 340000 #
"""
This is a comment
written in
more than just one line
"""
```

### Вывод в stdout

```python
print "hello"  #deprecated in ver 3
print("hello")
```

- - Escape character

```python
'There\'s a snake in my boot!'
```

### Импорт

```python
import datetime
```

```python
from datetime import date
from math import sqrt, floor
```

### Типы данных

###### ----------

```python
animals = "catdogfrog"
frog = animals[6:]
```

### Арифметические операции

###### ----------

Особенности деления

```python
quotient = 7/2 # show 3
quotient1 = 7./2 # the value of quotient1 is 3.5
quotient2 = 7/2. # the value of quotient2 is 3.5
quotient3 = 7./2. # the value of quotient3 is 3.5
quotient4 = float(7)/2  # show 3.5
```

### Конкатенация строк

```python
print "Hello " + "sda"
print("hello" + "yayay")

number1 = "100"
number2 = "10"
string_addition = number1 + number2 # 10010
```

```python
print "I am " + str(age) + " years old!"
```

```python
float_1 = 0.25
float_2 = 40.0
product = float_1 * float_2 # 10.0
big_string = "The product was " + str(product)
```

### Интерполяция строк

> "%s" заменяется переменной после "%" (переменная)

```python
day = 6
print "03 - %s - 2019" %  (day) # 03 - 6 - 2019
print "03 - %02d - 2019" % (day) # 03 - 06 - 2019

string_1 = "Camelot"
string_2 = "place"
print "Let's not go to %s. 'Tis a silly %s." % (string_1, string_2)
# Let's not go to Camelot. 'Tis a silly place.

print "The %s who %s %s!" % ("Knights", "say", "Ni")
#  "The Knights who say Ni!"

now = datetime.now()
print '%02d/%02d/%04d' % (now.month, now.day, now.year)
# 02/24/2023
```

### errors

> Проблема с ковычками переносом либо закрытием / открытием

```python
EOL while scanning string literal
```

> Синтаксическая ошибка

```python
SyntaxError: invalid syntax
```

> не нашел переменную "today_date"

```python
NameError: name 'today_date' is not defined
```

> Ошибка когда пытаются присвоить int типу string float

```python
ValueError: invalid literal for int() with base 10
```

### Переменные и константы

```python
current_excercise = 5
todays_date = "Febrary 24, 2023"
print(todays_date)
todays_date = "Febrary 28, 2023"
print(todays_date)

trippy_multiplication = 38 * 902
```

- - доступ по индеск

```python
c = "cats"[0]
n = "Ryan"[3]
yan = "Ryan"[1:len("Ryan")]
```

### Методы

> string method

```
len(<string>) or len(<list>)
<string>.lower()
<string>.upper()
str(<int or something>)

datetime.now()
.now().year
.now().day

<string>.isalpha()

max(<number>)
min(<number>)
abs(<number>)

type(<value>)

<list>.sort()
<list>.remove(<value>)
range(<диапазон>)
join(<'row>')
```

### regex

### Интерактивное взаимодействие

```python
name = raw_input("What's your name?")
print(name)

guess_col = int(raw_input("Guess Col: "))
```

## 1.1) Возможные операторы в языке

### Арифметические

### Логические

### Сравнения

```python
2 == 2
```

### Присваивания

### Исполнения

### Побитовые

### Булевые

###### ////////////////////////////////////

# 2) Функции

###### ////////////////////////////////////

> define and use

```python
def spam():
  """Prints 'Eggs!'"""
  print "Eggs!"

spam() #Eggs!
```

```python

def clinic():
    print "You've just entered the clinic!"
    print "Do you take the door on the left or the right?"
    answer = raw_input("Type left or right and hit 'Enter'.").lower()
    if answer == "left" or answer == "l":
        print "This is the Verbal Abuse Room, you heap of parrot droppings!"
    elif answer == "right" or answer == "r":
        print "Of course this is the Argument Room, I've told you that already!"
    else:
        print "You didn't pick left or right! Try again."
        clinic()

clinic()
```

> with parameter

```python
def greater_less_equal_5(answer):
    if answer > 5:
        return 1
    elif answer < 5:
        return -1
    else:
        return 0

# parameter answer; argument 4,5,6
print greater_less_equal_5(4)
print greater_less_equal_5(5)
print greater_less_equal_5(6)
```

> with multiple parameters

```python
def power(base, exponent):  # Add your parameters here!
  result = base ** exponent
  print "%d to the power of %d is %d." % (base, exponent, result)

power(37, 4)  # Add your arguments here!
```

> Functions calling functions

```python
def fun_one(n):
  return n * 5

def fun_two(m):
  return fun_one(m) + 7

print(fun_one(3))
```

```python
n = [3, 5, 7]

def print_list(x):
  for i in range(0, len(x)):
    print x[i]

print_list(n)
```

```python
n = ["Michael", "Lieberman"]

def join_strings(words):
  result = ""
  for word in words:
    result += word
  return result

print join_strings(n)
```

```python
m = [1, 2, 3]
n = [4, 5, 6]

def join_lists(x, y):
	return x + y

print join_lists(m, n)
```

```python
n = [[1, 2, 3], [4, 5, 6, 7, 8, 9]]

def flatten(lists):
  results = []
  for numbers in lists:
    for number in numbers:
      results.append(number)
  return results

print flatten(n)
```

```python
board = []

for i in range(5):
  board.append(["O"] * 5)

def print_board(board_in):
  for row in board:
    print " ".join(row)

print_board(board)
```

###### ////////////////////////////////////

# 3) Управляющие конструкции

###### ////////////////////////////////////

## 3_1 Условные

###### ----------

```python
if answer == "Left":
    print "This is the Verbal Abuse Room, you heap of parrot droppings!"
```

```python
if 8 > 9:
  print "I don't get printed!"
  # return True
else:
  print "I get printed!"
  # return False
```

```python
if 8 > 9:
  print "I don't get printed!"
elif 8 < 9:
  print "I get printed!"
else:
  print "I also don't get printed!
```

## 3_2 Циклы

```python
my_list = [1,9,3,8,5,7]

for number in my_list:
    print 2 * number
```

```python
for letter in "Codecademy":
  print letter
```

```python
d = {"foo" : "bar"}

for key in d:
  print d[key]  # prints "bar"
```

```python
""""  Вывести четные числа """
a = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]

for number in a:
  if number % 2 == 0:
    print number
```

```python
def count_small(numbers):
  total = 0
  for n in numbers:
    if n < 10:
      total = total + 1
  return total

lotto = [4, 8, 15, 16, 23, 42]
small = count_small(lotto)
print small # 2
```

```python
prices = {"banana": 4,"apple": 2,"orange": 1.5,"pear": 3}
stock = {"banana": 6, "apple": 0, "orange": 32, "pear": 15}
total = 0

for food in prices:
  print food
  print prices[food] * stock[food]
  total = total + prices[food] * stock[food]
print total
```

```python
while
```

###### ////////////////////////////////////

# 4) Списки

###### ////////////////////////////////////

```python
list_name = ["ant", "bat", "cat"]
list_name1 = []

print(list_name[0]) #item 1 - ant
list_name[1] = 'newitem2'
list_name.append('item3')
item2 = list_name.index('bat')
list_name.insert(1, "dog") #["ant", "dog", "bat", "cat"]

slice = list_name[1:2]
slice = list_name[1:]
slice1 = list_name[:1]
```

```
.sort()
.remove(<value>)
.pop(<value>)


```

## 4_1 Словари

###### ----------

```python
residents = {'Puffin' : 104, 'Sloth' : 105, 'Burmese Python' : 106}
print residents['Sloth'] # 105
```

```python
menu = {} # Empty dictionary
menu['Chicken Alfredo'] = 14.50 # Adding new key-value pair
```

```python
del dict_name[key_name]

zoo_animals = {
    'Unicorn' : 'Cotton Candy House',
    'Sloth' : 'Rainforest Exhibit',
}
del zoo_animals['Sloth'] #will remove the key Sloth
zoo_animals['Unicorn'] = 'Horny'
```

###### ////////////////////////////////////

# 5) CLASS AND OBJECT

###### ////////////////////////////////////

313213

# 6) dasdsdas

```python
import math
# https://docs.python.org/3/library/math.html
print math.sqrt(25)
print(dir(math)) # Sets everything to a list of things from math
```

```python
import array
```

```python
import pprint
```

```python
from random import randint
```
