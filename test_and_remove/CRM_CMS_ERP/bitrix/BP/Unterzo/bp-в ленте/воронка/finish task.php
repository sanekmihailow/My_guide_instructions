<?
$rootActivity = $this->GetRootActivity();
$date_begin = "{=Variable:finis_date}";

$srok_task = date('d.m.Y 21:00', strtotime($date_begin));
$rootActivity->SetVariable("finis_date_time",$srok_task);
