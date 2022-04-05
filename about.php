<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/about-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/about-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


</head>

<body>

    <?php include_once 'includes/header.php' ?>

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">SALIKSIK: UPHSL Research Repository</h1>
        </div>
    </section>

    <section class="about-and-copyright">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text px-3" id="aboutRepositoryText">About the Repository</p>
                    <hr>
                    <p class="side-menu-text px-3" id="copyrightPoliciesText">Copyright & Policies</p>
                    <hr>
                </div>
                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="aboutRepositoryPanel">

                    <!-- <h1 class="my-1">About the Repository</h1>
                    <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus</p>
                    <hr> -->

                    <h1 class="my-4">What is the SALIKSIK: UPHSL Research Repository?</h1>
                    <p>UPHSL Research Repository is an online tool and database where you can view, upload and download materials pertaining to research outputs of the university. It allows you to have access to a wide array of research materials in terms of a given time period, particular college/department, or research areas. It also provides access to the annual reports, research competency development program, institutional research agenda and other relevant research documents of the Research Center.</p>
                    <hr>

                    <h1 class="my-4">What type of items are included on the Research Repository?</h1>

                    <p>The types of documents included in the Research Repository are full-length manuscripts of theses and dissertations, research reports in IMRD format, research journals of colleges and departments, annual reports, competency development program, and research agenda.</p>

                    <p>Please see the <a href="submit.php">Submit</a> page to learn the benefits of having your research on the Repository and how to submit/contribute your works.</p>

                    <div class="d-lg-none">
                        <h1 class="my-4">Copyright & Policies</h1>
                        <hr>
                        <h1 class="my-4">Copyright ownership in a work</h1>
                        <p>While research outputs submitted become part of the UPHSL Research Repository, the authorship remains to a researcher or group of researchers as articulated in the Research and Development Manual of the University and its Intellectual Property Rights policy. It should be noted that the ownership and authorship of researches submitted remain to the author/s even if the materials are already uploaded to the UPHSL Research Repository unless the University Declaration of IP Assignment form is signed.</p>
                        <hr>

                        <h1 class="my-4">Copyright information for users</h1>

                        <p>The University reserves the right to use, publish and reproduce IP creation in whatever form i.e. electronic or otherwise for teaching, research and other academic purposes with appropriate notification and acknowledgment of whoever originally owns the materials uploaded, viewed and downloaded through the UPHSL Research Repository. </p>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="copyrightPoliciesPanel" hidden>

                    <h1 class="my-2">Copyright & Policies</h1>
                    <hr>
                    <h1 class="my-4">Copyright ownership in a work</h1>
                    <p>While research outputs submitted become part of the UPHSL Research Repository, the authorship remains to a researcher or group of researchers as articulated in the Research and Development Manual of the University and its Intellectual Property Rights policy. It should be noted that the ownership and authorship of researches submitted remain to the author/s even if the materials are already uploaded to the UPHSL Research Repository unless the University Declaration of IP Assignment form is signed.</p>
                    <hr>

                    <h1 class="my-4">Copyright information for users</h1>

                    <p>The University reserves the right to use, publish and reproduce IP creation in whatever form i.e. electronic or otherwise for teaching, research and other academic purposes with appropriate notification and acknowledgment of whoever originally owns the materials uploaded, viewed and downloaded through the UPHSL Research Repository. </p>
                </div>
            </div>
        </div>
    </section>

    <!--Footer section-->

    <?php include_once 'includes/footer.php' ?>

    <script>
        $(document).ready(function() {
            /* on load */
            $("#aboutRepositoryText").css({
                "border-left": "thick solid #012265",
            });
            /* on load */
            $("#aboutRepositoryText").click(function() {
                $("#copyrightPoliciesPanel").prop('hidden', true);
                $("#copyrightPoliciesText").css({
                    "border-left": "thick none #012265",
                });
                $("#aboutRepositoryPanel").prop('hidden', false);
                $("#aboutRepositoryText").css({
                    "border-left": "thick solid #012265",
                });
            });
            $("#copyrightPoliciesText").click(function() {
                $("#copyrightPoliciesPanel").prop('hidden', false);
                $("#copyrightPoliciesText").css({
                    "border-left": "thick solid #012265",
                });
                $("#aboutRepositoryPanel").prop('hidden', true);
                $("#aboutRepositoryText").css({
                    "border-left": "thick none #012265",
                });
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>

</body>

</html>