<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header("location: ../../layouts/general/error.php");
        die();
    }
} else {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/profile-style.css');
$profileadminjs = filemtime('../../../scripts/custom/profile-admin.js');
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <script src="<?php echo '../../../scripts/custom/profile-admin.js?id=' . $profileadminjs ?>" type="module"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <form class="submissions" name="account-preference">
                        <h1 class="my-2 p-2">Account Preference</h1>
                        <hr class="my-3">
                        <div class="row my-5">
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">First Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" name="first-name-input" value="<?php echo $_SESSION['firstName']; ?>" disabled>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Last Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" name="last-name-input" value="<?php echo $_SESSION['lastName']; ?>" disabled>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Current Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="password" name="current-password-input">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">New Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="password" name="new-password-input">
                            </div>
                            <hr class="mt-4 mb-3">
                            <label for="" class="mt-3 mb-2"><span class="fw-bold">Please note:</span> If you change your password, you will have to log in again using the new password.</label>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary button-edit-acctpref rounded-0">Edit</button>
                                <button type="button" class="btn btn-secondary button-update-acctpref rounded-0">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <div class="submissions">
                        <h1 class="p-2">Create New Account</h1>
                        <hr class="my-3">
                        <div class="row my-5">
                            <div class="col-lg-3">
                                <h6 class="fw-bold my-3">Account Type</h6>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-select my-2" aria-label="Default select example" id="dropdown-account-type" name="dropdownAccountType">
                                    <option value="admin" selected>Administrator</option>
                                    <option value="user">Standard User</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">First Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Last Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">School Email</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Department</h6>
                            </div>
                            <div class="col-lg-9">
                                <select class="form-select my-2" aria-label="Default select example" id="dropdown-department" name="dropdownDepartment">
                                    <option value="Basic Education" selected>Basic Education</option>
                                    <option value="Senior High School">Senior High School</option>
                                    <option value="Arts and Sciences">Arts and Sciences</option>
                                    <option value="Business and Accountancy">Business and Accountancy</option>
                                    <option value="Computer Studies">Computer Studies</option>
                                    <option value="Criminology">Criminology</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering, Architecture and Aviation">Engineering, Architecture and Aviation</option>
                                    <option value="Law">Law</option>
                                    <option value="Maritime Education">Maritime Education</option>
                                    <option value="International Hospitality Management">International Hospitality Management</option>
                                    <option value="Graduate School">Graduate School</option>
                                    <option value="Support Services">Support Services</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Confirm Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text">
                            </div>
                            <hr class="my-4">
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary button-create rounded-0">Create account</button>
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