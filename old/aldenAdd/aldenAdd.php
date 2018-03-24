<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="aldenAdd.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="favicon.png">
	<script src="js/InputValidator.js"></script>
	<script src="js/InputCollector.js"></script>
	<script src="js/InputCreator.js"></script>
	<script src="js/DialogManager.js"></script>
	<script src="js/aldenAdd.js"></script>


	<title>Alden's Add page</title>
</head>
<body>
	<header>
		<p class="addButton">Add Usage</p>
		<p class="viewButton">View Entry</p>
	</header>
	<img src="background.png">
	<div class="dialog">
		<div class="dialog-content">
			<form>
				<div class="enter-myth-page page">
					<?php require "dialog_pages/enterMyth.php"; ?>
				</div>
				<div class="enter-reid-info-page page">
					<?php require "dialog_pages/enterReidInfo.php"; ?>
				</div>
				<div class="enter-title-page page">
					<?php require "dialog_pages/enterTitle.php"; ?>
				</div>
				<div class="enter-creation-date page">
					<?php require "dialog_pages/creationDate.php"; ?>
				</div>
				<div class="enter-author-page page">
					<?php require "dialog_pages/enterAuthor.php"; ?>
					<p>Please enter information according to how the author is documented in the Library of Congress <a class="red" href="http://id.loc.gov" target="_blank">LC Name Authority File</a>.<p>
				</div>
				<div class="enter-publication-page page">
					<?php require "dialog_pages/enterPublication.php"; ?>
				</div>
				<div class="enter-bibliography-page page">
					<?php require "dialog_pages/enterBibliography.php"; ?>
				</div>
				<div class="enter-note-page page">
					<?php require "dialog_pages/enterNote.php"; ?>
				</div>
				<div class="enter-description-page page">
					<?php require "dialog_pages/enterDescription.php"; ?>
				</div>
				<div class="summary-page page">
					<?php require "dialog_pages/summary.php"; ?>
				</div>
			</form>
			<div class="buttons">
				<button class="back-button">Cancel</button>
				<button class="next-button">Next</button>
			</div>
		</div>
	</div>
</body>
</html>
