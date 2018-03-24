function InputCollector() {
  this.collectMythPageInput = () => {
    let mythInputs = [];
    mythInputs.push(["Myth Name", document.getElementsByName('mythTextInput')[0].value]);
    mythInputs.push(["Type of Usage", document.querySelector('input[name = "type"]:checked').value]);
    return mythInputs;
  }
  this.collectReidInfoPageInput = () => {
    let reidInputs = [];
    reidInputs.push(["Reid Page Number", document.getElementsByName('reid')[0].value]);
    reidInputs.push(["Entry Number", document.getElementsByName('reid')[1].value]);
    return reidInputs;
  }
  this.collectTitlePageInput = () => {
    let titleInputs = [];
    titleInputs.push(["Title", document.getElementsByName('title')[0].value]);
    titleInputs.push(["Medium", document.getElementsByName('title')[1].value]);
    titleInputs.push(["Genre", document.getElementsByName('title')[2].value]);
    titleInputs.push(["Z-Factor", document.getElementsByName('zfactor')[0].value]);
    return titleInputs;
  }
  this.collectCreationDateInput = () => {
    let creationDateInput = [];
    let date = document.getElementsByName('date')[0].value;
    if (date != "") {
      date = document.querySelector('input[name = "ca"]:checked').value + " " + date;
      date += " " + document.querySelector('input[name = "bc"]:checked').value;
    }
    creationDateInput.push(["Creation Date", date]);
    return creationDateInput;
  }
  this.collectAuthorInfoInput = () => {
    let authorInputs = [];
    const NUM_AUTHOR_INPUTS = 3;
    let numberAuthors = document.getElementsByName('author').length / NUM_AUTHOR_INPUTS;
    for (let i = 0; i < numberAuthors; i++) {
      authorInputs.push(["Author's Given Names", document.getElementsByName('author')[i*NUM_AUTHOR_INPUTS].value]);
      authorInputs.push(["Author's Surname", document.getElementsByName('author')[i*NUM_AUTHOR_INPUTS + 1].value]);
      authorInputs.push(["Author's Birth and Death Dates", document.getElementsByName('author')[i*NUM_AUTHOR_INPUTS + 2].value]);
    }
    return authorInputs;
  }
  this.collectPublishingInfoInput = () => {
    let publicationInputs = [];
    publicationInputs.push(["Publication", document.getElementsByName('publication')[0].value]);
    publicationInputs.push(["Owning Institution", document.getElementsByName('publication')[1].value]);
    publicationInputs.push(["Premiere Date", document.getElementsByName('publication')[2].value]);
    publicationInputs.push(["Premiere Venue", document.getElementsByName('publication')[2].value]);
    return publicationInputs;
  }
  this.collectBibliographyInput = () => {
    let bibliographyInputs = [];
    let numberBibliographies = document.getElementsByName('bibliography').length;
    for (let i = 0; i < numberBibliographies; i++) {
      bibliographyInputs.push(["Bibliography", document.getElementsByName('bibliography')[i].value]);
    }
    return bibliographyInputs;
  }
  this.collectNotesInput = () => {
    let notesInputs = [];
    let numberNotes = document.getElementsByName('note').length;
    for (let i = 0; i < numberNotes; i++) {
      notesInputs.push(["Note", document.getElementsByName('note')[i].value]);
    }
    return notesInputs;
  }
  this.collectDescriptionInput = () => {
    let descriptionInput = [];
    descriptionInput.push(["Description", document.getElementsByName('description')[0].value]);
    return descriptionInput;
  }
  this.collectAllInput = () => {
    //Return a two dimentional array. Each array has a description of
    //the input at index 0, and the value at index 1.
    let allInputs = [];
    allInputs = allInputs.concat(this.collectMythPageInput());
    allInputs = allInputs.concat(this.collectReidInfoPageInput());
    allInputs = allInputs.concat(this.collectTitlePageInput());
    allInputs = allInputs.concat(this.collectCreationDateInput());
    allInputs = allInputs.concat(this.collectAuthorInfoInput());
    allInputs = allInputs.concat(this.collectPublishingInfoInput());
    allInputs = allInputs.concat(this.collectBibliographyInput());
    allInputs = allInputs.concat(this.collectNotesInput());
    allInputs = allInputs.concat(this.collectDescriptionInput());
    return allInputs;
  }
}
