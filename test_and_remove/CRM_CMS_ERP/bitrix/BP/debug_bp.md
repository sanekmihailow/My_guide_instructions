```php
$rootActivity = $this->GetRootActivity();
$documentId = $rootActivity->GetDocumentId();
AddMessage2Log("documentId: ".print_r($documentId,true),"crm_bp");
