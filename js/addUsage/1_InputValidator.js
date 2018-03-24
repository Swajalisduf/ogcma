class InputValidator {
  static clearFeedback(pageNumber) {
    switch(pageNumber) {
      case ENTER_MYTH:
        MythInputValidator.clearFeedback();
        break;
      default:
        this.clearFeedbackDefault(this.getInputName(pageNumber));
        break;
      }
  }
  static validatePage(pageNumber) {
    switch(pageNumber) {
      case ENTER_MYTH:
        return MythInputValidator.validatePage();
      case ENTER_REID_INFO:
        return this.validatePageReid();
      case ENTER_CREATION_DATE:
        return true;
      case ENTER_TITLE:
        return this.validatePageTitle();
      case ENTER_AUTHOR:
        return this.validatePageAuthor();
      case ENTER_PUBLICATION:
        return true;
      case ENTER_BIBLIOGRAPHY:
        return true
      case ENTER_NOTE:
        return true;
      case ENTER_DESCRIPTION:
        return true;
      default:
        return true;
      }
    }

    static clearFeedbackDefault(name) {
      let inputs = document.getElementsByName(name);
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove("invalid");
      }
      let zFactorInput = document.getElementsByName("zfactor")[0];
      zFactorInput.classList.remove("invalid");
    }

    static validatePageReid() {
      let isValid = true;
      let inputs = document.getElementsByName('reid');
      let type = document.querySelector('input[name = "type"]:checked').value;
      let numberInputs = 1;
      if (type == "Original Reid Text") {
        numberInputs = 2;
      }
      for (let i = 0; i < numberInputs; i++) {
        let isEmpty = (inputs[i].value === "");
        if (isEmpty) {
          inputs[i].classList.add("invalid");
          isValid = false;
        }
      }
      return isValid;
    }

    static validatePageTitle() {
      let isValid = true;
      let inputs = document.getElementsByName('title');
      let isEmpty = (inputs[0].value === "");
      if (isEmpty) {
        inputs[0].classList.add("invalid");
        isValid = false;
      }
      let zFactorInput = document.getElementsByName('zfactor')[0];
      isEmpty = zFactorInput.value === "";
      if (!isEmpty) {
        let zFactor = zFactorInput.value;
        if (zFactor < 1 || zFactor > 5) {
          isValid = false;
          zFactorInput.classList.add("invalid");
        }
      }
      return isValid;
    }

    static validatePageAuthor() {
      let isValid = true;
      let inputs = document.getElementsByName('author');
      let isEmpty = (inputs[1].value === "");
      if (isEmpty) {
        inputs[1].classList.add("invalid");
        isValid = false;
      }
      return isValid;
    }

    static validatePageBibliography() {
      let isValid = true;
      let inputs = document.getElementsByName('bibliography');
      let isEmpty = (inputs[0].value === "");
      if (isEmpty) {
        inputs[0].classList.add("invalid");
        isValid = false;
      }
      return isValid;
    }


    static getInputName(pageNumber) {
      switch (pageNumber) {
        case ENTER_REID_INFO:
          return "reid";
        case ENTER_CREATION_DATE:
          return "date";
        case ENTER_TITLE:
          return "title";
        case ENTER_AUTHOR:
          return "author";
        case ENTER_PUBLICATION:
          return "publication";
        case ENTER_BIBLIOGRAPHY:
          return "bibliography";
        case ENTER_NOTE:
          return "note";
        case ENTER_DESCRIPTION:
          return "description";
        }
    }
  }

class MythInputValidator {
  static isValidMyth() {
    let input = document.getElementsByName("mythTextInput")[0];
    let empty = (input.value === "");
    if (empty) {
      input.classList.add("invalid");
      return false;
    }
    return true;
  }
  static isValidType() {
    let checked = false;
    var radios = document.getElementsByName("type");
    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
        checked = true;
      }
    }
    if (!checked) {
      let radioButtons = document.querySelector('.type-radios');
      radioButtons.classList.add("invalid");
    }
    return checked;
  }
  static clearFeedback() {
    let radioButtons = document.querySelector('.type-radios');
    radioButtons.classList.remove("invalid");
    let input = document.getElementsByName("mythTextInput")[0];
    input.classList.remove("invalid");
  }
  static validatePage() {
    let isValidMyth = this.isValidMyth();
    let isValidType = this.isValidType();
    return isValidMyth && isValidType;
  }
}
