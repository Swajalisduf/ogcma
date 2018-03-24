<?php
	require_once 'includes/partials/header.php';
?>

	<div id="container2">
			<img class='top-image' src='images/background_top_1300px.png' alt='background'>
		<?php
			require_once 'dialog_pages/adminLogin.php';
		?>
		<div id="options">
			<ul>
				<li>
					<a href="addUsage.php?page=addUsage">Add a Usage</a>
				</li>
				<li>
					<a href="view-database.php?page=view-database&title=View Database">View Entire Database</a>
				</li>
				<li>
					<a href="editor.php?page=editor&title=OGCMA+|+Edit+and+Tag">Edit and Tag</a>
				</li>
			</ul>
		</div>	
		
	</div>	

<?php
	require_once 'includes/partials/footer.php';
