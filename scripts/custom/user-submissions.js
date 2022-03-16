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
} from "./user-submissions-template.js";

$(document).ready(function () {
  $.ajax({
    method: "POST",
    url: "../../../src/process/get-user-submissions.php",
    contentType: false,
    processData: false,
  }).done(function (data) {
    loadData(data);
  });
});
function loadData(data) {
  console.table(data);
  //   $("#results-container").html("");
  data.forEach((result) => {
    if (result["status"] == "pending") {
      if (result["file_type"] == "thesis") {
        $("#pending-container").append(pendingThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#pending-container").append(pendingJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#pending-container").append(pendingInfographicTemplate(result));
      }
    } else if (result["status"] == "for revision") {
      if (result["file_type"] == "thesis") {
        $("#revision-container").append(revisionThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#revision-container").append(revisionJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#revision-container").append(revisionInfographicTemplate(result));
      }
    } else if (result["status"] == "revised") {
      if (result["file_type"] == "thesis") {
        $("#results-container").append(revisedThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#results-container").append(revisedJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#results-container").append(revisedInfographicTemplate(result));
      }
    } else if (result["status"] == "published") {
      if (result["file_type"] == "thesis") {
        $("#published-container").append(publishedThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#published-container").append(publishedJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#published-container").append(publishedInfographicTemplate(result));
      }
    }
  });
}
