export function publishedThesis(result) {
  var template = `<hr class="my-1"><div class="box p-3 my-3">
  <div class="row">
          <div class="col">
              <div class="text-start">
                  <p class="fw-bold" style="color: #012265;">${result.resource_type} | ${result.researchers_category} | ${result.research_unit}</p>
              </div>
          </div>
      </div>
      <div class="row">
          <h4 class="mb-3">${result.research_title}</h4>
          <p class="fw-bold">${result.researcher_surname}, ${result.researcher_first_name}</p>
      </div>
      <div class="row">
          <p><span class="fw-bold">Submitted on:</span> ${result.publication_year}-${result.publication_month}-${result.publication_day} 08:52:03</p>
      </div>
      <hr class="my-1">
      <a href="../../layouts/admin-submission/view-published.php?id=${result.file_id}"><button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button></a>
      </div>`;

  return template;
}

export function publishedInfographic(result) {
  var template = `${result.file_type}`;

  return template;
}

export function publishedJournal(result) {
  var template = `<hr class="my-1"><div class="box p-3 my-3">
  <div class="row">
      <div class="col">
          <div class="text-start">
          <p class="fw-bold" style="color: #012265;"> Journal | ${result.department}</p>                    </div>
      </div>
  </div>
  <div class="row">
      <h4 class="">${result.journal_title}</h4>
        <h5 class="mb-3">${result.journal_subtitle}</h5>
  </div>
  
  
  <hr class="my-1">
  <a href="../../layouts/admin-submission/view-published.php?id=${result.file_id}"><button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button></a>
  </div>`;

  return template;
}
