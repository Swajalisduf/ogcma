<?php
class Update {
	public $connection;
	public function __construct() {
			$this->connection = Connect::init();
	}
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
					bc = :bc,
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
} // end Update
