<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
use Bitrix\Main\Type\DateTime;
global $USER_FIELD_MANAGER;
$deal_id = {{ID}};

$arOrder = ["ID" => "DESC"]; // сортировка
$arFilter = ["UF_DEAL_ID" => $deal_id]; // фильтрация по ID сделки
$arSelect = ["ID", "UF_DEAL_ID", "STATUS_ID" ]; // какие поля выбрать
$invoices = CCrmInvoice::GetList($arOrder, $arFilter, false, false, $arSelect);
$date = date('d.m.Y');
$date_prosrochka = DateTime::createFromPhp(new \DateTime("$date"));
//$date_prosrochka = DateTime::createFromFormat('Y.m.d', $item['CREATED_DATE']);
//$set_date_prosrochka = date('d.m.Y', strtotime($date_prosrochka));


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
$arDateProsrochka = [ "UF_CRM_INVOICE_PROSROCHKA" => "$date_prosrochka" ];
for ($i = 0; $i < $count_invoice_status; $i++) {
	$invoice_status = $arrInvoiceStatus[$i];
	$invoice_id = $arrInvoiceId[$i];
// Check status payed invoice
  if ($invoice_status == 'N' || $invoice_status == '1') {
	    	$invoice_change = new CCrmInvoice($invoice_id);
            $change_date_prosrochka = $invoice_change->Update($invoice_id, $arDateProsrochka);
 	    	$link = '[url=https://bitrix.trud-rf.ru/crm/invoice/show/'; $link .= "$invoice_id"; $link .= '/]'; $link .= 'перейти к счету ID'; $link .= " $invoice_id"; $link .= '[/url]';
            $arrInvoiceIdInvalid[] = $link;
   }
}


// SET DATA
$set_invalid_invoice_to = $rootActivity->SetVariable("link_to_invoice",$arrInvoiceIdInvalid);
$set_invalid_invoice_to = $rootActivity->SetVariable("Current_date",$date_prosrochka);

