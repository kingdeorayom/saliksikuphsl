<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Form</title>
    <!-- jquery CDN -->
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/submission-forms-style.css" type="text/css">
</head>


<body onload="document.getElementById('researchJournalPanel').style.display = 'none'; document.getElementById('infographicsPanel').style.display='none'; document.getElementById('co-author-1-td-panel').style.display = 'none'; document.getElementById('co-author-2-td-panel').style.display = 'none'; document.getElementById('co-author-3-td-panel').style.display = 'none'; document.getElementById('co-author-4-td-panel').style.display = 'none'; document.getElementById('co-author-1-info-panel').style.display = 'none'; document.getElementById('co-author-2-info-panel').style.display = 'none'; document.getElementById('co-author-3-info-panel').style.display = 'none'; document.getElementById('co-author-4-info-panel').style.display = 'none'; document.getElementById('thesisDissertationText').style.borderBottom = 'thick solid #012265';">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5">
        <div class="container">
            <h1 id="masthead-title-text">Submission Forms</h1>
        </div>
    </section>

    <!--About and Copyright Section-->

    <section class="submit-research">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h3>On this page</h3>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="thesisDissertationPanelClicked()">Thesis/Dissertation Submission Form</li>
                        <li class=" btn-link" onclick="researchJournalPanelClicked()">Research Journal Submission Form</li>
                        <li class=" btn-link" onclick="infographicsPanelClicked()">Infographics Submission Form</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
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
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>