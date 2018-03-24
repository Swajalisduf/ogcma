<?php
class Create{
	public $connection;
	public function __construct() {
			$this->connection = Connect::init();
	}

/****
CREATE FUNCTIONS
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
					$database = new Create;
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
					$database = new Create;
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
					$database = new Create;
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
				$database = new Create;
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
				$database = new Create;
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
				$database = new Create;
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
} //end Create class
