<?
require_once("/var/www/bitrix/local/Functions/Bitrix_RestFunctions.php");
require_once("/var/www/bitrix/local/Functions/MyComfort_functions.php");
$request = $_REQUEST;
//writeToLog($request, 'Invoice_incomming');

$invoice_id = $request['data']['FIELDS']['ID'];
$res = getInvoice('crm.invoice.get', $invoice_id);
  //$arr = json_decode($res,true);
  //$arInvoice = $arr['result'];
$arInvoice = $res['result'];
$status = $arInvoice['STATUS_ID'];
$user_changed = $arInvoice['EMP_STATUS_ID'];
$user_payed = $arInvoice['EMP_PAYED_ID'];
$user_assigned = $arInvoice['RESPONSIBLE_ID'];

$InvalidStatus = 'fields%5BSTATUS_ID%5D=N';
$num_lma = '62'; $num_1 = '1'; $num_change_1c = '158'; $mae='100'; $boss_lab='118';

//echo $user_payed;
if ($status == 'P' || $status == 'D') {

    if ($user_payed !== $num_lma && $user_payed !== $num_1 && $user_payed !== $mae) {
        invoiceUpdate('crm.invoice.update', $invoice_id, $InvalidStatus);
        $message[] = "Зафиксирована попытка самовольно завершения счета, либо изменение уже оплаченного счета. Счет id:$invoice_id";
        $converted_message = http_build_query($message);
        $converted_message = substr($converted_message, 2);
        postToChat($user_payed, $converted_message, 'Y');
    }
    else {

        if ($status == 'P') {
            $link = '[url=https://bitrix.trud-rf.ru/crm/invoice/show/';
            $link .= "$invoice_id"; $link .= '/]'; $link .= 'Cчет был оплачен, перейти к счету ID'; $link .= " $invoice_id"; $link .= '[/url]';
            $message[] = $link;
            $converted_message = http_build_query($message);
            $converted_message = substr($converted_message, 2);
            postToChat($user_assigned, $converted_message, 'Y');
        }
    }

}
