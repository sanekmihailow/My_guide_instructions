
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

greeting = "Hello"
name = "World"
print greeting, name
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

> Ошибка отступа
```python
IndentationError: unindent does not match any outer indentation level
```

> не хватает одного аргумента для обязательного параметра
```python
TypeError: __init__() takes exactly 2 arguments (1 given)
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
enumrate(<list>)
zip(<list_a>, <list_N>)
filter()
bin()  # возвращает строку двоичного числа
oct()
hex()
int()
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

```python
print 8 & 5   # Bitwise AND
print 9 | 4   # Bitwise OR
print 12 ^ 42 # Bitwise XOR
print ~88     # Bitwise NOT
```

### Сравнения

```python
2 == 2
```

### Присваивания

### Исполнения

### Побитовые

> смещение всего двоичного числа на конце вправо или влево
```python
print 5 >> 4  # Right Shift
print 5 << 1  # Left Shift
```

> побитовые, сложение в столбик двоичных чисел по таблице ниже
```python
The bitwise AND (&)
0 & 0 = 0
0 & 1 = 0
1 & 0 = 0
1 & 1 = 1

     a:   00101010   42
     b:   00001111   15       
===================
 a & b:   00001010   10

The bitwise OR (|) 
0 | 0 = 0
0 | 1 = 1 
1 | 0 = 1
1 | 1 = 1

    a:  00101010  42
    b:  00001111  15       
================
a | b:  00101111  47

The bitwise OR (XOR)
0 ^ 0 = 0
0 ^ 1 = 1
1 ^ 0 = 1
1 ^ 1 = 0

    a:  00101010   42
    b:  00001111   15       
================
a ^ b:  00100101   37

bitwise NOT operator (~)
print ~3  # -4
print ~42 # -43

```

> Двоичные значения
```python
print 0b1,    #1
print 0b10,   #2
print 0b11,   #3
print 0b100,  #4
print "******"
print 0b1 + 0b11 # 4
print 0b11 * 0b11 # 9
```

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

> practice makes perfect

```python
def is_even(x):
    if x %2 == 0:
        return True
    else:
        return False
        
print is_even(900)
```

```python
def is_int(x):
  absolute = abs(x)
  rounded = round(absolute)
  return absolute - rounded == 0

print is_int(10)
print is_int(10.5)
```

```python
def digit_sum(x):
    total = 0
    while x > 0:
        total += x % 10
        x = x // 10
        print x
    return total

digit_sum(2131)
```

```python
def factorial(x):
    total = 1
    while x>0:
        total *= x
        x-=1
    return total

print factorial(4)   
```

```python
def is_prime(x):
    if x < 2:
        return False
    else:
        for n in range(2, x-1):
            if x % n == 0:
                return False
        return True

print is_prime(6)
```

```python
def reverse(text):
    word = ""
    l = len(text) - 1
    while l >= 0:
        word = word + text[l]
        l -= 1
    return word
  
print reverse("Hello World")
```

```python
def anti_vowel(text):
    result = ""
    vowels = "ieaouIEAOU"
    for char in text:
          if char not in vowels:
            result += char
    return result
print anti_vowel("hello book")
```

```python
score = {
  "a": 1, "c": 3, "b": 3, "e": 1, "d": 2, "g": 2, 
  "f": 4, "i": 1, "h": 4, "k": 5, "j": 8, "m": 3, 
  "l": 1, "o": 1, "n": 1, "q": 10, "p": 3, "s": 1, 
  "r": 1, "u": 1, "t": 1, "w": 4, "v": 4, "y": 4, 
  "x": 8, "z": 10
}
         
def scrabble_score(word):
  word = word.lower()
  total = 0
  for letter in word:
    for leter in score:
      if letter == leter:
        total = total + score[leter]
  return total

print scrabble_score("pizza")
```

```python
def censor(text, word):
    words = text.split()
    result = ''
    stars = '*' * len(word)
    count = 0
    for i in words:
        if i == word:
            words[count] = stars
        count += 1
    result =' '.join(words)

    return result
  
print censor("this hack is wack hack", "hack")
```

```python
def count(sequence, item):
    count = 0
    for i in sequence:
        if i == item:
            count += 1
    return count
  
print count([1, 2, 1, 1], 1)
```

```python
def purify(lst):
    res = []
    for ele in lst:
        if ele % 2 == 0:
            res.append(ele)
    return res
  
print purify([1, 2, 3, 4])
```

```python
def product(list):
  total = 1
  for num in list:
    total = total * num
  return total

print product([4, 5, 5])
```

```python
def remove_duplicates(inputlist):
    if inputlist == []:
        return []
    
    # Sort the input list from low to high    
    inputlist = sorted(inputlist)
    outputlist = [inputlist[0]]

    for i in inputlist:
        if i > outputlist[-1]:
            outputlist.append(i)
        
    return outputlist
  
print remove_duplicates([1, 1, 2, 2])
```

```python
def median(lst):
    sorted_list = sorted(lst)
    if len(sorted_list) % 2 != 0:
        #odd number of elements
        index = len(sorted_list)//2 
        return sorted_list[index]
    elif len(sorted_list) % 2 == 0:
        #even no. of elements
        index_1 = len(sorted_list)/2 - 1
        index_2 = len(sorted_list)/2
        mean = (sorted_list[index_1] + sorted_list[index_2])/2.0
        return mean
   
print median([2, 4, 5, 9])
```

```python
grades = [100, 100, 90, 40, 80, 100, 85, 70, 90, 65, 90, 85, 50.5]

def grades_sum(scores):
  total = 0
  for score in scores: 
    total += score
  return total

print grades_sum(grades)

def grades_average(grades_input):
  sum_of_grades = grades_sum(grades_input)
  average = sum_of_grades / float(len(grades_input))
  return average

print grades_average(grades)

def grades_variance(scores):
    average = grades_average(scores)
    variance = 0
    for score in scores:
        variance += (average - score) ** 2
    return variance / len(scores)

print grades_variance(grades)

def grades_std_deviation(variance):
  return variance ** 0.5

variance = grades_variance(grades)
print grades_std_deviation(variance)
```

```python
grades = [100, 100, 90, 40, 80, 100, 85, 70, 90, 65, 90, 85, 50.5]

def print_grades(grades_input):
  for grade in grades_input:
    print grade

def grades_sum(scores):
  total = 0
  for score in scores: 
    total += score
  return total
    
def grades_average(grades_input):
  sum_of_grades = grades_sum(grades_input)
  average = sum_of_grades / float(len(grades_input))
  return average

def grades_variance(grades):
    variance = 0
    for number in grades:
        variance += (grades_average(grades) - number) ** 2
    return variance / len(grades)

def grades_std_deviation(variance):
  return variance ** 0.5

variance = grades_variance(grades)

for grade in grades:
  print grade
print grades_sum(grades)
print grades_average(grades)
print grades_variance(grades)
print grades_std_deviation(variance)
```

### Анонимные функции (Одноразовые лямбда функции)

```python
lambda x: x % 3 == 0
#same as 
#def by_three(x):
#  return x % 3 == 0
```

```python
my_list = range(16)
print filter(lambda x: x % 3 == 0, my_list)
# [0, 3, 6, 9, 12, 15]

languages = ["HTML", "JavaScript", "Python", "Ruby"]
print filter(lambda x: x == "Python", languages)
# ['Python']

squares = [x ** 2 for x in range(1, 11)]
print filter(lambda x: x >= 30 and x <= 70, squares)
# [36, 49, 64]
```

```python
garbled = "IXXX aXXmX aXXXnXoXXXXXtXhXeXXXXrX sXXXXeXcXXXrXeXt mXXeXsXXXsXaXXXXXXgXeX!XX"
message = filter(lambda x: x != "X", garbled)
print message
```

```python
def check_bit4(input):
  mask = 0b1000
  desired = input & mask
  if desired > 0:
    return "on"
  else:
    return "off"

print check_bit4(10)
```

```python
def flip_bit(number, n):
  bit_to_flip = 0b1 << (n -1)
  result = number ^ bit_to_flip
  return bin(result)

print flip_bit(0b10, 3)  
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

### For (foreach)
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
d = {'a': 'apple', 'b': 'berry', 'c': 'cherry'}

for key in d:
  print key, d[key]
""" a apple
c cherry
b berry """
```

```python
choices = ['pizza', 'pasta', 'salad', 'nachos']

print 'Your choices are:'
for index, item in enumerate(choices):
  print index + 1, item
```

> Вывести наибольшее из двух списков
```python
list_a = [3, 9, 17, 15, 19]
list_b = [2, 4, 8, 10, 30, 40, 50, 60, 70, 80, 90]

for a, b in zip(list_a, list_b):
    print max(a, b)
```

### For else
> Else обрабатываеся после завершения цикла
 
```python
test = ["bleh", "blah", "bloh"]

for x in test:
    print x
else:
    print "ok"
```

### While

```python
num = 1

while num <= 10:
  print num ** 2
  num += 1

loop_condition = True

while loop_condition:
  print "I am a loop"
  loop_condition = False  
```

> Infinite loops
```python
count = 10

while count > 0:
  count += 1 # Instead of count -= 1
```

### While else

> else выполняется каждый раз когда выражение False
```python 
count = 0
while count < 3:
  num = random.randint(1, 6)
  print num
  if num == 5:
    print "Sorry, you lose!"
    break
  count += 1
else:
  print "You win!"
```

## 3_3 Прерывания

### break

```python
count = 0

while True:
  print count
  count += 1
  if count >= 10:
    break
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
```python
threes_and_fives = [x for x in range(1, 16) if x % 3 == 0 or x % 5 == 0]
print threes_and_fives
# [3, 5, 6, 9, 10, 12, 15]
```

> slice **[start:end:stride]**

```python
garbled = "!XeXgXaXsXsXeXmX XtXeXrXcXeXsX XeXhXtX XmXaX XI"
message = garbled[::-2]
print message
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

```python
d = {
  "Name": "Guido",
  "Age": 56,
  "BDFL": True
}
print d.items()
# => [('BDFL', True), ('Age', 56), ('Name', 'Guido')]
print d.keys()
# => ['BDFL', 'Age', 'Name']
print d.keys()
# => ['True', '56', 'Guido']
```

```python
my_dict = {
  'name': 'Nick',
  'age':  31,
  'occupation': 'Dentist',
}

for key in my_dict:
  print key, my_dict[key]
```

```python
evens_to_50 = [i for i in range(51) if i % 2 == 0]
print evens_to_50

even_squares = [x ** 2 for x in range(1, 12) if x % 2 == 0]
print even_squares

even_squares = [x ** 2 for x in range(1, 12) if x % 2 == 0]
print even_squares
```
> slice **[start:end:stride]**
```python
l = [i ** 2 for i in range(1, 11)]
# Should be [1, 4, 9, 16, 25, 36, 49, 64, 81, 100]

print l[2:9:2]
# [9, 25, 49, 81]

my_list = range(1, 11)
print my_list[::2]
# [1, 3, 5, 7, 9]
print my_list[::-1]
# [10, 9, 8, 7, 6, 5, 4, 3, 2, 1]
```



###### ////////////////////////////////////
# 5) CLASS AND OBJECT
###### ////////////////////////////////////

```python
class NewClass(object):
  # Class magic here

class Animal(object):
  def __init__(self):
    <pass>
```

```python
class Animal(object):
  def __init__(self, name):
    self.name = name

zebra = Animal("Jeffrey")
print zebra.name
```

```python
class Animal(object):
  """Makes cute animals."""
  is_alive = True
  health = "good"
  def __init__(self, name, age):
    self.name = name
    self.age = age

  def description(self):
    print self.name
    print self.age

hippo = Animal('Anderson', 36)
sloth = Animal('Dale', 15)
hippo.health = 'bad'

print hippo.health
print sloth.health
```

```python
class ShoppingCart(object):
  items_in_cart = {}
  def __init__(self, customer_name):
    self.customer_name = customer_name

  def add_item(self, product, price):
    if not product in self.items_in_cart:
      self.items_in_cart[product] = price
      print product + " added."
    else:
      print product + " is already in the cart."

  def remove_item(self, product):
    if product in self.items_in_cart:
      del self.items_in_cart[product]
      print product + " removed."
    else:
      print product + " is not in the cart."

my_cart = ShoppingCart('Eric')
my_cart.add_item("Guitar", 150)
```

```python
class Car(object):
  condition = "new"
  def __init__(self, model, color, mpg):
    self.model = model
    self.color = color
    self.mpg   = mpg

  def display_car(self):
    print "This is a %s %s with %s MPG." % (self.color, self.model, str(self.mpg))

  def drive_car(self):
    self.condition = "used"

class ElectricCar(Car):
  def __init__(self, model, color, mpg, battery_type):
    self.model = model
    self.color = color
    self.mpg   = mpg
    self.battery_type = battery_type

  def drive_car(self):
    self.condition = "like new"

my_car = ElectricCar("DeLorean", "silver", 88, "molten salt")

print my_car.condition
my_car.drive_car()
print my_car.condition
```

```python
class Fruit(object):
  """A class that makes various tasty fruits."""
  def __init__(self, name, color, flavor, poisonous):
    self.name = name
    self.color = color
    self.flavor = flavor
    self.poisonous = poisonous

  def description(self):
    print "I'm a %s %s and I taste %s." % (self.color, self.name, self.flavor)

  def is_edible(self):
    if not self.poisonous:
      print "Yep! I'm edible."
    else:
      print "Don't eat me! I am super poisonous."

lemon = Fruit("lemon", "yellow", "sour", False)

lemon.description()
lemon.is_edible()
```

### Наследование

```python
class DerivedClass(BaseClass):
  pass
```

```python
class Customer(object):
  def __init__(self, customer_id):
    self.customer_id = customer_id

  def display_cart(self):
    print "I'm a string that stands in for the contents of your shopping cart!"

class ReturningCustomer(Customer):
  def display_order_history(self):
    print "I'm a string that stands in for your order history!"

monty_python = ReturningCustomer("ID: 12345")
monty_python.display_cart()
monty_python.display_order_history()
```

> Использование родительского значения super

```python
class Base():
  def m():
    print "This is"

class Derived(Base):
  def m(self):
    return super(Derived, self).m()
```

```python
class Employee(object):
  def __init__(self, employee_name):
    self.employee_name = employee_name

  def calculate_wage(self, hours):
    self.hours = hours
    return hours * 20.00

# Add your code below!
class PartTimeEmployee(Employee):
  def calculate_wage(self, hours):
    self.hours = hours
    return hours * 12.00

  def full_time_wage(self, hours):
    return super(PartTimeEmployee, self).calculate_wage(hours)

milton = PartTimeEmployee('Milton')
print milton.full_time_wage(10)
```

### Переопределие методов

```python
class Employee(object):
  def __init__(self, employee_name):
    self.employee_name = employee_name

  def calculate_wage(self, hours):
    self.hours = hours
    return hours * 20.00

# Add your code below!
class PartTimeEmployee(Employee):
  def calculate_wage(self, hours):
    self.hours = hours
    return hours * 12.00

base = Employee("Steve")
sub =  PartTimeEmployee("Henry")
print base.calculate_wage(20) # 400.0
print base.calculate_wage(20) # 240.0
```

> global variables;
> member(class) variables;
> instance variables;

> global functions;
> member(class) methods;
> instance methods;



###### ////////////////////////////////////
# 6) MODULES
###### ////////////////////////////////////

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


///////////

/////////


```python
open('output.txt', 'r+')
# write-only mode ("w")
#read-only mode ("r")
#read and write mode ("r+")
#append mode ("a"), which adds any new data you write to the file to the end of the file.

my_file = open("output.txt", "r")
print my_file.read()
my_file.close()

my_file = open("text.txt", "r")
print my_file.readline()
print my_file.readline()
print my_file.readline()
my_file.close()


f = open("bg.txt")
f.closed
# False
f.close()
f.closed
# True
```





