<?php

session_start();

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

    <link rel="apple-touch-icon" sizes="180x180" href="../../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../favicon-16x16.png">
    <link rel="manifest" href="../../../site.webmanifest">
    <link rel="mask-icon" href="../../../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

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
                                                                                                                    } ?>" autofocus>
                        <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonSubmit" id="buttonSubmit">Submit</button>
                        <a href="../../../index.php"><button class="btn btn-secondary text-white w-100 mb-2 button-cancel" type="button" name="buttonCancel" id="buttonCancel">Cancel</button></a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>