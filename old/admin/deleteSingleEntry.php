<?php
	include '../includes/src/app2.php';

	$delete = new Delete;

	if (isset($_GET['id'])){
		$delete->deleteUsage($_GET['id']);
		echo "success";
	};
