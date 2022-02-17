<?
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//--const
$dealId = {{ID}};
$NumCatalog = 303;
//--

$arProducts = CCrmProductRow::LoadRows(D, $dealId);
$count_products = count($arProducts);

if (empty($count_products)) {
    $error = 'NoTovar';
    $rootActivity->SetVariable("ProductError",$error);
} 
else {
	$numcount = "$count_products" - 1;
	for ($i = 0; $i <= $numcount; $i++) {
		$Idproducts[] = $arProducts["$i"]['PRODUCT_ID'];
        $ID[] = $arProducts["$i"]['ID'];
	}
	foreach ($Idproducts as $id) {
		$arCatalog = CCatalogProduct::GetByIDEx($id);
		$arSectionCatalog[] = $arCatalog['IBLOCK_SECTION_ID'];
	}

    $arraysAll = ['IDs'=>$ID, 'Products'=>$Idproducts, 'Catalogs'=>$arSectionCatalog];
  
    for ($i = 0; $i <= $numcount; $i++) {
        $catalogid = $arraysAll['Catalogs'][$i];
        $product_basket_id = $arraysAll['IDs'][$i];
        if ($catalogid == "$NumCatalog"){
            $change_products[] = $product_basket_id;
        }
    }

    if (empty($count_products)) {
        $er = 'NoTovar';
    } else { 
        foreach ($change_products as $id) {
            $product_detail = CCrmProductRow::GetByID($id);
            $Product_id = $product_detail['PRODUCT_ID'];
            $Quanity = $product_detail['QUANTITY'];
            $Price = $product_detail['PRICE'];
            $product_rows[] = [
                            'PRODUCT_ID' => $Product_id,
                            'QUANTITY' => $Quanity,
                            'PRICE' => $Price
            ];
        }
        $res = CCrmProductRow::SaveRows('D', $dealId, $product_rows);
    }
}
