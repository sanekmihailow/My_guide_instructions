 Javascript
====

<d>
 <details>
	 <summary> JavaScript Map </summary>
<ul>
    <li>1) БАЗОВЫЕ_Basic</li>
    <ul>
      <li>Типы данных</li>
      <li>Арифметические операции</li>
      <li>Конкатенация строк</li>
      <li>Интерполяция строк</li>
      <li>Характеристики</li>
      <li>Методы</li>
      <ul>
        <li>Встроенные объекты (глобальные объекты)</li>
      </ul>
      <li>Переменные (Variables)</li>
      <ul>
        <li>Глобальная область видимости (Global Scope)</li>
        <li>Локальная область видимости (Functional Scope)</li>
      </ul>
    </ul>
    <li>2) Операторы</li>
    <ul>
        <li>Условные Операторы</li>
        <ul>
          <li>Тернарные Операторы</li>
        </ul>
    </ul>
     <li>3) Циклы (Loops)</li>
    <ul>
      <li>Вложенные Циклы (Nested Loops)</li>
    </ul>
    <li>4) Функции (Functions)</li>
    <ul>
      <li>Вспомогательные функции (Helper Functions)</li>
      <li>Функциональные выражения (Function Expressions)</li>
      <li>Стрелочная функция (Arrow Functions)</li>
      <ul>
        <li>(Functions as Data)</li>
        <li>(Functions as Parameters)</li>
      </ul>
    </ul>
    <li>5) Массивы (Arrays)</li>
    <ul>
      <li>Вложенные Массивы (Nested Arrays)</li>
      <li>(ITERATORS) [link]()</li>
    </ul>
    <li>6) Объекты (Objects)</li>
    <ul>
      <li>Cвойства объекта</li>
      <ul>
        <li>операции со свойствами объекта</li>
        <li>Reference</li>
      </ul>
      <li>Nested Objects (Вложенные объекты)</li>
      <ul>
        <li>Looping Through Objects (Перебор объектов)</li>
      </ul>
      <li>Advanced Objects Introduction</li>
      <ul>
        <li>"this" Keyword</li>
        <ul>
          <li>Arrow Functions and this</li>
        </ul>
        <li>Privacy object</li>
        <ul>
          <li>Getters (Геттеры)</li>
          <li>Setters (Сеттеры)</li>
        </ul>
        <li>Factory Functions</li>
        <ul>
          <li>Property Value Shorthand</li>
          <li>Destructured Assignment</li>
        </ul>
      </ul>
      <li> Built-in Object Methods</li>
    </ul>    
</ul>

 </details>
</d>

[1) БАЗОВЫЕ](#1-БАЗОВЫЕ)
- [Типы данных](#Типы-данных)
- [Арифметические операции](#Арифметические-операции)
- [Конкатенация строк](#Конкатенация-строк)
- [Интерполяция строк](#Интерполяция-строк)
- [Характеристики](#Характеристики_Properties-instance)
- [Методы](#Методы)
- - [Встроенные объекты (глобальные объекты)](#Встроенные-объекты_глобальные-объекты)
- [Переменные_(Variables)](#Переменные_Variables)
- - [Global Scope](#Глобальная-область-видимости_Global-Scope)
- - [Functional Scope](#Локальная-область-видимости_Functional-Scope)

[2) Операторы](#2-Операторы)
- [Условные Операторы](#Условные-Операторы)
 - - [Тернарные Операторы](#Тернарные-Операторы)

[3) Циклы](#3-Циклы_Loops)
 - [Вложенные Циклы](#Вложенные-Циклы_Nested-Loops)

[4) Функции](#4-Функции_Functions)
  - [Вспомогательные функции](#Вспомогательные-функции_Helper-Functions)
  - [Функциональные выражения](#Функциональные-выражения_Function-Expressions)
  - [Стрелочная функция](#Стрелочная-функция_Arrow-Functions)
  - - [Functions as Data](#Functions-as-Data)
  - - [Functions as Parameters](#Functions-as-Parameters)

[5) Массивы](#5-Массивы_Arrays)
 - [Вложенные Массивы](#Вложенные-Массивы_Nested-Arrays)
 - [Итераторы](#ITERATORS)

[6) Объекты ](#6-Objects)
- [Cвойства объекта](#Cвойства-объекта)
- - [операции со свойствами объекта](#операции-со-свойствами-объекта)
- - [Reference](#Reference)
- [Вложенные объекты](#Nested-Objects_Вложенные-объекты)
- - [Перебор объектов](#Looping-Through-Objects_Перебор-объектов)
- [Advanced Objects Introduction](#Advanced-Objects-Introduction)
- - ["this" Keyword](#"this"-Keyword)


 



# 1 БАЗОВЫЕ
###### ----------
> залогировать вывод в консоль
```js
console.log(variable);
```
> комменты
```js
//comment

/*
This is all commented 
*/
console.log(/*IGNORED!*/ 5);  // Still just prints 5 
```

### Типы данных
###### ----------

| ***тип*** | ***описание*** | ***примеры*** |
|:---:|:---|:---|
| **Number**| число + число с десятичной частью |4 &#124; 24.25|
| **String** | строка |' ... ' &#124; " ... "|
| **Boolean** | булевый тип |true &#124; false|
| **Null** | нулевой или пустота |null без кавычек|
| **Underfined** | неопределен |underfined не существует|
| **Symbol** | symbols are unique identifiers ||
| **Object**| Collections of related data ||




### Арифметические операции
###### ----------
| ***eng** | ***пример*** | ***пример c переменной*** |
|:---|:---:|:---|
|Add|+| w += 1 &#124; w++ |
|Subtract|-| w -= 1 &#124; w-- |
|Multiply|*| w *= 1 |
|Divide|/| w /= 1 |
|Remainder|%|
`console.log(3 + 4);`




### Конкатенация строк
###### ----------

```js
console.log('hi' + 'ya'); // Prints 'hiya'
console.log('no' + 'space'); // Prints 'nospace'
console.log('middle' + ' ' + 'space'); // Prints 'middle space'
```




### Интерполяция строк
###### ----------
```js
let myName = 'A'
let myCity = 'Cheb'
console.log(`My name is ${myName}. My favorite city is ${myCity}.`) // My name is A. My favorite city is Cheb.
```



### Характеристики_Properties instance
###### ----------

```js
console.log('Hello'.length); // Prints 5
```



### Методы
###### ----------

> пример вызова метода
`'example string'.methodName()`

```js
console.log('hello'.toUpperCase()); // Prints 'HELLO'
console.log('Hey'.startsWith('H')); // Prints true
console.log('    Remove whitespace   '.trim()); // Prints 'Remove whitespace'
```



#### Встроенные объекты_глобальные объекты
###### ----------
>Объект — это набор свойств, и каждое свойство состоит из имени и значения, ассоциированного с этим именем. Значением свойства может быть функция, которую можно назвать методом объекта. Сравним, например, с чашкой. У чашки есть цвет, форма, вес, материал, из которого она сделана, и т.д. Точно так же, объекты JavaScript имеют свойства, которые определяют их характеристики.


```js
console.log(Math.random());
Math.random() * 50;
Math.floor(Math.random() * 50);
console.log(Math.floor(Math.random() * 50)); // Prints a random whole number between 0 and 50
console.log(Math.ceil(43.8)); //44
console.log(Number.isInteger(2017)); // true
```



### Переменные_Variables
###### ----------

```js
var myName = 'Arya';
...
let meal = 'Enchiladas';
meal = 'Burrito';
let price;
console.log(price); // Output: undefined
price = 350;
console.log(price); // Output: 350
```
> переменные не ддолжны совпадать с клбчевыми словами из  [списка](https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Lexical_grammar#keywords)

> **var** - глобальная и локальная (global scope и function scope) Область видимости. Переменные, объявленные оператором var, они относятся к функции и доступны вне цикла(дочернего)., внутри функции с for, так и вне for, но внутри функции главной функции(родительской).
```
discountPrices([100, 200, 300], .5)
```
```js
function discountPrices (prices, discount) {
  var discounted = []
for (var i = 0; i < prices.length; i++) {
    var discountedPrice = prices[i] * (1 - discount)
    var finalPrice = Math.round(discountedPrice * 100) / 100
    discounted.push(finalPrice)
  }
console.log(i) // 3
  console.log(discountedPrice) // 150
  console.log(finalPrice) // 150
return discounted
}
discountPrices([100, 200, 300], .5) // ✅
```
> **let** - что область видимости переменной ограничивается блоком ({}). например for, if, т.е. только внутри дочерней функции.
```js
function discountPrices (prices, discount) {
  let discounted = []
for (let i = 0; i < prices.length; i++) {
    let discountedPrice = prices[i] * (1 - discount)
    let finalPrice = Math.round(discountedPrice * 100) / 100
    discounted.push(finalPrice)
    console.log(finalPrice) // 50, 100, 150
  }
console.log(i) // 3
  console.log(discountedPrice) // 150
  console.log(finalPrice) // 150
return discounted
}
discountPrices([100, 200, 300], .5) // ❌ ReferenceError: i is not defined
``` 
> **const** - значение переменной, объявленной с помощью const, нельзя переназначить, но это не касается свойства константы
```js
let name = 'Tyler'
const handle = 'tylermcginnis'
name = 'Tyler McGinnis' // ✅
handle = '@tylermcginnis' // ❌ TypeError: Assignment to constant variable.
```
```js
const person = {
  name: 'Kim Kardashian'
}
person.name = 'Kim Kardashian West' // ✅
person = {} // ❌ Assignment to constant variable.
```
```
 var VS let VS const
 var: 
   1.function scoped
   2.undefined when accessing a variable before it's declared
 let: 
   1.block scoped
   2.ReferenceError when accessing a variable before it's declared
const:
  1.block scoped
  2.ReferenceError when accessing a variable before it's declared
  3.can't be reassigned
```



#### Глобальная область видимости_Global Scope
###### ----------

```js
const color = 'blue';
 
const returnSkyColor = () => {
  return color; // blue 
};
console.log(returnSkyColor()); // blue
```
> Глобальную переменню можно изменить внутри обычной функции
```js 
var x = "declared outside function";
exampleFunction();

function exampleFunction() {
  console.log(x);
  var x1 = 1;
}

{ // Block scope start
    xx = 123 // var xx = 123. Implicit global variable
    // https://stackoverflow.com/questions/15985875/effect-of-declared-and-undeclared-variables/16007360#16007360
    let yy = 345
    const zz = 678
} // Block scope end

console.log("Outside function"); // Outside function
console.log(x); // declared outside function
console.log(xx); // 123
console.log(x1);   // x1  is not defined
console.log(yy);  // yy is not defined
console.log(zz);  // z is not defined
```



#### локальная область видимости_Functional Scope
###### ----------

```js
function exampleFunction() {
  var x = "declared inside function";  // x can only be used in exampleFunction;
  console.log(x);
}
exampleFunction() // declared inside function
console.log(x);  // Causes error x is not defined
```




# 2 Операторы
###### ----------

<table>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> typeof </td>
 <td> typeof variable </td>
 <td>
  
```js
const unknown1 = 'foo';
console.log(typeof unknown1); // Output: string
```
 
</td>
</tr>
</table>




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
  
```js
let sale = true;

if (sale) {
  console.log('Time to buy!')
}
```
 
</td>
</tr>
 <tr>
 <td> if else </td>
 <td> если равно сделать то, иначе сдделато то-то </td>
 <td>
  
```js
let username = '';
let defaultName;
 
if (username) {
  defaultName = username;
} else {
  defaultName = 'Stranger';
} // Output: Stranger
```
or
```js
let username = '';
let defaultName = username || 'Stranger'; // Output: Stranger
```

 
</td>
</tr>
 <tr>
 <td> else if </td>
 <td> если равно сделать то, иначе сдделато то, иначе сделато то... </td>
 <td>
  
```js
let stopLight = 'yellow';
 
if (stopLight === 'red') {
  console.log('Stop!');
} else if (stopLight === 'yellow') {
  console.log('Slow down.');
} else if (stopLight === 'green') {
  console.log('Go!');
} else {
  console.log('Caution, unknown!');
} // Output: Slow down.
```
 
</td>
</tr>
 <tr>
 <td> switch </td>
 <td> если нужно проверить много условий. Обязательно ставить break </td>
 <td>
  
```js
let groceryItem = 'papaya';
 
switch (groceryItem) {
  case 'tomato':
    console.log('Tomatoes are $0.49');
    break;
  case 'lime':
    console.log('Limes are $1.49');
    break;
  case 'papaya':
    console.log('Papayas are $1.29');
    break;
  default:
    console.log('Invalid item');
    break;
}// Prints 'Papayas are $1.29'
```
 
</td>
</tr>
</table>

Переменная принимает значение "false", если переменная равна
<table>
<tr>
    <td> равна нулю </td> 
    <td> 0 </td>
</tr> 
<tr>
    <td> равна пустой строке </td> 
    <td> '' &#124; "" </td>
</tr>
<tr>
    <td> равна пустому значению </td> 
    <td> null </td>
</tr> 
<tr>
    <td> неопреелена </td> 
    <td> underfined </td>
</tr>
<tr>
    <td> не число </td> 
    <td> NaN </td>
</tr>
</table>



### Тернарные Операторы
###### ----------

> если используется if else, то можно использовать тернарные операторы, похожи на gotoif в asterisk

```bash
<expression> ? true : false
```

такое выражение if else
```js
let isNightTime = true;
 
if (isNightTime) {
  console.log('Turn on the lights!');
} else {
  console.log('Turn off the lights!');
}
```
кратко можно записать как
```js
isNightTime ? console.log('Turn on the lights!') : console.log('Turn off the lights!'); // Turn on the lights!

let favoritePhrase = 'Love That!';

favoritePhrase === 'Love That!' ? console.log('I love that!')
: console.log("I don't love that!") // I love that!
```



# 3 Циклы_Loops
###### ----------
<table>
<tr>
    <td> тип </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> for </td>
 <td> выполнить множество выражений в цикле </td>
 <td>
  
```js
for (let counter = 0; counter < 4; counter++) {
  console.log(counter);
} // 0
//1
//2
//3
```
```js
const animals = ['Grizzly Bear', 'Sloth', 'Sea Lion'];
for (let i = 0; i < animals.length; i++){
  console.log(animals[i]);
} // Grizzly Bear
//Sloth
//Sea Lion
```
 
</td>
</tr>
<tr>
 <td> while </td>
 <td> Инструкция, которая исполняется каждый раз, пока истинно условие </td>
 <td>
  
```js
// A for loop that prints 1, 2, and 3
for (let counterOne = 1; counterOne < 4; counterOne++){
  console.log(counterOne);
}
 
// A while loop that prints 1, 2, and 3
let counterTwo = 1;
while (counterTwo < 4) {
  console.log(counterTwo);
  counterTwo++;
}
```
 
</td>
</tr>
<tr>
 <td> Do...While </td>
 <td> Инструкция, которая исполняется до тех пор, пока условие не станет ложным </td>
 <td>
  
```js
let countString = '';
let i = 0;
 do {
  countString = countString + i;
  i++;
} while (i < 5);
 console.log(countString); //Output:01234
```
```js
let cupsOfSugarNeeded = 3;
let cupsAdded = 0;

do {
 cupsAdded++
 console.log(cupsAdded + ' cup was added') 
} while (cupsAdded < cupsOfSugarNeeded);
/*

Output:
1 cup was added
2 cup was added
3 cup was added
*/
```
 
</td>
</tr>
</table>



### Вложенные Циклы_Nested Loops
###### ----------
```js
const myArray = [6, 19, 20];
const yourArray = [19, 81, 2];
for (let i = 0; i < myArray.length; i++) {
  for (let j = 0; j < yourArray.length; j++) {
    if (myArray[i] === yourArray[j]) {
      console.log('Both arrays have the number: ' + yourArray[j]);
    }
  }
} // Both arrays have the number: 19
```
```js
let bobsFollowers = ['Joe', 'Marta', 'Sam', 'Erin'];
let tinasFollowers = ['Sam', 'Marta', 'Elle'];
let mutualFollowers = [];

for (let i = 0; i < bobsFollowers.length; i++) {
  for (let j = 0; j < tinasFollowers.length; j++) {
    console.log(bobsFollowers[i] + ' and ' + tinasFollowers[j])
    if (bobsFollowers[i] === tinasFollowers[j]) {
      console.log(' and ----------')
      console.log(mutualFollowers)
      mutualFollowers.push(bobsFollowers[i]);
    }
  }
};
console.log(mutualFollowers)
/*
Joe and Sam
Joe and Marta
Joe and Elle
Marta and Sam
Marta and Marta
 and ----------
[ 'Marta' ]
Marta and Elle
Sam and Sam
 and ----------
[ 'Marta', 'Sam' ]
Sam and Marta
Sam and Elle
Erin and Sam
Erin and Marta
Erin and Elle
[ 'Marta', 'Sam' ]
*/
```



# 4 Функции
###### ----------
```nginx
function <functionName>($arg1,$arg2....){
...code...
}
```
```js
function <functionName>() {
    console.log('hello')
}
<functionName>() //hello
```
```js
greetWorld(); // Output: Hello, World!
 
function greetWorld() {
  console.log('Hello, World!');
}
```

```js
function greeting (name = 'stranger') {
  console.log(`Hello, ${name}!`)
}
 
greeting('Nick') // Output: Hello, Nick!
greeting() // Output: Hello, stranger!
```
`return`нужен для захвата вызова или результата функции
```js
function rectangleArea(width, height) {
  if (width < 0 || height < 0) {
    return 'You need positive integers to calculate area!';
  }
  return width * height;
}
rectangleArea() //You need positive integers to calculate area!
```



### Вспомогательные функции_Helper Functions
###### ----------
Функции вызываемые внутри другой функции - вспомогательные
```js
function multiplyByNineFifths(number) {
  return number * (9/5);
};
 
function getFahrenheit(celsius) {
  return multiplyByNineFifths(celsius) + 32;
};
 
getFahrenheit(15); // Returns 59
```




### Функциональные выражения_Function Expressions
###### ----------

```js
const plantNeedsWater = function(day) {
  if(day === 'Wednesday'){
    return true;
  } else {
    return false;
  }
};

plantNeedsWater('Tuesday'); // false
```



### Стрелочная функция_Arrow Functions
###### ----------
> несли не нужно вызывать функцию вне переменной (меняем function на)
```js
const example= ($arg1) => {
  ..code...
};
```
> объявление переменной в таком случае и является названием функции: example()
```js
const rectangleArea = (width, height) => {
  let area = width * height;
  return area;
};
```

>Можно упростить выражение в единичном выводе (без return):
```js
const squareNum = (num) => {
  return num * num;
};
```
на
```js
const squareNum = num => num * num;
```
```js
const logCitySkyline = () => {
  return 'The stars over the '
};
console.log(logCitySkyline()) //The stars over the
```



#### Functions as Data
###### ----------
```js
const announceThatIAmDoingImportantWork = () => {
    console.log("I’m doing very important work!");
};
const busy = announceThatIAmDoingImportantWork;
busy(); // I’m doing very important work!
```



#### Functions as Parameters
###### ----------
```js
const higherOrderFunc = param => {
  param();
  return console.log(`I just invoked ${param.name} as a callback function!`)
}
 
const anotherFunc = () => {
  return console.log('I\'m being invoked by the higher-order function!');
}
 
higherOrderFunc(anotherFunc);

higherOrderFunc(() => {
  for (let i = 0; i <= 3; i++){
    console.log(i);
  }
});
/*
I'm being invoked by the higher-order function!
I just invoked anotherFunc as a callback function!
0
1
2
3
I just invoked  as a callback function!
*/
```
```js
const addTwo = num => {
  return num + 2;
}

const checkConsistentOutput = (func, val) => {
  let checkA = val + 2; //15
  let checkB = func(val); //15
  return checkA === checkB ? func(val) : 'inconsistent results';  
}

console.log(checkConsistentOutput(addTwo, 13)); //15
```



# 5 Массивы
###### ----------
```js
let concepts = ['1', '2', '3'];
concept[0] // 1
```
```js
const hello = 'Hello World';
console.log(hello[6]); // Output: W
```
> .push() - добавляет элементы в конец массива
```js
const itemTracker = ['item 0', 'item 1', 'item 2'];
itemTracker.push('item 3', 'item 4');
console.log(itemTracker);  // Output: ['item 0', 'item 1', 'item 2', 'item 3', 'item 4'];
```
> .pop() - удаляет последний элемент массива
```js
const newItemTracker = ['item 0', 'item 1', 'item 2'];
 
const removed = newItemTracker.pop();
console.log(newItemTracker); // Output: [ 'item 0', 'item 1' ]
console.log(removed);// Output: item 2
```
> .shift() удаляем первый элемент массива
> .unshift()

```js
const flowers = ['peony', 'daffodil', 'marigold'];
 
function addFlower(arr) {
  arr.push('lily');
}
addFlower(flowers);
console.log(flowers); // Output: ['peony', 'daffodil', 'marigold', 'lily']
```



### Вложенные Массивы_Nested Arrays
###### ----------

```js
const nestedArr = [[1], [2, 3]];
console.log(nestedArr[1]); // Output: [2, 3]
console.log(nestedArr[1][0]); // Output: 2
```


### ITERATORS
[link](https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Array#iteration_methods)
###### ----------
<table>
<tr>
    <td> метод(итератор) </td> 
    <td> применение </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> .forEach() </td>
 <td> выполнить множество выражений для каждого элемента в массиве </td>
 <td>
  
```js
const fruits = ['mango', 'papaya', 'pineapple', 'apple'];
```
```js
fruits.forEach(fruitsItem => { 
  console.log(fruitsItem)
}); // mango papaya pineapple apple
```
```js
fruits.forEach(fruitsItem =>
  console.log(fruitsItem)
);
```
```js
function printFruits(element){
  console.log(element);
}
fruits.forEach(printFruits);
```
</td>
</tr>
<tr>
 <td> .map() </td>
 <td> создает новый общий массив для каждого элемента в текущем массиве </td>
 <td>
  
```js
const numbers = [1, 2, 3, 4, 5]; 
const bigNumbers = numbers.map(number => {
  return number * 10;
});
console.log(bigNumbers) // [ 10, 20, 30, 40, 50 ]
```
```js
const animals = ['Hen', 'elephant', 'llama'];
const secretMessage = animals.map(animal => {
  return animal[0]
})
console.log(secretMessage) // [ 'H', 'e', 'l' ]
```
</td>
</tr>
<tr>
 <td> .filter() </td>
 <td> возращает новый общий масссив для каждого элемента текущего массив со значение 'true' или 'false' </td>
 <td>
  
```js
const words = ['chair', 'music', 'pillow', 'brick', 'pen', 'door']; 
const shortWords = words.filter(word => {
  return word.length < 6;
});
console.log(shortWords); // ['chair', 'music', 'brick', 'pen', 'door']
```
</td>
</tr>
<tr>
 <td> .findIndex() </td>
 <td> ищет по массиву первый индекс, который совпал по условию 'true'. если в массиве нет ни одного элемента подходящего под условие, метод вернет '-1' </td>
 <td>
  
```js
const jumbledNums = [123, 25, 78, 5, 9]; 
const lessThanTen = jumbledNums.findIndex(num => {
  return num < 10;
});
console.log(lessThanTen); // Output: 3
console.log(jumbledNums[3]); // Output: 5
```
</td>
</tr>
<tr>
 <td> .reduce() </td>
 <td> применяет функцию reducer к каждому элементу массива (слева-направо), возвращая одно результирующее значение. </td>
 <td>
  
```js
const numbers = [1, 2, 4, 10];
// aaccumulator не объявлен, значит равен '0', после итерации уже '1' and etc.
const summedNums = numbers.reduce((accumulator, currentValue) => {
  return accumulator + currentValue
})
console.log(summedNums) // Output: 17
```
```js
const numbers = [1, 2, 4, 10];
// aaccumulator = '100' .. '101'...,'103' ....
const summedNums = numbers.reduce((accumulator, currentValue) => {
  return accumulator + currentValue
}, 100)  // <- Second argument for .reduce()
console.log(summedNums); // Output: 117
```
</td>
</tr>
<tr>
 <td> .some() </td>
 <td> проверяет, удовлетворяет ли какой-либо элемент массива условию, заданному в передаваемой функции 'true'. Возвращает false при любом условии для пустого массива или не выполнению условия.  </td>
 <td>
  
```js
for (let counter = 0; counter < 4; counter++) {
  console.log(counter);
} // 0
```
</td>
</tr>
<tr>
 <td> .every() </td>
 <td> роверяет, удовлетворяют ли все элементы массива условию, заданному в передаваемой функции 'true'. Mетод возвращает true при любом условии для пустого массива </td>
 <td>
  
```js
for (let counter = 0; counter < 4; counter++) {
  console.log(counter);
} // 0
```
</td>
</tr>
</table>


<tr>
 <td> for </td>
 <td> выполнить множество выражений в цикле </td>
 <td>
  
```js
for (let counter = 0; counter < 4; counter++) {
  console.log(counter);
} // 0
```
</td>
</tr>


# 6 Objects
###### ----------
```js
let spaceship = {}; // create empty object
```
```js
let spaceship = {
  'Fuel Type': 'diesel',
  color: 'silver'
  'Active Duty': true,
  numCrew: 5
  flightPath: ['Venus', 'Mars', 'Saturn']
  homePlanet: 'Earth',
};
```


### 6_1 Cвойства объекта
#### Доступ к свойствам объекта
###### ----------

<table>
<tr>
    <td> № </td> 
    <td> описание </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> 1 </td>
 <td> через точку object.property. </td>
 <td>
  
```js
spaceship.color; //silver
```
```js
//если попробовать обратиться к несуществующему свойству объекта вернет Underfined
spaceship.favoriteIcecream; // Returns undefined
```
```js
// Еслибы бы мы попытались обратиться через точку objectName.propName
// тогда компьютер стал бы искать ключ "propName" в нашем объекте, //не значении параметра propName 
let returnAnyProp = (objectName, propName) => objectName.propName;
let result = returnAnyProp(spaceship, 'homePlanet');
console.log(result) // Returns 'underfined'
```
</td>
</tr>
<tr>
 <td> 2 </td>
 <td> через квадратные скобки , как в массиве - object[$element] </td>
 <td>
  
```js
['A', 'B', 'C'][0]; // Returns 'A'
```
```js
spaceship['Active Duty'];   // Returns true
```
```js
let returnAnyProp = (objectName, propName) => objectName[propName];
let result = returnAnyProp(spaceship, 'homePlanet');
console.log(result) // Returns 'Earth'
```
</td>
</tr>
</table>



#### операции со свойствами объекта
###### ----------
> Мы можем как менять объекты, так и создавать новые свойства для них
`object.porepry = dada` or `object[property] = lala`


<table>
<tr>
    <td> № </td> 
    <td> описание </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> обновление, добавление </td>
 <td> Мы можем как менять объекты, так и создавать новые свойства для них

`object.porepryKey = dada`
 or 
`object[propertyKey] = lala` </td>
 <td>
  
```js
spaceship.color = gold //update
spaceship[numCrew] = 7 //update
spaceship.speed = 'Mach 5'; // Creates a new key of 'speed'
```
</td>
</tr>
<tr>
 <td> удаление </td>
 <td> удаление свойства объекта </td>
 <td>
  
```js
delete spaceship.speed;  // Removes the speed property
delete spaceship['Active Duty'] //Removes true
```
</td>
</tr>
</table>

```js
let retreatMessage = 'We no longer wish to conquer your planet. It is full of dogs, which we do not care for.';
let alienShip = {
  retreat() {
    console.log(retreatMessage)
  },
  takeOff() {
    console.log('Spim... Borp... Glix... Blastoff!')
  }
}
alienShip.retreat()
alienShip.takeOff()
```


#### Reference
###### ----------

```js
let spaceship = {
  'Fuel Type' : 'Turbo Fuel',
  homePlanet : 'Earth'
};
let greenEnergy = obj => {
  obj['Fuel Type'] = 'avocado oil';
}
let remotelyDisable = obj => {
  obj.disabled = true;
}
greenEnergy(spaceship);
remotelyDisable(spaceship);
console.log(spaceship) // { 'Fuel Type': 'avocado oil',
//  homePlanet: 'Earth',
//  disabled: true }
```


### 6_2 Nested Objects_Вложенные объекты
###### ----------

```js
const spaceship = {
     telescope: {
        yearBuilt: 2018,
        model: '91031-XLT',
        focalLength: 2032 
     },
    crew: {
        captain: { 
            name: 'Sandra', 
            degree: 'Computer Engineering', 
            encourageTeam() { console.log('We got this!') } 
         }
    },
    engine: {
        model: 'Nimbus2000'
     },
     nanoelectronics: {
         computer: {
            terabytes: 100,
            monitors: 'HD'
         },
        'back-up': {
           battery: 'Lithium',
           terabytes: 50
         }
    }
}; 
```
```js
spaceship.nanoelectronics['back-up'].battery; // Returns 'Lithium'
```



##### Looping Through Objects_Перебор объектов
###### ----------

```js
let spaceship = {
  crew: {
    captain: { 
      name: 'Lily', 
      degree: 'Computer Engineering', 
      cheerTeam() { console.log('You got this!') } 
    },
    'chief officer': { 
      name: 'Dan', 
      degree: 'Aerospace Engineering', 
      agree() { console.log('I agree, captain!') } 
    },
    medic: { 
      name: 'Clementine', 
      degree: 'Physics', 
      announce() { console.log(`Jets on!`) } },
    translator: {
      name: 'Shauna', 
      degree: 'Conservation Science', 
      powerFuel() { console.log('The tank is full!') } 
    }
  }
}; 
// for...in
for (let crewMember in spaceship.crew) {
  console.log(`${crewMember}: ${spaceship.crew[crewMember].name}`);
}
```


## 6_3 Advanced Objects Introduction
#### "this" Keyword
###### ----------

> Свойство контекста выполнения кода (global, function или eval), которое в нестрогом режиме всегда является ссылкой на объект, а в строгом режиме может иметь любое значение.

> Global контекст

> this ссылается на глобальный объект вне зависимости от режима (строгий или нестрогий)

> Function контекст. Нестрогий
```js
function f1(){
  return this;
}

// В браузере:
f1() === window; // window - глобальный объект в браузере
// В Node:
f1() === global; // global - глобальный объект в Node
```

> Function контекст. Cтрогий
```js
function f2(){
  "use strict"; // см. strict mode *строгий режим
  return this;
}

f2() === undefined; // true
```
> Для того, чтобы при вызове функции установить this в определённое значение, используйте **call()** или **apply()**, как в следующих примерах.

```js 
// В качестве первого аргумента методов call или apply может быть передан объект,
// на который будет указывать this.
var obj = {a: 'Custom'};
// Это свойство принадлежит глобальному объекту
var a = 'Global'
function whatsThis() {
  return this.a;  //значение this зависит от контекста вызова функции
}

whatsThis();          // 'Global'
whatsThis.call(obj);  // 'Custom'
whatsThis.apply(obj); // 'Custom'
```


##### Arrow Functions and this
###### ----------
> Example:
```js
const goat = {
  dietType: 'herbivore',
  makeSound() {
    console.log('baaa');
  },
  diet() {
    console.log(this.dietType);
  },
  newdiet() {
    console.log(dietType);
  }
  arrowdiet: () => {
    console.log(`I'am ${this.dietType}%.`)
  }
};
goat.makeSound(); // Prints baaa
goat.diet(); // herbivore
got.newdiet(); // dietType is not defined
got.arrowdiet() // I'am undefined% (не вызывать стрелочные функции внутри объекта)
```



#### Privacy object
###### ----------

```js
const bankAccount = {
  _amount: 1000
}

bankAccount.amount = 1;
console.log(bankAccount) // { _amount: 1000, amount: 1 }
bankAccount._amount = 1000000;
console.log(bankAccount) // { _amount: 1000000, amount: 1 }
```



##### Getters_Геттеры
###### ----------

> Геттеры — это методы, которые получают и возвращают внутренние свойства объекта. Синтаксис **get** связывает свойство объекта с функцией, которая будет вызываться при обращении к этому свойству.

```js
const person = {
  _firstName: 'John',
  _lastName: 'Doe',
  get fullName() {
    if (this._firstName && this._lastName){
      return `${this._firstName} ${this._lastName}`;
    } else {
      return 'Missing a first name or a last name.';
    }
  }
}
 
person.fullName; // 'John Doe'
```



##### Setters_Сеттеры
###### ----------

> Сеттеры — это методы, которые изменяют внутренние свойства объекта. Оператор **set** связывает свойство объекта с функцией, которая будет вызвана при попытке установить это свойство.

```js
const person = {
  _age: 37,
  set age(newAge){
    if (typeof newAge === 'number'){
      this._age = newAge;
    } else {
      console.log('You must assign a number to age');
    }
  }
};

console.log(person._age); // Logs: 37
person.age = 40;
console.log(person._age); // Logs: 40
```



### Factory Functions
###### ----------

> Фабричная функция — это функция, которая возвращает объект и может быть повторно использована для создания нескольких экземпляров объекта. Фабричные функции также могут иметь параметры, позволяющие нам настраивать возвращаемый объект.

```js
//Factory function
const robotFactory = (model, mobile) => {
  return {
    model : model,
		mobile: mobile,
		beep () { 
      console.log('Beep Boop'); 
    }
	};
};

const tinCan = robotFactory('P-500', true)
tinCan.beep() //Beep Boop
console.log(tinCan) // { model: 'P-500', mobile: true, beep: [Function: beep] }
```



#### Property Value Shorthand
###### ----------

```js
const monsterFactory = (name, age) => {
  return { 
    name,
    age 
  }
};

const ghost = monsterFactory('Ghouly', 251);
console.log(ghost) // { name: 'Ghouly', age: 251 }
```

#### Destructured Assignment
###### ----------

> Чтобы присвоить переменной свойство объекта, вне объекта.

>Example:
```js
const vampire = {
  name: 'Dracula',
  residence: 'Transylvania',
  preferences: {
    day: 'stay inside',
    night: 'satisfy appetite'
  }
};
```
```js
const residence = vampire.residence; 
console.log(residence); // Prints 'Transylvania' 
```
```js
//Destructured Assignment
const { residence } = vampire; 
console.log(residence); // Prints 'Transylvania'
```





## 6_4 Built-in Object Methods 

[link](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object#Methods)
###### ()
###### ----------

<table>
<tr>
    <td> метод </td> 
    <td> описание </td> 
    <td> примеры </td> 
</tr>
<tr>
 <td> Object.keys() </td>
 <td> возвращает массив из собственных перечисляемых свойств переданного объекта </td>
 <td>
  
```js
// Object.keys(obj)
var arr = ['a', 'b', 'c'];
console.log(Object.keys(arr)); // ['0', '1', '2']

var obj = { 0: 'a', 1: 'b', 2: 'c' };
console.log(Object.keys(obj)); // ['0', '1', '2']

var an_obj = { 100: 'a', 2: 'b', 7: 'c' };
console.log(Object.keys(an_obj)); // ['2', '7', '100']
```
</td>
</tr>
<tr>
 <td> Object.entries() </td>
 <td> возвращает массив собственных перечисляемых свойств указанного объекта в формате [key, value] </td>
 <td>
  
```js
// Object.entries(obj)
var obj = { foo: "bar", baz: 42 };
console.log(Object.entries(obj)); // [ ['foo', 'bar'], ['baz', 42] ]
```
</td>
</tr>
<tr>
 <td> Object.assign() </td>
 <td> спользуется для копирования значений всех собственных перечисляемых свойств из одного или более исходных объектов в целевой объект </td>
 <td>
  
```js
// Object.assign(target, ...sources)
var o1 = { a: 1 };
var o2 = { b: 2 };
var o3 = { c: 3 };

// Слияние объекта
var obj = Object.assign(o1, o2, o3);
console.log(obj); // { a: 1, b: 2, c: 3 }
console.log(o1);  // { a: 1, b: 2, c: 3 }, изменился и сам целевой объек
console.log(o2); // { b: 2 }

// Клонирование объекта
var obj1 = Object.assign({}, o2, o3);
console.log(obj1); // { b: 2, c: 3 }
console.log(o2);  // { b: 2 }
```
```js
// Создание нового объекта со свойствами клонируемого
const robot = {
	model: 'SAL-1000',
  mobile: true,
  sentient: false,
  armor: 'Steel-plated',
  energyLevel: 75
};

const newRobot = Object.assign({laserBlaster: true, voiceRecognition: true}, robot);
console.log(newRobot); // { laserBlaster: true, voiceRecognition: true,model: 'SAL-1000',mobile: true,sentient: false,armor: 'Steel-plated',energyLevel: 75 }
```
</td>
</tr>
<tr>
 <td> for </td>
 <td> выполнить множество выражений в цикле </td>
 <td>
  
```js
for (let counter = 0; counter < 4; counter++) {
  console.log(counter);
} // 0
```
</td>
</tr>

</table>
