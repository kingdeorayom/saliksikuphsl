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
$pagecssVersion = filemtime('../../../styles/custom/pages/contact-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/contact-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once '../../layouts/general/header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Contact</h1>
        </div>
    </section>

    <section class="contacts">
        <div class="container p-5">

            <div class="row">
                <h1 class="my-2">Contact Us</h1>
                <p class="my-4">For further information or assistance in submitting research, please contact:</p>

                <div class="col-lg-2 d-flex justify-content-center align-items-center">
                    <img src="../../../assets/images/contact/research-development-logo.png" class="research-development-logo">
                </div>
                <div class="col-lg-10">
                    <h4 class="py-2">Research and Development Center</h4>
                    <p><i class="fas fa-envelope fa-2x px-2" style="color: #012265;"></i> research@uphsl.edu.ph</p>
                    <p><i class="fas fa-phone-alt fa-2x px-2" style="color: #012265;"></i> 049-544-5162</p>
                    <p><i class="fab fa-facebook fa-2x px-2" style="color: #012265;"></i> <a href="https://www.facebook.com/UPHSL-Research-and-Development-Center-100628592098500/" target="_blank" class="facebook-page">UPHSL Research and Development Center</a></p>
                </div>

            </div>
    </section>

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>