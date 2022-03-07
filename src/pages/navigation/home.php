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
    <title>Home</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5">
        <div class="container">
            <div class="jumbotron">
                <h1 id="masthead-title-text">Welcome to the UPHSL Research Repository</h1>
                <p class="mt-3" id="masthead-content-text" style="text-align:start">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            </div>
        </div>
    </section>

    <!--Search section-->

    <section class="search-section p-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="search" autofocus class="form-control form-search rounded-0" id="home-search-bar" placeholder="Search the repository" aria-label="Search the repository" name="title_query">
                        <button class="btn text-light search-button btn-lg rounded-0" id="button-search"><a href="repository.php">Search</a></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center mb-3">
                    <a href="#"><button class="btn btn-link btn-lg search-option-buttons" data-bs-toggle="modal" data-bs-target="#search-modal" type="button" id=""><i class="fas fa-search fa-2x p-3" style="color: gray;"></i><br>Advanced Search</button></a>
                </div>
                <div class="col d-flex justify-content-center">
                    <a href="repository.php"><button class="btn btn-link btn-lg search-option-buttons" type="button" id=""><i class="fas fa-book fa-2x p-3" style="color: gray;"></i><br>Browse Researches</button></a>
                </div>
            </div>

            <!-- Modal window -->
            <div class="modal fade" id="search-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><i class="fas fa-search mx-2" style="color: white;"></i> Advanced Search</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                    <input class="form-control form-control-sm rounded-0 my-1" type="text">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">with the <span class="fw-bold">exact phrase</span></h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" type="text">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">with <span class="fw-bold">at least one</span> of the words</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" type="text">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal"><span class="fw-bold">without</span> the words</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" type="text">
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">where my words occur</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="radioButtonModal" id="radio-button-anywhere" checked>
                                        <label class="form-check-label" for="radio-button-anywhere">anywhere in the article</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radioButtonModal" id="radio-button-title">
                                        <label class="form-check-label" for="radio-button-title">in the title of the article</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">Return articles <span class="fw-bold">authored</span> by</h6>
                                </div>
                                <div class="col-6">
                                    <input class="form-control form-control-sm rounded-0 my-1" type="text">
                                    <label class="fst-italic text-secondary" style="font-size: 12px;">e.g., "Dela Cruz" or Garcia</label>
                                </div>
                                <div class="col-6">
                                    <h6 class="my-2 fw-normal">Return articles <span class="fw-bold">dated</span> between</h6>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mt-2">
                                        <input type="text" class="form-control form-control-sm rounded-0 me-1">
                                        <label class="mt-1">—</label>
                                        <input type="text" class="form-control form-control-sm rounded-0 ms-1">
                                    </div>
                                    <label class="fst-italic text-secondary" style="font-size: 12px;">e.g., 2021</label>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-primary rounded-0 modal-search-button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Research Fields Section-->

    <section class="research-fields p-5">
        <div class="container">
            <h1 id="research-field-title-text">Research Fields</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <!--Add justify-content-center to center items inside col-->
                    <img src="../../../assets/images/research-fields/accountancy-marketing.png" class="research-fields-logos" alt="Accountancy and Marketing">
                    <a href="#" class="research-field-image-link">
                        <p>Accountancy and Marketing</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/arts-humanities.png" class="research-fields-logos" alt="Arts and Humanities">
                    <a href="#" class="research-field-image-link">
                        <p>Arts and Humanities</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/educational-management.png" class="research-fields-logos" alt="Educational Management">
                    <a href="#" class="research-field-image-link">
                        <p>Educational Management</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/education-social-sciences.png" class="research-fields-logos" alt="Education and Social Sciences">
                    <a href="#" class="research-field-image-link">
                        <p>Education and Social Sciences</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/business-management.png" class="research-fields-logos" alt="Business Management">
                    <a href="#" class="research-field-image-link">
                        <p>Business Management</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/health-sciences.png" class="research-fields-logos" alt="Health and Sciences">
                    <a href="#" class="research-field-image-link">
                        <p>Health and Sciences</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/it-engineering.png" class="research-fields-logos" alt="IT and Engineering">
                    <a href="#" class="research-field-image-link">
                        <p>IT and Engineering</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/law-justice-system.png" class="research-fields-logos" alt="Law and Justice System">
                    <a href="#" class="research-field-image-link">
                        <p>Law and Justice System</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/tourism-hospitality.png" class="research-fields-logos" alt="Tourism and Hospitality">
                    <a href="#" class="research-field-image-link">
                        <p>Tourism and Hospitality</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a class="view-more-link" href="./repository.php">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!--Repository Metrics-->

    <section class="repository-metrics py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1 style="font-weight: bold;">Repository Metrics</h1>
                </div>
            </div>
            <div class="row p-5 d-flex justify-content-center">
                <div class="col-lg-3 col-sm-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/research-outputs.png" class="repository-metrics-logos my-5" alt="Research Outputs">
                    <p class="repository-metrics-counter" id="research-output-counter">10,025</p>
                    <p class="repository-metrics-p-text">Research Outputs</p>
                </div>
                <div class="col-lg-3 col-sm-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/authors.png" class="repository-metrics-logos my-5" alt="Authors">
                    <p class="repository-metrics-counter" id="authors-counter">10,025</p>
                    <p class="repository-metrics-p-text">Authors</p>
                </div>
                <div class="col-lg-3 col-sm-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/total-downloads.png" class="repository-metrics-logos my-5" alt="Total Downloads">
                    <p class="repository-metrics-counter" id="total-downloads-counter">10,025</p>
                    <p class="repository-metrics-p-text">Total Downloads</p>
                </div>
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
                    <p class="promotion-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui iusto facilis, voluptas ipsa totam, necessitatibus, quod pariatur praesentium natus magnam ducimus. Sequi, laudantium rem magnam iure nisi provident reiciendis impedit.</p>
                    <p class="promotion-content-text">Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                    <p class="text-end">
                        <a class="btn btn-link btn-lg masthead-link" href="./about.php" role="button">Learn more</a>
                    </p>
                </div>
                <div class="col-lg-5 col-md-12 m-1 d-flex align-items-center">
                    <img src="../../../assets/images/promotion/promotion.jpg" class="promotion-image img-fluid" alt="Promotion">
                </div>
            </div>
        </div>
    </section>

    <!--Footer section-->

    <?php include_once '../../layouts/general/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        var searchbarValue = sessionStorage.getItem("searchbarValue");
        $("#home-search-bar").on("input", function () {
            searchbarValue = this.value;
            sessionStorage.setItem("searchbarValue", searchbarValue);
        });
    </script>
</body>

</html>