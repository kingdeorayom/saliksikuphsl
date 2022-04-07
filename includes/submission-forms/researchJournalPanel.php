<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

?>

<div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchJournalPanel" hidden>
    <!-- container for alert messages -->
    <div class="row my-3">
        <label class="my-2" id="fileUploadLabelJournal" hidden>Uploading your file...</label>

        <div class="progress" id='journal-progress-container' hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="journal-progress-bar">0%</div>
        </div>
    </div>
    <div id='alert-container-journal'>

    </div>
    <!-- container for alert messages -->
    <h1 class="my-2">Research Journal Submission Form</h1>
    <hr>
    <form name="journal-form">
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
                <label class="py-2 fw-bold d-none d-lg-block">Series<span class="text-danger"> *</span></label>
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
                <label class="py-2 fw-bold">Series*</label>
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
                <label class="fw-bold">Email<span class="text-danger"></span></label>
                <input type="email" class="form-control" name="textFieldEmail">
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

        <div class="row my-2">
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Front Cover<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" id="formFile" name="journalCoverFile" accept=".png, .jpg, .jpeg" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>JPG</strong>, <strong>JPEG</strong>, or <strong>PNG</strong> file format.</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-0">
                    <label class="fw-bold mb-3">Attach Journal Copy<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" name="journalFile" accept=".pdf" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>PDF</strong> file format.</label>
                </div>
            </div>
        </div>
        <hr>
        <?php if ($_SESSION['userType'] != 'admin') {
            echo '<div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgreeJournal">
                <label for="checkBoxAgreeJournal">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>';
        } ?>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0 my-3" value="Submit your work" id="submitJournalButton" <?php if ($_SESSION['userType'] !== "admin") {
                                                                                                                                                    echo 'disabled';
                                                                                                                                                } ?>>
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">
    $("form[name='journal-form']").on("submit", function(event) {
        event.preventDefault();
        $("#journal-progress-container").prop('hidden', false);
        $("#fileUploadLabelJournal").prop('hidden', false);
        var formData = new FormData(this);
        window.scrollTo(0, 0);
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100)
                        $('#journal-progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                    }
                })
                return xhr;
            },
            method: "POST",
            url: "src/process/journal-submission.php",
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {

            $("#journal-progress-container").prop('hidden', true);
            $("#fileUploadLabelJournal").prop('hidden', true);
            if (data.response === "type_error") {
                $("#alert-container-journal").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.response === "input_error") {
                $("#alert-container").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert">Form Validation Error. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "generic_error") {
                $("#alert-container-journal").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "size_error") {
                $("#alert-container-journal").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response == "duplicate_error") {
                $("#alert-container-journal").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "success") {
                $("#alert-container-journal").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking <strong>My Submissions</strong> under <strong>My Profile</strong>.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                document.forms.namedItem("journal-form").reset();
            }
        })
    })
</script>