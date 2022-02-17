<?php
header("Pragma: no-cache");// Никогда не кешируем ответ
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$USER->Authorize(135);
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule('crm');
use \Bitrix\Iblock;
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

//#C- Const
$arOrder = ['ID' => 'DESC'];
$arSelect = ["ID"];
$range_start = 2;
//#-----

$dbRes = CCrmCompany::GetList($arOrder, $arSelect);
$dbRes = $dbRes->Fetch();
$dbRes = $dbRes['ID'];
$range_end = $dbRes;

//$filename = __DIR__ . '/D.log';
//file_put_contents($filename, "$range_end\n");

for ($i = $range_start; $i <= $range_end; $i++) {
//for ($i = 2; $i < 1000; $i++) {
    $company_id = $i;
        //M- file_put_contents($filename, "$i\n", FILE_APPEND);
    //#C - get INN and city
    $get_company = CCrmCompany::GetByID($company_id);
    if (empty($get_company)) {
    } else {
        $Comp = $company_id;
        $req = new \Bitrix\Crm\EntityRequisite($company_id);
        $rs = $req->getList([
            "filter" => [
                "ENTITY_ID" => $company_id,
                "ENTITY_TYPE_ID" => CCrmOwnerType::Company,
                //'PRESET_ID' => 2
                ]
        ]);
        $row = $rs->fetch();
        $Inn = $row['RQ_INN'];

        $Address = Bitrix\Crm\EntityRequisite::getAddresses($row['ID']);
        $city_fiz = $address['1']['CITY'];
        $city_ur = $address['6']['CITY'];
        $province_fiz = $address['1']['PROVINCE'];
        $province_ur = $address['6']['PROVINCE'];
        $region_fiz = $address['1']['REGION'];
        $region_ur = $address['6']['REGION'];
        if ($city_ur !== '') {
                $gorod = $city_ur;
        } else if ($city_ur !== '') {
                $gorod = $city_fiz;
        } else if ($province_ur !== '') {
                $gorod = $province_ur;
        } else if ($province_fiz !== '') {
                $gorod = $province_fiz;
        } else if ($region_ur !== '') {
                $gorod = $region_ur;
        } else {
                $gorod = $region_fiz;
        }

        $Inn_stroka = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_COMPANY', 'UF_CRM_5A700BE102490',$company_id);
        $get_gorod_stroka = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_COMPANY', 'UF_CRM_5E981DCCE40AD',$company_id);

        //#C - Relation child deal on company
        $relation = \Bitrix\Crm\Service\Container::getInstance()->getRelationManager()->getRelation(
            new \Bitrix\Crm\RelationIdentifier(\CCrmOwnerType::Company,\CCrmOwnerType::Deal) //4,2
        );

        $Identifiers = $relation->getChildElements(
            $obj = new \Bitrix\Crm\ItemIdentifier(\CCrmOwnerType::Company,$company_id)
        );

        $count_identifiers = count($Identifiers);
        if (empty($count_identifiers)) {
        } else {
            for ($a = 0; $a <= $count_identifiers; $a++) {
                $GetNullAr = (array) $Identifiers[$a];
                $basicAr = array_values($GetNullAr);
                $idDealAr[] = $basicAr[1];
            }

            $count_iddeal = count($idDealAr);
            if (empty($count_iddeal)) {
            } else {
                foreach ($idDealAr as $id) {
                    $Inn_stroka_deal = $USER_FIELD_MANAGER->GetUserFieldValue('CRM_DEAL', 'UF_CRM_5A700BE102490',$id);
                    if ($Inn_stroka_deal == '') {
                        $Update_Inn_stroka_deal = $USER_FIELD_MANAGER->Update('CRM_DEAL', $id, array("UF_CRM_5A700BE102490" => $Inn));
                    }
                }
            }
        }
        if ($Inn_stroka == '') {
            $Update_Inn_stroka = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_5A700BE102490" => $Inn));
        }
        if ($get_gorod_stroka == '') {
            $set_gorod_stroka = $USER_FIELD_MANAGER->Update('CRM_COMPANY', $company_id, array("UF_CRM_5E981DCCE40AD" => $gorod));
        }
    }

}

?>
