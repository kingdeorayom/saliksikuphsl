<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "user") {
        echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
        <p style="font-size: 50px; font-weight: bold">Oops!</p>
        <p>Please login as admin to access this page.</p>
        <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
        <br><br><br>
        <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
    </div>';
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Revised</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/submission-forms-style.css" type="text/css">
</head>


<body onload="
document.getElementById('textAreaFeedbackInfographics').style.display = 'none'; 
document.getElementById('returnButtonInfographics').style.display = 'none';
document.getElementById('textAreaFeedbackJournal').style.display = 'none'; 
document.getElementById('returnButtonJournal').style.display = 'none'; 
document.getElementById('textAreaFeedbackThesis').style.display = 'none'; 
document.getElementById('returnButtonThesis').style.display = 'none';
">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

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
                <p class="side-menu-text">Returned on:</p>
                <p class="side-menu-text">2021-11-17 08:52:03</p>
                <hr>
                <p class="side-menu-text">Revised on:</p>
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
                    <p class="side-menu-text">Returned on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                    <p class="side-menu-text">Revised on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                </div>

                <?php include_once './view-revised-forms/infographicsPanel.php' ?>
                <?php include_once './view-revised-forms/researchJournalPanel.php' ?>
                <?php include_once './view-revised-forms/thesisDissertationPanel.php' ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

    <script>
        function enableRevisionInfographics(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("textAreaFeedbackInfographics").style.display = 'block';
                document.getElementById("returnButtonInfographics").style.display = 'block';

                document.getElementById("publishButtonInfographics").style.display = 'none';
            } else {
                document.getElementById("textAreaFeedbackInfographics").style.display = 'none';
                document.getElementById("returnButtonInfographics").style.display = 'none';

                document.getElementById("publishButtonInfographics").style.display = 'block';
            }
        }

        function enableRevisionJournal(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("textAreaFeedbackJournal").style.display = 'block';
                document.getElementById("returnButtonJournal").style.display = 'block';

                document.getElementById("publishButtonJournal").style.display = 'none';
            } else {
                document.getElementById("textAreaFeedbackJournal").style.display = 'none';
                document.getElementById("returnButtonJournal").style.display = 'none';

                document.getElementById("publishButtonJournal").style.display = 'block';
            }
        }

        function enableRevisionThesis(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("textAreaFeedbackThesis").style.display = 'block';
                document.getElementById("returnButtonThesis").style.display = 'block';

                document.getElementById("publishButtonThesis").style.display = 'none';
            } else {
                document.getElementById("textAreaFeedbackThesis").style.display = 'none';
                document.getElementById("returnButtonThesis").style.display = 'none';

                document.getElementById("publishButtonThesis").style.display = 'block';
            }
        }
    </script>

</body>

</html>