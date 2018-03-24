<?php
	include '../includes/src/app2.php';

$read = new Read;
$usages = $read->getEntries();

foreach($usages as $item){
	$case = "summary";
	$item->displayEntries($case);
};
