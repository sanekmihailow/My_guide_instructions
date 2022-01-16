<?php
header("Pragma: no-cache");// Никогда не кешируем ответ
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);

//reapath in $Document_root/local/My_Scripts/
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$USER->Authorize(1);
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
Loader::includeModule('crm');
Loader::includeModule('bizproc');

// ------------------- 1 Close deals -------------------

//--Const
$curDate = date("m/d/Y");
$arOrder = ['id' => 'desc'];
$arSelect = ["ID"];

$arFilterWeek = ['STAGE_ID' => 'C12:NEW'];
$arFilter_1 = ['TITLE' => '1.1 Поставщики сырья и матриалов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_2 = ['TITLE' => '1.2 ФОТ и налоги на ФОТ', 'STAGE_ID' => 'C11:NEW'];
$arFilter_3 = ['TITLE' => '1.3 Прочие налоги и сборы', 'STAGE_ID' => 'C11:NEW'];
$arFilter_4 = ['TITLE' => '2.1 Аренда', 'STAGE_ID' => 'C11:NEW'];
$arFilter_5 = ['TITLE' => '2.2 Реклама', 'STAGE_ID' => 'C11:NEW'];
$arFilter_6 = ['TITLE' => '2.3 Телефония', 'STAGE_ID' => 'C11:NEW'];
$arFilter_7 = ['TITLE' => '2.4 Выплаты по кредитам', 'STAGE_ID' => 'C11:NEW'];
$arFilter_8 = ['TITLE' => '2.5 Выплаты агентам и дизайнерам', 'STAGE_ID' => 'C11:NEW'];
$arFilter_9 = ['TITLE' => '2.6 Фонд кассовых разрывов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_10 = ['TITLE' => '2.7 PR-затраты и мероприятия', 'STAGE_ID' => 'C11:NEW'];
$arFilter_11 = ['TITLE' => '3.1 Фонд покупки инструментов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_12 = ['TITLE' => '3.2 Затраты на офис', 'STAGE_ID' => 'C11:NEW'];
$arFilter_13 = ['TITLE' => '3.3 Фонд развития', 'STAGE_ID' => 'C11:NEW'];
$arFilter_14 = ['TITLE' => '3.4 Корпоративные меропрития', 'STAGE_ID' => 'C11:NEW'];
$arFilter_15 = ['TITLE' => '3.5 Фонд бонусов членам Фин совета', 'STAGE_ID' => 'C11:NEW'];
$arFilter_16 = ['TITLE' => '3.6 Фонд обучения', 'STAGE_ID' => 'C11:NEW'];
$arFilter_17 = ['TITLE' => '4.1 Поставщики сырья и материалов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_18 = ['TITLE' => '4.2 Поставщики материалов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_19 = ['TITLE' => '4.3 ФОТ и налоги на ФОТ', 'STAGE_ID' => 'C11:NEW'];
$arFilter_20 = ['TITLE' => '4.4 Прочие налоги и сборы', 'STAGE_ID' => 'C11:NEW'];
$arFilter_21 = ['TITLE' => '4.5 Выпалата диведендов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_22 = ['TITLE' => '4.6 Инвестиции: закупка материала Трикотаж', 'STAGE_ID' => 'C11:NEW'];
$arFilter_23 = ['TITLE' => '5.1 Аренда', 'STAGE_ID' => 'C11:NEW'];
$arFilter_24 = ['TITLE' => '5.2 Реклама', 'STAGE_ID' => 'C11:NEW'];
$arFilter_25 = ['TITLE' => '5.3 Телефония', 'STAGE_ID' => 'C11:NEW'];
$arFilter_26 = ['TITLE' => '5.4 Выплаты по кредитам', 'STAGE_ID' => 'C11:NEW'];
$arFilter_27 = ['TITLE' => '5.5', 'STAGE_ID' => 'C11:NEW'];
$arFilter_28 = ['TITLE' => '5.6 Фонд кассовых разрывов', 'STAGE_ID' => 'C11:NEW'];
$arFilter_29 = ['TITLE' => '5.7 PR-затраты и мероприятия', 'STAGE_ID' => 'C11:NEW'];
$arFilter_30 = ['TITLE' => '6.1 Фонд покупки инструментов и оборудования', 'STAGE_ID' => 'C11:NEW'];
$arFilter_31 = ['TITLE' => '6.2 Затраты на офис', 'STAGE_ID' => 'C11:NEW'];
$arFilter_32 = ['TITLE' => '6.3 Фонд развития', 'STAGE_ID' => 'C11:NEW'];
$arFilter_33 = ['TITLE' => '6.4 Корпоративные мероприятия', 'STAGE_ID' => 'C11:NEW'];
$arFilter_34 = ['TITLE' => '6.5 Фонд бонусов членам Фин совета', 'STAGE_ID' => 'C11:NEW'];
$arFilter_35 = ['TITLE' => '6.6 Фонд обучения', 'STAGE_ID' => 'C11:NEW'];
//--

for ($i = 1; $i <= 35; $i++) {
  $arFilter = 'arFilter'; $arFilter .= '_' . $i;
  $arFilter0 = $$arFilter;
  $dbRes = CCrmDeal::GetList($arOrder, $arFilter0, false, false, $arSelect);
  $dbRes = $dbRes -> Fetch();
  $deals = $dbRes['ID'];
  $arrDeal[] = $deals;
}

foreach ($arrDeal as $st) {
  $deal_id = "$st";
  $arrDeal = CCrmDeal::GetByID($deal_id);
  $deal = new CCrmDeal($deal_id);
  $OldTitle = $arrDeal['TITLE'];
  $NewTitle = "$OldTitle"; $NewTitle .= "__$curDate";
  $SetTitle = [ "TITLE" => "$NewTitle" ];
  $SetStage = ['STAGE_ID' => 'C11:WON'];
  $UpdateTitle = $deal->Update($deal_id, $SetTitle);
  $FinishStage = $deal->Update($deal_id, $SetStage);
}


$dbRes = CCrmDeal::GetList($arOrder, $arFilterWeek, false, false, $arSelect);
$dbRes = $dbRes -> Fetch();
$deal_week = $dbRes['ID'];

$arrDealWeek = CCrmDeal::GetByID($deal_week);
$deal = new CCrmDeal($deal_week);
$OldTitleWeek = $arrDealWeek['TITLE'];
$NewTitleWeek = "$OldTitleWeek"; $NewTitleWeek .= "_$curDate";
$SetTitleWeek = [ "TITLE" => "$NewTitleWeek" ];
$SetStageWeek = ['STAGE_ID' => 'C12:WON'];
$UpdateTitleWeek = $deal->Update($deal_week, $SetTitleWeek);
$FinishWeek = $deal->Update($deal_week, $SetStageWeek);


// ------------------- 2 Start BP ----------------------

//--Const
$bizproc_id = 195;
$deal_id = 1046;
//--

$iblock_id = CIBlockElement::GetIBlockByID($deal_id);
$el = new CIBlockElement;
$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(),
  "IBLOCK_SECTION_ID" => false,
  "IBLOCK_ID"      => $iblock_id,/* идентификтор инфоблока (44)*/
  "ACTIVE"         => "Y",
  "NAME"           => "текст",
  "DETAIL_TEXT"    => "текст",
);

$PRODUCT_ID = $el->Add($arLoadProductArray, false, true, false);
$arErrorsTmp = array();

$wfStart = CBPDocument::StartWorkflow(
   $bizproc_id,/* идентификтор бизнес процесса */
   array("bizproc", "CBPVirtualDocument", $PRODUCT_ID),
   array_merge($arWorkflowParameters, array("TargetUser" => "user_".intval($GLOBALS["USER"]->GetID()))),
   $arErrorsTmp
);


?>
