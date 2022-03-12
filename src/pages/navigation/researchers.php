<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
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

    <script src="../../../scripts/jquery/jquery-3.6.0.min.js"></script>
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
                                            <p class="h5 researcher-name">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorResearchersPanel" hidden>
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
                                            <p class="h5 researcher-name">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="juniorAssociatePanel" hidden>
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
                                            <p class="h5 researcher-name">Name of Researcher</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="novicePanel" hidden>
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
                                            <p class="h5 researcher-name">Name of Researcher</p>
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
            $("#seniorResearchersText").css({
                "border-bottom": "thick solid #012265",
            });
            /* on load */
            $("#seniorResearchersText").click(function() {
                $("#seniorResearchersPanel").prop('hidden', false);
                $("#juniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                $("#seniorResearchersText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#juniorResearchersText, #juniorAssociateText, #noviceText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $("#juniorResearchersText").click(function() {
                $("#juniorResearchersPanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                $("#juniorResearchersText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorAssociateText, #noviceText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $("#juniorAssociateText").click(function() {
                $("#juniorAssociatePanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorResearchersPanel, #novicePanel").prop('hidden', true);
                $("#juniorAssociateText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorResearchersText, #noviceText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#noviceText").click(function() {
                $("#novicePanel").prop('hidden', false);
                $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel").prop('hidden', true);
                $("#noviceText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText").css({
                    "border-bottom": "thick none #012265",
                });
            });

            $('#dropdownShowResearchersOption').on('change', function() {
                if (this.value == 'sr') {
                    $("#seniorResearchersPanel").prop('hidden', false);
                    $("#juniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                    $("#seniorResearchersText").css({
                        "border-bottom": "thick solid #012265",
                    });
                    $("#juniorResearchersText, #juniorAssociateText, #noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'jr') {
                    $("#juniorResearchersPanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorAssociatePanel, #novicePanel").prop('hidden', true);
                    $("#juniorResearchersText").css({
                        "border-bottom": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorAssociateText, #noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'jra') {
                    $("#juniorAssociatePanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorResearchersPanel, #novicePanel").prop('hidden', true);
                    $("#juniorAssociateText").css({
                        "border-bottom": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorResearchersText, #noviceText").css({
                        "border-bottom": "thick none #012265",
                    });
                } else if (this.value == 'nr') {
                    $("#novicePanel").prop('hidden', false);
                    $("#seniorResearchersPanel, #juniorResearchersPanel, #juniorAssociatePanel").prop('hidden', true);
                    $("#noviceText").css({
                        "border-bottom": "thick solid #012265",
                    });
                    $("#seniorResearchersText, #juniorResearchersText, #juniorAssociateText").css({
                        "border-bottom": "thick none #012265",
                    });
                }
            });

        });
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>