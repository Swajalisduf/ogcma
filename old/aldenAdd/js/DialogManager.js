const ENTER_MYTH = 0;
const ENTER_REID_INFO = 1;
const ENTER_TITLE = 2;
const ENTER_CREATION_DATE = 3;
const ENTER_AUTHOR = 4;
const ENTER_PUBLICATION = 5;
const ENTER_BIBLIOGRAPHY = 6;
const ENTER_NOTE = 7;
const ENTER_DESCRIPTION = 8;
const SUMMARY = 9;

function DialogManager() {
  this.pages = [document.querySelector('.enter-myth-page'),
                document.querySelector('.enter-reid-info-page'),
                document.querySelector('.enter-title-page'),
                document.querySelector('.enter-creation-date'),
                document.querySelector('.enter-author-page'),
                document.querySelector('.enter-publication-page'),
                document.querySelector('.enter-bibliography-page'),
                document.querySelector('.enter-note-page'),
                document.querySelector('.enter-description-page'),
                document.querySelector('.summary-page')];
  this.currentPage = ENTER_MYTH;
  this.initialize = function() {
    for (i = 0; i < this.pages.length; i++) {
      InputValidator.clearFeedback(i);
      if(i != this.currentPage) {
        this.pages[i].style.display = "none";
      }
      else {
        this.pages[i].style.display = "flex";
      }
    }
  }
  this.getUsageType = function() {
    return document.querySelector('input[name = "type"]:checked').value;
  }
  this.needsReidInfoPage = function() {
    let type = this.getUsageType();
    return (type === "Original Reid Text" || type === "Further Reference");
  }
  this.arrangeReidPage = function() {
    if (this.currentPage == ENTER_REID_INFO && this.getUsageType() == "Further Reference") {
      document.getElementsByName('reid')[1].style.display = "none";
    }
    else {
      document.getElementsByName('reid')[1].style.display = "block";
    }
  }
  this.advancePage = function () {
        if (this.currentPage == ENTER_DESCRIPTION) {
          document.querySelector('.next-button').innerHTML = "Submit";
        }
        else if (this.currentPage == ENTER_MYTH) {
          document.querySelector('.back-button').innerHTML = "Back";
        }
        else if (this.currentPage == SUMMARY) {
          console.log("Submit form");
          return;
        }
        this.pages[this.currentPage].style.display = "none";
        if (this.currentPage == ENTER_MYTH && !this.needsReidInfoPage()) {
            this.currentPage++;
        }
        this.currentPage++;
        this.pages[this.currentPage].style.display = "flex";
        this.arrangeReidPage();
        if (this.currentPage == SUMMARY) {
          this.setupSummaryPage();
        }
    };
  this.goBackAPage = function () {
    if (this.currentPage == SUMMARY) {
      document.querySelector('.next-button').innerHTML = "Next";
    }
    if (this.currentPage == ENTER_MYTH) {
      document.querySelector('.back-button').innerHTML = "Cancel";
      hideDialog();
      return;
    }
    this.pages[this.currentPage].style.display = "none";
    if (this.currentPage == ENTER_TITLE && !this.needsReidInfoPage()) {
      this.currentPage--;
    }
    this.currentPage--;
    this.pages[this.currentPage].style.display = "flex";
    this.arrangeReidPage();
    if (this.currentPage == ENTER_MYTH) {
      document.querySelector('.back-button').innerHTML = "Cancel";
    }
  }

  this.setCurrentPage = function (currentPage) {
    this.currentPage = currentPage;
  }

  this.getCurrentPage = function () {
    return this.currentPage;
  }

  this.setupSummaryPage = function () {
    let table = document.querySelector('table');
    while (table.firstChild) {
      table.removeChild(table.firstChild);
    }
    let inputCollector = new InputCollector();
    let inputs = inputCollector.collectAllInput();
    let numberInputs = inputs.length;
    for (let i = 0; i < numberInputs; i++) {
      if (inputs[i][1] != "") {
        //insert into the summary table
        let row = document.createElement("tr");
        let name = document.createElement("td");
        let value = document.createElement("td");
        name.innerHTML = inputs[i][0];
        value.innerHTML = inputs[i][1];
        row.appendChild(name);
        row.appendChild(value);
        table.appendChild(row);
      }
    }
  }

  this.initialize();
}
