<?
$rootActivity = $this->GetRootActivity();

$up = $rootActivity->GetVariable("rabmest_up");
$down = $rootActivity->GetVariable("rabmest_down");
$propis_up = Number2Word_Rus($up, 'N');
$propis_down = Number2Word_Rus($down, 'N');
$propis_up = trim($propis_up);
$propis_down = trim($propis_down);

$rootActivity->SetVariable("rabmest_up_propis",$propis_up);
$rootActivity->SetVariable("rabmest_down_propis",$propis_down);

