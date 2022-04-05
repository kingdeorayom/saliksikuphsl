var options = {
  month: "long",
  day: "2-digit",
  year: "numeric",
  hour: "numeric",
  minute: "numeric",
  second: "numeric",
};
export function pendingThesisTemplate(result) {
  var date = new Date(result.submitted_on);
  var strDate = date.toLocaleString("default", options);
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
        <div class="col">
            <div class="text-start">
                <p class="fw-bold" style="color: #012265;">${escapeHtml(
                  result.research_type
                )} | ${escapeHtml(result.researchers_category)} | ${escapeHtml(
    result.research_unit
  )}</p>
            </div>
        </div>
        <div class="col">
            <div class="text-end">
                <a href="submissions/view.php?id=${escapeHtml(
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
        <p><span class="fw-bold">Submitted on:</span> ${escapeHtml(strDate)}</p>
    </div>
    </div>`;
  return template;
}
export function revisionThesisTemplate(result) {
  var date = new Date(result.returned_on);
  var strDate = date.toLocaleString("default", options);
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${escapeHtml(
                      result.research_type
                    )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                </div>
            </div>
            <div class="col">
                    <div class="text-end">
                        <a href="submissions/view.php?id=${escapeHtml(
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
            <p><span class="fw-bold">Returned on:</span> ${strDate}</p>
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
                        result.research_type
                      )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                      </div>
                  </div>
                  <div class="col">
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

export function publishedThesisTemplate(result) {
  var date = new Date(result.published_on);
  var strDate = date.toLocaleString("default", options);
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${escapeHtml(
                      result.research_type
                    )} | ${escapeHtml(
    result.researchers_category
  )} | ${escapeHtml(result.research_unit)}</p>
                </div>
            </div>
        </div>
        <div class="row">
          <a href="../repository/view-article.php?id=${escapeHtml(
            result.file_id
          )}" class="publishedWorkTitle">
            <h4 class="mb-3 publishedWorkTitle">${escapeHtml(
              result.research_title
            )}</h4>
          </a>
        </div>
        <div class="row">
                <p>${escapeHtml(result.research_abstract)}</p>
        </div>
        <div class="row">
            <p><span class="fw-bold">Published on:</span> ${strDate}</p>
        </div>
        </div>`;
  return template;
}
export function publishedInfographicTemplate(result) {
  var date = new Date(result.published_on);
  var strDate = date.toLocaleString("default", options);
  var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"><a href="../repository/view-article.php?id=${escapeHtml(
                  result.file_id
                )}" class="publishedWorkTitle">
                    <h4 class="mb-3 fw-bold publishedWorkTitle">${escapeHtml(
                      result.infographic_title
                    )}</h4>
                    </a>
                    <p class="fw-bold">${escapeHtml(
                      result.infographic_publication_year
                    )}</p>
                </div>
            </div>
            <div class="row">
                    <p>${escapeHtml(result.infographic_description)}</p>
            </div>
            <div class="row">
                <p><span class="fw-bold">Published on:</span> ${strDate}</p>
            </div>
            </div>`;
  return template;
}
export function publishedJournalTemplate(result) {
  var date = new Date(result.published_on);
  var strDate = date.toLocaleString("default", options);
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
                  <a href="../repository/view-article.php?id=${escapeHtml(
                    result.file_id
                  )}" class="publishedWorkTitle">
                      <h4 class="">${escapeHtml(result.journal_title)}</h4>
                      </a>
                        <h5 class="mb-3">${escapeHtml(
                          result.journal_subtitle
                        )}</h5>
                  </div>
                  <div class="row">
                        <p>${escapeHtml(result.journal_description)}</p>
                  </div>
                    <div class="row">
                    <p><span class="fw-bold">Published on:</span> ${strDate}</p>
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
