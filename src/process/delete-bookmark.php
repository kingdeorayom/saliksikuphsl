<?php

session_start();

include '../../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
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
        $statement = $connection->prepare("DELETE FROM user_bookmarks WHERE user_id = ? AND ref_id = ?");
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