
### 1) Использование методов REST
> В общем виде вызов метода REST для локальных и тиражных приложений выглядит как HTTPS-запрос следующего вида
> "транспорт" - необязательный параметр, который может иметь значения json или xml. По умолчанию - json. Запрос может отправляться как методом GET, так и POST. Значения параметров методов принимаются в кодировке UTF-8.
> Существует лимит на число запросов. Разрешается **два запроса в секунду**. Если лимит превышается, то ограничение начинает срабатывать после **50 запросов**.

[Вызов методов REST](https://dev.1c-bitrix.ru/rest_help/js_library/rest/index.php)

#### BX24.callMethod

 ```php
 void BX24.callMethod(
    String method,
    Object params[, Function callback]
);
```
подробнее
```php
 BX24.callMethod(
  "<method_string>",
  {<params>},
  function(<result>){...}
 );
 ```

Для вебхуков синтаксис вызова отличается, однако все равно содержит имя метода, параметры метода и транспорт.
 https://bitrix24.ru/rest/имя_метода.транспорт?параметры_метода&auth=ключ_авторизации
 
 Пример: Получим поля сделки с id 10

 ```php
 BX24.callMethod(
  "crm.deal.get",
  { id: 10 },
  function(result)
  {
    if(result.error())
      console.error(result.error());
    else
      console.dir(result.data());
  }
);
```

#### BX24.callBatch

```php
void BX24.callBatch(
    Object|Array calls,
    [Function callback
      [,Boolean bHaltOnError = false]
    ]
);
```
подробнее
```php

```


### 2) Права на методы REST
> Доступ приложений (и вебхуков) к методам REST API регулируется через доступ к скоупам - модулям Битрикс24, реализующим те или иные методы REST. На текущий момент реализованы следующие скоупы:

<details>
 
| | | 
|---|---|
|bizproc | Бизнес-процессы|
|calendar |    Календарь|
|call |    Телефония (совершение звонков). В скоуп входят методы: voximplant .infocall.startwithsound voximplant.infocall.startwithtext|
|catalog | Торговый каталог|
|contact_center |  Контакт-центр|
|crm | CRM|
|department |  Структура компании|
|disk |    Диск|
|documentgenerator |   Генератор документов|
|entity |  Хранилище данных|
|faceid |  Распознавание лиц|
|im |  Чат и уведомления|
|imbot |   Создание и управление Чат-ботами|
|imopenlines | Открытые линии|
|intranet |    Интранет|
|landing | Сайты|
|lists |   Списки|
|log | Живая лента|
|mailservice | Почтовые сервисы|
|messageservice |  Служба сообщений|
|mobile |  Мобильное приложение|
|pay_system |  Платёжные системы|
|placement |   Встраивание приложений|
|pull |    Pull&Push|
|rpa | Роботизация бизнеса|
|sale |    Интернет-магазин|
|sonet_group | Рабочие группы|
|task |    Задачи|
|telephony |   Телефония|
|timeman | Учет рабочего времени|
|user |    Пользователи|
|userconsent | Работа с соглашениями|
 
</details>

#### События REST

[Все события Rest](https://dev.1c-bitrix.ru/rest_help/rest_sum/events/events.php)

