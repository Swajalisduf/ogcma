<?php
	include '../includes/src/app2.php';

$read = new Read;
$display = new Display;

if(isset($_GET)){
	$usage_id = $_GET['usage_id'];

	$usage = $read->getSingleEntry($usage_id);
	$bibliographies = $read->getBibliographies($usage_id);
	$notes = $read->getNotes($usage_id);
	$case = "detailed";
	
?>

	<table>

<?php

	$usage[0]->displayEntries($case);

	$i = 1;

	foreach($bibliographies as $bibliography) {

		$bibliography->displayBibliographies($i);

		$i++;
	};
?>
		<tr class="line2 hidden input">
			<td>Add Bibliography</td>
			<td>
				<input type="hidden" value="<?=$usage_id?>">
				<button class="addBib">&plus;</button>
			</td>
		</tr>
<?php

	$i = 1;

	foreach($notes as $note) {

		$display->displayNotes($i, $note);

		$i++;

	};

?>
		<tr class="line2 hidden input">
			<td>Add Note</td>
			<td>
				<input type="hidden" value="<?=$usage_id?>">
				<button class="addNote">&plus;</button>
			</td>
		</tr>
	</table>
<?php
};
