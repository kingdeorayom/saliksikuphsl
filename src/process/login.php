<?php

session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

// if user entered login.php thru browser url, redirect to login page
if (!isset($_POST['textFieldEmail'], $_POST['textFieldPassword'])) {
    header("location: ../../index.php");
    exit();
}

if (empty($_POST['textFieldEmail'] && $_POST['textFieldPassword'])) {
    $_SESSION['emptyInput'] = "Invalid input. Fill up all fields.";
    header("location: ../../index.php");
    
    exit();
} else if (!empty($_POST['textFieldEmail'] && $_POST['textFieldPassword'])) {
    if ($statement = $connection->prepare('SELECT user_id, first_name, last_name, password, user_type FROM users WHERE email = ?')) {
        $statement->bind_param('s', $_POST['textFieldEmail']);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows > 0) {
            $statement->bind_result($userid, $firstName, $lastName, $password, $user_type);
            $statement->fetch();

            if (password_verify($_POST['textFieldPassword'], $password)) {

                session_regenerate_id();

                $_SESSION['userType'] = $user_type;
                $_SESSION['email'] = $_POST['textFieldEmail'];
                $_SESSION['isLoggedIn'] = TRUE; //
                $_SESSION['fullName'] = $firstName . ' ' . $lastName; //
                $_SESSION['userid'] = $userid; //

                header("Location: ../pages/navigation/home.php");
            } else {
                $_SESSION['incorrectUsernamePassword'] = "Incorrect username or password.";
                header("location: ../../index.php");
            }
        } else {
            $_SESSION['incorrectUsernamePassword'] = "Incorrect username or password.";
            header("location: ../../index.php");
        }
    }
}
