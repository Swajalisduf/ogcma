<?php
	include 'includes/src/app.php';
	$title = null;
	$page = null;

	if(isset($_GET['title'])){
		$title = $_GET['title'];
	}

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<?=Header::getTitle($title, $page);?>
		
		<link href="css/reset.css" rel="stylesheet" type="text/css" />		
		<link href="css/general.css" rel="stylesheet" type="text/css" />
		<link href="css/index.css" rel="stylesheet" type="text/css" />
		<?=Header::getStyles($page);?>

		<script src="js/jquery-3.1.1.js"></script>
		<?=Header::getJavascripts($page);?>
		
	</head>
	<body>
		<header>
			<a href="index.php"><img src="images/ogcma_logo.png" alt="ogcma_logo"></a>
			<nav>
				<ul>
					<li id="browse">Browse</li>
					<li><a href="admin.php?page=admin">Admin</a></li>
					<li>About</li>					
				</ul>
			</nav>
		</header>
