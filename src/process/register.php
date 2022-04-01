<?php
session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if (!isset($_POST['textFieldFirstName'], $_POST['textFieldLastName'], $_POST['dropdownDeparment'], $_POST['textFieldEmail'], $_POST['textFieldPassword'], $_POST['textFieldConfirmPassword'])) {

    header("location: ../pages/login/registration.php");
    exit();
}

if (empty($_POST['textFieldFirstName'] && $_POST['textFieldLastName'] && $_POST['textFieldEmail'] && $_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    $arr = array('response' => "empty_fields");
    header('Content-Type: application/json');
    echo json_encode($arr);
    exit();
} else if (!empty($_POST['textFieldFirstName'] && $_POST['textFieldLastName'] && $_POST['textFieldEmail'] && $_POST['textFieldPassword'] && $_POST['textFieldConfirmPassword'])) {
    if ($_POST['textFieldPassword'] !== $_POST['textFieldConfirmPassword']) {
        $arr = array('response' => "passwords_mismatch");
        header('Content-Type: application/json');
        echo json_encode($arr);
        exit();
    }
}


if (!filter_var($_POST['textFieldEmail'], FILTER_VALIDATE_EMAIL)) {
    $arr = array('response' => "invalid_email");
    header('Content-Type: application/json');
    echo json_encode($arr);
    exit();
}

$email = $_POST['textFieldEmail'];
if (preg_match("~@uphsl\.edu\.ph$~", $email)) {
    if ($statement = $connection->prepare('SELECT user_id, password FROM users WHERE email = ?')) {
        $statement->bind_param('s', $_POST['textFieldEmail']);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows > 0) {
            $arr = array('response' => "email_exists");
            header('Content-Type: application/json');
            echo json_encode($arr);
        } else {
            $_SESSION['firstname'] = $_POST['textFieldFirstName'];
            $_SESSION['lastname'] = $_POST['textFieldLastName'];
            $_SESSION['department'] = $_POST['dropdownDeparment'];
            $_SESSION['email'] = $_POST['textFieldEmail'];
            $_SESSION['password'] = $_POST['textFieldPassword'];
            $_SESSION['toVerifyAccountCreation'] = true;

            $arr = array('response' => "success");
            header('Content-Type: application/json');
            echo json_encode($arr);
            exit();
        }
        $statement->close();
    } else {
        echo 'Could not prepare statement!';
    }
} else {
    $_SESSION['notSchoolEmail'] = "Not school email.";
    $arr = array('response' => "not_school_email");
    header('Content-Type: application/json');
    echo json_encode($arr);
}

$connection->close();
