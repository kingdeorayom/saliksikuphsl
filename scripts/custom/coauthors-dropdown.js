function showThesisDissertationCoAuthorsField() {
  var x = parseInt(
    document.getElementById("dropdownThesisDissertationCoAuthors").value
  );
  if (x == 1) {
    // code makes all author fields required except extension and hidden form controls
    thesisLogic(x);
    document.getElementById("co-author-1-td-panel").style.display = "flex";
    document.getElementById("co-author-2-td-panel").style.display = "none";
    document.getElementById("co-author-3-td-panel").style.display = "none";
    document.getElementById("co-author-4-td-panel").style.display = "none";
  } else if (x == 2) {
    // code makes all author fields required except extension and hidden form controls
    thesisLogic(x);
    document.getElementById("co-author-1-td-panel").style.display = "flex";
    document.getElementById("co-author-2-td-panel").style.display = "flex";
    document.getElementById("co-author-3-td-panel").style.display = "none";
    document.getElementById("co-author-4-td-panel").style.display = "none";
  } else if (x == 3) {
    // code makes all author fields required except extension and hidden form controls
    thesisLogic(x);
    document.getElementById("co-author-1-td-panel").style.display = "flex";
    document.getElementById("co-author-2-td-panel").style.display = "flex";
    document.getElementById("co-author-3-td-panel").style.display = "flex";
    document.getElementById("co-author-4-td-panel").style.display = "none";
  } else if (x == 4) {
    // code makes all author fields required except extension and hidden form controls
    thesisLogic(x);
    document.getElementById("co-author-1-td-panel").style.display = "flex";
    document.getElementById("co-author-2-td-panel").style.display = "flex";
    document.getElementById("co-author-3-td-panel").style.display = "flex";
    document.getElementById("co-author-4-td-panel").style.display = "flex";
  } else if (x == 0) {
    // code makes all author fields required except extension and hidden form controls
    for (var i = x + 1; i <= 4; i++) {
      document
        .querySelectorAll(
          `[name='thesis-form'] > #co-author-${i}-td-panel >div >.form-control`
        )
        .forEach((element) => {
          element.required = false;
          // element.value = "";
        });
    }
    document.getElementById("co-author-1-td-panel").style.display = "none";
    document.getElementById("co-author-2-td-panel").style.display = "none";
    document.getElementById("co-author-3-td-panel").style.display = "none";
    document.getElementById("co-author-4-td-panel").style.display = "none";
  }
}

function showInfographicsCoAuthorsField() {
  var y = parseInt(
    document.getElementById("dropdownInfographicsCoAuthors").value
  );
  if (y == 1) {
    infographicLogic(y);
    document.getElementById("co-author-1-info-panel").style.display = "flex";
    document.getElementById("co-author-2-info-panel").style.display = "none";
    document.getElementById("co-author-3-info-panel").style.display = "none";
    document.getElementById("co-author-4-info-panel").style.display = "none";
  } else if (y == 2) {
    infographicLogic(y);
    document.getElementById("co-author-1-info-panel").style.display = "flex";
    document.getElementById("co-author-2-info-panel").style.display = "flex";
    document.getElementById("co-author-3-info-panel").style.display = "none";
    document.getElementById("co-author-4-info-panel").style.display = "none";
  } else if (y == 3) {
    infographicLogic(y);
    document.getElementById("co-author-1-info-panel").style.display = "flex";
    document.getElementById("co-author-2-info-panel").style.display = "flex";
    document.getElementById("co-author-3-info-panel").style.display = "flex";
    document.getElementById("co-author-4-info-panel").style.display = "none";
  } else if (y == 4) {
    infographicLogic(y);
    document.getElementById("co-author-1-info-panel").style.display = "flex";
    document.getElementById("co-author-2-info-panel").style.display = "flex";
    document.getElementById("co-author-3-info-panel").style.display = "flex";
    document.getElementById("co-author-4-info-panel").style.display = "flex";
  } else if (y == 0) {
    for (var i = y + 1; i <= 4; i++) {
      document
        .querySelectorAll(
          `[name='infographic-form'] > #co-author-${i}-info-panel >div >.form-control`
        )
        .forEach((element) => {
          element.required = false;
          element.value = "";
        });
    }
    document.getElementById("co-author-1-info-panel").style.display = "none";
    document.getElementById("co-author-2-info-panel").style.display = "none";
    document.getElementById("co-author-3-info-panel").style.display = "none";
    document.getElementById("co-author-4-info-panel").style.display = "none";
  }
}

function thesisLogic(x) {
  for (var i = 1; i <= x; i++) {
    document
      .querySelectorAll(
        `[name='thesis-form'] > #co-author-${i}-td-panel >div >.form-control`
      )
      .forEach((element) => {
        element.placeholder === "Extension" ||
        element.placeholder === "Middle Initial"
          ? (element.required = false)
          : (element.required = true);
      });
  }
  for (var i = x + 1; i <= 4; i++) {
    document
      .querySelectorAll(
        `[name='thesis-form'] > #co-author-${i}-td-panel >div >.form-control`
      )
      .forEach((element) => {
        element.required = false;
        element.value = ""; //hassle for user
      });
  }
}

function infographicLogic(x) {
  for (var i = 1; i <= x; i++) {
    document
      .querySelectorAll(
        `[name='infographic-form'] > #co-author-${i}-info-panel >div >.form-control`
      )
      .forEach((element) => {
        element.placeholder === "Extension" ||
        element.placeholder === "Middle Initial"
          ? (element.required = false)
          : (element.required = true);
      });
  }
  for (var i = x + 1; i <= 4; i++) {
    document
      .querySelectorAll(
        `[name='thesis-form'] > #co-author-${i}-td-panel >div >.form-control`
      )
      .forEach((element) => {
        element.required = false;
        element.value = ""; //hassle for user
      });
  }
}
