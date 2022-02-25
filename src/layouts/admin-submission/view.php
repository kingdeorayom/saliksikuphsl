<?php

use function PHPSTORM_META\type;

session_start();

include '../../process/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "user") {
        echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
        <p style="font-size: 50px; font-weight: bold">Oops!</p>
        <p>Please login as admin to access this page.</p>
        <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
        <br><br><br>
        <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
    </div>';
        die();
    }
}

if (isset($_GET['id'])) {
    $statement = $connection->prepare("SELECT * FROM department_list");
    $statement->execute();
    $result = $statement->get_result(); 
    $department_list=$result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    $statement = $connection->prepare("SELECT * FROM research_fields");
    $statement->execute();
    $result = $statement->get_result(); 
    $research_fields_list=$result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    $id = $_GET['id'];
    $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
    $statement->execute();
    $result = $statement->get_result();
    $file = $result->fetch_assoc();
    $statement->close();
    
    if($file== null){
        die();//file doesnt exist
    }
    else{
        if($file['file_type']==="thesis"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ri.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();
    
            $fileInfo = $result->fetch_assoc();
            $statement->close();
            $researchFieldsArray = array_map('trim',explode(",",$fileInfo['research_fields']));
        }
        else if($file['file_type']==="journal"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN journal_information as ji ON ji.file_ref_id=fi.file_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();
            
            $fileInfo = $result->fetch_assoc();
            $statement->close();
        }
        else if($file['file_type']==="infographic"){
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN infographic_information as ii ON ii.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON ii.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();
            
            $fileInfo = $result->fetch_assoc();
            $statement->close();
        }
    }
} else {
    die();//GET['id'] is not defined;
} 

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Approval</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../scripts/custom/coauthors-dropdown.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/submission-forms-style.css" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>
    <section class="submit-research" style="font-family: 'Roboto';">
        <div class="container p-5">
                <?php
                if($fileInfo['status']=='published'){
                    if ($fileInfo['file_type']=='thesis') {
                        include_once './view-published-forms/thesisDissertationPanel.php';
                    } 
                    else if($fileInfo['file_type']=='journal'){
                        include_once './view-published-forms/researchJournalPanel.php';
                    }
                    else if($fileInfo['file_type']=='infographic'){
                        include_once './view-published-forms/infographicsPanel.php';
                    }
                }
                else if($fileInfo['status']=='revised'){
                    
                }
                ?>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script src="../../../scripts/custom/feedback-control.js"></script>
</body>

</html>