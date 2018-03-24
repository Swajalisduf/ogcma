<?php
	include '../includes/src/app2.php';

$option = '%' . $_GET['option'] . '%';
$read = new Read;
$usages = $read->getAllByParameter($option);

foreach($usages as $item){
	$case = "summary";
	$item->displayEntries($case);
};
