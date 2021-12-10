**`vtiger_modtracker_basic`**
> таблица отвечает за отображение истории в журнале историй дашборда и истории в модуле

**`vtiger_modtracker_detail`**
> таблица отвечает за отображение истории в журнале истории в модуле
> удалить можно так
```sql
DELETE FROM `<database>`.`vtiger_modtracker_detail` WHERE `id`='<number>';
```

**`vtiger_loginhistory`**
> история логинов

**`vtiger_crmentity`**
> привязка модулей к label
