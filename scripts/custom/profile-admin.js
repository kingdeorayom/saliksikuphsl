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
$(document).ready(function () {
  submitData();
});
$("#submission-status-dropdown").on("change", function () {
  submitData();
});
$("#submission-category-dropdown").on("change", function () {
  submitData();
});
$("#admin-search-button").on("click", function () {
  submitData();
});
// =========================== counters ==============================
$("#pending-container").on("click", function () {
  $("#submission-status-dropdown").val("pending").trigger("change");
});
$("#revision-container").on("click", function () {
  $("#submission-status-dropdown").val("for revision").trigger("change");
});
$("#revised-container").on("click", function () {
  $("#submission-status-dropdown").val("revised").trigger("change");
});
$("#published-container").on("click", function () {
  $("#submission-status-dropdown").val("published").trigger("change");
});
$("#submissions-container").on("click", function () {
  $("#submission-status-dropdown").val("submissions").trigger("change");
});
// =========================== counters ==============================

function submitData() {
  var formData = new FormData();
  formData.append("title_query", $("#search-submissions-admin").val());
  formData.append("status_view", $("#submission-status-dropdown").val());
  formData.append("sort_by", $("#submission-category-dropdown").val());
  $.ajax({
    method: "POST",
    url: "../../../src/process/get-submissions.php",
    contentType: false,
    processData: false,
    data: formData,
  }).done(function (data) {
    updateCounters(data["result_count"]);
    loadData(data["result"]);
  });
}

function loadData(data) {
  $("#results-container").html("");
  data.forEach((result) => {
    if (result["status"] == "pending") {
      if (result["file_type"] == "thesis") {
        $("#results-container").append(pendingThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#results-container").append(pendingJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#results-container").append(pendingInfographicTemplate(result));
      }
    } else if (result["status"] == "for revision") {
      if (result["file_type"] == "thesis") {
        $("#results-container").append(revisionThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#results-container").append(revisionJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#results-container").append(revisionInfographicTemplate(result));
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
        $("#results-container").append(publishedThesisTemplate(result));
      } else if (result["file_type"] == "journal") {
        $("#results-container").append(publishedJournalTemplate(result));
      } else if (result["file_type"] == "infographic") {
        $("#results-container").append(publishedInfographicTemplate(result));
      }
    }
  });
}
function updateCounters(data) {
  var total_submissions = 0;
  data.forEach((element) => {
    total_submissions += element.count;
    if (element.status == "pending") {
      $("#pending-container .display-4").html(element.count);
    } else if (element.status == "for revision") {
      $("#revision-container .display-4").html(element.count);
    } else if (element.status == "revised") {
      $("#revised-container .display-4").html(element.count);
    } else if (element.status == "published") {
      $("#published-container .display-4").html(element.count);
    }
  });
  $("#submissions-container .display-4").html(total_submissions);
}
