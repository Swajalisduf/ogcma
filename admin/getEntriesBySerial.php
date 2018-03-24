<?php
	include '../includes/src/app2.php';

$option = $_GET['serialLetter'] . '%';
$read = new Read;
$usages = $read->getEntriesBySerial($option);

foreach($usages as $item){
	$case = "summary";
	$item->displayEntries($case);
};
