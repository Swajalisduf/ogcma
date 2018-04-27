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
		<script src="js/general.js"></script>
		<?=Header::getJavascripts($page);?>
		
	</head>
	<body>
		<header>
			<a href="index.php"><span class="logo"></span></a>
			<nav>
				<div class="hamburger">
					<div class="line-1"></div>
					<div class="line-2"></div>
					<div class="line-3"></div>
				</div>
				<ul>
					<li id="browse">Browse</li>
					<li><a href="admin.php?page=admin">Admin</a></li>
					<li>About</li>					
				</ul>
			</nav>
		</header>
