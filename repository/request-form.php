<?php

session_start();

include '../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/repository-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Form</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    
    <script src="../scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/repository-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="d-flex flex-column min-vh-100">
    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

    <section class="search-section">
        <div class="container p-5">
            <div class="row">
                <div class="request-form p-5 bg-white">
                    <h1>Request Access Form</h1>
                    <hr class="my-4">
                    <form action="">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label fw-bold">Message</label>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
                        </div>
                        <div class="form-check py-2">
                            <input class="form-check-input" type="checkbox" id="checkBoxEnableButtonRequest">
                            <label class="form-check-label" for="checkBoxEnableButtonRequest">I have reviewed my request and understand that my message will be sent to the <span class="fw-bold">University Research Center</span>. </label>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Send your request" class="btn rounded-0 text-white" id="buttonSendRequest" style="background-color: #012265;" disabled>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </section>


    <!--Footer section-->

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            $("#checkBoxEnableButtonRequest").change(function() {
                if ($(this).is(':checked')) {
                    $("#buttonSendRequest").prop('disabled', false);
                } else {
                    $("#buttonSendRequest").prop('disabled', true);
                }
            });
        });
    </script>

</body>

</html>