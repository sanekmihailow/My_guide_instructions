<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//global $USER_FIELD_MANAGER;
$lead_id = {{ID}};
$get_lead = CCrmLead::GetByID($lead_id);

$title = $get_lead[TITLE];
$pattern_incomming  = 'Исходящий';
//$pattern_outcomming  = 'Входящий';

if(preg_match("/$pattern_incomming/", $title)) {
    $sorce_tel = [ "SOURCE_ID" => "3" ]; // источник - исходящий
    $lead = new CCrmLead($lead_id);
    $lead->Update($lead_id, $sorce_tel);
}
