<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin/profile-admin.php");
    }
} else {
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
    <title>My Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/profile-style.css" type="text/css">
</head>

<body onload="document.getElementById('myLibraryPanel').style.display = 'none'; document.getElementById('mySubmissionsPanel').style.display = 'none'; document.getElementById('myProfileText').style.borderBottom='thick solid #012265';">

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text"><?php echo 'Hi, ' . $_SESSION['fullName'] . '!' ?></h1>
        </div>
    </section>

    <section class="submit-research">
        <div class="container p-5">
            <div class="row my-3 d-lg-none">
                <h3>On this page</h3>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="myProfileClicked()">My Profile</li>
                        <li class="btn-link" onclick="myLibraryClicked()">My Library</li>
                        <li class="btn-link" onclick="mySubmissionsClicked()">My Submissions</li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="myProfileClicked()" id="myProfileText">My Profile</p>
                    <hr>
                    <p class="side-menu-text" onclick="myLibraryClicked()" id="myLibraryText">My Library</p>
                    <hr>
                    <p class="side-menu-text" onclick="mySubmissionsClicked()" id="mySubmissionsText">My Submissions</p>
                    <hr>
                </div>

                <?php include_once '../../layouts/profile-content-user/profilePanel.php' ?>
                <?php include_once '../../layouts/profile-content-user/libraryPanel.php' ?>
                <?php include_once '../../layouts/profile-content-user/submissionsPanel.php' ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <?php include_once '../../../scripts/custom/pages-navigation-scripts.php' ?>
</body>

</html>