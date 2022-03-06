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
$pagecssVersion = filemtime('../../../styles/custom/pages/submit-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submit-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <?php include_once '../../layouts/general/header.php' ?>

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
                    <p class="side-menu-text" id="submitText">Submit</p>
                    <hr>
                    <p class="side-menu-text" id="submissionGuidelinesText">Submission Form and Guidelines</p>
                    <hr>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submitPanel">
                    <h1 class="my-2">Submit</h1>
                    <div class="row">
                        <hr class="my-4">
                        <h2 class="my-4">What are the benefits of having my research on the Repository?</h2>
                        <div class="col-lg-12">
                            <p>Currently, the types of research outputs that will be accepted into the Repository include the following:</p>
                            <ul>
                                <li>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                                <li>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                                <li>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                                <li>Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                            </ul>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic nulla laboriosam, magni nostrum quibusdam alias doloremque minima iste consequatur, ea reprehenderit, ab in iure aliquid illum. A dolor explicabo molestias?</p>
                            <hr class="my-4">
                            <h2 class="my-4">How do I submit my research?</h2>
                            <div class="col-lg-12">
                                <p>To submit a copy of your thesis you are required to complete the Thesis Deposit Form (link below) - your thesis can be attached to the Form:</p><br>
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg btn-primary button-submit-research rounded-0" id="buttonToSubmission">Submit Research</button>
                                </div>
                                <p class="py-5">Please contact <a href="#" target="_blank">research@uphsl.edu.ph</a> if you have any further queries regarding thesis submission.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submissionGuidelinesPanel">
                    <h1 class="my-2">Submission Form and Guidelines</h1>
                    <p class="py-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes,</p>
                    <div class="row">
                        <hr class="my-4">
                        <h2 class="my-4 fw-bold">General Outline for Manuscript</h2>
                        <div class="col-lg-12">
                            <ul>
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
                            <hr class="my-5">
                            <h2 class="my-4 fw-bold">Submit your research</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes,</p>
                            <div class="text-center">
                                <a href="submission-forms.php"><button type="button" class="btn btn-lg btn-primary button-submit-research rounded-0 my-5">Submit Research</button></a>
                            </div>
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
            $("#submissionGuidelinesPanel").hide();
            $("#submitText").css({
                "border-bottom": "thick solid #012265",
            });
            /* on load */
            $("#submitText").click(function() {
                $("#submissionGuidelinesPanel").hide();
                $("#submissionGuidelinesText").css({
                    "border-bottom": "thick none #012265",
                });
                $("#submitPanel").show();
                $("#submitText").css({
                    "border-bottom": "thick solid #012265",
                });
            });
            $("#submissionGuidelinesText").click(function() {
                $("#submissionGuidelinesPanel").show();
                $("#submissionGuidelinesText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#submitPanel").hide();
                $("#submitText").css({
                    "border-bottom": "thick none #012265",
                });
            });
            $("#buttonToSubmission").click(function() {
                $("#submissionGuidelinesPanel").show();
                $("#submissionGuidelinesText").css({
                    "border-bottom": "thick solid #012265",
                });
                $("#submitPanel").hide();
                $("#submitText").css({
                    "border-bottom": "thick none #012265",
                });
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>