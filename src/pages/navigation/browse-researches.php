<?php

session_start();

include '../../process/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query = "SELECT `file_id`,`file_type`,`file_name`,`file_dir`,`file_dir2`,`file_uploader`,`status`,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, `infographic_research_unit`, `infographic_researcher_category`,`infographic_publication_month`, `infographic_publication_year`, `infographic_title`, `infographic_description`, ii.author_first_name, ii.author_middle_initial, ii.author_surname, ii.author_ext, ii.author_email, ii.editor_first_name, ii.editor_middle_initial, ii.editor_surname, ii.editor_ext, ii.editor_email, ji.journal_title, ji.journal_subtitle, ji.department, ji.volume_number, ji.serial_issue_number, ji.ISSN, ji.journal_description, ji.chief_editor_first_name, ji.chief_editor_middle_initial, ji.chief_editor_last_name, ji.chief_editor_name_ext, ji.chief_editor_email, ci.coauthor1_first_name, ci.coauthor1_middle_initial, ci.coauthor1_surname, ci.coauthor1_name_ext, ci.coauthor1_email, ci.coauthor2_first_name, ci.coauthor2_middle_initial, ci.coauthor2_surname, ci.coauthor2_name_ext, ci.coauthor2_email, ci.coauthor3_first_name, ci.coauthor3_middle_initial, ci.coauthor3_surname, ci.coauthor3_name_ext, ci.coauthor3_email, ci.coauthor4_first_name, ci.coauthor4_middle_initial, ci.coauthor4_surname, ci.coauthor4_name_ext, ci.coauthor4_email FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

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
                            <?php
                            $unit_array = array();
                            foreach ($published as $key => $result) {
                                if ($result['file_type'] == 'thesis') {
                                    array_push($unit_array, $result['research_unit']);
                                }
                            }
                            $unit_array = array_unique($unit_array);
                            print_r($unit_array);
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
                                    <a href='#' class='department-title-content'>
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