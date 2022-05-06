<?php

session_start();

include './includes/connection.php';
if (!isset($_SESSION['isLoggedIn'])) {
    header("location: /index.php");
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/home-style.css');

$statement = $connection->prepare("SELECT ri.resource_type, COUNT(ri.file_ref_id) AS count FROM research_information AS ri GROUP BY ri.resource_type");
$statement->execute();
$result = $statement->get_result();
$thesis_count = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="d-flex flex-column min-vh-100">

    <!--Header and Navigation section-->

    <?php include_once 'includes/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5">
        <div class="container">
            <div class="jumbotron">
                <h1 id="masthead-title-text">Welcome to SALIKSIK: UPHSL Research Repository</h1>
                <p class="mt-3" id="masthead-content-text" style="text-align:start">SALIKSIK: UPHSL Research Repository is an online tool and database where you can view, upload and download materials pertaining to research outputs of the university. It allows you to have access to a wide array of research materials in terms of a given time period, particular college/department, or research areas. It also provides access to the annual reports, research competency development program, institutional research agenda and other relevant research documents of the Research Center.</p>
            </div>
        </div>
    </section>

    <!--Search section-->

    <section class="search-section p-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="input-group mb-3" method="GET" action="/repository.php">
                        <input type="search" class="form-control form-search rounded-0" id="home-search-bar" placeholder="Search the repository" aria-label="Search the repository" name="title_query">
                        <button class="btn text-light search-button btn-lg rounded-0" id="button-search">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center mb-3">
                    <a href="#"><button class="btn btn-link btn-lg search-option-buttons" data-bs-toggle="modal" data-bs-target="#search-modal" type="button" id=""><i class="fas fa-search fa-2x p-3" style="color: gray;"></i><br>Advanced Search</button></a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="./research/browse-researches.php"><button class="btn btn-link btn-lg search-option-buttons" type="button" id=""><i class="fas fa-book fa-2x p-3" style="color: gray;"></i><br>Browse Researches</button></a>
                </div>
            </div>

            <!-- Modal window -->
            <div class="modal fade" id="search-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form class="modal-content" method="GET" action="/repository.php">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fas fa-search mx-2" style="color: white;"></i> Advanced Search</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="modal-body" id="advanced-search" name="advanced-filter">
                            <div class="row my-3 px-3">
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">Find articles</h6>
                                </div>
                                <div class="col-6">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">with <span class="fw-bold">all</span> of the words</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" id="advanced_word_search" type="text" name="word_search">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">with the <span class="fw-bold">exact phrase</span></h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" id="advanced_phrase_search" type="text" name="phrase_search">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">with <span class="fw-bold">at least one</span> of the words</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" id="advanced_words_exist" type="text" name="word_exists">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal"><span class="fw-bold">without</span> the words</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" id="advanced_words_not_exists" type="text" name="word_not_exists">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">where my words occur</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="exists" value="anywhere" id="radio-button-anywhere" checked>
                                        <label class="form-check-label" for="radio-button-anywhere">anywhere in the article</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exists" value="title" id="radio-button-title">
                                        <label class="form-check-label" for="radio-button-title">in the title of the article</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">Return articles <span class="fw-bold">authored</span> by</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" id="advanced_author_search" type="text" name="authored_by">
                                    <label class="fst-italic text-secondary" style="font-size: 12px;">e.g., "Dela Cruz" or Garcia</label>
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">Return articles <span class="fw-bold">dated</span> between</h6>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mt-2">
                                        <input type="text" class="form-control form-control-sm rounded-0 me-1" id="advanced_from_year" name="advanced_from_year">
                                        <label class="mt-1">—</label>
                                        <input type="text" class="form-control form-control-sm rounded-0 ms-1" id="advanced_to_year" name="advanced_to_year">
                                    </div>
                                    <label class="fst-italic text-secondary" style="font-size: 12px;">e.g., 2021</label>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary rounded-0 modal-search-button">Search</button>
                                </div>
                            </div>
                        </form>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!--Research Fields Section-->

    <section class="research-fields p-5">
        <div class="container">
            <h1 id="research-field-title-text">Research Fields</h1>
            <hr class="hr-home">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <!--Add justify-content-center to center items inside col-->
                    <img src="assets/images/research-fields/accountancy-marketing.png" class="research-fields-logos" alt="Accountancy and Marketing">
                    <a href="research/research-field.php?q=Accountancy and Marketing" class="research-field-image-link">
                        <p>Accountancy and Marketing</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/arts-humanities.png" class="research-fields-logos" alt="Arts and Humanities">
                    <a href="research/research-field.php?q=Arts and Humanities" class="research-field-image-link">
                        <p>Arts and Humanities</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/educational-management.png" class="research-fields-logos" alt="Educational Management">
                    <a href="research/research-field.php?q=Educational Management" class="research-field-image-link">
                        <p>Educational Management</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/education-social-sciences.png" class="research-fields-logos" alt="Education and Social Sciences">
                    <a href="research/research-field.php?q=Education and Social Sciences" class="research-field-image-link">
                        <p>Education and Social Sciences</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/business-management.png" class="research-fields-logos" alt="Business Management">
                    <a href="research/research-field.php?q=Business Management" class="research-field-image-link">
                        <p>Business Management</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/health-sciences.png" class="research-fields-logos" alt="Health and Sciences">
                    <a href="research/research-field.php?q=Health and Sciences" class="research-field-image-link">
                        <p>Health and Sciences</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/it.png" class="research-fields-logos" alt="Information Technology">
                    <a href="research/research-field.php?q=Information Technology" class="research-field-image-link">
                        <p>Information Technology</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/law-justice-system.png" class="research-fields-logos" alt="Law and Justice System">
                    <a href="research/research-field.php?q=Law and Justice System" class="research-field-image-link">
                        <p>Law and Justice System</p>
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 mx-auto d-flex align-items-center research-field-column-item">
                    <img src="assets/images/research-fields/tourism-hospitality.png" class="research-fields-logos" alt="Tourism and Hospitality">
                    <a href="research/research-field.php?q=Tourism and Hospitality" class="research-field-image-link">
                        <p>Tourism and Hospitality</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a class="view-more-link" href="./research/browse-research-fields.php">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!--Repository Metrics-->

    <section class="repository-metrics py-5">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1 style="font-weight: bold;">Repository Metrics</h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center m-5">
                <?php foreach ($thesis_count as $key => $row) : ?>
                    <div class="col-lg-3 col-sm-12 repository-metrics-column-item m-3 text-center rounded-0">
                        <img src="assets/images/repository-metrics/research-file.png" class="repository-metrics-logos my-5">
                        <p class="repository-metrics-counter"><?php echo number_format($row['count']) ?></p>
                        <p class="repository-metrics-p-text"><?php echo $row['resource_type']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a class="view-more-statistics-link" href="./statistics.php">View More Statistics</a>
                </div>
            </div>
        </div>
    </section>

    <!--Promotion-->

    <section class="promotion p-5 my-3">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5 col-md-12 m-1">
                    <p class="promotion-header-text h2">Why submit your research?</p>
                    <p class="promotion-content-text">Submitting your work to UPHSL research repository will help the university in its improved document management system through which the tracking and storing electronic documents such as PDFs, word processing files and digital images of paper-based content becomes more accessible and efficient.</p>
                    <p class="text-end">
                        <a class="btn btn-link btn-lg masthead-link" href="./about.php" role="button">Learn more</a>
                    </p>
                </div>
                <div class="col-lg-5 col-md-12 m-1 d-flex align-items-center">
                    <img src="assets/images/promotion/promotion.jpg" class="promotion-image img-fluid" alt="Promotion">
                </div>
            </div>
        </div>
    </section>

    <!--Footer section-->

    <?php include_once 'includes/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        // code to cache search queries
        // var searchbarValue = sessionStorage.getItem("searchbarValue");
        // $("#home-search-bar").on("input", function() {
        //     searchbarValue = this.value;
        //     sessionStorage.setItem("searchbarValue", searchbarValue);
        // });
        // var modalRadio = JSON.parse(sessionStorage.getItem("modalRadio")) || {};
        // var $modalRadio = $("#advanced-search :radio");
        // $modalRadio.on("change", function() {
        //     $modalRadio.each(function() {
        //         modalRadio[this.id] = this.checked;
        //     });
        //     sessionStorage.setItem("modalRadio", JSON.stringify(modalRadio));
        // });

        // $.each(modalRadio, function(key, value) {
        //     $("#" + key).prop("checked", value);
        // });

        // var modalInputs = JSON.parse(sessionStorage.getItem("modalInputs")) || {};
        // var $modalInputs = $("#advanced-search :text");
        // $modalInputs.on("change", function() {
        //     $modalInputs.each(function() {
        //         modalInputs[this.id] = this.value;
        //     });
        //     sessionStorage.setItem("modalInputs", JSON.stringify(modalInputs));
        // });

        // $.each(modalInputs, function(key, value) {
        //     $("#" + key).prop("value", value);
        // });
    </script>
</body>

</html>