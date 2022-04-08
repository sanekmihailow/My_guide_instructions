<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
//--const
$dealId = {{ID}};
//--
$id = $dealId;
$arDeal = CCrmDeal::GetByID($id);
$creator = $arDeal['CREATED_BY_ID'];
$USER_FIELD_MANAGER->Update('CRM_DEAL', $id, array("UF_CRMDEAL_BY_CREATED" => $creator));
