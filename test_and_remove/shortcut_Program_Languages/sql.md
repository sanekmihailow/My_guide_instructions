
### Операторы


[логические операторы команды](https://gb.ru/blog/operatory-sql/)

[sql functions](https://unetway.com/tutorial/sql-funkcii)

[условные операторы])()


#### Арифметические

|   **_тип_** |     |     |      |     |     |
| :---------  |:---:|:---:|:----:|:---:|:---:|
|   **тип**   |**+**|**-**|**\***|**/**|**%**|


#### Сравнения

|   **_тип_** |       |       |       |       |       |                  |
| :---------  |:-----:|:-----:|:-----:|:-----:|:-----:|:----------------:|
|   **тип**   | **=** | **>** | **<** |**>=** |**<=** |**<>** или **!=** |


#### Побитовые

|   **_тип_**    | **_описание_** |
| :------------: | :--------------|
|   **&**        | битовый AND              |
|   **&#124;**   | битовый OR               |
|   **^**        | битовый исключающий OR   |

#### Составные операторы

|   **_тип_**    | **_описание_** |
| :------------: | :--------------|
|   **+=**        | сложение с присваиванием                |
|   **-=**        | вычитание с присваиванием               |
|   **\*=**       | умножение с присваиванием               |
|   **/=**        | деление с присваиванием                 |
|   **%=**        | модуль с присваиванием                  |
|   **&=**        | битовый AND с присваиванием             |
|   **&#124;\*=** | битовый OR с присваиванием              |
|   **^-=**       | битовое исключение с присваиванием      |

## Операторы Команды

```sql
- SOURCE
```

#### DDL - (Data Definition Language)
>  c помощью операторов, входящих в эту группы, мы определяем структуру базы данных и работаем с объектами этой базы.

```sql
- CREATE
    - - VIEW
- ALTER
- DROP
    - - VIEW
- TRUNCATE
- RENAME 
- SHOW
- USE
- DESCRIBE
```



#### DML - (Data Manipulation Language)
>  c помощью операторов, мы можем добавлять, изменять, удалять и выгружать данные из базы, т.е. манипулировать ими.


```
Table employees
+----+------------------+------------+--------+--------+
| id | name             | department | salary | boss   |
+----+------------------+------------+--------+--------+
| 1  | John Doe         | 1          | 40000  | 35     |
| 2  | Jane Smith       | 1          | 35000  | <null> |
| 3  | Fred Brown       | 1          | 48000  | 35     |
| 4  | Kevin Jones      | 2          | 36000  | <null> |
| 5  | Josh Taylor      | 2          | 22000  | 21     |
| 6  | Alex Clark       | 2          | 29000  | <null> |
| 7  | Branda Evans     | 2          | 27000  | 21     |
| 8  | Anthony Ford     | 4          | 32000  | 43     |
| 9  | David Moore      | 4          | 29000  | <null> |
| 10 | Scott Riley      | 5          | 20000  | <null> |
| 11 | Chris Gilmore    | 5          | 28000  | <null> |
| 12 | Roberta Newman   | 5          | 33000  | 55     |
| 13 | Kenny Washington | <null>     | 55000  | 55     |
+----+------------------+------------+--------+--------+

```

```sql
select department, SUM(salary) AS sumsal
                        FROM employees
                        WHERE boss IS NOT NULL AND department IS NOT NULL
                        GROUP BY department
                        HAVING sumsal > 32000
                        ORDER BY sumsal DESC
                        /* sumsal in order by equal 2, department equal 1, 3 not exist  */
                        LIMIT 2
                        ;
```

```
+------------+--------+
| department | sumsal |
+------------+--------+
| 1          | 88000  |
| 2          | 49000  |
+------------+--------+
```


<d>
    <details>
        <summary> цепочки с JOIN </summary>

```sql
--# Возможная цепока c join cross
--# получить все возможные комбинации записей из двух таблиц
FULL JOIN table2
SELECT * FROM table1 CROSS JOIN table2;
```        

```sql
SELECT table1.column_name, table1.salary, table1.column_name_N, table2.column_name, table2.name
/* не обязательно AS делать, но лучше чтобы поменять название выводимого столбца (вместо name -> new_column_name */
AS new_name_column
FROM table1
```
```sql
--# Возможная цепочка c join inner
--# Выводит только совпадающие по условию ON результаты, без ON выведет все
INNER JOIN table2
ON table1.new_name_column = table2.id;
```
```sql
--# Возможная цепока c join left
--# Выводит еще и пустые значения из table2
LEFT JOIN table2
ON table1.new_name_column = table2.id;
```
```sql
--# Возможная цепока c join right
--# Выводит еще и пустые значения из table1
RIGHT JOIN table2
ON table1.new_name_column = table2.id;
```
```sql
--# Возможная цепока c join full
--# Выводит еще и все пустые значения из table1 и table2
FULL JOIN table2
ON table1.new_name_column = table2.id;
```

</details>
</d>

```sql
- SELECT
    - - DISTINCT
    - - AS
    - - COUNT, MIN, MAX, AVG, SUM, ROUND, 
    - - LEN, LENGTH, LOCATE, INSTR, CHARACTER_LENGTH, CHAR_LENGTH
    - - LCASE, UCASE, LOWER, UPPER
    - - CASE, IF, IF
    - - TRIM, LTRIM, FORMAT
    - - SUBSTRING, SUBSTR, MID, LEFT, INSERT
    - - STRCMP
    - - CONCAT, CONCAT_WS


- FROM
    - - INNER JOIN, LEFT JOIN, RIGHT JOIN, FULL OUTER JOIN, Self JOIN, CROSS JOIN
    - - UNION SELECT, UNION ALL SELECT
    - - INTERSECT SELECT
    - - MINUS SELECT
    - - GROUP BY
            - - -  HAVING
                        - - - - COUNT , MIN, MAX, AVG и SUM


- INSERT INTO
- UPDATE
    - - SET
- DELETE 
- LOCK 
- CALL
- MERGE
- EXPLAIN PLAN
- WHERE
    - - LIKE
    - - IN (сокращение OR)
    - - AND, OR, NOT, XOR
    - - IS NULL, IS NOT NULL
    - - BETWEEN
- ORDER BY
- LIMIT     

```

#### DCL - (Data Control Language)
>  c помощью операторов определения доступа к данным. Иными словами, это операторы для управления разрешениями.

```sql
- GRANT  
- REVOKE 
- REVOKE  
- DENY
```

#### TCL - (Transaction Control Language)
>  c помощью операторов для управления транзакциями.

```sql
- COMMIT
- ROLLBACK
- BEGIN
- SAVE
```

