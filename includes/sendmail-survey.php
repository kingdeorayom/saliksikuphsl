<?php

session_start();

$maincssVersion = filemtime('styles/custom/main-style.css');
$pagecssVersion = filemtime('styles/custom/pages/about-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sendmail</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo 'styles/custom/pages/about-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="stylesheet" href="/plugins/sweetalert/package/dist/sweetalert2.css">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <style>
        .send:hover {
            background-color: #27498d !important;
        }
    </style>

</head>

<body>


    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">ISO 25010 Software Evaluation Survey</h1>
        </div>
    </section>



    <section class="about-and-copyright">
        <div class="container p-5">

            <div class="row py-2" id="alert-container-sendmail">
                <!--  -->
            </div>
            <h3>mismong id number na lang ilagay niyo. example: <em>16-0648-209</em></h3><br>


            <form onsubmit="submitRegister(event)" name="login-form">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient1" id="recipient1" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient2" id="recipient2" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient3" id="recipient3" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient4" id="recipient4" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient5" id="recipient5" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient6" id="recipient6" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient7" id="recipient7" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient8" id="recipient8" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient9" id="recipient9" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">c</span>
                    <input type="text" name="recipient10" id="recipient10" class="form-control" placeholder="xx-xxxx-xxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@uphsl.edu.ph</span>
                </div>

                <button type="submit" class="btn text-white rounded-0 send my-5" style="background-color: #012265; border-color: #012265;">Send</button>
            </form>

        </div>
    </section>

    <!--Footer section-->


    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="scripts/bootstrap/bootstrap.js"></script>

    <script>
        var alertLogin = $("#alert-container-sendmail");

        $("form[name='login-form']").submit(function(e) {
            e.preventDefault();
            var loginData = new FormData(this);
            $.ajax({
                method: "POST",
                url: "sendmailsurvey.php",
                data: loginData,
                contentType: false,
                processData: false,
            }).done(function(data) {
                checkLoginResponse(data)
            })
        })

        function checkLoginResponse(data) {
            if (data.response === "login_success") {
                // alertLogin.html(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>email sent succesfully!</strong> di ko alam kung mas madali ba ito pero tingin ko naman hahaha<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
                $("#recipient1, #recipient2, #recipient3, #recipient4, #recipient5, #recipient6, #recipient7, #recipient8, #recipient9, #recipient10").val("");

                let timerInterval
                Swal.fire({
                    title: 'EMAIL SENT SUCCESS!',
                    html: 'I will close in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })

            } else if (data.response === "empty_fields") {
                alertLogin.html(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Invalid input!</strong> Please fill up all the fields.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.response === "incorrect_credentials") {
                alertLogin.html(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Incorrect email or password!</strong> Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`)
            } else if (data.location) {
                window.location.href = data.location;
            }
        }
    </script>

    <script src="/plugins/sweetalert/package/dist/sweetalert2.js"></script>

</body>

</html>