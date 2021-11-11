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

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
        <link rel="stylesheet" href="../../../styles/custom/pages/contact-style.css" type="text/css">
    </head>
</head>

<body onload="document.getElementById('universityLibraryPanel').style.display = 'none'">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Contact</h1>
        </div>
    </section>

    <!--About and Copyright Section-->

    <section class="contacts">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h3>On this page</h3>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="researchDevelopmentCenterClicked()">Research and Development Center</li>
                        <li class=" btn-link" onclick="universityLibraryClicked()">University Library</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="researchDevelopmentCenterClicked()">Research and Development Center</p>
                    <hr>
                    <p class="side-menu-text" onclick="universityLibraryClicked()">University Library</p>
                    <hr>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="researchDevelopmentCenterPanel">
                    <h1 class="my-2">Contact Us</h1>
                    <div class="row">
                        <p class="my-4">For further information or assistance in submitting research, please contact:</p>

                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                            <img src="../../../assets/images/contact/research-development-logo.png" class="research-development-logo">
                        </div>
                        <div class="col-lg-10">
                            <h4 class="py-2">Research and Development Center</h4>
                            <p><i class="fas fa-envelope fa-2x px-2" style="color: #012265;"></i> research@uphsl.edu.ph</p>
                            <p><i class="fas fa-phone-alt fa-2x px-2" style="color: #012265;"></i> 049-544-5162</p>
                            <p><i class="fab fa-facebook fa-2x px-2" style="color: #012265;"></i> UPHSL Research and Development Center</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="universityLibraryPanel">
                    <h1 class="my-2">Contact Us</h1>
                    <div class="row">
                        <p class="my-4">For further information in copyright and policies, assistance, or feedback, please contact:</p>
                        <div class="col-lg-2 d-flex justify-content-center align-items-center">
                            <img src="../../../assets/images/contact/uphsl-main-library-logo.png" class="uphsl-main-library-logo">
                        </div>
                        <div class="col-lg-10">
                            <h4 class="py-2">UPHSL Main Library</h4>
                            <p><i class="fas fa-envelope fa-2x px-2" style="color: #012265;"></i> librarycollege@uphsl.edu.ph</p>
                            <p><i class="fas fa-phone-alt fa-2x px-2" style="color: #012265;"></i> 049-544-5162</p>
                            <p><i class="fab fa-facebook fa-2x px-2" style="color: #012265;"></i> UPHSL Main Library</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>