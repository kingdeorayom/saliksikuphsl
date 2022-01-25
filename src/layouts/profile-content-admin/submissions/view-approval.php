<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Approval</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../../styles/custom/pages/submission-forms-style.css" type="text/css">
</head>


<body>

    <!--Header and Navigation section-->

    <?php include_once './extra-header-footer/header.php' ?>

    <section class="submit-research" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h5>Submission Details</h5>
                <hr>
                <p class="side-menu-text">Submitted by:</p>
                <p class="side-menu-text">Juan Dela Cruz</p>
                <hr>
                <p class="side-menu-text">Submitted on:</p>
                <p class="side-menu-text">2021-11-17 08:52:03</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h5>Submission Details</h5>
                    <hr>
                    <p class="side-menu-text">Submitted by:</p>
                    <p class="side-menu-text">Juan Dela Cruz</p>
                    <hr>
                    <p class="side-menu-text">Submitted on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                </div>

                <?php include_once './view-approval-forms/thesisDissertationPanel.php' ?>

                <?php /* include above 1 of the 3 based on whether file is infographics, thesis, journal, then delete this php tag

                <?php include_once './view-approval-forms/thesisDissertationPanel.php' ?>
                <?php include_once './view-approval-forms/researchJournalPanel.php' ?>
                <?php include_once './view-approval-forms/infographicsPanel.php' ?> */ ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once './extra-header-footer/footer.php' ?>
    <?php include_once '../../../../scripts/custom/pages-navigation-scripts.php' ?>
    <script src="../../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>