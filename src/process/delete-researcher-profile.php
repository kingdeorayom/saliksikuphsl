<?php

session_start();

include '../../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if($_SESSION['userType']!='admin') {
    die();
}

if(!isset($_GET['id'])){
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};
$statement = $connection->prepare("SELECT researcher_image FROM researcher_profile WHERE researcher_id = ?");
$statement->bind_param("i",$_GET['id']);
$statement->execute();
$result = $statement->get_result();
$image_path = $result->fetch_assoc();
$statement->close();


$connection->begin_transaction();
    try{
        $statement = $connection->prepare("DELETE FROM researcher_works WHERE researcher_ref_id = ?");
        $statement->bind_param("i",$_GET['id']);
        $statement->execute();
        $statement->close();
        
        $statement = $connection->prepare("DELETE FROM researcher_profile WHERE researcher_id = ?");
        $statement->bind_param("i",$_GET['id']);
        $statement->execute();
        $statement->close();

        unlink($image_path['researcher_image']); //DELETES IMAGE

        $connection->commit();
        $arr = array('response' => "success");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }catch(mysqli_sql_exception $exception){
        $connection->rollback();
        $arr = array('response' => "database_error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }