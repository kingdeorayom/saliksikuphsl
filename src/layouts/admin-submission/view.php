<?php

use function PHPSTORM_META\type;

session_start();

include '../../process/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "user") {
        header("location: ../../layouts/general/error.php");
        die();
    }
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

    $id = $_GET['id'];
    $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= $id");
    $statement->execute();
    $result = $statement->get_result();
    $file = $result->fetch_assoc();
    $statement->close();

    if ($file == null) {
        die(); //file doesnt exist
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

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/submission-forms-style.css');
$feedbackControlJS = filemtime('../../../scripts/custom/feedback-control.js');
$coauthorsDropdown = filemtime('../../../scripts/custom/coauthors-dropdown.js');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if ($fileInfo['file_type'] == 'thesis') {
            echo $fileInfo['research_title'];
        } else if ($fileInfo['file_type'] == 'journal') {
            echo $fileInfo['journal_title'];
        } else if ($fileInfo['file_type'] == 'infographic') {
            echo $fileInfo['infographic_title'];
        }
        ?></title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo '../../../scripts/custom/coauthors-dropdown.js?id=' . $coauthorsDropdown ?>"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>
<!-- onload function for date picker thesis and infographic -->

<body onload="<?php
                if ($fileInfo['file_type'] == 'thesis') {
                    echo 'changeInput()';
                } else if ($fileInfo['file_type'] == 'infographic') {
                    echo 'changeInputInfo()';
                } ?>">
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>
    <section class="submit-research">
        <div class="container p-5">
            <?php
            if ($fileInfo['status'] == 'published') {
                if ($fileInfo['file_type'] == 'thesis') {
                    include_once './view-published-forms/thesisDissertationPanel.php';
                } else if ($fileInfo['file_type'] == 'journal') {
                    include_once './view-published-forms/researchJournalPanel.php';
                } else if ($fileInfo['file_type'] == 'infographic') {
                    include_once './view-published-forms/infographicsPanel.php';
                }
            } else if ($fileInfo['status'] == 'revised') {
                if ($fileInfo['file_type'] == 'thesis') {
                    include_once './view-revised-forms/thesisDissertationPanel.php';
                } else if ($fileInfo['file_type'] == 'journal') {
                    include_once './view-revised-forms/researchJournalPanel.php';
                } else if ($fileInfo['file_type'] == 'infographic') {
                    include_once './view-revised-forms/infographicsPanel.php';
                }
            } else if ($fileInfo['status'] == 'for revision') {
                if ($fileInfo['file_type'] == 'thesis') {
                    include_once './view-revision-forms/thesisDissertationPanel.php';
                } else if ($fileInfo['file_type'] == 'journal') {
                    include_once './view-revision-forms/researchJournalPanel.php';
                } else if ($fileInfo['file_type'] == 'infographic') {
                    include_once './view-revision-forms/infographicsPanel.php';
                }
            } else if ($fileInfo['status'] == 'pending') {
                if ($fileInfo['file_type'] == 'thesis') {
                    include_once './view-approval-forms/thesisDissertationPanel.php';
                } else if ($fileInfo['file_type'] == 'journal') {
                    include_once './view-approval-forms/researchJournalPanel.php';
                } else if ($fileInfo['file_type'] == 'infographic') {
                    include_once './view-approval-forms/infographicsPanel.php';
                }
            }
            ?>
        </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script src="<?php echo '../../../scripts/custom/feedback-control.js?id=' . $feedbackControlJS ?>"></script>
    <?php
    if ($fileInfo['file_type'] == 'thesis') {
        echo "<script src='../../../scripts/custom/thesis-calendar-date-picker.js'></script>";
    } else if ($fileInfo['file_type'] == 'infographic') {
        echo "<script src='../../../scripts/custom/info-calendar-date-picker.js'></script>";
    }
    ?>
</body>

</html>