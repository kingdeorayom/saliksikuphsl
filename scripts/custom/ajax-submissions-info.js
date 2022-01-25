var alertContainerInfographic = document.getElementById(
  "alert-container-infographic"
);
var infographicForm = document.forms.namedItem("infographic-form");

function submitFormInfographic(event) {
  event.preventDefault();

  var formdata = new FormData(infographicForm);
  postInfographic(formdata).then((data) =>
    checkResponseInfographic(JSON.parse(data))
  );
  //     for (var pair of formdata.entries()) {
  //     console.log(pair[0]+ ', ' + pair[1]);
  // }
  window.scrollTo(0, 0);
}

function postInfographic(data) {
  return new Promise((resolve, reject) => {
    var http = new XMLHttpRequest();
    http.open("POST", "../../process/infographic-submission.php");
    http.onload = () =>
      http.status == 200
        ? resolve(http.response)
        : reject(Error(http.statusText));
    http.onerror = (e) => reject(Error(`Networking error: ${e}`));
    http.send(data);
  });
}

function checkResponseInfographic(data) {
  if (data.response === "type_error") {
    alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "generic_error") {
    alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "size_error") {
    alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "duplicate_error") {
    alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
  if (data.response === "success") {
    infographicForm.reset();
    alertContainerInfographic.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
  }
}
