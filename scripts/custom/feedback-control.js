function enableRevisionInfographics(checkBoxStatus) {
  console.log(document.querySelector("[name='textAreaFeedbackInfographics']"));
  if (checkBoxStatus.checked) {
    document.getElementById("textAreaFeedbackInfographics").hidden = false;
    document.querySelector(
      "[name='textAreaFeedbackInfographics']"
    ).required = true;
    document.getElementById("returnButtonInfographics").style.display = "block";

    document.getElementById("publishButtonInfographics").style.display = "none";
  } else {
    document.getElementById("textAreaFeedbackInfographics").hidden = true;
    document.querySelector(
      "[name='textAreaFeedbackInfographics']"
    ).required = false;
    document.getElementById("returnButtonInfographics").style.display = "none";

    document.getElementById("publishButtonInfographics").style.display =
      "block";
  }
}

function enableRevisionJournal(checkBoxStatus) {
  if (checkBoxStatus.checked) {
    document.getElementById("textAreaFeedbackJournal").hidden = false;
    document.querySelector("[name='textAreaFeedbackJournal']").required = true;
    document.getElementById("returnButtonJournal").style.display = "block";

    document.getElementById("publishButtonJournal").style.display = "none";
  } else {
    document.getElementById("textAreaFeedbackJournal").hidden = true;
    document.querySelector("[name='textAreaFeedbackJournal']").required = false;
    document.getElementById("returnButtonJournal").style.display = "none";

    document.getElementById("publishButtonJournal").style.display = "block";
  }
}

function enableRevisionThesis(checkBoxStatus) {
  if (checkBoxStatus.checked) {
    document.getElementById("textAreaFeedbackThesis").hidden = false;
    document.querySelector("[name='textAreaFeedbackThesis']").required = true;
    document.getElementById("returnButtonThesis").style.display = "block";

    document.getElementById("publishButtonThesis").style.display = "none";
  } else {
    document.getElementById("textAreaFeedbackThesis").hidden = true;
    document.querySelector("[name='textAreaFeedbackThesis']").required = false;
    document.getElementById("returnButtonThesis").style.display = "none";

    document.getElementById("publishButtonThesis").style.display = "block";
  }
}
