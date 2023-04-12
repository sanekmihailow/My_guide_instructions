<?
$rootActivity = $this->GetRootActivity();

$date_begin = "{=Variable:finish_date_subtask}";
$srok_subtask = date('d.m.Y 10:00', strtotime($date_begin));
$rootActivity->SetVariable("start_date_time_subtask",$srok_subtask);
