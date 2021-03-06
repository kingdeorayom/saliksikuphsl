<?php
session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo "you do not have access to this!";
    }
    else{

        $id = $_POST['fileId'];
        $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
        $statement->execute();
        $result = $statement->get_result();
        
        $file = $result->fetch_assoc();
        $statement->close();

        if($file['file_type']==="thesis"){
            $connection -> begin_transaction();
            try{
                if(isset($_POST["needsRevision"])){
                    $statement = $connection->prepare("UPDATE `file_information` SET status='for revision', feedback = ? WHERE file_id = ?");
                    $statement->bind_param("si",$_POST['textAreaFeedbackThesis'],$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
                }
                else{
                    $statement = $connection->prepare("UPDATE `file_information` SET status='published', feedback = '' WHERE file_id = ?");
                    $statement->bind_param("i",$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
                }
                $comma_separated_fields = implode(', ',$_POST['researchFields']);
                $statement = $connection->prepare("UPDATE research_information SET resource_type= ?,researchers_category=?,research_unit=?,research_title=?,research_abstract=?,research_fields=?,keywords=?,publication_month=?,publication_day=?,publication_year = ?, coauthors_count=?,author_first_name = ?,author_middle_initial = ?, author_surname = ?, author_name_ext = ?, author_email = ? WHERE file_ref_id = ?");
                $statement->bind_param("sssssssiiiisssssi",$_POST['dropdownResourceType'],$_POST['dropdownResearchersCategory'],$_POST['dropdownResearchUnit'],$_POST['textFieldResearchTitle'],$_POST['textareaAbstract'],$comma_separated_fields,$_POST['textareaKeywords'],$_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],$_POST['dropdownPublicationYear'],$_POST['dropdownCoAuthors'],$_POST['textFieldAuthorFirstName'],$_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'],$_POST['textFieldEmail'],$_POST['fileId']);
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
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                echo json_encode("error");
            }
            
        }
        else if($file['file_type']==="journal"){
            $connection -> begin_transaction();
            try{
                if(isset($_POST["needsRevision"])){
                    $statement = $connection->prepare("UPDATE `file_information` SET status='for revision', feedback = ? WHERE file_id = ?");
                    $statement->bind_param("si",$_POST['textAreaFeedbackJournal'],$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
                }
                else{
                    $statement = $connection->prepare("UPDATE `file_information` SET status='published', feedback = '' WHERE file_id = ?");
                    $statement->bind_param("i",$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
                }
                $statement = $connection->prepare("UPDATE journal_information SET journal_title= ?,journal_subtitle=?,department=?,volume_number=?,serial_issue_number=?,ISSN=?,journal_description=?,chief_editor_first_name=?,chief_editor_middle_initial=?,chief_editor_last_name = ?, chief_editor_name_ext=?,chief_editor_email = ? WHERE file_ref_id = ?");
                $statement->bind_param("sssiissssssss",$_POST["textFieldJournalTitle"],$_POST["textFieldJournalSubTitle"],$_POST["dropdownDepartment"],$_POST["textFieldVolumeNumber"],$_POST["textFieldSerialIssueNumber"],$_POST["textFieldISSN"],$_POST["textAreaDescription"],$_POST["textFieldChiefEditorFirstName"],$_POST["textFieldChiefEditorMiddleInitial"],$_POST["textFieldChiefEditorLastName"],$_POST["textFieldChiefEditorNameExtension"],$_POST["textFieldEmail"],$_POST['fileId']);
                $statement->execute();
                
                $connection->commit();

                $arr = array('response'=>"success");
                header('Content-Type: application/json');
                echo json_encode($arr);
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                echo json_encode("error");
            }
        }

        else if($file['file_type']==="infographic"){
            $connection -> begin_transaction();
            try{
                if(isset($_POST["needsRevision"])){
                    $statement = $connection->prepare("UPDATE `file_information` SET status='for revision', feedback = ? WHERE file_id = ?");
                    $statement->bind_param("si",$_POST['textAreaFeedbackInfographics'],$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
               }
               else{
                    $statement = $connection->prepare("UPDATE `file_information` SET status='published', feedback = '' WHERE file_id = ?");
                    $statement->bind_param("i",$_POST['fileId']);
                    $statement->execute();
                    $statement->close();
               }
                $statement = $connection->prepare("UPDATE `infographic_information` SET infographic_research_unit = ?,infographic_researcher_category = ?,infographic_publication_month = ?,infographic_publication_day = ?,infographic_publication_year = ?,infographic_title = ?, infographic_description = ?, author_first_name = ?, author_middle_initial = ?, author_surname =?,author_ext =?, author_email = ?,editor_first_name =?, editor_middle_initial =?, editor_surname=?,editor_ext=?, editor_email=?,coauthors_count=? WHERE file_ref_id = ?");
                $statement->bind_param("ssiiissssssssssssii",$_POST['dropdownResearchUnit'],$_POST['dropdownResearchersCategory'],$_POST['dropdownPublicationMonth'],$_POST['dropdownPublicationDay'],$_POST['dropdownPublicationYear'],$_POST['textFieldInfographicsTitle'],$_POST['textareaDescription'],$_POST['textFieldAuthorFirstName'],$_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'],$_POST['textFieldEmail'],$_POST['textFieldGraphicsEditorFirstName'],$_POST['textFieldGraphicsEditorMiddleInitial'],$_POST['textFieldGraphicsEditorLastName'],$_POST['textFieldGraphicsEditorNameExtension'],$_POST['textFieldGraphicsEditorEmail'],$_POST['dropdownCoAuthors'],$_POST['fileId']);
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
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                echo json_encode("error");
            }
        }

    }
}
?>