<?
$rootActivity = $this->GetRootActivity();

$isp_uslugi = "{{Исполнение услуги (кол-во дней)!}}";
$date_begin = "{{Дата начала}}";
//$date=date_create("2013-03-15");
//$date_add($date,date_interval_create_from_date_string("40 days"));
//$chislo = $isp_uslugi;
$srok_uslugi = date('d.m.Y', strtotime($date_begin. " + $isp_uslugi days"));

$rootActivity->SetVariable("Srok_uslugi",$srok_uslugi);

//$razd_chislo_one=(int)$kopeek_one;
//$rootActivity->SetVariable("percent_30_kopeek",$kop_thirty);

//$cicl_notice_day = $rootActivity->GetVariable("day_notice");
//$cicl_day_and_time_bol_10 = date('d.m.Y 10:00', strtotime($cicl_notice_day));
//$cicl_day_and_time_men_13 = date('d.m.Y 13:00', strtotime($cicl_notice_day));

//$rootActivity->SetVariable("pause_cicl_date_and_time_10",$cicl_day_and_time_bol_10);
//$rootActivity->SetVariable("pause_cicl_date_and_time_13",$cicl_day_and_time_men_13);
