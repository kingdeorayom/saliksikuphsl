document.addEventListener("DOMContentLoaded", function () {
  console.log("make ajax call here");
  getSubmissions().then((data) => loadResults(JSON.parse(data)));
});

function getSubmissions() {
  return new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../../../src/process/get-submissions.php");
    xhr.onload = () =>
      xhr.status == 200 ? resolve(xhr.response) : reject(Error(xhr.statusText));
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

  var resultsContainer = document.querySelector("#results-container");
  var pendingContainer = document.querySelector("#pending-container");
  var revisionContainer = document.querySelector("#revision-container");
  var revisedContainer = document.querySelector("#revised-container");
  var publishedContainer = document.querySelector("#published-container");
  var submissionsContainer = document.querySelector("#submissions-container");

  pendingContainer.innerHTML = data.pending.length;
  revisionContainer.innerHTML = data.forRevision.length;
  revisedContainer.innerHTML = data.forRevision.length;
  publishedContainer.innerHTML = data.published.length;
  submissionsContainer.innerHTML = data.submissions.length;

  console.log(resultsContainer);
  for (var key in data) {
    // console.log(key, data[key]);
    data[key].forEach((item) => {
      if (item.hasOwnProperty("research_title")) {
        resultsContainer.innerHTML += item["research_title"];
      }
      if (item.hasOwnProperty("journal_title")) {
        resultsContainer.innerHTML += item["journal_title"];
      }
    });
  }
}
