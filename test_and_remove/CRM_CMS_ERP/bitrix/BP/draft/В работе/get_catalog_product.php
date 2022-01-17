<?
// -- PHP код получить каталог товаров
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//--const
$dealId = {{ID}};
$CatSout = 302;
$CatPk = 300;
$CatOpr = 304;
$CatLearn = 301;
$CatLearn1 = 309;
$CatLearn2 = 310;
$CatAudit = 303;
$CatAutsors = 305;
$CatRad = 308;
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
    $count_catalogs = count($uniq_arr_catalog);
    if ($count_catalogs > 1) {
        if (in_array("$CatLearn", $uniq_arr_catalog) || in_array("$CatLearn1", $uniq_arr_catalog) || in_array("$CatLearn2", $uniq_arr_catalog) ){
            if (in_array("$CatSout", $uniq_arr_catalog) || in_array("$CatPk", $uniq_arr_catalog) || in_array("$CatOpr", $uniq_arr_catalog) || in_array("$CatAudit", $uniq_arr_catalog) || in_array("$CatAutsors", $uniq_arr_catalog) || in_array("$CatRad", $uniq_arr_catalog) ){
                $error = 'B';
                $rootActivity->SetVariable("ProductError",$error);
            }
            else {
                $catalognum = $uniq_arr_catalog[0];
                $rootActivity->SetVariable("CatalogNum",$catalognum);
            }
        }
		else {
			$error = 'B';
			$rootActivity->SetVariable("ProductError",$error);
		}
    }
    else {
        $catalognum = $uniq_arr_catalog[0];
        $rootActivity->SetVariable("CatalogNum",$catalognum);
    }
}
