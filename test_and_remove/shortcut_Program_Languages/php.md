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

### Арифметические операции

###### ----------

| **\*eng**      | **_пример_** | **_пример c переменной_** |
| :------------- | :----------: | :------------------------ |
| Add            |      +       | w += 1; &#124; w++;       |
| Subtract       |      -       | w -= 1; &#124;w--;        |
| Multiply       |      \*      | w \*= 1;                  |
| Divide         |      /       | w /= 1;                   |
| Modulo         |      %       | 7 % 3; //1 &#124; X %= Y  |
| Exponentiation |     \*\*     | 4\*\*2; // Prints: 16     |

Operations will be evaluated in the following order:

```
1. Any operation wrapped in parentheses (())
2. Exponents (**)
3. Multiplication (*) and division (/)
4. Addition (+) and subtraction (-).
```

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

# HTML FORM HANDLING IN PHP

###### ----------

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

# Операторы

###### ----------

[link to Control Structures](https://www.php.net/manual/ru/language.control-structures.php)

[link to Operators](https://www.php.net/manual/ru/language.operators.php)

### Общие Операторы

###### ----------

| **\*eng**      | **_пример_** | **_пример c переменной_** |
| :------------- | :----------: | :------------------------ |
| compare        |      ==      | x == y; &#124; x === y;   |
| Subtract       |      -       | w -= 1; &#124;w--;        |
| Multiply       |      \*      | w \*= 1;                  |
| Divide         |      /       | w /= 1;                   |
| Modulo         |      %       | 7 %= 3; //1 &#124; X %= Y |
| Exponentiation |     \*\*     | 4\*\*=2; // Prints: 16    |

> **===** return TRUE or FALSE

### Условные Операторы

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
