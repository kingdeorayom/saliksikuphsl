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
    <title>View Article</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/repository-style.css" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row my-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item prev-dir-breadcrumb"><a href="../../pages/navigation/repository.php" style="color: #012265; text-decoration:none">Repository</a></li>
                        <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page">View Article</li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <h5 class="fw-bold">Article Metrics</h5>
                    <hr>
                    <h3>123</h3>
                    <p>Views</p>
                    <hr>
                    <h3>24</h3>
                    <p>Downloads</p>
                    <hr>
                </div>

                <div class="col-lg-10 col-md-12 col-xs-12 main-column">
                    <h2>Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h2>
                    <hr class="my-4">
                    <p class="fw-bold">Alma T. Jallorina, Leomar S. Galicia</p>
                    <p>2019, March 6</p>
                    <p class="bookmark"><i class="far fa-bookmark me-2"></i> Add to Bookmarks</p>
                    <h3 class="mt-5">Abstract</h3>
                    <p>The main objective of the study is to determine the advantages, challenges encountered and attitudes of UPHSL College Faculty in utilizing multimedia in the classroom. The descriptive correlational method was used to see whether there is a link or association between the variables of interest. The study found out that utilizing multimedia in the classroom is a great way to improve student learning because it allows them to engage with the text in a very visual way and it helps different learners meet their learning needs. Technological resources, both hardware, and software needed in preparing lessons, funds, and ample time allocated in preparing the lessons were some of the problems encountered by the respondents in utilizing multimedia in the classroom. The respondents had a very positive attitude in utilizing multimedia in the classroom. The respondents’ attitude in utilizing social media in the classroom has no bearing on the advantages of utilizing multimedia in the classroom. The respondents’ attitude in utilizing social media in the classroom has no bearing on the challenges they encountered in utilizing multimedia in the classroom.</p>
                    <p class="fw-bold">Keywords: </p>
                    <p class="fst-italic">Multimedia, advantages, challenges, attitude</p>

                    <div class="row my-4">
                        <label class="fw-bold mb-3">Attached Files</label>
                        <div class="col">
                            <button class="btn btn-danger">File 1.pdf</button>
                            <button class="btn btn-danger">File 2.png</button>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Resource Type</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Thesis</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Researcher's Category</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Faculty</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Research Unit</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">College of Arts and Sciences</p>
                        </div>
                        <div class="col-lg-3 border-top border-2">
                            <h6 class="fw-bold my-3">Research Field</h6>
                        </div>
                        <div class="col-lg-9 border-top border-2">
                            <p class="my-3">Educational Management</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>


    <!--Footer section-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>