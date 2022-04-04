<?php

session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}
print_r($_POST);

if(isset($_POST['textFieldFirstName'],$_POST['textFieldLastName'],$_POST['dropdownDepartment'])){
//update profile only
$statement = $connection->prepare("UPDATE users SET first_name = ?, last_name = ?, department = ?  WHERE user_id = ?");
$statement->bind_param("sssi",$_POST['textFieldFirstName'],$_POST['textFieldLastName'],$_POST['dropdownDepartment'],$_SESSION['userid']);
if($statement->execute()){
    $statement->close();
    $_SESSION['changedAbout']= true;
    header("Location: /users/profile.php");
    exit();
}
$statement->close();
}