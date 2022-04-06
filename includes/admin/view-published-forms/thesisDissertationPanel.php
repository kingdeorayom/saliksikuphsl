<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../../error.php");
    die();
}
$date_time = date_create($fileInfo['publication_date']);
$day = date_format($date_time, "d");
$month = date_format($date_time, "m");
$year = date_format($date_time, "Y");
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
    <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['published_on']; ?></p>
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
        <p class="side-menu-text" name="date-submitted"><?php echo $fileInfo['published_on']; ?></p>
        <hr>
    </div>
    <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="thesisDissertationPanel">

        <!-- container for alert messages -->
        <div id='alert-container-thesis'>

        </div>
        <!-- container for alert messages -->

        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <!-- <form action="../../process/thesis-submission.php" method="POST" enctype="multipart/form-data"> -->
        <form name="thesis-form" data-id="<?= $fileInfo['file_id'] ?>" data-coauthor_id="<?= $fileInfo['coauthor_group_id'] ?>">
            <div class="row mt-4">
                <div class="col-lg-4 col-sm-12">
                    <label class="py-2 fw-bold">Resource Type<span class="text-danger"> *</span></label>
                    <select class="form-select" aria-label="Default select example" name="dropdownResourceType">
                        <option value="Dissertation" <?= $fileInfo['resource_type'] == 'Dissertation' ? 'selected' : '' ?>>Dissertation</option>
                        <option value="Thesis" <?= $fileInfo['resource_type'] == 'Thesis' ? 'selected' : '' ?>>Thesis</option>
                        <option value="Capstone" <?= $fileInfo['resource_type'] == 'Capstone' ? 'selected' : '' ?>>Capstone</option>

                    </select>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
                    <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                        <option value="Undergraduate" <?= $fileInfo['researchers_category'] == 'Undergraduate' ? 'selected' : '' ?>>Undergraduate</option>
                        <option value="Postgraduate" <?= $fileInfo['researchers_category'] == 'Postgraduate' ? 'selected' : '' ?>>Postgraduate</option>
                        <option value="Faculty" <?= $fileInfo['researchers_category'] == 'Faculty' ? 'selected' : '' ?>>Faculty</option>
                        <option value="Non_teaching_staff" <?= $fileInfo['researchers_category'] == 'Non_teaching_staff' ? 'selected' : '' ?>>Non-teaching Staff</option>
                        <option value="Department_head" <?= $fileInfo['researchers_category'] == 'Department_head' ? 'selected' : '' ?>>Department Head</option>
                    </select>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label class="py-2 fw-bold">Research Unit<span class="text-danger"> *</span></label>
                    <select class="form-select" aria-label="Default select example" name="dropdownResearchUnit" id="dropdownResearchUnit">
                        <?php foreach ($department_list as $key => $row) : ?>
                            <option value="<?php echo $row['name'] ?>" <?= $fileInfo['research_unit'] == $row['name'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-lg-6 col-sm-12">

                    <div id="dropdownArtsSciences" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                            <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                            <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                            <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
                        </select>
                    </div>

                    <div id="dropdownBusinessAccountancy" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                            <option value="Bachelor of Science in Management Accounting">Bachelor of Science in Management Accounting</option>
                            <option value="Bachelor of Science in Business Administration Major In Business Management">Bachelor of Science in Business Administration Major In Business Management</option>
                            <option value="Bachelor of Science in Business Administration Major In Marketing Management">Bachelor of Science in Business Administration Major In Marketing Management</option>
                        </select>
                    </div>

                    <div id="dropdownComputerStudies" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                        </select>
                    </div>

                    <div id="dropdownCriminology" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                        </select>
                    </div>

                    <div id="dropdownEducation" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Secondary Education Major in English">Bachelor of Secondary Education Major in English</option>
                            <option value="Bachelor of Secondary Education Major in Filipino">Bachelor of Secondary Education Major in Filipino</option>
                            <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
                            <option value="Bachelor of Secondary Education Major in Science">Bachelor of Secondary Education Major in Science</option>
                            <option value="Bachelor of Secondary Education Major in Social Studies">Bachelor of Secondary Education Major in Social Studies</option>
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                            <option value="Bachelor in Library and Information Science">Bachelor in Library and Information Science</option>
                            <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option>
                            <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option>
                            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                            <option value="Education Modular Approach Program">Education Modular Approach Program</option>
                        </select>
                    </div>

                    <div id="dropdownEngineering" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                            <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
                            <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                            <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                            <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                            <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                            <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
                            <option value="Bachelor of Science in Aircraft Maintenance Technology">Bachelor of Science in Aircraft Maintenance Technology</option>
                        </select>
                    </div>

                    <div id="dropdownMaritime" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Marine Engineering">Bachelor of Science in Marine Engineering</option>
                            <option value="Bachelor of Science in Marine Transportation">Bachelor of Science in Marine Transportation</option>
                        </select>
                    </div>

                    <div id="dropdownManagement" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                            <option value="Bachelor of Science in Nutrition and Dietetics">Bachelor of Science in Nutrition and Dietetics</option>
                        </select>
                    </div>

                    <div id="dropdownGraduateSchool" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Doctor of Philosophy Major in Educational Management">Doctor of Philosophy Major in Educational Management</option>
                            <option value="Doctor of Philosophy in Business Management">Doctor of Philosophy in Business Management</option>
                            <option value="Doctor of Occupational Therapy">Doctor of Occupational Therapy</option>
                            <option value="Doctor of Physical Therapy">Doctor of Physical Therapy</option>
                            <option value="Master in Business Administration">Master in Business Administration</option>
                            <option value="Master of Science of Clinical Program Development">Master of Science of Clinical Program Development</option>
                            <option value="Master of Science in Microbiology">Master of Science in Microbiology</option>
                            <option value="Master of Arts in Education - Major in Administration and Supervision">Master of Arts in Education - Major in Administration and Supervision</option>
                            <option value="Master of Arts in Education - Major in Health Sciences Education">Master of Arts in Education - Major in Health Sciences Education</option>
                            <option value="Master of Arts in Education - Major in Guidance and Counseling">Master of Arts in Education - Major in Guidance and Counseling</option>
                            <option value="Master of Arts in Education - Major in Teaching English as Second Language">Master of Arts in Education - Major in Teaching English as Second Language</option>
                            <option value="Master of Arts in Education - Major in Educational Management">Master of Arts in Education - Major in Educational Management</option>
                            <option value="Master of Arts in Education - Major in Religious Studies">Master of Arts in Education - Major in Religious Studies</option>
                            <option value="Master of Arts in Education - Major in Special Education">Master of Arts in Education - Major in Special Education</option>
                            <option value="Master of Arts in Education - Major in Mathematics">Master of Arts in Education - Major in Mathematics</option>
                            <option value="Master of Arts in Education - Major in Filipino">Master of Arts in Education - Major in Filipino</option>
                            <option value="Master of Science in Clinical Laboratory Science">Master of Science in Clinical Laboratory Science</option>
                            <option value="Master of Science in Management Engineering">Master of Science in Management Engineering</option>
                            <option value="Master of Science in Information Technology">Master of Science in Information Technology</option>
                            <option value="Master of Arts in Guidance and Counseling">Master of Arts in Guidance and Counseling</option>
                            <option value="Master of Arts in Communication">Master of Arts in Communication</option>
                            <option value="Master of Science in Microbiology">Master of Science in Microbiology</option>
                            <option value="Master of Science in Pharmacy">Master of Science in Pharmacy</option>
                            <option value="Master of Science in Psychology">Master of Science in Psychology</option>
                            <option value="Master of Science in Radiologic Technology">Master of Science in Radiologic Technology</option>
                            <option value="Master of Library and Information Science">Master of Library and Information Science</option>
                            <option value="Master in Hospital Administration">Master in Hospital Administration</option>
                        </select>
                    </div>

                    <div id="dropdownSupportServices" hidden>
                        <label class="py-2 fw-bold" id="labelCourseOrDepartment">Course</label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Community Outreach Department">Community Outreach Department</option>
                            <option value="Human Resource Department">Human Resource Department</option>
                            <option value="Information Technology Services">Information Technology Services</option>
                            <option value="International and External Affairs">International and External Affairs</option>
                            <option value="Library">Library</option>
                            <option value="Marketing Department">Marketing Department</option>
                            <option value="Quality Assurance Office">Quality Assurance Office</option>
                            <option value="Research and Development Center">Research and Development Center</option>
                            <option value="Student Personnel Services">Student Personnel Services</option>
                            <option value="University Registrar">University Registrar</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="row mt-3">
                <div>
                    <label class="fw-bold">Research Title<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldResearchTitle" id="textFieldResearchTitle" value="<?php echo $fileInfo['research_title'] ?>" required>
                    <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"From Letters to Life: Understanding Language Teachers Experiences in Teaching Literature"</span>.</p>
                </div>
            </div>
            <div class="row mb-3">
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
                    <input type="text" class="form-control" name="textFieldAuthorNameExtension" placeholder="Extension" value="<?php echo $fileInfo['author_name_ext'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                </div>
                <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                    <label class="fw-bold">Publication Date<span class="text-danger"> *</span></label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12 mb-2">
                    <input type="text" class="form-control" name="textFieldEmail" value="<?php echo $fileInfo['author_email'] ?>" required>
                </div>
                <div class="col-lg-6 col-sm-12 mb-3 d-sm-block d-lg-none">
                    <label class="text-secondary">Consider your active email address</label>
                </div>
                <div class="col-lg-6 col-sm-12 mb-2 d-sm-block d-lg-none">
                    <label class="fw-bold">Publication Date<span class="text-danger"> *</span></label>
                </div>
                <div class="col-lg-6 col-sm-12 mb-3 d-sm-block d-lg-none">
                    <label class="text-secondary">Year is required, Month and Date are optional</label>
                </div>
                <div class="col-lg-2 col-sm-12 mb-3" id="date-picker-container">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationMonth" id="month-picker" onchange="changeInput()">
                        <!-- <option value="" selected>Month</option> -->
                        <?php
                        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                        foreach ($months as $key => $row) : ?>
                            <option value="<?= $key + 1 ?>" <?= $month == $key + 1 ? 'selected' : '' ?>><?= $row ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12 mb-3">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="day-picker">
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
                <div class="col-lg-2 col-sm-12">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" id="year-picker" onchange="changeInput()" required>
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
            <div class="row">
                <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                    <label class="text-secondary">Consider your active email address</label>
                </div>
                <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                    <label class="text-secondary">Year is required, Month and Date are optional</label>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-4 col-sm-12">
                    <label class="fw-bold">No. of Co-Authors</label>
                    <select id="dropdownThesisDissertationCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" onchange="showThesisDissertationCoAuthorsField();" required>
                        <option value=0 <?= $fileInfo['coauthors_count'] == 0 ? 'selected' : '' ?>>0</option>
                        <option value=1 <?= $fileInfo['coauthors_count'] == 1 ? 'selected' : '' ?>>1</option>
                        <option value=2 <?= $fileInfo['coauthors_count'] == 2 ? 'selected' : '' ?>>2</option>
                        <option value=3 <?= $fileInfo['coauthors_count'] == 3 ? 'selected' : '' ?>>3</option>
                        <option value=4 <?= $fileInfo['coauthors_count'] == 4 ? 'selected' : '' ?>>4</option>
                    </select>
                    <label class="text-secondary">Max 4 co-authors allowed</label>
                </div>
            </div>
            <div class="row" id="co-author-1-td-panel" <?= $fileInfo['coauthors_count'] >= 1 ? '' : 'style="display: none;"' ?>>
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
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor1" value="<?php echo $fileInfo['coauthor1_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-2-td-panel" <?= $fileInfo['coauthors_count'] >= 2 ? '' : 'style="display: none;"' ?>>
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
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor2" value="<?php echo $fileInfo['coauthor2_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-3-td-panel" <?= $fileInfo['coauthors_count'] >= 3 ? '' : 'style="display: none;"' ?>>
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
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor3" value="<?php echo $fileInfo['coauthor3_email'] ?>">
                </div>
            </div>
            <div class="row" id="co-author-4-td-panel" <?= $fileInfo['coauthors_count'] >= 4 ? '' : 'style="display: none;"' ?>>
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
                    <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" name="textFieldEmailAuthor4" value="<?php echo $fileInfo['coauthor4_email'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Abstract<span class="text-danger"> *</span></label>
                        <textarea class="form-control" name="textareaAbstract" rows="10" required><?php echo $fileInfo['research_abstract'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div>
                    <label class="fw-bold my-2">Keywords<span class="text-danger"> *</span> <span class="text-secondary fw-normal">Each keyword should be separated by a comma. For example: <em>language</em>, <em>literature</em>, <em>teaching experiences</em></span></label>
                    <input type="text" class="form-control" name="textareaKeywords" id="textFieldResearchKeyword" value="<?php echo $fileInfo['keywords'] ?>" required>
                </div>
            </div>
            <div class="row">
                <label class="fw-bold my-2">Research Field<span class="text-danger"> *</span> <span class="text-secondary fw-light">Tick all that applies</span></label>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Accountancy and Marketing" id="checkBoxAccountancyMarketing" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                        if ($value == 'Accountancy and Marketing') {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        }
                                                                                                                                                                    } ?>>
                        <label for="checkBoxAccountancyMarketing">Accountancy and Marketing</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Educational Management" id="checkBoxEducationalManagement" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                        if ($value == 'Educational Management') {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        }
                                                                                                                                                                    } ?>>
                        <label for="checkBoxEducationalManagement">Educational Management</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="IT and Engineering" id="checkBoxITEngineering" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                            if ($value == 'IT and Engineering') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }
                                                                                                                                                        } ?>>
                        <label for="checkBoxITEngineering">IT and Engineering</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Tourism and Hospitality" id="checkBoxTourismHospitality" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                    if ($value == 'Tourism and Hospitality') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>>
                        <label for="checkBoxTourismHospitality">Tourism and Hospitality</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Arts and Humanities" id="checkBoxArtsHumanities" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                            if ($value == 'Arts and Humanities') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }
                                                                                                                                                        } ?>>
                        <label for="checkBoxArtsHumanities">Arts and Humanities</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Education and Social Sciences" id="checkBoxEducationSocialSciences" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                                if ($value == 'Education and Social Sciences') {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                }
                                                                                                                                                                            } ?>>
                        <label for="checkBoxEducationSocialSciences">Education and Social Sciences</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Law and Justice System" id="checkBoxLawJusticeSystem" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                    if ($value == 'Law and Justice System') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    }
                                                                                                                                                                } ?>>
                        <label for="checkBoxLawJusticeSystem">Law and Justice System</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Business Management" id="checkBoxBusinessManagement" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                                if ($value == 'Business Management') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                }
                                                                                                                                                            } ?>>
                        <label for="checkBoxBusinessManagement">Business Management</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Health and Sciences" id="checkBoxHealthSciences" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                            if ($value == 'Health and Sciences') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }
                                                                                                                                                        } ?>>
                        <label for="checkBoxHealthSciences">Health and Sciences</label>
                    </div>
                    <div class="form-check m-2">
                        <input class="form-check-input" type="checkbox" value="Marine and Aviation" id="checkBoxMarineAviation" name="researchFields[]" <?php foreach ($researchFieldsArray as $key => $value) {
                                                                                                                                                            if ($value == 'Marine and Aviation') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            }
                                                                                                                                                        } ?>>
                        <label for="checkBoxMarineAviation">Marine and Aviation</label>
                    </div>
                </div>
            </div>
            <div class="row my-4">
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

            <div class="row" id="publishButtonThesis">
                <div class="col">
                    <button type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitResearchDissertationButton">Save changes</button>

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
                            <button type='button' class='btn btn-danger rounded-0' id='btn-delete-article' data-id=''><i class='fas fa-trash-alt'></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
    <script src="../../../scripts/custom/thesis-calendar-date-picker.js"></script>
    <script>
        $("form[name='thesis-form']").on("submit", function(event) {
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
            }).done(function(data) {
                window.scrollTo(0, 0);
                if (data.response === "error") {
                    $("#alert-container-thesis").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert">Error with editing data. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "success") {
                    $("#alert-container-thesis").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Published successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
                if (data.response === "revision") {
                    $("#alert-container-thesis").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Submission returned successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            var categoryDropdown = $("#dropdownResearchersCategory");
            var unitDropdown = $("#dropdownResearchUnit");

            unitDropdown.on('change', function() {
                if (categoryDropdown.val() != "Faculty" && categoryDropdown.val() != "Non-Teaching Staff" && categoryDropdown.val() != "Department Head" || $(this).val() == "Support Services") {
                    if (this.value == 'Arts and Sciences') {

                        $("#dropdownArtsSciences").prop('hidden', false);
                        $("#dropdownArtsSciences :input").prop('disabled', false);
                        $("#dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Business and Accountancy') {

                        $("#dropdownBusinessAccountancy").prop('hidden', false);
                        $("#dropdownBusinessAccountancy :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Computer Studies') {

                        $("#dropdownComputerStudies").prop('hidden', false);
                        $("#dropdownComputerStudies :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Criminology') {

                        $("#dropdownCriminology").prop('hidden', false);
                        $("#dropdownCriminology :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Education') {

                        $("#dropdownEducation").prop('hidden', false);
                        $("#dropdownEducation :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Engineering, Architecture and Aviation') {

                        $("#dropdownEngineering").prop('hidden', false);
                        $("#dropdownEngineering :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Maritime Education') {

                        $("#dropdownMaritime").prop('hidden', false);
                        $("#dropdownMaritime :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'International Hospitality Management') {

                        $("#dropdownManagement").prop('hidden', false);
                        $("#dropdownManagement :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Graduate School') {

                        $("#dropdownGraduateSchool").prop('hidden', false);
                        $("#dropdownGraduateSchool :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Support Services') {

                        $("#labelCourseOrDepartment").text("Department");
                        $("#dropdownSupportServices").prop('hidden', false);
                        $("#dropdownSupportServices :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input").prop('disabled', true);

                    } else if (this.value == 'Basic Education') {

                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (this.value == 'Senior High School') {

                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);
                    }
                } else {
                    $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                    $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);
                }

            });
            categoryDropdown.on('change', function() {
                if ($(this).val() != "Faculty" && $(this).val() != "Non-Teaching Staff" && $(this).val() != "Department Head" || unitDropdown.val() == "Support Services") {
                    if (unitDropdown.val() == 'Arts and Sciences') {
                        $("#dropdownArtsSciences").prop('hidden', false);
                        $("#dropdownArtsSciences :input").prop('disabled', false);
                        $("#dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Business and Accountancy') {

                        $("#dropdownBusinessAccountancy").prop('hidden', false);
                        $("#dropdownBusinessAccountancy :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Computer Studies') {

                        $("#dropdownComputerStudies").prop('hidden', false);
                        $("#dropdownComputerStudies :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Criminology') {

                        $("#dropdownCriminology").prop('hidden', false);
                        $("#dropdownCriminology :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Education') {

                        $("#dropdownEducation").prop('hidden', false);
                        $("#dropdownEducation :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Engineering, Architecture and Aviation') {

                        $("#dropdownEngineering").prop('hidden', false);
                        $("#dropdownEngineering :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Maritime Education') {

                        $("#dropdownMaritime").prop('hidden', false);
                        $("#dropdownMaritime :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'International Hospitality Management') {

                        $("#dropdownManagement").prop('hidden', false);
                        $("#dropdownManagement :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Graduate School') {

                        $("#dropdownGraduateSchool").prop('hidden', false);
                        $("#dropdownGraduateSchool :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownSupportServices").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownSupportServices :input").prop('disabled', true);

                    } else if (unitDropdown.val() == 'Support Services') {
                        $("#labelCourseOrDepartment").text("Department");
                        $("#dropdownSupportServices").prop('hidden', false);
                        $("#dropdownSupportServices :input").prop('disabled', false);
                        $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool").prop('hidden', true);
                        $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input").prop('disabled', true);

                    }
                } else {
                    $("#dropdownArtsSciences, #dropdownBusinessAccountancy, #dropdownComputerStudies, #dropdownCriminology, #dropdownEducation, #dropdownEngineering, #dropdownMaritime, #dropdownManagement, #dropdownGraduateSchool, #dropdownSupportServices").prop('hidden', true);
                    $("#dropdownArtsSciences :input, #dropdownBusinessAccountancy :input, #dropdownComputerStudies :input, #dropdownCriminology :input, #dropdownEducation :input, #dropdownEngineering :input, #dropdownMaritime :input, #dropdownManagement :input, #dropdownGraduateSchool :input, #dropdownSupportServices :input").prop('disabled', true);
                }

            })
            $("#dropdownResearchUnit").trigger("change");
        });
    </script>