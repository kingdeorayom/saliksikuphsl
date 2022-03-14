<?php

if (!isset($_SESSION['email'])) {
    header('Location: ../../src/layouts/general/error.php');
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

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
    } else if (isset($_SESSION['sendEmailAfterSubmit'])) {
        function sendMail()
        {
            $mail = new PHPMailer(true);

            $subject = "[SALIKSIK: UPHSL Research Repository] Manuscript Received";
            $mail->Subject = $subject;

            if (empty($_POST['textFieldEmailAuthor1'] || $_POST['textFieldEmailAuthor2'] || $_POST['textFieldEmailAuthor3'] ||  $_POST['textFieldEmailAuthor4'])) {
                // email to author ONLY

                $recipient1 = $_POST['textFieldEmail'];
                $mail->addAddress($recipient1);
                $mail->Body = '
                <body>
                    <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ',</p>
                    <p>We have received your manuscript. Please check the submission details below:</p>
                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 13px;">
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Title</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldResearchTitle'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Resource Type</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResourceType'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Author/s</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Researcher\'s Category</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchersCategory'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Research Unit</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchUnit'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Attached Files</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_SESSION['manuscriptFileNameForEmail'] . ', ' . $_SESSION['questionnaireFileNameForEmail'] . '</td>
                        </tr>
                    </table>
                    <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.</p>
                    <p>Thanks,</p>
                    <p>The SALIKSIK: UPHSL Research Repository Team</p>
                    <p><em>This is a system generated message. Do not reply.</em></p>
                </body>';
                $mail->send();
            } else if (empty($_POST['textFieldEmailAuthor2'] || $_POST['textFieldEmailAuthor3'] ||  $_POST['textFieldEmailAuthor4'])) {

                // email to author and co author 1 -- WORKING

                $recipient1 = $_POST['textFieldEmail'];
                $recipient2 = $_POST['textFieldEmailAuthor1'];
                $mail->addAddress($recipient1);
                $mail->addAddress($recipient2);
                $mail->Body = '
                <body>
                    <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ',</p>
                    <p>We have received your manuscript. Please check the submission details below:</p>
                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 13px;">
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Title</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldResearchTitle'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Resource Type</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResourceType'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Author/s</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Researcher\'s Category</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchersCategory'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Research Unit</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchUnit'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Attached Files</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_SESSION['manuscriptFileNameForEmail'] . ', ' . $_SESSION['questionnaireFileNameForEmail'] . '</td>
                        </tr>
                    </table>
                    <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.</p>
                    <p>Thanks,</p>
                    <p>The SALIKSIK: UPHSL Research Repository Team</p>
                    <p><em>This is a system generated message. Do not reply.</em></p>
                </body>';
                $mail->send();
            } else  if (empty($_POST['textFieldEmailAuthor3'] || $_POST['textFieldEmailAuthor4'])) {

                // email to author and co author 1, 2 -- WORKING

                $recipient1 = $_POST['textFieldEmail'];
                $recipient2 = $_POST['textFieldEmailAuthor1'];
                $recipient3 = $_POST['textFieldEmailAuthor2'];
                $mail->addAddress($recipient1);
                $mail->addAddress($recipient2);
                $mail->addAddress($recipient3);
                $mail->Body = '
                <body>
                    <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . ',</p>
                    <p>We have received your manuscript. Please check the submission details below:</p>
                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 13px;">
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Title</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldResearchTitle'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Resource Type</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResourceType'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Author/s</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Researcher\'s Category</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchersCategory'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Research Unit</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchUnit'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Attached Files</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_SESSION['manuscriptFileNameForEmail'] . ', ' . $_SESSION['questionnaireFileNameForEmail'] . '</td>
                        </tr>
                    </table>
                    <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.</p>
                    <p>Thanks,</p>
                    <p>The SALIKSIK: UPHSL Research Repository Team</p>
                    <p><em>This is a system generated message. Do not reply.</em></p>
                </body>';
                $mail->send();
            } else  if (empty($_POST['textFieldEmailAuthor4'])) {

                // email to author and co author 1, 2, 3 -- WORKING

                $recipient1 = $_POST['textFieldEmail'];
                $recipient2 = $_POST['textFieldEmailAuthor1'];
                $recipient3 = $_POST['textFieldEmailAuthor2'];
                $recipient4 = $_POST['textFieldEmailAuthor3'];
                $mail->addAddress($recipient1);
                $mail->addAddress($recipient2);
                $mail->addAddress($recipient3);
                $mail->addAddress($recipient4);
                $mail->Body = '
                <body>
                    <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . ', ' . $_POST['textFieldFirstNameCoAuthor3'] . ' ' . $_POST['textFieldLastNameCoAuthor3'] . ',</p>
                    <p>We have received your manuscript. Please check the submission details below:</p>
                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 13px;">
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Title</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldResearchTitle'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Resource Type</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResourceType'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Author/s</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . ', ' . $_POST['textFieldFirstNameCoAuthor3'] . ' ' . $_POST['textFieldLastNameCoAuthor3'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Researcher\'s Category</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchersCategory'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Research Unit</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchUnit'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Attached Files</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_SESSION['manuscriptFileNameForEmail'] . ', ' . $_SESSION['questionnaireFileNameForEmail'] . '</td>
                        </tr>
                    </table>
                    <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.</p>
                    <p>Thanks,</p>
                    <p>The SALIKSIK: UPHSL Research Repository Team</p>
                    <p><em>This is a system generated message. Do not reply.</em></p>
                </body>';
                $mail->send();
            } else {

                // email to author and co author 1, 2, 3, 4 -- WORKING

                $recipient1 = $_POST['textFieldEmail'];
                $recipient2 = $_POST['textFieldEmailAuthor1'];
                $recipient3 = $_POST['textFieldEmailAuthor2'];
                $recipient4 = $_POST['textFieldEmailAuthor3'];
                $recipient5 = $_POST['textFieldEmailAuthor4'];
                $mail->addAddress($recipient1);
                $mail->addAddress($recipient2);
                $mail->addAddress($recipient3);
                $mail->addAddress($recipient4);
                $mail->addAddress($recipient5);
                $mail->Body = '
                <body>
                    <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . ', ' . $_POST['textFieldFirstNameCoAuthor3'] . ' ' . $_POST['textFieldLastNameCoAuthor3'] . ', ' . $_POST['textFieldFirstNameCoAuthor4'] . ' ' . $_POST['textFieldLastNameCoAuthor4'] . ',</p>
                    <p>We have received your manuscript. Please check the submission details below:</p>
                    <table style="border-collapse: collapse; border: 1px solid black; font-size: 13px;">
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Title</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldResearchTitle'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Resource Type</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResourceType'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Author/s</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['textFieldAuthorFirstName'] . ' ' . $_POST['textFieldAuthorLastName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ' ' . $_POST['textFieldLastNameCoAuthor1'] . ', ' . $_POST['textFieldFirstNameCoAuthor2'] . ' ' . $_POST['textFieldLastNameCoAuthor2'] . ', ' . $_POST['textFieldFirstNameCoAuthor3'] . ' ' . $_POST['textFieldLastNameCoAuthor3'] . ', ' . $_POST['textFieldFirstNameCoAuthor4'] . ' ' . $_POST['textFieldLastNameCoAuthor4'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Researcher\'s Category</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchersCategory'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Research Unit</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_POST['dropdownResearchUnit'] . '</td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; padding: 5px 30px 5px 30px;"><strong>Attached Files</strong></td>
                            <td style="border: 1px solid black; padding: 5px 60px 5px 60px;">' . $_SESSION['manuscriptFileNameForEmail'] . ', ' . $_SESSION['questionnaireFileNameForEmail'] . '</td>
                        </tr>
                    </table>
                    <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.</p>
                    <p>Thanks,</p>
                    <p>The SALIKSIK: UPHSL Research Repository Team</p>
                    <p><em>This is a system generated message. Do not reply.</em></p>
                </body>';
                $mail->send();
            }
        }
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
