
// -- продажи - копировать товар в сделку лаборатории по типу товара
$rootActivity = $this->GetRootActivity();
use \Bitrix\Crm;
//--const
$dealId = {{ID}};
$CatSout = 302;
$CatPk = 300;
$CatOpr = 304;
$CatLearn = 301;
$CatLearnOoob = 309;
$CatLearnOoom = 310;
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
		$Catalog = CCatalogProduct::GetByIDEx($id);
		$SectionCatalog = $Catalog['IBLOCK_SECTION_ID'];
		if ($SectionCatalog == $CatSout) {
			$arProductSout[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatPk) {
			$arProductPK[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatOpr) {
			$arProductOpr[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatAudit) {
			$arProductAudit[] = $Catalog['ID'];
		}		
		if ($SectionCatalog == $CatAutsors) {
			$arProductAutsors[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatRad) {
			$arProductRad[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatLearn) {
			$arProductLearn[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatLearnOoob) {
			$arProductLearnOoob[] = $Catalog['ID'];
		}
		if ($SectionCatalog == $CatLearnOoom) {
			$arProductLearnOoom[] = $Catalog['ID'];
		}		
	}

    $arProductsLearn = array_merge($arProductLearn, $arProductLearnOoob);
    $arProductsLearn = array_merge($arProductsLearn, $arProductLearnOoom);

	$count_Sout = count($arProductSout);
	$count_PK = count($arProductPK);
	$count_Opr = count($arProductOpr);
	$count_Audit = count($arProductAudit);
	$count_Autsors = count($arProductAutsors);
	$count_Rad = count($arProductRad);
	$count_Learns = count($arProductsLearn);

	if ($count_Sout >= 1) {
		$SoutProduct = implode(',', $arProductSout);
        $rootActivity->SetVariable("ProdSout",$SoutProduct);
	}
	if ($count_PK >= 1) {
		$PKProduct = implode(',', $arProductPK);
        $rootActivity->SetVariable("ProdPK",$PKProduct);
	}
	if ($count_Opr >= 1) {
		$OprProduct = implode(',', $arProductOpr);
        $rootActivity->SetVariable("ProdOpr",$OprProduct);
	}
	if ($count_Audit >= 1) {
		$AuditProduct = implode(',', $arProductAudit);
        $rootActivity->SetVariable("ProdAudit",$AuditProduct);
	}
	if ($count_Autsors >= 1) {
		$AutsorsProduct = implode(',', $arProductAutsors);
        $rootActivity->SetVariable("ProdAutsors",$AutsorsProduct);
	}
	if ($count_Rad >= 1) {
		$RadProduct = implode(',', $arProductRad);
        $rootActivity->SetVariable("ProdRad",$RadProduct);
	}
	if ($count_Learns >= 1) {
		$LearnProducts = implode(',', $arProductsLearn);
        $rootActivity->SetVariable("ProdLearn",$LearnProducts);
	}
}
