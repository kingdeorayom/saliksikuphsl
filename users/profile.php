<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin-profile.php");
    }
} else {
    header("location: ../../error.php");
    die();
}

include '../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$sql = "SELECT first_name, last_name, department FROM users WHERE user_id = " . $_SESSION['userid'];
$result = $connection->query($sql);
$user = $result->fetch_assoc();

$connection->close();

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/profile-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php'?>
    <section class="submit-research profile">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column" id="myProfilePanel">
                    <h1 class="my-2">About you</h1>
                    <hr class="my-4">
                    <div class="row">
                    <?php 
                    if(isset($_SESSION['changedAbout'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Account details changed successfully!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['changedAbout']); endif;?>
                        <form action="../src/process/update-user-profile.php" method="POST">
                            <div class="row">
                                <div>
                                    <label class="fw-bold mb-2">Email Address <i class="fas fa-question-circle text-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="For security purposes, you cannot change your email address"></i></label>
                                    <input type="text" class="form-control" name="textFieldEmailAddress" value="<?php echo $_SESSION['email']; ?>" disabled>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">First Name</label>
                                    <input type="text" class="form-control" name="textFieldFirstName" value="<?php echo $user['first_name']; ?>" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">Last Name</label>
                                    <input type="text" class="form-control" name="textFieldLastName" value="<?php echo $user['last_name']; ?>" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">College/Department</label>
                                            <select class="form-select" aria-label="Default select example" name="dropdownDepartment">
                                                <option value="Basic Education" <?= $user['department'] == "Basic Education" ? 'selected=selected' : '' ?>>Basic Education</option>
                                                <option value="Senior High School" <?= $user['department'] == "Senior High School" ? 'selected=selected' : '' ?>>Senior High School</option>
                                                <option value="Arts and Sciences" <?= $user['department'] == "Arts and Sciences" ? 'selected=selected' : '' ?>>Arts and Sciences</option>
                                                <option value="Business and Accountancy" <?= $user['department'] == "Business and Accountancy" ? 'selected=selected' : '' ?>>Business and Accountancy</option>
                                                <option value="Computer Studies" <?= $user['department'] == "Computer Studies" ? 'selected=selected' : '' ?>>Computer Studies</option>
                                                <option value="Criminology" <?= $user['department'] == "Criminology" ? 'selected=selected' : '' ?>>Criminology</option>
                                                <option value="Education" <?= $user['department'] == "Education" ? 'selected=selected' : '' ?>>Education</option>
                                                <option value="Engineering, Architecture and Aviation" <?= $user['department'] == "Engineering, Architecture and Aviation" ? 'selected=selected' : '' ?>>Engineering, Architecture and Aviation</option>
                                                <option value="Law" <?= $user['department'] == "Law" ? 'selected=selected' : '' ?>>Law</option>
                                                <option value="Maritime Education" <?= $user['department'] == "Maritime Education" ? 'selected=selected' : '' ?>>Maritime Education</option>
                                                <option value="International Hospitality Management" <?= $user['department'] == "International Hospitality Management" ? 'selected=selected' : '' ?>>International Hospitality Management</option>
                                                <option value="Graduate School" <?= $user['department'] == "Graduate School" ? 'selected=selected' : '' ?>>Graduate School</option>
                                                <option value="Support Services" <?= $user['department'] == "Support Services" ? 'selected=selected' : '' ?>>Support Services</option>
                                            </select>
                                   
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
                        <?php if(isset($_SESSION['changedPassword'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Password changed successfully!</strong> In case of forgotten password, proceed to the <strong>Forgot Password</strong> section in the login page to reset your password.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['changedPassword']); endif;?>
                        <?php if(isset($_SESSION['wrongPassword'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            
                        <strong>Password change unsuccessful!</strong> The current password you entered is incorrect.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['wrongPassword']); endif;?>
                        <form action="../src/process/update-user-password.php" method="POST">
                            <div class="row">
                                <div>
                                    <label class="fw-bold mb-2">Current Password</label>
                                    <input type="password" class="form-control" name="textFieldCurrentPassword" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div>
                                    <label class="fw-bold mb-2">New Password</label>
                                    <input type="password" class="form-control" name="textFieldNewPassword" required>
                                </div>
                            </div>
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

    <?php include_once '../includes/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/popper/popper.min.js"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>