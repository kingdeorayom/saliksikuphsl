<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

session_start();

include 'connection.php';

function sendMail()
{
    $mail = new PHPMailer(true);

    $recipient1 = $_POST['textFieldEmail'];
    // $recipient2 = $_POST['textFieldEmailAuthor1'];
    // $recipient3 = $_POST['textFieldEmailAuthor2'];
    // $recipient4 = $_POST['textFieldEmailAuthor3'];
    // $recipient5 = $_POST['textFieldEmailAuthor4'];
    $subject = "[SALIKSIK: UPHSL Research Repository] Manuscript Received";

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
        $mail->addAddress($recipient1);
        // $mail->addAddress($recipient2);
        // $mail->addAddress($recipient3);
        // $mail->addAddress($recipient4);
        // $mail->addAddress($recipient5);
        $mail->isHTML(true);
        $mail->Subject = $subject;

        $mail->Body = '<body>

        <p>Dear ' . $_POST['textFieldAuthorFirstName'] . ', ' . $_POST['textFieldFirstNameCoAuthor1'] . ',<br><br>
        
        We have received your manuscript. Please check the submission details below:</p><br>

        <table>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Title</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_POST['textFieldResearchTitle'] . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Resource Type</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_POST['dropdownResourceType'] . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Author/s</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_POST['textFieldAuthorFirstName'] . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Researcher\'s Category</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_POST['dropdownResearchersCategory'] . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Research Unit</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_POST['dropdownResearchUnit'] . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px;"><strong>Attached File/s</strong></td>
                <td style="border: 1px solid black; border-collapse: collapse; padding: 5px 30px 5px 5px;">' . $_SESSION['fileNameForEmail'] . '</td>
            </tr>
        </table><br>

        <p>In case of any issue, you may email us at research@uphsl.edu.ph or you can directly edit your submission by checking <strong>My Submissions</strong> under your profile.<br><br>

        Thanks,<br>
        The SALIKSIK: UPHSL Research Repository Team<br><br>
        
        This is a system generated message. Do not reply.</p>
        </body>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_POST['dropdownResourceType'], $_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'], $_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'], $_POST['textFieldResearchTitle'], $_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'], $_POST['textFieldAuthorLastName'], $_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail'], $_POST['dropdownCoAuthors'], $_POST['textareaAbstract'], $_POST['textareaKeywords'], $_POST['researchFields'], $_FILES['fileSubmit'])) {
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];


    $file = $_FILES['fileSubmit'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    $_SESSION['fileNameForEmail'] = $fileName;

    //extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf');


    //Questionnaire
    $fileQuestionnaire = $_FILES['fileQuestionnaire'];
    $fileQuestionnaireName = $fileQuestionnaire['name'];
    $fileQuestionnaireSize = $fileQuestionnaire['size'];
    $fileQuestionnaireTempLoc = $fileQuestionnaire['tmp_name'];
    $fileQuestionnaireError = $fileQuestionnaire['error'];

    //questionExtension
    $fileQuestionnaireExt = explode('.', $fileQuestionnaireName);
    $fileQuestionnaireActualExt = strtolower(end($fileQuestionnaireExt));
    $questionnaireAllowed = array('pdf');



    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $sql = "SELECT file_name FROM file_information WHERE file_name = '$fileName'";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $connection->close();
                    $arr = array('response' => "duplicate_error");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                    exit();
                } else {
                    $filenameUnique = uniqid('', true);

                    $fileNameNew = $filenameUnique . "." . $fileActualExt;
                    $fileDestination = '../uploads/theses/' . $fileNameNew;

                    $fileNameQuestionNew = $filenameUnique . "-questionnaire." . $fileQuestionnaireActualExt;
                    $fileQuestionDestination = '../uploads/theses/questionnaires/' . $fileNameQuestionNew;

                    $fileStatus = "pending";
                    $fileType = "thesis";
                    $connection->begin_transaction();
                    try {
                        $statement = $connection->prepare("INSERT INTO coauthors_information(coauthor1_first_name,coauthor1_middle_initial,coauthor1_surname,coauthor1_name_ext,coauthor1_email,coauthor2_first_name,coauthor2_middle_initial,coauthor2_surname,coauthor2_name_ext,coauthor2_email,coauthor3_first_name,coauthor3_middle_initial,coauthor3_surname,coauthor3_name_ext,coauthor3_email,coauthor4_first_name,coauthor4_middle_initial,coauthor4_surname,coauthor4_name_ext,coauthor4_email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $statement->bind_param('ssssssssssssssssssss', $_POST['textFieldFirstNameCoAuthor1'], $_POST['textFieldMiddleInitialCoAuthor1'], $_POST['textFieldLastNameCoAuthor1'], $_POST['textFieldNameExtCoAuthor1'], $_POST['textFieldEmailAuthor1'], $_POST['textFieldFirstNameCoAuthor2'], $_POST['textFieldMiddleInitialCoAuthor2'], $_POST['textFieldLastNameCoAuthor2'], $_POST['textFieldNameExtCoAuthor2'], $_POST['textFieldEmailAuthor2'], $_POST['textFieldFirstNameCoAuthor3'], $_POST['textFieldMiddleInitialCoAuthor3'], $_POST['textFieldLastNameCoAuthor3'], $_POST['textFieldNameExtCoAuthor3'], $_POST['textFieldEmailAuthor3'], $_POST['textFieldFirstNameCoAuthor4'], $_POST['textFieldMiddleInitialCoAuthor4'], $_POST['textFieldLastNameCoAuthor4'], $_POST['textFieldNameExtCoAuthor4'], $_POST['textFieldEmailAuthor4']);
                        $statement->execute();
                        $coauthorsInsertedId = $statement->insert_id;
                        $statement->close();

                        $statement = $connection->prepare('INSERT INTO file_information(user_id, file_type, file_name, file_dir, file_dir2, file_uploader, status, coauthor_group_id) VALUES(?,?,?,?,?,?,?,?)');
                        $statement->bind_param('issssssi', $userId, $fileType, $fileName, $fileDestination, $fileQuestionDestination, $userName, $fileStatus, $coauthorsInsertedId);
                        $statement->execute();
                        $insertedId = $statement->insert_id;
                        $statement->close();

                        $comma_separated_fields = implode(', ', $_POST['researchFields']);

                        $statement = $connection->prepare("INSERT INTO research_information(file_ref_id,resource_type,researchers_category,research_unit,research_title,research_abstract,research_fields,keywords,publication_month,publication_day,publication_year,coauthors_count,author_first_name,author_middle_initial,author_surname,author_name_ext,author_email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $statement->bind_param('isssssssiiiisssss', $insertedId, $_POST['dropdownResourceType'], $_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'], $_POST['textFieldResearchTitle'], $_POST['textareaAbstract'], $comma_separated_fields, $_POST['textareaKeywords'], $_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'], $_POST['dropdownCoAuthors'], $_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'], $_POST['textFieldAuthorLastName'], $_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail']);
                        $statement->execute();
                        $statement->close();

                        $connection->commit();

                        move_uploaded_file($fileTempLoc, $fileDestination);
                        move_uploaded_file($fileQuestionnaireTempLoc, $fileQuestionDestination);

                        $arr = array('response' => "success");
                        header('Content-Type: application/json');
                        echo json_encode($arr);

                        sendMail();
                    } catch (mysqli_sql_exception $exception) {
                        $connection->rollback();

                        echo json_encode("error");
                    }
                }
            } else {
                // echo "File size is too large";
                $arr = array('response' => "size_error");
                header('Content-Type: application/json');
                echo json_encode($arr);
            }
        } else {
            // echo "There was an error uploading your file";
            $arr = array('response' => "generic_error");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    } else {
        // echo "You cannot upload files of this type";
        $arr = array('response' => "type_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
    exit();
}
