<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

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

    $subject = '[SALIKSIK: UPHSL Research Repository] ISO 25010 Software Evaluation Survey';
    $recipient1 = 'c' . $_POST['recipient1'] . '@uphsl.edu.ph';
    $recipient2 = 'c' . $_POST['recipient2'] . '@uphsl.edu.ph';
    $recipient3 = 'c' . $_POST['recipient3'] . '@uphsl.edu.ph';
    $recipient4 = 'c' . $_POST['recipient4'] . '@uphsl.edu.ph';
    $recipient5 = 'c' . $_POST['recipient5'] . '@uphsl.edu.ph';

    $mail->addAddress($recipient1);
    $mail->addAddress($recipient2);
    $mail->addAddress($recipient3);
    $mail->addAddress($recipient4);
    $mail->addAddress($recipient5);
    $mail->Subject = $subject;
    $mail->Body = '
                <body>
                    <p>Good day, Perpetualite!</p>
                    <p>We, the fourth-year BS IT students are developing our capstone project <strong>"SALIKSIK: UPHSL Research Repository"</strong>, in fulfillment of our subject requirement in <strong>Capstone Project 2</strong>.</p>
                    <p>If you are a College/Graduate School student, faculty, non-teaching personnel, or department head in UPHSL, you are qualified to answer this survey. Your participation will help to fulfill the objective of this study.</p>
                    <p>Thank you in advance and God bless!</p>
                    <p><em>Note: Please use the UPHSL email account to access this survey.</em></p>
                    <p>Survey link: https://forms.gle/6Qd8Eqfo5kVZkc9X9</p>
                </body>';

    $mail->send();

    $arr = array('response' => "login_success");
    header('Content-Type: application/json');
    echo json_encode($arr);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
