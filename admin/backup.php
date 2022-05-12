<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/backup-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup and Restore</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <script src="../scripts/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/backup-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


</head>

<body class="d-flex flex-column min-vh-100">

    <?php include_once '../includes/header.php' ?>

    <section class="masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Backup and Restore</h1>
        </div>
    </section>

    <section class="backup-and-restore">
        <div class="container p-5">
            <div class="row">

                <div class="col-lg-2 d-none d-md-none d-lg-block fw-bold">
                    <h3>On this page</h3>
                    <hr>
                    <p class="side-menu-text px-3" id="backupText">Backup</p>
                    <hr>
                    <p class="side-menu-text px-3" id="restoreText">Restore</p>
                    <hr>
                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="backupPanel">

                    <h1 class="my-4">Backup</h1>
                    <hr class="my-3">

                    <form action="../src/process/dbbackup.php">
                        <p>Click the button below to create a backup of the system database. The backup file will be stored on a <strong>.sql</strong> file.</p>
                        <button type="submit" class="btn button-backup rounded-0">Backup</button>
                    </form>


                    <div class="d-lg-none">
                        <h1 class="my-4">Restore</h1>
                        <hr class="my-3">

                        <form action="../src/process/dbrestore.php" method="POST" enctype="multipart/form-data">
                            <p>Click the button below to restore a backup of the system database.</p>

                            <div class="mb-3">
                                <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                                <input class="form-control" type="file" id="formFile" name="backupFile" accept=".sql" required>
                            </div>

                            <button type="submit" class="btn button-restore rounded-0">Restore</button>


                        </form>

                    </div>

                </div>

                <div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="restorePanel" hidden>
                    <h1 class="my-4">Restore</h1>
                    <hr class="my-3">

                    <form action="../src/process/dbrestore.php" method="POST" enctype="multipart/form-data">
                        <p>Click the button below to restore a backup of the system database.</p>

                        <div class="mb-3">
                            <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                            <input class="form-control" type="file" id="formFile" name="backupFile" accept=".sql" required>
                        </div>

                        <button type="submit" class="btn button-restore rounded-0">Restore</button>


                    </form>

                </div>

            </div>
        </div>
    </section>

    <!--Footer section-->

    <?php include_once '../includes/footer.php' ?>

    <script>
        $(document).ready(function() {
            /* on load */
            $("#backupText").css({
                "border-left": "thick solid #012265",
            });
            /* on load */
            $("#backupText").click(function() {
                $("#restorePanel").prop('hidden', true);
                $("#restoreText").css({
                    "border-left": "thick none #012265",
                });
                $("#backupPanel").prop('hidden', false);
                $("#backupText").css({
                    "border-left": "thick solid #012265",
                });
            });
            $("#restoreText").click(function() {
                $("#restorePanel").prop('hidden', false);
                $("#restoreText").css({
                    "border-left": "thick solid #012265",
                });
                $("#backupPanel").prop('hidden', true);
                $("#backupText").css({
                    "border-left": "thick none #012265",
                });
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>