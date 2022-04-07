<?php

session_start();

include '../../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php");
    die();
}

if($_SESSION['userType']!='admin') {
    header("location: ../../home.php");
    die();
}

if(!isset($_GET['id'])){
    header("location: ../../home.php");
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
        $SESSION['deletedResearcher']= true;
        header('Location: ../../researchers.php');
        exit();
    }catch(mysqli_sql_exception $exception){
        $connection->rollback();
        $SESSION['deleteResearcherFail']= true;
        header('Location: ../../researchers/view.php?id='.$_GET['id']);
        exit();
    }