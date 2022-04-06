<?php

session_start();

include './sendmail-submission.php';
include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

// if (!filter_var($_POST['textFieldEmail'], FILTER_VALIDATE_EMAIL) || !filter_var($_POST['textFieldEmailAuthor1'], FILTER_VALIDATE_EMAIL) || !filter_var($_POST['textFieldEmailAuthor2'], FILTER_VALIDATE_EMAIL) || !filter_var($_POST['textFieldEmailAuthor3'], FILTER_VALIDATE_EMAIL) || !filter_var($_POST['textFieldEmailAuthor4'], FILTER_VALIDATE_EMAIL)) {
//     $arr = array('response' => "invalid_email");
//     header('Content-Type: application/json');
//     echo json_encode($arr);
//     exit();
// }

$resourceTypeValues = array("Dissertation","Thesis", "Capstone");
if(isset($_POST['dropdownResourceType'])){
    if(!in_array($_POST['dropdownResourceType'],$resourceTypeValues)){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}

$researchersCategoryValues = array("Undergraduate","Postgraduate", "Faculty", "Non-Teaching Staff","Department Head");
if(isset($_POST['dropdownResearchersCategory'])){
    if(!in_array($_POST['dropdownResearchersCategory'],$researchersCategoryValues)){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}

$statement = $connection->prepare("SELECT name FROM department_list");
$statement->execute();
$result = $statement->get_result();
$department_list = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$department_list_values = array();
foreach ($department_list as $key => $value) {  
    array_push($department_list_values,$value['name']);
}

if(isset($_POST['dropdownResearchUnit'])){
    if(!in_array($_POST['dropdownResearchUnit'],$department_list_values)){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}
if(isset($_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'])){
    if(!is_numeric($_POST['dropdownPublicationMonth'])){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
    if(!is_numeric($_POST['dropdownPublicationDay'])){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
    if(!is_numeric($_POST['dropdownPublicationYear'])){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
    $publication_date = date("Y-m-d", mktime(0,0,0,$_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear']));
}

if(isset($_POST['dropdownCoAuthors'])){
    if(!is_numeric($_POST['dropdownCoAuthors'])){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
    if($_POST['dropdownCoAuthors']<0 || $_POST['dropdownCoAuthors']>4){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}

if (isset($_POST['dropdownResourceType'], $_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'], $_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'], $_POST['textFieldResearchTitle'], $_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'], $_POST['textFieldAuthorLastName'], $_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail'], $_POST['dropdownCoAuthors'], $_POST['textareaAbstract'], $_POST['textareaKeywords'], $_POST['researchFields'], $_FILES['fileSubmit'])) {
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];


    $file = $_FILES['fileSubmit'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    $_SESSION['manuscriptFileNameForEmail'] = $fileName;

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

    $_SESSION['questionnaireFileNameForEmail'] = $fileQuestionnaireName;

    //questionExtension
    $fileQuestionnaireExt = explode('.', $fileQuestionnaireName);
    $fileQuestionnaireActualExt = strtolower(end($fileQuestionnaireExt));
    $questionnaireAllowed = array('pdf');



    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 11000000) {
                $statement = $connection->prepare("SELECT file_name FROM file_information WHERE file_name = ?");
                $statement->bind_param("s",$fileName);
                $statement->execute();
                $result = $statement->get_result();
                $statement->close();
                $files_found = mysqli_num_rows($result);
                if ($files_found > 0) {
                    $connection->close();
                    $arr = array('response' => "duplicate_error");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                    exit();
                } else {
                    $filenameUnique = uniqid('', true);

                    $fileNameNew = $filenameUnique . "." . $fileActualExt;
                    $fileDestination = 'uploads/theses/' . $fileNameNew;

                    $fileNameQuestionNew = $filenameUnique . "-questionnaire." . $fileQuestionnaireActualExt;
                    $fileQuestionDestination = 'uploads/theses/questionnaires/' . $fileNameQuestionNew;
                    
                    $connection->begin_transaction();
                    try {
                        $statement = $connection->prepare("INSERT INTO coauthors_information(coauthor1_first_name,coauthor1_middle_initial,coauthor1_surname,coauthor1_name_ext,coauthor1_email,coauthor2_first_name,coauthor2_middle_initial,coauthor2_surname,coauthor2_name_ext,coauthor2_email,coauthor3_first_name,coauthor3_middle_initial,coauthor3_surname,coauthor3_name_ext,coauthor3_email,coauthor4_first_name,coauthor4_middle_initial,coauthor4_surname,coauthor4_name_ext,coauthor4_email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $statement->bind_param('ssssssssssssssssssss', $_POST['textFieldFirstNameCoAuthor1'], $_POST['textFieldMiddleInitialCoAuthor1'], $_POST['textFieldLastNameCoAuthor1'], $_POST['textFieldNameExtCoAuthor1'], $_POST['textFieldEmailAuthor1'], $_POST['textFieldFirstNameCoAuthor2'], $_POST['textFieldMiddleInitialCoAuthor2'], $_POST['textFieldLastNameCoAuthor2'], $_POST['textFieldNameExtCoAuthor2'], $_POST['textFieldEmailAuthor2'], $_POST['textFieldFirstNameCoAuthor3'], $_POST['textFieldMiddleInitialCoAuthor3'], $_POST['textFieldLastNameCoAuthor3'], $_POST['textFieldNameExtCoAuthor3'], $_POST['textFieldEmailAuthor3'], $_POST['textFieldFirstNameCoAuthor4'], $_POST['textFieldMiddleInitialCoAuthor4'], $_POST['textFieldLastNameCoAuthor4'], $_POST['textFieldNameExtCoAuthor4'], $_POST['textFieldEmailAuthor4']);
                        $statement->execute();
                        $coauthorsInsertedId = $statement->insert_id;
                        $statement->close();

                        if ($_SESSION['userType'] != 'admin') {
                            $fileStatus = "pending";
                        } else {
                            $fileStatus = "published";
                            $published_on = date("Y-m-d H:i:s");
                        }
                        $fileType = "thesis";

                        $submitted = date("Y-m-d H:i:s");
                        
                        $statement = $connection ->prepare('INSERT INTO file_information(user_id, file_type, file_name, file_name2, file_dir, file_dir2, file_uploader, status, coauthor_group_id,submitted_on,published_on) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
                        $statement -> bind_param('isssssssiss',$userId,$fileType,$fileName,$fileQuestionnaireName,$fileDestination,$fileQuestionDestination,$userName,$fileStatus,$coauthorsInsertedId,$submitted,$published_on);
                        $statement -> execute();
                        $insertedId = $statement ->insert_id;
                        $statement ->close();

                        $comma_separated_fields = implode(', ',$_POST['researchFields']);
                        if(!isset($_POST['dropdownCourse'])){
                            $course = '';
                        } else {
                            $course = $_POST['dropdownCourse'];
                        }
                        $statement = $connection->prepare("INSERT INTO research_information(file_ref_id,resource_type,researchers_category,research_unit,research_course,research_title,research_abstract,research_fields,keywords,publication_date,coauthors_count,author_first_name,author_middle_initial,author_surname,author_name_ext,author_email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $statement->bind_param('isssssssssisssss', $insertedId, $_POST['dropdownResourceType'], $_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'], $course, $_POST['textFieldResearchTitle'], $_POST['textareaAbstract'], $comma_separated_fields, $_POST['textareaKeywords'], $publication_date, $_POST['dropdownCoAuthors'], $_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'], $_POST['textFieldAuthorLastName'], $_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail']);
                        $statement->execute();
                        $statement->close();

                        $connection->commit();

                        move_uploaded_file($fileTempLoc, "../".$fileDestination);
                        move_uploaded_file($fileQuestionnaireTempLoc, "../".$fileQuestionDestination);

                        $arr = array('response' => "success");
                        header('Content-Type: application/json');
                        echo json_encode($arr);


                        if ($_SESSION['userType'] === "user") {
                            sendMailSubmit();
                        }

                    } catch (mysqli_sql_exception $exception) {
                        $connection->rollback();

                        $arr = array('response' => "error", 'errorText'=>$exception->getMessage());
                        header('Content-Type: application/json');
                        echo json_encode($arr);
                        exit();
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
