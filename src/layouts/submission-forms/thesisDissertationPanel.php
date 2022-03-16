<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="thesisDissertationPanel">

    <!-- container for alert messages -->
    <div class="row my-3">
        <label class="my-2" id="fileUploadLabelThesis" hidden>Uploading your file...</label>

        <div class="progress" id='thesis-progress-container' hidden>
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="thesis-progress-bar">0%</div>
        </div>
    </div>
    <div id='alert-container'>

    </div>
    <!-- container for alert messages -->

    <h1 class="my-2">Thesis and Dissertation Submission Form</h1>
    <hr>
    <!-- <form action="../../process/thesis-submission.php" method="POST" enctype="multipart/form-data"> -->
    <form name="thesis-form">
        <div class="row mt-4">
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Resource Type<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="dropdownResourceType">
                    <option value="Dissertation">Dissertation</option>
                    <option value="Thesis">Thesis</option>
                    <option value="Capstone">Capstone</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                    <option value="Undergraduate" selected>Undergraduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Non-Teaching Staff">Non-teaching Staff</option>
                    <option value="School Head">School Head</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Research Unit<span class="text-danger"> *</span></label>
                <select class="form-select" aria-label="Default select example" name="dropdownResearchUnit" id="dropdownResearchUnit">
                    <option value="Basic Education" selected>Basic Education</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="Arts and Sciences">Arts and Sciences</option>
                    <option value="Business and Accountancy">Business and Accountancy</option>
                    <option value="Computer Studies">Computer Studies</option>
                    <option value="Criminology">Criminology</option>
                    <option value="Education">Education</option>
                    <option value="Engineering, Architecture and Aviation">Engineering, Architecture and Aviation</option>
                    <option value="Maritime Education">Maritime Education</option>
                    <option value="International Hospitality Management">International Hospitality Management</option>
                    <option value="Graduate School">Graduate School</option>
                    <option value="Support Services">Support Services</option>
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
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
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
                <input type="text" class="form-control" name="textFieldResearchTitle" id="textFieldResearchTitle" required>
                <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"From Letters to Life: Understanding Language Teachers Experiences in Teaching Literature"</span>.</p>
            </div>
        </div>
        <div class="row mb-3">
            <label class="py-2 fw-bold">Corresponding Author<span class="text-danger"> *</span></label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorFirstName" placeholder="First Name*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorMiddleInitial" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorLastName" placeholder="Surname*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorNameExtension" placeholder="Extension">
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
                <input type="text" class="form-control" name="textFieldEmail" required>
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
                    <option value=1 selected>January</option>
                    <option value=2>February</option>
                    <option value=3>March</option>
                    <option value=4>April</option>
                    <option value=5>May</option>
                    <option value=6>June</option>
                    <option value=7>July</option>
                    <option value=8>August</option>
                    <option value=9>September</option>
                    <option value=10>October</option>
                    <option value=11>November</option>
                    <option value=12>December</option>
                </select>
            </div>
            <div class="col-lg-2 col-sm-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="day-picker">
                    <!-- <option value="" selected>Day</option> -->
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
            <div class="col-lg-2 col-sm-12">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" id="year-picker" onchange="changeInput()" required>
                    <!-- <option value="" selected>Year</option> -->
                    <option value="2022">2022</option>
                    <option value="2021" selected>2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
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
                <select id="dropdownThesisDissertationCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" required>
                    <option value=0 selected>0</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                </select>
                <label class="text-secondary">Max 4 co-authors allowed</label>
            </div>
        </div>
        <div class="row" id="co-author-1-td-panel">
            <label class="py-2 fw-bold">Co-Author 1</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor1" placeholder="First Name*" id="textFieldFirstNameCoAuthor1">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor1" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor1" placeholder="Surname*" id="textFieldLastNameCoAuthor1">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor1" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor1" id="textFieldEmailAuthor1">
            </div>
        </div>
        <div class="row" id="co-author-2-td-panel">
            <label class="py-2 fw-bold">Co-Author 2</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor2" placeholder="First Name*" id="textFieldFirstNameCoAuthor2">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor2" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor2" placeholder="Surname*" id="textFieldLastNameCoAuthor2">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor2" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor2" id="textFieldEmailAuthor2">
            </div>
        </div>
        <div class="row" id="co-author-3-td-panel">
            <label class="py-2 fw-bold">Co-Author 3</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor3" placeholder="First Name*" id="textFieldFirstNameCoAuthor3">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor3" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor3" placeholder="Surname*" id="textFieldLastNameCoAuthor3">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor3" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor3" id="textFieldEmailAuthor3">
            </div>
        </div>
        <div class="row" id="co-author-4-td-panel">
            <label class="py-2 fw-bold">Co-Author 4</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor4" placeholder="First Name*" id="textFieldFirstNameCoAuthor4">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor4" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor4" placeholder="Surname*" id="textFieldLastNameCoAuthor4">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor4" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor4" id="textFieldEmailAuthor4">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Abstract<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textareaAbstract" rows="10" required></textarea>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div>
                <label class="fw-bold my-2">Keywords<span class="text-danger"> *</span> <span class="text-secondary fw-normal">Each keyword should be separated by a comma. For example: <em>language</em>, <em>literature</em>, <em>teaching experiences</em></span></label>
                <input type="text" class="form-control" name="textareaKeywords" id="textFieldResearchKeyword" required>
            </div>
        </div>
        <div class="row">
            <label class="fw-bold my-2">Research Field<span class="text-danger"> *</span> <span class="text-secondary fw-light">Tick all that applies</span></label>
            <div class="col-lg-4 col-sm-12">
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Accountancy and Marketing" id="checkBoxAccountancyMarketing" name="researchFields[]">
                    <label for="checkBoxAccountancyMarketing">Accountancy and Marketing</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Educational Management" id="checkBoxEducationalManagement" name="researchFields[]">
                    <label for="checkBoxEducationalManagement">Educational Management</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="IT and Engineering" id="checkBoxITEngineering" name="researchFields[]">
                    <label for="checkBoxITEngineering">IT and Engineering</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Tourism and Hospitality" id="checkBoxTourismHospitality" name="researchFields[]">
                    <label for="checkBoxTourismHospitality">Tourism and Hospitality</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Arts and Humanities" id="checkBoxArtsHumanities" name="researchFields[]">
                    <label for="checkBoxArtsHumanities">Arts and Humanities</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Education and Social Sciences" id="checkBoxEducationSocialSciences" name="researchFields[]">
                    <label for="checkBoxEducationSocialSciences">Education and Social Sciences</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Law and Justice System" id="checkBoxLawJusticeSystem" name="researchFields[]">
                    <label for="checkBoxLawJusticeSystem">Law and Justice System</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Business Management" id="checkBoxBusinessManagement" name="researchFields[]">
                    <label for="checkBoxBusinessManagement">Business Management</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Health and Sciences" id="checkBoxHealthSciences" name="researchFields[]">
                    <label for="checkBoxHealthSciences">Health and Sciences</label>
                </div>
                <div class="form-check m-2">
                    <input class="form-check-input" type="checkbox" value="Marine and Aviation" id="checkBoxMarineAviation" name="researchFields[]">
                    <label for="checkBoxMarineAviation">Marine and Aviation</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Research Paper<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" name="fileSubmit" accept=".pdf" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>PDF</strong> file format.</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Questionnaire<span class="text-danger"> *</span></label>
                    <input class="form-control" type="file" name="fileQuestionnaire" accept=".pdf" required>
                    <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>PDF</strong> file format.</label>
                </div>
            </div>
        </div>
        <hr>
        <?php if ($_SESSION['userType'] != 'admin') {
            echo '<div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgreeThesis">
                <label for="checkBoxAgreeThesis">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>';
        } ?>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitResearchDissertationButton" <?php if ($_SESSION['userType'] !== "admin") {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>>Submit your research</button>
            </div>
        </div>

    </form>

</div>
<script src="../../../scripts/custom/thesis-calendar-date-picker.js"></script>
<script type="text/javascript">
    $("form[name='thesis-form']").on("submit", function(event) {
        event.preventDefault();
        $("#thesis-progress-container").prop('hidden', false);
        $("#fileUploadLabelThesis").prop('hidden', false);
        var formData = new FormData(this);
        window.scrollTo(0, 0);
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100)
                        $('#thesis-progress-bar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                    }
                })
                return xhr;
            },
            method: "POST",
            url: "../../process/thesis-submission.php",
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(data) {

            $("#thesis-progress-container").prop('hidden', true);
            $("#fileUploadLabelThesis").prop('hidden', true);
            if (data.response === "type_error") {
                $("#alert-container").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.response === "generic_error") {
                $("#alert-container").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "size_error") {
                $("#alert-container").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "duplicate_error") {
                $("#alert-container").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
            } else if (data.response === "success") {
                $("#alert-container").html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                document.forms.namedItem("thesis-form").reset();
                $("#dropdownResearchUnit").trigger("change");
                $("#dropdownThesisDissertationCoAuthors").trigger('change');
            }
        })
    })
</script>

<script>
    $(document).ready(function() {

        $('#dropdownResearchUnit').on('change', function() {

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
        });

        $("#dropdownResearchUnit").trigger("change");
    });
</script>