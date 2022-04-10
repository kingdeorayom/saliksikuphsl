<?php

session_start();

include '../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
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
    <title>View Document</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<body>
    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>
    
    <div class="container p-5">

    <div class="row my-2">
        <div class="col">
            <div class="text-start">
                <button class="btn btn-link page-control">

                <?php 
                echo '<a href="/repository/view-article.php?id='.$_SESSION['fileId'].'" class="page-control"><i class="fas fa-arrow-left" style="color: #012265;"></i> Back</a>';
                
                ?>

                </button>
            </div>
        </div>

        <div class="col">
            <div class="text-end">
                <button class="btn btn-link page-control"><a href="#" class="page-control"><i class="fas fa-download" style="color: #012265;"></i> Download</a></button>
            </div>
        </div>
    </div>

    <div class="row document-frame my-2">

    <?php
    
    // if (isset($_SESSION['isFile2'])) {
    //     echo '<iframe class=\'w-100\' src="https://view.officeapps.live.com/op/embed.aspx?src=https://saliksik-uphsl.com/src/'.$_SESSION['fileDir2'].'" width=\'80%\' height=\'565px\' frameborder=\'0\'> </iframe>';
    // } else {
    //     echo '<iframe class=\'w-100\' src="https://view.officeapps.live.com/op/embed.aspx?src=https://saliksik-uphsl.com/src/'.$_SESSION['fileDir'].'" width=\'80%\' height=\'565px\' frameborder=\'0\'> </iframe>';
    // }

    ?>

        <!-- <iframe class='w-100' src="https://view.officeapps.live.com/op/embed.aspx?src=https://saliksik-uphsl.com/src/uploads/theses/62524e9f18d5e7.96195220.docx" width='80%' height='565px' frameborder='0'> </iframe> -->
    </div>

        
    </div>

    <!--Footer section-->

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>