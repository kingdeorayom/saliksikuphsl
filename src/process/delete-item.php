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