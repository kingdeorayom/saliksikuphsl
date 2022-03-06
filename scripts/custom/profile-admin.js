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
  let globalData = {};
  var searchSubmissionsAdmin = document.querySelector(
    "#search-submissions-admin"
  );
  searchSubmissionsAdmin.addEventListener("input", function (e) {
    e.preventDefault();
    console.log(e.target.value);

    var newData = globalData["submissions"].filter((item) => {
      if (item.journal_title !== null) {
        return item.journal_title
          .toLowerCase()
          .includes(e.target.value.toLowerCase());
      }
      if (item.research_title !== null) {
        return item.research_title
          .toLowerCase()
          .includes(e.target.value.toLowerCase());
      }
      if (item.infographic_title !== null) {
        return item.infographic_title
          .toLowerCase()
          .includes(e.target.value.toLowerCase());
      }
      console.log("hello");
    });
    console.log("newdata", newData);
    loadData(newData);

    console.log("globaldata", globalData);
  });

  function changeStatusView(selected) {
    if (selected === "pending") {
      pendingResultsContainer.hidden = false;
      revisionResultsContainer.hidden = true;
      revisedResultsContainer.hidden = true;
      publishedResultsContainer.hidden = true;
    }
    if (selected === "for revision") {
      pendingResultsContainer.hidden = true;
      revisionResultsContainer.hidden = false;
      revisedResultsContainer.hidden = true;
      publishedResultsContainer.hidden = true;
    }
    if (selected === "revised") {
      pendingResultsContainer.hidden = true;
      revisionResultsContainer.hidden = true;
      revisedResultsContainer.hidden = false;
      publishedResultsContainer.hidden = true;
    }
    if (selected === "published") {
      pendingResultsContainer.hidden = true;
      revisionResultsContainer.hidden = true;
      revisedResultsContainer.hidden = true;
      publishedResultsContainer.hidden = false;
    }
    if (selected === "submissions") {
      pendingResultsContainer.hidden = false;
      revisionResultsContainer.hidden = false;
      revisedResultsContainer.hidden = false;
      publishedResultsContainer.hidden = false;
    }
  }
  var submissionStatusDropdown = document.querySelector(
    "#submission-status-dropdown"
  );
  submissionStatusDropdown.addEventListener("change", function (e) {
    const selectedStatus = e.target.value;
    changeStatusView(selectedStatus);
  });
  var submissionCategoryDropdown = document.querySelector(
    "#submission-category-dropdown"
  );
  submissionCategoryDropdown.addEventListener("change", function (e) {
    const selectedCategory = e.target.value;
    console.log(selectedCategory);
  });

  //
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
    changeStatusView("pending");
    submissionStatusDropdown.selectedIndex = 0;
  });

  revisionContainer.addEventListener("click", function () {
    changeStatusView("for revision");
    submissionStatusDropdown.selectedIndex = 1;
  });

  revisedContainer.addEventListener("click", function () {
    changeStatusView("revised");
    submissionStatusDropdown.selectedIndex = 2;
  });

  publishedContainer.addEventListener("click", function () {
    changeStatusView("published");
    submissionStatusDropdown.selectedIndex = 3;
  });

  submissionsContainer.addEventListener("click", function () {
    changeStatusView("submissions");
    submissionStatusDropdown.selectedIndex = 4;
  });

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
  getSubmissions().then((data) => loadResults(JSON.parse(data)));
  function loadResults(data) {
    globalData = data;
    // updates the count containers
    updateCounts(globalData["submissions"]);
    loadData(globalData["submissions"]);
    console.log(globalData["submissions"]);
  }

  function updateCounts(data) {
    const pendingCount = data.filter((item) => item.status === "pending");
    const revisionCount = data.filter((item) => item.status === "for revision");
    const revisedCount = data.filter((item) => item.status === "revised");
    const publishedCount = data.filter((item) => item.status === "published");
    pendingContainer.querySelector(".display-4").innerHTML =
      pendingCount.length;
    revisionContainer.querySelector(".display-4").innerHTML =
      revisionCount.length;
    revisedContainer.querySelector(".display-4").innerHTML =
      revisedCount.length;
    publishedContainer.querySelector(".display-4").innerHTML =
      publishedCount.length;
    submissionsContainer.querySelector(".display-4").innerHTML = data.length;
    checkEmptyResults(data);
  }

  function loadData(data) {
    pendingResultsContainer.innerHTML = `<h5>For Approval</h5>
    <hr class="mb-4">
    <!-- results-container shows "No Results!" or something when empty -->
    <div class = "results-container h5 text-secondary text-center" hidden><div>No results found. Try another search filter.</div></div>`;

    revisionResultsContainer.innerHTML = `<h5>For Revision</h5>
    <hr class="mb-4">
    <!-- results-container shows "No Results!" or something when empty -->
    <div class = "results-container h5 text-secondary text-center" hidden><div>No results found. Try another search filter.</div></div>`;

    revisedResultsContainer.innerHTML = `<h5>Revised</h5>
    <hr class="mb-4">
    <!-- results-container shows "No Results!" or something when empty -->
    <div class = "results-container h5 text-secondary text-center" hidden><div>No results found. Try another search filter.</div></div>`;

    publishedResultsContainer.innerHTML = `<h5>Published</h5>
    <hr class="mb-4">
    <!-- results-container shows "No Results!" or something when empty -->
    <div class = "results-container h5 text-secondary text-center" hidden><div>No results found. Try another search filter.</div></div>`;

    data.forEach((result) => {
      if (result["status"] === "pending") {
        if (result["research_title"] !== null) {
          pendingResultsContainer.innerHTML += pendingThesisTemplate(result);
        }
        if (result["infographic_title"] !== null) {
          pendingResultsContainer.innerHTML +=
            pendingInfographicTemplate(result);
        }
        if (result["journal_title"] !== null) {
          pendingResultsContainer.innerHTML += pendingJournalTemplate(result);
        }
      }
      if (result["status"] === "for revision") {
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
      }
      if (result["status"] === "revised") {
        if (result["research_title"] !== null) {
          console.log(result);
          revisedResultsContainer.innerHTML += revisedThesisTemplate(result);
        }

        if (result["infographic_title"] !== null) {
          revisedResultsContainer.innerHTML +=
            revisedInfographicTemplate(result);
        }
        if (result["journal_title"] !== null) {
          revisedResultsContainer.innerHTML += revisedJournalTemplate(result);
        }
      }
      if (result["status"] === "published") {
        if (result["research_title"] !== null) {
          publishedResultsContainer.innerHTML +=
            publishedThesisTemplate(result);
        }
        if (result["infographic_title"] !== null) {
          publishedResultsContainer.innerHTML +=
            publishedInfographicTemplate(result);
        }
        if (result["journal_title"] !== null) {
          publishedResultsContainer.innerHTML +=
            publishedJournalTemplate(result);
        }
      }
    });
    checkEmptyResults(data);
  }

  function logger(data) {
    console.log(typeof data);
    console.log(data);
  }
  function checkEmptyResults(data) {
    const pendingCount = data.filter((item) => item.status === "pending");
    const revisionCount = data.filter((item) => item.status === "for revision");
    const revisedCount = data.filter((item) => item.status === "revised");
    const publishedCount = data.filter((item) => item.status === "published");

    pendingResultsContainer.querySelector(".results-container").hidden = true;
    revisionResultsContainer.querySelector(".results-container").hidden = true;
    revisedResultsContainer.querySelector(".results-container").hidden = true;
    publishedResultsContainer.querySelector(".results-container").hidden = true;

    if (pendingCount.length === 0) {
      pendingResultsContainer.querySelector(
        ".results-container"
      ).hidden = false;
    }
    if (revisionCount.length === 0) {
      revisionResultsContainer.querySelector(
        ".results-container"
      ).hidden = false;
    }
    if (revisedCount.length === 0) {
      revisedResultsContainer.querySelector(
        ".results-container"
      ).hidden = false;
    }
    if (publishedCount.length === 0) {
      publishedResultsContainer.querySelector(
        ".results-container"
      ).hidden = false;
    }
  }
});
