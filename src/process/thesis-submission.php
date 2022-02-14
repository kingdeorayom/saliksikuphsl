<?php 
session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

//for debugging only, should be removed
// $allRequiredFields = array($_POST['dropdownResourceType'],
//  $_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'],
//   $_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],
//   $_POST['dropdownPublicationYear'],$_POST['textFieldResearchTitle'],
//    $_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'],
//     $_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail'],$_POST['dropdownCoAuthors'],
//       $_POST['textareaAbstract'], $_POST['textareaKeywords'],
//        $_POST['researchFields'], $_FILES['fileSubmit']);

// $nonrequiredFields = array($_POST['textFieldFirstNameCoAuthor1'], $_POST['textFieldMiddleInitialCoAuthor1'],
// $_POST['textFieldLastNameCoAuthor1'],$_POST['textFieldNameExtCoAuthor1'], $_POST['textFieldEmailAuthor1'],
// $_POST['textFieldFirstNameCoAuthor2'], $_POST['textFieldMiddleInitialCoAuthor2'],
// $_POST['textFieldLastNameCoAuthor2'],$_POST['textFieldNameExtCoAuthor2'], $_POST['textFieldEmailAuthor2'],
// $_POST['textFieldFirstNameCoAuthor3'], $_POST['textFieldMiddleInitialCoAuthor3'],
// $_POST['textFieldLastNameCoAuthor3'],$_POST['textFieldNameExtCoAuthor3'], $_POST['textFieldEmailAuthor3'],
// $_POST['textFieldFirstNameCoAuthor4'], $_POST['textFieldMiddleInitialCoAuthor4'],
// $_POST['textFieldLastNameCoAuthor4'],$_POST['textFieldNameExtCoAuthor4'], $_POST['textFieldEmailAuthor4'],);


if(isset($_POST['dropdownResourceType'],$_POST['dropdownResearchersCategory'], $_POST['dropdownResearchUnit'],$_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],$_POST['dropdownPublicationYear'],$_POST['textFieldResearchTitle'],$_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail'],$_POST['dropdownCoAuthors'],$_POST['textareaAbstract'], $_POST['textareaKeywords'],$_POST['researchFields'], $_FILES['fileSubmit'])){
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];


    $file = $_FILES['fileSubmit'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    //extension
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf');


    //Questionnaire
    $fileQuestionnaire = $_FILES['fileQuestionnaire'];
    $fileQuestionnaireName = $fileQuestionnaire['name'];
    $fileQuestionnaireSize = $fileQuestionnaire['size'];
    $fileQuestionnaireTempLoc = $fileQuestionnaire['tmp_name'];
    $fileQuestionnaireError = $fileQuestionnaire['error'];

    //questionExtension
    $fileQuestionnaireExt = explode('.',$fileQuestionnaireName);
    $fileQuestionnaireActualExt = strtolower(end($fileQuestionnaireExt));
    $questionnaireAllowed = array('pdf');

    

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 5000000){
                $sql = "SELECT file_name FROM file_information WHERE file_name = '$fileName'";
                $result = mysqli_query($connection,$sql);
                if (mysqli_num_rows($result)>0){
                    // echo 'there is already a file with the same name uploaded to the database';
                    $connection->close();
                    $arr = array('response'=>"duplicate_error");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                    exit();
                }
                else{ //TODO: if first prepared statement fails, should not do 2nd prepared statement
                    $filenameUnique = uniqid('', true);

                    $fileNameNew = $filenameUnique.".".$fileActualExt;
                    $fileDestination = '../uploads/theses/'.$fileNameNew;

                    $fileNameQuestionNew = $filenameUnique."-questionnaire.".$fileQuestionnaireActualExt;
                    $fileQuestionDestination = '../uploads/theses/questionnaires/'.$fileNameQuestionNew;
                    
                    $fileStatus = "pending";
                    $fileType = "thesis";
                    $statement = $connection ->prepare('INSERT INTO file_information(user_id, file_type, file_name, file_dir, file_uploader, status) VALUES(?,?,?,?,?,?)');
                    $statement -> bind_param('isssss',$userId,$fileType,$fileName,$fileDestination,$userName,$fileStatus);
                    $statement -> execute();
                    $insertedId = $statement ->insert_id;
                

                    $statement ->close();
                    // echo 'file upload success!';
                    

                    //coauthors group table
                    $statement = $connection->prepare("INSERT INTO coauthors_information(coauthor1_first_name,coauthor1_middle_initial,coauthor1_surname,coauthor1_name_ext,coauthor1_email,coauthor2_first_name,coauthor2_middle_initial,coauthor2_surname,coauthor2_name_ext,coauthor2_email,coauthor3_first_name,coauthor3_middle_initial,coauthor3_surname,coauthor3_name_ext,coauthor3_email,coauthor4_first_name,coauthor4_middle_initial,coauthor4_surname,coauthor4_name_ext,coauthor4_email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $statement -> bind_param('ssssssssssssssssssss',$_POST['textFieldFirstNameCoAuthor1'], $_POST['textFieldMiddleInitialCoAuthor1'],$_POST['textFieldLastNameCoAuthor1'],$_POST['textFieldNameExtCoAuthor1'], $_POST['textFieldEmailAuthor1'],$_POST['textFieldFirstNameCoAuthor2'], $_POST['textFieldMiddleInitialCoAuthor2'],$_POST['textFieldLastNameCoAuthor2'],$_POST['textFieldNameExtCoAuthor2'], $_POST['textFieldEmailAuthor2'],$_POST['textFieldFirstNameCoAuthor3'], $_POST['textFieldMiddleInitialCoAuthor3'],$_POST['textFieldLastNameCoAuthor3'],$_POST['textFieldNameExtCoAuthor3'], $_POST['textFieldEmailAuthor3'],$_POST['textFieldFirstNameCoAuthor4'], $_POST['textFieldMiddleInitialCoAuthor4'],$_POST['textFieldLastNameCoAuthor4'],$_POST['textFieldNameExtCoAuthor4'], $_POST['textFieldEmailAuthor4']);
                    $statement -> execute();
                    $coauthorsInsertedId = $statement ->insert_id;
                    $statement ->close();


                    //concatenate all selected values
                    $comma_separated_fields = implode(', ',$_POST['researchFields']);
                    
                    $statement = $connection->prepare("INSERT INTO research_information(file_ref_id,resource_type,researchers_category,research_unit,research_title,research_abstract,research_fields,keywords,publication_month,publication_day,publication_year,coauthors_count,author_first_name,author_middle_initial,author_surname,author_name_ext,author_email,coauthor_group_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    $statement -> bind_param('isssssssiiiisssssi',$insertedId,$_POST['dropdownResourceType'],$_POST['dropdownResearchersCategory'],$_POST['dropdownResearchUnit'],$_POST['textFieldResearchTitle'],$_POST['textareaAbstract'],$comma_separated_fields,$_POST['textareaKeywords'],$_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],$_POST['dropdownPublicationYear'],$_POST['dropdownCoAuthors'],$_POST['textFieldAuthorFirstName'], $_POST['textFieldAuthorMiddleInitial'], $_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'], $_POST['textFieldEmail'],$coauthorsInsertedId);
                    $statement -> execute();

                    $statement ->close();
                    
                    move_uploaded_file($fileTempLoc, $fileDestination);
                    move_uploaded_file($fileQuestionnaireTempLoc, $fileQuestionDestination);


                    $arr = array('response'=>"success");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                }
            }
            else{
                // echo "File size is too large";
                $arr = array('response'=>"size_error");
                header('Content-Type: application/json');
                echo json_encode($arr);
                
            }
        }
        else{
            // echo "There was an error uploading your file";
            $arr = array('response'=>"generic_error");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    }   
    else{
        // echo "You cannot upload files of this type";
        $arr = array('response'=>"type_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
    exit();

}

?>

