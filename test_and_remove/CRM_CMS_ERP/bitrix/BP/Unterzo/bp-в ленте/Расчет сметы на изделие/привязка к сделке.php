<?
$rootActivity = $this->GetRootActivity(); 

$curTask = '{=A69367_18817_95249_9153:TaskId}'; // идентификатор задачи
$DeaLId = $rootActivity->GetVariable("deal_id"); // получаем id сделки
$USER_ID = 1;

$arFields['UF_CRM_TASK'] = array("D_$DeaLId");
$arStatus = ["STATUS" => "3"];
$arTags = ["смета", "расчет сметы"]; // добавляемые теги
$obTask = new CTasks;
//C+
$success = $obTask->Update($curTask , $arFields);
$update = $obTask->Update($curTask, $arStatus);
CTasks::AddTags($curTask, $USER_ID, $arTags);
