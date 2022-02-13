<?php
session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo "you do not have access to this!";
    }
    else{
        // print_r($_POST);

        $id = $_POST['fileId'];
        $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
        $statement->execute();
        $result = $statement->get_result();
        
        $file = $result->fetch_assoc();
        $statement->close();
        if($file['file_type']==="thesis"){
            echo json_encode("thesis");
            // update here
            $connection -> begin_transaction();
            try{
                
            }
            catch(mysqli_sql_exception $exception){
            $connection->rollback();

            throw $exception;
            }
        }
        else if($file['file_type']==="journal"){
            echo json_encode("journal");
        }

        else if($file['file_type']==="infographic"){
            echo json_encode("infographic");
        }

    }
}
?>