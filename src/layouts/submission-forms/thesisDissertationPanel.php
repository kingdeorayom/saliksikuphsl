<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="thesisDissertationPanel">
    <h1 class="my-2">Thesis and Dissertation Submission Form</h1>
    <hr>
    <form action="../../process/thesis-submission.php" method="POST" enctype="multipart/form-data">
        <div class="row mt-4">
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Resource Type*</label>
                <select class="form-select" aria-label="Default select example" name="dropdownResourceType">
                    <option value="dissertation" selected>Dissertation</option>
                    <option value="thesis">Thesis</option>
                    <option value="capstone">Capstone</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Researcher's Category*</label>
                <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                    <option value="undergraduate" selected>Undergraduate</option>
                    <option value="postgraduate">Postgraduate</option>
                    <option value="faculty">Faculty</option>
                    <option value="non_teaching_staff">Non-teaching Staff</option>
                    <option value="school_head">School Head</option>
                </select>
            </div>
            <div class="col-lg-4 col-sm-12">
                <label class="py-2 fw-bold">Research Unit*</label>
                <select class="form-select" aria-label="Default select example" name="dropdownResearchUnit">
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
            <div>
                <label class="fw-bold">Research Title*</label>
                <input type="text" class="form-control" name="textFieldResearchTitle" id="textFieldResearchTitle" required>
                <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"From Letters to Life: Understanding Language Teachers Experiences in Teaching Literature"</span>.</p>
            </div>
        </div>
        <div class="row mb-3">
            <label class="py-2 fw-bold">Corresponding Author*</label>
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
                <label class="fw-bold">Email*</label>
            </div>
            <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                <label class="fw-bold">Publication Date*</label>
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
                <label class="fw-bold">Publication Date*</label>
            </div>
            <div class="col-lg-6 col-sm-12 mb-3 d-sm-block d-lg-none">
                <label class="text-secondary">Year is required, Month and Date are optional</label>
            </div>
            <div class="col-lg-2 col-sm-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationMonth">
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
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay">
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
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" required>
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
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
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
                <input type="text" class="form-control" name="textFieldNameExtenstionCoAuthor1" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email*</label>
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
                <input type="text" class="form-control" name="textFieldNameExtenstionCoAuthor2" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email*</label>
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
                <input type="text" class="form-control" name="textFieldNameExtenstionCoAuthor3" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email*</label>
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
                <input type="text" class="form-control" name="textFieldNameExtenstionCoAuthor4" placeholder="Extension">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email*</label>
                <input type="text" class="form-control" name="textFieldEmailAuthor4">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Abstract*</label>
                    <textarea class="form-control" name="textareaAbstract" rows="10" required></textarea>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div>
                <label class="fw-bold my-2">Keywords</label>
                <input type="text" class="form-control" name="textareaKeywords" id="textFieldResearchKeyword" required>
            </div>
        </div>
        <div class="row">
            <label class="fw-bold my-2">Research Field* <span class="text-secondary fw-light">Tick all that applies</span></label>
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
            <div class="mb-3">
                <label class="fw-bold mb-3">Attach Research Paper*</label>
                <input class="form-control" type="file" name="fileSubmit" required>
                <label class="mt-3 text-secondary">Maximum Size Allowed 10 MB</label>
                <?php 
                
                if (isset($_SESSION['submitError'])){ ?>
                     <div>Hey</div>
                    <?php } ?>
            </div>
        </div>
        <hr>
        <div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgree1" onclick="enableDisableSubmitButton1(this);">
                <label for="checkBoxAgree1">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitResearchDissertationButton" disabled>
            </div>
        </div>
    </form>
    
</div>