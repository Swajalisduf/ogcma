<?php
class Read {
	public $connection;
	public function __construct() {
			$this->connection = Connect::init();
	}

/****
READ FUNCTIONS
****/
	//Need this method to return the filename of the pdf (don't return the .pdf extension just the name itself)
	public static function getPDF(){
		//I will create this function.
	}

	//Need this method needs to return the entire contents of a .txt file given the filename (this is why I don't want the getPDF() method to return the .pdf extension)
	public static function getTextContents($filename){

	}

	public function getEntryNumber($getData){
		try{
			$selectQuery = "
				SELECT 
					max(`entry_number`) 
				FROM 
					`usage`
				JOIN usage_myth
				ON usage.id = usage_myth.usage_id
				JOIN myths
				ON usage_myth.myth_id = myths.id
				WHERE myth = :myth AND type = :type
				ORDER BY `entry_number`
			";

			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(
					"myth"	=>	$getData['myth'],
					"type"	=>	$getData['type']
				)
			);
			
			$value = $statement->fetch();

			if($value[0] == null){
				$entry_number = 1;
			} else {
				$entry_number = $value[0] + 1;
			};

			return $entry_number;

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end getEntryNumber

	public function getEntries($options = []){
		$where_usage_id = ( isset($options['usage_id']) ) ? "WHERE usage.id=:usage_id" : null;
		
		$queryVariables = null;
		if ( isset($options['usage_id']) ) { $queryVariables["usage_id"] = $options["usage_id"]; }
		
		try {
			$selectQuery = "
				SELECT
					usage.id as usage_id,
					myths.id as myth_id,
					myths.myth,
					usage.type,
					usage.entry_number,
					usage.reid_pg,
					authors.id as author_id,
					authors.author_given,
					authors.author_surname,
					authors.author_date,
					usage.additional_artist,
					usage.title,
					mediums.id as medium_id,
					mediums.medium,
					genres.id as genre_id,
					genres.genre,
					usage.publication,
					usage.owning,
					usage.date_modifier,
					usage.creation_date,
					usage.bc,
					usage.premiere_date,
					usage.premiere_venue,
					usage.ogcma_slide,
					usage.image_link,
					usage.other_link,
					usage.description
				FROM
					`usage`
				LEFT JOIN mediums
				ON mediums.id = usage.medium_id
				LEFT JOIN genres
				ON genres.id = usage.genre_id
				JOIN usage_author
				ON usage.id = usage_author.usage_id
				JOIN authors
				ON usage_author.author_id = authors.id
				JOIN usage_myth
				ON usage.id = usage_myth.usage_id
				JOIN myths
				ON usage_myth.myth_id = myths.id
				{$where_usage_id}
				ORDER BY myths.myth, usage.type, usage.entry_number
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute($queryVariables);
			
			$entries = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $entries;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end getEntries

	public function getAllByParameter($option){
		$where = ( isset($option) ) 
			? "
			WHERE (myths.myth LIKE '{$option}')
			OR (`usage`.entry_number LIKE '{$option}')
			OR (`usage`.reid_pg LIKE '{$option}')
			OR (authors.author_given LIKE '{$option}')
			OR (authors.author_surname LIKE '{$option}')
			OR (authors.author_date LIKE '{$option}')
			OR (`usage`.additional_artist LIKE '{$option}')
			OR (`usage`.title LIKE '{$option}')
			OR (mediums.medium LIKE '{$option}')
			OR (genres.genre LIKE '{$option}')
			OR (`usage`.publication LIKE '{$option}')
			OR (`usage`.owning LIKE '{$option}')
			OR (`usage`.date_modifier LIKE '{$option}')
			OR (`usage`.creation_date LIKE '{$option}')
			OR (`usage`.bc LIKE '{$option}')
			OR (`usage`.premiere_date LIKE '{$option}')
			OR (`usage`.premiere_venue LIKE '{$option}')
			OR (`usage`.ogcma_slide LIKE '{$option}')
			OR (`usage`.image_link LIKE '{$option}')
			OR (`usage`.other_link LIKE '{$option}')
			OR (`usage`.description LIKE '{$option}')
			" 
			: null;

		try {
			$selectQuery = "
				SELECT
					`usage`.id as usage_id,
					myths.id as myth_id,
					myths.myth,
					`usage`.type,
					`usage`.entry_number,
					`usage`.reid_pg,
					authors.id as author_id,
					authors.author_given,
					authors.author_surname,
					authors.author_date,
					`usage`.additional_artist,
					`usage`.title,
					mediums.id as medium_id,
					mediums.medium,
					genres.id as genre_id,
					genres.genre,
					`usage`.publication,
					`usage`.owning,
					`usage`.date_modifier,
					`usage`.creation_date,
					`usage`.bc,
					`usage`.premiere_date,
					`usage`.premiere_venue,
					`usage`.ogcma_slide,
					`usage`.image_link,
					`usage`.other_link,
					`usage`.description
				FROM
					`usage`
				LEFT JOIN mediums
				ON mediums.id = `usage`.medium_id
				LEFT JOIN genres
				ON genres.id = `usage`.genre_id
				JOIN usage_author
				ON `usage`.id = usage_author.usage_id
				JOIN authors
				ON usage_author.author_id = authors.id
				JOIN usage_myth
				ON `usage`.id = usage_myth.usage_id
				JOIN myths
				ON usage_myth.myth_id = myths.id
				{$where}
				ORDER BY myths.myth, `usage`.type, `usage`.entry_number
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute();
			
			$entries = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $entries;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end getEntriesBySerial

	public function getEntriesBySerial($option){
		$where_serial = ( isset($option) ) ? "WHERE myths.myth LIKE :option" : null;

		try {
			$selectQuery = "
				SELECT
					usage.id as usage_id,
					myths.myth,
					usage.type,
					usage.entry_number,
					authors.id as author_id,
					authors.author_given,
					authors.author_surname,
					authors.author_date,
					usage.title
				FROM
					`usage`
				JOIN usage_author
				ON usage.id = usage_author.usage_id
				JOIN authors
				ON usage_author.author_id = authors.id
				JOIN usage_myth
				ON usage.id = usage_myth.usage_id
				JOIN myths
				ON usage_myth.myth_id = myths.id
				{$where_serial}
				ORDER BY myths.myth, usage.type, usage.entry_number
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
					array(
						":option" => $option
					)
				);
			
			$entries = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $entries;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end getEntriesBySerial

	public function getSingleEntry($usage_id){
		try {
			$selectQuery = "
				SELECT
					usage.id as usage_id,
					myths.id as myth_id,
					myths.myth,
					usage.type,
					usage.entry_number,
					usage.reid_pg,
					authors.id as author_id,
					authors.author_given,
					authors.author_surname,
					authors.author_date,
					usage.additional_artist,
					usage.title,
					mediums.id as medium_id,
					mediums.medium,
					genres.id as genre_id,
					genres.genre,
					usage.publication,
					usage.owning,
					usage.date_modifier,
					usage.creation_date,
					usage.bc,
					usage.premiere_date,
					usage.premiere_venue,
					usage.ogcma_slide,
					usage.image_link,
					usage.other_link,
					usage.description
				FROM
					`usage`
				LEFT JOIN mediums
				ON mediums.id = usage.medium_id
				LEFT JOIN genres
				ON genres.id = usage.genre_id
				JOIN usage_author
				ON usage.id = usage_author.usage_id
				JOIN authors
				ON usage_author.author_id = authors.id
				JOIN usage_myth
				ON usage.id = usage_myth.usage_id
				JOIN myths
				ON usage_myth.myth_id = myths.id
				WHERE usage.id = :usage_id
				ORDER BY myths.myth, usage.type, usage.entry_number
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
					array(
						"usage_id" => $usage_id
					)
				);
			
			$entry = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $entry;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getSingleEntry

	public function getMedium($medium_id){
		try{
			$selectQuery = "
				SELECT
					medium
				FROM
					mediums
				WHERE
					id = :medium_id
			";

			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(
					"medium_id" => $medium_id
				)
			);
			
			$value = $statement->fetch();

			return $value[0];

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getMedium

	public function getGenre($genre_id){
		try{
			$selectQuery = "
				SELECT
					genre
				FROM
					genres
				WHERE
					id = :genre_id
			";

			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(
					"genre_id" => $genre_id
				)
			);
			
			$value = $statement->fetch();

			return $value[0];

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getGenre

	//These functions are for getting everything for the purpose of datalists

	public function getMyths() {
		try {
		
			$selectQuery = "
				SELECT
					id AS myth_id,
					myth	
				FROM
					myths
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute();
			
			$myths = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $myths;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getMyths

	public function getMediums() {
		try {
		
			$selectQuery = "
				SELECT
					id AS medium_id,
					medium	
				FROM
					mediums
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute();
			
			$mediums = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $mediums;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getMediums

	public function getGenres() {
		try {
		
			$selectQuery = "
				SELECT
					id AS genre_id,
					genre	
				FROM
					genres
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute();
			
			$genres = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $genres;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getMediums

	public function getBibliographies($usage_id) {
		try {
		
			$selectQuery = "
				SELECT
					bibliographies.id as bibliography_id,
					bibliographies.bibliography	as bibliography
				FROM
					`usage`
				JOIN usage_bibliography
				ON usage.id = usage_bibliography.usage_id
				JOIN bibliographies
				ON bibliographies.id = usage_bibliography.bibliography_id
				WHERE usage.id = :usage_id
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array (
					'usage_id'	=>	$usage_id
				)
			);
			
			$bibliographies = $statement->fetchAll(PDO::FETCH_CLASS, "Display");
			
			return $bibliographies;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getBibliographies

	public function getNotes($usage_id) {
		try {
			$selectQuery = "
				SELECT
					notes.id as note_id,
					notes.note as note
				FROM
					`usage`
				JOIN usage_note
				ON usage.id = usage_note.usage_id
				JOIN notes
				ON notes.id = usage_note.note_id
				WHERE usage.id = :usage_id
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array (
					'usage_id'	=>	$usage_id
				)
			);
			
			$notes = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			return $notes;
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} // end getNotes
} // end Read class
