<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

?>

<div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="reportsPanel" hidden>
    <!-- container for alert messages -->
    <div class="row my-3">
        <label class="my-2" id="fileUploadLabelReports" hidden>Uploading your file...</label>

        <div class="progress" id='reports-progress-container' hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="reports-progress-bar">0%</div>
        </div>
    </div>
    <div id='alert-container-reports'>

    </div>
    <!-- container for alert messages -->
    <h1 class="my-2">Research Reports Submission Form</h1>
    <hr>
    <form onsubmit="submitReportsForm(event)" name="reports-form">
        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <label class="py-2 fw-bold">Resource Type<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="dropdownResourceTypeReports">
                    <option value="Annual Report" selected>Annual Report</option>
                    <option value="Research Agenda">Research Agenda</option>
                    <option value="Research Competency Development Program">Research Competency Development Program</option>
                    <option value="Research Catalog">Research Catalog</option>
                </select>
            </div>
        </div>
        <div>
            <label class="fw-bold">Report Title<span class="text-danger"> *</span></label>
            <input type="text" class="form-control" name="textFieldReportsTitle" required>
            <p class="text-secondary my-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"Institutional Research Agenda"</span>.</p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <label class="py-2 fw-bold">Publication Year/Year of Effectivity<span class="text-danger"> *</span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldPublicationDate" required>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                <textarea class="form-control" name="textAreaDescription" rows="10" required></textarea>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Front Cover<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" id="formFile" name="reportsCoverFile" accept=".png, .jpg, .jpeg" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>JPG</strong>, <strong>JPEG</strong>, or <strong>PNG</strong> file format.</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach File<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" name="reportsFile" accept=".pdf" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> File must be in <strong>PDF</strong> file format.</label>
                </div>
            </div>
        </div>
        <hr>
        <?php if ($_SESSION['userType'] != 'admin') {
            echo '<div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgreeReports">
                <label for="checkBoxAgreeReports">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>';
        } ?>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0 my-3" value="Submit" id="submitReportsButton" <?php if ($_SESSION['userType'] !== "admin") {
                                                                                                                                                    echo 'disabled';
                                                                                                                                                } ?>>
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">
    $("form[name='reports-form']").on("submit", function(event) {
        event.preventDefault();
        $("#reports-progress-container").prop('hidden', false);
        $("#fileUploadLabelReports").prop('hidden', false);
        var formData = new FormData(this);
        window.scrollTo(0, 0);
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100)
                        $('#reports-progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                    }
                })
                return xhr;
            },
            method: "POST",
            url: "../../process/reports-submission",
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {

            $("#reports-progress-container").prop('hidden', true);
            $("#fileUploadLabelReports").prop('hidden', true);
            if (data.response === "type_error") {
                $("#alert-container-reports").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.response === "generic_error") {
                $("#alert-container-reports").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "size_error") {
                $("#alert-container-reports").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response == "duplicate_error") {
                $("#alert-container-reports").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "success") {
                $("#alert-container-reports").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                document.forms.namedItem("reports-form").reset();
            }
        })
    })
</script>