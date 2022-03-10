<?php
session_start();

include '../../process/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo "you do not have access to this!";
    }
    else{
        // ..do something here ..
    }
}