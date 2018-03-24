<?php
	include '../includes/src/app2.php';

$create = new Create;
$read = new Read;

$note = $_GET['note'];
$usage_id = $_GET['usage_id'];

$newNoteID = $create->addNote($note, $usage_id);
$notes = $read->getNotes($usage_id);
$i = count($notes);
?>

{
	"note_id"	:	"<?=$newNoteID?>",
	"note"		:	"",
	"i"			:	"<?=$i?>"
}
