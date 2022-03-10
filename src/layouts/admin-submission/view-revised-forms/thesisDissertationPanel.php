<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../../layouts/general/error.php");
    die();
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="thesisDissertationPanel" hidden>

    <!-- container for alert messages -->
    <div id='alert-container'>

    </div>
    <!-- container for alert messages -->

    <h1 class="my-2">File Upload Information</h1>
    <hr>
    <!-- <form action="../../process/thesis-submission.php" method="POST" enctype="multipart/form-data"> -->
    <form onsubmit="submitForm(event)" name="thesis-form">
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
                    <option value="Non_teaching_staff">Non-teaching Staff</option>
                    <option value="School_head">School Head</option>
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
                    <option value="Law">Law</option>
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
                    <select class=" form-select" name="dropdownArtsSciences">
                        <option value="">Bachelor of Science in Psychology</option>
                        <option value="">Bachelor of Arts in Psychology</option>
                        <option value="">Bachelor of Arts in Political Science</option>
                        <option value="">Bachelor of Arts in Communication</option>
                    </select>
                </div>

                <div id="dropdownBusinessAccountancy" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownBusinessAccountancy">
                        <option value="">Bachelor of Science in Accountancy</option>
                        <option value="">Bachelor of Science in Management Accounting</option>
                        <option value="">Bachelor of Science in Business Administration Major In Business Management</option>
                        <option value="">Bachelor of Science in Business Administration Major In Marketing Management</option>
                    </select>
                </div>

                <div id="dropdownComputerStudies" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownComputerStudies">
                        <option value="">Bachelor of Science in Information Technology</option>
                        <option value="">Bachelor of Science in Computer Science</option>
                    </select>
                </div>

                <div id="dropdownCriminology" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownCriminology">
                        <option value="">Bachelor of Science in Criminology</option>
                    </select>
                </div>

                <div id="dropdownEducation" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownEducation">
                        <option value="">Bachelor of Secondary Education Major in English</option>
                        <option value="">Bachelor of Secondary Education Major in Filipino</option>
                        <option value="">Bachelor of Secondary Education Major in Mathematics</option>
                        <option value="">Bachelor of Secondary Education Major in Science</option>
                        <option value="">Bachelor of Secondary Education Major in Social Studies</option>
                        <option value="">Bachelor of Elementary Education</option>
                        <option value="">Bachelor in Library and Information Science</option>
                        <option value="">Bachelor of Early Childhood Education</option>
                        <option value="">Bachelor of Special Needs Education</option>
                        <option value="">Bachelor of Physical Education</option>
                        <option value="">Education Modular Approach Program</option>
                    </select>
                </div>

                <div id="dropdownEngineering" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownEngineering">
                        <option value="">Bachelor of Science in Mechanical Engineering</option>
                        <option value="">Bachelor of Science in Industrial Engineering</option>
                        <option value="">Bachelor of Science in Computer Engineering</option>
                        <option value="">Bachelor of Science in Electronics Engineering</option>
                        <option value="">Bachelor of Science in Electrical Engineering</option>
                        <option value="">Bachelor of Science in Civil Engineering</option>
                        <option value="">Bachelor of Science in Architecture</option>
                        <option value="">Bachelor of Science in Aircraft Maintenance Technology </option>
                    </select>
                </div>

                <div id="dropdownMaritime" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownMaritime">
                        <option value="">Bachelor of Science in Marine Engineering</option>
                        <option value="">Bachelor of Science in Marine Transportation</option>
                    </select>
                </div>

                <div id="dropdownManagement" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownManagement">
                        <option value="">Bachelor of Science in Hospitality Management</option>
                        <option value="">Bachelor of Science in Tourism Management</option>
                        <option value="">Bachelor of Science in Nutrition and Dietetics</option>
                    </select>
                </div>

                <div id="dropdownGraduateSchool" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownGraduateSchool">
                        <option value="">Doctor of Philosophy Major in Educational Management</option>
                        <option value="">Doctor of Philosophy in Business Management</option>
                        <option value="">Doctor of Occupational Therapy</option>
                        <option value="">Doctor of Physical Therapy</option>
                        <option value="">Master in Business Administration</option>
                        <option value="">Master of Science of Clinical Program Development</option>
                        <option value="">Master of Science in Microbiology</option>
                        <option value="">Master of Arts in Education - Major in Administration and Supervision</option>
                        <option value="">Master of Arts in Education - Major in Health Sciences Education</option>
                        <option value="">Master of Arts in Education - Major in Guidance and Counseling</option>
                        <option value="">Master of Arts in Education - Major in Teaching English as Second Language</option>
                        <option value="">Master of Arts in Education - Major in Educational Management</option>
                        <option value="">Master of Arts in Education - Major in Religious Studies</option>
                        <option value="">Master of Arts in Education - Major in Special Education</option>
                        <option value="">Master of Arts in Education - Major in Mathematics</option>
                        <option value="">Master of Arts in Education - Major in Filipino</option>
                        <option value="">Master of Science in Clinical Laboratory Science</option>
                        <option value="">Master of Science in Management Engineering</option>
                        <option value="">Master of Science in Information Technology</option>
                        <option value="">Master of Arts in Guidance and Counseling</option>
                        <option value="">Master of Arts in Communication</option>
                        <option value="">Master of Science in Microbiology</option>
                        <option value="">Master of Science in Pharmacy</option>
                        <option value="">Master of Science in Psychology</option>
                        <option value="">Master of Science in Radiologic Technology</option>
                        <option value="">Master of Library and Information Science</option>
                        <option value="">Master in Hospital Administration</option>
                    </select>
                </div>

                <div id="dropdownSupportServices" hidden>
                    <label class="py-2 fw-bold">Course<span class="text-danger"> *</span></label>
                    <select class=" form-select" name="dropdownSupportServices">
                        <option value="">Community Outreach Department</option>
                        <option value="">Human Resource Department</option>
                        <option value="">Information Technology Services</option>
                        <option value="">International and External Affairs</option>
                        <option value="">Library</option>
                        <option value="">Marketing Department</option>
                        <option value="">Quality Assurance Office</option>
                        <option value="">Research and Development Center</option>
                        <option value="">Student Personnel Services</option>
                        <option value="">University Registrar</option>
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
                <select id="dropdownThesisDissertationCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" onchange="showThesisDissertationCoAuthorsField();" required>
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
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor1" placeholder="First Name*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor1" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor1" placeholder="Surname*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor1" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor1">
            </div>
        </div>
        <div class="row" id="co-author-2-td-panel">
            <label class="py-2 fw-bold">Co-Author 2</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor2" placeholder="First Name*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor2" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor2" placeholder="Surname*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor2" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor2">
            </div>
        </div>
        <div class="row" id="co-author-3-td-panel">
            <label class="py-2 fw-bold">Co-Author 3</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor3" placeholder="First Name*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor3" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor3" placeholder="Surname*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor3" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor3">
            </div>
        </div>
        <div class="row" id="co-author-4-td-panel">
            <label class="py-2 fw-bold">Co-Author 4</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor4" placeholder="First Name*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor4" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor4" placeholder="Surname*">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor4" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor4">
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
                <label class="fw-bold my-2">Keywords<span class="text-danger"> *</span></label>
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
            <label class="fw-bold mb-3">Attached Files</label>
            <div class="col">
                <label class="my-2">File1.pdf</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                </div>
                <label class="my-2">File2.pdf</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                </div>
            </div>
        </div>
        <hr>

        <div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="needsRevisionThesis" name="needsRevision" value="for revision" onclick="enableRevisionThesis(this);">
                <label for="needsRevisionThesis" class="text-danger">Needs Revision</label>
            </div>
        </div>

        <div class="row" id="publishButtonThesis">
            <div class="col">
                <button type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitResearchDissertationButton">Publish</button>
            </div>
        </div>

        <div class="row" id="textAreaFeedbackThesis" hidden>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Feedback<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textAreaFeedbackThesis" rows="10" placeholder="Write your comment..."></textarea>
                </div>
            </div>
        </div>

        <div class="row" id="returnButtonThesis">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Return" id="returnThesisButton">
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
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Business and Accountancy') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', false);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Computer Studies') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', false);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Criminology') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', false);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Education') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', false);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Engineering, Architecture and Aviation') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', false);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Maritime Education') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', false);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'International Hospitality Management') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', false);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Graduate School') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', false);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Support Services') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', false);
            } else if (this.value == 'Basic Education') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            } else if (this.value == 'Senior High School') {
                $("#dropdownArtsSciences").prop('hidden', true);
                $("#dropdownBusinessAccountancy").prop('hidden', true);
                $("#dropdownComputerStudies").prop('hidden', true);
                $("#dropdownCriminology").prop('hidden', true);
                $("#dropdownEducation").prop('hidden', true);
                $("#dropdownEngineering").prop('hidden', true);
                $("#dropdownMaritime").prop('hidden', true);
                $("#dropdownManagement").prop('hidden', true);
                $("#dropdownGraduateSchool").prop('hidden', true);
                $("#dropdownSupportServices").prop('hidden', true);
            }
        });

    });
</script>