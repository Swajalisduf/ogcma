function InputCreator() {
  let addGivenNamesInput = () => {
    let givenNameHolder = document.createElement("div");
    givenNameHolder.classList.add("holder");
    let givenNameInput = document.createElement("input");
    givenNameInput.type = "text";
    givenNameInput.classList.add("text-input");
    givenNameInput.name = "author";
    let givenNameLabel = document.createElement("label");
    givenNameLabel.innerHTML = "Author's Given Names";
    givenNameHolder.appendChild(givenNameInput);
    givenNameHolder.appendChild(givenNameLabel);
    return givenNameHolder;
  }
  let addSurNameInput = () => {
    let surNameHolder = document.createElement("div");
    surNameHolder.classList.add("holder");
    let surNameInput = document.createElement("input");
    surNameInput.type = "text";
    surNameInput.classList.add("text-input");
    surNameInput.name = "author";
    let surNameLabel = document.createElement("label");
    surNameLabel.innerHTML = "Author's Surname";
    surNameHolder.appendChild(surNameInput);
    surNameHolder.appendChild(surNameLabel);
    return surNameHolder;
  }
  let addDatesInput = () => {
    let authorDatesHolder = document.createElement("div");
    authorDatesHolder.classList.add("holder");
    let authorDatesInput = document.createElement("input");
    authorDatesInput.type = "text";
    authorDatesInput.classList.add("text-input");
    authorDatesInput.name = "author";
    let authorDatesLabel = document.createElement("label");
    authorDatesLabel.innerHTML = "Author's Birth and Death Dates";
    authorDatesHolder.appendChild(authorDatesInput);
    authorDatesHolder.appendChild(authorDatesLabel);
    return authorDatesHolder;
  }
  this.createAuthorInputs = () => {
    let enterAuthorPage = document.querySelector('.enter-author-page');
    let addAuthorButton = document.querySelector('.addAuthor');
    enterAuthorPage.insertBefore(document.createElement("br"), addAuthorButton);
    enterAuthorPage.insertBefore(addGivenNamesInput(), addAuthorButton);
    enterAuthorPage.insertBefore(addSurNameInput(), addAuthorButton);
    enterAuthorPage.insertBefore(addDatesInput(), addAuthorButton);
    enterAuthorPage.insertBefore(document.createElement("br"), addAuthorButton);
  }
  this.createNoteInput = () => {
    let enterNotePage = document.querySelector('.enter-note-page');
    let addNoteButton = document.querySelector('.addNote');
    let note = document.createElement("input");
    note.type = "text";
    note.placeholder = "Note";
    note.name = "note";
    enterNotePage.insertBefore(note, addNoteButton);
    enterNotePage.insertBefore(document.createElement("br"), addNoteButton);
  }
  this.createBibliographyInput = () => {
    let enterBibliographyPage = document.querySelector('.enter-bibliography-page');
    let addBibliographyButton = document.querySelector('.addBibliography');
    let bibliographyInput = document.createElement("input");
    bibliographyInput.type = "text";
    bibliographyInput.placeholder = "Bibliography (Chicago Manual of Style, Author-Date format)";
    bibliographyInput.name = "bibliography";
    enterBibliographyPage.insertBefore(bibliographyInput, addBibliographyButton);
    enterBibliographyPage.insertBefore(document.createElement("br"), addBibliographyButton);
  }
}
