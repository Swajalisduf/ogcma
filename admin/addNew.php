<?php
	include '../includes/src/app2.php';

$create = new Create;

if(isset($_GET)){
	$getData = $_GET;

	$authorDetails = [
		'author_given'		=>	$getData['author_given'],
		'author_surname'	=>	$getData['author_surname'],
		'author_date'		=>	$getData['author_date']
	];


	$getData['myth_id'] = $create->checkMyth($getData['myth']);
	$getData['author_id'] = $create->checkAuthor($authorDetails);	
	$getData['medium_id'] = $create->checkMedium($getData['medium']);
	$getData['genre_id'] = $create->checkGenre($getData['genre']);

	$bibliographies = $getData['bibliographies'];
	$newBibIDs = [];
	foreach ($bibliographies as $bibliography) {
		$newBibID = $create->addBibliography($bibliography);
		array_push($newBibIDs, $newBibID);
	};
	$getData['bibliographies'] = $newBibIDs;

	$notes = $getData['notes'];
	$newNoteIDs = [];
	foreach ($notes as $note) {
		$newNoteID =$create->addNote($note);
		array_push($newNoteIDs, $newNoteID);
	};
	$getData['notes'] = $newNoteIDs;

	$create->addEntry($getData);



	echo "

	{

			\"result\" : \"success\"

	}

	";
};
