<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        echo '<a href="../../../../index.php">go back to login page</a><br><br>';
        die('Please login as admin to access this page. <br>Click the link above to return to the login page or to the home page if already logged in.');
    }
} else {
    echo '<a href="../../../../index.php">go back to login page</a><br><br>';
    die('Please login as admin to access this page. <br>Click the link above to return to the login page or to the home page if already logged in.');
}
