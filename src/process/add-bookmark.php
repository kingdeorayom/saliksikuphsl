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

if(!isset($_GET['id']) || empty($_GET['id'])){
    die();
}
else{
    $connection->begin_transaction();
    try{
        $statement = $connection->prepare("INSERT INTO user_bookmarks (user_id,ref_id) VALUES (?,?)");
        $statement->bind_param("ii", $_SESSION["userid"],$_GET['id']);
        $statement->execute();
        $statement->close();

        $connection->commit();

        $arr = array('response' => "success");
        header('Content-Type: application/json');
        echo json_encode($arr);
        
    }catch(mysqli_sql_exception $exception){
        $connection->rollback();

        $arr = array('response' => "error");
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
}