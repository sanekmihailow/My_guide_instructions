<?
require_once("/var/www/bitrix_portal/public_html/local/MyFunctions/Bitrix_RestFunctions.php");
require_once("/var/www/bitrix_portal/public_html/local/MyFunctions/MyComfort_funtions.php");
$request = $_REQUEST;

$deal_id = $request['data']['FIELDS']['ID'];
$res = getEnity('crm.deal.get', $deal_id);
$arDeal = $res['result'];
$date_start =        $arDeal['BEGINDATE'];
$kolvo_days =        $arDeal['UF_CRM_1520316012'];
$date_Current_srok = $arDeal['UF_CRM_1601015507'];
$date_srok_compare = date(DateTime::W3C, strtotime($date_start. " + $kolvo_days days"));
$date_srok = date('Y-m-d', strtotime($date_start. " + $kolvo_days days"));
$str = http_build_query($date);

if ("$date_Current_srok" !== "$date_srok_compare") {
    $query_date = $date_srok . 'T03%3A00%3A00.321Z';
    $str = "id=11775&fields[UF_CRM_1601015507]=$query_date";
    enityUpdate('crm.deal.update', $deal_id, $str);
}
