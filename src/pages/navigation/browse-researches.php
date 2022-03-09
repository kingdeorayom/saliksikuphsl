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
$pagecssVersion = filemtime('../../../styles/custom/pages/home-style.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Researches</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once '../../layouts/general/header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Browse</h1>
        </div>
    </section>

    <section class="research-fields">
        <div class="container p-5">

            <div class="row d-lg-none">
                <h3>On this page</h3>
                <hr>
                <select class="form-select my-3" aria-label="Default select example" id="dropdownOnThisPage">
                    <option value="researches" selected>Researches</option>
                    <option value="researchJournal">Research Journals</option>
                    <option value="infographics">Infographics</option>
                    <option value="researchCatalogs">Research Catalogs</option>
                    <option value="annualReports">Annual Reports</option>
                    <option value="researchAgenda">Research Agenda</option>
                    <option value="rcdp">Research Competency Development Program</option>
                </select>
            </div>

            <div class="row">

                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">

                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" id="researchesText">Researches</p>
                    <hr>
                    <p class="side-menu-text" id="researchJournalText">Research Journals</p>
                    <hr>
                    <p class="side-menu-text" id="infographicsText">Infographics</p>
                    <hr>
                    <p class="side-menu-text" id="researchCatalogsText">Research Catalogs</p>
                    <hr>
                    <p class="side-menu-text" id="annualReportsText">Annual Reports</p>
                    <hr>
                    <p class="side-menu-text" id="researchAgendaText">Research Agenda</p>
                    <hr>
                    <p class="side-menu-text" id="rcdpText">Research Competency Development Program</p>
                    <hr>

                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchesPanel">
                    <h1 class="my-2">Browse Researches</h1>
                    <hr>
                    <div class="row">

                        <div class="accordion accordion-flush">

                            <div class="accordion-item my-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#bed-researches" aria-expanded="false">
                                        Basic Education Department
                                    </button>
                                </h2>
                                <div id="bed-researches" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <a href="#" class="department-title-content">
                                            <p>Research Title Here</p>
                                        </a>
                                        <a href="#" class="department-title-content">
                                            <p>Research Title Here</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item my-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#shs-researches" aria-expanded="false">
                                        Senior High School
                                    </button>
                                </h2>
                                <div id="shs-researches" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <a href="#" class="department-title-content">
                                            <p>Research Title Here</p>
                                        </a>
                                        <a href="#" class="department-title-content">
                                            <p>Research Title Here</p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="journalsPanel">
                    <h1 class="my-2">Browse Journals</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="infographicsPanel">
                    <h1 class="my-2">Browse Infographics</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchCatalogsPanel">
                    <h1 class="my-2">Browse Research Catalogs</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="annualReportsPanel">
                    <h1 class="my-2">Browse Annual Reports</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchAgendaPanel">
                    <h1 class="my-2">Browse Research Agenda</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="rcdpPanel">
                    <h1 class="my-2">Browse Research Competency Development Program</h1>
                    <hr>
                    <div class="row">

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include_once '../../layouts/general/footer.php' ?>

    <script>
        $(document).ready(function() {
            /* on load */
            $("#journalsPanel").hide();
            $("#infographicsPanel").hide();
            $("#researchCatalogsPanel").hide();
            $("#annualReportsPanel").hide();
            $("#researchAgendaPanel").hide();
            $("#rcdpPanel").hide();
            $("#researchesText").css({
                "border-bottom": "thick solid #012265",
            });
            /* on load */
            $("#researchesText").click(function() {
                $("#researchesPanel").show();
                $("#researchesText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#journalsPanel").hide();
                $("#infographicsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#researchAgendaPanel").hide();
                $("#rcdpPanel").hide();
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#researchJournalText").click(function() {
                $("#journalsPanel").show();
                $("#researchJournalText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#infographicsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#researchAgendaPanel").hide();
                $("#rcdpPanel").hide();
                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#infographicsText").click(function() {
                $("#infographicsPanel").show();
                $("#infographicsText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#journalsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#researchAgendaPanel").hide();
                $("#rcdpPanel").hide();

                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#researchCatalogsText").click(function() {

                $("#researchCatalogsPanel").show();
                $("#researchCatalogsText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#journalsPanel").hide();
                $("#infographicsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#researchAgendaPanel").hide();
                $("#rcdpPanel").hide();

                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#annualReportsText").click(function() {
                $("#annualReportsPanel").show();
                $("#annualReportsText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#journalsPanel").hide();
                $("#infographicsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#researchAgendaPanel").hide();
                $("#rcdpPanel").hide();

                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#researchAgendaText").click(function() {

                $("#researchAgendaPanel").show();
                $("#researchAgendaText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#journalsPanel").hide();
                $("#infographicsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#rcdpPanel").hide();

                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#rcdpText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#rcdpText").click(function() {

                $("#rcdpPanel").show();
                $("#rcdpText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#researchesPanel").hide();
                $("#journalsPanel").hide();
                $("#infographicsPanel").hide();
                $("#researchCatalogsPanel").hide();
                $("#annualReportsPanel").hide();
                $("#researchAgendaPanel").hide();

                $("#researchesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchJournalText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#infographicsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchCatalogsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#annualReportsText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#researchAgendaText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $('#dropdownOnThisPage').on('change', function() {
                if (this.value == 'researches') {
                    $("#researchesPanel").show();
                    $("#researchesText").css({
                        "border-bottom": "thick solid #012265",
                    });
                    $("#journalsPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#researchAgendaPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'researchJournal') {
                    $("#journalsPanel").show();
                    $("#researchJournalText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#researchAgendaPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'infographics') {
                    $("#infographicsPanel").show();
                    $("#infographicsText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#journalsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#researchAgendaPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'researchCatalogs') {
                    $("#researchCatalogsPanel").show();
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#journalsPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#researchAgendaPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'annualReports') {
                    $("#annualReportsPanel").show();
                    $("#annualReportsText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#journalsPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#researchAgendaPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'researchAgenda') {
                    $("#researchAgendaPanel").show();
                    $("#researchAgendaText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#journalsPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#rcdpPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#rcdpText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'rcdp') {
                    $("#rcdpPanel").show();
                    $("#rcdpText").css({
                        "border-bottom": "thick solid #012265",
                    });

                    $("#researchesPanel").hide();
                    $("#journalsPanel").hide();
                    $("#infographicsPanel").hide();
                    $("#researchCatalogsPanel").hide();
                    $("#annualReportsPanel").hide();
                    $("#researchAgendaPanel").hide();

                    $("#researchesText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchJournalText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#infographicsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchCatalogsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#annualReportsText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#researchAgendaText").css({
                        "border-bottom": "thick none #012265",
                    });
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>