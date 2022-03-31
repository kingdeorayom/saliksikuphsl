<?php

session_start();

include '../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if (isset($_GET['id'])) {
    $statement = $connection->prepare("SELECT * FROM department_list");
    $statement->execute();
    $result = $statement->get_result();
    $department_list = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    $statement = $connection->prepare("SELECT * FROM research_fields");
    $statement->execute();
    $result = $statement->get_result();
    $research_fields_list = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    $statement = $connection->prepare("SELECT * FROM user_bookmarks WHERE user_id = ?");
    $statement->bind_param("i", $_SESSION["userid"]);
    $statement->execute();
    $result = $statement->get_result();
    $bookmarks = $result->fetch_all(MYSQLI_ASSOC);
    $statement->close();

    $id = $_GET['id'];
    $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
    $statement->execute();
    $result = $statement->get_result();
    $file = $result->fetch_assoc();
    $statement->close();
    if ($file == null) {
        die(); //file doesnt exist
    } else if ($file['status'] != 'published') {
        die();
    } else {
        if ($file['file_type'] === "thesis") {
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON fi.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();

            $fileInfo = $result->fetch_assoc();
            $statement->close();
            $researchFieldsArray = array_map('trim', explode(",", $fileInfo['research_fields']));
        } else if ($file['file_type'] === "journal") {
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN journal_information as ji ON ji.file_ref_id=fi.file_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();

            $fileInfo = $result->fetch_assoc();
            $statement->close();
        } else if ($file['file_type'] === "infographic") {
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN infographic_information as ii ON ii.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON fi.coauthor_group_id=ci.group_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();

            $fileInfo = $result->fetch_assoc();
            $statement->close();
        }
    }
} else {
    die(); //GET['id'] is not defined;
}

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/repository-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Article</title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/repository-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../includes/header.php' ?>
    <?php
    if ($fileInfo['file_type'] == 'thesis') {
        include_once './thesisPanel.php';
    } else if ($fileInfo['file_type'] == 'journal') {
        include_once './journalPanel.php';
    } else if ($fileInfo['file_type'] == 'infographic') {
        include_once './infographicPanel.php';
    }
    ?>


    <!--Footer section-->

    <?php include_once '../includes/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>
    <script type ="text/javascript">
$(".main-column").on("click", ".add-bookmark", function () {
  var id = $(this).data("id");
  var container = $(this);
  $.ajax({
    method: "GET",
    url: "../src/process/add-bookmark.php?id=" + id,
  }).done(function (data) {
    console.log(id, data);
    // TODO add notification when bookmark is added
    container.html("<i class='fas fa-bookmark me-2'></i> Added to Bookmarks");
    container.removeClass("add-bookmark");
    container.addClass("del-bookmark");
  });
});

$(".main-column").on("click", ".del-bookmark", function () {
  var id = $(this).data("id");
  var container = $(this);
  $.ajax({
    method: "GET",
    url: "../src/process/delete-bookmark.php?id=" + id,
  }).done(function (data) {
    console.log(id, data);
    // TODO add notification when bookmark is deleted
    container.html("<i class='far fa-bookmark me-2'></i> Add to Bookmarks");
    container.removeClass("del-bookmark");
    container.addClass("add-bookmark");
  });
});
    </script>
</body>

</html>