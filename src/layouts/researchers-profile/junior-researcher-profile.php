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
    <title>Junior Researcher Profile</title>
    <!--To be changed with the researcher's name-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/researchers-style.css" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Researcher's Profile</h1>
        </div>
    </section>

    <section class="researchers">
        <div class="container p-5">

            <div class="row">
                <div class="col-lg-2 p-2">
                    <img src="../../../assets/images/researchers/avatar-lg.svg" class="img-fluid">
                </div>
                <div class="col-lg-10" style="font-family: 'Roboto';">
                    <h2 class="fw-bold mt-3">Name of Researcher</h2>
                    <h5 class="mb-2">Junior Researcher</h5>

                    <div class="row my-5">
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">College/Department</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">College of Computer Studies</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Highest Educational Attainment</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Doctor of Information Technology</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Research Interest</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Publication in High Impact Journals</p>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col">

                            <h3 class="fw-bold">Published Works</h3>
                            <hr>

                            <a href="" class="my-4 published-works h5">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aenean euismod bibendum laoreet Proin gravida dolor</a>
                            <hr>

                        </div>
                    </div>
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