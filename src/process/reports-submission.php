<?php

session_start();

include '../../includes/connection.php';  


if(isset($_POST['dropdownResourceTypeReports'],$_POST['textFieldReportsTitle'],$_POST['textFieldPublicationYear'],$_POST['textAreaDescription'])){
    $userId = $_SESSION['userid'];
    $userName = $_SESSION['fullName'];

    $fileCover = $_FILES['reportsCoverFile'];
    $fileCoverName = $fileCover['name'];
    $fileCoverSize = $fileCover['size'];
    $fileCoverTempLoc = $fileCover['tmp_name'];
    $fileCoverError = $fileCover['error'];

    $fileCoverExt = explode('.', $fileCoverName);
    $fileCoverActualExt = strtolower(end($fileCoverExt));
    $allowedCover = array('png', 'jpg', 'jpeg');

    $file = $_FILES['reportsFile'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf');

    if (in_array($fileCoverActualExt, $allowedCover) && in_array($fileActualExt, $allowed)){
        if ($fileCoverError === 0 && $fileError === 0) {
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

                $newFileCover = $filenameUnique . "." . $fileCoverActualExt;
                $fileCoverDestination = 'uploads/reports/' . $newFileCover;

                $newFile =  $filenameUnique . "." . $fileActualExt;
                $fileDestination = 'uploads/reports/' . $newFile;
                
                $connection->begin_transaction();
                try{
                    $fileStatus = "published"; //only admin can access this so we can direct publish it instead
                    $fileType = "report";

                    $submitted = date('Y-m-d H:i:s');
                    $published_on = date("Y-m-d H:i:s");

                    $statement = $connection->prepare('INSERT INTO file_information(user_id,file_type, file_name, file_name2, file_dir, file_dir2, file_uploader, status, submitted_on,published_on) VALUES(?,?,?,?,?,?,?,?,?,?)');
                    $statement->bind_param('isssssssss', $userId, $fileType, $fileName,$fileCoverName, $fileDestination,$fileCoverDestination, $userName, $fileStatus, $submitted,$published_on);
                    $statement->execute();
                    $insertedId = $statement->insert_id;
                    $statement->close();

                    $statement = $connection->prepare('INSERT INTO reports_information(file_ref_id, report_type, report_title, report_year, report_description) VALUES(?,?,?,?,?)');
                    $statement->bind_param('issis',$insertedId,$_POST['dropdownResourceTypeReports'],$_POST['textFieldReportsTitle'],$_POST['textFieldPublicationYear'],$_POST['textAreaDescription']);
                    $statement->execute();
                    $statement->close();

                    move_uploaded_file($fileCoverTempLoc, "../".$fileCoverDestination);
                    move_uploaded_file($fileTempLoc, "../".$fileDestination);

                    $connection->commit();
    
                    $arr = array('response'=>"success");
                    header('Content-Type: application/json');
                    echo json_encode($arr);
                    exit();
                    
                }catch(mysqli_sql_exception $exception){
                    $connection->rollback();
        
                    echo json_encode("error");

                }
            }
        }
        else {
            // echo "There was an error uploading your file";
            $arr = array('response'=>"generic_error");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    }
    else {
        // echo "You cannot upload files of this type";
        $arr = array('response'=>"type_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
}
?>