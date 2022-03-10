<?php session_start();

if (!isset($_SESSION['resetPassword'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/login-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your password</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/login-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>

    <!--Main Section-->
    <main class="main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
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

    <script>
        function showHidePassword() {

            var checkboxShowHidePasswordValue = document.getElementById("textFieldPassword");
            var checkboxShowHideRepeatPasswordValue = document.getElementById("textFieldConfirmPassword");

            if (checkboxShowHidePasswordValue.type === "password") {
                checkboxShowHidePasswordValue.type = "text";
                checkboxShowHideRepeatPasswordValue.type = "text";
            } else {
                checkboxShowHidePasswordValue.type = "password";
                checkboxShowHideRepeatPasswordValue.type = "password";
            }
        }
    </script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>