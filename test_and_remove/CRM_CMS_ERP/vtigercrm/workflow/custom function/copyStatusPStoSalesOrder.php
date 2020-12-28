<?php

function copyStatusPStoSo($ws_entity)
{
//    global $VTIGER_BULK_SAVE_MODE;
    //#C- get WS id (id записи с префиксом номер модуля)
    $ws_id = $ws_entity->getId();
    $module = $ws_entity->getModuleName();
    if (empty($ws_id) || empty($module)) {
        return;
    }
    // get CRM id
    $crmid = vtws_getCRMEntityId($ws_id);
    if ($crmid <= 0) {
        return;
    }
    //#C- получение объекта со всеми данными о текущей записи Модуля "<MyModule?"
    $PSInstance = Vtiger_Record_Model::getInstanceById($crmid);
 //   $previousBulkSaveMode = $VTIGER_BULK_SAVE_MODE;
 //   $VTIGER_BULK_SAVE_MODE = true;
    if (!$PSInstance) {
        return;
    }
    //#C- получение значения поля id
    $soId = $PSInstance->get('cf_salesorder_id');
    //#C- получение всех полей в модуле
    $soInstance = Vtiger_Record_Model::getInstanceById($soId);
    if (!$soInstance) {
        return false;
    }
    //#C- получение значения поля
    $getSoStatusPS = $soInstance->get('cf_2092');
    $getStatusPS = $PSInstance->get('status_side');
    //$getStatusPS = '11';
    if ($getStatusPS !== $getSoStatusPS) {
        $soInstance->set('mode', 'edit');
        if ($getStatusPS == 'В работе') {
            $soInstance->set('cf_2092', 'В работе');
        } elseif ($getStatusPS == 'В покраске') {
            $soInstance->set('cf_2092', 'В покраске');
        } elseif ($getStatusPS == 'Готово') {
            $soInstance->set('cf_2092', 'Готово');
        }

        require_once('scripts/fixBugTotalGroundProducts.php');
        $soInstance->save();
    }
//    $VTIGER_BULK_SAVE_MODE = $previousBulkSaveMode;
    return true;
}
