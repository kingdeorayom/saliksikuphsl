<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin-library.php");
    }
} else {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
}

include '../../process/connection.php'; // covers profilePanel.php, libraryPanel.php, submissionsPanel.php

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/profile-style.css" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <!-- <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">My Library</h1>
        </div>
    </section> -->

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row">
                <div class="col col-md-12 col-xs-12 main-column mx-auto px-5" id="myLibraryPanel">
                    <h1 class="my-2">My Library</h1>
                    <hr class="my-4">
                    <div class="col-sm-12 col-md-4">
                        <select class="form-select" aria-label="Default select example" name="dropdownLibrary" id="dropdownLibrary">
                            <option value="all" selected>All Items</option>
                            <option value="thesis">Thesis</option>
                            <option value="capstone">Capstone</option>
                            <option value="dissertation">Dissertation</option>
                            <option value="journal">Journal</option>
                            <option value="infographic">Infographic</option>
                            <option value="researchcatalog">Research Catalog</option>
                            <option value="annualreport">Annual Report</option>
                            <option value="researchagenda">Research Agenda</option>
                            <option value="researchcompetencydevelopmentprogram">RCDP</option>
                        </select>
                    </div>
                    <div class="library my-3">

                        <div class="libraryItem p-3">
                            <div class="row">
                                <div class="col">
                                    <div class="text-start">
                                        <p class="fw-bold" style="color: #012265;">Thesis</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4 class="fw-bold mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                                    <p class="fw-bold">Jallorina, A., Galicia, L.</p>
                                    <p class="fw-bold">2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <p>Building community relations is considered as one of the most important undertakings of an educational leader who should see a constant engagement continuum between the school and the society. It can be reasonably argued that it entails challenges, thus, relevant engagement and strategies should be demonstrated. This descriptive-correlational study randomly selected educational leaders in public schools in Biñan City, Laguna, Philippines for the academic year 2018-2019.</p>
                            </div>
                            <div class="row">
                                <p><i class="fas fa-trash-alt"></i> Delete</p>
                            </div>
                            <hr class="my-2">
                        </div>

                        <div class="libraryItem p-3">
                            <div class="row">
                                <div class="col">
                                    <div class="text-start">
                                        <p class="fw-bold" style="color: #012265;">Thesis</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4 class="fw-bold mb-3">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                                    <p class="fw-bold">Jallorina, A., Galicia, L.</p>
                                    <p class="fw-bold">2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <p>Building community relations is considered as one of the most important undertakings of an educational leader who should see a constant engagement continuum between the school and the society. It can be reasonably argued that it entails challenges, thus, relevant engagement and strategies should be demonstrated. This descriptive-correlational study randomly selected educational leaders in public schools in Biñan City, Laguna, Philippines for the academic year 2018 –2019.</p>
                            </div>
                            <div class="row">
                                <p><i class="fas fa-trash-alt"></i> Delete</p>
                            </div>
                            <hr class="my-2">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>