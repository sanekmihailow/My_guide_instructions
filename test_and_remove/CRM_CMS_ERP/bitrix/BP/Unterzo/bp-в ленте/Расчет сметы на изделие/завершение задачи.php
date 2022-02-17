<?
$rootActivity = $this->GetRootActivity();

$curTask = '{=A69367_18817_95249_9153:TaskId}'; // идентификатор задачи
$arStatusCompl = ["STATUS" => "5"];
$obTask = new CTasks;

$update = $obTask->Update($curTask, $arStatusCompl);
