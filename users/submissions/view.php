<?php

session_start();

include '../../includes/connection.php';

if (isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] === "admin") {
        header("Location: ../../pages/users/admin-submissions");
    }
} else {
    header("location: ../../layouts/general/error.php");
    die();
}

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

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

    if($file['user_id']!=$_SESSION['userid']){
        die();
        // not the file uploader
    }

    if ($file == null) {
        die(); //file doesnt exist
    } else {
        if ($file['file_type'] === "thesis") {
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON fi.coauthor_group_id=ci.group_id LEFT JOIN (SELECT ref_id, feedback, returned_on FROM feedback_log WHERE log_id IN (SELECT MAX(log_id) FROM feedback_log GROUP BY ref_id)) AS fl ON fi.file_id = fl.ref_id WHERE file_id= $id");
            $statement->execute();
            $result = $statement->get_result();

            $fileInfo = $result->fetch_assoc();
            $statement->close();
            $researchFieldsArray = array_map('trim', explode(",", $fileInfo['research_fields']));
        } else {
            die();
            // thesis lang pede submit ni user
        }
    }
} else {
    die(); //GET['id'] is not defined;
}




$maincssVersion = filemtime('../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../styles/custom/pages/submission-forms-style.css');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submission</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include_once '../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">

    <link rel="apple-touch-icon" sizes="180x180" href="../../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon-16x16.png">
    <link rel="manifest" href="../../site.webmanifest">
    <link rel="mask-icon" href="../../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>


<body>

    <!--Header and Navigation section-->

    <?php include_once '../../includes/header.php' ?>

    <section class="submit-research">
        <div class="container p-5">
            <div class="row">
                <?php 
                if($fileInfo['status']=='pending'){
                    if($fileInfo['file_type']=='thesis'){
                        include_once '../../includes/view-submission-forms/thesisDissertationPanel.php';
                    }
                }
                else if ($fileInfo['status']=='for revision'){
                    if($fileInfo['file_type']=='thesis'){
                        include_once '../../includes/view-revision-forms/thesisDissertationPanel.php';
                    }
                }
                ?>


            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../includes/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../scripts/bootstrap/bootstrap.js"></script>
    <script type="text/javascript">
        $("form[name='thesis-form']").on('submit', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var coauthor_id = $(this).data('coauthor_id');
            var formData = new FormData(this);
            formData.append("coauthor_id",coauthor_id)
            $.ajax({
                method: "POST",
                url:"../../src/process/user-update-submission.php?id="+id,
                contentType: false,
                processData: false,
                data: formData
            }).done(function (data) {
                console.log(data)
            })
        })
        $(".feedback-container:first-of-type").prepend(`<div class='text-end'>
                <span class='badge rounded-pill' style='background-color:#012265'>New</span>
            </div>`)
        function enableDisableResubmitButtonThesis(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonThesis").disabled = false;
            } else {
                document.getElementById("resubmitButtonThesis").disabled = true;
            }
        }
    
    </script>
    
</body>

</html>