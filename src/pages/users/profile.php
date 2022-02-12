<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./profile-admin.php");
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
    // echo '<a href="../../../index.php">go back</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
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

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">
            <div class="row mb-4 d-lg-none">

                <h3>On this page</h3>
                <hr>

                <select class="form-select" aria-label="Default select example" id="dropdownOnThisPage" onchange="showOnThisPagePanels();">
                    <option value="myprofile" selected>My Profile</option>
                    <option value="mylibrary">My Library</option>
                    <option value="mysubmissions">My Submissions</option>
                </select>

                <!-- <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="myProfileClicked()">My Profile</li>
                        <li class="btn-link" onclick="myLibraryClicked()">My Library</li>
                        <li class="btn-link" onclick="mySubmissionsClicked()">My Submissions</li>
                    </ul>
                </div> -->

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

    <script>
        function myProfileClicked() {
            document.getElementById("myProfilePanel").style.display = "block";
            document.getElementById("myLibraryPanel").style.display = "none";
            document.getElementById("mySubmissionsPanel").style.display = "none";

            document.getElementById("myProfileText").style.borderBottom = "thick solid #012265";
            document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";
            document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";
        }

        function myLibraryClicked() {
            document.getElementById("myProfilePanel").style.display = "none";
            document.getElementById("myLibraryPanel").style.display = "block";
            document.getElementById("mySubmissionsPanel").style.display = "none";

            document.getElementById("myLibraryText").style.borderBottom = "thick solid #012265";
            document.getElementById("myProfileText").style.borderBottom = "thick none #012265";
            document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";
        }

        function mySubmissionsClicked() {
            document.getElementById("myProfilePanel").style.display = "none";
            document.getElementById("myLibraryPanel").style.display = "none";
            document.getElementById("mySubmissionsPanel").style.display = "block";

            document.getElementById("mySubmissionsText").style.borderBottom = "thick solid #012265";
            document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";
            document.getElementById("myProfileText").style.borderBottom = "thick none #012265";
        }

        function showOnThisPagePanels() {

            var showOnThisPageValue = document.getElementById("dropdownOnThisPage").value;

            if (showOnThisPageValue == "myprofile") {

                document.getElementById("myProfilePanel").style.display = "block";
                document.getElementById("myLibraryPanel").style.display = "none";
                document.getElementById("mySubmissionsPanel").style.display = "none";

                document.getElementById("myProfileText").style.borderBottom = "thick solid #012265";
                document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";
                document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";

            } else if (showOnThisPageValue == "mylibrary") {

                document.getElementById("myProfilePanel").style.display = "none";
                document.getElementById("myLibraryPanel").style.display = "block";
                document.getElementById("mySubmissionsPanel").style.display = "none";

                document.getElementById("myLibraryText").style.borderBottom = "thick solid #012265";
                document.getElementById("myProfileText").style.borderBottom = "thick none #012265";
                document.getElementById("mySubmissionsText").style.borderBottom = "thick none #012265";

            } else if (showOnThisPageValue == "mysubmissions") {

                document.getElementById("myProfilePanel").style.display = "none";
                document.getElementById("myLibraryPanel").style.display = "none";
                document.getElementById("mySubmissionsPanel").style.display = "block";

                document.getElementById("mySubmissionsText").style.borderBottom = "thick solid #012265";
                document.getElementById("myLibraryText").style.borderBottom = "thick none #012265";
                document.getElementById("myProfileText").style.borderBottom = "thick none #012265";

            }
        }
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>