<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
}

?>

<div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchJournalPanel">
    <!-- container for alert messages -->
    <div id='alert-container-journal'>

    </div>
    <!-- container for alert messages -->
    <h1 class="my-2">File Upload Information</h1>
    <hr>
    <form onsubmit="submitJournalForm(event)" name="journal-form">
        <div class="row mt-4">
            <div>
                <label class="fw-bold">Title<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldJournalTitle" required>
                <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"The Lighthouse"</span>.</p>
            </div>
        </div>
        <div class="row">
            <div>
                <label class="fw-bold">Sub-title</label>
                <input type="text" class="form-control" name="textFieldJournalSubTitle">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 col-sm-12">
                <label class="py-2 fw-bold">College/Department<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                    <option value="Basic Education" selected>Basic Education</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="Arts and Sciences">Arts and Sciences</option>
                    <option value="Business and Accountancy">Business and Accountancy</option>
                    <option value="Computer Studies">Computer Studies</option>
                    <option value="Criminology">Criminology</option>
                    <option value="Education">Education</option>
                    <option value="Engineering, Architecture and Aviation">Engineering, Architecture and Aviation</option>
                    <option value="Law">Law</option>
                    <option value="Maritime Education">Maritime Education</option>
                    <option value="International Hospitality Management">International Hospitality Management</option>
                    <option value="Graduate School">Graduate School</option>
                    <option value="Support Services">Support Services</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4">
                <label class="py-2 fw-bold">Volume Number<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-4">
                <label class="py-2 fw-bold d-none d-lg-block">Serial/Issue Number<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-4">
                <label class="py-2 fw-bold d-none d-lg-block">ISSN<span class="text-danger"> *</span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="number" class="form-control" name="textFieldVolumeNumber" required>
            </div>
            <div class="col-lg-12 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Serial/Issue Number*</label>
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="number" class="form-control" name="textFieldSerialIssueNumber" required>
            </div>
            <div class="col-lg-12 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">ISSN</label>
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldISSN" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="py-2 fw-bold">Editor-in-Chief<span class="text-danger"> *</span></label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorFirstName" placeholder="First Name*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorMiddleInitial" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorLastName" placeholder="Surname*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorNameExtension" placeholder="Extension">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmail" required>
                <label class="text-secondary mt-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="my-3">
                    <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textAreaDescription" rows="10" required></textarea>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <label class="fw-bold mb-3">Attached Files</label>
            <div class="col">
                <p class="my-3">File1.pdf</p>
                <p class="text-danger remove-attachment"><i class="fas fa-trash-alt"></i> Remove attachment</p>
                <input class="form-control" type="file" name="" accept=".pdf" required>
                <p class="my-3">File2.pdf</p>
                <p class="text-danger remove-attachment"><i class="fas fa-trash-alt"></i> Remove attachment</p>
                <input class="form-control" type="file" name="" accept=".pdf" required>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Feedback<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textAreaFeedbackJournal" rows="10" required placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. "></textarea>
                </div>
            </div>
        </div>

        <hr>
        <div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgreeJournal" onclick="enableDisableResubmitButtonJournal(this);">
                <label for="checkBoxAgreeJournal">I have followed and fulfilled all the recommendations stated in the feedback.</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary button-submit-research rounded-0" value="Resubmit" id="resubmitButtonJournal" disabled>Resubmit</button>
            </div>
        </div>

    </form>
</div>
<script>
    var alertContainerJournal = document.getElementById("alert-container-journal")
    var form = document.forms.namedItem("journal-form");

    function submitJournalForm(event) {
        event.preventDefault();

        var formdata = new FormData(form);
        postJournal(formdata).then(data => checkResponse(JSON.parse(data)));
        //     for (var pair of formdata.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]); 
        // }
        window.scrollTo(0, 0);
    }

    function postJournal(data) {
        return new Promise((resolve, reject) => {
            var http = new XMLHttpRequest();
            http.open("POST", "../../process/journal-submission.php");
            http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
            http.onerror = (e) => reject(Error(`Networking error: ${e}`));
            http.send(data);

        });
    }

    function checkResponse(data) {
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
            form.reset();
            alertContainerJournal.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }
    }
</script>