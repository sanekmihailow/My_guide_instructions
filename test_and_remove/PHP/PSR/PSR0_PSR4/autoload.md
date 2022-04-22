<details>
  
# links
  
[https://qna.habr.com/q/272575](https://qna.habr.com/q/272575)
  
[https://svyatoslav.biz/misc/psr_translation/#_PSR-0](https://svyatoslav.biz/misc/psr_translation/#_PSR-0)

[https://www.php-fig.org/psr/psr-4/](https://www.php-fig.org/psr/psr-4/)
  
# DESCRIPTION

 - Полностью определённое пространство имён и имя класса должны иметь следующую структуру: `\<Vendor Name>\(<Namespace>\)*<Class Name>`.
 - Каждое пространство имён должно начинаться с пространства имён высшего уровня, указывающего на `разработчика кода («имя производителя»)`.
 - Каждое пространство имён может включать в себя неограниченное количество вложенных подпространств имён.
 - Каждый разделитель пространства имён при обращении к файловой системе преобразуется в `РАЗДЕЛИТЕЛЬ_ИМЁН_КАТАЛОГОВ`.
 - Каждый символ _ («знак подчёркивания») в `ИМЕНИ_КЛАССА` преобразуется в `РАЗДЕЛИТЕЛЬ_ИМЁН_КАТАЛОГОВ`. При этом символ _ («знак подчёркивания») не обладает никаким особенным значением в имени пространства имён (и не претерпевает преобразований).
 - При обращении к файловой системе полностью определённое пространство имён и имя класса дополняются `суффиксом .php`.
 - В имени производителя, имени пространства имён и имени класса допускается использование буквенных символов в любых комбинациях нижнего и верхнего регистров.

</details>


# PSR-0
> пространство имён и имя класса должны иметь следующую структуру:

```php
\<Vendor Name>\(<Namespace>\)*<Class Name>
```
Пример без знака подчеркивания:
```php
\Doctrine\Common\IsolatedClassLoader =>
/var/www/html/example_project/lib/vendor/Doctrine/Common/IsolatedClassLoader.php
or
/var/www/html/example_project/src/vendor/Doctrine/Common/IsolatedClassLoader.php
```
> поясления: **Doctrine** - `<Vendor Name>`; **Common** - `<Namespace>`; **IsolatedClassLoader** - `<Class Name>`

Пример со знаком подчеркивания:
```php
\namespace\package\Class_Name =>
/path/to/project/lib/vendor/namespace/package/Class/Name.php
```
```php
\namespace\package_name\Class_Name =>
/path/to/project/lib/vendor/namespace/package_name/Class/Name.php
```
#### Публичнные данные тут `/var/www/html/example_project/public_html`

# PSR-4
> пока не понял
