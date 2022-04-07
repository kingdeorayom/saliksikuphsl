<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

?>
<div class="row my-3 d-lg-none">
    <h5>Submission Details</h5>
    <hr>
    <p class="side-menu-text">Submitted by:</p>
    <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader'] ?></p>
    <hr>
    <p class="side-menu-text">Submitted on:</p>
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on'] ?></p>
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
        <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader'] ?></p>
        <hr>
        <p class="side-menu-text">Submitted on:</p>
        <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on'] ?></p>
        <hr>
        <p class="side-menu-text">Published on:</p>
        <p class="side-menu-text" name="date-published"><?php echo $fileInfo['published_on']; ?></p>
        <hr>
    </div>
    <div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="reportsPanel">
        <!-- container for alert messages -->
        <div class="row my-3">
            <label class="my-2" id="fileUploadLabelReports" hidden>Uploading your file...</label>

            <div class="progress" id='reports-progress-container' hidden>
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="reports-progress-bar">0%</div>
            </div>
        </div>
        <!-- <div id='alert-container-reports'>

        </div> -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid Email input.</strong> Check to make sure all email fields have valid email input.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['error']); endif;?>
        <?php if(isset($_SESSION['invalid_email'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid Email input.</strong> Check to make sure all email fields have valid email input.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['invalid_email']); endif;?>
        <?php if(isset($_SESSION['input_error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid Input.</strong> Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php unset($_SESSION['input_error']); endif;?>
        <?php if(isset($_SESSION['file_updated'])): ?>
            <?php if($_SESSION['file_updated']=='for revision'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Submission returned successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif;?>
            <?php if($_SESSION['file_updated']=='published'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Submission published successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif;?>
            <?php if($_SESSION['file_updated']=='edited'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Submission edited successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif;?>
        <?php unset($_SESSION['file_updated']); endif;?>
        <!-- container for alert messages -->
        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <form name="reports-form" action="<?php echo "../../src/process/update-file.php?id=".$fileInfo['file_id']."&coauthor_id=".$fileInfo['coauthor_group_id']; ?>" method="POST">
            <div class="row my-4">
                <div class="col-lg-6 col-sm-12">
                    <label class="py-2 fw-bold">Resource Type<span class="text-danger"> *</span></label>
                    <select class="form-select" aria-label="Default select example" name="dropdownResourceTypeReports">
                        <option value="Annual Report" <?= $fileInfo['report_type'] == 'Annual Report' ? 'selected' : '' ?>>Annual Report</option>
                        <option value="Research Agenda" <?= $fileInfo['report_type'] == 'Research Agenda' ? 'selected' : '' ?>>Research Agenda</option>
                        <option value="Research Competency Development Program" <?= $fileInfo['report_type'] == 'Research Competency Development Program' ? 'selected' : '' ?>>Research Competency Development Program</option>
                        <option value="Research Catalog" <?= $fileInfo['report_type'] == 'Research Catalog' ? 'selected' : '' ?>>Research Catalog</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="fw-bold">Report Title<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldReportsTitle" value="<?php echo $fileInfo['report_title'] ?>" required>
                <p class="text-secondary my-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"Institutional Research Agenda"</span>.</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label class="py-2 fw-bold">Publication Year/Year of Effectivity<span class="text-danger"> *</span></label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldPublicationYear" value="<?php echo $fileInfo['report_year'] ?>" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textAreaDescription" rows="10" required><?php echo $fileInfo['report_description'] ?></textarea>
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
            <div class="row">
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
</div>