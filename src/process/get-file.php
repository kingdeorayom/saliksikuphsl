<?php
session_start();


include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};
if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo "you do not have access to this!";
    }
    else{
        $id = $_GET['id'];
        $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
        $statement->execute();
        $result = $statement->get_result();
        
        $file = $result->fetch_assoc();
        $statement->close();
        if($file['file_type']==="thesis"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ri.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();

            $fileInfo = $result->fetch_assoc();
            $statement->close();
            header('Content-Type: application/json');
            echo json_encode($fileInfo);
        }
        else if($file['file_type']==="journal"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN journal_information as ji ON ji.file_ref_id=fi.file_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();
            
            $fileInfo = $result->fetch_assoc();
            $statement->close();
            header('Content-Type: application/json');
            echo json_encode($fileInfo);
        }
        else if($file['file_type']==="infographic"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN infographic_information as ii ON ii.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ii.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();
            
            $fileInfo = $result->fetch_assoc();
            $statement->close();
            header('Content-Type: application/json');
            echo json_encode($fileInfo);
        }
        
    }
}

?>