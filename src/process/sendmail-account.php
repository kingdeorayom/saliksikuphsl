<?php
// EMAIL SEND FOR ACCOUNT RELATED SUCH AS LOGIN, FORGOT PASSWORD

if (!isset($_SESSION['email'])) {
    header('Location: ../../error.php');
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'researchrepository@saliksik-uphsl.com';
    $mail->Password = 'Serkingd28();';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('researchrepository@saliksik-uphsl.com', 'SALIKSIK: UPHSL Research Repository');
    $mail->isHTML(true);

    if (isset($_SESSION['toVerifyAccountCreation'])) {

        $verificationCode = uniqid();
        $_SESSION['verificationCode'] = strtoupper(substr($verificationCode, 7));
        $subject = '[SALIKSIK: UPHSL Research Repository] Account Registration';
        $recipient = $_SESSION['email'];

        $mail->addAddress($recipient);
        $mail->Subject = $subject;
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
    } else if (isset($_SESSION['toVerifyPasswordReset'])) {

        $verificationCode = uniqid();
        $_SESSION['verificationCode'] = strtoupper(substr($verificationCode, 7));
        $subject = '[SALIKSIK: UPHSL Research Repository] Reset your password';
        $recipient = $_SESSION['email'];

        $mail->addAddress($recipient);
        $mail->Subject = $subject;
        $mail->Body = '
            <body>
                <p>Hi,</p>
                <p>A password reset attempt using this email address ' . $recipient . ' was made and requires further verification.</p>
                <p>To complete the password reset process, enter the verification code given below.</p>
                <p>Verification code: <strong>' . $_SESSION['verificationCode'] . '</strong></p>
                <p>If it wasn&apos;t you who attempted to reset the password of the account this email is linked to, kindly disregard this message.</p>
                <p>The password reset process will be cancelled and the email will not be used.</p>
                <p>Thanks,</p>
                <p>The SALIKSIK: UPHSL Research Repository Team</p>
                <p><em>This is a system generated message. Do not reply.</em></p>
            </body>';

        $mail->send();
        unset($_SESSION['toVerifyPasswordReset']); ////////////////
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
