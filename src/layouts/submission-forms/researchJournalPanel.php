<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class=" col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchJournalPanel">
    <h1 class="my-2">Research Journal Submission Form</h1>
    <hr>
    <form action="#" method="POST">
        <div class="row mt-4">
            <div>
                <label class="fw-bold">Title*</label>
                <input type="text" class="form-control" name="textFieldJournalTitle" required>
                <p class="text-secondary mt-2">Please enter the title using <span style="font-weight: bold; text-decoration:underline;">Title Case Capitalization</span>. For example, <span class="fst-italic">"The Lighthouse"</span>.</p>
            </div>
        </div>
        <div class="row">
            <div>
                <label class="fw-bold">Sub-title</label>
                <input type="text" class="form-control" id="textFieldJournalSubTitle">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 col-sm-12">
                <label class="py-2 fw-bold">College/Department*</label>
                <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
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
            <div class="col-lg-4">
                <label class="py-2 fw-bold">Volume Number*</label>
            </div>
            <div class="col-lg-4">
                <label class="py-2 fw-bold d-none d-lg-block">Serial/Issue Number*</label>
            </div>
            <div class="col-lg-4">
                <label class="py-2 fw-bold d-none d-lg-block">ISSN</label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldVolumeNumber" required>
            </div>
            <div class="col-lg-12 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Serial/Issue Number*</label>
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldSerialIssueNumber" required>
            </div>
            <div class="col-lg-12 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">ISSN</label>
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldISSN" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="py-2 fw-bold">Editor-in-Chief*</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorFirstName" placeholder="First Name*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorMiddleInitial" placeholder="Middle Initial">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorLastName" placeholder="Surname*" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldChiefEditorNameExtension" placeholder="Extension">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12 mb-2">
                <label class="fw-bold">Email*</label>
                <input type="text" class="form-control" name="textFieldEmail" required>
                <label class="text-secondary mt-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="my-3">
                    <label class="form-label fw-bold">Description*</label>
                    <textarea class="form-control" name="textAreaDescription" rows="10" required></textarea>
                </div>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Front Cover*</label>
                    <input class="form-control" type="file" id="formFile" name="">
                    <label class="mt-3 text-secondary">Maximum Size Allowed 10 MB</label>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <label class="fw-bold mb-3">Attach Journal Copy*</label>
                    <input class="form-control" type="file" name="">
                    <label class="mt-3 text-secondary">Maximum Size Allowed 10 MB</label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-4">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" id="checkBoxAgree2" onclick="enableDisableSubmitButton2(this);">
                <label for="checkBoxAgree2">I have read, understood, and agreed to the <a href="../../pages/navigation/about.php" target="_blank">Copyright and Policies</a> of the SALIKSIK: UPHSL Research Respository.</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Submit your work" id="submitJournalButton" disabled>
            </div>
        </div>

    </form>
</div>