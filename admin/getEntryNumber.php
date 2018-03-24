<?php
	include '../includes/src/app2.php';

$read = new Read;
$entry_number = $read->getEntryNumber($_GET);

echo "
	{
		\"result\"			:	\"success\",
		\"entry_number\"	:	{$entry_number}
	}
";
