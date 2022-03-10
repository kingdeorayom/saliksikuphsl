<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ../../pages/users/admin-submissions.php");
    }
} else {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/submission-forms-style.css');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Revision</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>


<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h5>Submission Details</h5>
                <hr>
                <p class="side-menu-text">Submitted on:</p>
                <p class="side-menu-text">2021-11-17 08:52:03</p>
                <hr>
                <p class="side-menu-text">Returned on:</p>
                <p class="side-menu-text">2021-11-17 08:52:03</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h5>Submission Details</h5>
                    <hr>
                    <p class="side-menu-text">Submitted on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                    <p class="side-menu-text">Returned on:</p>
                    <p class="side-menu-text">2021-11-17 08:52:03</p>
                    <hr>
                </div>

                <?php include_once './view-revision-forms/thesisDissertationPanel.php' ?>

                <!--Paste include_once statement below here, delete the php tag below-->
                <?php

                // include 1 of the 3 based on whether file is infographics, thesis, journal
                /* 
                <?php include_once './view-revision-forms/thesisDissertationPanel.php' ?>
                <?php include_once './view-revision-forms/researchJournalPanel.php' ?>
                <?php include_once './view-revision-forms/infographicsPanel.php' ?>
                */

                ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script>
        function enableDisableResubmitButtonThesis(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonThesis").disabled = false;
            } else {
                document.getElementById("resubmitButtonThesis").disabled = true;
            }
        }

        function enableDisableResubmitButtonJournal(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonJournal").disabled = false;
            } else {
                document.getElementById("resubmitButtonJournal").disabled = true;
            }
        }

        function enableDisableResubmitButtonInfographics(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonInfographics").disabled = false;
            } else {
                document.getElementById("resubmitButtonInfographics").disabled = true;
            }
        }
    </script>
</body>

</html>