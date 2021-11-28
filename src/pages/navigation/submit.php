<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/submit-style.css" type="text/css">
</head>

<body onload="document.getElementById('submissionGuidelinesPanel').style.display = 'none'; document.getElementById('submitText').style.borderBottom='thick solid #012265';">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Submit your research</h1>
        </div>
    </section>

    <!--About and Copyright Section-->

    <section class="submit-research">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h3>On this page</h3>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="submitPanelClicked()">Submit</li>
                        <li class=" btn-link" onclick="submissionGuidelinesClicked()">Submission Form and Guidelines</li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="submitPanelClicked()" id="submitText">Submit</p>
                    <hr>
                    <p class="side-menu-text" onclick="submissionGuidelinesClicked()" id="submissionGuidelinesText">Submission Form and Guidelines</p>
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
                                    <button type="button" class="btn btn-lg btn-primary button-submit-research rounded-0" onclick="submissionGuidelinesClicked()">Submit Research</button>
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

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>