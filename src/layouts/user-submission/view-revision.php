<?php

session_start();

include '../../process/connection.php';

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

    $statement = $connection->prepare("SELECT * FROM file_information WHERE file_id= ?");
    $statement->bind_param("i", $_GET['id']);
    $statement->execute();
    $result = $statement->get_result();
    $file = $result->fetch_assoc();
    $statement->close();
    

    if ($file == null) {
        die(); //file doesnt exist
    } else {
        if($file['status']!=='for revision'){
            die(); //not revision or header location it
        }
        if ($file['file_type'] === "thesis") {
            $statement = $connection->prepare("SELECT * FROM file_information AS fi JOIN research_information as ri ON ri.file_ref_id=fi.file_id JOIN coauthors_information AS ci ON fi.coauthor_group_id=ci.group_id LEFT JOIN (SELECT ref_id, feedback, returned_on FROM feedback_log WHERE log_id IN (SELECT MAX(log_id) FROM feedback_log GROUP BY ref_id)) AS fl ON fi.file_id = fl.ref_id WHERE file_id= ?");
            $statement->bind_param("i", $_GET['id']);
            $statement->execute();
            $result = $statement->get_result();
            $fileInfo = $result->fetch_assoc();
            $statement->close();
            $researchFieldsArray = array_map('trim', explode(",", $fileInfo['research_fields']));

            $statement = $connection->prepare("SELECT * FROM feedback_log WHERE ref_id= ? ORDER BY log_id DESC");
            $statement->bind_param("i", $_GET['id']);
            $statement->execute();
            $result = $statement->get_result();
            $feedback = $result->fetch_all(MYSQLI_ASSOC);
            // $feedback = array_reverse($feedback);
            $feedback_count = count($feedback);

            $statement->close();
        } else {
            die();
            // thesis lang pede submit ni user
        }
    }
} else {
    die(); //GET['id'] is not defined;
}

if($fileInfo['user_id']!=$_SESSION['userid']){
    die();
    // not the file uploader
}

$maincssVersion = filemtime('../../../styles/custom/main-style.css');
$pagecssVersion = filemtime('../../../styles/custom/pages/submission-forms-style.css');

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Revision</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include_once '../../../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../../../styles/custom/pages/submission-forms-style.css?id=' . $pagecssVersion ?>" type="text/css">
</head>


<body>

    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <section class="submit-research">
        <div class="container p-5">
            <div class="row">
                <?php if($fileInfo['file_type']=='thesis'){
                    include_once './view-revision-forms/thesisDissertationPanel.php';
                }
                else if($fileInfo['file_type']=='infographic'){
                    include_once './view-revision-forms/infographicsPanel.php';
                }
                else if($fileInfo['file_type']=='infographic'){
                    include_once './view-revision-forms/researchJournalPanel.php';
                }
                ?>


            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
    <script>
        function enableDisableResubmitButtonThesis(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonThesis").disabled = false;
            } else {
                document.getElementById("resubmitButtonThesis").disabled = true;
            }
        }

        function enableDisableResubmitButtonJournal(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonJournal").disabled = false;
            } else {
                document.getElementById("resubmitButtonJournal").disabled = true;
            }
        }

        function enableDisableResubmitButtonInfographics(checkBoxStatus) {
            if (checkBoxStatus.checked) {
                document.getElementById("resubmitButtonInfographics").disabled = false;
            } else {
                document.getElementById("resubmitButtonInfographics").disabled = true;
            }
        }
    </script>
    <script type="text/javascript">
        $(".feedback-container:first-of-type").prepend(`<div class='text-end'>
                                    <span class='badge rounded-pill' style='background-color:#012265'>New</span>
                                </div>`)
        $("form[name='thesis-form']").on('submit', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var coauthor_id = $(this).data('coauthor_id');

            var formData = new FormData(this);
            formData.append("coauthor_id",coauthor_id)
            $.ajax({
                method: "POST",
                url:"../../process/user-revised-submission.php?id="+id,
                contentType: false,
                processData: false,
                data: formData
            }).done(function (data) {
                console.log(data)
            })
        })
    </script>
</body>

</html>