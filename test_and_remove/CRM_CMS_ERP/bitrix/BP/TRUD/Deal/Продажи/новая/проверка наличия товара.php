<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//--const
$dealId = {{ID}};
//--

$arProducts = CAllCrmProductRow::LoadRows(D, $dealId);
$count_products = count($arProducts);

if (empty($count_products)) {
    $error = 'A';
    $rootActivity->SetVariable("ProductError",$error);
} else {
    $error = 'Noerror';
    $rootActivity->SetVariable("ProductError",$error);
}
