```php
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

$deal_id = {{ID}};
$company_id = {{Компания: ID}};

$fgis_number = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_1578993934380',$deal_id);
$deal_napravlenie = "{{Направление (текст)}}";
$deal_stadia = "{{Стадия сделки (текст)}}";

$oformitel_doljnost = "{{Ответственный: Должность}}";
$oformitel_name = "{{Ответственный: Имя}}";
$oformitel_lastname = "{{Ответственный: Фамилия}}";
$oformitel_secondname = "{{Ответственный: Отчество}}";
$oformitel_workmobile = "{{Ответственный (Рабочий телефон)}}";
$oformitel_dob_num = "{{Ответственный: Внутренний телефон}}";
$oformitel_mail = "{{Ответственный (e-mail)}}";

$set_company_doljnost = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119193" => $oformitel_doljnost));
$set_company_name = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119320" => $oformitel_name));
$set_company_lastname = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119341" => $oformitel_lastname));
$set_company_secondname = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119362" => $oformitel_secondname));
$set_company_workmobile = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119847" => $oformitel_workmobile));
$set_company_dob_num = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119886" => $oformitel_dob_num));
$set_company_mail = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598119977" => $oformitel_mail));
$set_company_fgisnumber = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1578993934380" => $fgis_number));
$set_company_deal_napravlenie = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271834" => $deal_napravlenie));
$set_company_deal_stadia = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271875" => $deal_stadia));
