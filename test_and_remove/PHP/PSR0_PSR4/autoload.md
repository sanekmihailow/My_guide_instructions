> пространство имён и имя класса должны иметь следующую структуру:
https://qna.habr.com/q/272575
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
### Публичнные данные тут `/var/www/html/example_project/public_html`
