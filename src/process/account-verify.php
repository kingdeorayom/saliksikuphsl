<?php
session_start();

include '../../includes/connection.php';

if (!isset($_SESSION['toVerifyAccountCreation'])) {
    header("location: ../../index.php");
    exit();
} else {
    $userInputVerification = $_POST['textFieldVerificationCode'];
    $verificationCode = $_SESSION['verificationCode'];

    if ($userInputVerification == $verificationCode) {
        if ($statement = $connection->prepare('INSERT into users (first_name, last_name, department, email, password) VALUES(?, ?, ?, ?, ?)')) {
            $_SESSION['password'] = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
            $statement->bind_param('sssss', $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['department'], $_SESSION['email'], $_SESSION['password']);
            $statement->execute();

            $_SESSION['registrationSuccessful'] = "Data inserted successfully";

            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['department']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['toVerifyAccountCreation']);
            unset($_SESSION['verificationCode']);

            header("location: ../../index.php");
        } else {
            echo 'Could not prepare statement';
        }
    } else {
        $_SESSION['incorrectVerificationCode'] = "Incorrect verification code.";
        header("location: ../pages/login/account-verification.php");
        exit();
    }
}



$connection->close();
