<?php

session_start();

if (!isset($_POST['uploadSuccess'])) {
    header("location: ../../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload success</title>
    <link rel="stylesheet" href="../../plugins/sweetalert/package/dist/sweetalert2.css" type="text/css">
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../styles/custom/main-style.css" type="text/css">

</head>

<body onload="fireSweetAlertSuccessMessage();" style="background-color: #012265;">
    <script src="../../plugins/sweetalert/package/dist/sweetalert2.js"></script>
    <script>
        function fireSweetAlertSuccessMessage() {
            Swal.fire(
                'File upload success!',
                'Wait for your submission to be approved by the administration. You can view the submission status by checking <strong>My Submissions</strong> under <strong>My Profile</strong>.',
                'success'
            ).then(function() {
                window.location = "../pages/navigation/submission-forms.php";
            });
        }
    </script>
</body>

</html>