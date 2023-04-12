<?
$rootActivity = $this->GetRootActivity();
use Bitrix\Main\Loader;
Loader::includeModule('tasks');

$num = "{=Variable:loop_current_number}";
$curTask = "{=Variable:current_subtask}";

if ($num == '4' || $num == '5') {
    $sub_assigned = "{=Variable:nachalnik_proizvodstva2}";
    $sub_assigned = substr($sub_assigned,5);
    $subassigns = [
        "ACCOMPLICES" => [$sub_assigned]
    ];
}

if ($subassigns) {
    $obTask = new CTasks;
    $obTask->Update($curTask, $subassigns);
    AddMessage2Log("documentId: ".print_r($sub_assigned,true),"crm_bp");
}
