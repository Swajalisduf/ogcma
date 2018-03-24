<?php
	include 'includes/src/app.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<?=Header::getTitle($_GET);?>
		
		<link href="css/reset.css" rel="stylesheet" type="text/css" />		
		<link href="css/general.css" rel="stylesheet" type="text/css" />
		<link href="css/index.css" rel="stylesheet" type="text/css" />
		<?=Header::getStyles($_GET["page"]);?>

		<script src="js/jquery-3.1.1.js"></script>
		<?=Header::getJavascripts($_GET["page"]);?>
		
	</head>
	<body>
		<div id="container">
			<div id="header">
				<a href="index.php"><img src="images/ogcma_logo.png" alt="ogcma_logo"></a>
				<div id="menu">
					<ul>
						<li id="browse">Browse</li>
						<li><a href="propose.php">Proposed<br>Entries</a></li>
						<li><a href="forum.php">Forums</a></li>
						<li><a href="admin.php?page=admin">Admin</a></li>
						<li>About</li>					
					</ul>
					<form action="all-search.php" method="post" name=allsearch>
						<input type="text" width=200px name=keywords placeholder="Search">
					</form>
					
				</div>
			</div>
