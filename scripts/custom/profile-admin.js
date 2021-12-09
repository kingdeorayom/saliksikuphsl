import {
  pendingThesisTemplate,
  pendingInfographicTemplate,
  pendingJournalTemplate,
  revisionThesisTemplate,
  revisionInfographicTemplate,
  revisionJournalTemplate,
  revisedThesisTemplate,
  revisedInfographicTemplate,
  revisedJournalTemplate,
  publishedThesisTemplate,
  publishedInfographicTemplate,
  publishedJournalTemplate,
} from "./templates.js";
document.addEventListener("DOMContentLoaded", function () {
  // ====================== count containers =====================================

  var pendingContainer = document.querySelector("#pending-container");
  var revisionContainer = document.querySelector("#revision-container");
  var revisedContainer = document.querySelector("#revised-container");
  var publishedContainer = document.querySelector("#published-container");
  var submissionsContainer = document.querySelector("#submissions-container");

  // ====================== result containers =====================================
  var resultsContainer = document.querySelector("#results-container");
  var pendingResultsContainer = document.querySelector(
    "#pending-results-container"
  );
  var revisionResultsContainer = document.querySelector(
    "#revision-results-container"
  );
  var revisedResultsContainer = document.querySelector(
    "#revised-results-container"
  );
  var publishedResultsContainer = document.querySelector(
    "#published-results-container"
  );
  // ======================== count event listeners ========================
  pendingContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = false;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = true;
  });

  revisionContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = false;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = true;
  });

  revisedContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = false;
    publishedResultsContainer.hidden = true;
  });

  publishedContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = false;
  });

  submissionsContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = false;
    revisionResultsContainer.hidden = false;
    revisedResultsContainer.hidden = false;
    publishedResultsContainer.hidden = false;
  });

  getSubmissions().then((data) => loadResults(JSON.parse(data)));

  function getSubmissions() {
    return new Promise(function (resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../../../src/process/get-submissions.php");
      xhr.onload = () =>
        xhr.status == 200
          ? resolve(xhr.response)
          : reject(Error(xhr.statusText));
      xhr.send();
    });
  }

  function loadResults(data) {
    // updates the count containers
    updateCounts(data);

    data["pending"].forEach((result) => {
      if (result["research_title"] !== null) {
        pendingResultsContainer.innerHTML += pendingThesisTemplate(result);
      }
      if (result["infographic_title"] !== null) {
        pendingResultsContainer.innerHTML += pendingInfographicTemplate(result);
      }
      if (result["journal_title"] !== null) {
        pendingResultsContainer.innerHTML += pendingJournalTemplate(result);
      }
    });
    data["forRevision"].forEach((result) => {
      if (result["research_title"] !== null) {
        revisionResultsContainer.innerHTML += revisionThesisTemplate(result);
      }
      if (result["infographic_title"] !== null) {
        revisionResultsContainer.innerHTML +=
          revisionInfographicTemplate(result);
      }
      if (result["journal_title"] !== null) {
        revisionResultsContainer.innerHTML += revisionJournalTemplate(result);
      }
    });
    data["revised"].forEach((result) => {
      if (result["research_title"] !== null) {
        revisedResultsContainer.innerHTML += revisedThesisTemplate(result);
      }

      if (result["infographic_title"] !== null) {
        revisedResultsContainer.innerHTML += revisedInfographicTemplate(result);
      }
      if (result["journal_title"] !== null) {
        revisedResultsContainer.innerHTML += revisedJournalTemplate(result);
      }
    });
    data["published"].forEach((result) => {
      if (result["research_title"] !== null) {
        publishedResultsContainer.innerHTML += publishedThesisTemplate(result);
      }
      if (result["infographic_title"] !== null) {
        publishedResultsContainer.innerHTML +=
          publishedInfographicTemplate(result);
      }
      if (result["journal_title"] !== null) {
        publishedResultsContainer.innerHTML += publishedJournalTemplate(result);
      }
    });
  }

  function updateCounts(data) {
    pendingContainer.querySelector(".display-4").innerHTML =
      data.pending.length;
    revisionContainer.querySelector(".display-4").innerHTML =
      data.forRevision.length;
    revisedContainer.querySelector(".display-4").innerHTML =
      data.revised.length;
    publishedContainer.querySelector(".display-4").innerHTML =
      data.published.length;
    submissionsContainer.querySelector(".display-4").innerHTML =
      data.submissions.length;
    checkEmptyResults(data);
  }

  function checkEmptyResults(data) {
    if (data["pending"].length === 0) {
      pendingResultsContainer.querySelector(
        ".results-container"
      ).innerHTML = `<div>No Results!</div>`;
    }
    if (data["forRevision"].length === 0) {
      revisionResultsContainer.querySelector(
        ".results-container"
      ).innerHTML = `<div>No Results!</div>`;
    }
    if (data["revised"].length === 0) {
      revisedResultsContainer.querySelector(
        ".results-container"
      ).innerHTML = `<div>No Results!</div>`;
    }
    if (data["published"].length === 0) {
      publishedResultsContainer.querySelector(
        ".results-container"
      ).innerHTML = `<div>No Results!</div>`;
    }
  }

  function logger(data) {
    console.log(typeof data);
    console.log(data);
  }
});
