# LINKS
[Создания обработчика с custom function](https://wiki.salesplatform.ru/index.php/SalesPlatform_Vtiger_CRM_Developers_%D0%A0%D1%83%D0%BA%D0%BE%D0%B2%D0%BE%D0%B4%D1%81%D1%82%D0%B2%D0%BE_%D0%A1%D0%BE%D0%B7%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5_%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%BD%D0%BE%D0%B3%D0%BE_%D0%BE%D0%B1%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D1%87%D0%B8%D0%BA%D0%B0)

# Инициализация глобальных переменных
> возиожность выполнения обработчкиа без триггера (запуска) других обрабботчиков, свзанных с этим модулем
```php
global $VTIGER_BULK_SAVE_MODE;
```
> объйвление текущего пользователя системы
```php
global $current_user;
```
> возможность делать sql запросы к БД
```php
global $adb;
```

example.com/vtigercrm/index.php?**module=SalesOrder**&**relatedModule=MC**&view=Detail&**record=170004**&**mode=showRelatedList**&relationId=310&**tab_label=MC**&app=INVENTORY

## Example how to work
```php
<?php
//#C - создаем функцию
function <имя_фуункции>($ws_entity){
    global <глобальная переменная>;
    //#С - получвем id текущей сущности
    <$ws_id> = $ws_entity->getId();
    //#C - получаем имя модуля
    <$module> = $ws_entity->getModuleName();
    //#C - проверяем существование сущности и модуля
    if (empty($ws_id) || empty($module)) {
        return;
    }
    //#С - получвем id элемента модуля в CRM
    <$crmid> = vtws_getCRMEntityId($ws_id);
    //#C - проверяем существование элемента в модуле
    if ($crmid <= 0) {
        return;
    }
    //#C- получение объекта со всеми данными о текущей записи Модуля "<МойМодуль>"
    <$soInstance> = Vtiger_Record_Model::getInstanceById($crmid);
    //#C - проверяем существование полей в элементе модуля
    if (!$soInstance) {
        return;
    }
    //in code start
        //#C - получение списка объектов модуля по странично
        $pagingModel = new Vtiger_Paging_Model();
        $pagingModel->set('page', 1);
        $pagingModel->set('limit', 40);
        <$RelatedModuleList> = Vtiger_RelationListView_Model::getInstance($soInstance, '<relatedModule>', '<tab_label>');
        $entries = $RelatedModuleList->getEntries($pagingModel);
        foreach ($entries as $entry) {
            //code
        }
    // in code end
    //#C - режим едактирования
    $soInstance->set('mode', 'edit');
    // code ...

    //#C- сохранить результат редактирования
    $soInstance->save();
    return true;
}
```

### Простой пример
```php
<?php

function copyField($ws_entity){
    global $current_user;
    global $adb;
    global $VTIGER_BULK_SAVE_MODE;
    // WS id
    $ws_id = $ws_entity->getId();
    $module = $ws_entity->getModuleName();
    if (empty($ws_id) || empty($module)) {
        return;
    }
    // CRM id
    $crmid = vtws_getCRMEntityId($ws_id);
    if ($crmid <= 0) {
        return;
    }
    $soInstance = Vtiger_Record_Model::getInstanceById($crmid);
    //получение объекта со всеми данными о текущей записи Модуля "MyModule"
    $previousBulkSaveMode = $VTIGER_BULK_SAVE_MODE;
    $VTIGER_BULK_SAVE_MODE = true;
    if (!$soInstance) {
        return;
    }
    
    $soInstance->set('mode', 'edit');
    $soInstance->set('assigned_master', $soInstance->get('assigned_user_id'));
    $products = $soInstance->getProducts();
    $_REQUEST['totalProductCount'] = count($products);
    $_REQUEST['subtotal'] = $soInstance->get('hdnSubTotal');
    $_REQUEST['total'] = $soInstance->get('hdnGrandTotal');
    for ($i = 1; $i <= count($products); $i++) {
        $_REQUEST['hdnProductId' . $i] = $products[$i]['hdnProductId' . $i];
        $_REQUEST['lineItemType' . $i] = $products[$i]['lineItemType' . $i];
        $_REQUEST['subproduct_ids' . $i] = $products[$i]['subproduct_ids' . $i];
        $_REQUEST['comment' . $i] = $products[$i]['comment' . $i];
        $_REQUEST['qty' . $i] = $products[$i]['qty' . $i];
        $_REQUEST['purchaseCost' . $i] = $products[$i]['purchaseCost' . $i];
        $_REQUEST['margin' . $i] = $products[$i]['margin' . $i];
        $_REQUEST['listPrice' . $i] = $products[$i]['listPrice' . $i];
        $_REQUEST['discount_type' . $i] = $products[$i]['discount_type' . $i];
        $_REQUEST['discount' . $i] = $products[$i]['discount' . $i];
        $_REQUEST['discount_percentage' . $i] = $products[$i]['discount_percentage' . $i];
        $_REQUEST['discount_amount' . $i] = $products[$i]['discount_amount' . $i];
    }
    $soInstance->save();

    $VTIGER_BULK_SAVE_MODE = $previousBulkSaveMode;

    return true;
}
```
