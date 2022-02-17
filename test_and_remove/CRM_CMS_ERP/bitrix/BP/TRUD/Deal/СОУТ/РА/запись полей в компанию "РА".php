<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

$deal_id = {{ID}};
$company_id = {{Компания: ID}};

$oformitel_deal = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_1583066448',$deal_id);
$trek_dial = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_1583994893',$deal_id);
$deal_napravlenie = "{{Направление (текст)}}";
$deal_stadia = "{{Стадия сделки (текст)}}";

$set_company_oformitel = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1583066448" => $oformitel_deal));
$set_company_trek = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598122858" => $trek_dial));
$set_company_deal_napravlenie = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271834" => $deal_napravlenie));
$set_company_deal_stadia = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271875" => $deal_stadia));
