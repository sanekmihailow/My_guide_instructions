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
Loader::includeModule('bizproc');
use \Bitrix\Iblock;
use \Bitrix\Crm;

//#C- Const
$arOrder = ['ID' => 'DESC'];
$arSelect = ["ID"];
$arFilter_cheb = ['STAGE_ID' => '15'];
$arFilter_alm = ['STAGE_ID' => 'C3:9'];
$arFilter_krim = ['STAGE_ID' => 'C10:9'];
$arFilter_saransk = ['STAGE_ID' => 'C6:9'];
$arFilter_saratov1 = ['STAGE_ID' => 'C5:9'];
$arFilter_saratov2 = ['STAGE_ID' => 'C15:9'];
$arFilter_smolensk = ['STAGE_ID' => 'C7:9'];
$arFilter_yluyanovsk = ['STAGE_ID' => 'C9:4'];
$arFilter_pk = ['STAGE_ID' => 'C4:8'];
$arFilter_opr = ['STAGE_ID' => 'C11:4'];
$arFilter_teach = ['STAGE_ID' => 'C8:2'];
$arFilter_audit = ['STAGE_ID' => 'C12:2'];
$arFilter_autsors = ['STAGE_ID' => 'C13:2'];

$arr = [alm,krim,saransk,saratov2,smolensk];
$bizproc_id = 431;
//#-----

$dbRes_cheb = CCrmDeal::GetList($arOrder, $arFilter_cheb, $arSelect);
$dbRes_alm = CCrmDeal::GetList($arOrder, $arFilter_alm, $arSelect);
$dbRes_krim = CCrmDeal::GetList($arOrder, $arFilter_krim, $arSelect);
$dbRes_saransk = CCrmDeal::GetList($arOrder, $arFilter_saransk, $arSelect);
$dbRes_saratov1 = CCrmDeal::GetList($arOrder, $arFilter_saratov1, $arSelect);
$dbRes_saratov2 = CCrmDeal::GetList($arOrder, $arFilter_saratov2, $arSelect);
$dbRes_smolensk = CCrmDeal::GetList($arOrder, $arFilter_smolensk, $arSelect);
$dbRes_yluyanovsk = CCrmDeal::GetList($arOrder, $arFilter_yluyanovsk, $arSelect);
$dbRes_pk = CCrmDeal::GetList($arOrder, $arFilter_pk, $arSelect);
$dbRes_opr = CCrmDeal::GetList($arOrder, $arFilter_opr, $arSelect);
$dbRes_teach = CCrmDeal::GetList($arOrder, $arFilter_teach, $arSelect);
$dbRes_audit = CCrmDeal::GetList($arOrder, $arFilter_audit, $arSelect);
$dbRes_autsors = CCrmDeal::GetList($arOrder, $arFilter_autsors, $arSelect);

while($ar = $dbRes_cheb->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_alm->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_krim->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_saransk->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_saratov1->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_saratov2->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_smolensk->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_yluyanovsk->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_pk->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_opr->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_teach->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_audit->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}
while($ar = $dbRes_autsors->Fetch()){
    $ar = $ar['ID'];
    $arResult[] = $ar;
}




//#C - start bp Расчитаться

$count_id = count($arResult, COUNT_RECURSIVE);
for ($i = 0; $i < $count_id; $i++) {
    $deal_id = $arResult[$i];
    CBPDocument::StartWorkflow(
        $bizproc_id,
        array("crm","CCrmDocumentDeal", 'DEAL_'.$deal_id),
        array(),
        $arErrorsTmp
  );
}
//echo "count = $count_id";
//var_dump($arResult);
?>
