$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;

$deal_id = {{ID}};
$sum_itogo  = {{СУММА ИТОГО}};

CCrmProductRow::DeleteByOwner('D',$deal_id);
$arsum = ['OPPORTUNITY' => "$sum_itogo"];
$updateDeal = new CCrmDeal($deal_id);
$updateDeal->Update($deal_id, $arsum);
