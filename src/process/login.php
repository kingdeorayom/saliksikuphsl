<?php

session_start();

include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if (!isset($_POST['textFieldEmail'], $_POST['textFieldPassword'])) {
    header("location: ../../index.php");
    exit();
}

$redirect = NULL;
if ($_POST['location'] != '') {
    $redirect = $_POST['location'];
}

if (empty($_POST['textFieldEmail'] && $_POST['textFieldPassword'])) {
    $arr = array('response' => "empty_fields");
    header('Content-Type: application/json');
    echo json_encode($arr);
    exit();
} else if (!empty($_POST['textFieldEmail'] && $_POST['textFieldPassword'])) {
    if ($statement = $connection->prepare('SELECT user_id, first_name, last_name, department, password, user_type FROM users WHERE email = ?')) {
        $statement->bind_param('s', $_POST['textFieldEmail']);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows > 0) {
            $statement->bind_result($userid, $firstName, $lastName, $department, $password, $user_type);
            $statement->fetch();

            if (password_verify($_POST['textFieldPassword'], $password)) {

                session_regenerate_id();

                $_SESSION['userType'] = $user_type;
                $_SESSION['email'] = $_POST['textFieldEmail'];
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['department'] = $department;
                $_SESSION['isLoggedIn'] = TRUE;
                $_SESSION['fullName'] = $firstName . ' ' . $lastName;
                $_SESSION['userid'] = $userid;

                if ($redirect) {
                    $arr = array('location' => $redirect);
                } else {
                    $arr = array('response' => "login_success");


                    function getIPAddress()
                    {
                        //whether ip is from the share internet  
                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        }
                        //whether ip is from the proxy  
                        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        }
                        //whether ip is from the remote address  
                        else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                        return $ip;
                    }

                    $ip = getIPAddress();


                    $login_time = date('h:i:s A');
                    $login_date = date('D, M j, Y');

                    $statement = $connection->prepare('INSERT into login_history (user_id, last_name, first_name, email_address, user_type, ip_address, login_time, login_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                    $statement->bind_param('ssssssss', $_SESSION['userid'], $_SESSION['lastName'], $_SESSION['firstName'], $_SESSION['email'], $_SESSION['userType'], $ip, $login_time, $login_date);
                    $statement->execute();
                }
                header('Content-Type: application/json');
                echo json_encode($arr);
            } else {
                $arr = array('response' => "incorrect_credentials");
                header('Content-Type: application/json');
                echo json_encode($arr);
            }
        } else {
            $arr = array('response' => "incorrect_credentials");
            header('Content-Type: application/json');
            echo json_encode($arr);
        }
    }
}
