<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header("location: ../../layouts/general/error.php");
        die();
    }
} else {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/profile-style.css');
$profileadminjs = filemtime('../../../scripts/custom/profile-admin.js');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <script src="<?php echo '../../../scripts/custom/profile-admin.js?id=' . $profileadminjs ?>" type="module"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <h1 class="my-2 p-2">Submissions</h1>
                    <hr class="my-3">
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
                                    <input type="search" autofocus class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions" id="search-submissions-admin">
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