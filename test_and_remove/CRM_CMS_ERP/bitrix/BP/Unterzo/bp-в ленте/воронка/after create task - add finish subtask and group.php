<?
$rootActivity = $this->GetRootActivity();
use Bitrix\Main\Loader;
Loader::includeModule('tasks');
$group = "{=Variable:group_id}";
$tags = "{=Variable:task_tag}";
$artags = explode(",", $tags);
$tags = [
    "TAGS" => [trim($artags[0]), trim($artags[1])]
];

$curTask = "{=Variable:osn_taskid}";
$obTask = new CTasks;
$obTask->Update($curTask, $tags);

$task = new \Bitrix\Tasks\Item\Task($curTask);
$task['SE_PARAMETER'] = [
    [
        'CODE' => \Bitrix\Tasks\Internals\Task\ParameterTable::PARAM_SUBTASKS_AUTOCOMPLETE,
        'VALUE' => 'Y',
    ],
];
$task['GROUP_ID'] = $group;

$task->save();
