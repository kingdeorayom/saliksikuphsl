<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>Please login as admin to access this page.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
        die();
        // echo '<a href="../../../index.php">go back</a><br><br>';
        // die('Please login as admin to access this page. <br>Click the link above to return to the login page, or to the homepage if already logged in.');
    }
} else {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>Please login as admin to access this page.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../index.php">go back</a><br><br>';
    // die('Please login as admin to access this page. <br>Click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="../../../scripts/custom/profile-admin.js" type="module"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/profile-style.css" type="text/css">
</head>

<body onload="document.getElementById('accountPreferencePanel').style.display = 'none'; document.getElementById('libraryPanel').style.display = 'none'; document.getElementById('systemLogsPanel').style.display = 'none'; document.getElementById('submissionsText').style.borderBottom='thick solid #012265';">

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
                    <option value="submissions" selected>Submissions</option>
                    <option value="accountpreference">Account Preference</option>
                    <option value="library">Library</option>
                    <option value="systemlogs">System Logs</option>
                </select>

                <!-- <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <ul class="onThisPageLinks">
                        <li class="btn-link" onclick="submissionsClicked()">Submissions</li>
                        <li class="btn-link" onclick="accountPreferenceClicked()">Account Preference</li>
                        <li class="btn-link" onclick="libraryClicked()">Library</li>
                        <li class="btn-link" onclick="systemLogsClicked()">System Logs</li>
                    </ul>
                </div> -->

            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text" onclick="submissionsClicked()" id="submissionsText">Submissions</p>
                    <hr>
                    <p class="side-menu-text" onclick="accountPreferenceClicked()" id="accountPreferenceText">Account Preference</p>
                    <hr>
                    <p class="side-menu-text" onclick="libraryClicked()" id="libraryText">Library</p>
                    <hr>
                    <p class="side-menu-text" onclick="systemLogsClicked()" id="systemLogsText">System Logs</p>
                    <hr>
                </div>

                <?php include_once '../../layouts/profile-content-admin/submissionsPanel.php' ?>
                <?php include_once '../../layouts/profile-content-admin/accountPreferencePanel.php' ?>
                <?php include_once '../../layouts/profile-content-admin/libraryPanel.php' ?>
                <?php include_once '../../layouts/profile-content-admin/systemLogsPanel.php' ?>

            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>

    <script>
        function submissionsClicked() {
            document.getElementById("submissionsPanel").style.display = "block";
            document.getElementById("libraryPanel").style.display = "none";
            document.getElementById("systemLogsPanel").style.display = "none";
            document.getElementById("accountPreferencePanel").style.display = "none";

            document.getElementById("submissionsText").style.borderBottom = "thick solid #012265";
            document.getElementById("libraryText").style.borderBottom = "thick none #012265";
            document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
            document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";
        }

        function accountPreferenceClicked() {
            document.getElementById("submissionsPanel").style.display = "none";
            document.getElementById("libraryPanel").style.display = "none";
            document.getElementById("systemLogsPanel").style.display = "none";
            document.getElementById("accountPreferencePanel").style.display = "block";

            document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
            document.getElementById("libraryText").style.borderBottom = "thick none #012265";
            document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
            document.getElementById("accountPreferenceText").style.borderBottom = "thick solid #012265";
        }

        function libraryClicked() {
            document.getElementById("submissionsPanel").style.display = "none";
            document.getElementById("libraryPanel").style.display = "block";
            document.getElementById("systemLogsPanel").style.display = "none";
            document.getElementById("accountPreferencePanel").style.display = "none";

            document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
            document.getElementById("libraryText").style.borderBottom = "thick solid #012265";
            document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
            document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";
        }

        function systemLogsClicked() {
            document.getElementById("submissionsPanel").style.display = "none";
            document.getElementById("libraryPanel").style.display = "none";
            document.getElementById("systemLogsPanel").style.display = "block";
            document.getElementById("accountPreferencePanel").style.display = "none";

            document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
            document.getElementById("libraryText").style.borderBottom = "thick none #012265";
            document.getElementById("systemLogsText").style.borderBottom = "thick solid #012265";
            document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";
        }

        function showOnThisPagePanels() {

            var showOnThisPageValue = document.getElementById("dropdownOnThisPage").value;

            if (showOnThisPageValue == "submissions") {

                document.getElementById("submissionsPanel").style.display = "block";
                document.getElementById("libraryPanel").style.display = "none";
                document.getElementById("systemLogsPanel").style.display = "none";
                document.getElementById("accountPreferencePanel").style.display = "none";

                document.getElementById("submissionsText").style.borderBottom = "thick solid #012265";
                document.getElementById("libraryText").style.borderBottom = "thick none #012265";
                document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
                document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";

            } else if (showOnThisPageValue == "accountpreference") {

                document.getElementById("submissionsPanel").style.display = "none";
                document.getElementById("libraryPanel").style.display = "none";
                document.getElementById("systemLogsPanel").style.display = "none";
                document.getElementById("accountPreferencePanel").style.display = "block";

                document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
                document.getElementById("libraryText").style.borderBottom = "thick none #012265";
                document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
                document.getElementById("accountPreferenceText").style.borderBottom = "thick solid #012265";

            } else if (showOnThisPageValue == "library") {

                document.getElementById("submissionsPanel").style.display = "none";
                document.getElementById("libraryPanel").style.display = "block";
                document.getElementById("systemLogsPanel").style.display = "none";
                document.getElementById("accountPreferencePanel").style.display = "none";

                document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
                document.getElementById("libraryText").style.borderBottom = "thick solid #012265";
                document.getElementById("systemLogsText").style.borderBottom = "thick none #012265";
                document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";

            } else if (showOnThisPageValue == "systemlogs") {

                document.getElementById("submissionsPanel").style.display = "none";
                document.getElementById("libraryPanel").style.display = "none";
                document.getElementById("systemLogsPanel").style.display = "block";
                document.getElementById("accountPreferencePanel").style.display = "none";

                document.getElementById("submissionsText").style.borderBottom = "thick none #012265";
                document.getElementById("libraryText").style.borderBottom = "thick none #012265";
                document.getElementById("systemLogsText").style.borderBottom = "thick solid #012265";
                document.getElementById("accountPreferenceText").style.borderBottom = "thick none #012265";

            }
        }
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>