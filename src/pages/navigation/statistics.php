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

                <div class="col-lg-12 col-md-12 col-xs-12 main-column" id="statisticsPanel">

                    <h1 class="my-2">Summary Statistics</h1>

                    <div class="row researchOutputs">
                        <hr class="my-4">
                        <h5 class="my-4 fw-bold">Research Outputs Over Time</h5>

                    </div>

                    <div class="row activityOverview">
                        <hr class="my-4">
                        <h5 class="my-4 fw-bold">Activity Overview</h5>

                        <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/research-outputs.png" class="repository-metrics-logos my-3 img-fluid">
                                <h2>10,123</h2>
                                <p>Research Outputs</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/authors.png" class="repository-metrics-logos my-3">
                                <h2>16,025</h2>
                                <p>Authors</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/authors.png" class="repository-metrics-logos my-3">
                                <h2>6,010</h2>
                                <p>Theses</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/research-outputs.png" class="repository-metrics-logos my-3">
                                <h2>4,015</h2>
                                <p>Dissertations</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/total-downloads.png" class="repository-metrics-logos my-3">
                                <h2>25,525</h2>
                                <p>Total Downloads</p>
                            </div>
                        </div>

                    </div>

                    <div class="row mostDownloaded">
                        <hr class="my-4">
                        <h5 class="my-4 fw-bold">Most Downloaded Items</h5>

                        <div class="row my-2">
                            <div class="col-sm-12 col-md-8 p-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos sunt nihil aspernatur rem. Placeat nihil animi similique corporis doloribus neque deleniti, impedit eos, modi voluptates quas eum quasi non quisquam!</p>
                            </div>
                            <div class="col-4 p-2">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%; background-color: #012265;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <hr class="my-3">
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-12 col-md-8 p-2">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos sunt nihil aspernatur rem. Placeat nihil animi similique corporis doloribus neque deleniti, impedit eos, modi voluptates quas eum quasi non quisquam!</p>
                            </div>
                            <div class="col-4 p-2">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%; background-color: #012265;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <hr class="my-3">
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