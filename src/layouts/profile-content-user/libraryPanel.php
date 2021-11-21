<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="myLibraryPanel">
    <h1 class="my-2">Library</h1>
    <div class="row">
        <hr class="my-4">
        <select class="form-select" aria-label="Default select example" name="dropdownLibrary" id="dropdownLibrary">
            <option value="all" selected>All Items</option>
            <option value="thesis">Thesis</option>
            <option value="capstone">Capstone</option>
            <option value="dissertation">Dissertation</option>
            <option value="journal">Journal</option>
            <option value="infographic">Infographic</option>
            <option value="researchcatalog">Research Catalog</option>
            <option value="annualreport">Annual Report</option>
            <option value="researchagenda">Research Agenda</option>
            <option value="researchcompetencydevelopmentprogram">Research Competency Development Program</option>
        </select>

    </div>
</div>