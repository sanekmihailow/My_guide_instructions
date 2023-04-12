<?
$rootActivity = $this->GetRootActivity();
use Bitrix\Main\Loader;
Loader::includeModule('tasks');

$curTask = "{=Variable:taskid_task}";
$task = CTasks::GetByID($curTask );
$status = $task->Fetch()['STATUS'];

if ($status == '5') {
        $arStatusNext = ["STATUS" => "3"];
        $obTask = new CTasks;
        $update = $obTask->Update($curTask, $arStatusNext);
}
