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

##### Типы данных
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

##### Арифметические операции
###### ----------
| ***eng** | ***пример*** | ***пример c переменной*** |
|:---|:---:|:---|
|Add|+| w += 1 &#124; w++ |
|Subtract|-| w -= 1 &#124; w-- |
|Multiply|*| w *= 1 |
|Divide|/| w /= 1 |
|Remainder|%|
`console.log(3 + 4);`

##### Конкатенация строк
###### ----------

```js
console.log('hi' + 'ya'); // Prints 'hiya'
console.log('no' + 'space'); // Prints 'nospace'
console.log('middle' + ' ' + 'space'); // Prints 'middle space'
```

##### Интерполяция строк
###### ----------
```js
let myName = 'A'
let myCity = 'Cheb'
console.log(`My name is ${myName}. My favorite city is ${myCity}.`) // My name is A. My favorite city is Cheb.
```

##### Характеристики (Properties instance)
###### ----------

```js
console.log('Hello'.length); // Prints 5
```

##### Методы
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

##### Переменные (Variables)
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

##### Операторы
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

