<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/registration-style.css" type="text/css">

</head>

<body style="background-color: #012265; font-family: 'Roboto'">

    <!--Main Section-->
    <main class=" main">
        <div class="container mx-auto my-5 d-flex justify-content-center align-items-center h-auto">
            <div class="col-lg-6 p-5 bg-light">
                <!-- <div class="row p-2">
                    <div class="text-center">
                        <img src="../../../assets/images/core/uphsl-logo.png" id="uphsl-logo" alt="UPHSL Logo">
                    </div>
                </div> -->
                <div class="row py-2" id="alert-container-register">
                    <!--  -->
                </div>
                <div class="row py-2">
                    <h3>Create your account</h3>
                </div>
                <div class="row">
                    <form onsubmit="submitRegister(event)" name="register-form">

                        <label>First Name</label>
                        <input class="form-control my-1" type="text" name="textFieldFirstName" id="textFieldFirstName">
                        <label>Last Name</label>
                        <input class="form-control my-1" type="text" name="textFieldLastName" id="textFieldLastName">
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
                        <input class="form-control my-1" type="text" name="textFieldEmail" id="textFieldEmail">
                        <label>Password</label>
                        <input class="form-control mt-1 mb-2" type="password" name="textFieldPassword" id="textFieldPassword">
                        <label>Confirm Password</label>
                        <input class="form-control my-1" type="password" name="textFieldConfirmPassword" id="textFieldConfirmPassword">
                        <div class="form-check py-2">
                            <input class="form-check-input" type="checkbox" id="checkboxShowHidePassword" onclick="showHidePassword()">
                            <label class="form-check-label" for="checkboxShowHidePassword">Show/Hide Password</label>
                        </div>
                        <button class="btn text-white w-100 mt-4 mb-2" type="submit" name="buttonCreateAccount" id="buttonCreateAccount">Create account</button>
                    </form>
                    <div class="text-center pt-4">
                        Have an account?<br><a href="../../../index.php" style="text-decoration: none; font-weight: bold; color: #012265">Click here to login</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../../../scripts/custom/user-login-register-scripts.php' ?>
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
</body>

</html>