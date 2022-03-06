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

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/submission-forms-style.css');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Form</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>


<body onload="document.getElementById('researchJournalPanel').style.display = 'none'; document.getElementById('infographicsPanel').style.display='none'; document.getElementById('co-author-1-td-panel').style.display = 'none'; document.getElementById('co-author-2-td-panel').style.display = 'none'; document.getElementById('co-author-3-td-panel').style.display = 'none'; document.getElementById('co-author-4-td-panel').style.display = 'none'; document.getElementById('co-author-1-info-panel').style.display = 'none'; document.getElementById('co-author-2-info-panel').style.display = 'none'; document.getElementById('co-author-3-info-panel').style.display = 'none'; document.getElementById('co-author-4-info-panel').style.display = 'none'; document.getElementById('thesisDissertationText').style.borderBottom = 'thick solid #012265';">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Submission Forms</h1>
        </div>
    </section>

    <section class="submit-research">
        <div class="container p-5">
            <div class="row mb-4 d-lg-none">

                <h3>Choose a submission form</h3>
                <hr>

                <div class="m-2">
                    <p class="fw-bold">What are you going to submit?</p>
                    <div class="form-check">
                        <input class="form-check-input" onclick="thesisDissertationPanelClicked();" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">Thesis/Dissertation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="researchJournalPanelClicked();" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">Research Journal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" onclick="infographicsPanelClicked();" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">Infographics</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="thesisDissertationPanelClicked()" id="thesisDissertationText">Thesis/Dissertation</p>
                    <hr>
                    <p class="side-menu-text" onclick="researchJournalPanelClicked()" id="researchJournalText">Research Journal</p>
                    <hr>
                    <p class="side-menu-text" onclick="infographicsPanelClicked()" id="infographicsText">Infographics</p>
                    <hr>
                </div>
                <?php include_once '../../layouts/submission-forms/thesisDissertationPanel.php' ?>
                <?php include_once '../../layouts/submission-forms/researchJournalPanel.php' ?>
                <?php include_once '../../layouts/submission-forms/infographicsPanel.php' ?>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>

    <script>
        function thesisDissertationPanelClicked() {
            document.getElementById("thesisDissertationPanel").style.display = "block";
            document.getElementById("researchJournalPanel").style.display = "none";
            document.getElementById("infographicsPanel").style.display = "none";

            document.getElementById("thesisDissertationText").style.borderBottom = "thick solid #012265";
            document.getElementById("researchJournalText").style.borderBottom = "thick none #012265";
            document.getElementById("infographicsText").style.borderBottom = "thick none #012265";
        }

        function researchJournalPanelClicked() {
            document.getElementById("researchJournalPanel").style.display = "block";
            document.getElementById("thesisDissertationPanel").style.display = "none";
            document.getElementById("infographicsPanel").style.display = "none";

            document.getElementById("thesisDissertationText").style.borderBottom = "thick none #012265";
            document.getElementById("infographicsText").style.borderBottom = "thick none #012265";
            document.getElementById("researchJournalText").style.borderBottom = "thick solid #012265";
        }

        function infographicsPanelClicked() {
            document.getElementById("infographicsPanel").style.display = "block";
            document.getElementById("researchJournalPanel").style.display = "none";
            document.getElementById("thesisDissertationPanel").style.display = "none";

            document.getElementById("thesisDissertationText").style.borderBottom = "thick none #012265";
            document.getElementById("researchJournalText").style.borderBottom = "thick none #012265";
            document.getElementById("infographicsText").style.borderBottom = "thick solid #012265";
        }

        function showThesisDissertationCoAuthorsField() {
            var x = document.getElementById("dropdownThesisDissertationCoAuthors").value;

            if (x == 1) {
                document.getElementById("co-author-1-td-panel").style.display = "flex";
                document.getElementById("co-author-2-td-panel").style.display = "none";
                document.getElementById("co-author-3-td-panel").style.display = "none";
                document.getElementById("co-author-4-td-panel").style.display = "none";
            } else if (x == 2) {
                document.getElementById("co-author-1-td-panel").style.display = "flex";
                document.getElementById("co-author-2-td-panel").style.display = "flex";
                document.getElementById("co-author-3-td-panel").style.display = "none";
                document.getElementById("co-author-4-td-panel").style.display = "none";
            } else if (x == 3) {
                document.getElementById("co-author-1-td-panel").style.display = "flex";
                document.getElementById("co-author-2-td-panel").style.display = "flex";
                document.getElementById("co-author-3-td-panel").style.display = "flex";
                document.getElementById("co-author-4-td-panel").style.display = "none";
            } else if (x == 4) {
                document.getElementById("co-author-1-td-panel").style.display = "flex";
                document.getElementById("co-author-2-td-panel").style.display = "flex";
                document.getElementById("co-author-3-td-panel").style.display = "flex";
                document.getElementById("co-author-4-td-panel").style.display = "flex";
            } else if (x == 0) {
                document.getElementById("co-author-1-td-panel").style.display = "none";
                document.getElementById("co-author-2-td-panel").style.display = "none";
                document.getElementById("co-author-3-td-panel").style.display = "none";
                document.getElementById("co-author-4-td-panel").style.display = "none";
            }
        }

        function showInfographicsCoAuthorsField() {
            var y = document.getElementById("dropdownInfographicsCoAuthors").value;

            if (y == 1) {
                document.getElementById("co-author-1-info-panel").style.display = "flex";
                document.getElementById("co-author-2-info-panel").style.display = "none";
                document.getElementById("co-author-3-info-panel").style.display = "none";
                document.getElementById("co-author-4-info-panel").style.display = "none";
            } else if (y == 2) {
                document.getElementById("co-author-1-info-panel").style.display = "flex";
                document.getElementById("co-author-2-info-panel").style.display = "flex";
                document.getElementById("co-author-3-info-panel").style.display = "none";
                document.getElementById("co-author-4-info-panel").style.display = "none";
            } else if (y == 3) {
                document.getElementById("co-author-1-info-panel").style.display = "flex";
                document.getElementById("co-author-2-info-panel").style.display = "flex";
                document.getElementById("co-author-3-info-panel").style.display = "flex";
                document.getElementById("co-author-4-info-panel").style.display = "none";
            } else if (y == 4) {
                document.getElementById("co-author-1-info-panel").style.display = "flex";
                document.getElementById("co-author-2-info-panel").style.display = "flex";
                document.getElementById("co-author-3-info-panel").style.display = "flex";
                document.getElementById("co-author-4-info-panel").style.display = "flex";
            } else if (y == 0) {
                document.getElementById("co-author-1-info-panel").style.display = "none";
                document.getElementById("co-author-2-info-panel").style.display = "none";
                document.getElementById("co-author-3-info-panel").style.display = "none";
                document.getElementById("co-author-4-info-panel").style.display = "none";
            }
        }

        function enableDisableSubmitButtonThesis(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("submitResearchDissertationButton").disabled = false;
            } else {
                document.getElementById("submitResearchDissertationButton").disabled = true;
            }
        }

        function enableDisableSubmitButtonJournal(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("submitJournalButton").disabled = false;
            } else {
                document.getElementById("submitJournalButton").disabled = true;
            }
        }

        function enableDisableSubmitButtonInfographics(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("submitInfographicsButton").disabled = false;
            } else {
                document.getElementById("submitInfographicsButton").disabled = true;
            }
        }
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>