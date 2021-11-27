<?php 
session_start();

include 'connection.php';
$all_required_fields = array($_POST['textFieldJournalTitle'],$_POST['textFieldJournalSubTitle'],$_POST['dropdownDepartment'], $_POST['textFieldVolumeNumber'],
$_POST['textFieldSerialIssueNumber'],$_POST['textFieldISSN'],$_POST['textFieldChiefEditorFirstName'],$_POST['textFieldChiefEditorMiddleInitial'],
$_POST['textFieldChiefEditorLastName'],$_POST['textFieldChiefEditorNameExtension'],$_POST['textFieldEmail'],$_POST['textAreaDescription'],
$_FILES['journalCoverFile'],$_FILES['journalFile']);


if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if(isset($_POST['textFieldJournalTitle'],$_POST['textFieldJournalSubTitle'],$_POST['dropdownDepartment'], $_POST['textFieldVolumeNumber'],$_POST['textFieldSerialIssueNumber'],$_POST['textFieldISSN'],$_POST['textFieldChiefEditorFirstName'],$_POST['textFieldChiefEditorMiddleInitial'],$_POST['textFieldChiefEditorLastName'],$_POST['textFieldChiefEditorNameExtension'],$_POST['textFieldEmail'],$_POST['textAreaDescription'],$_FILES['journalCoverFile'],$_FILES['journalFile'])){

    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];

    $fileCover = $_FILES['journalCoverFile'];
    $fileCoverName = $fileCover['name'];
    $fileCoverSize = $fileCover['size'];
    $fileCoverTempLoc = $fileCover['tmp_name'];
    $fileCoverError = $fileCover['error'];
    
    $fileCoverExt = explode('.',$fileCoverName);
    $fileCoverActualExt = strtolower(end($fileCoverExt));
    $allowedCover = array('png','jpg','jpeg');

    $file = $_FILES['journalFile'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedFile = array('pdf');

    if(in_array($fileActualExt, $allowedFile)&&in_array($fileCoverActualExt,$allowedCover)){
        if($fileError ===0 && $fileCoverError ===0){
            if($fileSize <5000000 && $fileCoverSize <5000000){
                $sql = "SELECT file_name FROM file_information WHERE file_name = '$fileName'";
                $result = mysqli_query($connection,$sql);
                if (mysqli_num_rows($result)>0){
                    echo 'there is already a file with the same name uploaded to the database';
                    $connection->close();
                    exit();
                }
                else{
                    $filenameUnique = uniqid('',true);
                    
                    $newFileCover =  $filenameUnique.".".$fileCoverActualExt;
                    $fileCoverDestination = '../uploads/journals/'.$newFileCover;

                    $newFile =  $filenameUnique.".".$fileActualExt;
                    $fileDestination = '../uploads/journals/'.$newFile;

                    $fileStatus = "pending";
                    $statement = $connection ->prepare('INSERT INTO file_information(user_id, file_name, file_dir, file_uploader, status) VALUES(?,?,?,?,?)');
                    $statement -> bind_param('issss',$userId,$fileName,$fileDestination,$userName,$fileStatus);
                    $statement -> execute();
                    $insertedId = $statement ->insert_id;
                    
                    $statement ->close();
                    echo 'file upload success!';

                    move_uploaded_file($fileCoverTempLoc,$fileCoverDestination);
                    move_uploaded_file($fileTempLoc,$fileDestination);
                    
                    $statement = $connection ->prepare('INSERT INTO journal_information(file_ref_id, journal_title, journal_subtitle, department, volume_number, serial_issue_number, ISSN, journal_description, chief_editor_first_name, chief_editor_middle_initial, chief_editor_last_name, chief_editor_name_ext ,chief_editor_email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
                    $statement -> bind_param('isssiisssssss',$insertedId,$_POST['textFieldJournalTitle'],$_POST['textFieldJournalSubTitle'],$_POST['dropdownDepartment'], $_POST['textFieldVolumeNumber'], $_POST['textFieldSerialIssueNumber'],$_POST['textFieldISSN'],$_POST['textAreaDescription'],$_POST['textFieldChiefEditorFirstName'],$_POST['textFieldChiefEditorMiddleInitial'],$_POST['textFieldChiefEditorLastName'],$_POST['textFieldChiefEditorNameExtension'],$_POST['textFieldEmail']);
                    $statement->execute();

                    $statement ->close();
                    echo 'file upload success!';
                }

            }
            else{
                echo 'file size must not exceed 5000000';
            }
        }
        else{
            echo 'fileError';
        }
    }
    else{
        echo 'filetype not allowed';
    }

}


?>