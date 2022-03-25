<?php

session_start();

include 'connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$file = $_FILES['researcherImage'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTempLoc = $file['tmp_name'];
    $fileError = $file['error'];
    //extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png','jpg','jpeg','svg');
    $fileNameNew = uniqid('image', true) . "." . $fileActualExt;
    $fileDestination = '../uploads/researcher_image/' . $fileNameNew;
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $connection->begin_transaction();
            try{
                $statement = $connection->prepare("INSERT INTO researcher_profile (name,type,department,highest_edu_attainment,research_interest,researcher_image) VALUES(?,?,?,?,?,?)");
                $statement->bind_param("ssssss",$_POST['textFieldResearcherName'],$_POST['researcherType'],$_POST['researcherDepartment'],$_POST['textFieldEducationalAttainment'],$_POST['textFieldResearchInterest'],$fileDestination);
                $statement->execute();
                $insertedId = $statement->insert_id;
                $statement->close();
                
                if(isset($_POST['researchTitle'])){
                    $statement = $connection->prepare("INSERT INTO researcher_works (researcher_ref_id,research_title,research_link) VALUES(?,?,?)");
                    foreach ($_POST['researchTitle'] as $key => $value) {
                        $statement->bind_param("iss",$insertedId,$_POST['researchTitle'][$key],$_POST['researchLink'][$key]);
                        $statement->execute();
                        
                    }
                    $statement->close();
                }
                move_uploaded_file($fileTempLoc, $fileDestination);
                $connection->commit();
                $arr = array('response' => "success");
                header('Content-Type: application/json');
                echo json_encode($arr);
            }catch(mysqli_sql_exception $exception){
                $connection->rollback();
            }
        }
        else{
            // file error
        }
    }
    else{
        // file type mismatch
    }

?>