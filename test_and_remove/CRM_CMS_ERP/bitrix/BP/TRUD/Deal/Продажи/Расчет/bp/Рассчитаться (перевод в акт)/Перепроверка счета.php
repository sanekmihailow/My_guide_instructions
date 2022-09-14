<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
$deal_id = {{ID}};

$change_user = '135';
$deal = CCrmDeal::GetByID($deal_id);
$modified = $deal['MODIFY_BY_ID'];
$change_stage = ($modified == $change_user) ? 'Yes' : 'No';
//$change_stage = '';
//if ($modified == $change_user) {
//    $change_stage = 'Yes';
//}

$rus_invoice_status_N = 'Создан';
$rus_invoice_status_1 = 'Постоплата';
$rus_invoice_status_P = 'Закрыт успешно';
$rus_invoice_status_D = 'Провалена оплата';
$arOrder = ["ID" => "DESC"]; // сортировка
$arFilter = ["UF_DEAL_ID" => $deal_id]; // фильтрация по ID сделки
$arSelect = ["ID", "UF_DEAL_ID", "STATUS_ID"]; // какие поля выбрать
$invoices = CCrmInvoice::GetList($arOrder, $arFilter, false, false, $arSelect);

//GET DATA INVOICE ID and INVOICE STATUS ID
while($invoice = $invoices->Fetch()) {
	ob_start();
	    echo "$invoice[ID]";
	$id_invoice = ob_get_clean();
	$arrInvoiceId[] = $id_invoice;
	ob_start();
	    echo "$invoice[STATUS_ID]";
	$status_invoice = ob_get_clean();
	$arrInvoiceStatus[] = $status_invoice;
}

$count_invoice_status = count($arrInvoiceStatus, COUNT_RECURSIVE);
for ($i = 0; $i < $count_invoice_status; $i++) {
	$invoice_status = $arrInvoiceStatus[$i];
	$invoice_id = $arrInvoiceId[$i];

    if ($invoice_status == 'P') {
        $rus_invoice_status = $rus_invoice_status_P;
    } else if ($invoice_status == 'D') {
        $rus_invoice_status = $rus_invoice_status_D;
    } else if ($invoice_status =='1') {
        $rus_invoice_status = $rus_invoice_status_1;
    } else $rus_invoice_status = $rus_invoice_status_N;
  
	$arrInvoiceStatusRus[] = $rus_invoice_status;
}

// SET DATA
$USER_FIELD_MANAGER->Update('CRM_DEAL', $deal_id, array("UF_INDEAL_INVOICE_ID" => $arrInvoiceId)); // set_indeal_invoiceId
$USER_FIELD_MANAGER->Update('CRM_DEAL', $deal_id, array("UF_INDEAL_INVOICE_STATUS" => $arrInvoiceStatusRus)); //set_indeal_invoiceStat
$rootActivity->SetVariable("bitrix_change_stage",$change_stage);
