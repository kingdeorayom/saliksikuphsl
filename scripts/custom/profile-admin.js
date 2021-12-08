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
  var submissionsResultsContainer = document.querySelector(
    "#submissions-results-container"
  );
  // ======================== count event listeners ========================
  pendingContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = false;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = true;
    submissionsResultsContainer.hidden = true;
  });

  revisionContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = false;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = true;
    submissionsResultsContainer.hidden = true;
  });

  revisedContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = false;
    publishedResultsContainer.hidden = true;
    submissionsResultsContainer.hidden = true;
  });

  publishedContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = false;
    submissionsResultsContainer.hidden = true;
  });

  submissionsContainer.addEventListener("click", function () {
    pendingResultsContainer.hidden = true;
    revisionResultsContainer.hidden = true;
    revisedResultsContainer.hidden = true;
    publishedResultsContainer.hidden = true;
    submissionsResultsContainer.hidden = false;
  });

  console.log("make ajax call here");
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

  function logger(data) {
    console.log(typeof data);
    console.log(data);
  }

  function loadResults(data) {
    console.log(data);
    console.log(data.pending.length);
    updateCounts(data);

    data["pending"].forEach((result) => {
      if (result["research_title"] !== null) {
        pendingResultsContainer.innerHTML += `<div>${result.research_title}</div>`;
      }
      if (result["journal_title"] !== null) {
        pendingResultsContainer.innerHTML += `<div>${result.journal_title}</div>`;
      }
      if (result["infographic_title"] !== null) {
        pendingResultsContainer.innerHTML += `<div>${result.infographic_title}</div>`;
      }
    });

    data["forRevision"].forEach((result) => {
      if (result["research_title"] !== null) {
        revisionResultsContainer.innerHTML += `<div>${result.research_title}</div>`;
      }
      if (result["journal_title"] !== null) {
        revisionResultsContainer.innerHTML += `<div>${result.journal_title}</div>`;
      }
      if (result["infographic_title"] !== null) {
        revisionResultsContainer.innerHTML += `<div>${result.infographic_title}</div>`;
      }
    });
    data["revised"].forEach((result) => {
      if (result["research_title"] !== null) {
        revisedResultsContainer.innerHTML += `<div>${result.research_title}</div>`;
      }
      if (result["journal_title"] !== null) {
        revisedResultsContainer.innerHTML += `<div>${result.journal_title}</div>`;
      }
      if (result["infographic_title"] !== null) {
        revisedResultsContainer.innerHTML += `<div>${result.infographic_title}</div>`;
      }
    });
    data["published"].forEach((result) => {
      if (result["research_title"] !== null) {
        publishedResultsContainer.innerHTML += `<div>${result.research_title}</div>`;
      }
      if (result["journal_title"] !== null) {
        publishedResultsContainer.innerHTML += `<div>${result.journal_title}</div>`;
      }
      if (result["infographic_title"] !== null) {
        publishedResultsContainer.innerHTML += `<div>${result.infographic_title}</div>`;
      }
    });

    data["submissions"].forEach((result) => {
      if (result["research_title"] !== null) {
        submissionsResultsContainer.innerHTML += `<div>${result.research_title}</div>`;
      }
      if (result["journal_title"] !== null) {
        submissionsResultsContainer.innerHTML += `<div>${result.journal_title}</div>`;
      }
      if (result["infographic_title"] !== null) {
        submissionsResultsContainer.innerHTML += `<div>${result.infographic_title}</div>`;
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
  }
});
