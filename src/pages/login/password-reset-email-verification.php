<?php

session_start();

include '../../process/sendmail.php';

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/login-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your email</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/login-style.css?id=' . $pagecssVersion ?>" type="text/css">
    <link rel="stylesheet" href="../../../plugins/sweetalert/package/dist/sweetalert2.css" type="text/css">
</head>

<body>

    <!--Main Section-->
    <main class="main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
                <div class="row py-2" id="alert-container-verification-code">
                    <!--Container for alert message-->
                </div>
                <div class="row py-2">
                    <h3>Please check your email to continue</h3>
                </div>
                <div class="row">
                    <form onsubmit="submitVerificationCode(event)" name="verification-code-form">

                        <!-- <form action="../../process/reset-password-redirect.php" method="POST"> -->
                        <label class="mb-3">We sent a one-time verification code to the email address you provided.<br>Please enter the code below to reset your password.</label>
                        <input class="form-control" type="text" name="textFieldVerificationCode" id="textFieldVerificationCode" autofocus maxlength="6">

                        <button class="btn text-white w-100 mt-4" type="submit" name="buttonSubmitVerificationCode" id="buttonSubmitVerificationCode">Submit</button>
                        <a href="../../process/logout.php"><button class="btn btn-secondary text-white w-100 mt-2 mb-2" type="button" name="buttonCancel" id="buttonCancel">Cancel</button></a>
                    </form>
                    <div class="text-center py-2 resend-verification-code">
                        <p onclick="fireSweetAlertResendVerificationCode();">Didn't receive a code? Click here to resend</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function fireSweetAlertResendVerificationCode() {
            Swal.fire({
                title: 'Request a new verification code?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('A new verification code is sent to your email!', '', 'success');
                    location.reload();
                } else if (result.isDenied) {}
            })
        }
    </script>

    <script>
        var alertVerificationCode = document.getElementById('alert-container-verification-code')

        function submitVerificationCode(event) {
            event.preventDefault();
            var loginForm = document.forms.namedItem('verification-code-form');
            var loginData = new FormData(loginForm)
            postVerificationCode(loginData).then(data => checkVerificationCodeResponse(JSON.parse(data)));
        }

        function postVerificationCode(data) {
            return new Promise((resolve, reject) => {
                var http = new XMLHttpRequest();
                http.open("POST", "../../process/reset-password-redirect.php");
                http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
                http.onerror = (e) => reject(Error(`Networking error: ${e}`));
                http.send(data)
            })
        }

        function checkVerificationCodeResponse(data) {
            if (data.response === "verification_success") {
                window.location.href = "../login/reset-password.php";
            }
            if (data.response === "empty_fields") {
                alertVerificationCode.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please fill up all the fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "incorrect_credentials") {
                alertVerificationCode.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Incorrect verification code!</strong> Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
        }
    </script>

    <script src="../../../plugins/sweetalert/package/dist/sweetalert2.js"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>