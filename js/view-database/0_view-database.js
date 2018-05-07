//This file may present a file with the auto-write setup that I have in includes/partials/header.php

//This is because if it loads the file that executes it before either of the classes it won't execute properly

class Database {
	getEntriesBySerial(e){
		let target = e.target;
		$(target).siblings().css('background-color', '#f8f8f8')
		$(target).css('background-color', '#a9a9a9')
		let getData = { 'serialLetter' : target.innerHTML };
		
		$.get( "admin/getEntriesBySerial.php", getData, function(data) {				
			$('.sum_body').html(data);
			const database = new Database;
			database.getFirstEntry();	
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	} //end getEntriesBySerial
	
	allSearch(search_param){
		let getData = { 'option' : search_param };
		$.get("admin/getAllByParameter.php", getData, function(data){
			$('.sum_body').html(data);
			const database = new Database;
			database.getFirstEntry();
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	}

	getFirstEntry(){
		let firstItem = $('.item_summary:first-of-type');
		let getData = { 'usage_id': firstItem[0].firstElementChild.title};
		$(firstItem).css('background-color', '#a9a9a9');
		$.get( "admin/getSingleEntry.php", getData, function(data) {				
			$('.details').removeClass('hidden');
			$('.details').html(data);
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	} //end getFirstEntry
	
	getSingleEntry(e){
		let target = e.currentTarget;
		$(target).siblings().css('background-color', '#F9E7CD');
		$(target).css('background-color', '#a9a9a9');
		var getData = { 'usage_id' : e.currentTarget.firstElementChild.title };
		
		$.get( "admin/getSingleEntry.php", getData, function(data) {				
			$('.details').removeClass('hidden');
			$('.details').html(data);
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	} //end getSingleEntry

	getEntrySummaries(usage_id){
		$.get( "admin/getEntrySummaries.php", function(data) {				
			$('.sum_body').html(data);
			const target = document.querySelector(`td.hidden[title="${usage_id}"]`);
			$(target.parentElement).css('background-color', '#a9a9a9');
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	} //end getEntrySummaries

	getUpdatedSingleEntry(usage_id){
		var getData = { 'usage_id' : usage_id };
		const database = new Database;
		database.getEntrySummaries(usage_id);

		$.get( "admin/getSingleEntry.php", getData, function(data) {				
			$('.details').removeClass('hidden');
			$('.details').html(data);
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		}); //end get
	} //end getUpdatedSingleEntry
	
	deleteSingleEntry(usage_id){
		let result = confirm("Are you sure you want to delete this usage?");
			if (result == true) {
				let getData = {	id : usage_id };
				$.get( "admin/deleteSingleEntry.php", getData, function(data) {
					if(data == "success"){
						window.location.reload(true);
						alert("Delete Successful");
					} else {
						alert("Delete Unsuccessful");
					}; //end if
				}).fail(function(err){
					alert(`${err['status']}: ${err['statusText']}`);
				}); //end get
			}; //end if	
	} //end deleteSingleEntry

	updateEntry(getData){
		$.get('admin/updateEntry.php', getData, function(data){
			$('.detailed .input').addClass('hidden');
			$('.detailed td.show').removeClass('hidden');
			const usage_id = data;
			const database = new Database;
			database.getUpdatedSingleEntry(usage_id);
			//Still need to figure out how to get it to focus on a newly generated entry.
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		});
	} //end updateEntry
	
	createNewBib(usage_id, lastElement){
		const placeholder = "Please insert bibliographic information.";
		const getData = {};

		getData['bibliography'] = placeholder;
		getData['usage_id'] = usage_id;

		//console.log(getData);

		$.getJSON('admin/addBibliography.php', getData, function(data){
			const newBib = document.createElement('tr');
			newBib.classList.add('line2');
			newBib.innerHTML = `
				<td>Bibliography ${data['i']}</td>
				<td class="hidden"><input type="hidden" class="bibliographyUpdate" name="bibliography_id" value="${data['bibliography_id']}"></td>
				<td class="input"><input class="bibliographyUpdate" type="text" name="bibliography" value="${data['bibliography']}"><button class=\"bib-delete\" value=\"delete\">&#10006;</button</td>			
				`;
			lastElement.after(newBib);
			newBib.focus();
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		});
	} //end createNewBib

	createNewNote(usage_id, lastElement){
		const placeholder = "Please insert note.";
		const getData = {};

		getData['note'] = placeholder;
		getData['usage_id'] = usage_id;

		//console.log(getData);

		$.getJSON('admin/addNote.php', getData, function(data){
			const newNote = document.createElement('tr');
			newNote.classList.add('line2');
			newNote.innerHTML = `
				<td>Note ${data['i']}</td>
				<td class="hidden"><input type="hidden" class="noteUpdate" name="note_id" value="${data['note_id']}"></td>
				<td class="input"><input class="noteUpdate" type="text" name="note" value="${data['note']}"><button class=\"note-delete\" value=\"delete\">&#10006;</button</td>			
				`;
			lastElement.after(newNote);
			newNote.focus();
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		});
	} //end createNewNote

	deleteBibliography(bibliography_id, element){
		const getData = {};
		getData['bibliography_id'] = bibliography_id;
		$.get('admin/deleteBibliography.php', getData, function(){
			element.remove();
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		});
	} //end deleteBibliography

	deleteNote(note_id, element){
		const getData = {};
		getData['note_id'] = note_id;
		$.get('admin/deleteNote.php', getData, function(){
			element.remove();
		}).fail(function(err){
			alert(`${err['status']}: ${err['statusText']}`);
		});
	} //end deleteNote

	setHeight(){
		let windowHeight = window.innerHeight;
		let elementHeight = windowHeight - 80;
		$('.sort').css('height', elementHeight + 'px');
		$('.summary').css('height', elementHeight + 'px');
		$('.table-scroll').css('height', elementHeight + 'px');
		$('.divider').css('height', elementHeight + 'px');
		$('.detailed').css('height', elementHeight + 'px');
		$(window).resize(function(){
			let windowHeight = window.innerHeight;
			let elementHeight = windowHeight - 80;
			$('.sort').css('height', elementHeight + 'px');
			$('.summary').css('height', elementHeight + 'px');
			$('.table-scroll').css('height', elementHeight + 'px');
			$('.divider').css('height', elementHeight + 'px');
			$('.detailed').css('height', elementHeight + 'px');
			let firstWidth = $('.tbody-first').width();
			let secondWidth = $('.tbody-second').width();
			let thirdWidth = $('.tbody-third').width();
			$('.thead-first').css('width', firstWidth + 'px');
			$('.thead-second').css('width', secondWidth + 'px');
			$('.thead-third').css('width', thirdWidth + 'px');
		});		
	} //end setHeight

	//getScrollbarWidth function found at "https://stackoverflow.com/questions/13382516/getting-scroll-bar-width-using-javascript"
	getScrollbarWidth() {
	    var outer = document.createElement("div");
	    outer.style.visibility = "hidden";
	    outer.style.width = "100px";
	    outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps
	    document.body.appendChild(outer);
	    var widthNoScroll = outer.offsetWidth;
	    // force scrollbars
	    outer.style.overflow = "scroll";
	    // add innerdiv
	    var inner = document.createElement("div");
	    inner.style.width = "100%";
	    outer.appendChild(inner);        
	    var widthWithScroll = inner.offsetWidth;
	    // remove divs
	    outer.parentNode.removeChild(outer);
	    return widthNoScroll - widthWithScroll;
	} //end getScrollbarWidth
	
	setAdjustedWidth(){
		let scrollbarWidth = this.getScrollbarWidth();
		let theadThirdWidth = $('.thead-third').width();
		let newWidth = theadThirdWidth - scrollbarWidth;
		$('.thead-third').css('width', newWidth + 'px');
	} //end setAdjustedWidth
} //end Database

class Functions {
	showUpdateInputs(database){
		$('.details').on('click', '.edit-delete', function(e){
			let value = e.target.value;
			let usage_id = e.target.parentElement.previousElementSibling.firstChild.value;
			
			if (value == "edit") {
				$('.detailed .input').removeClass('hidden');
				$('.detailed td.show').addClass('hidden');
				
				const type = $('input[name=typeOriginal]').val();
				$('select.type').val(type);
				if(type == "1"){
					$('.entry_number').removeClass('hidden');
				}

				const titleType = $('input[name=titleTypeOriginal]').val();
				$('select.title_type').val(titleType);

			} else if (value == "delete") {
				database.deleteSingleEntry(usage_id); 
			}; //end if
		}); //end button click (shows inputs for update function)
	} //end showUpdateInputs

	updateEntry(database){
		$('.details').on('click', '.save', function(e){
			const usageInputs = document.querySelectorAll('.usageUpdate');
			const bibliographyInputs = document.querySelectorAll('.bibliographyUpdate');
			const noteInputs = document.querySelectorAll('.noteUpdate');

			const usageUpdate = {};
			const bibliographyUpdate = {};
			const noteUpdate = {};

			for(const input of usageInputs) {
				let value = input.value;
				let name = input.name;

				usageUpdate[name] = value;
			};

			var x = 0;
			var y = 1;
			var z = 0;

			for(var i = 0; i < bibliographyInputs.length; i+=2) {		
				bibliographyUpdate[z] = {
					id : bibliographyInputs[x].value,
					bibliography : bibliographyInputs[y].value
				};

				x+=2;
				y+=2;
				z++;
			};	


			var x = 0;
			var y = 1;
			var z = 0;

			for(var i = 0; i < noteInputs.length; i+=2) {			
				noteUpdate[z] = {
					id : noteInputs[x].value,
					note : noteInputs[y].value
				};

				x+=2;
				y+=2;
				z++;
			};	
			
			const getData = usageUpdate;

			getData['bibliographies'] = bibliographyUpdate;
			getData['notes'] = noteUpdate;
			
			//console.log(getData);
			
			database.updateEntry(getData);	
		}); //end .save click (update function)
	} //end prepareUpdateEntry

	editWarning(){
		$('.details').on('focus', '.warningContainer', function(e){
			const container = e.currentTarget;
			const warning = document.createElement('span');

			//console.log($(container).parent().parent().siblings());

			//const sibling = ;

			warning.classList.add('warning');
			warning.textContent = "WARNING: Changing the value of this item will delete the current entry and create a new entry for this usage.";
			container.appendChild(warning);
		}); //end .warning focus

		$('.details').on('blur', '.warningContainer', function(e){
			const container = e.currentTarget;
			const warning = container.children[1]; 	
			container.removeChild(warning);
		});
	} //end editWarning

	showEntryNumber(){
		$('.details').on('focus blur click', '.type', function(e){	
			const target = e.target;
			
			if(target.value == 1){
				$('.entry_number').removeClass('hidden');
			} else {
				$('.entry_number').addClass('hidden');
			}
		}); //end .type focus
	} //end showEntryNumber

	sortEntries(database){
		$('.sort').click(function(e){
			database.getEntriesBySerial(e);
		}); //end .sort click
	} //end sortEntries

	getEntry(database){
		$('.usages').on('click', '.item_summary', function(e){
			database.getSingleEntry(e);
		}); //end .item_summary click
	} //end getEntry

	addBibButton(database){
		$('.details').on('click', '.addBib', function(e){
			//console.log(e);
			const usage_id = e.target.previousElementSibling.value;
			const lastElement = e.target.parentElement.parentElement.previousElementSibling;

			//console.log(lastElement);
			database.createNewBib(usage_id, lastElement);
		});
	} //end addBibButton

	addNoteButton(database){
		$('.details').on('click', '.addNote', function(e){
			//console.log(e);
			const usage_id = e.target.previousElementSibling.value;
			const lastElement = e.target.parentElement.parentElement.previousElementSibling;

			//console.log(lastElement);
			database.createNewNote(usage_id, lastElement);
		});
	} //end addBibButton

	deleteBibButton(database){
		$('.details').on('click', '.bib-delete', function(e){
			const bibliography_id = e.target.parentElement.previousElementSibling.children.bibliography_id.value;
			const element = e.target.parentElement.parentElement;
			database.deleteBibliography(bibliography_id, element);
		});
	} //end deleteBibButton

	deleteNoteButton(database){
		$('.details').on('click', '.note-delete', function(e){
			const note_id = e.target.parentElement.previousElementSibling.children.note_id.value;
			const element = e.target.parentElement.parentElement;
			database.deleteNote(note_id, element);
		});
	} //end deleteNoteButton

	allSearch(database){
		$('#container2 > div:first-child').on('keyup', 'input', function(e){
			const search_param = e.target.value;
			database.allSearch(search_param)
		});
	}
} //end Functions

//Confirm login

const CheckLogin = {
	checkLogin: () => {	
		if(!sessionStorage.login || sessionStorage.login == 'false'){
			sessionStorage.redirect = window.location.href;
			window.location.href = 'login.php?page=login';
		}
	}
}

CheckLogin.checkLogin();

$(document).ready(function(){
	const database = new Database;
	const functions = new Functions;

	functions.showUpdateInputs(database);
	functions.updateEntry(database);
	functions.editWarning();
	functions.showEntryNumber();
	functions.sortEntries(database);
	functions.getEntry(database);
	functions.addBibButton(database);
	functions.addNoteButton(database);
	functions.deleteBibButton(database);
	functions.deleteNoteButton(database);
	functions.allSearch(database);

	//On load will automatically select the first item in the list and display it's information
	database.getFirstEntry();
			
	//Finds the window's height and then adds it to the css on load or resize (Need this for the overflow, for some reason vh won't work...)
	database.setHeight();

	//Gets scrollbar width and adjust width of summary header
	database.setAdjustedWidth();
	
}); //end ready