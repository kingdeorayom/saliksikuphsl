<?php

session_start();

include 'connection.php';

if (!isset($_SESSION['email'])) {
    header("location: ../../index.php");
    exit();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if (empty($_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    $arr = array('response' => "empty_fields");
    header('Content-Type: application/json');
    echo json_encode($arr);
    exit();
} else if (!empty($_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    if ($_POST['textFieldPassword'] !== $_POST['textFieldConfirmPassword']) {
        $arr = array('response' => "password_mismatch");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}

if ($statement = $connection->prepare('UPDATE users SET password = ? WHERE email = ?')) {
    $_SESSION['password'] = password_hash($_POST['textFieldPassword'], PASSWORD_DEFAULT);
    $statement->bind_param('ss', $_SESSION['password'], $_SESSION['email']);
    $statement->execute();

    $_SESSION['passwordResetSuccessful'] = "Password changed successfully";

    unset($_SESSION['email']);
    unset($_SESSION['toVerifyPasswordReset']);
    unset($_SESSION['resetPassword']);
    unset($_SESSION['password']);
    unset($_SESSION['verificationCode']);
    unset($_SESSION['incorrectVerificationCode']);

    $arr = array('response' => "login_success");
    header('Content-Type: application/json');
    echo json_encode($arr);
} else {
    echo 'Could not prepare statement';
}

$connection->close();
