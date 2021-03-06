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
    // echo '<a href="../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/home-style.css" type="text/css">

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
                        <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2">
                        <button class="btn text-light search-button btn-lg rounded-0" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center mb-3">
                    <a href="#"><button class="btn btn-link btn-lg search-option-buttons" type="button" id="button-addon2"><i class="fas fa-search fa-2x p-3" style="color: gray;"></i><br>Advanced Search</button></a>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="repository.php"><button class="btn btn-link btn-lg search-option-buttons" type="button" id="button-addon2"><i class="fas fa-book fa-2x p-3" style="color: gray;"></i><br>Browse Researches</button></a>
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
                <div class="col-lg-3 col-md-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/research-outputs.png" class="repository-metrics-logos" alt="Research Outputs">
                    <p class="repository-metrics-counter" id="research-output-counter">10,025</p>
                    <p class="repository-metrics-p-text">Research Outputs</p>
                </div>
                <div class="col-lg-3 col-md-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/authors.png" class="repository-metrics-logos" alt="Authors">
                    <p class="repository-metrics-counter" id="authors-counter">10,025</p>
                    <p class="repository-metrics-p-text">Authors</p>
                </div>
                <div class="col-lg-3 col-md-12 repository-metrics-column-item m-3 text-center rounded-3">
                    <img src="../../../assets/images/repository-metrics/total-downloads.png" class="repository-metrics-logos" alt="Total Downloads">
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
</body>

</html>