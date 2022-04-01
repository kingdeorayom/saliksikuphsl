import {
  pendingThesisTemplate,
  revisionThesisTemplate,
  revisedThesisTemplate,
  publishedThesisTemplate,
  publishedInfographicTemplate,
  publishedJournalTemplate,
} from "./user-submissions-template.js";

$(document).ready(function () {
  $.ajax({
    method: "POST",
    url: "../src/process/get-user-submissions.php",
    contentType: false,
    processData: false,
  }).done(function (data) {
    loadData(data);
  });
});
function loadData(data) {
  data.forEach((result) => {
    if (result["status"] == "pending") {
      if (result["file_type"] == "thesis") {
        $("#pending-container").append(pendingThesisTemplate(result));
      }
    } else if (result["status"] == "for revision") {
      if (result["file_type"] == "thesis") {
        $("#revision-container").append(revisionThesisTemplate(result));
      }
    } else if (result["status"] == "revised") {
      if (result["file_type"] == "thesis") {
        $("#revised-container").append(revisedThesisTemplate(result));
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
  // code to show message if no results are found
  if ($(".submissions > div > div").length == 0) {
    $(".submissions").html("no results");
  }
  if ($(".published > div > div").length == 0) {
    $(".published").html("no results");
  }
}
