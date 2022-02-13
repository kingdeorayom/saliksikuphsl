<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submission</title>
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
                <p class="side-menu-text">Submitted on:</p>
                <p class="side-menu-text">2021-11-17 08:52:03</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h5>Submission Details</h5>
                    <hr>
                    <p class="side-menu-text" onclick="hey();">Submitted on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                </div>

<<<<<<< HEAD
=======
                <!--Paste include_once statement below here, delete the php tag below-->

>>>>>>> development
                <?php

                // include 1 of the 3 based on whether file is infographics, thesis, journal
                /* 
<<<<<<< HEAD
                <?php include_once './submission-forms/thesisDissertationPanel.php' ?>
                <?php include_once './submission-forms/researchJournalPanel.php' ?>
                <?php include_once './submission-forms/infographicsPanel.php' ?>
=======
                <?php include_once './view-submission-forms/thesisDissertationPanel.php' ?>
                <?php include_once './view-submission-forms/researchJournalPanel.php' ?>
                <?php include_once './view-submission-forms/infographicsPanel.php' ?>
>>>>>>> development
                */

                ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once './extra-header-footer/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>