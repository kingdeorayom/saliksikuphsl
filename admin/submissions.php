<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header("location: ../../error.php");
        die();
    }
} else {
    header("location: ../../error.php");
    die();
}

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/profile-style.css');
$profileadminjs = filemtime('../scripts/custom/profile-admin.js');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submissions</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo '../scripts/custom/profile-admin.js?id=' . $profileadminjs ?>" type="module"></script>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">

            <div class="row">
                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <?php if (isset($_SESSION['deleteSuccess'])) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Record deleted successfully!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;
                    unset($_SESSION['deleteSuccess']); ?>
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
                                <div class="input-group">
                                    <input type="search" autofocus class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions" id="search-submissions-admin" name="title_query">
                                    <button class="btn text-light search-button btn-lg rounded-0" type="button" id="admin-search-button">Search</button>
                                </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-sm-12 col-md-4">
                            <label class="fw-bold">View:</label>
                            <select class="form-select rounded-0 my-2" aria-label="Default select example" id="submission-status-dropdown" name="status_view">
                                <option value="pending" selected>For Approval</option>
                                <option value="for revision">For Revision</option>
                                <option value="revised">Revised</option>
                                <option value="published">Published</option>
                                <option value="submissions">All Submissions</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label class="fw-bold">Sort by:</label>
                            <select class="form-select rounded-0 my-2" aria-label="Default select example" id="submission-category-dropdown" name="sort_by">
                                <option value="All Category" selected>All Category</option>
                                <option value="Resource Type">Resource Type</option>
                                <option value="Research Unit">Research Unit</option>
                                <option value="Researcher's Category">Researcher's Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class ="my-3">
                            <h5>Results</h5>
                            <hr class="mb-4">
                            <!-- results-container shows "No Results!" or something when empty -->
                            <div id="results-container">
                                <div><h5 style="color: grey; text-align:center;"><br>No results found.</h5></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../includes/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>