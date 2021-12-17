export function pendingThesisTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${result.resource_type} | ${result.researchers_category} | ${result.research_unit}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${result.research_title}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Submitted on:</span> ${result.publication_year}-${result.publication_month}-${result.publication_day} TODO: time? 08:52:03</p>
        </div>
        <hr class="my-1">
        <a href="../../layouts/profile-content-admin/submissions/view-approval.php"><button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button></a>
    </div>`;
    return template;
  }
  
  export function pendingInfographicTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic | ${result.infographic_researcher_category} | ${result.infographic_research_unit}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3">${result.infographic_title}</h4>
            </div>
            <div class="row">
                <p><span class="fw-bold">Submitted on:</span> ${result.infographic_publication_year}-${result.infographic_publication_month}-${result.infographic_publication_day} TODO: time? 08:52:03</p>
            </div>
            <hr class="my-1">
            <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
        </div>`;
    return template;
  }
  
  export function pendingJournalTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Journal  | ${result.department}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="">${result.journal_title}</h4>
                <h5 class="mb-3">${result.journal_subtitle}</h5>
            </div>
            <div class="row">
                
            </div>
            <hr class="my-1">
            <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
        </div>`;
    return template;
  }
  
  export function revisionThesisTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${result.resource_type} | ${result.researchers_category} | ${result.research_unit}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${result.research_title}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Returned on:</span> ${result.publication_year}-${result.publication_month}-${result.publication_day} 08:52:03</p>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="feedback border bg-white p-1">
                    <p class="fw-bold">Feedback:</p>
                    <p>${result.feedback}</p>
                </div>
            </div>
        </div>
        <hr class="my-1">
        <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
    </div>`;
    return template;
  }
  
  export function revisionInfographicTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;"> Infographic | ${result.infographic_researcher_category} | ${result.infographic_research_unit}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${result.infographic_title}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Returned on:</span> ${result.infographic_publication_year}-${result.infographic_publication_month}-${result.infographic_publication_day} 08:52:03</p>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="feedback border bg-white p-1">
                    <p class="fw-bold">Feedback:</p>
                    <p>${result.feedback}</p>
                </div>
            </div>
        </div>
        <hr class="my-1">
        <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
    </div>`;
    return template;
  }
  export function revisionJournalTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
            <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;"> Journal | ${result.department} </p>
                    </div>
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
            <hr class="my-1">
            <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
        </div>`;
    return template;
  }
  
  export function revisedThesisTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
            <div class="row">
                <div class="col">
                    <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${result.resource_type} | ${result.researchers_category} | ${result.research_unit}</p>
                    </div>
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
            <hr class="my-1">
            <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
        </div>`;
    return template;
  }
  
  export function revisedInfographicTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
                <div class="row">
                    <div class="col">
                        <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic | ${result.infographic_researcher_category} | ${result.infographic_research_unit}</p>                    </div>
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
                <hr class="my-1">
                <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
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
                  <hr class="my-1">
                  <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
              </div>`;
    return template;
  }
  
  export function publishedThesisTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
    <div class="row">
            <div class="col">
                <div class="text-start">
                    <p class="fw-bold" style="color: #012265;">${result.resource_type} | ${result.researchers_category} | ${result.research_unit}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="mb-3">${result.research_title}</h4>
        </div>
        <div class="row">
            <p><span class="fw-bold">Submitted on:</span> ${result.publication_year}-${result.publication_month}-${result.publication_day} TODO: time? 08:52:03</p>
        </div>
        <hr class="my-1">
        <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
    </div>`;
    return template;
  }
  export function publishedInfographicTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
        <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Infographic | ${result.infographic_researcher_category} | ${result.infographic_research_unit}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4 class="mb-3">${result.infographic_title}</h4>
            </div>
            <div class="row">
                <p><span class="fw-bold">Submitted on:</span> ${result.infographic_publication_year}-${result.infographic_publication_month}-${result.infographic_publication_day} TODO: time? 08:52:03</p>
            </div>
            <hr class="my-1">
            <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
        </div>`;
    return template;
  }
  export function publishedJournalTemplate(result) {
    var template = `<div class="box p-3 my-3" style="background-color: #f5f5f5;">
                  <div class="row">
                      <div class="col">
                          <div class="text-start">
                          <p class="fw-bold" style="color: #012265;">Journal | ${result.department}</p>                    </div>
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
                  <hr class="my-1">
                  <button class="btn text-light rounded-0 mt-3" style="background-color: #012265;">Click here to view</button>
              </div>`;
    return template;
  }
  