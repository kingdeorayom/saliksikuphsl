<?php

session_start();

include '../../process/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/home-style.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Researches</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="../../../scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once '../../layouts/general/header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">College/Department Name</h1>
        </div>
    </section>

    <section class="research-fields">
        <div class="container p-5">
            <h3>Browse Researches of &lt;Bachelor of Science in Information Technology&gt;</h3>
            <div class="row">

                <div class="col-lg-12 mx-auto col-md-12 col-xs-12 main-column">

                    <div class="researches2022 my-5">
                        <h3 class="my-2">2022</h3>
                        <hr>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                    </div>

                    <div class="researches2021 my-5">
                        <h3 class="my-2">2021</h3>
                        <hr>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                        <a href="#" class="title-link">
                            <p>Title Here</p>
                        </a>
                        <p>Author 1 Full Name, Author 2 Full Name, Author 3 Full Name, Author 4 Full Name, and Author 5 Full Name,</p>
                    </div>

                    <div class="pagination-researches d-flex justify-content-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item prev">
                                    <span class="page-link">Previous</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">2</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item next">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <?php include_once '../../layouts/general/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>