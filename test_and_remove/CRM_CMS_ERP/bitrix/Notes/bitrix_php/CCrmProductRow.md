```nginx
$ownerType - тип сущности (D,L,Q..)
$ownerID - id $ownerType, т.е. id сделки,лида... в самой сущности
$arRows - массив с данными, например:
```
```php
            $product_detail = CCrmProductRow::GetByID($id);
            $Product_id = $product_detail['PRODUCT_ID'];
            $Quanity = $product_detail['QUANTITY'];
            $Price = $product_detail['PRICE'];
            $product_rows[] = [
                            'PRODUCT_ID' => $Product_id,
                            'QUANTITY' => $Quanity,
                            'PRICE' => $Price
            ];

```
