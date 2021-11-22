<?php

session_start();

include 'connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
}

if (!isset($_POST['textFieldCurrentPassword'], $_POST['textFieldNewPassword'])) {
    header("location: ../../index.php");
    exit();
}
