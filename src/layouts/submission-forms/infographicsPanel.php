<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="infographicsPanel">

    <!-- container for alert messages -->
    <div id='alert-container-infographic'>

    </div>
    <!-- container for alert messages -->
    <h1 class="my-2">Infographics Submission Form</h1>
    <hr>
    <form onsubmit="submitFormInfographic(event)" name="infographic-form">
        <div class="row">
            <div class="col-lg-3">
                <label class="py-2 fw-bold">Research Unit<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12 py-2">
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
            <div class="col-lg-3 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                    <option value="Undergraduate" selected>Undergraduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Non-Teaching Staff">Non-teaching Staff</option>
                    <option value="School Head">School Head</option>
                </select>
            </div>
            <div class="col-lg-3 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationMonth" id="info-month-picker" onchange="changeInputInfo()">
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
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="info-day-picker">
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
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" id="info-year-picker" onchange="changeInputInfo()" required>
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
        <div class="row my-2">
            <div>
                <label class="fw-bold">Title/Topic<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldInfographicsTitle" required>
            </div>
        </div>
        <div class="row my-2">
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
                <input type="text" class="form-control" name="textFieldEmail" required>
                <label class="text-secondary my-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row my-2">
            <label class="py-2 fw-bold">Graphics Editor<span class="text-danger"> *</span></label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorFirstName" placeholder="First Name*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorMiddleInitial" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorLastName" placeholder="Surname*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorNameExtension" placeholder="Extension">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldGraphicsEditorEmail" required>
                <label class="text-secondary my-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 col-sm-12">
                <label class="fw-bold">No. of Co-Authors</label>
                <select id="dropdownInfographicsCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" onchange="showInfographicsCoAuthorsField();" required>
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <label class="text-secondary">Max 4 co-authors allowed</label>
            </div>
        </div>
        <div class="row" id="co-author-1-info-panel">
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
        <div class="row" id="co-author-2-info-panel">
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
        <div class="row" id="co-author-3-info-panel">
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
        <div class="row" id="co-author-4-info-panel">
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
                    <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textareaDescription" rows="10" required></textarea>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="mb-3">
                <label class="fw-bold mb-3">Attach File<span class="text-danger"> *</span></label>
                <input class="form-control" type="file" name="fileSubmit" accept=".pdf" required>
                <label class="mt-3 text-secondary"><span class="fw-bold text-danger">Important:</span> Maximum Size Allowed 10 MB. File must be in <strong>PDF</strong> file format.</label>
            </div>
        </div>
        <hr>
        <div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgreeInfographics" onclick="enableDisableSubmitButtonInfographics(this);">
                <label for="checkBoxAgreeInfographics">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your research" id="submitInfographicsButton" disabled>
            </div>
        </div>
    </form>
</div>
<script src="../../../scripts/custom/info-calendar-date-picker.js"></script>
<script src="../../../scripts/custom/ajax-submissions-info.js"></script>