<?php session_start(); ?>

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
    <link rel="stylesheet" href="../../../styles/custom/pages/forgot-password-style.css" type="text/css">
</head>

<body style="background-color: #012265; font-family: 'Roboto';">

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

                    if (isset($_SESSION['invalidEmail'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Invalid input!</strong> Please enter a valid e-mail.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['invalidEmail']);
                    }

                    if (isset($_SESSION['notSchoolEmail'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Invalid email!</strong> Please use your school email.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['notSchoolEmail']);
                    }

                    if (isset($_SESSION['emailDoesNotExists'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Account not found!</strong> There is no account linked to the email provided.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['emailDoesNotExists']);
                    }

                    ?>
                </div>
                <div class="row py-2">
                    <h3>Forgot your password?</h3>
                    <p class="my-2">Enter the email you used to register your account.</p>
                </div>
                <div class="row">
                    <form action="../../process/forgot-password-email-verify.php" method="POST">
                        <input class="form-control" type="text" name="textFieldEmail" id="textFieldEmail" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                        echo $_SESSION['email'];
                                                                                                                        unset($_SESSION['email']);
                                                                                                                    } ?>">
                        <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonCreateAccount" id="buttonCreateAccount">Submit</button>
                        <a href="../../../index.php"><button class="btn bg-secondary text-white w-100 mb-2" type="button" name="buttonCancel" id="buttonCancel">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../../../scripts/custom/user-login-register-scripts.php' ?>

</body>

</html>