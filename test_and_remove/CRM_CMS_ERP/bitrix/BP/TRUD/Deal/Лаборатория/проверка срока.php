<?
$rootActivity = $this->GetRootActivity();

$isp_uslugi = "{{*Исполнение услуги (кол-во дней)!}}";
$date_begin = "{{Дата начала}}";
$end = "10";
$end_f = "5";

$srok_uslugi = date('d.m.Y', strtotime($date_begin. " + $isp_uslugi days"));
$srok_end = date('d.m.Y', strtotime($srok_uslugi. " - $end days"));
$srok_end_f = date('d.m.Y', strtotime($srok_uslugi. " - $end_f days"));

$rootActivity->SetVariable("srok_uslugi_end",$srok_end);
$rootActivity->SetVariable("srok_uslugi_end_f",$srok_end_f);
