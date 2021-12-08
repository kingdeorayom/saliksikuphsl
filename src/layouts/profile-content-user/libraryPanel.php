<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="myLibraryPanel">
    <h1 class="my-2">Library</h1>
    <hr class="my-4">
    <div class="row">
        <div class="col-sm-12 col-md-4">
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
                <option value="researchcompetencydevelopmentprogram">RCDP</option>
            </select>
        </div>
    </div>
    <div class="library my-3">

        <div class="libraryItem p-3">
            <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Thesis</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4 class="fw-bold mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                    <p class="fw-bold">Jallorina, A., Galicia, L.</p>
                    <p class="fw-bold">2019</p>
                </div>
            </div>
            <div class="row">
                <p>Building community relations is considered as one of the most important undertakings of an educational leader who should see a constant engagement continuum between the school and the society. It can be reasonably argued that it entails challenges, thus, relevant engagement and strategies should be demonstrated. This descriptive-correlational study randomly selected educational leaders in public schools in Biñan City, Laguna, Philippines for the academic year 2018 –2019.</p>
            </div>
            <div class="row">
                <p><i class="fas fa-trash-alt"></i> Delete</p>
            </div>
            <hr class="my-2">
        </div>

        <div class="libraryItem p-3">
            <div class="row">
                <div class="col">
                    <div class="text-start">
                        <p class="fw-bold" style="color: #012265;">Thesis</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4 class="fw-bold mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                    <p class="fw-bold">Jallorina, A., Galicia, L.</p>
                    <p class="fw-bold">2019</p>
                </div>
            </div>
            <div class="row">
                <p>Building community relations is considered as one of the most important undertakings of an educational leader who should see a constant engagement continuum between the school and the society. It can be reasonably argued that it entails challenges, thus, relevant engagement and strategies should be demonstrated. This descriptive-correlational study randomly selected educational leaders in public schools in Biñan City, Laguna, Philippines for the academic year 2018 –2019.</p>
            </div>
            <div class="row">
                <p><i class="fas fa-trash-alt"></i> Delete</p>
            </div>
            <hr class="my-2">
        </div>

    </div>
</div>