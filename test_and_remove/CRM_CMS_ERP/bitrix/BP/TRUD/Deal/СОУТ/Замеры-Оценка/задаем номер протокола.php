<?
$rootActivity = $this->GetRootActivity();

//#C- 25,26 - ID нумератора в "Нумераторы для документов"
$numerator_protocol = \Bitrix\Main\Numerator\Numerator::load(25);
//#C- увеличиваем число
$numNext_protocol=$numerator_protocol->getNext();
//#C- установить значение переменной 
$this->SetVariable("num_cur_protocol",$numNext_protocol);
//#C- присвоить переменную для вывода
$num_cur_protocol = $rootActivity->GetVariable("num_cur_protocol");
