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
		<!-- Don't forget the meta viewport element, that's what makes css work right on phones and other smaller devices. To learn more about how this works https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
			<nav>
				<div>
					<a href="index.php"><span class="logo"></span></a>
					<div class="hamburger">
						<div class="line1"></div>
						<div class="line2"></div>
						<div class="line3"></div>
					</div>
				</div>
				<ul>
					<li id="browse">Browse</li>
					<li><a href="admin.php?page=admin">Admin</a></li>
					<li>About</li>					
				</ul>
			</nav>
		</header>
