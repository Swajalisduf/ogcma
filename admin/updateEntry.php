<?php
	include '../includes/src/app2.php';

$create = new Create;
$read = new Read;
$update = new Update;

//gotta figure out how to filter the values that are coming up as a space (ctype_space for some reason isn't seeing it as whitespace so that argument isn't working) Having issues setting each item to null to.


//var_dump($_GET['title_type']);

if (!empty($_GET)){	

		$entryData = [
			"entry_number"			=>	$_GET['entry_number'],
			"type"					=>	$_GET['type'],
			"reid_pg" 				=>	$_GET['reid_pg'],
			"additional_artist" 	=>	$_GET['additional_artist'],
			"title" 				=>	$_GET['title'],
			"title_type" 			=>	$_GET['title_type'],
			"medium_id"				=>	$_GET['medium_id'],
			"genre_id"				=>	$_GET['genre_id'],
			"publication"			=>	$_GET['publication'],
			"owning"				=>	$_GET['owning'],
			"creation_date"			=>	$_GET['creation_date'],
			"premiere_date"			=>	$_GET['premiere_date'],
			"premiere_venue"		=>	$_GET['premiere_venue'],
			"ogcma_slide"			=>	$_GET['ogcma_slide'],
			"image_link"			=>	$_GET['image_link'],
			"other_link"			=>	$_GET['other_link'],
			"description"			=> 	$_GET['description'],
			"usage_id"				=>	$_GET['usage_id'],
			"myth_id"				=>	$_GET['myth_id']
		];

		$authorData = [
			"author_surname"	=>	$_GET['author_surname'],
			"author_given"		=>	$_GET['author_given'],
			"author_date"		=>	$_GET['author_date']
		];

		$bibliographies = $_GET['bibliographies'];
		$notes = $_GET['notes'];

		if(!empty($authorData)){
			$authorID = $create->checkAuthor($authorData);
			$entryData['author_id'] = $authorID;
		};

		if(!empty($_GET['medium']) && $_GET['genre'] != NULL){
			$mediumID = $create->checkMedium($_GET['medium']);
			$entryData['medium_id'] = $mediumID;
		};

		if(!empty($_GET['genre']) && $_GET['genre'] != NULL){
			$genreID = $create->checkGenre($_GET['genre']);
			$entryData['genre_id'] = $genreID;
		};

		if($_GET['myth'] !== $_GET['mythOriginal']){
			$entryData['myth_id'] = $create->checkMyth($_GET['myth']);

			if($_GET['type'] !== "1"){
				$entry_number = [
					"myth"	=>	$_GET['myth'],
					"type"	=>	$_GET['type']
				];

				$entryData['entry_number'] = $read->getEntryNumber($entry_number);
			}
		};

		if($_GET['type'] !== $_GET['typeOriginal']){
			if($_GET['type'] !== "1"){
				$entry_number = [
					"myth"	=>	$_GET['myth'],
					"type"	=>	$_GET['type']
				];

				$entryData['entry_number'] = $read->getEntryNumber($entry_number);
			}
		};

		if(!empty($bibliographies)){
			foreach($bibliographies as $bibliography){
				$update->updateBibliography($bibliography);
			};
		};

		if(!empty($notes)){
			foreach($notes as $note){
				$update->updateNote($note);	
			};
		};

		$update->updateEntry($entryData);
		echo $_GET['usage_id'];	
	
};

