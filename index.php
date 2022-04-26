<?php

session_start();

if (isset($_SESSION['isLoggedIn'])) {
    header("Location: /home.php");
    die();
}

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/login-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <?php include_once './assets/fonts/google-fonts.php' ?>
    <script src="./scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/login-style.css?id=' . $pagecssVersion ?>" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:image" content="./assets/images/core/saliksik-meta-preview.png" />
    <meta property="og:description" content="SALIKSIK: UPHSL Research Repository is an online tool and database where you can view, upload and download materials pertaining to research outputs of the university. It allows you to have access to a wide array of research materials in terms of a given time period, particular college/department, or research areas. It also provides access to the annual reports, research competency development program, institutional research agenda and other relevant research documents of the Research Center." />
    <meta property="og:url" content="http://www.coachesneedsocial.com/coacheswisdomtelesummit/" />
    <meta property="og:title" content="SALIKSIK: UPHSL Research Repository" />

</head>

<body class="d-flex flex-column min-vh-100">
    <!-- <div class="alert alert-light alert-dismissible fade show rounded-0" role="alert">
        <strong>IMPORTANT!</strong> We're improving the system right now. You may notice some underdeveloped parts inside the website.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
    <!--Main Section-->
    <main class="main d-flex justify-content-md-center align-items-center vh-100">
        <div class="container mx-auto my-5">
            <div class="row mx-auto">
                <div class="col-lg-5 mx-auto d-flex justify-content-center align-items-center">
                    <div class="text-center text-white">
                        <img src="assets/images/core/saliksik-logo.png" id="saliksik-logo" alt="SALIKSIK: UPHSL Research Repository" class="img-fluid">
                        <p class="h4 d-none d-lg-block">The Official Institutional Repository of University of Perpetual Help System Laguna</p>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto p-5 bg-light my-3">
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

                        <form name="login-form">
                            <input type="text" hidden value="<?php if (isset($_GET['location'])) {
                                                                    echo htmlspecialchars($_GET['location']);
                                                                } ?>" name="location">
                            <label>Email <i class="fas fa-question-circle text-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="Create an account if you don't have one yet"></i></label>
                            <input class="form-control my-2" type="text" name="textFieldEmail" id="textFieldEmail" autofocus>
                            <label>Password</label>
                            <div class="input-group my-2">
                                <input class="form-control" type="password" name="textFieldPassword" id="textFieldPassword">
                                <span class="input-group-text toggle-password fas fa-eye d-flex align-items-center"></span>
                            </div>
                            <!-- <div class="form-check py-2">
                                <input class="form-check-input" type="checkbox" id="checkboxShowHidePassword">
                                <label class="form-check-label" for="checkboxShowHidePassword">Show/Hide Password</label>
                            </div> -->
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
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fas fa-eye fas fa-eye-slash");
            var input = $("#textFieldPassword");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password')
        });
    </script>

    <script>
        var alertLogin = $("#alert-container-login");

        $("form[name='login-form']").submit(function(e) {
            e.preventDefault();
            var loginData = new FormData(this);
            $.ajax({
                method: "POST",
                url: "./src/process/login.php",
                data: loginData,
                contentType: false,
                processData: false,
            }).done(function(data) {
                checkLoginResponse(data)
            })
        })

        function checkLoginResponse(data) {
            if (data.response === "login_success") {
                window.location.reload();
            } else if (data.response === "empty_fields") {
                alertLogin.html(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please fill up all the fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.response === "incorrect_credentials") {
                alertLogin.html(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Incorrect email or password!</strong> Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.location) {
                window.location.href = data.location;
            }
        }
    </script>
    <script src="/scripts/popper/popper.min.js"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>
    <script type="text/javascript">
        sessionStorage.clear();
    </script>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>