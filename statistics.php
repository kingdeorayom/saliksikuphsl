<?php

session_start();

include './includes/connection.php';
$statement = $connection->prepare("SELECT fi.status AS status, COUNT(fi.file_id) AS count FROM file_information AS fi WHERE fi.status = 'published'");
$statement->execute();
$result = $statement->get_result();
$total_published = $result->fetch_assoc();
$statement->close();

$statement = $connection->prepare("SELECT ri.resource_type, COUNT(ri.file_ref_id) AS count FROM research_information AS ri GROUP BY ri.resource_type");
$statement->execute();
$result = $statement->get_result();
$thesis_count = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$statement = $connection->prepare("SELECT fi.file_id, fi.file_type, av.hits,ri.research_title,ji.journal_title, ii.infographic_title, rp.report_title FROM article_visits AS av LEFT JOIN file_information AS fi ON fi.file_id = av.article_id LEFT JOIN research_information AS ri ON ri.file_ref_id = av.article_id LEFT JOIN journal_information AS ji ON ji.file_ref_id = av.article_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id = av.article_id LEFT JOIN reports_information AS rp ON rp.file_ref_id = av.article_id ORDER BY hits DESC LIMIT 10 ");
$statement->execute();
$result = $statement->get_result();
$page_hits = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$statement = $connection->prepare("SELECT SUM(hits) AS total_hits FROM article_visits LIMIT 10");
$statement->execute();
$result = $statement->get_result();
$article = $result->fetch_assoc();
$statement->close();


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
                                <h2><?php echo number_format($total_published['count'])?></h2>
                                <p>Research Outputs</p>
                            </div>
                        </div>
                        <?php foreach($thesis_count as $key => $row): ?>
                            <div class="col-sm-12 col-lg">
                            <div class="box bg-light text-center border border-2 py-3 my-2">
                                <img src="../../../assets/images/repository-metrics/research-file.png" class="repository-metrics-logos my-3">
                                <h2><?php echo number_format($row['count'])?></h2>
                                <p><?php echo $row['resource_type'];?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="row mostDownloaded">
                        <hr class="my-4">
                        <h5 class="my-4 fw-bold">Most Viewed Items</h5>
                        <?php foreach($page_hits as $key =>$page):
                            $page_percent = $page['hits']/$article['total_hits']*100;
                            ?>
                            <?php if($page['file_type'] == 'thesis'): ?>
                                <div class="row my-2">
                                    <div class="col-sm-12 col-md-8 p-2">
                                        <a href="/repository/view-article.php?id=<?php echo $page['file_id'];?>" class="top-viewed-links"><p><?php echo htmlspecialchars($page['research_title']) ?></p></a>
                                    </div>
                                <div class="col-4 p-2">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $page_percent?>%; background-color: #012265;" aria-valuenow="<?php echo $page_percent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </div>
                            <hr class="my-3">
                            <?php endif ?>
                            <?php if($page['file_type'] == 'journal'): ?>
                                <div class="row my-2">
                                    <div class="col-sm-12 col-md-8 p-2">
                                        <a href="/repository/view-article.php?id=<?php echo $page['file_id'];?>" class="top-viewed-links"><p><?php echo htmlspecialchars($page['journal_title']) ?></p></a>
                                    </div>
                                <div class="col-4 p-2">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $page_percent?>%; background-color: #012265;" aria-valuenow="<?php echo $page_percent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </div>
                            <hr class="my-3">
                            <?php endif ?>
                            <?php if($page['file_type'] == 'infographic'): ?>
                                <div class="row my-2">
                                    <div class="col-sm-12 col-md-8 p-2">
                                        <a href="/repository/view-article.php?id=<?php echo $page['file_id'];?>" class="top-viewed-links"><p><?php echo htmlspecialchars($page['infographic_title']) ?></p></a>
                                    </div>
                                <div class="col-4 p-2">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $page_percent?>%; background-color: #012265;" aria-valuenow="<?php echo $page_percent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </div>
                            <hr class="my-3">
                            <?php endif ?>
                            <?php if($page['file_type'] == 'report'): ?>
                                <div class="row my-2">
                                    <div class="col-sm-12 col-md-8 p-2">
                                        <a href="/repository/view-article.php?id=<?php echo $page['file_id'];?>" class="top-viewed-links"><p><?php echo htmlspecialchars($page['report_title']) ?></p></a>
                                    </div>
                                <div class="col-4 p-2">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $page_percent?>%; background-color: #012265;" aria-valuenow="<?php echo $page_percent?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                </div>
                            <hr class="my-3">
                            <?php endif ?>
                        
                        <?php endforeach?>
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