<?php

function copyStatusMCtoSo($ws_entity)
{
    // get WS id (id записи с префиксом номер модуля)
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
    $MCInstance = Vtiger_Record_Model::getInstanceById($crmid);
    
    if (!$MCInstance) {
        return;
    }
    $soId = $MCInstance->get('cf_salesorder_id');
    $soInstance = Vtiger_Record_Model::getInstanceById($soId);
    if(!$soInstance) {
        return false;
    }
    $getSoStatusMC = $soInstance->get('cf_1970');
    $getStatusMC = $MCInstance->get('cf_1933');
    if ($getStatusMC !== $getSoStatusMC) {
        $soInstance->set('mode', 'edit');
        if ($getStatusMC == 'В работе') {
            $soInstance->set('cf_1970', 'В работе');
        } elseif ($getStatusMC == 'В покраске') {
            $soInstance->set('cf_1970', 'В покраске');
        } elseif ($getStatusMC == 'Готово') {
            $soInstance->set('cf_1970', 'Готово');
        }

        require_once('scripts/fixBugTotalGroundProducts.php');
        $soInstance->save();
    }

    return true;
}
