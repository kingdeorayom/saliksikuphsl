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

$connection->begin_transaction();
try{
    $statement = $connection->prepare("INSERT INTO researcher_profile (name,type,department,highest_edu_attainment,research_interest) VALUES(?,?,?,?,?)");
    $statement->bind_param("sssss",$_POST['textFieldResearcherName'],$_POST['researcherType'],$_POST['researcherDepartment'],$_POST['textFieldEducationalAttainment'],$_POST['textFieldResearchInterest']);
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
    $connection->commit();
    $arr = array('response' => "success");
    header('Content-Type: application/json');
    echo json_encode($arr);
}catch(mysqli_sql_exception $exception){
    $connection->rollback();
}
?>