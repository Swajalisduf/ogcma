<?php
	require_once 'includes/partials/header.php';
	
	$read = new Read;
	$title = "heracles";
	$usages = $read->getTitles($title);
	//var_dump();
?>
<main>
	<img class='background-image' src='images/background_top_1300px.png' alt='background'>
			<div>
				<h1>Heracles</h1>
			</div>
				<?php
					foreach($usages as $item){
						$case = "titles";
						$item->displayEntries($case);
					};
				?>			
	</main>
<?php
require_once 'includes/partials/footer.php';

