<?php

session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if($_SESSION['userType']!='admin'){
    header("location: ../home.php");
    die();
}
print_r($_POST);

if(isset($_POST['dropdownAccountType'],
$_POST['textFieldFirstName'],
$_POST['textFieldLastName'],
$_POST['textFieldEmail'],
$_POST['dropdownDepartment'],
$_POST['textFieldPassword'],
$_POST['textFieldPasswordConfirm'])){

    if($_POST['textFieldPassword']!=$_POST['textFieldPasswordConfirm']){
        $_SESSION['wrongPasswordAdmin']= true;
        header("location: /admin/profile.php");
        exit();
    }

    if(!filter_var($_POST['textFieldEmail'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['invalidEmailAdmin']= true;
        header("location: /admin/profile.php");
        exit();
    }
    // if (!preg_match("~@uphsl\.edu\.ph$~", $_POST['textFieldEmail'])){
    //     $_SESSION['notSchoolEmail']= true;
    //     header("location: /admin/profile.php");
    //     exit();
    // }
    $statement = $connection->prepare('SELECT user_id FROM users WHERE email = ?');
    $statement->bind_param('s', $_POST['textFieldEmail']);
    $statement->execute();
    $statement->store_result();
    if ($statement->num_rows > 0) {
        $_SESSION['emailExistsAdmin']= true;
        header("location: /admin/profile.php");
        exit();
    }
    $statement->close();
    
    $connection->begin_transaction();
    try{
        $hashPassword = password_hash($_POST['textFieldPassword'], PASSWORD_DEFAULT);
        $statement = $connection->prepare('INSERT into users (first_name, last_name, department, email, password, user_type) VALUES(?, ?, ?, ?, ?, ?)');   
        $statement->bind_param("ssssss",$_POST['textFieldFirstName'],$_POST['textFieldLastName'],$_POST['dropdownDepartment'],$_POST['textFieldEmail'],$hashPassword,$_POST['dropdownAccountType']);
        $statement->execute();
        $statement->close();

        $connection->commit();
        $_SESSION['createAccountSuccess']= true;
        header("location: /admin/profile.php");
        exit();
    }
    catch(mysqli_sql_exception $exception){
        $connection->rollback();
        $_SESSION['databaseErrorAdmin']= true;
        header("location: /admin/profile.php");
        exit();
    }



}





?>