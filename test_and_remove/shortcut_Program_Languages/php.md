<d>
  <details>
    <summary> structure map </summary>

```
1. БАЗОВЫЕ
- include
- Конкатенация строк
- Переменные
- Magic Constant
1.1 Операции с перменными
- Арифметические операции
- Логические операции
- Операции cравнения
- Операции присваивания
- Операция исполнения
- Побитовые операции

2. ФУНКЦИИ
- Переменная область видимости
- Глобальная область видимости
- Функции обработки переменных
- String Functions
- - Basic Sanitization
- Math Functions
- Filesystem Functions

3. УПРАВЛЯЮЩИЕ КОНСТРУКЦИИ
3.1 Условные
- Тернарный оператор
3.2 Циклы
3.3 Прерывания

4. МАССИВЫ
- Array Functions
- Nested Arrays
- Associative Arrays
- - Joining Arrays
- - Assign by Value or by Reference

5. Class and Object
- Inheritance
- Область видимости
5.1 Методы
- Magic methods
- Overriding Methods
- Getters and Setters

6. REGEX

7. HTML IN PHP
7.1 HTML FORM handling in PHP
- Examples
- Request Superglobals
- Ways FORM Validation
- - Client-side FORM Validation
- - Server-side FORM Validation [link basic sanitization]
7.2 LOOPS IN HTML

8. Модули
- Fuction readline()
```

</details>
</d>

<d>
 <details>
	 <summary> PHP Map </summary>

[1) БАЗОВЫЕ](#1-БАЗОВЫЕ)

- [Импорт файлов](#Импорт-файлов)
- [Конкатенация строк](#Конкатенация-строк)
- [Truthy and Falsy](#Truthy-and-Falsy)
- [Переменные](#Переменные)
- [Magic Constant](#Magic-Constant)
  [1.1 Операции с переменными](#1_1-Операции-с-переменными)
- [Арифметические операции](#Арифметические-операции)
- [Логические операции](#Логические-операции)
- [Операции сравнения](#Операции-сравнения)
- [Операции присваивания](#Операции-присваивания)
- [Операция исполнения](#Операция-исполнения)
- [Побитовые операции](#Побитовые-операции)

[2) ФУНКЦИИ](#2-ФУНКЦИИ)

- [Переменная область видимости (Variable Scope)](#Переменная-область-видимости)
- [Глобальная область видимости (Global Scope)](#Глобальная-область-видимости)
- [Функции обработки переменных (Variable handling Functions)](#Функции-обработки-переменных)
- [Строковые функции (String Functions)](#String-Functions)
- - [Санитарная обработка (Basic Sanitization)](#Basic-Sanitization)
- [Математические функции (Math Functions)](#Math-Functions)
- [Функции файловой системы (Filesystem Functions)](#Filesystem-Functions)

[3) УПРАВЛЯЮЩИЕ КОНСТРУКЦИИ](#3-УПРАВЛЯЮЩИЕ-КОНСТРУКЦИИ)

[3.1 Условные](#3_1-Условные)

- [Тернарный оператор](#Тернарный-оператор)

[3.2 Циклы](#3_2-Циклы)

[3.3 Прерывания](#3_3-Прерывания)

[4) МАССИВЫ](#4-МАССИВЫ)

- [Функции работы с массивами (Array Functions)](#Array-Functions)
- [Вложенные массивы (Nested Arrays)](#Nested-Arrays)
- [Ассоциативные массивы (Associative Arrays)](#Associative-Arrays)
- - [Объединение массивов (Joining Arrays)](#Joining-Arrays)
- - [Создать массив по значению или ссылке (Assign by Value or by Reference)](#Assign-by-Value-or-by-Reference)

[5) КЛАССЫ И ОБЪЕКТЫ (CLASS AND OBJECT)](#5-КЛАССЫ-И-ОБЪЕКТЫ)

- [Наследование (Inheritance)](#Наследование)
- [Область видимости (Visibility)](#Область-видимости)

[5.1 Методы класса (Class Methods)](#5_1-Методы-класса)

- [Магические методы (Magic methods)](#Magic-methods)
- [Перегрузка (Overriding Methods)](#Overriding-Methods)
- [Геттеры и Сеттеры (Getters and Setters)](#Getters-and-Setters)

[6) REGEX](#6-REGEX)

[7) HTML IN PHP](#HTML-IN-PHP)

[7.1 HTML FORM handling in PHP](#HTML-FORM-handling-in-PHP)

- [Куча примеров форм (Examples)](#Examples)
- [Запросы PHP форм (Request Superglobals)](#Request-Superglobals)
- [Способы проверок (Ways FORM Validation)](#Ways-FORM-Validation)
- - [Проверка на клиентской части (Client-side FORM Validation)](#Client-side-FORM-Validation)
- - [Проверка на серверной части (Server-side FORM Validation)](#Server-side-FORM-Validation)

[7.2 LOOPS IN HTML](#7_2-LOOPS-IN-HTML)

[8) Модули](#8-Модули)

- </details>
  </d>

# PHP

[link to PHP Reference](https://www.php.net/manual/ru/langref.php)

[Function and Method listing](https://www.php.net/manual/ru/indexes.functions.php)

> use in HTML

```php
<!DOCTYPE html>
<html>
<head>
<title>How to put PHP in HTML - Simple Example</title>
</head>
<body>
<h1><?php echo "This message is from server side." ?></h1>
</body>
</html>
```

> > Example

```php
<?php
$about_me = [
  "name" => "Aisle Nevertell",
  "birth_year" => 1902,
  "favorite_food" => "pizza"
];

function calculateAge ($person_arr){
  $current_year = date("Y");
  $age = $current_year - $person_arr["birth_year"];
  return $age;
}
?>
<h1>Welcome!</h1>
<h2>About me:</h2>
<?php
  echo "<h3>Hello! I'm {$about_me["name"]}!</h3>";
  echo "<p> I'm " . calculateAge($about_me). " years old! That's pretty cool, right?</p>";
  echo "<div>What more is there to say? I love {$about_me["favorite_food"]}, and that's pretty much it!</div>";
?>

<h2>Now tell me a little about you.</h2>
<?php echo "<p>PHP interprets this and turns it into HTML</p>";?>
тоже самое что и, т.е. сокращенные вариант php echo
<?="<p>PHP interprets this and turns it into HTML</p>";?>


```

> Every statement in PHP must be terminated with a semicolon **;**

> PHP: Чтение документации. Example

> Пример 1. round()

```
round(int|float $num, int $precision = 0, int $mode = PHP_ROUND_HALF_UP): float

0. Внутри скобок round() необходимый аргумент, а запятые отделяют их друг от друга.
1. Впереди показан тип необходимого аргумента. В данном случаем аргументом будет число $num с типом float(обязательный только $num), $precision с типом int , $mode с типом int
2. Значения, которые присвоены по умолчанию присваиваются через равно. Это так называемые, необязательные параметры функции. Например необязательными будут $precision и $mode
4. В конце закрытия скобок round(), прямо после знака двоеточия будет тип возвращаемого значения. В данном случаем : float
```

###### ////////////////////////////////////

# 1 БАЗОВЫЕ

###### ////////////////////////////////////

> комменты

```js
//comment

/*
This is all commented
*/
<?
echo 'hello';// print hello
```

```php
Escape Sequences \
echo "She said \"hi\" to the dog."; // Prints: She said "hi" to the dog.
```

> newline escape \n

```php
echo "1. Go to gym";
echo "\n2. Cook dinner";
```

### Импорт файлов

###### ----------

<table>
<tr>
    <td> выражение </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> include </td>
 <td> включает и выполняет указанный файл </td>
 <td>
  
```php
// one.php
echo "How are";
```

```php
// two.php
echo " you?";
```

```php
// index.php
echo "Hello! ";
include "one.php";
include "two.php";
// Prints: Hello! How are you?
```

 </td>
</tr>
<tr>
 <td> include_once </td>
 <td> включает и выполняет указанный файл </td>
 <td>
  
```php
// index.php
echo "Hello! ";
include_once "one.php";
include_once "two.php";
// Prints: Hello! How are you?
```
 </td>
</tr>
<tr>
 <td> require </td>
 <td> аналогично include, за исключением того, что в случае возникновения ошибки E_COMPILE_ERROR, он остановит выполнение скрипта, тогда как include только выдал бы предупреждение E_WARNING </td>
 <td>
  
```php
// index.php
echo "Hello! ";
require "one.php";
require "two.php";
// Prints: Hello! How are you?
```
 </td>
</tr>
<tr>
 <td> require_once </td>
 <td> аналогично require за исключением того, что PHP проверит, включался ли уже данный файл, и если да, не будет включать его ещё раз </td>
 <td>
  
```php
echo "Hello! ";
require_once "one.php";
require_once "two.php";
```
 </td>
</tr>
</table>

###### ----------------------------

### Конкатенация строк

###### ----------

конкатенация происходит с помощью dot .

```php
echo "one " . "two"; // Prints: one two
```

###### ----------------------------

### Truthy and Falsy

###### ----------

> we’ll focus on expressions that are falsy:

- the boolean FALSE itself
- Empty strings - ''
- string zero - '0'
- the integer zero - 0
- the float zero - 0.0
- NULL (including unset variables)
- empty array (zero elements) - $arr = [];
- empty object (zero memebers variables)
- SimpleXML objects created from empty tags
- an undefined or undeclared variable

**Every other value is considered TRUE**

###### ----------------------------

### Переменные

###### ----------

> объявление переменной начинается с доллара $example = '';

```php
<?
$one = 1; // or int(1)
$my_string = 'string'; // or str(string)
printf($my_string); // print string
echo 'My string = ' . $my_string;
echo 'One = ' . "$one";
echo "I have a $my_string and number $one and ${my_string}ing"; // I have a string and number 1 and stringing
```

> Variable Reassignment

```php
$favorite_food = "Red curry with eggplant";
echo $favorite_food; // Prints: Red curry with eggplant
$favorite_food = "Pizza";
echo $favorite_food; // Prints: Pizz
```

> Concatenating variable

```php
$full_name = "Aisle";
$full_name .= " Nevertell";
echo $full_name; // Prints: Aisle Nevertell
```

> Assign by Reference assignment operator (=&)

> Присваивая переменную по ссылке, мы говорил ей что она ссылается на текущее значение переменной, а не создавать новую ячейку в памяти для хранения значения

```php
$first_player_rank = "Beginner";
$second_player_rank = $first_player_rank; // create new space in memory
echo $second_player_rank; // Prints: Beginner

$first_player_rank = "Intermediate"; // Reassign the value of $first_player_rank
echo $second_player_rank; // Still Prints: Beginner
```

If use =&

```php
$first_player_rank = "Beginner";
$second_player_rank =& $first_player_rank;  // link on memory
echo $second_player_rank; // Prints: Beginner

$first_player_rank = "Intermediate"; // Reassign the value of $first_player_rank
echo $second_player_rank; // Prints: Intermediate
```

> Numbers

```php
$my_int = 78;
echo -22.8; // Prints: -22.8
echo $my_int; // Prints: 78
```

###### ----------------------------

### Magic constant

###### ----------

[link magic constant](https://www.php.net/manual/ru/language.constants.magic.php)

| **константа**    |           **описание**            |
| :--------------- | :-------------------------------: |
| **LINE**         |   Текущий номер строки в файле    |
| **FILE**         | Полный путь и имя текущего файла  |
| **DIR**          |         Директория файла          |
| **FUNCTION**     | Имя функции или {closure} функции |
| **CLASS**        |            Имя класса             |
| **TRAIT**        |            Имя трейта             |
| **METHOD**       |         Имя метода класса         |
| **NAMESPACE**    |  Имя текущего пространства имён   |
| ClassName::class |        Полное имя класса.         |

###### ----------------------------

## 1_1 Операции с переменными

###### ----------

[link to Operators](https://www.php.net/manual/ru/language.operators.php)

###### ----------

### Арифметические операции

###### ----------

| **\*eng**      | **_пример_** | **_пример c переменной_**          |
| :------------- | :----------: | :--------------------------------- |
| compare        |      ==      | x == y; &#124; x === y;            |
| Subtract       |      -       | w -= 1; &#124;w--;                 |
| Multiply       |      \*      | w \*= 1;                           |
| Divide         |      /       | w /= 1;                            |
| Modulo         |      %       | 7 %= 3; //1 &#124; X %= Y          |
| Exponentiation |     \*\*     | 4\*\*=2; // Prints: 16             |
| Pre-increment  |     ++$a     | $a = 5; echo ++$a; //6; echo $a//6 |
| Post-increment |     $a++     | echo $a++; //5; echo $a //6        |
| Pre-decrement  |     --$a     | echo --$a; //4; echo $a //4        |
| Post-decrement |     $a--     | echo $a--; //5; echo $a //4        |

Operations will be evaluated in the following order:

```
1. Any operation wrapped in parentheses (())
2. Exponents (**)
3. Multiplication (*) and division (/)
4. Addition (+) and subtraction (-).
```

###### ----------------------------

### Логические операции

###### ----------

| **\*eng** | **_пример_** | **_пример c переменной_**    |
| :-------- | :----------: | :--------------------------- |
| And       |     and      | $a and $b                    |
| ---       |      &&      | $a && $b                     |
| Or        |      or      | $a or $b                     |
| --        |     \|\|     | $a \|\| $b                   |
| Not       |      !       | !$a                          |
| Xor       |     xor      | $a xor $b //любой, но не оба |

```php
// The or Operator:
TRUE or TRUE;   // Evaluates to: TRUE
FALSE or TRUE;  // Evaluates to: TRUE
TRUE or FALSE;  // Evaluates to: TRUE
FALSE or FALSE; // Evaluates to: FALSE

// The and Operator:
TRUE and TRUE;   // Evaluates to: TRUE
FALSE and TRUE;  // Evaluates to: FALSE
TRUE and FALSE;  // Evaluates to: FALSE
FALSE and FALSE; // Evaluates to: FALSE
```

```php
TRUE xor TRUE;   // Evaluates to: FALSE

FALSE xor TRUE;  // Evaluates to: TRUE

TRUE xor FALSE;  // Evaluates to: TRUE

FALSE xor FALSE; // Evaluates to: FALSE
```

###### ----------------------------

### Операции сравнения

###### ----------

| **\*eng**     | **_пример_** | **_пример c переменной_**             |
| :------------ | :----------: | :------------------------------------ |
| Equal         |      ==      | x == y; //после преобразования типов  |
| Identical     |     ===      | x === y; //и имеет тот же тип         |
| Not equal     |      !=      | x != y; //после преобразования типов  |
| ---           |      <>      | x <> y;                               |
| Not identical |     !==      | x !== y; // или они разных типов      |
| Less than     |      <       | x < y;                                |
| ---           |      <=      | x <= y; // меньше или равно y         |
| Greater than  |      >       | x > y;                                |
| ---           |      >=      | x >= y; // больше или равно y         |
| Spaceship     |     <=>      | x <=> y;//x меньше,больше или равно 0 |

###### ----------------------------

### Операции присваивания

###### ----------

| **\*eng**      | **_пример_** | **_пример c переменной_**    |
| :------------- | :----------: | :--------------------------- |
| set            |      =       | x = y;                       |
| Concat         |      .       | $a = 'y' . 'z'; // a = yz    |
| --             |      .=      | $b='1'; $b .= $a // b=1yz    |
| Null Coalesce  |      ??      | $a = $a ?? $b //exist a or b |
| --             |     ??=      | a ??= $b; // $a = $a ?? $b   |
| Exponentiation |     \*\*     | 4\*\*=2; // Prints: 16       |

> Null Coalesce example

```php
$name = $fullname ?? $first ?? $last ?? 'John';
echo $name; // 'John';

// Если $full, $first, $last последовательно не существуют или равны NULL то он объединит NULL c 'John' и в итоге выведет 'John'.
// Иначе следуя последовательности выведет значение $full,$first или $last
```

###### ----------------------------

### Операция исполнения

###### ----------

> ЕСли включена функция shell_exec()

```php
$output = `ls -al`;
echo "<pre>$output</pre>";
// Запуск функции через backticks `` (ёё)
```

```php
  $host = 'google.com';
    echo `ping -n 3 {$host}`;
```

###### ----------------------------

### Побитовые операции

###### ----------

<table>
<tr>
    <td> Пример </td> 
    <td> Название </td> 
    <td> Результат </td> 
</tr>
<tr>
 <td> $a & $b </td>
 <td> And </td>
 <td>

> Устанавливаются только те биты, которые установлены и в **$a**, и в **$b**.

 </td>
</tr>
<tr>
 <td> $a | $b </td>
 <td> And </td>
 <td>

> Устанавливаются только те биты, которые установлены и в **$a**, и в **$b**.

 </td>
</tr>
<tr>
 <td> $a ^ $b </td>
 <td> Xor </td>
 <td>

> Устанавливаются только те биты, которые установлены либо только в **$a**, либо только в **$b**, но не в обоих одновременно.

 </td>
</tr>
<tr>
 <td> ~ $a </td>
 <td> Not </td>
 <td>

> Устанавливаются те биты, которые не установлены в **$a**, и наоборот..

 </td>
</tr>
<tr>
 <td> $a<<$b </td>
 <td> Shift Left </td>
 <td>

> Все биты переменной **$a** сдвигаются на **$b** позиций влево (каждая позиция подразумевает "умножение на 2")

 </td>
</tr>
<tr>
 <td> $a>>$b </td>
 <td> Shift Right </td>
 <td>

> Все биты переменной **$a** сдвигаются на **$b** позиций вправо (каждая позиция подразумевает "деление на 2")

 </td>
</tr>
</table>

###### ----------------------------

###### ////////////////////////////////////

# 2 ФУНКЦИИ

###### ////////////////////////////////////

```nginx
function <functionName>($arg1,$arg2....){
...code...
}
```

```php
// объявление функции
function greetLearner()
{
  echo "Hello, Learner!\n";
}
// вызов функции
greetLearner(); // "Hello, Learner!"
```

`return` нужен для захвата вызова или результата функции

```php
function returnNothing()
{
  echo "I'm running! I'm running!\n";
}

$result = returnNothing(); // Prints: I'm running! I'm running!

echo $result; // Nothing is printed
```

```php
function countdown()
{
  echo "4, 3, 2, 1, ";
  return "blastoff!";
}

$return_value = countdown(); // Prints: 4, 3, 2, 1,
echo $return_value; // Prints: blastoff!
```

```php
function announceRunning2() {
  return "This is the return value of the second function.";
  echo "P.S., I love you"; // will never be printed! As soon as the return statement is reached, the function will end
}

$second_result = announceRunning2();
echo $second_result; // This is the return value of the second function.
```

```php
function returnFive() {
  return 5;
}

echo returnFive(); // Prints: 5
echo returnFive() + 3; // Prints: 8
```

> with parameter

```php
function sayCustomHello($name){
echo "Hello, $name!";
};

sayCustomHello("Alex"); // Prints: Hello, Alex
```

> with Multiple parameters

```php
function divide($num_one, $num_two){
  return $num_one / $num_two;
};

echo divide(12, 3); // Prints: 4
```

> with default parameter

```php
function greetFriend($name = "Cum"){
  echo "Hello, $name!";
};

greetFriend("Marvin"); // Prints: Hello, Marvin!
greetFriend(); // Prints: Hello, Cum!
```

> Reference parameter functions &param

```php
function addX ($param){
  $param = $param . "X";
  echo $param;
};

function addXPermanently (&$param){
  $param = $param . "X";
  echo $param;
};

$word = "Hello";
addX($word); // Prints: HelloX
echo $word; // Prints: Hello
ddXPermanently($word); // Prints: HelloX
echo $word; // reference Prints: HelloX
```

###### ----------------------------

#### Переменная область видимости

###### ----------

```php
function calculateDaysLeft($feed_quantity, $number, $rate){
  $result = $feed_quantity / ($number * $rate);
  return $result;
}
echo calculateDaysLeft(300, 2, 30); //5
echo $result; //Undefined variable
```

###### ----------------------------

#### Глобальная область видимости

###### ----------

```php
$language = "PHP";
$topic = "scope";

function generateLessonName($concept){
  global $language;
  return $language . ": " . $concept;
}

echo $language; //php
echo generateLessonName($topic); // PHP: scope
```

###### ----------------------------

### Функции обработки переменных

###### ----------

[link Variable handling Functions](https://www.php.net/manual/ru/ref.var.php)

<table>
<tr>
    <td> функция </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> gettype </td> 
    <td> Возвращает тип переменной </td> 
    <td>

```php
$name = 'Aisle Nevertell';
$age = 10;

echo gettype($name); // Prints: string
echo gettype($age); // Prints: integer
```

  </td> 
</tr>
<tr>
    <td> var_dump </td> 
    <td> Функция отображает структурированную информацию </td> 
    <td>

```php
var_dump($name); // Prints: string(15) "Aisle Nevertell"
var_dump($age); // Prints: int(1000000)
```

 </td> 
</tr>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
</table>

###### ----------------------------

### String Functions

###### ----------

[link String Functions](https://www.php.net/manual/ru/ref.strings.php)

<table>
<tr>
    <td> функция </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> strrev </td> 
    <td> Переворачивает строку задом наперёд </td> 
    <td>

```php
echo strrev("Hello world!"); // выводит "!dlrow olleH"
```

  </td> 
</tr>
<tr>
    <td> substr_count </td> 
    <td> Возвращает число вхождений подстроки </td> 
    <td>

```php
$text = 'This is a test';
echo strlen($text); // 14
echo substr_count($text, 'is'); // 2
```

 </td> 
</tr>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td>

```php
примеры
```

 </td> 
</tr>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td>

```php
примеры
```

 </td> 
</tr>
</table>

#### Basic Sanitization

> Для предотвращения вредных запросов в формах или приходящих данных, нужно эти данные фильтровать

<table>
<tr>
    <td> метод </td> 
    <td> описание </td> 
    <td> пример </td> 
</tr>
<tr>
 <td> htmlspecialchars() </td>
 <td> Преобразует специальные символы в HTML-сущности </td>
 <td>

```php
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
```

```php
$data = "<a href=\"https://www.evil-spam.biz/html/\">Your account has been compromised! Click here to get technical support!!</a>";
echo htmlspecialchars($data);

// Prints: &lt;a href=&quot;https://www.evil-spam.biz/html/&quot;&gt;Your account has been compromised! Click here to get technical support!&lt;/a&gt;
// Мы предотвратили html инъекцию
```

 </td>
</tr>
<tr>
 <td> filter_var() </td>
 <td> 
 
 > [link](https://www.php.net/manual/ru/function.filter-var.php)
 Фильтрует переменную с помощью определённого фильтра </td>
 <td>

> [sanitize](https://www.php.net/manual/ru/filter.filters.sanitize.php)

> [validate](https://www.php.net/manual/ru/filter.filters.validate.php)

```php
$bad_email = '<a href="www.evil-spam.biz">@gmail.com';
echo filter_var($bad_email, FILTER_SANITIZE_EMAIL);
// Prints: ahref=www.evil-spam.biz@gmail.com
```

```php
$bad_email = 'fake - at - prank dot com';
if (filter_var($bad_email, FILTER_VALIDATE_EMAIL)){
  echo "Valid email!";
} else {
  echo "Invalid email!";
}
// Prints: Invalid email!
```

> Options - чтобы конкретнее задать условие замены или отбора, нужно использовать опции(параметры)

```php
function validateAdult ($age){
  $options = ["options" => ["min_range" => 18, "max_range" => 124]];
  if (filter_var($age, FILTER_VALIDATE_INT, $options)) {
    echo("You are ${age} years old.");
  } else {
    echo("That is not a valid age.");
  }
}

validateAdult(18); // Prints: You are 18 years old.
validateAdult(124); // Prints: You are 124 years old.
validateAdult(8); // Prints: That is not a valid age.
validateAdult(200); // Prints: That is not a valid age.
```

 </td>
</tr>
<tr>
 <td> preg_match() </td>
 <td> Выполняет проверку на соответствие регулярному выражению </td>
 <td>

```php
$pattern = '/^[(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4}$/';
preg_match($pattern, "(999)-555-2222"); // Returns: 1
preg_match($pattern, "555-2222"); // Returns: 0
```

 </td>
</tr>
<tr>
 <td> strlen () </td>
 <td> Возвращает длину строки </td>
 <td>

```php
$name = "Aisle Nevertell";
$length = strlen($name);
if ($length > 2 && $length < 100){
  echo "That seems like a reasonable name to me...";
}
```

 </td>
</tr>
<tr>
 <td> preg_replace() </td>
 <td> Выполняет поиск и замену по регулярному выражению </td>
 <td>

```php
$one = "codeacademy";
$two = "CodeAcademy";
$three = "code academy";
$four = "Code Academy";

$pattern = "/[cC]ode\s*[aA]cademy/";
$codecademy = "Codecademy";

echo preg_replace($pattern, $codecademy, $one);// Prints: Codecademy
echo preg_replace($pattern, $codecademy, $two);// Prints: Codecademy
echo preg_replace($pattern, $codecademy, $three);// Prints: Codecademy
echo preg_replace($pattern, $codecademy, $four);// Prints: Codecademy
```

 </td>
</tr>
</table>

###### ----------------------------

### Math Functions

###### ----------

[link Math Functions](https://www.php.net/manual/ru/ref.math.php)

<table>
<tr>
    <td> функция </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> abs </td> 
    <td> выводит модуль числа </td> 
    <td>

```php
echo abs(-4.2); // 4.2 (double/float)
echo abs(5);    // 5 (integer)
echo abs(-5);   // 5 (integer)
```

  </td> 
</tr>
<tr>
    <td> substr_count </td> 
    <td> Возвращает число вхождений подстроки </td> 
    <td>

```php
$text = 'This is a test';
echo strlen($text); // 14
echo substr_count($text, 'is'); // 2
```

 </td> 
</tr>
<tr>
    <td> round  </td> 
    <td> Округляет число типа float </td> 
    <td>

```php
echo round(1.2); // Prints: 1
echo round(1.5); // Prints: 2
```

 </td> 
</tr>
<tr>
    <td> rand  </td> 
    <td> Генерирует случайное число </td> 
    <td>

```php
echo rand() . "\n";  // 7771
echo rand(5, 15);    // 11
```

 </td> 
</tr>
</table>

###### ----------------------------

### Filesystem Functions

###### ----------

[link Filesystem Functions](https://www.php.net/manual/ru/ref.filesystem.php)

<table>
<tr>
    <td> функция </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> move_uploaded_file </td> 
    <td> Перемещает загруженный файл в новое место </td> 
    <td>

```php
$uploads_dir = '/uploads';
$current_path = $_FILES['avatar']['tmp_name'];
$filename = $_FILES['avatar']['name'];
move_uploaded_file($current_path, $uploads_dir);
```

  </td> 
</tr>
<tr>
    <td> file_put_contents  </td> 
    <td> Пишет данные в файл </td> 
    <td>

```php
$file = 'people.txt';
$new = $_REQUEST;
// перезаписывает файл
file_put_contents($file, $new);
// добавляет в файл
file_put_contents($file, $new, FILE_APPEND | LOCK_EX);
```

 </td> 
</tr>
<tr>
    <td>   </td> 
    <td>  </td> 
    <td>

```php
echo round(1.2); // Prints: 1
echo round(1.5); // Prints: 2
```

 </td> 
</tr>
<tr>
    <td>   </td> 
    <td>  </td> 
    <td>

```php

```

 </td> 
</tr>
</table>

###### ----------------------------

###### ////////////////////////////////////

# 3 УПРАВЛЯЮЩИЕ КОНСТРУКЦИИ

###### ////////////////////////////////////

[link to Control Structures](https://www.php.net/manual/ru/language.control-structures.php)

[link to Operators](https://www.php.net/manual/ru/language.operators.php)

## 3_1 Условные

###### ----------

<table>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> if </td>
 <td> проверка если равно or etc то сделать то-то </td>
 <td>
  
```php
$is_clicked = TRUE;
if ($is_clicked) {
  $link_color = "purple";
  echo $link_color;
} else {
  $link_color = "red";
}
```
 </td>
</tr>
<tr>
 <td> else if <br/> elseif </td>
 <td> если равно сделать то, иначе сдделато то, иначе сделато то </td>
 <td>
  
```php
$one_two = '12';
if ($one_two == '2') {
  $link_color = "purple";
  echo $link_color;
} else if (one_two == '12') {
  $link_color = "blue";
  echo $link_color;
} else {
  echo 'not correct color';
}
```
> через двоеточие
```php
/* Некорректный способ: */
if($a > $b):
    echo $a." больше, чем ".$b;
else if($a == $b): // Не скомпилируется.
    echo "Строка выше вызывает фатальную ошибку.";
endif;
```
```php
if($a > $b):
    echo $a." больше, чем ".$b;
elseif($a == $b): // Заметьте, тут одно слово.
    echo $a." равно ".$b;
else:
    echo $a." не больше и не равно ".$b;
endif;
```
 </td>
</tr>
<tr>
 <td> Switch  </td>
 <td> если нужно проверить много условий. Обязательно ставить break или continue </td>
 <td>

```php
switch ($letter_grade){
  case "A":
    echo "Terrific";
    break;
  case "B":
    echo "Good";
    break;
  default:
    echo "Invalid grade";
```

> default - если не один не совпал

```php
function returnSeason($month){
  switch ($month) {
    case "December":
    case "January":
    case "February":
      return "winter";
    case "March":
    case "April":
    case "May":
      return "spring";
    case "June":
    case "July":
    case "August":
      return "summer";
    case "September":
    case "October":
    case "November":
      return "fall";
	}
}

echo returnSeason("February"); //winter
```

 </td>
</tr>
</table>

###### ----------------------------

### Тернарный оператор

###### ----------

```php
$num = 1;
$var = ($arg1 > 1) ? "true" : "false";
```

```php
$isClicked = FALSE;
$link_color = $isClicked ? "purple" : "blue"; // blue
```

> same as

```php
$isClicked = FALSE;
if ( $isClicked ) {
  $link_color = "purple";
} else {
  $link_color = "blue";
}
```

> внутри функции

```php
function ternaryVote ($age) {
  return $age >= 18 ? "yes" : "no";
}

echo ternaryVote(13); //no
```

> else if тернарный оператор

```php
$shipping = $price > 10000 ? 0 : ($price > 500 ? 100 : 200);
```

> same as

```php
if($price > 10000) {
    $shipping = 0;
} elseif($price > 500) {
    $shipping = 100;
} else {
    $shipping = 200;
}
```

###### ----------------------------

## 3_2 Циклы

###### ----------

<table>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> while </td>
 <td> до тех пор, пока выражение TRUE </td>
 <td>
  
```php
while (compare statement){
....;
}
```
```php
$count = 1;
while ($count <= 100){
  if ($count % 33 === 0) {
    echo $count . " is divisible by 33\n";
  }
  $count += 1;
}
```
> old variant
```php
$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;
```

 </td>
</tr>
<tr>
 <td> do…while </td>
 <td> Выполнить до условия, то же что и while, только условие проверяется в конце тела цикла, т.е. тело цикла выполнится хотя бы один раз  </td>
 <td>

```php
<?php
do {
  ...;
} while (compare statement);
?>
```

```php
do {
$random = rand (0, 30);
} while ($random > 10 && $random < 20);
echo " Наше случайное число: $random";
?>
// Используя php цикл do-while, можно получить значение выражения без инициализации переменной $random. Тело цикла выполняется перед тем, как проверяется условие.
```

 </td>
</tr>
<tr>
 <td> for </td>
 <td> выполняет блок кода определенное количество раз(количество итераций) пока условие выражение будет TRUE </td>
 <td>
  
```php
for (expr1; expr2; expr3){
  ...;
  // expr1 - выполняется в начале
  // expr2 - compare statement
  // expr3 -  выполняется в конце каждой итерации
}
```
```php
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
```
```php
  for ($i = 10; $i >= 0; $i--) {
    if ($i === 2) {
      echo "Ready!\n";
    } elseif ($i === 1) {
      echo "Study!\n";
    } elseif ($i === 0) {
      echo "Go!\n";
    } else {
      echo $i . "\n";
    }
  }
```
 </td>
</tr>
<tr>
 <td> foreach  </td>
 <td> простой способ перебора массивов, работает только с массивами и объектами </td>
 <td>

```php
foreach (iterable_expr as $value){
  ...;
}
foreach (iterable_expr as $key => $value){
  ...;
}
```

```php
$arr = [1, 2, 3, 4];
foreach ($arr as &$value) {
    $value = $value * 2; // $arr = array(2, 4, 6, 8)
}
```

```php
$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}
/* $a[one] => 1.
$a[two] => 2.
$a[three] => 3.
$a[seventeen] => 17.*/
```

 </td>
</tr>
</table>

###### ----------------------------

## 3_3 Прерывания

###### ----------

<table>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> break  </td>
 <td> рерывает выполнение текущей структуры for, foreach, while, do-while или switch. </td>
 <td>
  
```php
// break принимает необязательный числовой аргумент, который сообщает ему выполнение какого количества вложенных структур необходимо прервать Значение по умолчанию 1
$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "Итерация 5<br />\n";
            break;  /* Выйти только из конструкции switch. */
        case 10:
            echo "Итерация 10; выходим<br />\n";
            break 2;  /* Выходим из конструкции switch и из цикла while. */
        default:
            break;
    }
}
```

 </td>
</tr>
<tr>
 <td> continue  </td>
 <td> используется (внутри циклических структур, приведенных выше) для пропуска одной или нескольких итераций цикла  </td>
 <td>

```php
for ($i = 0; $i <= 10; $i++) {
if ($i % 2 == 0) {
  continue;
}
if ($i == 7) {
  continue;
}
echo $i . ','; //1,3,5,9,
}
```

 </td>
</tr>
</table>

###### ----------------------------

###### ////////////////////////////////////

# 4 МАССИВЫ

###### ////////////////////////////////////

> элемент массива начинается с нуля

> define array

```php
$my_array = array(1, 2, 2); // old shcool define
$mixed_array = array(1, "chicken", 78.2, "bubbles are crazy!");
$my_array1 = [0, 1, 2]; 	// new school define
var_dump($my_array);  //array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) }
```

> add element array

```php
$my_array1[] = 'check'; // add new element to array
var_dump($my_array1);  //array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> string(5) "check" }
```

> reassign element array

```php
$my_array[0] = 'kiss';
var_dump($my_array); // array(3) { [0]=> string(4) "kiss" [1]=> int(1) [2]=> int(2) }
```

> print array

```php
print_r($mixed_array); // Array ( [0] => 1 [1] => chicken [2] => 78.2 [3] => bubbles are crazy! )
```

> Accessing an Element array

```php
echo $mixed_array[1]; // 78.2
```

### Array Functions

###### ----------

[link Array Functions](https://www.php.net/manual/ru/ref.array.php)

<table>
<tr>
    <td> функция </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
    <td> count </td> 
    <td> Подсчитывает количество элементов массива </td> 
    <td>

```php
$my_array = [1, 2, 3];
echo count($my_array); // Prints: 3
```

  </td> 
</tr>
<tr>
    <td> implode </td> 
    <td> Объединяет элементы массива в строку </td> 
    <td>

```php
implode(", ", $my_array);
var_dump($my_array); // string(5) "1,2,3"
```

 </td> 
</tr>
<tr>
    <td> array_pop </td> 
    <td> Извлекает последний элемент массива </td> 
            <td>

```php
$my_array = ["tic", "tac", "toe"];
var_dump(array_pop($my_array)); // string(3) "tac"
array_pop($my_array);
var_dump($my_array); // array(2) { [0]=> string(3) "tic" [1]=> string(3) "tac" }
```

 </td>  
</tr>
<tr>
    <td> array_push  </td> 
    <td> Добавляет элементы в конец массива </td> 
        <td>

```php
$new_array = ["eeny"];
array_push($new_array, "meeny");
var_dump($new_array); // array(2) { [0]=> string(4) "eeny" [1]=> string(5) "meeny" }
```

 </td> 
</tr>
<tr>
    <td> array_shift  </td> 
    <td> Извлекает первый элемент массива </td> 
        <td>

```php
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack); // Array ( [0] => banana [1] => apple [2] => raspberry )
```

 </td>  
</tr>
</table>

###### ----------------------------

### Nested Arrays

###### ----------

```php
$nested_arr = [
    [2, 4], [3, 9], [4, 16]
  ];
$first_el = $nested_arr[0][0];
echo $first_el; // Prints: 2
print_r($nested_arr[0]);  //Array ( [0] => 2 [1] => 4 )
```

###### ----------------------------

### Associative Arrays

###### ----------

> Ассоциативный массив начинается с пары: **"key"** => **"value"**. **Key** должен быть либо типом **int** либо **string**. **Value** может быть любым типом.

> "=>" оператор для связывания ключа с его значением.

```php
$about_me = array(
    'fullname' => 'Aisle Nevertell',
    'social' => 123456789
);
print_r($about_me['fullname']); // Aisle Nevertell
```

```php
$favorites = [
  "favorite_food"=>"pizza",
  "favorite_place"=>"my dreams",
  "FAVORITE_CASE"=>"CAPS",
  "favorite_person"=>"myself"
];

echo  $favorites["favorite" . "_" . "food"]; // Prints: pizza
echo  $favorites[strtoupper("favorite_case")];// Prints: CAPS
$key =  "favorite_place";
echo  $favorites[$key];  // Prints: my dreams
```

> add element

```php
$about_me['third'] = 'three';
echo $about_me["third"]; // Prints: three
```

> change element

```php
$about_me['social'] = '111111';
echo $about_me["social"]; // Prints: 111111
$about_me[] = 'in_new_element_zero';
echo $about_me[0]; // print: in_new_element_zero
$about_me[100] = '100 string';
```

> delete element

```php
unset($about_me["fullname"]);
print_r($about_me); // Array ( [social] => 111111 [third] => threee [0] => in_newelement_zero [100] => 100 string )
```

#### Joining Arrays

> Оператор объединения (+) принимает два операнда массива и возвращает новый массив с уникальными ключами из первого и второго. Если у двух массивов есть одинаковый ключ, то значение ключа берется из первого массива

```php
$impala_foods = [
  "dessert"=>"cookies",
  "vegetable"=>"asparagus",
  "side"=>"mashed potatoes"
];

$rat_foods = [
  "dip"=>"mashed earth worms",
  "entree"=>"trash pizza",
  "dessert"=>"sugar cubes",
  "drink"=>"lemon water"
];

$potluck = $giraffe_foods + $impala_foods;
print_r($potluck);
/*Array
(
    [dip] => mashed earth worms
    [entree] => trash pizza
    [dessert] => sugar cubes
    [drink] => lemon water
    [vegetable] => asparagus
    [side] => mashed potatoes
)*/
```

#### Assign by Value or by Reference

> reference &

```php
$favorites = ["food"=>"pizza", "person"=>"myself", "dog"=>"Tadpole"];
$copy = $favorites;
$alias =& $favorites;
$favorites["food"] = "NEW!";

echo $favorites["food"]; // Prints: NEW!
echo $copy["food"]; // Prints: pizza
echo $alias["food"]; // Prints: NEW!
```

> without reference

```php
function changeColor ($arr)
{
  $arr["color"] = "red";
}
$array = ["shape"=>"square", "size"=>"small", "color"=>"green"];
changeColor ($array);
echo $array["color"]; // Prints: green
```

> with reference

```php
function reallyChangeColor (&$arr)
{
  $arr["color"] = "red";
}
$array = ["shape"=>"square", "size"=>"small", "color"=>"green"];
reallyChangeColor ($array);
echo $array["color"]; // Prints: red
```

###### ----------------------------

###### ////////////////////////////////////

# 5 КЛАССЫ И ОБЪЕКТЫ

###### ////////////////////////////////////

[link to class](https://www.php.net/manual/ru/language.oop5.basic.php)

[link to object](https://www.php.net/manual/ru/language.types.object.php)

> define class

```php
class Classname {
....
properties object;
}
```

> > Example

```php
class Pet {
  public $name, $color;
}
```

> Instantiation - процесс создания нового объекта

```php
$very_good_dog = new Pet(); // создан объект $very_good_dog внутри класса Pet()
```

```php
// взаимодействуем со свойствами объекта, используя оператор объекта (->),
//за которым следует имя свойства (без знака доллара, $)
// set property
$very_good_dog->name = "Lassie";
// get property
echo $very_good_dog->name; # Prints "Lassie"
```

### Наследование

###### ----------

[Late Static Bindings](https://www.php.net/manual/ru/language.oop5.late-static-bindings.php)

> оператор **$this->** - используется внутри области ограниченной объявлением класса class some { }. Является ссылкой на вызываемый объект

```php
class A {
    private $a = 1;

    public function getA(){
        return $this->a; // обращаемся к внутреннему свойсву через $this
    }

    public function someMethod(){
        return $this->getA(); // обращаемся к внутреннему методу через $this
    }
}

$obj = new A();
echo $obj->someMethod(); //1
```

> оператор **parent::** - используется внутри области ограниченной объявлением класса class some { }. Является ссылкой на родительский объект.

```php
    class Model {
       public static $table='table';
       public static function foo() {
          echo "1_test";
          }
        }
    class User extends Model{
           public static function foo() {
          echo "2_test";
          parent::foo();
          }
       }
echo User::foo(); //выведет '2_test1_test'
```

> оператор **self::** - используется внутри области ограниченной объявлением класса class some { }. Вызываем метод именно этого класса, как и в том месте где она определена. Класс в котором написано.

```php
class Model {
   public static $table='table';
   public static function getTable() {
      return self::$table;
      }
    }
class User extends Model{
      public static $table='users';
   }
   echo User::getTable(); //выведет 'table'
```

```php
class Model {
   public static $table='table';
   public static function getTable() {
      return self::$table;
      }
    }
class User extends Model{
      public static $table='users';
      public static function getTable() {
        return self::$table;
      }
   }
   echo User::getTable(); //выведет 'users'
```

> оператор **static::** - используется внутри области ограниченной объявлением класса class some { }. Берет данные из вызывающего класса. Может ссылаться только на статические поля класса. Класс в котором выполнилось.

```php
class Model {
   public static $table='table';
   public static function getTable() {
      return self::$table;
      }
    }
class User extends Model{
      public static $table='users';
      public $new = 'new';
      public static function getTable() {
        return static::$table;
      }
   }
   echo User::getTable(); //выведет 'users'
   echo User::$table; // 'users'
   echo User::$new; // Uncaught Error: Access to undeclared static property: User::$new
```

> Дочерний класс наследует свойства и параметры родительского

> define class

```php
class ChildClass extends ParentClass {
 ...
}
```

> > Example

```php
class Dog extends Pet {
  function bark() {
    return "woof";
  }
}
```

> > Example

```php
<?php
class Beverage {
  public $temperature;

  function getInfo() {
    return "This beverage is $this->temperature.";
  }
}

class Milk extends Beverage {
  function __construct() {
    $this->temperature = "cold";
  }

}
```

###### ----------------------------

### Область видимости

###### ----------

[link to visiability php](https://www.php.net/manual/ru/language.oop5.visibility.php)

- Public - Доступ можно получить как внутри класса, так и снаружи (является видимостью по умолчанию для функций, констант и свойств класса.)
- Private - доступ только внутри класса.
- Protected - разрешает доступ к свойствам родительского из дочерних классов

> Внутри дочерних классов чтобы получать или изменять свойство нужно использовать методы

> 1

```php
class Pet {
  private $healthScore = 0;
}

class Horse extends Pet {
  function brushTeeth() {
    $this->healthScore++;
  }
}

$my_pet = new Horse();
$my_pet->brushTeeth(); // Error Undefined property: Horse::$healthScore
```

> 2

```php
class Pet {
  protected $healthScore = 0;
}

class Horse extends Pet {
  function brushTeeth() {
    $this->healthScore++;
  }
}

$my_pet = new Horse();
$my_pet->brushTeeth(); // Successfully increments healthScore
$my_pet->healthScore; // Error  Cannot access protected property Horse::$healthScore
```

###### ----------------------------

## 5_1 Методы класса

###### ----------

> Методы класса - по сути функции, которые будут содержаться в каждом объекте, их часто используют для взаимодействия со свойствами объекта

> **$this** - относится к текущему объекту / свойству класса; когда мы вызываем этот метод, $this ссылается на конкретный объект, вызвавший метод.

```php
class Pet {
  public $first, $last;
  function getFullName() {
    return $this->first . " " . $this->last;
  }
}
```

> Доступ к методам осуществляется так же, как и к свойствам, но для их вызова используйте круглые скобки в конце

```php
$my_object->classMethod();
```

> > Example

```php
$very_good_groundhog = new Pet();
$very_good_groundhog->first = "Punxsutawney";
$very_good_groundhog->last = "Phil";
echo $very_good_groundhog->getFullName(); # Prints "Punxsutawney Phil"
```

###### ----------------------------

### Magic methods

###### ----------

[links magic methods php](https://www.php.net/manual/ru/language.oop5.magic.php)

<table>
<tr>
    <td> метод </td> 
    <td> описание </td> 
    <td> пример </td> 
</tr>
<tr>
 <td> __construct </td>
 <td> Этот метод вызывается автоматически при создании экземпляра объекта. Например задать условие по умолчанию, для каждого экземпляра объекта 
 
 ```php
// несколько способов объявления
//1 - дефолтный
...
public $name, $age;
function __construct($name, $age)
...
//2 - Параметры по умолчанию
...
function __construct($name="Том", $age=36)
...
//3 - Объявление свойств через конструктор
...
function __construct(public $name, public $age)
...
//4 - сочетание обоих
...
public $name;
function __construct($name = "Sam", public $age = 33)
...
```
</td>
<td>

```php
class Pet {
 public $deserves_love;
 function __construct() {
   $this->deserves_love = TRUE;
 }
}
$my_dog = new Pet();
if ($my_dog->deserves_love){
 echo "I love you!";
} // Prints: I love you!
```

```php
class Pet {
  public $name;
  function __construct($name) {
    $this->name = $name;
  }
}
$dog = new Pet("Lassie");
echo $dog->name; // Prints: Lassie
```

 </td>
</tr>
 <td> __destruct </td>
 <td> Деструкторы служат для освобождения ресурсов. Этот метод полезен, когда вы хотите выполнить какие-либо действия в последнюю минуту (например, сохранить или распечатать некоторые данные после их удаления). Деструктор объекта вызывается самим интерпретатором PHP после потери последней ссылки на данный объект в программе. Объект будет уничтожен</td>
 <td>

```php
class Fruit {
  public $name;
  public $color;

  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
    echo 'Hi , '. $this->name. '<br>';
  }
  function __destruct() {
    echo "Название фрукта {$this->name} и его цвет {$this->color}.";
  }
}

$apple = new Fruit("яблоко", "красный"); // hi яблоко
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
<tr>
 <td> __call() </td>
 <td> запускается при вызове недоступных методов в объекте. Т.е. если вы обращаетесь к методу объекта, которого не существует, то запускается этот метод</td>
 <td>

```php
  class MyClass  {
    public function __call($name, $arguments) {
      echo "Вызван метод '$name'  со следующими аргументами " . implode(', ', $arguments) . PHP_EOL;
    }
  }

  $obj = new MyClass;
  $obj -> objMethod("метод объекта");
```

 </td>
</tr>
<tr>
 <td> __callStatic </td>
 <td> запускается при вызове недоступных методов у класса. Т.е. если вы обращаетесь к статическому методу класса, а его не существует, то вызывается это метод</td>
 <td>

```php
  class MyClass  {
    public static function __callStatic($name, $arguments) {
      echo "Вызван статический метод '$name'  со следующими аргументами " . implode(', ', $arguments)  . PHP_EOL;
    }
  }

MyClass::objMethod("метод класса");
```

 </td>
</tr>
<tr>
 <td> __get </td>
 <td> запускается при попытке чтения несуществующих, приватных или защищенных свойств объекта</td>
 <td>

```php
class Spindle_Model_User_get{
    protected $_data = [
        'username' => null,
        'email'    => null,
        'fullname' => '',
        'role'     => 'guest',
    ];

    public function __get($name){
        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        }
        return null;
    }
}

$obj = new Spindle_Model_User_get();
echo $obj->username; // alex
var_dump($obj->variable); // NULL
```

 </td>
</tr>
<tr>
 <td> __set </td>
 <td> запускается при попытке записи данных в несуществующие, приватные или защищенные свойства объекта</td>
 <td>

```php
class Spindle_Model_User_set{
    protected $_data = [
        'username' => null,
        'email'    => null,
        'fullname' => '',
        'role'     => 'guest',
    ];

    public function __set($name, $value){
        if (!array_key_exists($name, $this->_data)) {
            throw new Exception('Invalid property "' . $name . '"');
        }
        $this->_data[$name] = $value;
    }
}

$obj = new Spindle_Model_User_set();
$obj->username = 'alex'; // set username alex
$obj->variable = '1'; // Error Uncaught Exception: Invalid property "variable"
```

 </td>
</tr>
<tr>
 <td> __isset </td>
 <td> будет запущен, при попытке использовать метод isset()(проверяет существует ли переменная или свойство), на несуществующем, защищенном или приватном свойстве объекта</td>
 <td>

```php
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
<tr>
 <td> __unset </td>
 <td> запускается при попытке использования unset(), на несуществующем, защищенном или приватном свойстве объекта</td>
 <td>

```php
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
<tr>
 <td> __sleep </td>
 <td> запускается до любой операции сериализации. может использоваться, например для очистки объекта</td>
 <td>

```php
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
<tr>
 <td> __wakeup </td>
 <td> этот магический метод запускается до выполнения функции unserialize(). Используется для восстановления различных ресурсов, которые может иметь объект</td>
 <td>

```php
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
<tr>
 <td> __toString </td>
 <td> если объект попытаются использовать как строку, то запустится этот метод</td>
 <td>

```php
class MyClass
{
    public $variable;
    public function __construct($variable){
        $this->variable= $variable;
    }

    public function __toString(){
        return $this->variable;
    }
}

$object = new MyClass('Hi from object');
echo $object ; // пытаемся ECHO-м вывести на экран объект, в результате
// запускается магический метод __toString, который возвращает строку
// "Hi from object", и выводится на экран "Hi from object".
```

 </td>
</tr>
<tr>
 <td> __invoke </td>
 <td> вызывается, если объект пытаются вызвать как функцию</td>
 <td>

```php
class MyClass
{
    public function __invoke($var){
        var_dump($var);
    }
}
$object = new MyClass;
$object(60); // т.к. объект пытаются использовать как функцию,
// то запускается магический метод __invoke
```

 </td>
</tr>
<tr>
 <td> __set_state </td>
 <td> запускается если Ваш объект пытаются передать в функцию VAR_EXPORT</td>
 <td>

```php
var_export($itObject);
```

 </td>
</tr>
<tr>
 <td> __clone </td>
 <td> срабатывает после завершения клонирования объекта</td>
 <td>

```php
$clone_your_object = clone $your_object; //После такого клонирования,
//если определен магический метод __clone, он будет запущен.
```

 </td>
</tr>
</tr>
<tr>
 <td> __debugInfo </td>
 <td> запускается, если в функцию var_dump(), передать объект</td>
 <td>

```php
// Название фрукта яблоко и его цвет красный.
```

 </td>
</tr>
</table>

###### ----------------------------

### Overriding Methods

###### ----------

[link to overriding](https://www.php.net/manual/ru/language.oop5.overloading.php)

> Перегрузка в PHP означает возможность динамически создавать свойства и методы. Эти динамические сущности обрабатываются с помощью магических методов.

> Когда мы хоти поменять функцию метода родительского класса в дочернем. родительский по прежнему можно будет вызвать через **parent::method()**

> Example

```php
class Pet {
  function type() {
    return "pet";
  }
}

class Dog extends Pet{
  function type() {
    return "dog";
  }
  function classify(){
    echo "This " . parent::type() . " is of type " . $this->type();
    // Prints: This pet is of type dog
  }
}
```

###### ----------------------------

### Getters and Setters

> example

```php
class Pet {
  private $name;
  function setName($name) {
    if (gettype($name) === "string") {
    $this->name = $name;
    return true;
    } else {
    return false;
    }
  }
  function getName() {
    return $this->name;
  }
}
```

###### ----------------------------

###### ////////////////////////////////////

# 6 REGEX

###### ////////////////////////////////////

[link cheatsheet regex](https://www.codecademy.com/learn/learn-php/modules/php-form-validation/cheatsheet)

###### ----------------------------

###### ////////////////////////////////////

# 7 HTML IN PHP

###### ////////////////////////////////////

## 7_1 HTML FORM HANDLING IN PHP

###### ----------

### Example form html

###### ----------

> 1

```php
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <h1>Welcome To This Form</h1>
    <form action="" method="POST">
          <label for="text">You can enter text here:</label>
    			<input type="text" name="text">
        <hr>
          <label for="num">You can enter a number here:</label>
          <input type="number" name="num">
        <hr>
          <label for="slider">You can slide this:</label>
          <br>
          <span>Left</span>
          <input type="range" name="slider" value="3" min="1" max="5">
          <span>Right</span>
        <hr>
       <label for="boxes">You can check these:</label>
          <input type="checkbox" name="boxes" value="first">
          <label for="first">First</label>
          <input type="checkbox" name="boxes"  value="second">
          <label for="second">Second</label>
          <input type="checkbox" name="boxes" value="third">
          <label for="third">Third</label>
        <hr>
      <label for="radio">You can select one of these:</label>
          <input type="radio" name="radio" value="true">
          <label for="true">TRUE</label>
          <input type="radio" name="radio" value="false">
          <label for="false">FALSE</label>
        <hr>
          <label for="dropdown">You can select one of these</label>
          <select name="dropdown">
            <option value="first">First</option>
            <option value="second">Second</option>
            <option value="third">Third</option>
          </select>
        <hr>
          <input type="submit" value="Submit to Reset">
      </form>
  </body>
</html>
```

> 2

```html
<html>
	<body>
		<form method="post" action="">
			Your name:
			<br />
			<input type="text" name="name" />
			<br /><br />
			What is the best thing about learning to code:
			<br />
			<input type="text" name="best" />
			<br /><br />
			<input type="submit" value="Submit Answers" />
		</form>
		<a href="index.php">Reset</a>
		<div id="form-output">
			<p id="name">
				Hello,
				<?= $_POST["name"]?>!
			</p>
			<p id="best">
				I am glad you enjoy
				<?= $_POST["best"]?>.
			</p>
		</div>
	</body>
</html>
```

> 3

```php
<?php
function checkWord($input, $letter){
   if ($_SERVER["REQUEST_METHOD"] === "POST" && strtolower($input[0]) !== $letter) {
    return "* This word must start with the letter ${letter}!";
   } else {
     return "";
   }
}
?>

<h1>Time to Practice our ABCs</h1>
<form method="post" action="">
    Enter a word that starts with the letter "a":
    <br>
    <input type="text" name="a-word" id="a-word" value=<?= $_POST["a-word"];?>>
    <br>
    <p class="error" id="a-error"><?= checkWord($_POST["a-word"], "a");?></p>
    <br>

    Enter a word that starts with the letter "b":
    <br>
    <input type="text" id="b-word" name="b-word" value=<?= $_POST["b-word"];?>>
    <br>
    <p class="error" id="b-error"><?= checkWord($_POST["b-word"], "b");?></p>
    <br>
    Enter a word that starts with the letter "c":
    <br>
    <input type="text" id="c-word" name="c-word" value=<?= $_POST["c-word"];?>>
    <br>
    <p class="error" id="c-error"><?= checkWord($_POST["c-word"], "c");?></p>
    <br>
    <input type="submit" value="Submit Words">
</form>
<div>
    <h3>"a" is for: <?= $_POST["a-word"];?><h3>
    <h3>"b" is for: <?= $_POST["b-word"];?><h3>
    <h3>"c" is for: <?= $_POST["c-word"];?><h3>
<div>
```

> 4

```html
<form method="post" action="">
	Enter some HTML:
	<br />
	<input type="text" name="html" />
	<br />
	<input type="submit" value="Submit" />
</form>
<div>
	You entered:
	<?= htmlspecialchars($_POST["html"]) ?>
</div>
```

> 5

```php
<?php
$validation_error = "";
$user_answer = "";
$submission_response = "";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$user_answer = filter_var($_POST["answer"], FILTER_SANITIZE_NUMBER_INT);
  	if ($user_answer != "-5"){
    	$validation_error = "* Wrong answer. Try again.";
  	} else {
      $submission_response = "Correct!";
    }
	}

?>
<h2>Time for a math quiz!</h2>
<form method="post" action="">
<h4>Question 1:</h4>
<p>What is 6 - 11?</p>
<input type="text" name="answer" id="answer" value="<?= $user_answer;?>">
<br>
<span class="error" id="error"><?= $validation_error;?></span>
<br>
<input type="submit" value="Submit Your Answer">
</form>
<div>
  <p id="answer-display">Your answer was: <?= $user_answer;?></p>
  <p id="submission-response"><?= $submission_response;?></p>
</div>
```

> 6

```php
<?php
$validation_error = "";
$user_answer = "";
$submission_response = "";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$user_answer = filter_var($_POST["answer"], FILTER_SANITIZE_NUMBER_INT);
  	if ($user_answer != "-5"){
    	$validation_error = "* Wrong answer. Try again.";
  	} else {
      $submission_response = "Correct!";
    }
	}

?>
<h2>Time for a math quiz!</h2>
<form method="post" action="">
<h4>Question 1:</h4>
<p>What is 6 - 11?</p>
<input type="text" name="answer" id="answer" value="<?= $user_answer;?>">
<br>
<span class="error" id="error"><?= $validation_error;?></span>
<br>
<input type="submit" value="Submit Your Answer">
</form>
<div>
  <p id="answer-display">Your answer was: <?= $user_answer;?></p>
  <p id="submission-response"><?= $submission_response;?></p>
</div>
```

> 7

```php
<?php
$validation_error = "";
$user_url = "";
$form_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$user_url = $_POST["url"];
	if (!filter_var($user_url, FILTER_VALIDATE_URL)) {
    $validation_error = "* This is an invalid URL.";
    $form_message = "Please retry and submit your form again.";
  } else {
    $form_message = "Thank you for your submission.";
  }
}

?>

<form method="post" action="">
Your Favorite Website:
<br>
<input type="text" name="url" value="<?php echo $user_url;?>">
<span class="error"><?= $validation_error;?></span>
<br>
<input type="submit" value="Submit">
</form>
<p> <?= $form_message;?> </p>
```

> 8

```php
<?php
$message = "";
$month_error = "";
$day_error = "";
$year_error = "";

// Create your variables here:
$month_options = ["options" => ["min_range" => 1, "max_range" => 12]];
$day_options = ["options" => ["min_range" => 1, "max_range" => 31]];
$year_options = ["options" => ["min_range" => 1903, "max_range" => date("Y")]];

// Define your function here:
function validateInput($type, &$error, $options_arr){
    if (!filter_var($_POST[$type], FILTER_VALIDATE_INT, $options_arr)) {
      $error = "* Invalid ${type}";
      return FALSE;
  } else {
      return TRUE;
    }
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uncomment the code below:
    $test_month = validateInput("month", $month_error, $month_options);
    $test_day = validateInput("day", $day_error, $day_options);
    $test_year = validateInput("year", $year_error, $year_options);
    if ($test_month && $test_day && $test_year){
      $message = "Your birthday is: {$_POST["month"]}/{$_POST["day"]}/{$_POST["year"]}";
    }
  }

?>

<form method="post" action="">
	Enter your birthday:
	<br>
	Month: <input type="number" name="month" value="<?= $_POST["month"];?>">
	<span class="error"><?= $month_error;?>		</span>
  <br>
	Day: <input type="number" name="day" value="<?= $_POST["day"];?>">
  <span class="error"><?= $day_error;?>		</span>
	<br>
	Year: <input type="number" name="year" value="<?= $_POST["year"];?>">
	<span class="error"><?= $year_error;?>		</span>
	<br>
	<input type="submit" value="Submit">
</form>
    <p><?= $message;?></p>
```

> 9

```php
<?php
$feedback = "";
$success_message = "Thank you for your donation!";
$error_message = "* There was an error with your card. Please try again.";

$card_type = "";
$card_num = "";
$donation_amount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_type = $_POST["credit"];
    $card_num = $_POST["card-num"];
    $donation_amount = $_POST["amount"];

    if (strlen($card_num)<100){
      if ($card_type === "mastercard"){
        if (preg_match("/5[1-5][0-9]{14}/", $card_num) === 1){
          $feedback = $success_message;
        } else {
          $feedback = $error_message;
        }
  	  } else if ($card_type === "visa") {
        if (preg_match("/4[0-9]{12}([0-9]{3})?([0-9]{3})?/", $card_num) === 1){
          $feedback = $success_message;
        } else {
          $feedback = $error_message;
       }
    }
  } else {
      $feedback = $error_message;
    }
}
?>
<form action="" method="POST">
  <h1>Make a donation</h1>
    <label for="amount">Donation amount?</label>
      <input type="number" name="amount" value="<?= $donation_amount;?>">
      <br><br>
    <label for="credit">Credit card type?</label>
      <select name="credit" value="<?= $card_type;?>">
        <option value="mastercard">Mastercard</option>
        <option value="visa">Visa</option>
      </select>
      <br><br>
      <label for="card-num">Card number?</label>
      <input type="number" name="card-num" value="<?= $card_num;?>">
      <br><br>
      <input type="submit" value="Submit">
</form>
<span class="feedback"><?= $feedback;?></span>
```

> 10 backend data check

```php
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];

function isUsernameAvailable ($username){
  global $users;
  if (isset($users[$username])){
    echo "That username is already taken.";
  } else {
    echo "${username} is available.";
  }
}

isUsernameAvailable("coolBro123");// Prints: That username is already taken.
isUsernameAvailable("aisleOfPHP");// Prints: aisleOfPHP is available.
```

> 11

```php
<?php
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];


$feedback = "";
$message = "You're logged in!";
$validation_error = "* Incorrect username or password.";
$username = "";

// Write your code here:
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST["username"];
   $password  = $_POST["password"];
   if (isset($users[$username]) && $users[$username] === $password){
     $feedback = $message;
   } else {
     $feedback = $validation_error;
   }
};

?>

<h3>Welcome back!</h3>
<form method="post" action="">
Username:<input type="text" name="username" value="<?php echo $username;?>">
<br>
Password:<input type="text" name="password" value="">
<br>
<input type="submit" value="Log in">
</form>
<span class="feedback"><?= $feedback;?></span>
```

> > 12

```php
<?php
$contacts = ["Susan" => "5551236666", "Alex" => "7779991717", "Lily" => "8181117777"];
$message = "";
$validation_error = "* Please enter a 10-digit North American phone number.";
$name = "";
$number = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["name"];
   $number  = $_POST["number"];
   // Write your code here:
   if (strlen($number)<30){
     $formatted_number = preg_replace("/[^0-9]/", "", $number);
     if (strlen($formatted_number)===10){
       $contacts[$name] = $formatted_number;
       $message = "Thanks ${name}, we'll be in touch.";
     } else {
       $message = $validation_error;
     }
   } else {
     $message = $validation_error;
   }
};
?>
<html>
	<body>
  <h3>Contact Form:</h3>
		<form method="post" action="">
			Name:
			<br>
  		<input type="text" name="name" value="<?= $name;?>">
 			<br><br>
  		Phone Number:
  		<br>
  		<input type="text" name="number" value="<?= $number;?>">
  		<br><br>
  		<input type="submit" value="Submit">
		</form>
		<div id="form-output">
			<p id="response"><?= $message?></p>
    </div>
	</body>
</html>
```

> > 13 [link header](https://www.php.net/manual/en/function.header.php)

```php
<?php
// для правильной работы функция header() должна быть запущена до того, как сценарий что-либо выведет, включая HTML
$validation_error = "";
$username = "";
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $username = $_POST["username"];
   $password  = $_POST["password"];
   if (isset($users[$username]) && $users[$username] === $password){
// Add your code here:
    header("Location: success.html");
    exit;
   } else {
     $validation_error = "* Incorrect username or password.";
   }
 }
?>

<h3>Welcome back!</h3>
<form method="post" action="">
Username:<input type="text" name="username" value="<?php echo $username;?>">
<br>
Password:<input type="text" name="password" value="">
<br>
<span class="error"><?= $validation_error;?></span>
<br>
<input type="submit" value="Log in">
</form>
```

###### ----------------------------

### Request Superglobals

###### ----------

The list of superglobals in PHP includes the following:

- $GLOBALS
- $\_SERVER
- $\_GET
- $\_POST
- $\_FILES
- $\_COOKIE
- $\_SESSION
- $\_REQUEST
- $\_ENV

> Формы — это часть языка HTML. Формы нужны для передачи данных от клиента на сервер.

[HTML FORM TAG](https://www.w3schools.com/tags/tag_form.asp)

> > Example

```php
// index.php
<html>
<body>
<form name="feedback" method="POST" action="form.php" enctype="multipart/form-data">
  <label>Ваше имя: <input type="text" name="name"></label>
  <label>Ваш email: <input type="text" name="email"></label>
  <label>Сообщение: <textarea name="message"></textarea></label>
  <label>Ваш аватар: <input type="file" name="avatar"></label>


  <input type="submit" name="send" value="Отправить">
</form>
</body>
</html>
```

> **method** - атрибут используется для определения метода HTTP, который будет использован для передачи данных на сервер

> **action** - содержит адрес PHP-скрипта, который должен обработать эту форму(на который переадресует послу submit)

```php
// form.php
<html>
<body>
<?php
if (isset($_POST)) {
    print("Имя: " . $_POST['name']);
    print("<br>Email: " . $_POST['email']);
    print("<br>Сообщение: " . $_POST['message']);
}
if (isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];

    print("Загружен файл с именем " . $file['name'] . " и размером " . $file['size'] . " байт");
// перемещаем загруженный файл, т.к PHP автоматически сохраняет все загруженные файлы во временную папку на сервере
    $current_path = $_FILES['avatar']['tmp_name'];
    $filename = $_FILES['avatar']['name'];
    $uploads_dir = dirname(__FILE__) . '/' . $filename;
    //$uploads_dir = '/uploads';

    move_uploaded_file($current_path, $uploads_dir);
}
</body>
</html>
```

> **isset** - служит для определения, существует ли переданная ей переменная

> **move_uploaded_file()** - Проверяет, что файл действительно загружен через форму. Перемещает загруженный файл по новому адресу

###### ----------------------------

### Ways FORM VALIDATION

###### ----------

> for validation data form we must use it safely, uses
> `Clien-side validation` and `Server-side validation`
> .

> Клиентскую часть проверки мы вставляем непосредственно в html, используя **html-validation** or/and **js-validation**

> Серверная часть никогда не должна доверять клиентской части, т.к. данные мог подменить злоумышленник.

> To match the first four expressions, we could use a pattern like `[hH]ello[^]*`. The pattern `[^]*\d{3}[^]*\d{3}-\d{4}` will match the two example phone numbers

#### Client-side FORM VALIDATION

> Client-side Validation: HTML

```html
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<body>
		<h1>Basic HTML Validation</h1>
		<form action="" method="POST">
			<label for="text">Enter your name here:</label>
			<input
				id="nam  e"
				name="name"
				type="text"
				required
				minlength="3"
				maxlength="100"
			/>
			<br /><br />
			<label for="number">Enter your age here:</label>
			<input type="number" name="age" id="age" required min="1" max="123" />
			<br /><br />
			<label for="code"
				>Best place to learn to code: (hint: starts with a "C")</label
			>
			<input
				id="code"
				name="code"
				type="text"
				required
				pattern="[cC]odecademy"
			/>
			<br /><br />
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>
```

> Client-side FORM VALIDATION: JavaScript

> worked library js

- [just-validate](https://www.npmjs.com/package/just-validate)
- [formik](https://www.npmjs.com/package/formik)
- [Parsley.js](https://parsleyjs.org/)

#### Server-side FORM VALIDATION

[Санитарная обработка (Basic Sanitization)](#Basic-Sanitization)

> Может быть два пути реализации

> 1. Async request. Когда пользователь еще вводит данные в форму. Мы можем делать асинхронные запросы к серверу с фрагментами их данных и отправлять отзывы непосредственно пользователю до того, как он отправит запрос. Это медленнее чем проверка на Front-end (client-side) и вызовет много проблем

> 2. Form submitted. Back-end form validation - это последняя защита нашего приложения от проблемных данных. Т.е. мы проверяем результат после того как к нам пришел запрос

###### ----------------------------

## 7_2 LOOPS IN HTML

###### ----------

> Unreadable foe example

```php
<ul>
<?php
// for start
for ($i = 0; $i < 2; $i++) {
?>
<li>Duck</li>
<?php
}
// for end
?>
<li>Goose</li>
</ul>
```

> Readable for example

> Лучше использовать двоеточие вместо фигурной скобки

```php
<ul>
<?php
// for start
for ($i = 0; $i < 2; $i++):
?>
<li>Duck</li>
<?php
endfor;
// for end
?>
<li>Goose</li>
</ul>
```

> Readable foreach example

```php
<?php
$array = ["Alice", "Bob", "Charlie"];
// start foreach
foreach($array as $name): ?>
<p><?=$name?></p>
<?php endforeach; ?>
// end foreach
```

```php
<h1>Shoe Shop</h1>
<?php
$footwear = [
  "sandals" => 4,
  "sneakers" => 7,
	"boots" => 3
];
?>
<p>Our footwear:</p>
<?php
foreach ($footwear as $type => $brands):
?>
<p>We sell <?=$brands?> brands of <?=$type?></p>
<?php
endforeach;
?>
```

###### ----------------------------

###### ////////////////////////////////////

# 8 МОДУЛИ

###### ////////////////////////////////////

[link to Extension List/Categorization ](https://www.php.net/manual/ru/extensions.membership.php)

### GNU Readline

###### ----------

#### Fuction readline()

> readline — Читает строку [link](https://www.php.net/manual/ru/function.readline.php)

```php
echo "Hi, I'm Aisle Nevertell. What's your name?\n";
$name = readline(">> ");
echo "\nNice to meet you, $name";
```

> User entered >> 'Alex'. then echo output

```php
echo "\nNice to meet you, $name"; // Nice to meet you, Alex
```
