<?php
class Database {
	public $connection;
	public function __construct() {
			$this->connection = Connect::init();
	}
/****
ADD FUNCTIONS
****/
	//Checks to see if author already exists. If exists returns existing Author ID, if not then add's new author and returns author ID
	//IN ACTUAL WEBSITE CODE WILL NEED TO ADJUST THIS FUNCTION TO RETURN EXISTING AUTHOR ID INSTEAD OF ADDING NEW ENTRY

	public function checkAuthor($authorDetails){
		if(!isset($authorDetails["author_given"])){
			try {
				$selectQuery = "
					SELECT
						id,
						author_given,
						author_surname,
						author_date
					FROM
						authors
					WHERE author_surname LIKE :author_surname
				";
				
				$statement = $this->connection->prepare($selectQuery);
				$statement->execute(
					array(	
						"author_surname" 	=>	addslashes($authorDetails["author_surname"])
					)
				);
				
				$authorReturned = $statement->fetch(PDO::FETCH_ASSOC);

				if(
					empty($authorReturned["author_given"]) 
					&& empty($authorDetails["author_given"])
					&& $authorReturned["author_surname"] == $authorDetails["author_surname"]
					&& empty($authorReturned["author_date"])
					&& empty($authorDetails["author_date"])
				){
					$authorID = $authorReturned["id"];
					return $authorID;
				} else {
					$database = new Database;
					$newAuthorID = $database->addAuthor($authorDetails);
					return $newAuthorID;
				} 
			} catch( PDOException $error ) {
				echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
			} //end try/catch

		} else if(!isset($authorDetails["author_surname"])){
			try {
				$selectQuery = "
					SELECT
						id,
						author_given,
						author_surname,
						author_date
					FROM
						authors
					WHERE author_given LIKE :author_given
				";
				
				$statement = $this->connection->prepare($selectQuery);
				$statement->execute(
					array(	
						"author_given" 	=>	addslashes($authorDetails["author_given"])
					)
				);
				
				$authorReturned = $statement->fetch(PDO::FETCH_ASSOC);

				if(
					 $authorReturned["author_given"] == $authorDetails["author_given"]
					&& empty($authorReturned["author_surname"]) 
					&& empty($authorDetails["author_surname"])
					&& empty($authorReturned["author_date"])
					&& empty($authorDetails["author_date"])
				){
					$authorID = $authorReturned["id"];
					return $authorID;
				} else {
					$database = new Database;
					$newAuthorID = $database->addAuthor($authorDetails);
					return $newAuthorID;
				} 
			} catch( PDOException $error ) {
				echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
			} //end try/catch
		} else {

			try {
				$selectQuery = "
					SELECT
						id,
						author_given,
						author_surname,
						author_date
					FROM
						authors
					WHERE author_given LIKE :author_given
					AND author_surname LIKE :author_surname
				";
				
				$statement = $this->connection->prepare($selectQuery);
				$statement->execute(
					array(	
						"author_given" 		=>	addslashes($authorDetails["author_given"]),
						"author_surname" 	=>	addslashes($authorDetails["author_surname"])
					)
				);
				
				$authorReturned = $statement->fetch(PDO::FETCH_ASSOC);

				if(
					$authorReturned["author_given"] == $authorDetails["author_given"]
					&& $authorReturned["author_surname"] == $authorDetails["author_surname"]
					&& empty($authorReturned["author_date"])
					&& empty($authorDetails["author_date"])
					){
					$authorID = $authorReturned["id"];
					return $authorID;
				} elseif(
					$authorReturned["author_given"] == $authorDetails["author_given"]
					&& $authorReturned["author_surname"] == $authorDetails["author_surname"]
					&& $authorReturned["author_date"] == $authorDetails["author_date"]
				){
					$authorID = $authorReturned["id"];
					return $authorID;
				} else {
					$database = new Database;
					$newAuthorID = $database->addAuthor($authorDetails);
					return $newAuthorID;
				}

			} catch( PDOException $error ) {
				echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
			} //end try/catch
		} //end if
	} //end checkAuthor
	
	public function checkGenre($genre){
		$genre = strtolower($genre);
		$genre = trim($genre);
		try {
			$selectQuery = "
				SELECT
					id,
					genre
				FROM
					genres
				WHERE genre LIKE :genre
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(	
					"genre"	=>	addslashes($genre),
				)
			);
			
			$genreReturned = $statement->fetch(PDO::FETCH_ASSOC);

			if(!isset($genre)){
				$genreID = NULL;
				return $genreID;
			} else if($genreReturned["genre"] !== $genre){
				$database = new Database;
				$newGenreID = $database->addGenre($genre);
				return $newGenreID;
			} else if($genreReturned["genre"] == $genre){
				$genreID = $genreReturned["id"];
				return $genreID;
			} 

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end checkGenre

	public function checkMedium($medium){
		$medium = strtolower($medium);
		$medium = trim($medium);
		try {
			$selectQuery = "
				SELECT
					id,
					medium
				FROM
					mediums
				WHERE medium LIKE :medium
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(	
					"medium"	=>	addslashes($medium),
				)
			);
			
			$mediumReturned = $statement->fetch(PDO::FETCH_ASSOC);

			if(!isset($medium)){
				$mediumID = NULL;
				return $mediumID;
			} else if($mediumReturned["medium"] !== $medium) {
				$database = new Database;
				$newMediumID = $database->addMedium($medium);
				return $newMediumID;
			} else if($mediumReturned["medium"] == $medium){
				$mediumID = $mediumReturned["id"];
				return $mediumID;
			} 

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end checkMedium

	public function checkMyth($myth){
		try {
			$selectQuery = "
				SELECT
					id,
					myth
				FROM
					myths
				WHERE myth LIKE :myth
			";
			
			$statement = $this->connection->prepare($selectQuery);
			$statement->execute(
				array(	
					"myth"	=>	addslashes($myth)
				)
			);
			
			$mythReturned = $statement->fetch(PDO::FETCH_ASSOC);

			if($mythReturned["myth"] == $myth){
				$mythID = $mythReturned["id"];
				return $mythID;
			} else {
				$database = new Database;
				$newMythID = $database->addMyth($myth);
				return $newMythID;
			}

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end checkMyth

	public function addBibliography($bibliography, $usage_id = null){
		
		try {
			$addBibliography = "
				INSERT INTO bibliographies (
					bibliography
				)

				VALUES (
					:bibliography
				)
			";

			$statement = $this->connection->prepare($addBibliography);
			$statement->execute(
				array(	
					"bibliography"	=>	$bibliography
				)
			);
			
			$newBibliographyID = $this->connection->lastInsertId();
			
			if(isset($usage_id)){
				$addUsageBibliography = "
					INSERT INTO usage_bibliography (
						usage_id,
						bibliography_id
					)

					VALUES (
						:usage_id,
						:bibliography_id
					)
				";

				$fourth_statement = $this->connection->prepare($addUsageBibliography);
				$fourth_statement->execute(
						array(
							"usage_id" 			=> $usage_id,
							"bibliography_id"	=> $newBibliographyID
						)
				);
			};			

			return $newBibliographyID;
		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addBibliography

	public function addNote($note, $usage_id = null){
		try {
			$addNote = "
				INSERT INTO notes (
					note
				)

				VALUES (
					:note
				)
			";

			$statement = $this->connection->prepare($addNote);
			$statement->execute(
				array(	
					"note"	=>	$note
				)
			);

			$newNoteID = $this->connection->lastInsertId();

			if(isset($usage_id)){
				$addUsageNote = "
					INSERT INTO usage_note (
						usage_id,
						note_id
					)

					VALUES (
						:usage_id,
						:note_id
					)
				";

				$fifth_statement = $this->connection->prepare($addUsageNote);
				$fifth_statement->execute(
					array(
						"usage_id" 			=> $usage_id,
						"note_id"			=> $newNoteID
					)
				);
			};
			
			return $newNoteID;
		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addNote

	public function addAuthor($authorDetails){
		try {
		$addAuthor = "
			INSERT INTO authors (
				author_given,
				author_surname,
				author_date
			)

			VALUES (
				:author_given,
				:author_surname,
				:author_date
			)
		";

		$statement = $this->connection->prepare($addAuthor);
		$statement->execute(
			array(	
				"author_given" 		=>	$authorDetails["author_given"],
				"author_surname" 	=>	$authorDetails["author_surname"],
				"author_date" 		=>	$authorDetails["author_date"]
			)
		);

		$newAuthorID = $this->connection->lastInsertId();

		return $newAuthorID;

		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addAuthor

	public function addGenre($genre){
		try {
		$addGenre = "
			INSERT INTO genres (
				genre
			)

			VALUES (
				:genre
			)
		";

		$statement = $this->connection->prepare($addGenre);
		$statement->execute(
			array(	
				"genre"		=>	$genre
			)
		);

		$newGenreID = $this->connection->lastInsertId();

		return $newGenreID;
	
		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addGenre

	public function addMedium($medium){
		try {
		$addMedium = "
			INSERT INTO mediums (
				medium
			)

			VALUES (
				:medium
			)
		";

		$statement = $this->connection->prepare($addMedium);
		$statement->execute(
			array(	
				"medium"	=>	$medium
			)
		);

		$newMediumID = $this->connection->lastInsertId();

		return $newMediumID;
	
		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addMedium

	public function addMyth($myth){
		try {
		$addMyth = "
			INSERT INTO myths (
				myth
			)

			VALUES (
				:myth
			)
		";

		$statement = $this->connection->prepare($addMyth);
		$statement->execute(
			array(	
				"myth"	=>	$myth,
			)
		);

		$newMythID = $this->connection->lastInsertId();

		return $newMythID;
	
		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addMyth

	public function addEntry($getData){
		try {
		$addUsage = "
			INSERT INTO	`usage` (
				type,
				entry_number,
				reid_pg,
				additional_artist,
				title,
				medium_id,
				genre_id,
				z_factor,
				publication,
				owning,
				date_modifier,
				creation_date,
				bc,
				premiere_date,
				premiere_venue,
				ogcma_slide,
				image_link,
				other_link,
				description
			)
			
			VALUES (
				:type,
				:entry_number,
				:reid_pg,
				:additional_artist,
				:title,
				:medium_id,
				:genre_id,
				:z_factor,
				:publication,
				:owning,
				:date_modifier,
				:creation_date,
				:bc,
				:premiere_date,
				:premiere_venue,
				:ogcma_slide,
				:image_link,
				:other_link,
				:description
			)		
		";
			
		$first_statement = $this->connection->prepare($addUsage);
		$first_statement->execute(
			array(
				"type"					=>	$getData['type'],
				"entry_number" 			=>	$getData['entry_number'],
				"reid_pg" 				=>	$getData['reid_pg'],
				"additional_artist" 	=>	$getData['additional_artist'],
				"title" 				=>	$getData['title'],
				"medium_id"				=>	$getData['medium_id'],
				"genre_id"				=>	$getData['genre_id'],
				"z_factor"				=> 	$getData['z_factor'],
				"publication"			=>	$getData['publication'],
				"owning"				=>	$getData['owning'],
				"date_modifier"			=>	$getData['date_modifier'],
				"creation_date"			=>	$getData['creation_date'],
				"bc"					=> 	$getData['bc'],
				"premiere_date"			=>	$getData['premiere_date'],
				"premiere_venue"		=>	$getData['premiere_venue'],
				"ogcma_slide"			=>	$getData['ogcma_slide'],
				"image_link"			=>	$getData['image_link'],
				"other_link"			=>	$getData['other_link'],
				"description"			=> 	$getData['description']
			)
		);
		
		$newEntryID = $this->connection->lastInsertId();

		$addUsageAuthor = "
			INSERT INTO usage_author (
				usage_id,
				author_id
			)

			VALUES (
				:usage_id,
				:author_id
			)
		";

		$second_statement = $this->connection->prepare($addUsageAuthor);
		$second_statement->execute(
			array(	
				"usage_id" 				=>	$newEntryID,
				"author_id" 			=>	$getData['author_id']
			)
		);

		$addUsageMyth = "
			INSERT INTO usage_myth (
				usage_id,
				myth_id
			)

			VALUES (
				:usage_id,
				:myth_id
			)
		";

		$third_statement = $this->connection->prepare($addUsageMyth);
		$third_statement->execute(
			array(	
				"usage_id" 				=>	$newEntryID,
				"myth_id" 				=>	$getData['myth_id']
			)
		);
		
		$addUsageBibliography = "
			INSERT INTO usage_bibliography (
				usage_id,
				bibliography_id
			)

			VALUES (
				:usage_id,
				:bibliography_id
			)
		";

		$fourth_statement = $this->connection->prepare($addUsageBibliography);
		foreach($getData['bibliographies'] as $bibliography_id) {
			$fourth_statement->execute(
				array(
					"usage_id" 			=> $newEntryID,
					"bibliography_id"	=> $bibliography_id
				)
			);
		};

		$addUsageNote = "
			INSERT INTO usage_note (
				usage_id,
				note_id
			)

			VALUES (
				:usage_id,
				:note_id
			)
		";

		$fifth_statement = $this->connection->prepare($addUsageNote);
		foreach($getData['notes'] as $note_id) {
			$fifth_statement->execute(
				array(
					"usage_id" 			=> $newEntryID,
					"note_id"			=> $note_id
				)
			);
		};

		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end addEntry

/****
READ FUNCTIONS
****/
	
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
/****
DELETE FUNCTIONS
****/

	public function deleteUsage($usage_id){
		try {
			$deleteBibliographies = "
				DELETE bibliographies.* 
				FROM bibliographies
				JOIN usage_bibliography
				ON bibliographies.id = usage_bibliography.bibliography_id
				WHERE usage_bibliography.usage_id = :usage_id
			";

			$firstStatement = $this->connection->prepare($deleteBibliographies);
			$firstStatement->execute(
				array(	
					"usage_id"	=>	$usage_id
				)
			);

			$deleteUsageBibliography = "
				DELETE FROM usage_bibliography
				WHERE usage_bibliography.usage_id = :usage_id
			";

			$firstStatement = $this->connection->prepare($deleteUsageBibliography);
			$firstStatement->execute(
				array(	
					"usage_id"	=>	$usage_id
				)
			);

			$deleteNotes = "
				DELETE notes.* 
				FROM notes
				JOIN usage_note
				ON notes.id = usage_note.note_id
				WHERE usage_note.usage_id = :usage_id
			";

			$deleteUsageNote = "
				DELETE FROM usage_note
				WHERE usage_note.usage_id = :usage_id
			";

			$firstStatement = $this->connection->prepare($deleteUsageNote);
			$firstStatement->execute(
				array(	
					"usage_id"	=>	$usage_id
				)
			);

			$secondStatement = $this->connection->prepare($deleteNotes);
			$secondStatement->execute(
				array(	
					"usage_id"	=>	$usage_id
				)
			);

			$deleteUsage = "
				DELETE FROM `usage`
				WHERE id = :usage_id
				LIMIT 1
			";

			$statement = $this->connection->prepare($deleteUsage);
			$statement->execute(
				array(	
					"usage_id"	=>	$usage_id
				)
			);

		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}

	} // end deleteUsage

	public function deleteBibliography($bibliography_id){
		$deleteBibliography = "
			DELETE FROM bibliographies
			WHERE id = :bibliography_id
		";

		$firstStatement = $this->connection->prepare($deleteBibliography);
		$firstStatement->execute(
			array(	
				"bibliography_id"	=>	$bibliography_id
			)
		);

		$deleteUsageBibliography = "
			DELETE FROM usage_bibliography
			WHERE bibliography_id = :bibliography_id
		";

		$firstStatement = $this->connection->prepare($deleteUsageBibliography);
		$firstStatement->execute(
			array(	
				"bibliography_id"	=>	$bibliography_id
			)
		);
	}// end deleteBibliography

	public function deleteNote($note_id){
		$deleteNote = "
			DELETE FROM notes
			WHERE id = :note_id
		";

		$firstStatement = $this->connection->prepare($deleteNote);
		$firstStatement->execute(
			array(	
				"note_id"	=>	$note_id
			)
		);

		$deleteUsageBibliography = "
			DELETE FROM usage_note
			WHERE note_id = :note_id
		";

		$firstStatement = $this->connection->prepare($deleteUsageBibliography);
		$firstStatement->execute(
			array(	
				"note_id"	=>	$note_id
			)
		);
	}// end deleteBibliography
/****
UPDATE FUNCTIONS
****/
	public function updateEntry($getData){
		try {
			$updateUsage = "
				UPDATE
					`usage`
				SET
					type = :type,
					entry_number = :entry_number,
					reid_pg = :reid_pg,
					additional_artist = :additional_artist,
					title = :title,
					medium_id = :medium_id,
					genre_id = :genre_id,
					publication = :publication,
					owning = :owning,
					date_modifier = :date_modifier,
					creation_date = :creation_date,
					bc = :bc
					premiere_date = :premiere_date,
					premiere_venue = :premiere_venue,
					ogcma_slide = :ogcma_slide,
					image_link = :image_link,
					other_link = :other_link,
					description = :description
				WHERE 
					id = :usage_id	
					
			";
				
			$first_statement = $this->connection->prepare($updateUsage);
			$first_statement->execute(
				array(
					"type"					=>	$getData['type'],	
					"entry_number"			=>	$getData['entry_number'],		
					"reid_pg" 				=>	$getData['reid_pg'],
					"additional_artist" 	=>	$getData['additional_artist'],
					"title" 				=>	$getData['title'],
					"medium_id"				=>	$getData['medium_id'],
					"genre_id"				=>	$getData['genre_id'],
					"publication"			=>	$getData['publication'],
					"owning"				=>	$getData['owning'],
					"date_modifier"			=>	$getData['date_modifier'],
					"creation_date"			=>	$getData['creation_date'],
					"bc"					=>	$getData['bc'],
					"premiere_date"			=>	$getData['premiere_date'],
					"premiere_venue"		=>	$getData['premiere_venue'],
					"ogcma_slide"			=>	$getData['ogcma_slide'],
					"image_link"			=>	$getData['image_link'],
					"other_link"			=>	$getData['other_link'],
					"description"			=> 	$getData['description'],
					"usage_id"				=>	$getData['usage_id']
				)
			);
			
			$updateUsageAuthor = "
				UPDATE 
					usage_author
				SET
					author_id = :author_id
				WHERE usage_id = :usage_id
			";

			$second_statement = $this->connection->prepare($updateUsageAuthor);
			$second_statement->execute(
				array(	
					"usage_id" 				=>	$getData['usage_id'],
					"author_id" 			=>	$getData['author_id']
				)
			);
			
			$updateUsageMyth = "
				UPDATE 
					usage_myth
				SET
					myth_id = :myth_id
				WHERE usage_id = :usage_id
			";

			$third_statement = $this->connection->prepare($updateUsageMyth);
			$third_statement->execute(
				array(	
					"usage_id" 				=>	$getData['usage_id'],
					"myth_id" 				=>	$getData['myth_id']
				)
			);	
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		};
	} //end updateEntry
	
	public function updateBibliography($bibliography){
		try {
			$updateBibliography = "
				UPDATE bibliographies
				SET
					bibliography = :bibliography
				WHERE id = :bibliography_id
			";

			$fourth_statement = $this->connection->prepare($updateBibliography);
			$fourth_statement->execute(
				array(
					"bibliography"	 		=> $bibliography['bibliography'],
					"bibliography_id"		=> $bibliography['id']
				)
			);
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		};
	} //end updateBibliography
	
	public function updateNote($note){
		try {
			$updateNote = "
				UPDATE notes
				SET
					note = :note
				WHERE id = :note_id
			";

			$fourth_statement = $this->connection->prepare($updateNote);
			$fourth_statement->execute(
				array(
					"note"	 		=> $note['note'],
					"note_id"		=> $note['id']
				)
			);
		} catch( PDOException $error ) {
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		};
	} //end updateNote

//This is a leftover function from my first prototype but could still be useful in a grid format of all information.
	public function updateUsageColumn($usageDetails){
		try {
			$updateUsage = "
				UPDATE
					`usage`
				SET " .
					$usageDetails['column'] . " = :value
				WHERE
					id = :usage_id
			";

			$statement = $this->connection->prepare($updateUsage);
			$statement->execute(
				array(
					"value" 		=>	$usageDetails['value'],
					"usage_id"		=>	$usageDetails['usage_id']
				)
			);

			$selectUpdated = "
				SELECT "
				.

				$usageDetails['column']	

				. "
				FROM
					`usage`
				WHERE
					id = :usage_id
			";

			$secondStatement = $this->connection->prepare($selectUpdated);
			$secondStatement->execute(
				array(
					"usage_id"	=> 	$usageDetails['usage_id']
				)
			);

			$value = $secondStatement->fetch();

			return $value[0];

		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		}
	} //end updateUsageColumn

	public function updateMyth($usageDetails){
		try {
			$relationshipClear = "
				DELETE FROM 
					usage_myth
				WHERE
					usage_id = :usage_id
			";

			$statement = $this->connection->prepare($relationshipClear);
			$statement->execute(
				array(
					"usage_id"	=>	$usageDetails['usage_id']
				)
			);

			$relationshipRebuild = "
				INSERT INTO
					usage_myth
					(usage_id, myth_id)
				VALUES
					(:usage_id, :myth_id)
			";

			$secondStatement = $this->connection->prepare($relationshipRebuild);
			$secondStatement->execute(
				array(
					"usage_id"		=>	$usageDetails['usage_id'],
					"myth_id"		=>	$usageDetails['column_id']
				)
			);

			$selectUpdated = "
				SELECT "
				.

				$usageDetails['column']	

				. "
				FROM
					myths
				WHERE
					id = :myth_id
			";

			$thirdStatement = $this->connection->prepare($selectUpdated);
			$thirdStatement->execute(
				array(
					"myth_id"	=> 	$usageDetails['column_id']
				)
			);

			$value = $thirdStatement->fetch();

			return $value[0];

		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		};
	} //end updateMyth

	public function updateAuthorColumn($usageDetails){
		try {
			$updateAuthor = "
				UPDATE
					authors
				SET " .
					$usageDetails['column'] . " = :value
				WHERE
					id = :author_id
			";

			$statement = $this->connection->prepare($updateAuthor);
			$statement->execute(
				array(
					"value" 		=>	$usageDetails['value'],
					"author_id"		=>	$usageDetails['column_id']
				)
			);

			$selectUpdated = "
				SELECT "
				.

				$usageDetails['column']	

				. "
				FROM
					authors
				WHERE
					id = :author_id
			";

			$secondStatement = $this->connection->prepare($selectUpdated);
			$secondStatement->execute(
				array(
					"author_id"		=> 	$usageDetails['column_id']
				)
			);

			$value = $secondStatement->fetch();

			return $value[0];

		} catch(PDOException $error){
			echo "<p class='error'>ERROR: " . $error->getMessage() . "</p>";
		};
	} //end updateUsageColumn

} //end Database