<?
$rootActivity = $this->GetRootActivity();
$kolvo=$rootActivity->GetVariable("kolvo_mest");
$srok=$rootActivity->GetVariable("srok_uslug");
$propis=Number2Word_Rus($kolvo, 'N');
$srok_propis=Number2Word_Rus($srok, 'N');
$propis = trim($propis);
$srok_propis =  trim($srok_propis);

$rootActivity->SetVariable("kolvo_propis",$propis); 
$rootActivity->SetVariable("srok_uslug_propis",$srok_propis);
