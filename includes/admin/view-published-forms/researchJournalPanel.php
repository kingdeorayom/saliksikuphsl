<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../../error.php");
    die();
}

?>
<div class="row my-3 d-lg-none">
    <h5>Submission Details</h5>
    <hr>
    <p class="side-menu-text">Submitted by:</p>
    <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader']; ?></p>
    <hr>
    <p class="side-menu-text">Submitted on:</p>
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on']; ?></p>
    <hr>
    <p class="side-menu-text">Published on:</p>
    <p class="side-menu-text" name="date-published"><?php echo $fileInfo['published_on']; ?></p>
    <hr>
</div>
<div class="row">
    <div class="col-lg-2 d-none d-md-none d-lg-block">
        <!--col-md-12 to stack on top of next column. remove display-none-->
        <h5>Submission Details</h5>
        <hr>
        <p class="side-menu-text">Submitted by:</p>
        <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader']; ?></p>
        <hr>
        <p class="side-menu-text">Submitted on:</p>
        <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on']; ?></p>
        <hr>
        <p class="side-menu-text">Published on:</p>
        <p class="side-menu-text" name="date-published"><?php echo $fileInfo['published_on']; ?></p>
        <hr>
    </div>
    <div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchJournalPanel">
        <!-- container for alert messages -->
        <div id='alert-container-journal'>

        </div>
        <!-- container for alert messages -->
        <?php if (isset($_SESSION['deleteFail'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Cannot delete record. Please try again.</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;
                    unset($_SESSION['deleteFail']); ?>
        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <form name="journal-form" data-id=<?php echo $fileInfo['file_id'] ?>>
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
                    <label class="py-2 fw-bold d-none d-lg-block">Series<span class="text-danger"> *</span></label>
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
                    <label class="py-2 fw-bold">Series*</label>
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
                    <label class="my-2"><a href="../../src/<?php echo htmlspecialchars($fileInfo['file_dir']) ?>" target="_blank"><?php echo htmlspecialchars($fileInfo['file_name']) ?></a></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name='file1Shown' <?php if ($fileInfo['file1_shown']) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                    </div>
                    <label class="my-2"><a href="../../src/<?php echo htmlspecialchars($fileInfo['file_dir2']) ?>" target="_blank"><?php echo htmlspecialchars($fileInfo['file_name2']) ?></a></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefaultTwo" name='file2Shown' <?php if ($fileInfo['file2_shown']) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefaultTwo">Show in Repository</label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row" id="publishButtonJournal">
                <div class="col">
                    <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Save changes" id="submitJournalButton">
                </div>
                <div class="col text-end">
                    <button class='btn btn-link text-danger rounded-0 delete-article' type="button" data-bs-toggle='modal' data-bs-target='#modalDelete'><i class='fas fa-trash-alt'></i> Delete</button>
                </div>
            </div>

             <div class='modal fade' id='modalDelete' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Delete this article?</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <label>This will delete this record from database and won't appear anymore in the system. This action is irreversible.</label>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary rounded-0' data-bs-dismiss='modal'>Close</button>
                            <a href="../../src/process/delete-item.php?id=<?php echo $fileInfo['file_id'] ?>" class='btn btn-danger rounded-0' id='btn-delete-article'><i class='fas fa-trash-alt'></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script>
        $("form[name='journal-form']").on("submit", function(event) {
            event.preventDefault();
            var fileId = event.target.dataset.id

            var formData = new FormData(this);
            formData.append("fileId", fileId);

            $.ajax({
                method: "POST",
                url: "../../src/process/update-file.php",
                data: formData,
                contentType: false,
                processData: false,
            }).done(function(data) {
                window.scrollTo(0, 0);
                if (data.response === "error") {
                    $("#alert-container-journal").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert">Error with editing data. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "success") {
                    $("#alert-container-journal").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Published successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "revision") {
                    $("#alert-container-journal").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Submission returned successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
            })
        })
    </script>