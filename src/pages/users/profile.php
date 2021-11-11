<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ./admin/profile-admin.php");
    }
} else {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
</head>

<body>
    <div class="text-center m-5 p-5">
        <img src="../../../assets/images/dump/under-construction.png" class="img-fluid"><br><br>
        <a href="../../pages/navigation/home.php">go back</a>
    </div>
</body>

<script src="../../scripts/bootstrap/bootstrap.js"></script>

</html>