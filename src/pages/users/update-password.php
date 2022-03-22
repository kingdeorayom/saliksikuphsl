<?php
session_start();

include '../../process/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
    if(!isset($_POST['new-password-input']) || empty($_POST['new-password-input']) || !isset($_POST['current-password-input']) || empty($_POST['current-password-input'])) {
        // error
    }
    else{
        $statement = $connection->prepare('SELECT user_id, first_name, last_name, department, password, user_type FROM users WHERE email = ?');
        $statement->bind_param('s', $_SESSION['email']);
        $statement->execute();
        $statement->store_result();
        if ($statement->num_rows > 0) {
            $statement->bind_result($userid, $firstName, $lastName, $department, $password, $user_type);
            $statement->fetch();
            if (password_verify($_POST['current-password-input'], $password)){
                $newPassword = password_hash($_POST['new-password-input'],PASSWORD_DEFAULT);
                $statement = $connection->prepare("UPDATE users SET password = ? WHERE user_id = ?");
                $statement->bind_param('si', $newPassword,$_SESSION['userid']);
                $statement->execute();
                $statement->close();
                // echo "password updated successfully";
            }
            else{
                // incorrect;
            }
        }
        else{
            // no account found to, pero based on session email naman siya so unlikely naman
        }
    }
}
else{
    // must be logged in.
}