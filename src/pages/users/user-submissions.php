<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin-profile.php");
    }
} else {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
}

include '../../process/connection.php'; // covers profilePanel.php, libraryPanel.php, submissionsPanel.php

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Submissions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/profile-style.css" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <!-- <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">My Submissions</h1>
        </div>
    </section> -->

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column" id="myProfilePanel">

                    <h1 class="my-2">Submissions</h1>
                    <hr class="my-4">
                    <div class="submissions">

                        <div class="pendingApproval my-4">
                            <h4 class="fw-bold" style="color: #012265;">Pending approval</h4>
                            <!-- <hr class="my-4"> -->

                            <div class="box p-3 my-3" style="background-color: #f5f5f5;">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-start">
                                            <p class="fw-bold" style="color: #012265;">Thesis</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <a href="../../layouts/user-submission/view-submission.php" class="editReviseButton">
                                                <p class="fw-bold"><i class="fas fa-edit"></i> Edit</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="mb-3 fw-bold">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <p><span class="fw-bold">Submitted on:</span> 2021-11-17 08:52:03</p>
                                </div>
                            </div>

                        </div>

                        <div class="forRevision my-3">

                            <h4 class="fw-bold" style="color: #012265;">For revision</h4>
                            <!-- <hr class="my-4"> -->

                            <div class="box p-3 my-3" style="background-color: #f5f5f5;">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-start">
                                            <p class="fw-bold" style="color: #012265;">Thesis</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <a href="../../layouts/user-submission/view-revision.php" class="editReviseButton">
                                                <p class="fw-bold"><i class="fas fa-edit"></i> Revise</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="mb-3 fw-bold">Understanding Motivational Factors in Green IT Adoption in a Philippine Private University</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <p><span class="fw-bold">Returned on:</span> 2021-11-17 08:52:03</p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="feedback border bg-white p-1">
                                            <p class="fw-bold">Feedback:</p>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur quaerat natus, fugiat corporis aperiam cupiditate, expedita repudiandae optio iste repellat laudantium deserunt dignissimos ut magni commodi eveniet culpa totam accusamus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente provident, reprehenderit iure dignissimos cupiditate exercitationem ex, nemo sunt, vero omnis laborum modi repellat quasi officia totam aut voluptatum nesciunt cumque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum deserunt nostrum tempora vitae? Numquam a quaerat sed reiciendis deleniti excepturi atque, deserunt sapiente vitae quidem? Repudiandae dicta recusandae laboriosam placeat!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <h1 class="my-1">Published Works</h1>
                        <div class="published">
                            <div class="publishedWorks">
                                <hr class="mt-3 mb-4">

                                <div class="box p-3 my-3" style="background-color: #f5f5f5;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-start">
                                                <p class="fw-bold" style="color: #012265;">Thesis</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="mb-3 fw-bold">Challenges Encountered, Engagement and Strategies in Building Community Relations Among Educational Leaders in Philippine Public Schools</h4>
                                            <p class="fw-bold">Jallorina, A., Galicia, L.</p>
                                            <p class="fw-bold">2019</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>Building community relations is considered as one of the most important undertakings of an educational leader who should see a constant engagement continuum between the school and the society. It can be reasonably argued that it entails challenges, thus, relevant engagement and strategies should be demonstrated. This descriptive-correlational study randomly selected educational leaders in public schools in Bi??an City, Laguna, Philippines for the academic year 2018 ???2019.</p>
                                    </div>
                                    <div class="row">
                                        <p><span class="fw-bold">Published on:</span> 2021-11-17 08:52:03</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

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