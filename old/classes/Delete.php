<?php
class Delete {
	public $connection;
	public function __construct() {
			$this->connection = Connect::init();
	}

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
} // end Delete class
