<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("location: ../../layouts/general/error.php");
    die();
} else if (isset($_SESSION['email'])) {
    $verificationCode = uniqid();
    $_SESSION['verificationCode'] = strtoupper(substr($verificationCode, 7));
    $subject = '[SALIKSIK: UPHSL Research Repository] Account Registration';
    $recipient = $_SESSION['email'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;
        $mail->Username = 'saliksikuphsl@gmail.com';
        $mail->Password = 'kingdeorayom();';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('saliksikuphsl@gmail.com', 'SALIKSIK: UPHSL Research Repository');
        $mail->addAddress($recipient);
        $mail->isHTML(true);
        $mail->Subject = $subject;

        /* for embedding images on emails
        $mail->AddEmbeddedImage("Beautiful Butterfly_64.jpg", "my-attach", "rocks.png");
        $mail->Body = 'Embedded Image: <img alt="PHPMailer" src="cid:my-attach"> Here is an image!';
        */

        $mail->Body = '
        <body>
            <p>Hello, ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '!</p>
            <p>A registration attempt using this email address ' . $recipient . ' was made and requires further verification.</p>
            <p>To complete the sign up process, enter the verification code given below.</p>
            <p>Verification code: <strong>' . $_SESSION['verificationCode'] . '</strong></p>
            <p>If it wasn&apos;t you who attempted to register the email in the website, kindly disregard this message.</p>
            <p>The registration process will be cancelled and the email will not be used.</p>
            <p>Thanks,</p>
            <p>The SALIKSIK: UPHSL Research Repository Team</p>
            <p><em>This is a system generated message. Do not reply.</em></p>
        </body>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
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
    <title>Verify your account</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/login-style.css?id=' . $pagecssVersion ?>" type="text/css">
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
                        <input class="form-control" type="text" name="textFieldVerificationCode" id="textFieldVerificationCode" autofocus maxlength="6">

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