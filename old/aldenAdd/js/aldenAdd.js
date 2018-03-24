let dialog;
let dialogManager;

const showDialog = () => {
  dialog.style.display = "block";
  document.querySelector('.back-button').innerHTML = "Cancel";
  document.querySelector('.next-button').innerHTML = "Next";
};

const hideDialog = () => {
  dialogManager.setCurrentPage(ENTER_MYTH);
  dialogManager.initialize();
  dialog.style.display = "none";
};

const advancePage = () => {
  let currentPage = dialogManager.getCurrentPage();
  InputValidator.clearFeedback(currentPage);
  if(InputValidator.validatePage(currentPage)) {
    dialogManager.advancePage();
  }
}

const initialize = () => {
  let addButton = document.querySelector('.addButton');
  let mythTextInput = document.querySelector('#mythTextInput');
  let nextButton = document.querySelector('.next-button');
  let backButton = document.querySelector('.back-button');
  let inputCreator = new InputCreator();
  let addAuthorButton = document.querySelector('.addAuthor');
  dialog = document.querySelector('.dialog');
  let addBibliographyButton = document.querySelector('.addBibliography');
  let addNoteButton = document.querySelector('.addNote');
  dialogManager = new DialogManager();

  addBibliographyButton.addEventListener('click', function() {
    inputCreator.createBibliographyInput();
  });

  addNoteButton.addEventListener('click', function() {
    inputCreator.createNoteInput();
  });

  addAuthorButton.addEventListener('click', function() {
    inputCreator.createAuthorInputs();
  });

  addButton.addEventListener('click', function() {
    showDialog();
  });
  window.addEventListener('click', function(event) {
    if (event.target == dialog) {
      hideDialog();
    }
    let dateInput = document.getElementsByName("date")[0];
    if (document.activeElement == dateInput || dateInput.value != "") {
      let overlays = document.querySelectorAll('.overlay');
      overlays[0].style.display = "none";
      overlays[1].style.display = "none";
    }
    else {
      let overlays = document.querySelectorAll('.overlay');
      overlays[0].style.display = "block";
      overlays[1].style.display = "block";
    }
  });
  nextButton.addEventListener('click', function() {
    advancePage();
  });
  backButton.addEventListener('click', function() {
    let currentPage = dialogManager.getCurrentPage();
    InputValidator.clearFeedback(currentPage);
    dialogManager.goBackAPage();
  });

}

const checkKey = (e) => {
	if (e.keyCode == 27) {
    hideDialog();
  }
  else if (e.keyCode == 13) {
    e.preventDefault();
    if (document.querySelector('.back-button') == document.activeElement) {
        dialogManager.goBackAPage();
    }
    else if (document.querySelector('.next-button') == document.activeElement) {
      advancePage();
    }
  }
}

document.addEventListener('DOMContentLoaded', initialize);
document.onkeydown = checkKey;
