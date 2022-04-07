<?php

session_start();

include '../includes/connection.php';


if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if (!isset($_GET['id'])) {
    header("location: ../researchers.php");
    die();
}

$statement = $connection->prepare("SELECT * FROM researcher_profile WHERE researcher_id = ?");
$statement->bind_param("i", $_GET['id']);
$statement->execute();
$result = $statement->get_result();
$num_rows = mysqli_num_rows($result);
if ($num_rows ==0){
    header("location: ../researchers.php");
    die();
}
$researcher = $result->fetch_assoc();
$statement->close();



$statement = $connection->prepare("SELECT * FROM researcher_works WHERE researcher_ref_id = ?");
$statement->bind_param("i", $_GET['id']);
$statement->execute();
$result = $statement->get_result();
$published_works = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

function filter(&$value)
{
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/researchers-style.css');
$imageVersion = filemtime("../src/".$researcher['researcher_image']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($researcher['name']) ?></title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/researchers-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>

    <!--Masthead-->

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <h1 id="masthead-title-text">Researcher's Profile</h1>
        </div>
    </section>

    <section class="researchers">
        <div class="container p-5">
            <div class="row my-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item prev-dir-breadcrumb"><a href="../researchers.php" style="color: #012265; text-decoration:none">Our Researchers</a></li>
                        <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page"><?php echo htmlspecialchars($researcher['type']) ?> Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-2 p-2">
                    <img src="../src/<?php echo htmlspecialchars($researcher['researcher_image']) . "?id=" . $imageVersion ?>" class="img-fluid" width="140" height="140">
                </div>
                <div class="col-lg-10">
                    <h2 class="fw-bold mt-3"><?php echo htmlspecialchars($researcher['name']) ?>
                        <?php if ($_SESSION['userType'] == 'admin') {
                            echo "<a href='./edit.php?id={$researcher['researcher_id']}' class='edit-profile-button'><i class='fas fa-edit h5'></i></a></h2>";
                        } ?>
                        <h5 class="mb-2"><?php echo htmlspecialchars($researcher['type']) ?></h5>

                        <div class="row my-5">
                            <div class="col-lg-3 border-top border-2">
                                <h6 class="fw-bold my-3">College/Department</h6>
                            </div>
                            <div class="col-lg-9 border-top border-2">
                                <p class="my-3"><?php echo htmlspecialchars($researcher['department']) ?></p>
                            </div>
                            <div class="col-lg-3 border-top border-2">
                                <h6 class="fw-bold my-3">Highest Educational Attainment</h6>
                            </div>
                            <div class="col-lg-9 border-top border-2">
                                <p class="my-3"><?php echo htmlspecialchars($researcher['highest_edu_attainment']) ?></p>
                            </div>
                            <div class="col-lg-3 border-top border-2">
                                <h6 class="fw-bold my-3">Research Interest</h6>
                            </div>
                            <div class="col-lg-9 border-top border-2">
                                <p class="my-3"><?php echo htmlspecialchars($researcher['research_interest']) ?></p>
                            </div>

                        </div>

                        <div class="row my-5">
                            <div class="col">

                                <h3 class="fw-bold">Published Works</h3>
                                <hr>
                                <?php foreach ($published_works as $key => $result) {
                                    array_walk_recursive($result, "filter");
                                    echo "<a href='{$result['research_link']}' class='my-4 published-works h5'>{$result['research_title']}</a>
                                <hr>";
                                } ?>
                            </div>

                        </div>

                        <?php if($_SESSION['userType'] == 'admin'): ?>
                            <div class='row my-5'>
                            <div class='text-start'>
                                <p class='fst-italic text-danger'><span class='fw-bold'>IMPORTANT:</span> This will delete all data and records for this researcher. Proceed with caution.</p>
                                <button class='btn btn-danger rounded-0' data-bs-toggle='modal' data-bs-target='#modalDelete'><i class='fas fa-trash-alt'></i> Delete profile</button>
                            </div>
                            <!-- Modal -->
                            <div class='modal fade' id='modalDelete' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Delete this profile?</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <label>This action is irreversible.</label>
                                        </div>
                                        <form class='modal-footer' action="<?php echo "../src/process/delete-researcher-profile.php?id=".$researcher['researcher_id'] ?>" method="POST">
                                            <button type='button' class='btn btn-secondary rounded-0' data-bs-dismiss='modal'>Close</button>
                                            <button class='btn btn-danger rounded-0'><i class='fas fa-trash-alt'></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                </div>
            </div>

        </div>
    </section>

    <!--Footer section-->

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>