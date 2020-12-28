<?php
        $products = $soInstance->getProducts();
        $adjustment = $soInstance->get('txtAdjustment');
        $_REQUEST['totalProductCount'] = count($products);
        $_REQUEST['subtotal'] = $soInstance->get('hdnSubTotal');
        $_REQUEST['total'] = $soInstance->get('hdnGrandTotal');
        if ((float) $adjustment) {
            $_REQUEST['adjustmentType'] = ((float) $adjustment < 0) ? '-' : '+';
            $_REQUEST['adjustment'] = abs($adjustment);
        } else {
            $_REQUEST['adjustmentType'] = '';
            $_REQUEST['adjustment'] = '';
        }
        for ($i = 1; $i <= count($products); $i++) {
            $_REQUEST['hdnProductId' . $i] = $products[$i]['hdnProductId' . $i];
            $_REQUEST['lineItemType' . $i] = $products[$i]['lineItemType' . $i];
            $_REQUEST['subproduct_ids' . $i] = $products[$i]['subproduct_ids' . $i];
            $_REQUEST['comment' . $i] = $products[$i]['comment' . $i];
            $_REQUEST['qty' . $i] = $products[$i]['qty' . $i];
            $_REQUEST['purchaseCost' . $i] = $products[$i]['purchaseCost' . $i];
            $_REQUEST['margin' . $i] = $products[$i]['margin' . $i];
            $_REQUEST['listPrice' . $i] = $products[$i]['listPrice' . $i];
            $_REQUEST['discount_type' . $i] = $products[$i]['discount_type' . $i];
            $_REQUEST['discount' . $i] = $products[$i]['discount' . $i];
            $_REQUEST['discount_percentage' . $i] = $products[$i]['discount_percentage' . $i];
            $_REQUEST['discount_amount' . $i] = $products[$i]['discount_amount' . $i];
        }
