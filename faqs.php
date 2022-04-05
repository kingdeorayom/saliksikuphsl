<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <?php include_once 'includes//header.php' ?>

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">FAQS and Support</h1>
        </div>
    </section>

    <section class="faqs" style="font-family: 'Roboto', sans-serif;">
        <div class="container p-5">
            <h1 class="">Frequently asked questions</h1>
            <hr class="mb-5">
            <h5>Click the following topics for answers to FAQs related to the UPHSL Research Repository or scroll to see each section:</h5>
            <ul>
                <li><a href="#faq1" class="faq-link">Account-related issues</a></li>
                <li><a href="#faq2" class="faq-link">Adding works to SALIKSIK: UPHSL Research Repository</a></li>
                <li><a href="#faq3" class="faq-link">Viewing works in SALIKSIK: UPHSL Research Repository</a></li>
            </ul>
            <hr class="my-5">

            <h3 class="fw-bold my-5" id="faq1">Account-related issues</h3>

            <h5 class="fw-bold">I forgot my password. What should I do?</h5>
            <ul>
                <li>You can use the email address you used to register your account to reset your password.</li>
                <li>To do so, go to the login page and click on <strong>Forgot Password</strong>.</li>
                <li>Provide the email address you used to create your account. A verification code will be sent to the provided email.</li>
                <li>Upon successful verification, you will be able to reset your password.</li>
                <li>For any issues, you may email <a href="mailto:research@uphsl.edu.ph" target="_blank">research@uphsl.edu.ph</a> for assistance.</li>
            </ul>
            <h5 class="fw-bold">My login doesn't work, what should I do?</h5>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</li>
                <li>Proin sodales pulvinar tempor.</li>
                <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                <li>Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</li>
                <li>Proin sodales pulvinar tempor.</li>
                <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
            </ul>
            <hr class="my-5">

            <h3 class="fw-bold my-5" id="faq2">Adding works to SALIKSIK: UPHSL Research Repository</h3>

            <h5 class="fw-bold">Who can submit scholarly work in the SALIKSIK: UPHSL Research Repository?</h5>
            <ul>
                <li>Students from all colleges including Graduate School who finished their final research subject required in their degree (e.g. Thesis, Capstone, Masteral Thesis, Dissertation) are all required to submit their work in this repository.</li>
                <li>Faculty, Department Heads, and Non-teaching Personnel from Basic Education Department, Senior High School, all Colleges, Graduate School, and Support Services Departments can submit their research works.</li>
            </ul>
            <!-- <h5 class="fw-bold">I have completed my degree at UPHSL but my thesis is not listed in the SALIKSIK: UPHSL Research Repository. Can it be added?</h5>
            <ul>
                <li>Students from all colleges including Graduate School who finished their final research subject required in their degree (e.g. Thesis, Capstone, Masteral Thesis, Dissertation) are all required to submit their work in this repository.</li>
                <li>Faculty, Department Heads, and Non-teaching Personnel from Basic Education Department, Senior High School, all Colleges, Graduate School, and Support Services Departments can submit their research works.</li>
            </ul> -->
            <h5 class="fw-bold">I have received an email notification that my work has been published to the SALIKSIK: UPHSL Research Repository. What do I do next?</h5>
            <ul>
                <li>You can search or browse your research work inside the repository.</li>
                <li>If you are a graduating student, you may now proceed to the Research and Development Center for the signing of clearance.</li>
            </ul>

            <h5 class="fw-bold">I have received an email notification that my submission has been returned. What do I do next?</h5>
            <ul>
                <li>Follow the provided feedback accordingly. After performing the feedback, update your submission located in “My Submission” under your profile, then resubmit your work.</li>
            </ul>

            <hr class="my-5">

            <h3 class="fw-bold my-5" id="faq3">Viewing works in SALIKSIK: UPHSL Research Repository</h3>

            <h5 class="fw-bold">Can I access the full-text of theses and dissertations?</h5>
            <ul>
                <li>Yes, full-text manuscripts are open-access, they can be viewed and downloaded.</li>
                <li>If there are no displayed manuscripts in an article, you can still access it by sending a request at <a href="mailto:research@uphsl.edu.ph" target="_blank">research@uphsl.edu.ph</a>.</li>
            </ul>
            <h5 class="fw-bold">Are all theses, dissertations, and research works in the library included in SALIKSIK: UPHSL Research Repository?</h5>
            <ul>
                <li>As of the moment, only recent works are available inside the repository. Old research works stored in the library are not yet available here.</li>
            </ul>
        </div>
    </section>

    <?php include_once 'includes//footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>
</body>

</html>