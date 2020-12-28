<?php
require_once 'includes/Loader.php';
require_once 'config.php';
include_once 'vtlib/Vtiger/Module.php';
require_once 'libraries/adodb/adodb.inc.php';
require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
global $adb;
$emm = new VTEntityMethodManager($adb);
//#C- $emm->addEntityMethod("<имя модуля>", "<описание функции>","<путь к обработчику>", "<имя функции в коде обрабочика custom function>");
$emm->addEntityMethod("SalesOrder", "Create New Payment","modules/SalesOrder/workflow/createPayment.php", "createPayment");
