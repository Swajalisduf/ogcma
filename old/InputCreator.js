function InputCreator() {
  this.createAuthorInputs = () => {
    let enterAuthorPage = document.querySelector('.enter-author-page');
    let addAuthorButton = document.querySelector('.addAuthor');
    enterAuthorPage.insertBefore(document.createElement("br"), addAuthorButton);
    let textarea = document.createElement("textarea");
    textarea.name = "author";
    textarea.style.width = "98%";

    let header = document.createElement("h2");
    header.innerHTML = "Additional Author Information";

    enterAuthorPage.insertBefore(header, addAuthorButton);
    enterAuthorPage.insertBefore(textarea, addAuthorButton);
    enterAuthorPage.insertBefore(document.createElement("br"), addAuthorButton);
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
