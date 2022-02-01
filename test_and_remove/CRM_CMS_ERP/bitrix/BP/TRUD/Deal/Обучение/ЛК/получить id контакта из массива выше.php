<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

//#C- Const
//#M - $deal_id = {{ID}};
$ContactIds = "{=Variable:Ids_contact}";
$Number_in_ar = "{=Variable:cicl_users}";
//#-----

$arContactIds = explode(",", $ContactIds);
$contact_id = $arContactIds["$Number_in_ar"];

$rootActivity->SetVariable("id_contact",$contact_id);
