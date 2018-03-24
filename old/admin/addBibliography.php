<?php
	include '../includes/src/app2.php';

$create = new Create;
$read = new Read;

$bibliography = $_GET['bibliography'];
$usage_id = $_GET['usage_id'];

$newBibID = $create->addBibliography($bibliography, $usage_id);
$bibliographies = $read->getBibliographies($usage_id);
$i = count($bibliographies);
?>

{
	"bibliography_id"	:	"<?=$newBibID?>",
	"bibliography"		:	"",
	"i"					:	"<?=$i?>"
}
