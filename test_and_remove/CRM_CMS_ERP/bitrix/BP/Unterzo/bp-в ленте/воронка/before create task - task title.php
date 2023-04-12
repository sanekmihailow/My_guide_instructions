<?
$rootActivity = $this->GetRootActivity();
$num = "{=Variable:loop_current_number}";
$subtaskTitle = 'title_sub_task' . $num;
$subtaskContext = 'subtask_context' . $num;
$days = 'add_days' . $num;
$assigned = 'subtask_responsible' . $num;

$title = $rootActivity->GetVariable("$subtaskTitle");
$context = $rootActivity->GetVariable("$subtaskContext");
$add_days = $rootActivity->GetVariable("$days");
$assigned = $rootActivity->GetVariable("$assigned");

$rootActivity->SetVariable("Title_head", $title);
$rootActivity->SetVariable("Context_task", $context);
$rootActivity->SetVariable("curr_add_days", $add_days);
$rootActivity->SetVariable("curr_responsible", $assigned);
