<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>Please login as admin to access this page.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
        die();
        // echo '<a href="../../../index.php">go back</a><br><br>';
        // die('Please login as admin to access this page. <br>Click the link above to return to the login page, or to the homepage if already logged in.');
    }
} else {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>Please login as admin to access this page.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../index.php">go back</a><br><br>';
    // die('Please login as admin to access this page. <br>Click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <script src="../../../scripts/custom/profile-admin.js" type="module"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/profile-style.css" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <!-- <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Submissions</h1>
        </div>
    </section> -->

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <h1 class="my-2 p-2">Submissions</h1>
                    <hr class="my-4">
                    <div class="row fw-bold p-3 text-light text-center d-flex justify-content-center">
                        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="pending-container">
                            <p>FOR APPROVAL</p>
                            <h1 class="display-4">0</h1>
                        </div>
                        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="revision-container">
                            <p>FOR REVISION</p>
                            <h1 class="display-4">0</h1>
                        </div>
                        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="revised-container">
                            <p>REVISED</p>
                            <h1 class="display-4">0</h1>
                        </div>
                        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="published-container">
                            <p>PUBLISHED</p>
                            <h1 class="display-4">0</h1>
                        </div>
                        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="submissions-container">
                            <p>ALL SUBMISSIONS</p>
                            <h1 class="display-4">0</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col my-1 mx-1">
                            <form action="">
                                <div class="input-group">
                                    <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions" id="search-submissions-admin">
                                    <button class="btn text-light search-button btn-lg rounded-0" type="" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-sm-12 col-md-4">
                            <label class="fw-bold">View:</label>
                            <select class="form-select rounded-0 my-2" aria-label="Default select example" id="submission-status-dropdown">
                                <option value="pending" selected>For Approval</option>
                                <option value="for revision">For Revision</option>
                                <option value="revised">Revised</option>
                                <option value="published">Published</option>
                                <option value="submissions">All Submissions</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label class="fw-bold">Sort by:</label>
                            <select class="form-select rounded-0 my-2" aria-label="Default select example" id="submission-category-dropdown">
                                <option selected>All category</option>
                                <option>Resource Type</option>
                                <option>Research Unit</option>
                                <option>Researcher's Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-4">

                        <!--For Approval-->

                        <div class="forApproval my-3" id="pending-results-container">
                            <h5>For Approval</h5>
                            <hr class="mb-4">
                            <!-- results-container shows "No Results!" or something when empty -->
                            <div class="results-container" hidden>
                                <div>No Results!</div>
                            </div>
                        </div>

                        <!--For Revision-->

                        <div class="forRevision my-3" id="revision-results-container" hidden>
                            <h5>For Revision</h5>
                            <hr class="mb-4">
                            <!-- results-container shows "No Results!" or something when empty -->
                            <div class="results-container" hidden>
                                <div>No Results!</div>
                            </div>
                        </div>

                        <!--Revised-->

                        <div class="revised my-3" id="revised-results-container" hidden>
                            <h5>Revised</h5>
                            <hr class="mb-4">
                            <!-- results-container shows "No Results!" or something when empty -->
                            <div class="results-container" hidden>
                                <div>No Results!</div>
                            </div>
                        </div>

                        <!--Published-->

                        <div class="published my-3" id="published-results-container" hidden>
                            <h5>Published</h5>
                            <hr class="mb-4">
                            <!-- results-container shows "No Results!" or something when empty -->
                            <div class="results-container" hidden>
                                <div>No Results!</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>