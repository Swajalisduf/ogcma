<?php
	require_once 'includes/partials/header.php';
	
	$read = new Read;
	var_dump($read);
	$usage = "electra";
	$info = $read->getTitles($usage);
	var_dump($info);
?>

	<main>
			<img class='background-image' src='images/background_top_1300px.png' alt='background'>
			<div>
				<?php
						foreach($info as $item){
							$case = "info";
							$item->displayEntries($case);
						};
				?>
			</div>
	</main>
<?php
require_once 'includes/partials/footer.php';
