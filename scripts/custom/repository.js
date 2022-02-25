import {
  publishedThesis,
  publishedInfographic,
  publishedJournal,
} from "./repository-templates.js";

document.addEventListener("DOMContentLoaded", function () {
  const resultsContainer = document.querySelector("#results-container");

  getPublished().then((item) => {
    displayResults(JSON.parse(item).published);
  });

  function displayResults(results) {
    console.log(results);
    results.forEach((result) => {
      if (result["file_type"] === "thesis") {
        resultsContainer.innerHTML += publishedThesis(result);
      } else if (result["file_type"] === "journal") {
        resultsContainer.innerHTML += publishedJournal(result);
      } else if (result["file_type"] === "infographic") {
      }
    });
  }
  function getPublished() {
    return new Promise(function (resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../../../src/process/get-published.php");

      xhr.onload = () =>
        xhr.status == 200
          ? resolve(xhr.response)
          : reject(Error(xhr.statusText));
      xhr.send();
    });
  }
});
