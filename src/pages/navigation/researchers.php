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
$pagecssVersion = filemtime('../../../styles/custom/pages/researchers-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Researchers</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once '../../layouts/general/header.php' ?>


    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Our Researchers</h1>
        </div>
    </section>

    <section class="researchers">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">

                <h3>On this page</h3>
                <hr>

                <select class="form-select" aria-label="Default select example" id="dropdownShowResearchersOption">
                    <option value="sr" selected>Senior Researchers</option>
                    <option value="jr">Junior Researchers</option>
                    <option value="jra">Junior Associate Researchers</option>
                    <option value="nr">Novice Researchers</option>
                </select>
            </div>

            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" id="seniorResearchersText">Senior Researchers</p>
                    <hr>
                    <p class="side-menu-text" id="juniorResearchersText">Junior Researchers</p>
                    <hr>
                    <p class="side-menu-text" id="juniorAssociateText">Junior Associate Researchers</p>
                    <hr>
                    <p class="side-menu-text" id="noviceText">Novice Researchers</p>
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

    <?php include_once '../../layouts/general/footer.php' ?>

    <script>
        $(document).ready(function() {
            /* on load */
            $("#juniorResearchersPanel").hide();
            $("#juniorAssociatePanel").hide();
            $("#novicePanel").hide();
            $("#seniorResearchersText").css({
                "border-bottom": "thick solid #012265",
            });
            /* on load */

            $("#seniorResearchersText").click(function() {
                $("#juniorResearchersPanel").hide();
                $("#juniorAssociatePanel").hide();
                $("#novicePanel").hide();
                $("#juniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorAssociateText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#noviceText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#seniorResearchersPanel").show();
                $("#seniorResearchersText").css({
                    "border-bottom": "thick solid #012265",
                });
            });

            $("#juniorResearchersText").click(function() {
                $("#seniorResearchersPanel").hide();
                $("#juniorAssociatePanel").hide();
                $("#novicePanel").hide();
                $("#seniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorAssociateText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#noviceText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorResearchersPanel").show();
                $("#juniorResearchersText").css({
                    "border-bottom": "thick solid #012265",
                });
            });

            $("#juniorAssociateText").click(function() {
                $("#seniorResearchersPanel").hide();
                $("#juniorResearchersPanel").hide();
                $("#novicePanel").hide();
                $("#seniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#noviceText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorAssociatePanel").show();
                $("#juniorAssociateText").css({
                    "border-bottom": "thick solid #012265",
                });
            });

            $("#noviceText").click(function() {
                $("#seniorResearchersPanel").hide();
                $("#juniorResearchersPanel").hide();
                $("#juniorAssociatePanel").hide();
                $("#seniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorResearchersText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#juniorAssociateText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#novicePanel").show();
                $("#noviceText").css({
                    "border-bottom": "thick solid #012265",
                });
            });

            $('#dropdownShowResearchersOption').on('change', function() {
                if (this.value == 'sr') {
                    $("#juniorResearchersPanel").hide();
                    $("#juniorAssociatePanel").hide();
                    $("#novicePanel").hide();
                    $("#juniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorAssociateText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#seniorResearchersPanel").show();
                    $("#seniorResearchersText").css({
                        "border-bottom": "thick solid #012265",
                    });
                } else if (this.value == 'jr') {
                    $("#seniorResearchersPanel").hide();
                    $("#juniorAssociatePanel").hide();
                    $("#novicePanel").hide();
                    $("#seniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorAssociateText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorResearchersPanel").show();
                    $("#juniorResearchersText").css({
                        "border-bottom": "thick solid #012265",
                    });
                } else if (this.value == 'jra') {
                    $("#seniorResearchersPanel").hide();
                    $("#juniorResearchersPanel").hide();
                    $("#novicePanel").hide();
                    $("#seniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorAssociatePanel").show();
                    $("#juniorAssociateText").css({
                        "border-bottom": "thick solid #012265",
                    });
                } else if (this.value == 'nr') {
                    $("#seniorResearchersPanel").hide();
                    $("#juniorResearchersPanel").hide();
                    $("#juniorAssociatePanel").hide();
                    $("#seniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorResearchersText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#juniorAssociateText").css({
                        "border-bottom": "thick none #012265",
                    });
                    $("#novicePanel").show();
                    $("#noviceText").css({
                        "border-bottom": "thick solid #012265",
                    });
                }
            });

        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>