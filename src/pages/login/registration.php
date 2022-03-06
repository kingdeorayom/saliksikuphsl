<?php

session_start();

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/login-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your account</title>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/login-style.css?id=' . $pagecssVersion ?>" type="text/css">

</head>

<body>

    <!--Main Section-->
    <main class=" main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
                <div class="row py-2" id="alert-container-register">
                    <!--  -->
                </div>
                <div class="row py-2">
                    <h3>Create your account</h3>
                </div>
                <div class="row">
                    <form onsubmit="submitRegister(event)" name="register-form">

                        <label>First Name</label>
                        <input class="form-control" type="text" name="textFieldFirstName" id="textFieldFirstName" autofocus>
                        <label class="mt-2">Last Name</label>
                        <input class="form-control" type="text" name="textFieldLastName" id="textFieldLastName">
                        <label class="py-2">College/Department</label>
                        <select class="form-select my-1" aria-label="Default select example" name="dropdownDeparment">
                            <option value="Basic Education" selected>Basic Education</option>
                            <option value="Senior High School">Senior High School</option>
                            <option value="Arts and Sciences">Arts and Sciences</option>
                            <option value="Business and Accountancy">Business and Accountancy</option>
                            <option value="Computer Studies">Computer Studies</option>
                            <option value="Criminology">Criminology</option>
                            <option value="Education">Education</option>
                            <option value="Engineering, Architecture and Aviation">Engineering, Architecture and Aviation</option>
                            <option value="Law">Law</option>
                            <option value="Maritime Education">Maritime Education</option>
                            <option value="International Hospitality Management">International Hospitality Management</option>
                            <option value="Graduate School">Graduate School</option>
                            <option value="Support Services">Support Services</option>
                        </select>
                        <label class="py-2">School Email</label>
                        <input class="form-control" type="text" name="textFieldEmail" id="textFieldEmail">
                        <label class="mt-2">Password</label>
                        <input class="form-control" type="password" name="textFieldPassword" id="textFieldPassword">
                        <label class="my-2">Confirm Password</label>
                        <input class="form-control" type="password" name="textFieldConfirmPassword" id="textFieldConfirmPassword">
                        <div class="form-check py-2">
                            <input class="form-check-input" type="checkbox" id="checkboxShowHidePassword">
                            <label class="form-check-label" for="checkboxShowHidePassword">Show/Hide Password</label>
                        </div>
                        <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonCreateAccount" id="buttonCreateAccount">Create account</button>
                    </form>
                    <div class="text-center pt-4">
                        <p>Have an account?<br><a href="../../../index.php" class="to-login">Click here to login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        var alertRegister = document.getElementById('alert-container-register');

        function submitRegister(event) {
            event.preventDefault();
            var registerForm = document.forms.namedItem('register-form');
            var registerData = new FormData(registerForm);
            postRegister(registerData).then(data => checkResponseRegister(JSON.parse(data)))
        }

        function postRegister(data) {
            return new Promise((resolve, reject) => {
                var http = new XMLHttpRequest();
                http.open("POST", "../../process/register.php");
                http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
                http.onerror = (e) => reject(Error(`Networking error: ${e}`));
                http.send(data)
            })
        }

        function checkResponseRegister(data) {
            console.log(data)
            if (data.response === "empty_fields") {
                alertRegister.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please fill up all the fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "passwords_mismatch") {
                alertRegister.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> <code>Password</code> and <code>Confirm Password</code> do not match.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "not_school_email") {
                alertRegister.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid email!</strong> Please use your school email.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "email_exists") {
                alertRegister.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>An account with this email already exists.</strong> Try another one.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "invalid_email") {
                alertRegister.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please enter a valid e-mail.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
            }
            if (data.response === "success") {
                window.location = "account-verification.php";
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#checkboxShowHidePassword").change(function() {
                if ($(this).is(':checked')) {
                    $("#textFieldPassword").attr("type", "text");
                } else {
                    $("#textFieldPassword").attr("type", "password");
                }
            });
        });
    </script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>