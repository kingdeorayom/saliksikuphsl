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
$pagecssVersion = filemtime('../../../styles/custom/pages/researchers-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junior Associate Researcher Profile</title>
    <!--To be changed with the researcher's name-->
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">
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
            <div class="row my-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item prev-dir-breadcrumb"><a href="../../pages/navigation/researchers.php" style="color: #012265; text-decoration:none">Our Researchers</a></li>
                        <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page">Junior Associate Researcher Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-2 p-2">
                    <img src="../../../assets/images/researchers/avatar-lg.svg" class="img-fluid">
                </div>
                <div class="col-lg-10">
                    <h2 class="fw-bold mt-3">Name of Researcher</h2>
                    <h5 class="mb-2">Junior Associate Researcher</h5>

                    <div class="row my-5">
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">College/Department</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">College of Arts and Sciences</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Highest Educational Attainment</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Doctor of Philosophy</p>
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