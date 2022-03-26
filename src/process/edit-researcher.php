<?php

session_start();

include 'connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if(!isset($_GET['id'])){
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

print_r($_POST);

$file = $_FILES['researcherImage'];
$fileName = $file['name'];
$fileSize = $file['size'];
$fileTempLoc = $file['tmp_name'];
$fileError = $file['error'];
//extension
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('png','jpg','jpeg','svg');

if($file['error']===0){
    if (in_array($fileActualExt, $allowed)){
        $statement = $connection->prepare("SELECT researcher_image from researcher_profile WHERE researcher_id = ?");
        $statement -> bind_param("i",$_GET['id']);
        $statement->execute();
        $result = $statement->get_result();
        $file_dir = $result->fetch_row();
        $statement->close();
        move_uploaded_file($fileTempLoc,$file_dir[0]);
        // replace existing image with new image
    }
}
$connection->begin_transaction();

try{
    $statement = $connection->prepare("UPDATE researcher_profile SET name = ?, type = ?, department = ?, highest_edu_attainment = ?, research_interest = ? WHERE researcher_id = ?");
    $statement -> bind_param("sssssi",$_POST['textFieldResearcherName'],$_POST['researcherType'],$_POST['researcherDepartment'],$_POST['textFieldEducationalAttainment'],$_POST['textFieldResearchInterest'],$_GET['id']);
    $statement->execute();
    $statement->close();
    $connection->commit();

    echo 'succes';
}catch(mysqli_sql_exception $exception){
    $connection->rollback();
    echo $exception;
}

?>