<?php

session_start();

include '../../process/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query = "SELECT fi.*,`research_id`,ri.resource_type AS research_type,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ii.*, ji.*, ci.* FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/home-style.css');
function filter(&$value)
{
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
array_walk_recursive($published, "filter");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Researches</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="../../../scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../favicon-16x16.png">
    <link rel="manifest" href="../../../site.webmanifest">
    <link rel="mask-icon" href="../../../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

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
                    <p class="side-menu-text px-3" id="researchesText">Researches</p>
                    <hr>
                    <p class="side-menu-text px-3" id="researchJournalText">Research Journals</p>
                    <hr>
                    <p class="side-menu-text px-3" id="infographicsText">Infographics</p>
                    <hr>
                    <p class="side-menu-text px-3" id="researchCatalogsText">Research Catalogs</p>
                    <hr>
                    <p class="side-menu-text px-3" id="annualReportsText">Annual Reports</p>
                    <hr>
                    <p class="side-menu-text px-3" id="researchAgendaText">Research Agenda</p>
                    <hr>
                    <p class="side-menu-text px-3" id="rcdpText">Research Competency Development Program</p>
                    <hr>

                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchesPanel">
                    <h1 class="my-2">Browse Researches</h1>
                    <hr>

                    <div class="row">
                        <div class="accordion accordion-flush">
                            <?php
                            $unit_array = array();
                            foreach ($published as $key => $result) {

                                if ($result['file_type'] == 'thesis') {
                                    array_push($unit_array, $result['research_unit']);
                                }
                            }
                            $unit_array = array_unique($unit_array);
                            foreach ($unit_array as $key => $result) {
                                echo "<div class='accordion-item my-2'>
                        <h2 class='accordion-header'>
                            <button class='accordion-button collapsed fw-bold' type='button' data-bs-toggle='collapse' data-bs-target='#field-{$key}-researches' aria-expanded='false'>
                                {$result}
                            </button>
                        </h2>
                        <div id='field-{$key}-researches' class='accordion-collapse collapse'>
                            <div class='accordion-body'>";
                                foreach ($published as $key => $item) {
                                    if ($item['file_type'] == 'thesis' && $item['research_unit'] == $result) {
                                        echo "
                                    <a href='../../layouts/repository/view-article.php?id={$item['file_id']}' class='department-title-content'>
                                        <p>{$item['research_title']}</p>
                                    </a>";
                                    }
                                }
                                echo "</div>
                        </div>
                    </div>";
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="journalsPanel" hidden>
                    <h1 class="my-2">Browse Journals</h1>
                    <hr>
                    <div class="row">
                        <div class="accordion accordion-flush">
                            <?php
                            $unit_array = array();
                            foreach ($published as $key => $result) {

                                if ($result['file_type'] == 'journal') {
                                    array_push($unit_array, $result['department']);
                                }
                            }
                            $unit_array = array_unique($unit_array);
                            foreach ($unit_array as $key => $result) {
                                echo "<div class='accordion-item my-2'>
                        <h2 class='accordion-header'>
                            <button class='accordion-button collapsed fw-bold' type='button' data-bs-toggle='collapse' data-bs-target='#field-{$key}-researches' aria-expanded='false'>
                                {$result}
                            </button>
                        </h2>
                        <div id='field-{$key}-researches' class='accordion-collapse collapse'>
                            <div class='accordion-body'>";
                                foreach ($published as $key => $item) {
                                    if ($item['file_type'] == 'journal' && $item['department'] == $result) {
                                        echo "
                                    <a href='../../layouts/repository/view-article.php?id={$item['file_id']}' class='department-title-content'>
                                        <p>{$item['journal_title']}</p>
                                    </a>";
                                    }
                                }
                                echo "</div>
                        </div>
                    </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchCatalogsPanel" hidden>
                    <h1 class="my-2">Browse Research Catalogs</h1>
                    <hr>
                    <div class="row">
                        <div class="browseResearchCatalogs">
                            <a href="#" class="actual-content-title">
                                <p>Research Catalog 1 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Research Catalog 2 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Research Catalog 3 Title Here</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="annualReportsPanel" hidden>
                    <h1 class="my-2">Browse Annual Reports</h1>
                    <hr>
                    <div class="row">
                        <div class="browseAnnualReports">
                            <a href="#" class="actual-content-title">
                                <p>Annual Report 1 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Annual Report 2 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Annual Report 3 Title Here</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="researchAgendaPanel" hidden>
                    <h1 class="my-2">Browse Research Agenda</h1>
                    <hr>
                    <div class="row">
                        <div class="browseResearchAgenda">
                            <a href="#" class="actual-content-title">
                                <p>Research Agenda 1 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Research Agenda 2 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>Research Agenda 3 Title Here</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="rcdpPanel" hidden>
                    <h1 class="my-2">Browse Research Competency Development Program</h1>
                    <hr>
                    <div class="row">
                        <div class="browseRCDP">
                            <a href="#" class="actual-content-title">
                                <p>RCDP 1 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>RCDP 2 Title Here</p>
                            </a>
                            <a href="#" class="actual-content-title">
                                <p>RCDP 3 Title Here</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mx-auto col-md-12 col-xs-12 main-column" id="infographicsPanel" hidden>
                    <h1 class="my-2">Browse Infographics</h1>
                    <hr>
                    <div class="row">
                        <div class="accordion accordion-flush">
                            <?php
                            foreach ($published as $key => $item) {
                                if ($item['file_type'] == 'infographic') {
                                    echo "
                                <a href='../../layouts/repository/view-article.php?id={$item['file_id']}' class='department-title-content'>
                                    <p>{$item['infographic_title']}</p>
                                </a>";
                                }
                            }
                            echo "</div>";

                            ?>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </section>

    <?php include_once '../../layouts/general/footer.php' ?>

    <script>
        $(document).ready(function() {
            /* on load */
            $("#researchesText").css({
                "border-left": "thick solid #012265",
            });
            /* on load */

            $("#researchesText").click(function() {
                $("#researchesPanel").prop('hidden', false);
                $("#journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                $("#researchesText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#researchJournalText").click(function() {
                $("#journalsPanel").prop('hidden', false);
                $("#researchesPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                $("#researchJournalText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#infographicsText").click(function() {
                $("#infographicsPanel").prop('hidden', false);
                $("#researchesPanel, #journalsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                $("#infographicsText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #researchJournalText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#researchCatalogsText").click(function() {
                $("#researchCatalogsPanel").prop('hidden', false);
                $("#researchesPanel, #journalsPanel, #infographicsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                $("#researchCatalogsText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #researchJournalText, #infographicsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#annualReportsText").click(function() {
                $("#annualReportsPanel").prop('hidden', false);
                $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                $("#annualReportsText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #researchAgendaText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#researchAgendaText").click(function() {
                $("#researchAgendaPanel").prop('hidden', false);
                $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #rcdpPanel").prop('hidden', true);
                $("#researchAgendaText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #rcdpText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#rcdpText").click(function() {
                $("#rcdpPanel").prop('hidden', false);
                $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel").prop('hidden', true);
                $("#rcdpText").css({
                    "border-left": "thick solid #012265",
                });
                $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText").css({
                    "border-left": "thick none #012265",
                });
            });

            $('#dropdownOnThisPage').on('change', function() {
                if (this.value == 'researches') {
                    $("#researchesPanel").prop('hidden', false);
                    $("#journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                    $("#researchesText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'researchJournal') {
                    $("#journalsPanel").prop('hidden', false);
                    $("#researchesPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                    $("#researchJournalText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'infographics') {
                    $("#infographicsPanel").prop('hidden', false);
                    $("#researchesPanel, #journalsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                    $("#infographicsText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #researchJournalText, #researchCatalogsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'researchCatalogs') {
                    $("#researchCatalogsPanel").prop('hidden', false);
                    $("#researchesPanel, #journalsPanel, #infographicsPanel, #annualReportsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                    $("#researchCatalogsText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #researchJournalText, #infographicsText, #annualReportsText, #researchAgendaText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'annualReports') {
                    $("#annualReportsPanel").prop('hidden', false);
                    $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #researchAgendaPanel, #rcdpPanel").prop('hidden', true);
                    $("#annualReportsText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #researchAgendaText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'researchAgenda') {
                    $("#researchAgendaPanel").prop('hidden', false);
                    $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #rcdpPanel").prop('hidden', true);
                    $("#researchAgendaText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #rcdpText").css({
                        "border-left": "thick none #012265",
                    });
                } else if (this.value == 'rcdp') {
                    $("#rcdpPanel").prop('hidden', false);
                    $("#researchesPanel, #journalsPanel, #infographicsPanel, #researchCatalogsPanel, #annualReportsPanel, #researchAgendaPanel").prop('hidden', true);
                    $("#rcdpText").css({
                        "border-left": "thick solid #012265",
                    });
                    $("#researchesText, #researchJournalText, #infographicsText, #researchCatalogsText, #annualReportsText, #researchAgendaText").css({
                        "border-left": "thick none #012265",
                    });
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>