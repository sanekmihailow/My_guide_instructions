<?php

function copyRelatedFields($ws_entity){

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
  // so (SalesOrder)
  //получение объекта со всеми данными о текущей записи Модуля "MyModule"
  $soInstance = Vtiger_Record_Model::getInstanceById($crmid);
    if (!$soInstance) {
      return;
    }
    $pagingModel = new Vtiger_Paging_Model();
    $pagingModel->set('page', 1);
    $pagingModel->set('limit', 40);
    // MC_START
    $getSoNeedEdit = $soInstance->get('cf_2102');
    $getSoEditModule = $soInstance->get('cf_2100');
    if ($getSoNeedEdit == '1') {
        if ($getSoEditModule == 'Статус МС') {
            $soStatusMC = $soInstance->get('cf_1970');
            //Получаем список связанных МС
            $MCListModel = Vtiger_RelationListView_Model::getInstance($soInstance, 'MC', 'MC');
            $entries = $MCListModel->getEntries($pagingModel);
            foreach ($entries as $entry) {
                $getStatusMC = $entry->get('cf_1933');
                if ($soStatusMC !== $getStatusMC) {
                    $mcModel = Vtiger_Record_Model::getInstanceById($entry->getId());
                    $mcModel->set('mode', 'edit');
                    if ($soStatusMC == 'В работе') {
                          $mcModel->set('cf_1933', 'В работе');
                    } elseif ($getStatusMC == 'В покраске') {
                          $mcModel->set('cf_1933', 'В покраске');
                    } elseif ($getStatusMC == 'Готово') {
                          $mcModel->set('cf_1933', 'Готово');
                    }
                    require('scripts/fixBugTotalGroundProducts.php');
                    $mcModel->save();
                }
            }

        // MC_END
        }
        // Equipment_START
        $soStatusEquipmentSP = $soInstance->get('cf_2090');
        $soStatusEquipmentEq = $soInstance->get('cf_1972');
        $soStatusEquipmentCompl = $soInstance->get('cf_2094');
        //Получаем список связанных изделий
        $EquipmentListModel = Vtiger_RelationListView_Model::getInstance($soInstance, 'Equipment', 'Equipment');
        $entries = $EquipmentListModel->getEntries($pagingModel);
        foreach ($entries as $entry) {
            $getStatusEquipment = $entry->get('cf_1931');
            $getTypeEquipment = $entry->get('cf_1590');
            if ($getSoEditModule == 'Статус СП') {
                if ($getTypeEquipment == 'СПО' || $getTypeEquipment == 'СПД' || $getTypeEquipment == 'Стекло') {
                    if ($soStatusEquipmentSP !== $getStatusEquipment) {
                        $eqModel = Equipment_Module_Model::setStatusById($entry->getId(), $soStatusEquipmentSP);
                    }
                }
            } elseif ($getSoEditModule == 'Статус изделий') {
                if ($getTypeEquipment == 'Створка ПВХ' || $getTypeEquipment == 'Створка AL' || $getTypeEquipment == 'Конструкция ПВХ' || $getTypeEquipment == 'Конструкция AL') {
                    if ($soStatusEquipmentEq !== $getStatusEquipment) {
                        $eqModel = Equipment_Module_Model::setStatusById($entry->getId(), $soStatusEquipmentEq);
                    }
                }
            } elseif ($getSoEditModule == 'Комплектация') {
                if ($getTypeEquipment == 'Подоконник' || $getTypeEquipment == 'Откосы' || $getTypeEquipment == 'Отлив' || $getTypeEquipment == 'Сэндвич Кв.м' || $getTypeEquipment == 'Другое') {
                    if($soStatusEquipmentCompl !== $getStatusEquipment) {
                        $eqModel = Equipment_Module_Model::setStatusById($entry->getId(), $soStatusEquipmentCompl);
                    }
                }
            }
        }
        //Equipment_END
        if ($getSoEditModule == 'Статус сторона') {
        //ProductionSide_START
            $soStatusProductionSide = $soInstance->get('cf_2092');
            //Получаем список связанных Производство сторона
            $ProductionSideListModel = Vtiger_RelationListView_Model::getInstance($soInstance, 'ProductionSide', 'ProductSide');
            $entries = $ProductionSideListModel->getEntries($pagingModel);
            foreach ($entries as $entry) {
                $getStatusProductionSide = $entry->get('status_side');
                if ($soStatusProductionSide !== $getStatusProductionSide) {
                    $prodSideModel = Vtiger_Record_Model::getInstanceById($entry->getId());
                    $prodSideModel->set('mode', 'edit');
                    //file_put_contents(__DIR__ . '/so.log', print_r('soso', true));
                    if ($soStatusProductionSide == 'В работе') {
                        $prodSideModel->set('status_side', 'В работе');
                    file_put_contents(__DIR__ . '/so.log', print_r('soso1', true));
                    } elseif ($soStatusProductionSide == 'Готово') {
                        $prodSideModel->set('status_side', 'Готово');
                    file_put_contents(__DIR__ . '/so.log', print_r('soso2', true));
                    }
                    require('scripts/fixBugTotalGroundProducts.php');
                    $prodSideModel->save();
                }
            }
        // ProductionSide_END
        }
        $soInstance->set('mode', 'edit');
        $soInstance->set('cf_2100', 'нет');
        $soInstance->set('cf_2102', '0');
        require('scripts/fixBugTotalGroundProducts.php');
        $soInstance->save();
    }

  return true;
}
