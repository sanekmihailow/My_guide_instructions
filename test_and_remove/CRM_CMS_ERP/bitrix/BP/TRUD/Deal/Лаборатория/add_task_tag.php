<?
$rootActivity = $this->GetRootActivity();

$curTask = '{=A78849_12835_78386_32057:TaskId}';
$id = $curTask;

$dep = {=Variable:Department > printable};
$saleDeal = "Продажи - {{Ссылка на сделку из продаж}}";
$tag = ["TAGS" => ["$dep", "$saleDeal"]];
$obTask = new CTasks;
$obTask->Update($id, $tag);
