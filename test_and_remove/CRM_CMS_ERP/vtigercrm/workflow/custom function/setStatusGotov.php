<?php

function setStatusGotov($ws_entity){

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
  // so (SalesOrder)
  $soInstance = Vtiger_Record_Model::getInstanceById($crmid);
    if (!$soInstance) {
      return;
    }
  // get status
  $soStatusMC = $soInstance->get('cf_1970');
  $soStatusEquipmentSP = $soInstance->get('cf_2090');
  $soStatusEquipmentEq = $soInstance->get('cf_1972');
  $soStatusEquipmentCompl = $soInstance->get('cf_2094');
  $soStatusProductionSide = $soInstance->get('cf_2092');
  // check status
  if ($soStatusMC == 'Готово' || $soStatusEquipmentSP == 'Готово' || $soStatusEquipmentEq == 'Готово' || $soStatusEquipmentCompl == 'Готово' || $soStatusProductionSide == 'Готово') {
     $soInstance->set('mode', 'edit');
     $soInstance->set('sostatus', 'Заказ готов!!!');

     require_once('scripts/fixBugTotalGroundProducts.php');
     $soInstance->save();
  }
  return true;
}
