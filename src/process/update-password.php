<?php

session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if(isset($_POST['textFieldCurrentPassword'],$_POST['textFieldNewPassword'])){
// update password
$statement = $connection->prepare("SELECT password FROM users WHERE user_id = ?");
$statement->bind_param("i",$_SESSION['userid']);
$statement->execute();
$result = $statement->get_result();
$current = $result->fetch_assoc();
$statement->close();

    if(password_verify($_POST['textFieldCurrentPassword'],$current['password'])){
        $newPassword = password_hash($_POST['textFieldNewPassword'], PASSWORD_DEFAULT);
        $statement = $connection->prepare("UPDATE users SET password = ?  WHERE user_id = ?");
        $statement->bind_param("si",$newPassword,$_SESSION['userid']);
        if($statement->execute()){
            $statement->close();
            $_SESSION['changedPassword']= true;
            header("Location: /admin/profile.php");
            exit();
        }
    $statement->close();

    }else{
        $_SESSION['wrongPassword']= true;
        header("Location: /admin/profile.php");
        exit();
    }
}

?>