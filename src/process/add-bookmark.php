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
        $statement = $connection->prepare("SELECT * FROM user_bookmarks WHERE user_id = ?");
        $statement->bind_param("i", $_SESSION["userid"]);
        $statement->execute();
        $result = $statement->get_result();
        $bookmarks = $result->fetch_all(MYSQLI_ASSOC);
        $statement->close();
        
    }catch(mysqli_sql_exception $exception){
        $connection->rollback();

        echo $exception;
    }
}