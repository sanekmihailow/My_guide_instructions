<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;
$deal_id = {{ID}};

$arOrder = ["ID" => "DESC"]; // сортировка
$arFilter = ["UF_DEAL_ID" => $deal_id]; // фильтрация по ID сделки
$arSelect = ["ID", "UF_DEAL_ID", "DATE_BILL", "DATE_PAYED", "SUM_PAID", "STATUS_ID", "LOCK_STATUS", "DATE_LOCK", "EMP_STATUS_ID", "EMP_PAYED_ID", "PAY_VOUCHER_DATE"]; // какие поля выбрать
$invoices = CCrmInvoice::GetList($arOrder, $arFilter, false, false, $arSelect);

$rus_invoice_status_N = 'Создан';
$rus_invoice_status_1 = 'Постоплата';
$rus_invoice_status_P = 'Закрыт успешно';
$rus_invoice_status_D = 'Провалена оплата';

//GET DATA INVOICE ID and INVOICE STATUS ID
while($invoice = $invoices->Fetch()) {
	ob_start();
	    echo "$invoice[ID]";
	$id_invoice = ob_get_clean();
	$arrInvoiceIdChange[] = $id_invoice;
	$id_invoice_int = (int)$id_invoice;
	$arrInvoiceId[] = $id_invoice_int;
	ob_start();
	    echo "$invoice[STATUS_ID]";
	$status_invoice = ob_get_clean();
	$arrInvoiceStatus[] = $status_invoice;
    ob_start();
	    echo "$invoice[EMP_STATUS_ID]";
	$userchange_status_invoice = ob_get_clean();
	$arrChangeStatusInvoice[] = $userchange_status_invoice;
	ob_start();
	    echo "$invoice[EMP_PAYED_ID]";
	$userchange_pay_invoice = ob_get_clean();
	$arrChangePayInvoice[] = $userchange_pay_invoice;
}

$count_invoice_status = count($arrInvoiceStatus, COUNT_RECURSIVE);
$arInvalidStatus = [ "STATUS_ID" => "N" ];
for ($i = 0; $i < $count_invoice_status; $i++) {
	$invoice_status = $arrInvoiceStatus[$i];
	$invoice_id = $arrInvoiceIdChange[$i];
	$invoice_id_string = $arrInvoiceIdChange[$i];
	$invoice_status_change = $arrChangeStatusInvoice[$i];
	$invoice_pay_change = $arrChangePayInvoice[$i];
// Set user change status and user pay
	$set_change_user_status_invoice = $USER_FIELD_MANAGER->Update('CRM_INVOICE', $invoice_id, array("UF_INVOICE_CHANGE_STATUS" => $invoice_status_change));
	$set_change_user_pay_invoice = $USER_FIELD_MANAGER->Update('CRM_INVOICE', $invoice_id, array("UF_INVOICE_CHANGE_PAYED" => $invoice_pay_change));


    if ($invoice_status == 'P') {
        $rus_invoice_status = $rus_invoice_status_P;
    } else if ($invoice_status == 'D') {
        $rus_invoice_status = $rus_invoice_status_D;
    } else if ($invoice_status =='1') {
        $rus_invoice_status = $rus_invoice_status_1;
    } else $rus_invoice_status = $rus_invoice_status_N;
  
		$num_lma = "62";
		$num_1 = "1";
		$num_change_1c = "158";
    $mae="100";
    $boss_lab="118";


  if ($invoice_status == 'P' || $invoice_status == 'D') {
	if ($invoice_pay_change !== $num_lma && $invoice_pay_change !== $num_1 && $invoice_status_change !== $num_change_1c && $invoice_status_change !== $mae && $invoice_status_change !== $boss_lab && $invoice_status_change !== '' && $invoice_status_change !== NULL) {
       	    $invoice_status_invalid_user = new CCrmInvoice($invoice_id);
            $change_invoice_status_invalid_user = $invoice_status_invalid_user->Update($invoice_id, $arInvalidStatus);
            $rus_invoice_status = $rus_invoice_status_N;
 	    $link = '[url=https://bitrix.trud-rf.ru/crm/invoice/show/'; $link .= "$invoice_id_string"; $link .= '/]'; $link .= 'перейти к счету ID'; $link .= " $invoice_id_string"; $link .= '[/url]';
            $arrInvoiceIdInvalid[] = $link;
            $arrInvoicePayUserInvalid[] = $invoice_pay_change;
    	} 
   }
		$arrInvoiceStatusRus[] = $rus_invoice_status;
}


// SET DATA
$set_indeal_invoiceId = $USER_FIELD_MANAGER->Update('CRM_DEAL', $deal_id, array("UF_INDEAL_INVOICE_ID" => $arrInvoiceId));
$set_indeal_invoiceStat = $USER_FIELD_MANAGER->Update('CRM_DEAL', $deal_id, array("UF_INDEAL_INVOICE_STATUS" => $arrInvoiceStatusRus));
$set_invoice_stat = $rootActivity->SetVariable("status_invoice",$arrInvoiceStatusRus);
$set_invalid_invoice_to = $rootActivity->SetVariable("link_to_invoice",$arrInvoiceIdInvalid);
$set_invalid_user_invoicestatus = $rootActivity->SetVariable("invaliduser_status_invoice",$arrInvoiceStatusUserInvalid);
$set_invalid_user_invoicepay = $rootActivity->SetVariable("invaliduser_pay_invoice",$arrInvoicePayUserInvalid);
