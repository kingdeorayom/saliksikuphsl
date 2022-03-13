<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
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
    <title>Submission Form</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="../../../scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>


<body>

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



                <?php
                if ($_SESSION['userType'] === "admin") {
                    echo '<h3>Choose a submission form</h3>
                        <hr>
                <div class="m-2">
                    <p class="fw-bold">What are you going to submit?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioButtonThesis" checked>
                        <label class="form-check-label" for="radioButtonThesis">Thesis/Dissertation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioButtonJournal">
                        <label class="form-check-label" for="radioButtonJournal">Research Journal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radioButtonInfographic">
                        <label class="form-check-label" for="radioButtonInfographic">Infographics</label>
                    </div>
                </div>';
                }
                ?>

            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" id="thesisDissertationText">Thesis/Dissertation</p>
                    <hr>
                    <?php
                    if ($_SESSION['userType'] === "admin") {
                        echo '
                        <p class="side-menu-text" id="researchJournalText">Research Journal</p>
                        <hr>
                        <p class="side-menu-text" id="infographicsText">Infographics</p>
                        <hr>
                    ';
                    }
                    ?>
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
        $(document).ready(function() {

            /* on load */
            $("#thesisDissertationText").css({
                "border-bottom": "thick solid #012265",
            });

            $("#co-author-1-td-panel, #co-author-2-td-panel, #co-author-3-td-panel, #co-author-4-td-panel, #co-author-1-info-panel, #co-author-2-info-panel, #co-author-3-info-panel, #co-author-4-info-panel").css('display', 'none');
            /* on load */

            $("#thesisDissertationText, #radioButtonThesis").click(function() {
                $("#thesisDissertationPanel").prop('hidden', false);
                $("#researchJournalPanel, #infographicsPanel").prop('hidden', true);
                $("#thesisDissertationText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchJournalText, #infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $("#researchJournalText, #radioButtonJournal").click(function() {
                $("#researchJournalPanel").prop('hidden', false);
                $("#thesisDissertationPanel, #infographicsPanel").prop('hidden', true);
                $("#researchJournalText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#thesisDissertationText, #infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $("#infographicsText, #radioButtonInfographic").click(function() {
                $("#infographicsPanel").prop('hidden', false);
                $("#thesisDissertationPanel, #researchJournalPanel").prop('hidden', true);
                $("#infographicsText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#thesisDissertationText, #researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $("#checkBoxAgreeThesis").change(function() {
                if ($(this).is(':checked')) {
                    $("#submitResearchDissertationButton").prop('disabled', false);
                } else {
                    $("#submitResearchDissertationButton").prop('disabled', true);
                }
            });

            $('#dropdownThesisDissertationCoAuthors').on('change', function() {
                if (this.value == 1) {
                    $("#co-author-1-td-panel").css('display', 'flex');
                    $("#co-author-2-td-panel, #co-author-3-td-panel, #co-author-4-td-panel").css('display', 'none');

                    $("#textFieldFirstNameCoAuthor1, #textFieldLastNameCoAuthor1, #textFieldEmailAuthor1").prop('required', true);

                } else if (this.value == 2) {
                    $("#co-author-1-td-panel, #co-author-2-td-panel").css('display', 'flex');
                    $("#co-author-3-td-panel, #co-author-4-td-panel").css('display', 'none');

                    $("#textFieldFirstNameCoAuthor1, #textFieldLastNameCoAuthor1, #textFieldEmailAuthor1, #textFieldFirstNameCoAuthor2, #textFieldLastNameCoAuthor2, #textFieldEmailAuthor2").prop('required', true);

                } else if (this.value == 3) {
                    $("#co-author-1-td-panel, #co-author-2-td-panel, #co-author-3-td-panel").css('display', 'flex');
                    $("#co-author-4-td-panel").css('display', 'none');

                    $("#textFieldFirstNameCoAuthor1, #textFieldLastNameCoAuthor1, #textFieldEmailAuthor1, #textFieldFirstNameCoAuthor2, #textFieldLastNameCoAuthor2, #textFieldEmailAuthor2, #textFieldFirstNameCoAuthor3, #textFieldLastNameCoAuthor3, #textFieldEmailAuthor3").prop('required', true);

                } else if (this.value == 4) {
                    $("#co-author-1-td-panel, #co-author-2-td-panel, #co-author-3-td-panel, #co-author-4-td-panel").css('display', 'flex');

                    $("#textFieldFirstNameCoAuthor1, #textFieldLastNameCoAuthor1, #textFieldEmailAuthor1, #textFieldFirstNameCoAuthor2, #textFieldLastNameCoAuthor2, #textFieldEmailAuthor2, #textFieldFirstNameCoAuthor3, #textFieldLastNameCoAuthor3, #textFieldEmailAuthor3, #textFieldFirstNameCoAuthor4, #textFieldLastNameCoAuthor4, #textFieldEmailAuthor4").prop('required', true);

                } else if (this.value == 0) {
                    $("#co-author-1-td-panel, #co-author-2-td-panel, #co-author-3-td-panel, #co-author-4-td-panel").css('display', 'none');

                    $("#textFieldFirstNameCoAuthor1, #textFieldLastNameCoAuthor1, #textFieldEmailAuthor1, #textFieldFirstNameCoAuthor2, #textFieldLastNameCoAuthor2, #textFieldEmailAuthor2, #textFieldFirstNameCoAuthor3, #textFieldLastNameCoAuthor3, #textFieldEmailAuthor3, #textFieldFirstNameCoAuthor4, #textFieldLastNameCoAuthor4, #textFieldEmailAuthor4").prop('required', false);
                }
            });

            $('#dropdownInfographicsCoAuthors').on('change', function() {
                if (this.value == 1) {
                    $("#co-author-1-info-panel").css('display', 'flex');
                    $("#co-author-2-info-panel, #co-author-3-info-panel, #co-author-4-info-panel").css('display', 'none');
                } else if (this.value == 2) {
                    $("#co-author-1-info-panel, #co-author-2-info-panel").css('display', 'flex');
                    $("#co-author-3-info-panel, #co-author-4-info-panel").css('display', 'none');
                } else if (this.value == 3) {
                    $("#co-author-1-info-panel, #co-author-2-info-panel, #co-author-3-info-panel").css('display', 'flex');
                    $("#co-author-4-info-panel").css('display', 'none');
                } else if (this.value == 4) {
                    $("#co-author-1-info-panel, #co-author-2-info-panel, #co-author-3-info-panel, #co-author-4-info-panel").css('display', 'flex');
                } else if (this.value == 0) {
                    $("#co-author-1-info-panel, #co-author-2-info-panel, #co-author-3-info-panel, #co-author-4-info-panel").css('display', 'none');
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>