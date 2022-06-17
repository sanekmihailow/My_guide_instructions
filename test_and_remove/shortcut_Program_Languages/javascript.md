 Javascript
====
### БАЗОВЫЕ
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

#### Типы данных
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

#### Арифметические операции
###### ----------
| ***eng** | ***пример*** | ***пример c переменной*** |
|:---|:---:|:---|
|Add|+| w += 1 &#124; w++ |
|Subtract|-| w -= 1 &#124; w-- |
|Multiply|*| w *= 1 |
|Divide|/| w /= 1 |
|Remainder|%|
`console.log(3 + 4);`

#### Конкатенация строк
###### ----------

```js
console.log('hi' + 'ya'); // Prints 'hiya'
console.log('no' + 'space'); // Prints 'nospace'
console.log('middle' + ' ' + 'space'); // Prints 'middle space'
```

#### Интерполяция строк
###### ----------
```js
let myName = 'A'
let myCity = 'Cheb'
console.log(`My name is ${myName}. My favorite city is ${myCity}.`) // My name is A. My favorite city is Cheb.
```

#### Характеристики (Properties instance)
###### ----------

```js
console.log('Hello'.length); // Prints 5
```

#### Методы
###### ----------

> пример вызова метода
`'example string'.methodName()`

```js
console.log('hello'.toUpperCase()); // Prints 'HELLO'
console.log('Hey'.startsWith('H')); // Prints true
console.log('    Remove whitespace   '.trim()); // Prints 'Remove whitespace'
```

##### Встроенные объекты (глобальные объекты)
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

#### Переменные (Variables)
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

#### Операторы
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

#### Условные Операторы
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

#### Тернарные Операторы
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

#### Функции
###### ----------

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

#### Вспомогательные функции (Helper Functions)
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

