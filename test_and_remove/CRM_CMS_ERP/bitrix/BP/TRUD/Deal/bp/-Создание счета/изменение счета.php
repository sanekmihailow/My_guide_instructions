<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
global $USER_FIELD_MANAGER;

$deal_id = {{ID}};
$invoice_id = {=Variable:id_invoice};
$from = $rootActivity->GetVariable("why_are_you_from");

$arrInvoice = CCrmInvoice::GetByID($invoice_id);
$invoice_pay = $arrInvoice[PAY_SYSTEM_ID];
$invoice_mycompany = $arrInvoice[UF_MYCOMPANY_ID];

$cur_mycompany='';
$cur_pay='';
$mycompany_cheb = '4';
$mycompany_alm = '5730';

$pay_cheb = '2';
$pay_alm = '19';
$pay_krim = '20';
$pay_saransk = '21';
$pay_saratov1 = '22';
$pay_saratov2 = '33';
$pay_smolensk = '23';
$pay_ulyanovsk = '24';
$pay_simferopol = '34';

$arProducts = CAllCrmProductRow::LoadRows(D, $deal_id);
$count_products = count($arProducts);
if (empty($count_products)) {
	//#C- CHECK mycompany and pay system
	if ($from == 'Cheb'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_cheb ;
	} elseif ($from == 'Alm'){
		$cur_mycompany = $mycompany_alm;
		$cur_pay = $pay_alm;
	} elseif ($from == 'Krim'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_krim;
	} elseif ($from == 'Saransk'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_saransk;
	} elseif ($from == 'Saratov1'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_saratov1;
	} elseif ($from == 'Saratov2'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_saratov2;
	} elseif ($from == 'Smolensk'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_smolensk;
	} elseif ($from == 'Ulyanovsk'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_ulyanovsk;
	} elseif ($from == 'Simferopol'){
		$cur_mycompany = $mycompany_cheb;
		$cur_pay = $pay_simferopol;
	} else {}
}
//#C- SET mycompany and pay ------
//#C- Update pay
$invoice = new \CCrmInvoice( false );
$arUpdateData = ["PAY_SYSTEM_ID" => $cur_pay];
$UpdateInvoice = $invoice->Update($invoice_id, $arUpdateData, true, true, false);

//#C- Update mycompany
$set_invoice = $USER_FIELD_MANAGER->Update('CRM_INVOICE', $invoice_id, ["UF_MYCOMPANY_ID" => $cur_mycompany]);
