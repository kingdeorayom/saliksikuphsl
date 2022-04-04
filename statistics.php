<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/statistics-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/statistics-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once 'includes//header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Research Statistics</h1>
        </div>
    </section>

    <section class="statistics">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-xs-12 main-column" id="statisticsPanel">

                    <h1 class="my-2">Summary Statistics</h1>

                    <div class="row researchOutputs">
                        <hr class="my-4">
                        <h5 class="my-4 fw-bold">Research Outputs Over Time</h5>
                        <canvas id="myChart" width="200" height="50"></canvas>

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

    <?php include_once 'includes//footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>
    <script>
        var labels = [];
        var data = [];
        $("document").ready(function() {
            $.ajax({
                method: "GET",
                url: "src/process/get-statistics.php",
                async: false
            }).done(function(result) {
                console.log(result)
                result.forEach(function(val, key) {
                    labels.push(val.year)
                    data.push(val.count)
                })
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '# of Published Content',
                            data: data,
                            backgroundColor: [
                                'rgbA(1,34,101,1)'
                            ],
                            borderColor: [
                                'rgbA(1,34,101,1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                });
            })
        })
    </script>
</body>

</html>