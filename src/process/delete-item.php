<?php

session_start();

include '../../includes/connection.php';

if($_SESSION['userType']!='admin') {
    header("location: /home.php");
    die();
}

if(!isset($_GET['id'])){
    header("location: /home.php");
    die();
}

$statement = $connection->prepare("SELECT * FROM file_information AS fi WHERE fi.file_id = ?");
$statement->bind_param("i",$_GET['id']);
$statement->execute();
$result = $statement->get_result();
$fileInfo =$result->fetch_assoc();
$statement->close();

$connection->begin_transaction();

try{
$statement = $connection->prepare("DELETE
fi, ri, ii, ji, rp, ci
FROM file_information AS fi
LEFT JOIN research_information AS ri ON ri.file_ref_id = fi.file_id
LEFT JOIN infographic_information AS ii ON ii.file_ref_id = fi.file_id
LEFT JOIN journal_information AS ji ON ji.file_ref_id = fi.file_id
LEFT JOIN reports_information AS rp ON rp.file_ref_id = fi.file_id
LEFT JOIN coauthors_information AS ci ON ci.group_id = fi.coauthor_group_id
WHERE fi.file_id = ?");
$statement->bind_param("i",$_GET['id']);
$statement->execute();
$statement->close();


// $deleteFile1 = true;
// $deleteFile2 = true;

// $file1_not_empty = !empty($fileInfo['file_dir']);
// $file1_not_exists = !file_exists("../".$fileInfo['file_dir']);

// $file2_not_empty = !empty($fileInfo['file_dir2']);
// $file2_not_exists = !file_exists("../".$fileInfo['file_dir2']);

// var_dump($file1_not_exists);


// if($file1_not_empty && $file1_not_exists){
//     $deleteFile1 = true;
// }
// if($file2_not_empty && $file2_not_exists){
//     $deleteFile2 = true;
// }

// // echo json_encode($deleteFile1);
// var_dump($deleteFile1);
// var_dump($deleteFile2);

// if($deleteFile1 && $deleteFile2){

@unlink("../".$fileInfo['file_dir']);
@unlink("../".$fileInfo['file_dir2']);

//     echo 'succes';
// }
// else{
//     $_SESSION['deleteFail'] = true;
//     // header("Location: /admin/submissions/view.php?id={$_GET['id']}");
//     exit();
// }



$connection->commit();
$_SESSION['deleteSuccess'] = true;
header("Location: /admin/submissions.php");
exit();
}
catch(mysqli_sql_exception $exception){

$connection->rollback();
header("Location: /admin/submissions/view.php?id={$_GET['id']}");
exit();

}