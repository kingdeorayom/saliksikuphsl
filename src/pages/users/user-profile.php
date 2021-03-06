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
    // echo '<a href="../../../index.php">go back</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

include '../../process/connection.php'; // covers profilePanel.php, libraryPanel.php, submissionsPanel.php

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$sql = "SELECT department FROM users WHERE user_id = " . $_SESSION['userid'];
$result = $connection->query($sql);

$connection->close();

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

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!--Masthead-->

    <!-- <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text"><?php echo 'Hi, ' . $_SESSION['fullName'] . '!' ?></h1>
        </div>
    </section> -->

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column" id="myProfilePanel">
                    <h1 class="my-2">About you</h1>
                    <hr class="my-4">
                    <div class="row">
                        <form action="../../process/update-user-profile.php" method="POST">
                            <div class="row">
                                <div>
                                    <label class="fw-bold mb-2">Email Address</label>
                                    <input type="text" class="form-control" name="textFieldEmailAddress" value="<?php echo $_SESSION['email']; ?>" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">First Name</label>
                                    <input type="text" class="form-control" id="textFieldFirstName" value="<?php echo $_SESSION['firstName']; ?>" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">Last Name</label>
                                    <input type="text" class="form-control" id="textFieldLastName" value="<?php echo $_SESSION['lastName']; ?>" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">College/Department</label>
                                    <?php

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                                                <option value="Basic Education" <?= $row['department'] == "Basic Education" ? 'selected=selected' : '' ?>>Basic Education</option>
                                                <option value="Senior High School" <?= $row['department'] == "Senior High School" ? 'selected=selected' : '' ?>>Senior High School</option>
                                                <option value="Arts and Sciences" <?= $row['department'] == "Arts and Sciences" ? 'selected=selected' : '' ?>>Arts and Sciences</option>
                                                <option value="Business and Accountancy" <?= $row['department'] == "Business and Accountancy" ? 'selected=selected' : '' ?>>Business and Accountancy</option>
                                                <option value="Computer Studies" <?= $row['department'] == "Computer Studies" ? 'selected=selected' : '' ?>>Computer Studies</option>
                                                <option value="Criminology" <?= $row['department'] == "Criminology" ? 'selected=selected' : '' ?>>Criminology</option>
                                                <option value="Education" <?= $row['department'] == "Education" ? 'selected=selected' : '' ?>>Education</option>
                                                <option value="Engineering, Architecture and Aviation" <?= $row['department'] == "Engineering, Architecture and Aviation" ? 'selected=selected' : '' ?>>Engineering, Architecture and Aviation</option>
                                                <option value="Law" <?= $row['department'] == "Law" ? 'selected=selected' : '' ?>>Law</option>
                                                <option value="Maritime Education" <?= $row['department'] == "Maritime Education" ? 'selected=selected' : '' ?>>Maritime Education</option>
                                                <option value="International Hospitality Management" <?= $row['department'] == "International Hospitality Management" ? 'selected=selected' : '' ?>>International Hospitality Management</option>
                                                <option value="Graduate School" <?= $row['department'] == "Graduate School" ? 'selected=selected' : '' ?>>Graduate School</option>
                                                <option value="Support Services" <?= $row['department'] == "Support Services" ? 'selected=selected' : '' ?>>Support Services</option>
                                            </select>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary button-update rounded-0" value="Update information" id="buttonUpdate">
                                </div>
                            </div>
                        </form>
                        <h1 class="my-1">Account Parameters</h1>
                        <hr class="my-4">
                        <form action="../../process/update-user-profile.php" method="POST">
                            <div class="row">
                                <div>
                                    <label class="fw-bold mb-2">Current Password</label>
                                    <input type="text" class="form-control" name="textFieldCurrentPassword" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">New Password</label>
                                    <input type="text" class="form-control" id="textFieldNewPassword" required>
                                    <p class="text-secondary my-3"><span class="fw-bold text-danger">IMPORTANT:</span> If you change your password, you will have to log in again using the new password.</p>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row my-3">
                                <div class="text-end">
                                    <input type="submit" class="btn btn-primary button-update rounded-0" value="Change password" id="buttonUpdate">
                                </div>
                            </div>
                        </form>
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