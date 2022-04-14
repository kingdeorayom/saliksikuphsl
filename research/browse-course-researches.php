<?php

session_start();

include '../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: /index.php");
    die();
}

if(!isset($_GET['q'])){
    header("location: /research/browse-researches.php");
    die();
}
$statement = $connection->prepare("SELECT name FROM course_database");
$statement->execute();
$result = $statement->get_result();
$course_list = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$course_list_values = array();
foreach ($course_list as $key => $value) {  
    array_push($course_list_values,$value['name']);
}

if(!in_array($_GET['q'],$course_list_values)){
    header("location: /research/browse-researches.php");
    die();
};
$field = "%".$_GET['q']."%";
$query = "SELECT fi.*,`research_id`,ri.resource_type AS research_type,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_date`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ci.* FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.file_type = 'thesis' && fi.status = 'published' && research_course LIKE ? OR researchers_category LIKE ?";
$statement = $connection->prepare($query);
$statement->bind_param("ss",$field,$field);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);

$statement->close();

$maincssVersion = filemtime('../styles/custom/main-style.css');
$pagecssVersion = filemtime('../styles/custom/pages/home-style.css');
function filter(&$value)
{
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
array_walk_recursive($published, "filter");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['q'];?></title>
    <?php include_once '../assets/fonts/google-fonts.php' ?>

    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/main-style.css?id=' . $maincssVersion ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo '../styles/custom/pages/home-style.css?id=' . $pagecssVersion ?>" type="text/css">

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

    <section class=" masthead p-5 bg-light">
        <div class="container">
            <div class="col d-flex align-items-center">
                <!-- <img src="../assets/images/research-fields/accountancy-marketing.png" class="research-fields-logos"> -->
                <h1 id="masthead-title-text"><?php echo htmlspecialchars($_GET['q']);?></h1>
            </div>
        </div>
    </section>

    <section class="research-fields">
        <div class="container p-5">
            <div class="accordion accordion-flush">
            <?php
            if(count($published)){
                $unit_array = array();
                        foreach ($published as $key => $result) {
                            $date_time = date_create($result['publication_date']);
                            $yearOnly  = date_format($date_time,"Y");
                            if ($result['file_type'] == 'thesis') {
                                array_push($unit_array, $yearOnly);
                            }
                        }
                        $unit_array_count = array_count_values($unit_array);
                        $unit_array = array_unique($unit_array);
                        foreach ($unit_array as $key => $result) {
                            echo "<div class='accordion-item my-2'>
                    <h2 class='accordion-header'>
                        <button class='accordion-button collapsed fw-bold' type='button' data-bs-toggle='collapse' data-bs-target='#field-{$key}-researches' aria-expanded='false'>
                            {$result} ({$unit_array_count[$result]})
                        </button>
                    </h2>
                    <div id='field-{$key}-researches' class='accordion-collapse collapse'>
                        <div class='accordion-body'>";
                            foreach ($published as $key => $item) {
                                $date_time = date_create($item['publication_date']);
                                $thisYear  = date_format($date_time,"Y");
                                if ($item['file_type'] == 'thesis' && $thisYear == $result) {
                                    echo "
                                <a href='../repository/view-article.php?id={$item['file_id']}' class='department-title-content'>
                                    <p>{$item['research_title']}</p>
                                </a>";
                                }
                            }
                            echo "</div>
                    </div>
                </div>";
                        }
            }
            else{
                echo '<h5 style="color: grey;"><br>No results found.</h5>';//TODO
            }
            ?>
            </div>

        </div>
    </section>

    <?php include_once '../includes/footer.php' ?>

    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../scripts/bootstrap/bootstrap.js"></script>

</body>

</html>