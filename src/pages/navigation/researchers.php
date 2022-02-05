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
    // echo '<a href="../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Researchers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/researchers-style.css" type="text/css">
</head>

<body onload="document.getElementById('juniorResearchersPanel').style.display = 'none'; document.getElementById('juniorAssociatePanel').style.display = 'none'; document.getElementById('novicePanel').style.display = 'none'; document.getElementById('seniorResearchersText').style.borderBottom='thick solid #012265';">
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Our Researchers</h1>
        </div>
    </section>

    <section class="researchers" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h3>On this page</h3>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="seniorResearchersClicked()">Senior Researchers</li>
                        <li class=" btn-link" onclick="juniorResearchersClicked()">Junior Researchers</li>
                        <li class=" btn-link" onclick="juniorAssociateClicked()">Junior Associate Researchers</li>
                        <li class=" btn-link" onclick="noviceClicked()">Novice Researchers</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="seniorResearchersClicked()" id="seniorResearchersText">Senior Researchers</p>
                    <hr>
                    <p class="side-menu-text" onclick="juniorResearchersClicked()" id="juniorResearchersText">Junior Researchers</p>
                    <hr>
                    <p class="side-menu-text" onclick="juniorAssociateClicked()" id="juniorAssociateText">Junior Associate Researchers</p>
                    <hr>
                    <p class="side-menu-text" onclick="noviceClicked()" id="noviceText">Novice Researchers</p>
                    <hr>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="seniorResearchersPanel">
                    <h1 class="my-2">Senior Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <div class="col-sm-12 col-md-6">
                            <a href="../../layouts/researchers-profile/senior-researcher-profile.php" class="researchers-link">
                                <div class="box">
                                    <div class="row py-3 researcher">
                                        <div class="col-3 avatar">
                                            <img src="../../../assets/images/researchers/avatar.svg" alt="">
                                        </div>
                                        <div class="col-9 d-flex align-items-center">
                                            <p class="h5 researcher-name" style="font-family: Roboto;">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorResearchersPanel">
                    <h1 class="my-2">Junior Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <div class="col-sm-12 col-md-6">
                            <a href="../../layouts/researchers-profile/junior-researcher-profile.php" class="researchers-link">
                                <div class="box">
                                    <div class="row py-3 researcher">
                                        <div class="col-3 avatar">
                                            <img src="../../../assets/images/researchers/avatar.svg" alt="">
                                        </div>
                                        <div class="col-9 d-flex align-items-center">
                                            <p class="h5 researcher-name" style="font-family: Roboto;">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorAssociatePanel">
                    <h1 class="my-2">Junior Associate Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <div class="col-sm-12 col-md-6">
                            <a href="../../layouts/researchers-profile/junior-associate-profile.php" class="researchers-link">
                                <div class="box">
                                    <div class="row py-3 researcher">
                                        <div class="col-3 avatar">
                                            <img src="../../../assets/images/researchers/avatar.svg" alt="">
                                        </div>
                                        <div class="col-9 d-flex align-items-center">
                                            <p class="h5 researcher-name" style="font-family: Roboto;">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="novicePanel">
                    <h1 class="my-2">Novice Researchers</h1>
                    <hr>

                    <div class="row mx-auto">
                        <div class="col-sm-12 col-md-6">
                            <a href="../../layouts/researchers-profile/novice-researcher-profile.php" class="researchers-link">
                                <div class="box">
                                    <div class="row py-3 researcher">
                                        <div class="col-3 avatar">
                                            <img src="../../../assets/images/researchers/avatar.svg" alt="">
                                        </div>
                                        <div class="col-9 d-flex align-items-center">
                                            <p class="h5 researcher-name" style="font-family: Roboto;">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--Footer section-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>