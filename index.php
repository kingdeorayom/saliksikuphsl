<?php

session_start();


if (isset($_SESSION['isLoggedIn'])) {
    header("Location: src/pages/navigation/home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="styles/custom/pages/login-style.css" type="text/css">
</head>

<body>

    <!--Main Section-->
    <main class="main">
        <div class="container mx-auto my-5">
            <div class="row mx-auto">
                <div class="col-lg-5 mx-auto d-flex justify-content-center align-items-center">
                    <div class="text-center text-white">
                        <img src="assets/images/core/saliksik-logo.png" id="saliksik-logo" alt="Saliksik Logo" class="img-fluid mb-5">
                        <p class="h4 d-none d-lg-block">The Official Institutional Repository of University of Perpetual Help System Laguna</p>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto p-5 bg-light" style="font-family: 'Roboto', arial, sans-serif;">
                    <div class="row p-2" id="alert-container-login">
                        <?php
                        if (isset($_SESSION['registrationSuccessful'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Account successfully created!</strong> Log-in with your email and password below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['registrationSuccessful']);
                        } else if (isset($_SESSION['incorrectUsernamePassword'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Incorrect email or password!</strong> Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['incorrectUsernamePassword']);
                        } else if (isset($_SESSION['passwordResetSuccessful'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Password Reset Successful!</strong> Login with your email and new password below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['passwordResetSuccessful']);
                        } else if (isset($_SESSION['incorrectUsernamePassword'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Incorrect email or password!</strong> Please try again.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['incorrectUsernamePassword']);
                        } else if (isset($_SESSION['emptyInput'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Invalid input!</strong> Please fill up all the fields.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['emptyInput']);
                        }
                        ?>
                    </div>
                    <div class="row py-2">
                        <h3>Sign in to your account</h3>
                    </div>
                    <div class="row">
                        <form onsubmit="submitLogin(event)" name="login-form">
                            <!-- <form action="./src/process/login.php" method="POST"> -->
                            <label>Email</label>
                            <input class="form-control my-2" type="text" name="textFieldEmail" id="textFieldEmail" autofocus>
                            <label>Password</label>
                            <input class="form-control my-2" type="password" name="textFieldPassword" id="textFieldPassword">
                            <div class="form-check py-2">
                                <input class="form-check-input" type="checkbox" id="checkboxShowHidePassword" onclick="showHidePassword()">
                                <label class="form-check-label" for="checkboxShowHidePassword">Show/Hide Password</label>
                            </div>
                            <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonLogin" id="buttonLogin">Login</button>
                        </form>
                        <div class="text-center py-2">
                            <a href="./src/pages/login/forgot-password.php" class="forgot-password">Forgot password?</a>
                            <hr class="my-4">
                            <label>No account yet? <a href="src/pages/login/registration.php" class="sign-up">Sign up</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showHidePassword() {
            var checkboxShowHidePasswordValue = document.getElementById("textFieldPassword");
            if (checkboxShowHidePasswordValue.type === "password") {
                checkboxShowHidePasswordValue.type = "text";
            } else {
                checkboxShowHidePasswordValue.type = "password";
            }
        }
        var alertLogin = document.getElementById('alert-container-login')

        function submitLogin(event) {
            event.preventDefault();
            var loginForm = document.forms.namedItem('login-form');
            var loginData = new FormData(loginForm)
            postLogin(loginData).then(data => checkLoginResponse(JSON.parse(data)));
        }

        function postLogin(data) {
            return new Promise((resolve, reject) => {
                var http = new XMLHttpRequest();
                http.open("POST", "./src/process/login.php");
                http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
                http.onerror = (e) => reject(Error(`Networking error: ${e}`));
                http.send(data)
            })
        }

        function checkLoginResponse(data) {
            console.log(data)
            if (data.response === "login_success") {
                window.location.reload();
                console.log("success")
            }
            if (data.response === "empty_fields") {
                alertLogin.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please fill up all the fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "incorrect_credentials") {
                alertLogin.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Incorrect email or password!</strong> Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
        }
    </script>

    <script src="scripts/bootstrap/bootstrap.js"></script>

</body>

</html>