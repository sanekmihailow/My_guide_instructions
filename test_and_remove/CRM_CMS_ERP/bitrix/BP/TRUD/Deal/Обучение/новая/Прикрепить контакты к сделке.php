<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

//#C- Const
$deal_id = {{ID}};
$ContactIds = "{=Variable:Contacts_id}";
//#-----

$arContactIds = explode(" ", $ContactIds);
$rs = \Bitrix\Crm\Binding\DealContactTable::bindContactIDs($deal_id,$arContactIds);
