<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;

$deal_id = {{ID}};
$arProducts = CAllCrmProductRow::LoadRows(D, $dealId);
$count_products = count($arProducts);
if (empty($count_products)) {
$sozdaem = 'net';
}
else {	
$sozdaem = 'da';
}

$set_sozdaem = $rootActivity->SetVariable("sozdaem",$sozdaem);

