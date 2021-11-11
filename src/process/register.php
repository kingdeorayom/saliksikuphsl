<?php
session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if (!isset($_POST['textFieldFirstName'], $_POST['textFieldLastName'], $_POST['dropdownDeparment'], $_POST['textFieldEmail'], $_POST['textFieldPassword'], $_POST['textFieldConfirmPassword'])) {

    header("location: ../pages/login/registration.php");
    exit();
}

if (empty($_POST['textFieldFirstName'] && $_POST['textFieldLastName'] && $_POST['textFieldEmail'] && $_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    $_SESSION['emptyInput'] = "Invalid input. Fill up all fields.";
    header("location: ../pages/login/registration.php");
    exit();
} else if (!empty($_POST['textFieldFirstName'] && $_POST['textFieldLastName'] && $_POST['textFieldEmail'] && $_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    if ($_POST['textFieldPassword'] !== $_POST['textFieldConfirmPassword']) {
        $_SESSION['mismatchedPassword'] = "Password and confirm password does not match.";
        header("location: ../pages/login/registration.php");
        exit();
    }
}


if (!filter_var($_POST['textFieldEmail'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['invalidEmail'] = "Invalid email.";
    header("location: ../pages/login/registration.php");
    exit();
}

$email = $_POST['textFieldEmail'];
//"~@uphsl\.edu\.ph$~"
if (preg_match("~@uphsl\.edu\.ph$~", $email)) {
    if ($statement = $connection->prepare('SELECT user_id, password FROM users WHERE email = ?')) {
        $statement->bind_param('s', $_POST['textFieldEmail']);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows > 0) {
            $_SESSION['emailExists'] = "Duplicate email.";
            header("location: ../pages/login/registration.php");
        } else {
            $_SESSION['firstname'] = $_POST['textFieldFirstName'];
            $_SESSION['lastname'] = $_POST['textFieldLastName'];
            $_SESSION['department'] = $_POST['dropdownDeparment'];
            $_SESSION['email'] = $_POST['textFieldEmail'];
            $_SESSION['password'] = $_POST['textFieldPassword'];
            $_SESSION['toVerify'] = true;

            header("location: ../pages/login/account-verification.php");
            exit();
        }
        $statement->close();
    } else {
        echo 'Could not prepare statement!';
    }
} else {
    $_SESSION['notSchoolEmail'] = "Not school email.";
    header("location: ../pages/login/registration.php");
    exit();
}

$connection->close();
