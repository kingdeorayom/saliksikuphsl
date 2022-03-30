export function pendingThesisTemplate(result) {
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
        <div class="col">
            <div class="text-end">
                <a href="../../layouts/user-submission/view-submission.php?id=${escapeHtml(
                  result.file_id
                )}" class="editReviseButton">
                    <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <h4 class="mb-3">${escapeHtml(result.research_title)}</h4>
    </div>
    
    <div class="row">
        <p><span class="fw-bold">Submitted on:</span> ${escapeHtml(
          result.submitted_on
        )}</p>
    </div>
    </div>`;
  return template;
}

export function pendingInfographicTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic </p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3">${escapeHtml(result.infographic_title)}</h4>
            </div>
            <div class="row">
                <p><span class="fw-bold">Submitted on:</span> ${escapeHtml(
                  result.submitted_on
                )}</p>
            </div>
        </div>`;
  return template;
}

export function pendingJournalTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Journal  | ${escapeHtml(
                          result.department
                        )}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="">${escapeHtml(result.journal_title)}</h4>
                <h5 class="mb-3">${escapeHtml(result.journal_subtitle)}</h5>
            </div>
            <div class="row">
                
            </div>
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
            <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-revision.php?id=${escapeHtml(
                          result.file_id
                        )}" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Revise</p>
                        </a>
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
        </div>`;
  return template;
}

export function revisionInfographicTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;"> Infographic</p>
                </div>
            </div>
            <div class="col">
                    <div class="text-end">
                    <a href="../../layouts/user-submission/view-revision.php" class="editReviseButton">
                        <p class="fw-bold"><i class="fas fa-edit"></i> Revise</p>
                    </a>
                    </div>
                </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${escapeHtml(result.infographic_title)}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Returned on:</span> ${escapeHtml(
              result.returned_on
            )}</p>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="feedback border bg-white p-1">
                    <p class="fw-bold">Feedback:</p>
                    <p>${escapeHtml(result.feedback)}</p>
                </div>
            </div>
        </div>
        </div>`;
  return template;
}
export function revisionJournalTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
            <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;"> Journal | ${escapeHtml(
                          result.department
                        )} </p>
                    </div>
                </div>
                <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-revision.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Revise</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="">${escapeHtml(result.journal_title)}</h4>
                  <h5 class="mb-3">${escapeHtml(result.journal_subtitle)}</h5>
            </div>
            <div class="row">
            <p><span class="fw-bold">Returned on:</span> ${escapeHtml(
              result.returned_on
            )}</p>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="feedback border bg-white p-1">
                        <p class="fw-bold">Feedback:</p>
                        <p>${escapeHtml(result.feedback)}</p>
                    </div>
                </div>
            </div>
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
                  <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                        </a>
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
              </div>`;
  return template;
}

export function revisedInfographicTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
          <div class="row">
              <div class="col">
                  <div class="text-start">
                      <p class="fw-bold" style="color: #012265;"> Infographic | ${escapeHtml(
                        result.infographic_researcher_category
                      )} | ${escapeHtml(result.infographic_research_unit)}</p>
                  </div>
              </div>
              <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                        </a>
                    </div>
                </div>
          </div>
          <div class="row">
              <h4 class="mb-3">${result.infographic_title}</h4>
          </div>
          <div class="row">
              <p><span class="fw-bold">Returned on:</span> ${
                result.infographic_publication_year
              }-${result.infographic_publication_month}-${
    result.infographic_publication_day
  } 08:52:03</p>
          </div>
          <div class="row mb-3">
              <div class="col">
                  <div class="feedback border bg-white p-1">
                      <p class="fw-bold">Feedback:</p>
                      <p>${result.feedback}</p>
                  </div>
              </div>
          </div>
          </div>`;
  return template;
}

export function revisedJournalTemplate(result) {
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
                  <div class="row">
                      <div class="col">
                          <div class="text-start">
                          <p class="fw-bold" style="color: #012265;">Journal | ${result.department}</p>                    </div>
                        </div>
                  </div>
                  <div class="col">
                    <div class="text-end">
                        <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                            <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                        </a>
                    </div>
                </div>
                  <div class="row">
                      <h4 class="">${result.journal_title}</h4>
                        <h5 class="mb-3">${result.journal_subtitle}</h5>
                  </div>
                  
                  <div class="row mb-3">
                      <div class="col">
                          <div class="feedback border bg-white p-1">
                              <p class="fw-bold">Feedback:</p>
                              <p>${result.feedback}</p>
                          </div>
                      </div>
                  </div>
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
                <p>${escapeHtml(result.research_abstract)}</p>
        </div>
        <div class="row">
            <p><span class="fw-bold">Published on:</span> ${escapeHtml(
              result.published_on
            )}</p>
        </div>
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
                <div class="col">
                    <h4 class="mb-3 fw-bold">${escapeHtml(
                      result.infographic_title
                    )}</h4>
                    <p class="fw-bold">${escapeHtml(
                      result.infographic_publication_year
                    )}</p>
                </div>
            </div>
            <div class="row">
                    <p>${escapeHtml(result.infographic_description)}</p>
            </div>
            <div class="row">
                <p><span class="fw-bold">Published on:</span> ${escapeHtml(
                  result.published_on
                )}</p>
            </div>
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
                        <p>${escapeHtml(result.journal_description)}</p>
                  </div>
                    <div class="row">
                    <p><span class="fw-bold">Published on:</span> ${escapeHtml(
                      result.published_on
                    )}</p>
                    </div>
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
