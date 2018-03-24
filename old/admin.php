<?php
	require_once 'includes/partials/header.php';
	require 'addUsageDialog.php';
?>
	<div id="container2">
			<img class='top-image' src='images/background_top_1300px.png' alt='background'>
		<div id="options">
			<ul>
				<li><a id="addUsageButton" style="cursor: pointer;">Add Usage</a></li>
				<li><a href="view-database.php?page=view-database&title=View Database">View Entire Database</a></li>
			</ul>
		</div>

		<script src="InputValidator.js" type="text/javascript"></script>
		<script src="InputCollector.js" type="text/javascript"></script>
		<script src="InputCreator.js" type="text/javascript"></script>
		<script src="js/addUsage/4_DialogManager.js" type="text/javascript"></script>
		<script src="addUsage.js" type="text/javascript"></script>

<?php
	require_once 'includes/partials/footer.php';
