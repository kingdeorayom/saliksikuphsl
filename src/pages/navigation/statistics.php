<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}
$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/statistics-style.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/statistics-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Research Statistics</h1>
        </div>
    </section>

    <section class="submit-research">
        <div class="container p-5">

            <div class="row">

                <!-- <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">

                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text px-3" id="submitText">Submit</p>
                    <hr>
                    <p class="side-menu-text px-3" id="submissionGuidelinesText">Submission Form and Guidelines</p>
                    <hr>
                </div> -->

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column" id="statisticsPanel">

                    <h1 class="my-2">Summary Statistics</h1>

                    <div class="row">
                        <hr class="my-4">
                        <p class="my-4 fw-bold">Research Outputs Over Time</p>
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