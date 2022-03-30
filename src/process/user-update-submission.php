<?php
session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if(!isset($_GET['id'])){
    die();
}
$statement = $connection->prepare("SELECT user_id,file_dir,file_dir2 FROM file_information WHERE file_id = ?");
$statement ->bind_param("i",$_GET['id']);
$statement ->execute();
$result =$statement->get_result();
$fileInfo = $result->fetch_assoc();

$statement->close();

print_r($fileInfo);
if($_SESSION['userid']!=$fileInfo['user_id']){
    echo 'not fileInfo';
    die();
}
else{
    $connection->begin_transaction();
    try{
        $file = $_FILES['fileSubmit'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTempLoc = $file['tmp_name'];
        $fileError = $file['error'];
        
        if($fileError == 0){
            $statement = $connection->prepare("UPDATE `file_information` SET file_name = ? WHERE file_id = ?");
            $statement->bind_param("si",$fileName,$_GET['id']);
            $statement->execute();
            $statement->close();
            move_uploaded_file($fileTempLoc,$fileInfo['file_dir']);
        }
        $fileQuestionnaire = $_FILES['fileQuestionnaire'];
        $fileQuestionnaireName = $fileQuestionnaire['name'];
        $fileQuestionnaireSize = $fileQuestionnaire['size'];
        $fileQuestionnaireTempLoc = $fileQuestionnaire['tmp_name'];
        $fileQuestionnaireError = $fileQuestionnaire['error'];

        if($fileQuestionnaireError == 0){
            $statement = $connection->prepare("UPDATE `file_information` SET file_name2 = ? WHERE file_id = ?");
            $statement->bind_param("si",$fileQuestionnaireName,$_GET['id']);
            $statement->execute();
            $statement->close();
            move_uploaded_file($fileQuestionnaireTempLoc,$fileInfo['file_dir2']);
        }

        $fileStatus = 'pending';

        $statement = $connection->prepare("UPDATE `file_information` SET  status= ? WHERE file_id = ?");
        $statement->bind_param("si",$fileStatus,$_GET['id']);
        $statement->execute();
        $statement->close();

        $comma_separated_fields = implode(', ',$_POST['researchFields']);
        $statement = $connection->prepare("UPDATE research_information SET resource_type= ?,researchers_category=?,research_unit=?,research_title=?,research_abstract=?,research_fields=?,keywords=?,publication_month=?,publication_day=?,publication_year = ?, coauthors_count=?,author_first_name = ?,author_middle_initial = ?, author_surname = ?, author_name_ext = ?, author_email = ? WHERE file_ref_id = ?");
        $statement->bind_param("sssssssiiiisssssi",$_POST['dropdownResourceType'],$_POST['dropdownResearchersCategory'],$_POST['dropdownResearchUnit'],$_POST['textFieldResearchTitle'],$_POST['textareaAbstract'],$comma_separated_fields,$_POST['textareaKeywords'],$_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],$_POST['dropdownPublicationYear'],$_POST['dropdownCoAuthors'],$_POST['textFieldAuthorFirstName'],$_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'],$_POST['textFieldEmail'],$_GET['id']);
        $statement->execute();
        
        $statement->close();

        $statement = $connection->prepare("UPDATE coauthors_information SET coauthor1_first_name = ?, coauthor1_middle_initial = ?, coauthor1_surname = ?, coauthor1_name_ext = ?, coauthor1_email = ?,coauthor2_first_name = ?, coauthor2_middle_initial = ?, coauthor2_surname = ?, coauthor2_name_ext = ?, coauthor2_email = ?,coauthor3_first_name = ?, coauthor3_middle_initial = ?, coauthor3_surname = ?, coauthor3_name_ext = ?, coauthor3_email = ?,coauthor4_first_name = ?, coauthor4_middle_initial = ?, coauthor4_surname = ?, coauthor4_name_ext = ?, coauthor4_email = ? WHERE group_id = ?");
        $statement->bind_param("ssssssssssssssssssssi",$_POST['textFieldFirstNameCoAuthor1'],$_POST['textFieldMiddleInitialCoAuthor1'],$_POST['textFieldLastNameCoAuthor1'],$_POST['textFieldNameExtCoAuthor1'],$_POST['textFieldEmailAuthor1'],$_POST['textFieldFirstNameCoAuthor2'],$_POST['textFieldMiddleInitialCoAuthor2'],$_POST['textFieldLastNameCoAuthor2'],$_POST['textFieldNameExtCoAuthor2'],$_POST['textFieldEmailAuthor2'],$_POST['textFieldFirstNameCoAuthor3'],$_POST['textFieldMiddleInitialCoAuthor3'],$_POST['textFieldLastNameCoAuthor3'],$_POST['textFieldNameExtCoAuthor3'],$_POST['textFieldEmailAuthor3'],$_POST['textFieldFirstNameCoAuthor4'],$_POST['textFieldMiddleInitialCoAuthor4'],$_POST['textFieldLastNameCoAuthor4'],$_POST['textFieldNameExtCoAuthor4'],$_POST['textFieldEmailAuthor4'],$_POST['coauthor_id']);
        $statement->execute();
        $statement->close();
        
        $connection->commit();

        $arr = array('response'=>"success");
        header('Content-Type: application/json');
        echo json_encode($arr);

    }catch(mysqli_sql_exception $exception){
        $connection->rollback();

        $arr = array('response'=>"error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
}

?>