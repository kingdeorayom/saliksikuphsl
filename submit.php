<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: /error.php");
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/submit-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <script src="scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/submit-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once 'includes/header.php' ?>

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Submit your research</h1>
        </div>
    </section>

    <section class="submit-research">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">

                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text px-3" id="submitText">Submit</p>
                    <hr>
                    <p class="side-menu-text px-3" id="submissionGuidelinesText">Submission Form and Guidelines</p>
                    <hr>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submitPanel">
                    <h1 class="my-2">Submit</h1>
                    <div class="row">
                        <hr class="my-2">
                        <h2 class="my-4">Why should I submit my work?</h2>
                        <p>Submitting your work to UPHSL research repository will help the university in its improved document management system through which the tracking and storing electronic documents such as PDFs, word processing files and digital images of paper-based content becomes more accessible and efficient.</p>
                        <hr class="my-3">
                        <h2 class="my-4">What are the benefits of having my research on the Repository?</h2>
                        <div class="col-lg-12">
                            <p>The benefits include:</p>
                            <ol type="1">
                                <li>Ease of submitting research as terminal requirement making you secure your graduation clearance from the Research Center.</li>
                                <li>Quick access to your research works in case you need it for academic purposes.</li>
                                <li>Facilitation of review of related literature and studies which are produced by the student and faculty researchers of the university.</li>
                                <li>Ease of accessing university research materials online wherever you are.</li>
                            </ol>
                            <hr class="my-4">
                            <h2 class="my-4">How do I submit my research?</h2>
                            <div class="col-lg-12">
                                <p>To submit a copy of your work you are required to complete the Submission Form. Please read the submission guidelines first by clicking the button below.</p><br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg btn-primary button-submit-research rounded-0" id="buttonToSubmission">Submit Research</button>
                                </div>
                                <!-- <p class="py-5">Please contact <a href="mailto:research@uphsl.edu.ph" target="_blank">research@uphsl.edu.ph</a> if you have any further queries regarding thesis submission.</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submissionGuidelinesPanel" hidden>
                    <h1 class="my-2">Submission Form and Guidelines</h1>
                    <p class="py-3">The following guidelines shall be observed before submitting your work:</p>
                    <ol type="1">
                        <li>Ensure that you have followed the research format of your college.</li>
                        <li>Check the completeness of contents, correctness of contents in terms of grammar and punctuation as well as compliance with your department/college research requirements.</li>
                        <li>Upload your document only in the assigned folder or link for your college/department.</li>
                        <li>The filename format should be: <br><br><span style="font-style:italic">researcher/group leader's name (surname and first name)_title_academic year<br><br>Example: Dela Cruz Mark_UPHSL Research Repository_AY2021-2022</span></li>
                    </ol>
                    <div class="row">
                        <hr class="my-2">
                        <!-- <h2 class="my-4 fw-bold">General Outline for Manuscript</h2> -->
                        <div class="col-lg-12">
                            <!-- <ul>
                                <li><span class="fw-bold fst-italic">Introduction.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                                <li><span class="fw-bold fst-italic">Methods.</span> Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</li>
                                <li><span class="fw-bold fst-italic">Results.</span> Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</li>
                                <li><span class="fw-bold fst-italic">Discussion.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                            </ul>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic nulla laboriosam, magni nostrum quibusdam alias doloremque minima iste consequatur, ea reprehenderit, ab in iure aliquid illum. A dolor explicabo molestias?</p>
                            <hr class="my-5">
                            <h2 class="my-4 fw-bold">Title Page</h2>
                            <div class="col-lg-12">
                                <p>In addition to the body of the manuscript, your paper must include a title page featuring the following: an abstract, a list of key terms, and your acknowledgements. The following sections describe in detail these parts of the paper</p>
                                <p><span class="fw-bold">Abstract.</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                                <p><span class="fw-bold">Keywords.</span> Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet.</p>
                            </div>
                            <hr class="my-5"> -->
                            <h2 class="my-4 fw-bold">Submit your research</h2>
                            <p>To submit a copy of your research, click the button below.</p>
                            <div class="text-center">
                                <a href="submission-forms.php"><button type="button" class="btn btn-lg btn-primary button-submit-research rounded-0 my-5">Submission Form</button></a>
                            </div>
                            <p class="my-2">Please contact <a href="mailto:research@uphsl.edu.ph" target="_blank">research@uphsl.edu.ph</a> if you have any further queries regarding thesis submission.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include_once 'includes/footer.php' ?>

    <script>
        $(document).ready(function() {

            /* on load */
            $("#submitText").css({
                "border-left": "thick solid #012265",
            });
            /* on load */

            $("#submitText").click(function() {
                $("#submissionGuidelinesPanel").prop('hidden', true);
                $("#submissionGuidelinesText").css({
                    "border-left": "thick none #012265",
                });
                $("#submitPanel").prop('hidden', false);
                $("#submitText").css({
                    "border-left": "thick solid #012265",
                });
            });

            $("#submissionGuidelinesText").click(function() {
                $("#submissionGuidelinesPanel").prop('hidden', false);
                $("#submissionGuidelinesText").css({
                    "border-left": "thick solid #012265",
                });
                $("#submitPanel").prop('hidden', true);
                $("#submitText").css({
                    "border-left": "thick none #012265",
                });
            });

            $("#buttonToSubmission").click(function() {

                $("#submissionGuidelinesPanel").prop('hidden', false);
                $("#submissionGuidelinesText").css({
                    "border-left": "thick solid #012265",
                });
                $("#submitPanel").prop('hidden', true);
                $("#submitText").css({
                    "border-left": "thick none #012265",
                });

                window.scrollTo(0, 0);

            });
        });
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>

</body>

</html>