<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
$lead_id = {{ID}};
$get_lead = CCrmLead::GetByID($lead_id);


//-workers  tel numbers
$list_tel_workers = ['89603054206', '+79687837374', '89033578988', '89060789482', '89093023240', '89613421770', '+79656884009', '+79876739548', '+79623212626', '+79093012950', '+79196716088', '+79530165768', '+79850485048', '89033578988', '+79050276559', '+79527580536'];
$count_tel = count($list_tel_workers, COUNT_RECURSIVE);
for ($i = 0; $i < $count_tel; $i++) {
    $list_tel_workers_cut[] = substr($list_tel_workers[$i],1);
}

//-NAME
$name = $get_lead[NAME];                    /*P*/
$last_name = $get_lead[LAST_NAME]; /*P*/
//-Title
$main_title = $get_lead[TITLE];
$main_title_cut = explode(" ", $main_title);
$title = $main_title_cut[2];  /*P*/
//$title_cut = substr($title,1);
//-inst
$arUserFields = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("CRM_LEAD", $lead_id);
$instagram = $arUserFields['UF_CRM_INSTAGRAM_WZ']['VALUE']; /*P*/

//#C- Check empty instagramm field and set instagram
if(empty($instagram)) {
        if(preg_match("/[a-zA-Z]+/", $name)) {
            $set_inst = $USER_FIELD_MANAGER->Update('CRM_LEAD', $lead_id, array("UF_CRM_INSTAGRAM_WZ" => $name));
        } elseif(preg_match("/[a-zA-Z]+/", $last_name)) {
            $set_inst = $USER_FIELD_MANAGER->Update('CRM_LEAD', $lead_id, array("UF_CRM_INSTAGRAM_WZ" => $last_name));
        } else {}
} else {}

$chto_delaem = '';
//#C - Check tel
if (preg_match("|^[0-9]{6,12}$|", $name)){
    $chto_delaem = 'proverka';
    $tel = 'name';
} elseif (preg_match("|^[0-9]{6,12}$|", $title)){
    $chto_delaem = 'proverka';
    $tel = 'title';
} 
else {}

//#C- Check tel workers
if ($chto_delaem == 'proverka'){
    $set_tel = $rootActivity->SetVariable("tel_veryfication",$name);
    for ($i = 0; $i < $count_tel; $i++) {
	    $tel_cut = $list_tel_workers_cut[$i];
	    if (strpos($name, $tel_cut) !== false) {
	        $why_select='del';
		    break;
	    } elseif (strpos($title, $tel_cut) !== false){
	        $why_select='del';
	        break;
	    } elseif ($tel == 'name') {
	        $set_tel = $rootActivity->SetVariable("tel_veryfication","+$name");
	    } elseif ($tel == 'title') {
	        $set_tel = $rootActivity->SetVariable("tel_veryfication","+$title");
	    } else {}
    }
} else {}

if ($why_select=='del') {
    $set_del = $rootActivity->SetVariable("Delete",'DA');
}
