<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//--const
$dealId = {{ID}};
$CatSout = 302;
//--

$arProducts = CAllCrmProductRow::LoadRows(D, $dealId);
$count_products = count($arProducts);

if (empty($count_products)) {
    $error = 'A';
    $rootActivity->SetVariable("ProductError",$error);
} 
else {
	$numcount = "$count_products" - 1;
	for ($i = 0; $i <= $numcount; $i++) {
		$Idproducts[] = $arProducts["$i"]['PRODUCT_ID'];
	}
	foreach ($Idproducts as $id) {
		$arCatalog = CCatalogProduct::GetByIDEx($id);
		$arSectionCatalog[] = $arCatalog['IBLOCK_SECTION_ID'];
	}
        $uniq_arr_catalog = array_unique($arSectionCatalog);
        sort($uniq_arr_catalog);
        if (in_array("$CatSout", $uniq_arr_catalog)) {
                $error = 'Sout';
                $rootActivity->SetVariable("ProductError",$error);
        }
}
