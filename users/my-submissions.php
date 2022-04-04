<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin-profile.php");
    }
} else {
    header("location: error.php");
    die();
}

include '../includes/connection.php'; // covers profilePanel.php, libraryPanel.php, submissionsPanel.php

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/profile-style.css');
$userSubmissionsJSVersion = filemtime('../scripts/custom/user-submissions.js');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo '../scripts/custom/user-submissions.js?id=' . $userSubmissionsJSVersion ?>" type="module"></script>
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">
            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column" id="myProfilePanel">

                    <h1 class="my-2">Submissions</h1>
                    <hr class="my-4">
                    <div class="submissions">
                        <div class="pendingApproval my-4" id="pending-container">
                            <h4 class="fw-bold" style="color: #012265;">Pending approval</h4>
                        </div>
                        <div class="forRevision my-3"  id="revision-container">
                            <h4 class="fw-bold" style="color: #012265;">For revision</h4>
                        </div>
                        <div class="forRevision my-3"  id="revised-container">
                            <h4 class="fw-bold" style="color: #012265;">Revised</h4>
                        </div>
                    </div>
                    <div class="row">
                        <h1 class="my-1">Published Works</h1>
                        <div class="published">
                            <div class="publishedWorks"  id="published-container">
                                <hr class="mt-3 mb-4">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../includes/footer.php' ?>


    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>