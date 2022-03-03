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

<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research profile" style="font-family: 'Roboto';">
        <div class="container p-5">

            <div class="row">

                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <div class="submissions">
                        <h1 class="my-2 p-2">Account Preference</h1>
                        <hr class="my-3">
                        <div class="row my-5">
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">First Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Last Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Current Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">New Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <hr class="mt-4 mb-3">
                            <label for="" class="mt-3 mb-2"><span class="fw-bold">Please note:</span> If you change your password, you will have to log in again using the new password.</label>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary button-edit-acctpref rounded-0">Edit</button>
                                <button type="button" class="btn btn-secondary button-update-acctpref rounded-0">Update</button>
                            </div>
                        </div>
                    </div>
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
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Last Name</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">School Email</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
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
                                <input class="form-control my-2" type="text" id="">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="fw-bold mt-3 mb-2">Confirm Password</h6>
                            </div>
                            <div class="col-lg-9">
                                <input class="form-control my-2" type="text" id="">
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