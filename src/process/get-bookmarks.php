<?php
session_start();


include '../../includes/connection.php';

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query ="SELECT
fi.*,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_date`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ii.*, ji.*, ci.* FROM user_bookmarks AS ub LEFT JOIN file_information AS fi ON ub.ref_id = fi.file_id LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published' AND ub.user_id = ?";

if(isset($_GET['type']) && $_GET['type'] != 'All Items'){
    if($_GET['type'] == 'Thesis'){
        $thesis = " AND ri.resource_type = 'Thesis'";
        $query .= $thesis;
    }
    if($_GET['type'] == 'Capstone'){
        $thesis = " AND ri.resource_type = 'Capstone'";
        $query .= $thesis;
    }
    if($_GET['type'] == 'Dissertation'){
        $thesis = " AND ri.resource_type = 'Dissertation'";
        $query .= $thesis;
    }
    if($_GET['type'] == 'Journal'){
        $thesis = " AND fi.file_type = 'journal'";
        $query .= $thesis;
    }
    if($_GET['type'] == 'Infographic'){
        $thesis = " AND fi.file_type = 'infographic'";
        $query .= $thesis;
    }
}

$statement = $connection->prepare($query);
$statement->bind_param("i", $_SESSION['userid']);
$statement->execute();
$result = $statement->get_result();
$bookmarks = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

function filter(&$value){
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if(count($bookmarks)!=0){
    foreach ($bookmarks as $key => $result) :
        array_walk_recursive($result,"filter");
        if ($result['file_type'] === 'thesis') {
            $date_time = date_create($result['publication_date']);
            $date_time = date_format($date_time,"M d, Y");
            echo "<div class='repositoryItem p-2'>
            <p class='fw-bold text-start' style='color: #012265;'>{$result['resource_type']} {$result['file_id']}</p>
            <a href='../repository/view-article.php?id={$result['file_id']}' class='article-title'>
                <h4 class='fw-bold mb-3'>{$result['research_title']}</h4>
            </a>
            <p class='fw-bold'>{$result['researcher_surname']}, {$result['researcher_first_name'][0]}.";
            for ($i = 1; $i <= $result['research_coauthors_count']; $i++) {
                echo ", {$result["coauthor{$i}_surname"]}, {$result["coauthor{$i}_first_name"][0]}.";
            }
            echo "</p>
            <p class='fw-bold'>{$date_time}</p>
            <p>{$result['research_abstract']}</p>";
            if(in_array($result['file_id'],array_column($bookmarks,'file_id'))){
                echo "<p class='del-bookmark' data-id={$result['file_id']}><i class='fas fa-bookmark me-2'></i> Added to Bookmarks</p>";;
            }
            else {
                echo "<p class='add-bookmark' data-id={$result['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
            }
            echo "<hr class='my-2'>
        </div>";
        } else if ($result['file_type'] === 'journal') {
            $journalImage = explode(".pdf", $result['file_dir']);
            $journalImageLink = $journalImage[0] . ".png";
            echo "<div class='repositoryItem p-2'>
            <div class='row'>
                <div class='text-start'>
                    <p class='fw-bold' style='color: #012265;'>Journal {$result['file_id']}</p>
                </div>
                <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
                <img src=../{$result['file_dir2']} width='150'>
                </div>
                <div class='col-sm-12 col-lg-10'>
                    <div class='col'>
                        <a href='../repository/view-article.php?id={$result['file_id']}' class='article-title'>
                            <h4 class='fw-bold mb-3'>{$result['journal_title']}</h4>
                        </a>
                        <h5 class='mb-3'>{$result['journal_subtitle']}</h5>
                        <p class='fw-bold'>Volume 11 Series of 2019</p>
                        <p>{$result['journal_description']}</p>";
                        if(in_array($result['file_id'],array_column($bookmarks,'file_id'))){
                            echo "<p class='del-bookmark' data-id={$result['file_id']}><i class='fas fa-bookmark me-2'></i> Added to Bookmarks</p>";;
                        }
                        else {
                            echo "<p class='add-bookmark' data-id={$result['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
                        }
                    echo "</div>
                </div>
                <div class='col-sm-12 col-lg-2 d-none d-sm-none d-lg-block'>
                    <img src=../{$result['file_dir2']} width='150'>
                </div>
            </div>
            <hr class='my-2'>
        </div>";
        } else if ($result['file_type'] === 'infographic') {
            $date_time = date_create($result['publication_date']);
            $date_time = date_format($date_time,"M d, Y");
            echo "<div class='repositoryItem p-2'>
            <div class='row'>
                <div class='text-start'>
                    <p class='fw-bold' style='color: #012265;'>Infographic {$result['file_id']}</p>
                </div>
                <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
                </div>
                <div class='col-sm-12 col-lg-10'>
                    <div class='col'>
                        <a href='../repository/view-article.php?id={$result['file_id']}' class='article-title'>
                            <h4 class='fw-bold mb-3'>{$result['infographic_title']}</h4>
                        </a>
                        <h5 class='mb-3'>{$date_time}</h5>
                        <p class='fw-bold'>Volume 11 Series of 2019</p>
                        <p>{$result['infographic_description']}</p>";
                        if(in_array($result['file_id'],array_column($bookmarks,'file_id'))){
                            echo "<p class='del-bookmark' data-id={$result['file_id']}><i class='fas fa-bookmark me-2'></i> Added to Bookmarks</p>";;
                        }
                        else {
                            echo "<p class='add-bookmark' data-id={$result['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
                        }
                    echo "</div>
                </div>
            </div>
            <hr class='my-2'>
        </div>";
        }
    
    endforeach;
}
else{
    echo '<h5 style="color: grey;"><br>No Bookmarks Available.</h5>';
}

?>