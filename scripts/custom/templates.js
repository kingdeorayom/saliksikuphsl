export function pendingThesisTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${escapeHtml(
                      result.resource_type
                    )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${escapeHtml(result.research_title)}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Submitted on:</span> ${
              result.submitted_on
            }</p>
        </div>
        <hr class="my-1">
       <a href="submissions/view.php?id=${
         result.file_id
       }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
    </div>`;
  return template;
}
export function revisionThesisTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${escapeHtml(
                      result.resource_type
                    )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${escapeHtml(result.research_title)}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Returned on:</span> ${
              result.returned_on
            }</p>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="feedback border bg-white p-1">
                    <p class="fw-bold">Feedback:</p>
                    <p>${escapeHtml(result.feedback)}</p>
                </div>
            </div>
        </div>
        <hr class="my-1">
       <a href="submissions/view.php?id=${
         result.file_id
       }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
    </div>`;
  return template;
}
export function revisedThesisTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
              <div class="row">
                  <div class="col">
                      <div class="text-start">
                      <p class="fw-bold" style="color: #012265;">${escapeHtml(
                        result.resource_type
                      )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <h4 class="">${escapeHtml(result.research_title)}</h4>
              </div>
              
              <div class="row mb-3">
                  <div class="col">
                      <div class="feedback border bg-white p-1">
                          <p class="fw-bold">Feedback:</p>
                          <p>${escapeHtml(result.feedback)}</p>
                      </div>
                  </div>
              </div>
              <hr class="my-1">
             <a href="submissions/view.php?id=${
               result.file_id
             }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
          </div>`;
  return template;
}
export function publishedThesisTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
            <div class="col">
                <div class="text-start">
                <p class="fw-bold" style="color: #012265;">${escapeHtml(
                  result.resource_type
                )} | ${escapeHtml(result.researchers_category)} | ${escapeHtml(
    result.research_unit
  )}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${escapeHtml(result.research_title)}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Submitted on:</span> ${
              result.submitted_on
            }</p>
        </div>
        <hr class="my-1">
       <a href="submissions/view.php?id=${
         result.file_id
       }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
        </div>`;
  return template;
}
export function publishedInfographicTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3">${escapeHtml(result.infographic_title)}</h4>
            </div>
            <div class="row">
                <p><span class="fw-bold">Submitted on:</span> ${
                  result.submitted_on
                }</p>
            </div>
            <hr class="my-1">
           <a href="submissions/view.php?id=${
             result.file_id
           }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
            </div>`;
  return template;
}
export function publishedJournalTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
                  <div class="row">
                      <div class="col">
                          <div class="text-start">
                          <p class="fw-bold" style="color: #012265;">Journal | ${escapeHtml(
                            result.department
                          )}</p>                    </div>
                      </div>
                  </div>
                  <div class="row">
                      <h4 class="">${escapeHtml(result.journal_title)}</h4>
                        <h5 class="mb-3">${escapeHtml(
                          result.journal_subtitle
                        )}</h5>
                  </div>
                    <div class="row">
                    <p><span class="fw-bold">Submitted on:</span> ${
                      result.submitted_on
                    }</p>
                    </div>
                  
                  <hr class="my-1">
                 <a href="submissions/view.php?id=${
                   result.file_id
                 }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
                  </div>`;
  return template;
}
export function publishedReportTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
                  <div class="row">
                      <div class="col">
                          <div class="text-start">
                          <p class="fw-bold" style="color: #012265;">${escapeHtml(
                            result.report_type
                          )}</p></div>
                      </div>
                  </div>
                  <div class="row">
                      <h4 class="">${escapeHtml(result.report_title)}</h4>
                  </div>
                    <div class="row">
                    <p><span class="fw-bold">Submitted on:</span> ${
                      result.submitted_on
                    }</p>
                    </div>
                  
                  <hr class="my-1">
                 <a href="submissions/view.php?id=${
                   result.file_id
                 }"><button class="btn text-light view-button rounded-0 mt-3">Click here to view</button></a>
                  </div>`;
  return template;
}

var entityMap = {
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': "&quot;",
  "'": "&#39;",
  "/": "&#x2F;",
  "`": "&#x60;",
  "=": "&#x3D;",
};

function escapeHtml(string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}
