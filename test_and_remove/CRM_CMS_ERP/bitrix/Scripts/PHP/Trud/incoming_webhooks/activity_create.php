<?
require_once("/var/www/bitrix_portal/public_html/local/MyFunctions/Bitrix_RestFunctions.php");
require_once("/var/www/bitrix_portal/public_html/local/MyFunctions/MyComfort_funtions.php");
$request = $_REQUEST;

$activity_id = $request['data']['FIELDS']['ID'];
$res = getEnity('crm.activity.get', $activity_id);
$arActivty = $res['result'];
//$id = $arActivty['ID']; // id activity
$enity_id = $arActivty['OWNER_ID'];
$enity_type = $arActivty['OWNER_TYPE_ID'];
$activity_type = $arActivty['TYPE_ID'];
$provider_id = $arActivty['PROVIDER_ID'];
$provider_type = $arActivty['PROVIDER_TYPE_ID'];
$activity_subject = $arActivty['SUBJECT'];
$activity_completed = $arActivty['COMPLETED'];
$activity_assigned = $arActivty['RESPONSIBLE_ID'];
$activity_settings = $arActivty['SETTINGS'];
$activity_missed = '';
if ($activity_settings) {
    $activity_missed = $arActivty['SETTINGS'['MISSED_CALL']];
}

$activity_missed = $arActivty['SETTINGS'['MISSED_CALL']];
$subject = substr($activity_subject,0,21);
$pattern = "/^Входящий/";

if (preg_match("$pattern", $subject)) {
    if ($provider_type == 'CALL') {
        if ($activity_type == '2') {
                writeToLog($assigned_deal, "activity:$activity_assigned");
            if ($activity_completed == 'N') {
                if ($activity_missed) { // if bool true
                    $arDealId = [];
                    $resBindings = activityGetBindings('crm.activity.binding.list', $ar_id); //get all bindings activity
                    $arBindings = $resBindings['result'];
                    foreach ($arBindings as ["entityTypeId" => $entityTypeId, "entityId" => $entityId]) {
                        if ($entityTypeId == '2') { // check deal bindings
                            $arDealId[] = $entityId; // write deal_id
                        }
                    }

                    if (empty($arDealId)) {
                    } else {
                        foreach ($arDealId as $deal_id) {
                            $resD = getEnity('crm.deal.get', $deal_id);
                            $arDeal = $resD['result'];
                            $assigned_deal = $arDeal['ASSIGNED_BY_ID'];
                            if ($assigned_deal == $activity_assigned) { // check equals assigned activity and assigned deal
                                writeToLog($assigned_deal, "activity:$activity_assigned");
                            } else {
                                $typeId = '2';
                                activityUpdateBindings('crm.activity.binding.delete', $activity_id, $typeId, $deal_id); //delete wrong bindings in activity
                            }
                        }
                    }

                }
            }
        }
    }
}
