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
    <p class="side-menu-text"><?php echo $fileInfo['file_uploader']?></p>
    <hr>
    <p class="side-menu-text">Submitted on:</p>
    <p class="side-menu-text"<?php echo $fileInfo['submitted_on']?></p>
    <hr>
    <p class="side-menu-text">Returned on:</p>
    <p class="side-menu-text"><?php echo $fileInfo['returned_on']?></p>
    <hr>
</div>
<div class="row">
    <div class="col-lg-2 d-none d-md-none d-lg-block">
        <!--col-md-12 to stack on top of next column. remove display-none-->
        <h5>Submission Details</h5>
        <hr>
        <p class="side-menu-text">Submitted by:</p>
        <p class="side-menu-text"><?php echo $fileInfo['file_uploader']?></p>
        <hr>
        <p class="side-menu-text">Submitted on:</p>
        <p class="side-menu-text"><?php echo $fileInfo['submitted_on']?></p>
        <hr>
        <p class="side-menu-text">Returned on:</p>
        <p class="side-menu-text"><?php echo $fileInfo['returned_on']?></p>
        <hr>
    </div>
    <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="thesisDissertationPanel">

        <!-- container for alert messages -->
        <div id='alert-container'>

        </div>
        <!-- container for alert messages -->

        <h1 class="my-2">File Upload Information</h1>
        <hr>
        <!-- <form action="../../process/thesis-submission.php" method="POST" enctype="multipart/form-data"> -->
        <form onsubmit="submitForm(event)" name="thesis-form" data-id="<?= $fileInfo['file_id'] ?>" data-coauthor_id="<?= $fileInfo['coauthor_group_id'] ?>">
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
                        <option value="School_head" <?= $fileInfo['researchers_category'] == 'School_head' ? 'selected' : '' ?>>School Head</option>
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
                            <option value="Bachelor of Science in Psychology" <?php if($fileInfo['research_course']=='Bachelor of Science in Psychology'){ echo 'selected';}?>>Bachelor of Science in Psychology</option>
                            <option value="Bachelor of Arts in Psychology" <?php if($fileInfo['research_course']=='Bachelor of Arts in Psychology'){ echo 'selected';}?>>Bachelor of Arts in Psychology</option>
                            <option value="Bachelor of Arts in Political Science" <?php if($fileInfo['research_course']=='Bachelor of Arts in Political'){ echo 'selected';}?>>Bachelor of Arts in Political Science</option>
                            <option value="Bachelor of Arts in Communication" <?php if($fileInfo['research_course']=='Bachelor of Arts in Communication'){ echo 'selected';}?>>Bachelor of Arts in Communication</option>
                        </select>
                    </div>

                    <div id="dropdownBusinessAccountancy" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Accountancy" <?php if($fileInfo['research_course']=='Bachelor of Science in Accountancy'){ echo 'selected';}?>>Bachelor of Science in Accountancy</option>
                            <option value="Bachelor of Science in Management Accounting" <?php if($fileInfo['research_course']=='Bachelor of Science in Management Accounting'){ echo 'selected';}?>>Bachelor of Science in Management Accounting</option>
                            <option value="Bachelor of Science in Business Administration Major In Business Management" <?php if($fileInfo['research_course']=='Bachelor of Science in Business Administration Major In Business Management'){ echo 'selected';}?>>Bachelor of Science in Business Administration Major In Business Management</option>
                            <option value="Bachelor of Science in Business Administration Major In Marketing Management" <?php if($fileInfo['research_course']=='Bachelor of Science in Business Administration Major In Marketing Management'){ echo 'selected';}?>>Bachelor of Science in Business Administration Major In Marketing Management</option>
                        </select>
                    </div>

                    <div id="dropdownComputerStudies" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Information Technology" <?php if($fileInfo['research_course']=='Bachelor of Science in Information Technology'){ echo 'selected';}?>>Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Computer Science" <?php if($fileInfo['research_course']=='Bachelor of Science in Computer Science'){ echo 'selected';}?>>Bachelor of Science in Computer Science</option>
                        </select>
                    </div>

                    <div id="dropdownCriminology" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Criminology" <?php if($fileInfo['research_course']=='Bachelor of Science in Criminology'){ echo 'selected';}?>>Bachelor of Science in Criminology</option>
                        </select>
                    </div>

                    <div id="dropdownEducation" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Secondary Education Major in English" <?php if($fileInfo['research_course']=='Bachelor of Secondary Education Major in English'){ echo 'selected';}?>>Bachelor of Secondary Education Major in English</option>
                            <option value="Bachelor of Secondary Education Major in Filipino" <?php if($fileInfo['research_course']=='Bachelor of Secondary Education Major in Filipino'){ echo 'selected';}?>>Bachelor of Secondary Education Major in Filipino</option>
                            <option value="Bachelor of Secondary Education Major in Mathematics" <?php if($fileInfo['research_course']=='Bachelor of Secondary Education Major in Mathematics'){ echo 'selected';}?>>Bachelor of Secondary Education Major in Mathematics</option>
                            <option value="Bachelor of Secondary Education Major in Science" <?php if($fileInfo['research_course']=='Bachelor of Secondary Education Major in Science'){ echo 'selected';}?>>Bachelor of Secondary Education Major in Science</option>
                            <option value="Bachelor of Secondary Education Major in Social Studies" <?php if($fileInfo['research_course']=='Bachelor of Secondary Education Major in Social Studies'){ echo 'selected';}?>>Bachelor of Secondary Education Major in Social Studies</option>
                            <option value="Bachelor of Elementary Education" <?php if($fileInfo['research_course']=='Bachelor of Elementary Education'){ echo 'selected';}?>>Bachelor of Elementary Education</option>
                            <option value="Bachelor in Library and Information Science" <?php if($fileInfo['research_course']=='Bachelor in Library and Information Science'){ echo 'selected';}?>>Bachelor in Library and Information Science</option>
                            <option value="Bachelor of Early Childhood Education" <?php if($fileInfo['research_course']=='Bachelor of Early Childhood Education'){ echo 'selected';}?>>Bachelor of Early Childhood Education</option>
                            <option value="Bachelor of Special Needs Education" <?php if($fileInfo['research_course']=='Bachelor of Special Needs Education'){ echo 'selected';}?>>Bachelor of Special Needs Education</option>
                            <option value="Bachelor of Physical Education" <?php if($fileInfo['research_course']=='Bachelor of Physical Education'){ echo 'selected';}?>>Bachelor of Physical Education</option>
                            <option value="Education Modular Approach Program" <?php if($fileInfo['research_course']=='Education Modular Approach Program'){ echo 'selected';}?>>Education Modular Approach Program</option>
                        </select>
                    </div>

                    <div id="dropdownEngineering" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Mechanical Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Mechanical Engineering'){ echo 'selected';}?>>Bachelor of Science in Mechanical Engineering</option>
                            <option value="Bachelor of Science in Industrial Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Industrial Engineering'){ echo 'selected';}?>>Bachelor of Science in Industrial Engineering</option>
                            <option value="Bachelor of Science in Computer Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Computer Engineering'){ echo 'selected';}?>>Bachelor of Science in Computer Engineering</option>
                            <option value="Bachelor of Science in Electronics Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Electronics Engineering'){ echo 'selected';}?>>Bachelor of Science in Electronics Engineering</option>
                            <option value="Bachelor of Science in Electrical Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Electrical Engineering'){ echo 'selected';}?>>Bachelor of Science in Electrical Engineering</option>
                            <option value="Bachelor of Science in Civil Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Civil Engineering'){ echo 'selected';}?>>Bachelor of Science in Civil Engineering</option>
                            <option value="Bachelor of Science in Architecture" <?php if($fileInfo['research_course']=='Bachelor of Science in Architecture'){ echo 'selected';}?>>Bachelor of Science in Architecture</option>
                            <option value="Bachelor of Science in Aircraft Maintenance Technology" <?php if($fileInfo['research_course']=='Bachelor of Science in Aircraft Maintenance Technology'){ echo 'selected';}?>>Bachelor of Science in Aircraft Maintenance Technology</option>
                        </select>
                    </div>

                    <div id="dropdownMaritime" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Marine Engineering" <?php if($fileInfo['research_course']=='Bachelor of Science in Marine Engineering'){ echo 'selected';}?>>Bachelor of Science in Marine Engineering</option>
                            <option value="Bachelor of Science in Marine Transportation" <?php if($fileInfo['research_course']=='Bachelor of Science in Marine Transportation'){ echo 'selected';}?>>Bachelor of Science in Marine Transportation</option>
                        </select>
                    </div>

                    <div id="dropdownManagement" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Bachelor of Science in Hospitality Management" <?php if($fileInfo['research_course']=='Bachelor of Science in Hospitality Management'){ echo 'selected';}?>>Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Tourism Management" <?php if($fileInfo['research_course']=='Bachelor of Science in Tourism Management'){ echo 'selected';}?>>Bachelor of Science in Tourism Management</option>
                            <option value="Bachelor of Science in Nutrition and Dietetics" <?php if($fileInfo['research_course']=='Bachelor of Science in Nutrition and Dietetics'){ echo 'selected';}?>>Bachelor of Science in Nutrition and Dietetics</option>
                        </select>
                    </div>

                    <div id="dropdownGraduateSchool" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Doctor of Philosophy Major in Educational Management" <?php if($fileInfo['research_course']=='Doctor of Philosophy Major in Educational Management'){ echo 'selected';}?>>Doctor of Philosophy Major in Educational Management</option>
                            <option value="Doctor of Philosophy in Business Management" <?php if($fileInfo['research_course']=='Doctor of Philosophy in Business Management'){ echo 'selected';}?>>Doctor of Philosophy in Business Management</option>
                            <option value="Doctor of Occupational Therapy" <?php if($fileInfo['research_course']=='Doctor of Occupational Therapy'){ echo 'selected';}?>>Doctor of Occupational Therapy</option>
                            <option value="Doctor of Physical Therapy" <?php if($fileInfo['research_course']=='Doctor of Physical Therapy'){ echo 'selected';}?>>Doctor of Physical Therapy</option>
                            <option value="Master in Business Administration" <?php if($fileInfo['research_course']=='Master in Business Administration'){ echo 'selected';}?>>Master in Business Administration</option>
                            <option value="Master of Science of Clinical Program Development" <?php if($fileInfo['research_course']=='Master of Science of Clinical Program Development'){ echo 'selected';}?>>Master of Science of Clinical Program Development</option>
                            <option value="Master of Science in Microbiology" <?php if($fileInfo['research_course']=='Master of Science in Microbiology'){ echo 'selected';}?>>Master of Science in Microbiology</option>
                            <option value="Master of Arts in Education - Major in Administration and Supervision" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Administration and Supervision'){ echo 'selected';}?>>Master of Arts in Education - Major in Administration and Supervision</option>
                            <option value="Master of Arts in Education - Major in Health Sciences Education" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Health Sciences Education'){ echo 'selected';}?>>Master of Arts in Education - Major in Health Sciences Education</option>
                            <option value="Master of Arts in Education - Major in Guidance and Counseling" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Guidance and Counseling'){ echo 'selected';}?>>Master of Arts in Education - Major in Guidance and Counseling</option>
                            <option value="Master of Arts in Education - Major in Teaching English as Second Language" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Teaching English as Second Language'){ echo 'selected';}?>>Master of Arts in Education - Major in Teaching English as Second Language</option>
                            <option value="Master of Arts in Education - Major in Educational Management" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Educational Management'){ echo 'selected';}?>>Master of Arts in Education - Major in Educational Management</option>
                            <option value="Master of Arts in Education - Major in Religious Studies" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Religious Studies'){ echo 'selected';}?>>Master of Arts in Education - Major in Religious Studies</option>
                            <option value="Master of Arts in Education - Major in Special Education" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Special Education'){ echo 'selected';}?>>Master of Arts in Education - Major in Special Education</option>
                            <option value="Master of Arts in Education - Major in Mathematics" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Mathematics'){ echo 'selected';}?>>Master of Arts in Education - Major in Mathematics</option>
                            <option value="Master of Arts in Education - Major in Filipino" <?php if($fileInfo['research_course']=='Master of Arts in Education - Major in Filipino'){ echo 'selected';}?>>Master of Arts in Education - Major in Filipino</option>
                            <option value="Master of Science in Clinical Laboratory Science" <?php if($fileInfo['research_course']=='Master of Science in Clinical Laboratory Science'){ echo 'selected';}?>>Master of Science in Clinical Laboratory Science</option>
                            <option value="Master of Science in Management Engineering" <?php if($fileInfo['research_course']=='Master of Science in Management Engineering'){ echo 'selected';}?>>Master of Science in Management Engineering</option>
                            <option value="Master of Science in Information Technology" <?php if($fileInfo['research_course']=='Master of Science in Information Technology'){ echo 'selected';}?>>Master of Science in Information Technology</option>
                            <option value="Master of Arts in Guidance and Counseling" <?php if($fileInfo['research_course']=='Master of Arts in Guidance and Counseling'){ echo 'selected';}?>>Master of Arts in Guidance and Counseling</option>
                            <option value="Master of Arts in Communication" <?php if($fileInfo['research_course']=='Master of Arts in Communication'){ echo 'selected';}?>>Master of Arts in Communication</option>
                            <option value="Master of Science in Microbiology" <?php if($fileInfo['research_course']=='Master of Science in Microbiology'){ echo 'selected';}?>>Master of Science in Microbiology</option>
                            <option value="Master of Science in Pharmacy" <?php if($fileInfo['research_course']=='Master of Science in Pharmacy'){ echo 'selected';}?>>Master of Science in Pharmacy</option>
                            <option value="Master of Science in Psychology" <?php if($fileInfo['research_course']=='Master of Science in Psychology'){ echo 'selected';}?>>Master of Science in Psychology</option>
                            <option value="Master of Science in Radiologic Technology" <?php if($fileInfo['research_course']=='Master of Science in Radiologic Technology'){ echo 'selected';}?>>Master of Science in Radiologic Technology</option>
                            <option value="Master of Library and Information Science" <?php if($fileInfo['research_course']=='Master of Library and Information Science'){ echo 'selected';}?>>Master of Library and Information Science</option>
                            <option value="Master in Hospital Administration" <?php if($fileInfo['research_course']=='Master in Hospital Administration'){ echo 'selected';}?>>Master in Hospital Administration</option>
                        </select>
                    </div>

                    <div id="dropdownSupportServices" hidden>
                        <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                        <select class=" form-select" name="dropdownCourse" disabled>
                            <option value="Community Outreach Department" <?php if($fileInfo['research_course']=='Community Outreach Department'){ echo 'selected';}?>>Community Outreach Department</option>
                            <option value="Human Resource Department" <?php if($fileInfo['research_course']=='Human Resource Department'){ echo 'selected';}?>>Human Resource Department</option>
                            <option value="Information Technology Services" <?php if($fileInfo['research_course']=='Information Technology Services'){ echo 'selected';}?>>Information Technology Services</option>
                            <option value="International and External Affairs" <?php if($fileInfo['research_course']=='International and External Affairs'){ echo 'selected';}?>>International and External Affairs</option>
                            <option value="Library" <?php if($fileInfo['research_course']=='Library'){ echo 'selected';}?>>Library</option>
                            <option value="Marketing Department" <?php if($fileInfo['research_course']=='Marketing Department'){ echo 'selected';}?>>Marketing Department</option>
                            <option value="Quality Assurance Office" <?php if($fileInfo['research_course']=='Quality Assurance Office'){ echo 'selected';}?>>Quality Assurance Office</option>
                            <option value="Research and Development Center" <?php if($fileInfo['research_course']=='Research and Development Center'){ echo 'selected';}?>>Research and Development Center</option>
                            <option value="Student Personnel Services" <?php if($fileInfo['research_course']=='Student Personnel Services'){ echo 'selected';}?>>Student Personnel Services</option>
                            <option value="University Registrar" <?php if($fileInfo['research_course']=='University Registrar'){ echo 'selected';}?>>University Registrar</option>
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
                            <option value="<?= $key + 1 ?>" <?= $fileInfo['publication_month'] == $key + 1 ? 'selected' : '' ?>><?= $row ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-2 col-sm-12 mb-3">
                    <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="day-picker">
                        <!-- <option value="" selected>Day</option> -->
                        <?php for ($i = 1; $i != 32; $i++) {
                            if ($fileInfo['publication_day'] == $i) {
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
                            if ($fileInfo['publication_year'] == $i) {
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
                    <label class="fw-bold my-2">Keywords<span class="text-danger"> *</span></label>
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
                    <label class="my-2">File1.pdf</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  name='file1Shown' <?php if($fileInfo['file1_shown']){echo 'checked';} ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                    </div>
                    <label class="my-2">File2.pdf</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefaultTwo"  name='file2Shown' <?php if($fileInfo['file2_shown']){echo 'checked';} ?>>
                        <label class="form-check-label" for="flexSwitchCheckDefaultTwo">Show in Repository</label>
                    </div>
                </div>
            </div>
            <hr>

            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Feedback<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textAreaFeedbackThesis" rows="10" required><?php echo $fileInfo['feedback'] ?></textarea>
                </div>
            </div>

            <div class="row" id="publishButtonThesis">
                <div class="col">
                    <button type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitResearchDissertationButton">Edit</button>
                </div>
            </div>


        </form>

    </div>
    <script src="../../../scripts/custom/thesis-calendar-date-picker.js"></script>
    <script>
        var alertContainerThesis = document.getElementById("alert-container")
        var form = document.forms.namedItem("thesis-form");

        function submitForm(event) {
            event.preventDefault();
            const fileId = event.target.dataset.id
            const authorGroupId = event.target.dataset.coauthor_id
            var formdata = new FormData(form);

            formdata.append("fileId", fileId);
            formdata.append("coauthor_id", authorGroupId);
            formdata.append("needsRevision", "needsRevision")
            postThesis(formdata).then(data => checkResponseThesis(JSON.parse(data)));
            //     for (var pair of formdata.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }
            window.scrollTo(0, 0);
        }

        function postThesis(data) {
            return new Promise((resolve, reject) => {
                var http = new XMLHttpRequest();
                http.open("POST", "../../process/update-file.php");
                http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
                http.onerror = (e) => reject(Error(`Networking error: ${e}`));
                http.send(data);

            });
        }

        function checkResponseThesis(data) {
            if (data.response === "type_error") {
                alertContainerThesis.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }
            if (data.response === "generic_error") {
                alertContainerThesis.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }
            if (data.response === "size_error") {
                alertContainerThesis.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }
            if (data.response === "duplicate_error") {

                alertContainerThesis.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
            }
            if (data.response === "success") {
                alertContainerThesis.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
                form.reset();
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $('#dropdownResearchUnit').on('change', function() {

                if (this.value == 'Arts and Sciences') {
                    $("#dropdownArtsSciences").prop('hidden', false);
                    $("#dropdownArtsSciences :input").prop('disabled', false);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);

                } else if (this.value == 'Business and Accountancy') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', false);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', false);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Computer Studies') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', false);
                    $("#dropdownComputerStudies :input").prop('disabled', false);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Criminology') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', false);
                    $("#dropdownCriminology :input").prop('disabled', false);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Education') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', false);
                    $("#dropdownEducation :input").prop('disabled', false);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Engineering, Architecture and Aviation') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', false);
                    $("#dropdownEngineering :input").prop('disabled', false);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Maritime Education') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', false);
                    $("#dropdownMaritime :input").prop('disabled', false);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'International Hospitality Management') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', false);
                    $("#dropdownManagement :input").prop('disabled', false);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Graduate School') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', false);
                    $("#dropdownGraduateSchool :input").prop('disabled', false);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Support Services') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', false);
                    $("#dropdownSupportServices :input").prop('disabled', false);
                } else if (this.value == 'Basic Education') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                } else if (this.value == 'Senior High School') {
                    $("#dropdownArtsSciences").prop('hidden', true);
                    $("#dropdownArtsSciences :input").prop('disabled', true);

                    $("#dropdownBusinessAccountancy").prop('hidden', true);
                    $("#dropdownBusinessAccountancy :input").prop('disabled', true);

                    $("#dropdownComputerStudies").prop('hidden', true);
                    $("#dropdownComputerStudies :input").prop('disabled', true);

                    $("#dropdownCriminology").prop('hidden', true);
                    $("#dropdownCriminology :input").prop('disabled', true);

                    $("#dropdownEducation").prop('hidden', true);
                    $("#dropdownEducation :input").prop('disabled', true);

                    $("#dropdownEngineering").prop('hidden', true);
                    $("#dropdownEngineering :input").prop('disabled', true);

                    $("#dropdownMaritime").prop('hidden', true);
                    $("#dropdownMaritime :input").prop('disabled', true);

                    $("#dropdownManagement").prop('hidden', true);
                    $("#dropdownManagement :input").prop('disabled', true);

                    $("#dropdownGraduateSchool").prop('hidden', true);
                    $("#dropdownGraduateSchool :input").prop('disabled', true);

                    $("#dropdownSupportServices").prop('hidden', true);
                    $("#dropdownSupportServices :input").prop('disabled', true);
                }
            });

            $("#dropdownResearchUnit").trigger("change");

        });
    </script>