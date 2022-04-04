<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../../layouts/general/error.php");
    die();
}
$date_time = date_create($fileInfo['infographic_publication_date']);
$day = date_format($date_time,"d");
$month = date_format($date_time,"m");
$year = date_format($date_time,"Y");
?>
<div class="row my-3 d-lg-none">
    <h5>Submission Details</h5>
    <hr>
    <p class="side-menu-text">Submitted by:</p>
    <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader']?></p>
    <hr>
    <p class="side-menu-text">Submitted on:</p>
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on']?></p>
    <hr>
    <p class="side-menu-text">Published on:</p>
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['published_on']; ?></p>
    <hr>
</div>
<div class="row">
    <div class="col-lg-2 d-none d-md-none d-lg-block">
        <!--col-md-12 to stack on top of next column. remove display-none-->
        <h5>Submission Details</h5>
        <hr>
        <p class="side-menu-text">Submitted by:</p>
        <p class="side-menu-text" name="author-submitted"><?php echo $fileInfo['file_uploader']?></p>
        <hr>
        <p class="side-menu-text">Submitted on:</p>
        <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['submitted_on']?></p>
        <hr>
        <p class="side-menu-text">Published on:</p>
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['published_on']; ?></p>
    <hr>
    </div>
    <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="infographicsPanel">

        <!-- container for alert messages -->
        <div id='alert-container-infographic'>

        </div>
        <!-- container for alert messages -->
        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <form name="infographic-form" data-id="<?php echo $fileInfo['file_id'] ?>" data-coauthor_id="<?= $fileInfo['coauthor_group_id'] ?>">

            <div class="row my-2">
                <div>
                    <label class="fw-bold my-2">Title/Topic<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldInfographicsTitle" value="<?php echo $fileInfo['infographic_title'] ?>" required>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-lg-3">
                    <label class="py-2 fw-bold">Research Unit<span class="text-danger"> *</span></label>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
                </div> -->
                <div class="col-lg-3 d-none d-lg-block">
                    <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-3 col-sm-12 py-2">
                    <select class="form-select" aria-label="Default select example" name="dropdownResearchUnit">
                        <?php foreach ($department_list as $key => $row) : ?>
                            <option value="<?php echo $row['name'] ?>" <?= $fileInfo['infographic_research_unit'] == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-3 d-sm-block d-lg-none">
                    <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
                </div>
                <div class="col-lg-3 col-sm-12 py-2">
                    <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                        <option value="Undergraduate" <?= $fileInfo['infographic_researcher_category'] == 'Undergraduate' ? 'selected' : '' ?>>Undergraduate</option>
                        <option value="Postgraduate" <?= $fileInfo['infographic_researcher_category'] == 'Postgraduate' ? 'selected' : '' ?>>Postgraduate</option>
                        <option value="Faculty" <?= $fileInfo['infographic_researcher_category'] == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
                        <option value="Non_teaching_staff" <?= $fileInfo['infographic_researcher_category'] == 'Non_teaching_staff' ? 'selected' : '' ?>>Non-teaching Staff</option>
                        <option value="School_head" <?= $fileInfo['infographic_researcher_category'] == 'School_head' ? 'selected' : '' ?>>School Head</option>
                    </select>
                </div> -->
                <div class="col-lg-3 d-sm-block d-lg-none">
                    <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationMonth" id="info-month-picker" onchange="changeInputInfo()">
                        <!-- <option value="" selected>Month</option> -->
                        <?php
                        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                        foreach ($months as $key => $row) : ?>
                            <option value="<?= $key + 1 ?>" <?= $month == $key + 1 ? 'selected' : '' ?>><?= $row ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="info-day-picker">
                        <!-- <option value="" selected>Day</option> -->
                        <?php for ($i = 1; $i != 32; $i++) {
                            if ($day == $i) {
                                echo "<option value ='$i' selected>$i</option>";
                            } else {
                                echo "<option value ='$i'>$i</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" id="info-year-picker" onchange="changeInputInfo()" required>
                        <!-- <option value="" selected>Year</option> -->
                        <?php for ($i = 2022; $i != 2000; $i--) {
                            if ($year == $i) {
                                echo "<option value ='$i' selected>$i</option>";
                            }
                            echo "<option value='$i'>$i</option>";
                        } ?>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <label class="py-2 fw-bold">Corresponding Author<span class="text-danger"> *</span></label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldAuthorFirstName" placeholder="First Name*" value="<?php echo $fileInfo['author_first_name'] ?>" required>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldAuthorMiddleInitial" placeholder="Middle Initial" value="<?php echo $fileInfo['author_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldAuthorLastName" placeholder="Surname*" value="<?php echo $fileInfo['author_surname'] ?>" required>
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldAuthorNameExtension" placeholder="Extension" value="<?php echo $fileInfo['author_ext'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldEmail" value="<?php echo $fileInfo['author_email'] ?>">
                    <label class="text-secondary my-2">Consider your active email address</label>
                </div>
            </div>
            <div class="row my-2">
                <label class="py-2 fw-bold">Graphics Editor</label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldGraphicsEditorFirstName" placeholder="First Name" value="<?php echo $fileInfo['editor_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldGraphicsEditorMiddleInitial" placeholder="Middle Initial" value="<?php echo $fileInfo['editor_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldGraphicsEditorLastName" placeholder="Surname" value="<?php echo $fileInfo['editor_surname'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldGraphicsEditorNameExtension" placeholder="Extension" value="<?php echo $fileInfo['editor_ext'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldGraphicsEditorEmail" value="<?php echo $fileInfo['editor_email'] ?>">
                    <label class="text-secondary my-2">Consider your active email address</label>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-4 col-sm-12">
                    <label class="fw-bold">No. of Co-Authors</label>
                    <select id="dropdownInfographicsCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" onchange="showInfographicsCoAuthorsField();" required>
                        <option value=0 <?= $fileInfo['coauthors_count'] == 0 ? 'selected' : '' ?>>0</option>
                        <option value=1 <?= $fileInfo['coauthors_count'] == 1 ? 'selected' : '' ?>>1</option>
                        <option value=2 <?= $fileInfo['coauthors_count'] == 2 ? 'selected' : '' ?>>2</option>
                        <option value=3 <?= $fileInfo['coauthors_count'] == 3 ? 'selected' : '' ?>>3</option>
                        <option value=4 <?= $fileInfo['coauthors_count'] == 4 ? 'selected' : '' ?>>4</option>
                    </select>
                    <label class="text-secondary">Max 4 co-authors allowed</label>
                </div>
            </div>
            <div class="row" id="co-author-1-info-panel" <?= $fileInfo['coauthors_count'] >= 1 ? '' : 'style="display: none;"' ?>>
                <label class="py-2 fw-bold">Co-Author 1</label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldFirstNameCoAuthor1" placeholder="First Name*" value="<?php echo $fileInfo['coauthor1_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor1" placeholder="Middle Initial" value="<?php echo $fileInfo['coauthor1_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldLastNameCoAuthor1" placeholder="Surname*" value="<?php echo $fileInfo['coauthor1_surname'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldNameExtCoAuthor1" placeholder="Extension" value="<?php echo $fileInfo['coauthor1_name_ext'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12 my-2">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor1" value="<?php echo $fileInfo['coauthor1_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-2-info-panel" <?= $fileInfo['coauthors_count'] >= 2 ? '' : 'style="display: none;"' ?>>
                <label class="py-2 fw-bold">Co-Author 2</label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldFirstNameCoAuthor2" placeholder="First Name*" value="<?php echo $fileInfo['coauthor2_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor2" placeholder="Middle Initial" value="<?php echo $fileInfo['coauthor2_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldLastNameCoAuthor2" placeholder="Surname*" value="<?php echo $fileInfo['coauthor2_surname'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldNameExtCoAuthor2" placeholder="Extension" value="<?php echo $fileInfo['coauthor2_name_ext'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12 my-2">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor2" value="<?php echo $fileInfo['coauthor2_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-3-info-panel" <?= $fileInfo['coauthors_count'] >= 3 ? '' : 'style="display: none;"' ?>>
                <label class="py-2 fw-bold">Co-Author 3</label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldFirstNameCoAuthor3" placeholder="First Name*" value="<?php echo $fileInfo['coauthor3_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor3" placeholder="Middle Initial" value="<?php echo $fileInfo['coauthor3_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldLastNameCoAuthor3" placeholder="Surname*" value="<?php echo $fileInfo['coauthor3_surname'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldNameExtCoAuthor3" placeholder="Extension" value="<?php echo $fileInfo['coauthor3_name_ext'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12 my-2">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor3" value="<?php echo $fileInfo['coauthor3_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-4-info-panel" <?= $fileInfo['coauthors_count'] >= 4 ? '' : 'style="display: none;"' ?>>
                <label class="py-2 fw-bold">Co-Author 4</label>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldFirstNameCoAuthor4" placeholder="First Name*" value="<?php echo $fileInfo['coauthor4_first_name'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor4" placeholder="Middle Initial" value="<?php echo $fileInfo['coauthor4_middle_initial'] ?>">
                </div>
                <div class="col-lg-4 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldLastNameCoAuthor4" placeholder="Surname*" value="<?php echo $fileInfo['coauthor4_surname'] ?>">
                </div>
                <div class="col-lg-2 col-sm-12 py-2">
                    <input type="text" class="form-control" name="textFieldNameExtCoAuthor4" placeholder="Extension" value="<?php echo $fileInfo['coauthor4_name_ext'] ?>">
                </div>
                <div class="col-lg-6 col-sm-12 my-2">
                    <label class="fw-bold">Email</label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor4" value="<?php echo $fileInfo['coauthor4_email'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                        <textarea class="form-control" name="textareaDescription" rows="10" required><?php echo $fileInfo['infographic_description'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <label class="fw-bold mb-3">Attached Files</label>
                <div class="col">
                <label class="my-2"><a href="../../src/<?php echo htmlspecialchars($fileInfo['file_dir']) ?>" target="_blank"><?php echo htmlspecialchars($fileInfo['file_name']) ?></a></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name='file1Shown' <?php if($fileInfo['file1_shown']){echo 'checked';} ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row" id="publishButtonInfographics">
                <div class="col">
                    <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Edit" id="submitInfographicsButton">
                </div>
            </div>

        </form>
    </div>

    <script>
        $("form[name='infographic-form']").on("submit", function(event){
            event.preventDefault();
            var fileId = event.target.dataset.id
            var authorGroupId = event.target.dataset.coauthor_id

            var formData = new FormData(this);
            formData.append("fileId", fileId);
            formData.append("coauthor_id", authorGroupId);
            $.ajax({
                method: "POST",
                url: "../../src/process/update-file.php",
                data: formData,
                contentType: false,
                processData: false,
            }).done(function(data){
                window.scrollTo(0, 0);
                if (data.response === "error") {
                    $("#alert-container-infographic").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert">Error with editing data. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "success") {
                    $("#alert-container-infographic").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Published successfully!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "revision") {
                    $("#alert-container-infographic").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Submission returned successfully!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
            })
        })
    </script>