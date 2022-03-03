<?php session_start();

if (!isset($_SESSION['resetPassword'])) {
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/reset-password-style.css" type="text/css">
</head>

<body style="background-color: #012265;font-family: 'Roboto';">

    <!--Main Section-->
    <main class="main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
                <!-- <div class="row p-2">
                    <div class="text-center">
                        <img src="../../assets/images/core/uphsl-logo.png" id="uphsl-logo" alt="UPHSL Logo">
                    </div>
                </div> -->
                <div class="row py-2">
                    <?php

                    if (isset($_SESSION['emptyInput'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Invalid input!</strong> Please fill up all the fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['emptyInput']);
                    }

                    if (isset($_SESSION['mismatchedPassword'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Invalid input!</strong> <code>Password</code> and <code>Confirm Password</code> does not match.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['mismatchedPassword']);
                    }

                    ?>
                </div>
                <div class="row py-2">
                    <h3>Reset your password</h3>
                </div>
                <div class="row">
                    <form action="../../process/reset-password-actual.php" method="POST">
                        <label class="my-2">Enter new password</label>
                        <input class="form-control" type="password" name="textFieldPassword" id="textFieldPassword">
                        <label class="my-2">Confirm Password</label>
                        <input class="form-control" type="password" name="textFieldConfirmPassword" id="textFieldConfirmPassword">
                        <div class="form-check py-2">
                            <input class="form-check-input" type="checkbox" id="checkboxShowHidePassword" onclick="showHidePassword()">
                            <label class="form-check-label" for="checkboxShowHidePassword">Show/Hide Password</label>
                        </div>
                        <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonCreateAccount" id="buttonCreateAccount">Submit</button>
                        <a href="../../process/logout.php"><button class="btn btn-secondary text-white w-100 mb-2" type="button" name="buttonCancel" id="buttonCancel">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../../../scripts/custom/user-login-register-scripts.php' ?>

</body>

</html>