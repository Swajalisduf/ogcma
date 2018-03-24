<?php

class Display {
	public $usage_id;
	public $myth_id;
	public $myth;
	public $type;
	public $entry_number;
	public $reid_pg;
	public $author_id;
	public $author_given;
	public $author_surname;
	public $author_date;
	public $additional_artist;
	public $title;
	public $medium_id;
	public $medium;
	public $genre_id;
	public $genre;
	public $publication;
	public $owning;
	public $date_modifier;
	public $creation_date;
	public $bc;
	public $premiere_date;
	public $premiere_venue;
	public $ogcma_slide;
	public $image_link;
	public $other_link;
	public $bibliography_id;
	public $bibliography;
	public $notes;
	public $description;

	public function displayEntries($case) {
			$ogcma_slide = $this->ogcma_slide;
			$image_link = $this->image_link;
			$other_link = $this->other_link;
			$type = $this->type;
			$title = htmlspecialchars($this->title, ENT_QUOTES);

			$length =strlen($this->entry_number); 

			if($length == 1){
				$number = "000" . $this->entry_number;
			} elseif ($length == 2){
				$number = "00" . $this->entry_number;
			} elseif ($length == 3){
				$number = "0" . $this->entry_number;
			} else {
				$number = $this->entry_number;
			}

			switch($case){
				case "summary":
					echo "
					<tr class=\"item_summary line2\">
						<td class=\"hidden\" title=\"{$this->usage_id}\"></td>
						<td class=\"tbody-first\">" . strtoupper($this->myth) . "&#8209;{$this->type}&#8209;{$number}</td>
						<td class=\"tbody-second\" title=\"title\">{$title}</td>
						<td class=\"tbody-third\">{$this->author_surname}, {$this->author_given} {$this->author_date}</td>
					</tr>
					";
				break;

				case "detailed":
					echo "
						<tr class=\"line2\">
							<td>Serial Number</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"entry_number\" value=\"{$this->entry_number}\"></td>
							<td>" . strtoupper($this->myth) . "&#8209;{$this->type}&#8209;{$number}</td>
						</tr>
						<tr>
							<td>Edit</td>
							<td><button class=\"edit-delete\" value=\"edit\">&#9998;</button>	<button class=\"hidden input save\" name=\"save_changes\" value=\"save\">Save Changes</button></td>
						</tr>
						<tr>
							<td>Delete</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"usage_id\" value=\"{$this->usage_id}\"></td>
							<td><button class=\"edit-delete\" value=\"delete\">&#10006;</button></td>
						</tr>
						<tr class=\"line2\">
							<td>View on Web Page</td>
							<td><a href=\"usage.php?usage_id={$this->usage_id}&title=Usage&page=usage\">Link</a></td>
						</tr>
						<tr class=\"line2\">
							<td>Type</td>
							<td class=\"hidden\"><input class=\"usageUpdate\" type=\"hidden\" name=\"typeOriginal\" value=\"{$this->type}\"></td>
							<td class=\"hidden input\">
								<span class=\"warningContainer\">
									<select class=\"usageUpdate type\" name=\"type\">
										<option value=\"0\">Ancient</option>
										<option value=\"1\">In Reid</option>
										<option value=\"2\">Not in Reid</option>
										<option value=\"3\">Reference</option>
									</select>
								</span>
							</td>
							<td  class=\"show\" title=\"type\">";

							if($type == 0){
								echo "Ancient";
							} elseif($type == 1){
								echo "In Reid";
							} elseif($type == 2){
								echo "Not in Reid";
							} elseif($type == 3){
								echo "Reference";
							};

							echo "</td>
						</tr>
						<tr class=\"hidden entry_number line2\">
							<td>Entry Number</td>
							<td><input type=\"text\" name=\"entry_number\"></td>
						</tr>
						<tr class=\"line2\">
							<td>Myth</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"myth_id\" value=\"{$this->myth_id}\"></td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"mythOriginal\" value=\"{$this->myth}\"></td>
							<td class=\"hidden input\">
								<span class=\"warningContainer\">
									<input class=\"usageUpdate\" type=\"text\" name=\"myth\" value=\"{$this->myth}\">
								</span>
							</td>
							
							<td class=\"show\" title=\"myth\">{$this->myth}</td>
						</tr>
						<tr class=\"line2\">
							<td>Title</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"title\" value=\"{$title}\"></td>
							<td class=\"show\" title=\"title\">{$title}</td>
						</tr>
						<tr class=\"line2\">
							<td>Author Surname</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"author_id\" value=\"{$this->author_id}\"></td>
							<!--Will need to use the checkAuthor() function to get id and check for existing value-->
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"author_surname\" value=\"{$this->author_surname}\"></td>
							<td class=\"show\" title=\"author_surname\">{$this->author_surname}</td>
						</tr>
						<tr class=\"line2\">
							<td>Author Given Names</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"author_given\" value=\"{$this->author_given}\"></td>
							<td class=\"show\" title=\"author_given\">{$this->author_given}</td>
						</tr>
						<tr class=\"line2\">
							<td>Author Date</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"author_date\" value=\"{$this->author_date}\"></td>
							<td class=\"show\" title=\"author_date\">{$this->author_date}</td>
						</tr>
						<tr class=\"line2\">
							<td>Page in Reid</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"reid_pg\" value=\"{$this->reid_pg}\"></td>
							<td class=\"show\" title=\"reid_pg\">{$this->reid_pg}</td>
						</tr>
						<tr class=\"line2\">
							<td>Additional Artist Information</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"additional_artist\" value=\"{$this->additional_artist}\"></td>
							<td class=\"show\" title=\"additional_artist\">{$this->additional_artist}</td>
						</tr>
						<tr class=\"line2\">
							<td>Medium</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"medium_id\" value=\"{$this->medium_id}\"></td>
							<!--Will need to use the checkMedium() function to get id and check for existing value-->
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"medium\" value=\"{$this->medium}\"></td>
							<td class=\"show\" title=\"medium\">{$this->medium}</td>
						</tr>
						<tr class=\"line2\">
							<td>Genre</td>
							<td class=\"hidden\"><input type=\"hidden\" class=\"usageUpdate\" name=\"genre_id\" value=\"{$this->genre_id}\"></td>
							<!--Will need to use the checkGenre() function to get id and check for existing value-->
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"genre\" value=\"{$this->genre}\"></td>
							<td class=\"show\" title=\"genre\">{$this->genre}</td>
						</tr>
						<tr class=\"line2\">
							<td>Publication</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"publication\" value=\"{$this->publication}\"></td>
							<td class=\"show\" title=\"publication\">{$this->publication}</td>
						</tr>
						<tr class=\"line2\">
							<td>Owning</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"owning\" value=\"{$this->owning}\"></td>
							<td class=\"show\" title=\"owning\">{$this->owning}</td>
						</tr>
						<tr class=\"line2\">
							<td>Creation Date</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"creation_date\" value=\"{$this->creation_date}\"></td>
							<td class=\"show\" title=\"creation_date\">{$this->creation_date}</td>
						</tr>
						<tr class=\"line2\">
							<td>Premiere Date</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"premiere_date\" value=\"{$this->premiere_date}\"></td>
							<td class=\"show\" title=\"premiere_date\">{$this->premiere_date}</td>
						</tr>
						<tr class=\"line2\">
							<td>Premiere Venue</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"premiere_venue\" value=\"{$this->premiere_venue}\"></td>
							<td class=\"show\" title=\"premiere_venue\">{$this->premiere_venue}</td>
						</tr>
						<tr class=\"line2\">
							<td>Description</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"description\" value=\"{$this->premiere_venue}\"></td>
							<td class=\"show\" title=\"description\">{$this->description}</td>
						</tr>			
						<tr class=\"line2\">
							<td>OGCMA Slide</td>
							<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"ogcma_slide\" value=\"{$this->ogcma_slide}\"></td>
							<td class=\"show\"><a class=\"hoverlink\" href=\"{$ogcma_slide}\" target=\"_blank\">Slide</a></td>
						</tr>
					";

						if(!empty($image_link)){
							echo "
								<tr class=\"line2\">
									<td>Image</td>
									<td class=\"hidden input\"><input class=\"usageUpdate\" type=\"text\" name=\"image_link\" value=\"{$this->image_link}\"></td>
									<td class=\"show\"><a class=\"hoverlink\" href=\"{$image_link}\" target=\"_blank\">Link</a></td>
								</tr>

							";
						}; //end if	
				break;
				
				case "usage":
					//Used to display usage information on usage.php
		
					echo "
						<h1>{$this->title}</h1>
							<h2>
						";
						
						if(!empty($this->medium)){
							echo $this->medium . " / ";
						};
						
						if(!empty($this->genre)){
							echo $this->genre . " / ";
						};
						
					echo "
						{$this->author_surname}, {$this->author_given}
						";
						
						if(!empty($this->author_date)){
							echo ", " . $this->author_date;
						};
					echo "
						</h2>
						<p class=\"info\">" . strtoupper($this->myth) . "&#8209;{$this->type}&#8209;{$number}
						";
				 
					if(!empty($this->publication)){ 
						echo $this->publication . ";";
					}

					echo "</p>";

					if(!empty($this->owning)){ 
						echo "<p class=\"info\">" . $this->owning . ";</p>";
					}
					if(!empty($this->premiere_date) && !empty($this->premiere_venue)){ 
						echo "<p class=\"info\">Premiere: " . $this->premiere_venue . ", " . $this->premiere_date . "</p>";
					}
		 
					echo "
							<div class=\"line2\"></div>
							<div class=\"half\">
							<p>{$this->description}</p>
					";
				
	
				break;
			}				
	} // end displayEntries


	//Going to need to convert this and the other displayBibliographies2 into a switch case if time permits
	public function displayBibliographies($i){
			echo "
				<tr class=\"line2\">
					<td>Bibliography {$i}</td>
					<td class=\"hidden\"><input type=\"hidden\" class=\"bibliographyUpdate\" name=\"bibliography_id\" value=\"{$this->bibliography_id}\"></td>
					<td class=\"hidden input\"><input class=\"bibliographyUpdate\" type=\"text\" name=\"bibliography\" value=\"{$this->bibliography}\"><button class=\"bib-delete\" value=\"delete\">&#10006;</button></td>
					<td class=\"show\" title=\"bibliography\">{$this->bibliography}</td>
				</tr>
			";
	} //end displayBibliographies
	
	public function displayBibliography(){
		echo "<li class=\"hidden\">{$this->bibliography_id}</li>";
		echo "<li>{$this->bibliography}</li>";
	} //end displayBibliographies2

	public function displayNotes($i, $notes){
		if(!empty($notes)){
		echo "
			<tr class=\"line2\">
				<td>Note {$i}</td>
				<td class=\"hidden\"><input type=\"hidden\" class=\"noteUpdate\" name=\"note_id\" value=\"{$notes['note_id']}\"></td>
				<td class=\"hidden input\"><input class=\"noteUpdate\" type=\"text\" name=\"note\" value=\"{$notes['note']}\"><button class=\"note-delete\" value=\"delete\">&#10006;</button></td>
				<td class=\"show\" title=\"note\">{$notes['note']}</td>
			</tr>
		";
		}
	} //end displayNotes

	public function displayMyth() {
		$selected = ($match == $this->myth_id) ? " selected" : null;

		echo "
			<option value='{$this->myth}'{$selected}>
		";
	}

	public function displayMedium() {
		$selected = ($match == $this->medium_id) ? " selected" : null;

		echo "
			<option value='{$this->medium}'{$selected}>
		";
	}

	public function displayGenre() {
		$selected = ($match == $this->genre_id) ? " selected" : null;

		echo "
			<option value='{$this->genre}'{$selected}>
		";
	}
} //end Display
