<?
//в начале объявляем текущий бизнес-процесс
$rootActivity = $this->GetRootActivity(); 

$id_of = $rootActivity->GetVariable("id_oformitel_stroka");
$id_post = $rootActivity->GetVariable("id_postanoka_stroka");
//$id_of = "100";
//$id_post = "135"; 

$curTask = '{=A78849_12835_78386_32057:TaskId}'; //id созданной ранее задачи с помощью активити "Задача"
$taskId = $rootActivity->SetVariable("task_id",$curTask);

$task = new \Bitrix\Tasks\Item\Task($curTask);
$task['SE_PARAMETER'] = Array(
    array(
        'CODE' => \CTasks::PARAMETER_COMPLETE_TASK_FROM_SUBTASKS,
        'VALUE' => 'Y',
      ),    
    array(
        'CODE' => \CTasks::PARAMETER_PROJECT_PLAN_FROM_SUBTASKS,
        'VALUE' => 'Y',
      ),
   );
$result = $task->save();

$TASKS = "
    Название задачи; Описание; Постановщик ID; Ответственный ID
    {{ID}}. 1) Папка с замерами пришла; Папка с замерами пришла; $id_post; $id_of
    {{ID}}. 2) Отчет согласован с заказчиком в электронном виде; Отчет согласован с заказчиком в электронном виде; $id_post; $id_of
    {{ID}}. 3) Отчет распечатан; Отчет распечатан; $id_post; $id_of
    {{ID}}. 4) Поставить дату проведения оценки; Поставить дату проведения оценки; $id_post; $id_of
";
 
$TASKS = explode(PHP_EOL, $TASKS);
foreach( $TASKS as $task ){
    if( trim($task) ){
        $arTask = explode(";", trim($task));
        $arTask['TITLE'] = $arTask[0];
        $arTask['DESC'] = $arTask[1];
        $arTask['CREATED_BY'] = $arTask[2];
        $arTask['RESPONSIBLE_ID'] = $arTask[3];
 
        $arFields = Array(
            "TITLE" => $arTask['TITLE'],
            "DESCRIPTION" => $arTask['DESC'],
            "RESPONSIBLE_ID" => $arTask['RESPONSIBLE_ID'],  
            "CREATED_DATE" => date('d.m.Y H:i:s'),
            "CHANGED_DATE" => date('d.m.Y H:i:s'),
            "STATUS_CHANGED_DATE" => date('d.m.Y H:i:s'),
            "START_DATE_PLAN" => date('d.m.Y H:i:s'),
            "VIEWED_DATE" => date('d.m.Y H:i:s'),
            // "DEADLINE" => date("d.m.Y H:i:s",$sevenup),
            "ALLOW_TIME_TRACKING" => 'N',
            "ADD_IN_REPORT" => 'Y',
            "CREATED_BY" => $arTask['CREATED_BY'],
            "STATUS" => 2,
            "REAL_STATUS" => 2,
            "PRIORITY" => 2,
            "PARENT_ID" => $curTask,
        );
        $obTask = new CTasks;
        $ID = $obTask->Add($arFields);
        $success = ($ID>0);
 
    }
}
