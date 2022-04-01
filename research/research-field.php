<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}
$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/home-style.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Research Fields</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once '../../layouts/general/header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <div class="col d-flex align-items-center">
                <!-- <img src="../../../assets/images/research-fields/accountancy-marketing.png" class="research-fields-logos"> -->
                <h1 id="masthead-title-text">&lt;Research Field Name Here&gt;</h1>
            </div>
        </div>
    </section>

    <section class="research-fields">
        <div class="container p-5">


            <div class="accordion accordion-flush">

                <div class="accordion-item my-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#researches2022" aria-expanded="false">
                            2022 Researches
                        </button>
                    </h2>
                    <div id="researches2022" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <a href="#" class="field-research-title">
                                <p>Research Title Here</p>
                            </a>
                            <a href="#" class="field-research-title">
                                <p>Research Title Here</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion-item my-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#researches2021" aria-expanded="false">
                            2021 Researches
                        </button>
                    </h2>
                    <div id="researches2021" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <a href="#" class="field-research-title">
                                <p>Research Title Here</p>
                            </a>
                            <a href="#" class="field-research-title">
                                <p>Research Title Here</p>
                            </a>
                        </div>
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