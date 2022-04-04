<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: error.php");
    die();
}
$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/home-style.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Research Fields</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <?php include_once '../includes/header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text"> Research Fields</h1>
        </div>
    </section>

    <section class="research-fields">
        <div class="container p-5">
            <div class="row">

                <div class="col-sm-12 col-md-6">

                    <a href="research-field.php?q=Accountancy and Marketing" class="field-link">
                        <div class="row field bg-light mt-3 mb-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/accountancy-marketing.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Accountancy and Marketing</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Arts and Humanities" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields//arts-humanities.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Arts and Humanities</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Business Management" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/business-management.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Business Management</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Educational Management" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/educational-management.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Educational Management</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Education and Social Sciences" class="field-link">
                        <div class="row field bg-light mt-4 mb-2 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/education-social-sciences.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Education and Social Sciences</p>
                            </div>
                        </div>
                    </a>

                </div>

                <div class="col-sm-12 col-md-6">

                    <a href="research-field.php?q=Health and Sciences" class="field-link">
                        <div class="row field bg-light mt-3 mb-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/health-sciences.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Health and Sciences</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=IT and Engineering" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/it-engineering.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">IT and Engineering</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Law and Justice System" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/law-justice-system.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Law and Justice System</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Marine and Aviation" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/marine-aviation.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Marine and Aviation</p>
                            </div>
                        </div>
                    </a>

                    <a href="research-field.php?q=Tourism and Hospitality" class="field-link">
                        <div class="row field bg-light my-4 mx-auto">
                            <div class="col-3 logo mx-auto">
                                <img src="../assets/images/research-fields/tourism-hospitality.png" class="research-fields-logos">
                            </div>
                            <div class="col-9 d-flex align-items-center mx-auto">
                                <p class="h6 px-3">Tourism and Hospitality</p>
                            </div>
                        </div>
                    </a>

                </div>

            </div>
        </div>
    </section>

    <?php include_once '../includes/footer.php' ?>


    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>