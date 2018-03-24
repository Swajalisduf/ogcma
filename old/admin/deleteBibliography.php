<?php
	include '../includes/src/app2.php';
	
	$delete = new Delete;

	if (isset($_GET['bibliography_id'])){
		$delete->deleteBibliography($_GET['bibliography_id']);
	};
