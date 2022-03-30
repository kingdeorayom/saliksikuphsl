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

if(isset($_POST['researchTitle'])){
    $connection->begin_transaction();
    try{
        $statement = $connection->prepare("DELETE FROM researcher_works WHERE researcher_ref_id = ?");
        $statement->bind_param("i",$_GET['id']);
        $statement->execute();
        $statement->close();
        
        $statement = $connection->prepare("INSERT INTO researcher_works (researcher_ref_id,research_title,research_link) VALUES(?,?,?)");
        foreach ($_POST['researchTitle'] as $key => $value) {
            $statement->bind_param("iss",$_GET['id'],$_POST['researchTitle'][$key],$_POST['researchLink'][$key]);
            $statement->execute();
        }
        $statement->close();
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
    
}

?>