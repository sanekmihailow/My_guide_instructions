<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

$deal_id = {{ID}};
$company_id = {{Компания: ID}};

$oformitel_deal = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_1583066448',$deal_id);
$otchet_deal = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_1584804508',$deal_id);
$deal_napravlenie = "{{Направление (текст)}}";
$deal_stadia = "{{Стадия сделки (текст)}}";

$count_otchet = count($otchet_deal, COUNT_RECURSIVE);

$set_company_oformitel = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1583066448" => $oformitel_deal));
$set_company_deal_napravlenie = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271834" => $deal_napravlenie));
$set_company_deal_stadia = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1598271875" => $deal_stadia));

if ($count_otchet = 5) {
    $set_company_otchet = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1584804508" => array(CFile::MakeFileArray($otchet_deal[0]),CFile::MakeFileArray($otchet_deal[1]),CFile::MakeFileArray($otchet_deal[2]),CFile::MakeFileArray($otchet_deal[3]),CFile::MakeFileArray($otchet_deal[4]))));
} else if ($count_otchet = 4) {
    $set_company_otchet = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1584804508" => array(CFile::MakeFileArray($otchet_deal[0]),CFile::MakeFileArray($otchet_deal[1]),CFile::MakeFileArray($otchet_deal[2]),CFile::MakeFileArray($otchet_deal[3]))));
} else if ($count_otchet = 3) {
    $set_company_otchet = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1584804508" => array(CFile::MakeFileArray($otchet_deal[0]),CFile::MakeFileArray($otchet_deal[1]),CFile::MakeFileArray($otchet_deal[2]))));
} else if ($count_otchet = 2) {
    $set_company_otchet = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1584804508" => array(CFile::MakeFileArray($otchet_deal[0]),CFile::MakeFileArray($otchet_deal[1]))));
} else {
    $set_company_otchet = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_1584804508" => array(CFile::MakeFileArray($otchet_deal[0]))));
}

//C - вариант лучше
/*
foreach ($otchet_deal as $id) {
	$doc = CFile::MakeFileArray($id);
	$arrayDoc[] = $doc;
}
$USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("$docfield" => $arrayDoc));
*/
