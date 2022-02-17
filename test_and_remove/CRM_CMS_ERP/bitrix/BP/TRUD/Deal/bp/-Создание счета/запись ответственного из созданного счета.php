<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
$deal_id = {{ID}};

$arOrder = ["ID" => "DESC"]; // сортировка
$arFilter = ["UF_DEAL_ID" => $deal_id]; // фильтрация по ID сделки
$arSelect = ["ID", "UF_DEAL_ID", "CREATED_BY" ]; // какие поля выбрать
$invoices = CCrmInvoice::GetList($arOrder, $arFilter, false, false, $arSelect);

//GET DATA INVOICE ID 
while($invoice = $invoices->Fetch()) {
	ob_start();
	    echo "$invoice[ID]";
	    $id_invoice = ob_get_clean();
	    $arrInvoiceId[] = $id_invoice;
	ob_start();
	    echo "$invoice[CREATED_BY]";
	    $create_invoice = ob_get_clean();
	    $arrInvoiceCreate[] = $create_invoice;
}

$invoice_id = $arrInvoiceId[0];
$who_invoice_create = $arrInvoiceCreate[0];
$set_id_invoice = $rootActivity->SetVariable("id_invoice",$invoice_id);
$set_indeal_creator = $USER_FIELD_MANAGER->Update('CRM_DEAL', $deal_id, array("UF_TRUD_INCOICE_CREATOR" => $who_invoice_create));
//$set_invoice_create = $rootActivity->SetVariable("UserCreateInvoice",$who_invoice_create);
