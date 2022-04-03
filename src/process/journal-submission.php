<?php
session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

// hindi naman matatawag to? tanggalin nalang
if (empty($_POST['textFieldJournalTitle'] && $_POST['textFieldChiefEditorFirstName'])) {
    $_SESSION['emptyInput'] = "Invalid input. Fill up all fields.";
    header("location: ../pages/navigation/submission-forms.php");
    exit();
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

if(isset($_POST['dropdownDepartment'])){
    if(!in_array($_POST['dropdownDepartment'],$department_list_values)){
        $arr = array('response' => "input_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}

if (isset($_POST['textFieldJournalTitle'], $_POST['textFieldJournalSubTitle'], $_POST['dropdownDepartment'], $_POST['textFieldVolumeNumber'], $_POST['textFieldSerialIssueNumber'], $_POST['textFieldISSN'], $_POST['textFieldChiefEditorFirstName'], $_POST['textFieldChiefEditorMiddleInitial'], $_POST['textFieldChiefEditorLastName'], $_POST['textFieldChiefEditorNameExtension'], $_POST['textFieldEmail'], $_POST['textAreaDescription'], $_FILES['journalCoverFile'], $_FILES['journalFile'])) {

    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];

    $fileCover = $_FILES['journalCoverFile'];
    $fileCoverName = $fileCover['name'];
    $fileCoverSize = $fileCover['size'];
    $fileCoverTempLoc = $fileCover['tmp_name'];
    $fileCoverError = $fileCover['error'];

    $fileCoverExt = explode('.', $fileCoverName);
    $fileCoverActualExt = strtolower(end($fileCoverExt));
    $allowedCover = array('png', 'jpg', 'jpeg');

    $file = $_FILES['journalFile'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowedFile = array('pdf');

    if (in_array($fileActualExt, $allowedFile) && in_array($fileCoverActualExt, $allowedCover)) {
        if ($fileError === 0 && $fileCoverError === 0) {
            if ($fileSize < 5000000 && $fileCoverSize < 5000000) {
                $sql = "SELECT file_name FROM file_information WHERE file_name = '$fileName'";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // echo 'there is already a file with the same name uploaded to the database';
                    $connection->close();
                    $arr = array('response'=>"duplicate_error");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                    exit();
                } else {
                    $filenameUnique = uniqid('', true);

                    $newFileCover =  $filenameUnique . "." . $fileCoverActualExt;
                    $fileCoverDestination = 'uploads/journals/' . $newFileCover;

                    $newFile =  $filenameUnique . "." . $fileActualExt;
                    $fileDestination = 'uploads/journals/' . $newFile;

                    $connection->begin_transaction();
                    try{
                        $fileStatus = "published"; //only admin can access this so we can direct publish it instead
                        $fileType = "journal";
                        

                        $submitted = date('Y-m-d H:i:s');
                        $published_on = date("Y-m-d H:i:s");

                        $statement = $connection->prepare('INSERT INTO file_information(user_id,file_type, file_name, file_name2, file_dir, file_dir2, file_uploader, status, submitted_on,published_on) VALUES(?,?,?,?,?,?,?,?,?,?)');
                        $statement->bind_param('isssssssss', $userId, $fileType, $fileName,$fileCoverName, $fileDestination,$fileCoverDestination, $userName, $fileStatus, $submitted,$published_on);
                        $statement->execute();
                        $insertedId = $statement->insert_id;
                        $statement->close();
    
                        
                        $statement = $connection->prepare('INSERT INTO journal_information(file_ref_id, journal_title, journal_subtitle, department, volume_number, serial_issue_number, ISSN, journal_description, chief_editor_first_name, chief_editor_middle_initial, chief_editor_last_name, chief_editor_name_ext ,chief_editor_email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');
                        $statement->bind_param('isssiisssssss', $insertedId, $_POST['textFieldJournalTitle'], $_POST['textFieldJournalSubTitle'], $_POST['dropdownDepartment'], $_POST['textFieldVolumeNumber'], $_POST['textFieldSerialIssueNumber'], $_POST['textFieldISSN'], $_POST['textAreaDescription'], $_POST['textFieldChiefEditorFirstName'], $_POST['textFieldChiefEditorMiddleInitial'], $_POST['textFieldChiefEditorLastName'], $_POST['textFieldChiefEditorNameExtension'], $_POST['textFieldEmail']);
                        $statement->execute();
                        $statement->close();
                        
                        
                        
    
                        move_uploaded_file($fileCoverTempLoc, "../".$fileCoverDestination);
                        move_uploaded_file($fileTempLoc, "../".$fileDestination);

                        $connection->commit();
    
                        $arr = array('response'=>"success");
                        header('Content-Type: application/json');
                        echo json_encode($arr);
                        exit();
                    }
                    catch(mysqli_sql_exception $exception){
                        $connection->rollback();
        
                        echo json_encode("error");
                    }
                }
            } else {
                // echo "File size is too large";
                $arr = array('response'=>"size_error");
                header('Content-Type: application/json');
                echo json_encode($arr);
            }
        } else {
            // echo "There was an error uploading your file";
            $arr = array('response'=>"generic_error");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    } else {
        // echo "You cannot upload files of this type";
        $arr = array('response'=>"type_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
}
