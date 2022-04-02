<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header("location: ../../layouts/general/error.php");
        die();
    }
} else {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/profile-style.css');
$profileadminjs = filemtime('../../../scripts/custom/profile-admin.js');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs</title>
    <script src="<?php echo '../../../scripts/custom/profile-admin.js?id=' . $profileadminjs ?>" type="module"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">

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

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">

            <div class="row">
                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <h1 class="my-2 p-2">System Logs</h1>
                    <hr class="my-4">
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