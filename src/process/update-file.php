<?php
session_start();

include './sendmail-submission.php';
include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};
print_r($_GET);
if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header('location :/index.php');
        exit();
    }
    else{
        if(!filter_var($_POST['textFieldEmail'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['invalid_email'] = true;
            header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
            exit();
        }
        if(isset($_POST['textFieldEmailAuthor1'])){
            if(!empty($_POST['textFieldEmailAuthor1'])){
                if(!filter_var($_POST['textFieldEmailAuthor1'], FILTER_VALIDATE_EMAIL)){
                    $_SESSION['invalid_email'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }
        }
        if(isset($_POST['textFieldEmailAuthor2'])){
            if(!empty($_POST['textFieldEmailAuthor2'])){
                if(!filter_var($_POST['textFieldEmailAuthor2'], FILTER_VALIDATE_EMAIL)){
                    $ $_SESSION['invalid_email'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }
        }
        if(isset($_POST['textFieldEmailAuthor3'])){
            if(!empty($_POST['textFieldEmailAuthor3'])){
                if(!filter_var($_POST['textFieldEmailAuthor3'], FILTER_VALIDATE_EMAIL)){
                    $_SESSION['invalid_email'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }
        }
        if(isset($_POST['textFieldEmailAuthor4'])){
            if(!empty($_POST['textFieldEmailAuthor4'])){
                if(!filter_var($_POST['textFieldEmailAuthor4'], FILTER_VALIDATE_EMAIL)){
                    $_SESSION['invalid_email'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }
        }

        $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= ?");
        $statement ->bind_param("i",$_GET['id']);
        $statement->execute();
        $result = $statement->get_result();
        
        $file = $result->fetch_assoc();
        $statement->close();
        // checks if it was already published to prevent email when just editing
        $newlyPublished = NULL;
        if($file['status']!=='published'){
            $newlyPublished = true;
        }

        if($file['file_type']==="thesis"){
            $resourceTypeValues = array("Dissertation","Thesis", "Capstone");
            if(isset($_POST['dropdownResourceType'])){
                if(!in_array($_POST['dropdownResourceType'],$resourceTypeValues)){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }

            $researchersCategoryValues = array("Undergraduate","Postgraduate", "Faculty", "Non-Teaching Staff","Department Head");
            if(isset($_POST['dropdownResearchersCategory'])){
                if(!in_array($_POST['dropdownResearchersCategory'],$researchersCategoryValues)){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
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
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
            }
            if(isset($_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'])){
                if(!is_numeric($_POST['dropdownPublicationMonth'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                if(!is_numeric($_POST['dropdownPublicationDay'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                if(!is_numeric($_POST['dropdownPublicationYear'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                $publication_date = date("Y-m-d", mktime(0,0,0,$_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear']));
            }
            $connection -> begin_transaction();
            try{
                if(isset($_POST['file1Shown'])){
                    $fileOneShown = 1;
                }
                else if(!isset($_POST['file1Shown'])){
                    $fileOneShown = 0;
                }
                if(isset($_POST['file2Shown'])){
                    $fileTwoShown = 1;
                }
                else if(!isset($_POST['file2Shown'])){
                    $fileTwoShown = 0;
                }
                $fileStatus = 'published';
                if(isset($_POST["needsRevision"])){
                    $fileStatus = 'for revision';

                    $returned = date('Y-m-d H:i:s');
                    $statement = $connection->prepare("INSERT INTO feedback_log (ref_id, feedback, returned_on) VALUES (?,?,?)");
                    $statement->bind_param("iss",$_GET['id'],$_POST['textAreaFeedbackThesis'],$returned);
                    $statement->execute();
                    $statement->close();
                }
                if($fileStatus == 'published'){
                    $published_on = date('Y-m-d H:i:s');
                }
                    $statement = $connection->prepare("UPDATE `file_information` SET file1_shown = ?, file2_shown = ?, status= ?, published_on = ? WHERE file_id = ?");
                    $statement->bind_param("iissi",$fileOneShown,$fileTwoShown,$fileStatus, $published_on,$_GET['id']);
                    $statement->execute();
                    $statement->close();

                    $comma_separated_fields = implode(', ',$_POST['researchFields']);
                    $statement = $connection->prepare("UPDATE research_information SET resource_type= ?,researchers_category=?,research_unit=?,research_title=?,research_abstract=?,research_fields=?,keywords=?,publication_date = ?, coauthors_count=?,author_first_name = ?,author_middle_initial = ?, author_surname = ?, author_name_ext = ?, author_email = ? WHERE file_ref_id = ?");
                    $statement->bind_param("ssssssssisssssi",$_POST['dropdownResourceType'],$_POST['dropdownResearchersCategory'],$_POST['dropdownResearchUnit'],$_POST['textFieldResearchTitle'],$_POST['textareaAbstract'],$comma_separated_fields,$_POST['textareaKeywords'],$publication_date,$_POST['dropdownCoAuthors'],$_POST['textFieldAuthorFirstName'],$_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'],$_POST['textFieldEmail'],$_GET['id']);
                    $statement->execute();
                    
                    $statement->close();

                    $statement = $connection->prepare("UPDATE coauthors_information SET coauthor1_first_name = ?, coauthor1_middle_initial = ?, coauthor1_surname = ?, coauthor1_name_ext = ?, coauthor1_email = ?,coauthor2_first_name = ?, coauthor2_middle_initial = ?, coauthor2_surname = ?, coauthor2_name_ext = ?, coauthor2_email = ?,coauthor3_first_name = ?, coauthor3_middle_initial = ?, coauthor3_surname = ?, coauthor3_name_ext = ?, coauthor3_email = ?,coauthor4_first_name = ?, coauthor4_middle_initial = ?, coauthor4_surname = ?, coauthor4_name_ext = ?, coauthor4_email = ? WHERE group_id = ?");
                    $statement->bind_param("ssssssssssssssssssssi",$_POST['textFieldFirstNameCoAuthor1'],$_POST['textFieldMiddleInitialCoAuthor1'],$_POST['textFieldLastNameCoAuthor1'],$_POST['textFieldNameExtCoAuthor1'],$_POST['textFieldEmailAuthor1'],$_POST['textFieldFirstNameCoAuthor2'],$_POST['textFieldMiddleInitialCoAuthor2'],$_POST['textFieldLastNameCoAuthor2'],$_POST['textFieldNameExtCoAuthor2'],$_POST['textFieldEmailAuthor2'],$_POST['textFieldFirstNameCoAuthor3'],$_POST['textFieldMiddleInitialCoAuthor3'],$_POST['textFieldLastNameCoAuthor3'],$_POST['textFieldNameExtCoAuthor3'],$_POST['textFieldEmailAuthor3'],$_POST['textFieldFirstNameCoAuthor4'],$_POST['textFieldMiddleInitialCoAuthor4'],$_POST['textFieldLastNameCoAuthor4'],$_POST['textFieldNameExtCoAuthor4'],$_POST['textFieldEmailAuthor4'],$_GET['coauthor_id']);
                    $statement->execute();
                    $statement->close();
                    
                    $connection->commit();
                    $_SESSION['file_updated'] = "published";
                    if(isset($_POST["needsRevision"])){
                        sendMailReturned();
                        $_SESSION['file_updated'] = "for revision";
                    }
                    else if($newlyPublished){
                        sendMailPublished();
                    }
                    
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                   
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                $_SESSION['error'] = true;
                header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                exit();
            }
            
        }
        else if($file['file_type']==="journal"){
            $connection -> begin_transaction();
            try{
                if(isset($_POST['file1Shown'])){
                    $fileOneShown = 1;
                }
                else if(!isset($_POST['file1Shown'])){
                    $fileOneShown = 0;
                }
                if(isset($_POST['file2Shown'])){
                    $fileTwoShown = 1;
                }
                else if(!isset($_POST['file2Shown'])){
                    $fileTwoShown = 0;
                }
                $fileStatus = 'published';
                if(isset($_POST["needsRevision"])){
                    $fileStatus = 'for revision';

                    $returned = date('Y-m-d H:i:s');
                    $statement = $connection->prepare("INSERT INTO feedback_log (ref_id, feedback, returned_on) VALUES (?,?,?)");
                    $statement->bind_param("iss",$_GET['id'],$_POST['textAreaFeedbackJournal'],$returned);
                    $statement->execute();
                    $statement->close();
                }
                if($fileStatus == 'published'){
                    $published_on = date('Y-m-d H:i:s');
                }
                    $statement = $connection->prepare("UPDATE `file_information` SET file1_shown = ?, file2_shown = ?, status= ?, published_on = ? WHERE file_id = ?");
                    $statement->bind_param("iissi",$fileOneShown,$fileTwoShown,$fileStatus,$published_on,$_GET['id']);
                    $statement->execute();
                    $statement->close();
                
                    $statement = $connection->prepare("UPDATE journal_information SET journal_title= ?,journal_subtitle=?,department=?,volume_number=?,serial_issue_number=?,ISSN=?,journal_description=?,chief_editor_first_name=?,chief_editor_middle_initial=?,chief_editor_last_name = ?, chief_editor_name_ext=?,chief_editor_email = ? WHERE file_ref_id = ?");
                    $statement->bind_param("sssiissssssss",$_POST["textFieldJournalTitle"],$_POST["textFieldJournalSubTitle"],$_POST["dropdownDepartment"],$_POST["textFieldVolumeNumber"],$_POST["textFieldSerialIssueNumber"],$_POST["textFieldISSN"],$_POST["textAreaDescription"],$_POST["textFieldChiefEditorFirstName"],$_POST["textFieldChiefEditorMiddleInitial"],$_POST["textFieldChiefEditorLastName"],$_POST["textFieldChiefEditorNameExtension"],$_POST["textFieldEmail"],$_GET['id']);
                    $statement->execute();
                    
                    $connection->commit();
                    $_SESSION['file_updated'] = "published";
                    
                
                    if(isset($_POST["needsRevision"])){
                        sendMailReturned();
                        $_SESSION['file_updated'] = "for revision";

                    }
                    else if($newlyPublished){
                        sendMailPublished();
                    }

                    
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                $_SESSION['error'] = true;
                header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                exit();
            }
        }

        else if($file['file_type']==="infographic"){
            if(isset($_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear'])){
                if(!is_numeric($_POST['dropdownPublicationMonth'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                if(!is_numeric($_POST['dropdownPublicationDay'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                if(!is_numeric($_POST['dropdownPublicationYear'])){
                    $_SESSION['input_error'] = true;
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
                }
                $publication_date = date("Y-m-d", mktime(0,0,0,$_POST['dropdownPublicationMonth'], $_POST['dropdownPublicationDay'], $_POST['dropdownPublicationYear']));
            }
            $connection -> begin_transaction();
            try{
                if(isset($_POST['file1Shown'])){
                    $fileOneShown = 1;
                }
                else if(!isset($_POST['file1Shown'])){
                    $fileOneShown = 0;
                }
                $fileStatus = 'published';
                if(isset($_POST["needsRevision"])){
                    $fileStatus = 'for revision';

                    $returned = date('Y-m-d H:i:s');
                    $statement = $connection->prepare("INSERT INTO feedback_log (ref_id, feedback, returned_on) VALUES (?,?,?)");
                    $statement->bind_param("iss",$_GET['id'],$_POST['textAreaFeedbackInfographics'],$returned);
                    $statement->execute();
                    $statement->close();
                }
                if($fileStatus == 'published'){
                    $published_on = date('Y-m-d H:i:s');
                }

                    $statement = $connection->prepare("UPDATE `file_information` SET file1_shown = ?, status= ?, published_on = ? WHERE file_id = ?");
                    $statement->bind_param("issi",$fileOneShown,$fileStatus,$published_on,$_GET['id']);
                    $statement->execute();
                    $statement->close();
                    $statement = $connection->prepare("UPDATE `infographic_information` SET infographic_publication_date = ?,infographic_title = ?, infographic_description = ?, author_first_name = ?, author_middle_initial = ?, author_surname =?,author_ext =?, author_email = ?,editor_first_name =?, editor_middle_initial =?, editor_surname=?,editor_ext=?, editor_email=?,coauthors_count=? WHERE file_ref_id = ?");
                    $statement->bind_param("sssssssssssssii",$publication_date,$_POST['textFieldInfographicsTitle'],$_POST['textareaDescription'],$_POST['textFieldAuthorFirstName'],$_POST['textFieldAuthorMiddleInitial'],$_POST['textFieldAuthorLastName'],$_POST['textFieldAuthorNameExtension'],$_POST['textFieldEmail'],$_POST['textFieldGraphicsEditorFirstName'],$_POST['textFieldGraphicsEditorMiddleInitial'],$_POST['textFieldGraphicsEditorLastName'],$_POST['textFieldGraphicsEditorNameExtension'],$_POST['textFieldGraphicsEditorEmail'],$_POST['dropdownCoAuthors'],$_GET['id']);
                    $statement->execute();
                    $statement->close();

                    $statement = $connection->prepare("UPDATE coauthors_information SET coauthor1_first_name = ?, coauthor1_middle_initial = ?, coauthor1_surname = ?, coauthor1_name_ext = ?, coauthor1_email = ?,coauthor2_first_name = ?, coauthor2_middle_initial = ?, coauthor2_surname = ?, coauthor2_name_ext = ?, coauthor2_email = ?,coauthor3_first_name = ?, coauthor3_middle_initial = ?, coauthor3_surname = ?, coauthor3_name_ext = ?, coauthor3_email = ?,coauthor4_first_name = ?, coauthor4_middle_initial = ?, coauthor4_surname = ?, coauthor4_name_ext = ?, coauthor4_email = ? WHERE group_id = ?");
                    $statement->bind_param("ssssssssssssssssssssi",$_POST['textFieldFirstNameCoAuthor1'],$_POST['textFieldMiddleInitialCoAuthor1'],$_POST['textFieldLastNameCoAuthor1'],$_POST['textFieldNameExtCoAuthor1'],$_POST['textFieldEmailAuthor1'],$_POST['textFieldFirstNameCoAuthor2'],$_POST['textFieldMiddleInitialCoAuthor2'],$_POST['textFieldLastNameCoAuthor2'],$_POST['textFieldNameExtCoAuthor2'],$_POST['textFieldEmailAuthor2'],$_POST['textFieldFirstNameCoAuthor3'],$_POST['textFieldMiddleInitialCoAuthor3'],$_POST['textFieldLastNameCoAuthor3'],$_POST['textFieldNameExtCoAuthor3'],$_POST['textFieldEmailAuthor3'],$_POST['textFieldFirstNameCoAuthor4'],$_POST['textFieldMiddleInitialCoAuthor4'],$_POST['textFieldLastNameCoAuthor4'],$_POST['textFieldNameExtCoAuthor4'],$_POST['textFieldEmailAuthor4'],$_GET['coauthor_id']);
                    $statement->execute();
                    $statement->close();

                    $connection->commit();

                    $_SESSION['file_updated'] = "published";

                    if(isset($_POST["needsRevision"])){
                        sendMailReturned();
                        $_SESSION['file_updated'] = "for revision";
                    }
                    else if($newlyPublished){
                        sendMailPublished();
                    }

                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                $_SESSION['error'] = true;
                header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                exit();
            }
        }
        else if($file['file_type']==="report"){
            $connection -> begin_transaction();
            try{
                if(isset($_POST['file1Shown'])){
                    $fileOneShown = 1;
                }
                else if(!isset($_POST['file1Shown'])){
                    $fileOneShown = 0;
                }
                if(isset($_POST['file2Shown'])){
                    $fileTwoShown = 1;
                }
                else if(!isset($_POST['file2Shown'])){
                    $fileTwoShown = 0;
                }
                $fileStatus = 'published';
                if(isset($_POST["needsRevision"])){
                    $fileStatus = 'for revision';

                    $returned = date('Y-m-d H:i:s');
                    $statement = $connection->prepare("INSERT INTO feedback_log (ref_id, feedback, returned_on) VALUES (?,?,?)");
                    $statement->bind_param("iss",$_GET['id'],$_POST['textAreaFeedbackJournal'],$returned);
                    $statement->execute();
                    $statement->close();
                }
                if($fileStatus == 'published'){
                    $published_on = date('Y-m-d H:i:s');
                }
                    $statement = $connection->prepare("UPDATE `file_information` SET file1_shown = ?, file2_shown = ?, status= ?, published_on = ? WHERE file_id = ?");
                    $statement->bind_param("iissi",$fileOneShown,$fileTwoShown,$fileStatus,$published_on,$_GET['id']);
                    $statement->execute();
                    $statement->close();
                
                    $statement = $connection->prepare("UPDATE reports_information SET report_type = ?, report_title = ?, report_year = ?, report_description = ? WHERE file_ref_id = ?");
                    $statement->bind_param("ssssi",$_POST["dropdownResourceTypeReports"],$_POST["textFieldReportsTitle"],$_POST["textFieldPublicationYear"],$_POST["textAreaDescription"],$_GET['id']);
                    $statement->execute();
                    
                    $connection->commit();
                    $_SESSION['file_updated'] = "published";

                    if(isset($_POST["needsRevision"])){
                        sendMailReturned();
                        $_SESSION['file_updated'] = "for revision";
                    }
                    else if($newlyPublished){
                        sendMailPublished();
                    }
                    header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                    exit();
            }
            catch(mysqli_sql_exception $exception){
                $connection->rollback();

                $_SESSION['error'] = true;
                header("location: ../../admin/submissions/view.php?id=".$_GET['id']);
                exit();
            }
        }

    }
}
?>