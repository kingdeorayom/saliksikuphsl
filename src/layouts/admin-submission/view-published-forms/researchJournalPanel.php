<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../../layouts/general/error.php");
    die();
}

?>
<div class="row my-3 d-lg-none">
    <h5>Submission Details</h5>
    <hr>
    <p class="side-menu-text">Submitted by:</p>
    <p class="side-menu-text" name="author-submitted">Juan Dela Cruz</p>
    <hr>
    <p class="side-menu-text">Submitted on:</p>
    <p class="side-menu-text" name="date-submitted">2021-11-17 08:52:03</p>
    <hr>
</div>
<div class="row">
    <div class="col-lg-2 d-none d-md-none d-lg-block">
        <!--col-md-12 to stack on top of next column. remove display-none-->
        <h5>Submission Details</h5>
        <hr>
        <p class="side-menu-text">Submitted by:</p>
        <p class="side-menu-text" name="author-submitted">Juan Dela Cruz</p>
        <hr>
        <p class="side-menu-text">Submitted on:</p>
        <p class="side-menu-text" name="date-submitted">2021-11-17 08:52:03</p>
        <hr>
    </div>
    <div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchJournalPanel">
        <!-- container for alert messages -->
        <div id='alert-container-journal'>

        </div>
        <!-- container for alert messages -->
        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <form onsubmit="submitJournalForm(event)" name="journal-form" data-id=<?php echo $fileInfo['file_id'] ?>>
            <div class="row mt-4">
                <div>
                    <label class="fw-bold">Title<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldJournalTitle" value="<?php echo $fileInfo['journal_title'] ?>" required>
                    <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"The Lighthouse"</span>.</p>
                </div>
            </div>
            <div class="row">
                <div>
                    <label class="fw-bold">Sub-title</label>
                    <input type="text" class="form-control" name="textFieldJournalSubTitle" value="<?php echo $fileInfo['journal_subtitle'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="py-2 fw-bold">College/Department<span class="text-danger"> *</span></label>

                    <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                        <?php foreach ($department_list as $key => $row) : ?>
                            <option value="<?php echo $row['name'] ?>" <?= $fileInfo['department'] == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                        <?php endforeach ?>
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
                    <input type="number" class="form-control" name="textFieldVolumeNumber" value=<?php echo $fileInfo['volume_number'] ?> required>
                </div>
                <div class="col-lg-12 d-sm-block d-lg-none">
                    <label class="py-2 fw-bold">Serial/Issue Number*</label>
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="number" class="form-control" name="textFieldSerialIssueNumber" value=<?php echo $fileInfo['serial_issue_number'] ?> required>
                </div>
                <div class="col-lg-12 d-sm-block d-lg-none">
                    <label class="py-2 fw-bold">ISSN</label>
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldISSN" value=<?php echo $fileInfo['ISSN'] ?> required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="py-2 fw-bold">Editor-in-Chief<span class="text-danger"> *</span></label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldChiefEditorFirstName" placeholder="First Name*" value=<?php echo $fileInfo['chief_editor_first_name'] ?> required>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldChiefEditorMiddleInitial" placeholder="Middle Initial" value=<?php echo $fileInfo['chief_editor_middle_initial'] ?>>
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldChiefEditorLastName" placeholder="Surname*" value=<?php echo $fileInfo['chief_editor_last_name'] ?> required>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldChiefEditorNameExtension" placeholder="Extension" value=<?php echo $fileInfo['chief_editor_name_ext'] ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12 mb-2">
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldEmail" value=<?php echo $fileInfo['chief_editor_email'] ?> required>
                    <label class="text-secondary mt-2">Consider your active email address</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="my-3">
                        <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                        <textarea class="form-control" name="textAreaDescription" rows="10" required><?php echo $fileInfo['journal_description'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <label class="fw-bold mb-3">Attached Files</label>
                <div class="col">
                    <label class="my-2" id="journal-cover">Front Cover.png</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                    </div>
                    <label class="my-2" id="journal-file-name">Journal.pdf</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row" id="publishButtonJournal">
                <div class="col">
                    <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Edit" id="submitJournalButton">
                </div>
            </div>


        </form>
    </div>
    <script>
        var alertContainerJournal = document.getElementById("alert-container-journal")
        var journalForm = document.forms.namedItem("journal-form");

        function submitJournalForm(event) {
            event.preventDefault();
            const fileId = event.target.dataset.id

            var formdata = new FormData(journalForm);
            formdata.append("fileId", fileId);
            updateJournal(formdata).then(data => checkResponse(JSON.parse(data)));
            //     for (var pair of formdata.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }
            window.scrollTo(0, 0);
        }

        function updateJournal(data) {
            return new Promise((resolve, reject) => {
                var http = new XMLHttpRequest();
                http.open("POST", "../../process/update-file.php");
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
                alertContainerJournal.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File updated successfully!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }
        }
    </script>