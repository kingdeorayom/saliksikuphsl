var alertContainerJournal = document.getElementById("alert-container-journal");
var journalForm = document.forms.namedItem("journal-form");

function submitJournalForm(event) {
  event.preventDefault();

  var formdata = new FormData(journalForm);
  postJournal(formdata).then((data) => checkResponseJournal(JSON.parse(data)));
  //     for (var pair of formdata.entries()) {
  //     console.log(pair[0]+ ', ' + pair[1]);
  // }
  window.scrollTo(0, 0);
}
function postJournal(data) {
  return new Promise((resolve, reject) => {
    var http = new XMLHttpRequest();
    http.open("POST", "../../process/journal-submission.php");
    http.onload = () =>
      http.status == 200
        ? resolve(http.response)
        : reject(Error(http.statusText));
    http.onerror = (e) => reject(Error(`Networking error: ${e}`));
    http.send(data);
  });
}

function checkResponseJournal(data) {
  if (data.response === "type_error") {
    alertContainerJournal.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "generic_error") {
    alertContainerJournal.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "size_error") {
    alertContainerJournal.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "duplicate_error") {
    alertContainerJournal.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "success") {
    journalForm.reset();
    alertContainerJournal.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
}
