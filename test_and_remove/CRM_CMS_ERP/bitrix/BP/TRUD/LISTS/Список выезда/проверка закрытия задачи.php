<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Tasks;

$objTask = CTasks::GetByID($id);
$arTask = $objTask->fetch();
$status = $arTask['STATUS'];

if ($status == '5'){
   $rootActivity->SetVariable("task_complete",'YES');
}
