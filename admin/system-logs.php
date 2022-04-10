<?php

session_start();

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] !== "admin") {
        header("location: ../error.php");
        die();
    }
} else {
    header("location: ../error.php");
    die();
}

include '../includes/connection.php';

$sql = "SELECT * FROM login_history ORDER BY login_id DESC";
$result = $connection->query($sql);

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/profile-style.css');
$profileadminjs = filemtime('../scripts/custom/profile-admin.js');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logs</title>
    <script src="<?php echo './scripts/custom/profile-admin.js?id=' . $profileadminjs ?>" type="module"></script>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/profile-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body onbeforeunload="alert('ha');">

    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

    <section class="submit-research profile">
        <div class="container p-5">

            <div class="row">
                <div class="col-lg-12 px-5 col-md-12 col-xs-12 main-column">
                    <h1 class="my-2 p-2">System Logs</h1>
                    <hr class="my-4">

                    <h4 class="d-none d-sm-none d-lg-block">Login History</h4>
                    <table class="table table-sm table-bordered table-hover text-center my-4 d-none d-lg-table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">User Type</th>
                                <th scope="col">IP Address</th>
                                <th scope="col">Login Time</th>
                                <th scope="col">Login Date</th>
                                <th scope="col">Logout Time</th>
                                <th scope="col">Logout Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<tr><td>" . $row["last_name"] . "</td><td>" . $row["first_name"] . "</td><td>" .  $row["email_address"] . "</td><td>" . $row["user_type"] . "</td><td>" . $row["ip_address"] . "</td><td>" .  $row["login_time"] . "</td><td>" . $row["login_date"] . "</td><td>" . $row["logout_time"] . "</td><td>" . $row["logout_date"] . "</td></tr>";
                                }
                            } else {
                                echo '<tr><td colspan="8">No records saved yet!</td></tr>';
                            }
                            $connection->close();
                            ?>
                        </tbody>
                    </table>
                    <h4 class="d-sm-block d-lg-none text-center text-secondary my-5">To view System Logs please open this page on a desktop or laptop computer.</h4>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>