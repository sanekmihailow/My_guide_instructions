<?php

function copyStatusEqtoSo($ws_entity){
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
      
    $EqInstance = Vtiger_Record_Model::getInstanceById($crmid);
      if (!$EqInstance) {
        return;
      }
      $soId = $EqInstance->get('cf_salesorder_id');
      $soInstance = Vtiger_Record_Model::getInstanceById($soId);
      $getSoStatusEqSP = $soInstance->get('cf_2090');
      $getSoStatusEq = $soInstance->get('cf_1972');
      $getSoStatusEqCompl = $soInstance->get('cf_2094');
      $getStatusEq = $EqInstance->get('cf_1931');
      $getTypeEquipment = $EqInstance->get('cf_1590');
      $soInstance->set('mode', 'edit');
      if ($getTypeEquipment == 'СПО' || $getTypeEquipment == 'СПД' || $getTypeEquipment == 'Стекло') {
          if ($getStatusEq !== $getSoStatusEqSP) {
              if ($getStatusEq == 'В работе') {
                  $soInstance->set('cf_2090', 'В работе');
              } elseif ($getStatusEq == 'В покраске') {
                  $soInstance->set('cf_2090', 'В покраске');
              } elseif ($getStatusEq == 'Готово') {
                  $soInstance->set('cf_2090', 'Готово');
              }
          }
      } elseif ($getTypeEquipment == 'Створка ПВХ' || $getTypeEquipment == 'Створка AL' || $getTypeEquipment == 'Конструкция ПВХ' || $getTypeEquipment == 'Конструкция AL') {
          if ($getStatusEq !== $getSoStatusEq) {
              if ($getStatusEq == 'В работе') {
                  $soInstance->set('cf_1972', 'В работе');
              } elseif ($getStatusEq == 'В покраске') {
                  $soInstance->set('cf_1972', 'В покраске');
              } elseif ($getStatusEq == 'Готово') {
                  $soInstance->set('cf_1972', 'Готово');
              }
          }
      } else {
          if ($getStatusEq !== $getSoStatusEqCompl) {
              if ($getStatusEq == 'В работе') {
                  $soInstance->set('cf_2094', 'В работе');
              } elseif ($getStatusEq == 'В покраске') {
                  $soInstance->set('cf_2094', 'В покраске');
              } elseif ($getStatusEq == 'Готово') {
                  $soInstance->set('cf_2094', 'Готово');
              }
          }
      }
      require_once('scripts/fixBugTotalGroundProducts.php');
      $soInstance->save();

  return true;
}

