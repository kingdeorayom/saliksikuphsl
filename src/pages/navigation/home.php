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
                        <input type="search" class="form-control form-search" aria-label="Search the repository" aria-describedby="button-addon2">
                        <button class="btn btn-primary search-button btn-lg" type="submit" id="button-addon2">Search</button>
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
                    <img src="../../../assets/images/research-fields/educational-leadership.png" class="research-fields-logos" alt="Educational Leadership">
                    <a href="#" class="research-field-image-link">
                        <p>Educational Leadership</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/health-and-science.png" class="research-fields-logos" alt="Health and Science">
                    <a href="#" class="research-field-image-link">
                        <p>Health and Science</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/arts-and-humanities.png" class="research-fields-logos" alt="Arts and Humanities">
                    <a href="#" class="research-field-image-link">
                        <p>Arts and Humanities</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/culture-and-tradition.png" class="research-fields-logos" alt="Culture and Tradition">
                    <a href="#" class="research-field-image-link">
                        <p>Culture and Tradition</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/program-profile-assessment.png" class="research-fields-logos" alt="Program and Profile">
                    <a href="#" class="research-field-image-link">
                        <p>Program and Profile<br>Assessment</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/education-4.0.png" class="research-fields-logos" alt="Education 4.0">
                    <a href="#" class="research-field-image-link">
                        <p>Education 4.0</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/industry-4.0.png" class="research-fields-logos" alt="Industry 4.0">
                    <a href="#" class="research-field-image-link">
                        <p>Industry 4.0</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/technology-development.png" class="research-fields-logos" alt="Technology Development">
                    <a href="#" class="research-field-image-link">
                        <p>Technology Development</p>
                    </a>
                </div>
                <div class="col-md-4 col-sm-12 d-flex align-items-center research-field-column-item">
                    <img src="../../../assets/images/research-fields/environmental-protection.png" class="research-fields-logos" alt="Environmental Protection">
                    <a href="#" class="research-field-image-link">
                        <p>Environmental Protection</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a class="view-more-link" href="#">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!--Repository Metrics-->

    <section class="repository-metrics py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1 style="font-family: 'Arial', sans-serif; font-weight: bold;">Repository Metrics</h1>
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
                    <a class="view-more-statistics-link" href="#">View More Statistics</a>
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
                        <a class="btn btn-link btn-lg masthead-link" href="#" role="button">Learn more</a>
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
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>