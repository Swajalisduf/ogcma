<?php
	require_once 'includes/partials/header.php';
	
	$read = new Read;
	$title = "electra";
	$usages = $read->getTitles($title);
	
?>

	<main>
			<img class='background-image' src='images/background_top_1300px.png' alt='background'>
			<div>
				<h2>Electra</h2>
			</div>
			<div>
				<?php
						foreach($usages as $item){
							$case = "titles";
							$item->displayEntries($case);
						};
				?>
			</div>
	</main>
<?php
require_once 'includes/partials/footer.php';
