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

> Example

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

# 1 БАЗОВЫЕ

###### ----------

### include

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

### Конкатенация строк

###### ----------

конкатенация происходит с помощью dot .

```php
echo "one " . "two"; // Prints: one two
```

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

### Переменные_Variables

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

## Операции с перменными_Операторы

[link to Operators](https://www.php.net/manual/ru/language.operators.php)

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

### Операции cравнения

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

# Функции

###### ----------

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

#### переменная область видимости_Variable Scope

###### ----------

```php
function calculateDaysLeft($feed_quantity, $number, $rate){
  $result = $feed_quantity / ($number * $rate);
  return $result;
}
echo calculateDaysLeft(300, 2, 30); //5
echo $result; //Undefined variable
```

#### глобальная область видимости_Global Scope

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

### Variable handling Functions

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

# Массивы

###### ----------

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

###### ----------

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

###### ----------

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

# HTML in PHP

###### ----------

## HTML FORM HANDLING IN PHP

###### ----------

### Example form html

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

### Request Superglobals

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

> Example

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

> Может быть два пути реализации

> 1. Async request. Когда пользователь еще вводит данные в форму. Мы можем делать асинхронные запросы к серверу с фрагментами их данных и отправлять отзывы непосредственно пользователю до того, как он отправит запрос. Это медленнее чем проверка на Front-end (client-side) и вызовет много проблем

> 2. Form submitted. Back-end form validation - это последняя защита нашего приложения от проблемных данных. Т.е. мы проверяем результат после того как к нам пришел запрос

## LOOPS IN HTML

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

# Управляющие конструкции

###### ----------

[link to Control Structures](https://www.php.net/manual/ru/language.control-structures.php)

[link to Operators](https://www.php.net/manual/ru/language.operators.php)

## Условные

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

## Циклы

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

## Прерывания

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

# Модули

###### ----------

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

# REGEX

###### ----------

[link cheatsheet regex](https://www.codecademy.com/learn/learn-php/modules/php-form-validation/cheatsheet)
