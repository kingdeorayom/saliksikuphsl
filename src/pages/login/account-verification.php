<?php

session_start();

if (!isset($_SESSION['email'])) {
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
} else if (isset($_SESSION['email'])) {
    $verificationCode = uniqid();
    $_SESSION['verificationCode'] = strtoupper(substr($verificationCode, 7));
    $subject = '[SALIKSIK: UPHSL Research Repository] Verification Code';
    $message =  'Hello, ' .  $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '!' . "\n\n" . 'A registration attempt using this email address ' . $_SESSION['email'] . ' was made and requires further verification.' . "\n" . 'To complete the sign up process, enter the verification code given below:' . "\n\n" . 'Verification code: ' . $_SESSION['verificationCode'] . "\n\n" . 'If it wasn\'t you who attempted to register the email in the website, kindly disregard this message. The registration process will be cancelled and the email will not be used.' . "\n\n" . 'Thanks,' . "\n" . 'The SALIKSIK: UPHSL Research Repository Team' . "\n\n" . 'This is a system generated message. Do not reply.';
    $recipient = $_SESSION['email'];
    mail($recipient, $subject, $message, 'From: noreply@gmail.com');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/login-style.css" type="text/css">
    <link rel="stylesheet" href="../../../plugins/sweetalert/package/dist/sweetalert2.css" type="text/css">
</head>

<body>

    <!--Main Section-->
    <main class="main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
                <div class="row py-2">
                    <?php
                    if (isset($_SESSION['incorrectVerificationCode'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Incorrect verification code</strong>. Please try again with the new code sent to your email.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['incorrectVerificationCode']);
                    }
                    ?>
                </div>
                <div class="row py-2">
                    <h3>Verify your account to continue</h3>
                </div>
                <div class="row">
                    <form action="../../process/account-verify.php" method="POST">
                        <label class="mb-3">We sent a one-time verification code to the email you used to register.<br>Please enter the code below to verify your account.</label>
                        <input class="form-control" type="text" name="textFieldVerificationCode" id="textFieldVerificationCode" autofocus>

                        <button class="btn text-white w-100 mt-4" type="submit" name="buttonSubmitVerificationCode" id="buttonSubmitVerificationCode">Submit</button>
                        <a href="../../process/logout.php"><button class="btn btn-secondary text-white w-100 mt-2 mb-2" type="button" name="buttonCancel" id="buttonCancel">Cancel</button></a>
                    </form>
                    <div class="text-center py-2 resend-verification-code">
                        <p onclick="fireSweetAlertResendVerificationCode();">Didn't receive a code? Click here to request a new one</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function fireSweetAlertResendVerificationCode() {
            Swal.fire({
                title: 'Request a new verification code?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('A new verification code is sent to your email!', '', 'success');
                    location.reload();
                } else if (result.isDenied) {}
            })
        }
    </script>

    <script src="../../../plugins/sweetalert/package/dist/sweetalert2.js"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>