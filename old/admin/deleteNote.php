<?php
	include '../includes/src/app2.php';
		
	$delete = new Delete;

	if (isset($_GET['note_id'])){
		$delete->deleteNote($_GET['note_id']);
	};
