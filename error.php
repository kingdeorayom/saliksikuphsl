<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <?php include_once 'assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="/styles/bootstrap/bootstrap.css" type="text/css">
</head>

<body>
    <div class="container p-5">
        <div class="row my-5 d-flex">
            <div class="col-sm-12 col-md-4 d-flex align-items-center">
                <div class="text-center">
                    <img src="/assets/images/core/error-image.png" alt="" class="img-fluid" width="350">
                </div>
            </div>
            <div class="col-sm-12 col-md-8" style="font-family: Roboto, sans-serif; color: #012256">
                <h1 class="display-1 fw-bold my-5">Oops!</h1>
                <h4 class="my-5 fw-bold">If you're seeing this page, you may be:</h4>
                <ul class="h4">
                    <li class="my-2">Accessing a page the wrong way</li>
                    <li class="my-2">Not logged in as an administrator</li>
                </ul>
                <h4 class="my-5">Please click <a href="/index.php">here</a> to return to the login page, or to the homepage if already logged in.</h4>
            </div>
        </div>
        <div class="row my-5">
            <div class="text-center text-secondary">
                <h5>SALIKSIK: UPHSL Research Repository</h5>
            </div>
        </div>
    </div>
    <script src="/scripts/bootstrap/bootstrap.js"></script>
</body>

</html>