<?php

session_start();

include '../../process/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
} 
$results_per_page = 5;
$offset = ($page-1) * $results_per_page;  

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query = "SELECT `file_id`,`file_type`,`file_name`,`file_dir`,`file_dir2`,`file_uploader`,`status`,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, `infographic_research_unit`, `infographic_researcher_category`,`infographic_publication_month`, `infographic_publication_year`, `infographic_title`, `infographic_description`, ii.author_first_name, ii.author_middle_initial, ii.author_surname, ii.author_ext, ii.author_email, ii.editor_first_name, ii.editor_middle_initial, ii.editor_surname, ii.editor_ext, ii.editor_email, ji.journal_title, ji.journal_subtitle, ji.department, ji.volume_number, ji.serial_issue_number, ji.ISSN, ji.journal_description, ji.chief_editor_first_name, ji.chief_editor_middle_initial, ji.chief_editor_last_name, ji.chief_editor_name_ext, ji.chief_editor_email, ci.coauthor1_first_name, ci.coauthor1_middle_initial, ci.coauthor1_surname, ci.coauthor1_name_ext, ci.coauthor1_email, ci.coauthor2_first_name, ci.coauthor2_middle_initial, ci.coauthor2_surname, ci.coauthor2_name_ext, ci.coauthor2_email, ci.coauthor3_first_name, ci.coauthor3_middle_initial, ci.coauthor3_surname, ci.coauthor3_name_ext, ci.coauthor3_email, ci.coauthor4_first_name, ci.coauthor4_middle_initial, ci.coauthor4_surname, ci.coauthor4_name_ext, ci.coauthor4_email FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published'";

if(isset($_GET['title_query']) && $_GET['title_query']!=''){
    $search = " AND (ri.research_title LIKE '%{$_GET["title_query"]}%' OR ji.journal_title LIKE '%{$_GET["title_query"]}%' OR ii.infographic_title LIKE '%{$_GET["title_query"]}%')";
    $query .= $search;
}
if(isset($_GET['publication_year'])){
    $year = " AND (";
    foreach($_GET['publication_year'] as $key => $value){
        $year .= "ri.publication_year = $value OR ii.infographic_publication_year = $value";
        if ($key < count($_GET['publication_year'])-1){
            $year .= " OR ";
        }
    }
    $year .= ") ";
    $query .= $year;
}
if(isset($_GET['resource_type'])){
    $resource_type = " AND (";
    foreach($_GET['resource_type'] as $key => $value){
        $resource_type .= "fi.file_type LIKE '$value' OR ri.resource_type LIKE '$value'";
        if ($key < count($_GET['resource_type'])-1){
            $resource_type .= " OR ";
        }
    }
    $resource_type .= ") ";
    $query .= $resource_type;
}
if(isset($_GET['research_field'])){
    $research_field = " AND (";
    foreach($_GET['research_field'] as $key => $value){
        $research_field .= "ri.research_fields LIKE '%$value%'";
        if ($key < count($_GET['research_field'])-1){
            $research_field .= " OR ";
        }
    }
    $research_field .= ") ";
    $query .= $research_field;
}
if(isset($_GET['resource_unit'])){
    $resource_unit = " AND (";
    foreach($_GET['resource_unit'] as $key => $value){
        $resource_unit .= "ri.research_unit LIKE '%$value%' OR ji.department LIKE '%$value%' OR ii.infographic_research_unit LIKE '%$value%'";
        if ($key < count($_GET['resource_unit'])-1){
            $resource_unit .= " OR ";
        }
    }
    $resource_unit .= ") ";
    $query .= $resource_unit;
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->get_result();
$total_rows = mysqli_num_rows($result);
$statement->close();

$total_pages = ceil($total_rows/$results_per_page);

$statement = $connection->prepare($query." ORDER BY fi.file_id ASC LIMIT ?, ?");
$statement->bind_param("ii",$offset,$results_per_page);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

foreach($published as $key=>$result):
    if ($result['file_type'] === 'thesis') {
        echo "<div class='repositoryItem p-2'>
        <p class='fw-bold text-start' style='color: #012265;'>{$result['resource_type']} {$result['file_id']}</p>
        <a href='../../layouts/repository/view-article.php?id={$result['file_id']}' class='article-title'>
            <h4 class='fw-bold mb-3'>{$result['research_title']}</h4>
        </a>
        <p class='fw-bold'>{$result['researcher_surname']}, {$result['researcher_first_name'][0]}.";       
        for($i=1;$i<=$result['research_coauthors_count'];$i++){
            echo ", {$result["coauthor{$i}_surname"]}, {$result["coauthor{$i}_first_name"][0]}.";
        }
        echo"</p>
        <p class='fw-bold'>{$result['publication_year']}</p>
        <p>{$result['research_abstract']}</p>
        <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
        <hr class='my-2'>
    </div>";
    }
    else if ($result['file_type'] === 'journal'){
        $journalImage = explode(".pdf",$result['file_dir']);
        $journalImageLink = $journalImage[0].".png";
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
                    <a href='../../layouts/repository/view-article.php?id={$result['file_id']}' class='article-title'>
                        <h4 class='fw-bold mb-3'>{$result['journal_title']}</h4>
                    </a>
                    <h5 class='mb-3'>{$result['journal_subtitle']}</h5>
                    <p class='fw-bold'>Volume 11 Series of 2019</p>
                    <p>{$result['journal_description']}</p>
                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                </div>
            </div>
            <div class='col-sm-12 col-lg-2 d-none d-sm-none d-lg-block'>
                <img src=../{$result['file_dir2']} width='150'>
            </div>
        </div>
        <hr class='my-2'>
    </div>";
    }
    else if ($result['file_type'] === 'infographic'){
        echo "<div class='repositoryItem p-2'>
        <div class='row'>
            <div class='text-start'>
                <p class='fw-bold' style='color: #012265;'>Infographic {$result['file_id']}</p>
            </div>
            <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
            </div>
            <div class='col-sm-12 col-lg-10'>
                <div class='col'>
                    <a href='../../layouts/repository/view-article.php?id={$result['file_id']}' class='article-title'>
                        <h4 class='fw-bold mb-3'>{$result['infographic_title']}</h4>
                    </a>
                    <h5 class='mb-3'>{$result['infographic_publication_year']}</h5>
                    <p class='fw-bold'>Volume 11 Series of 2019</p>
                    <p>{$result['infographic_description']}</p>
                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                </div>
            </div>
        </div>
        <hr class='my-2'>
    </div>";
    }

endforeach ;


echo "<div class='row repository-pagination' id='repository-pagination'>
        <nav aria-label='Page navigation'>
            <ul class='pagination d-flex justify-content-center'>";
if($page!=1){
    echo "<li class='page-item'><a class='page-link' href='?page='".$page-1;
    echo " >Previous</a></li>";
}
for ($i=1; $i <= $total_pages; $i++){
    if($i==$page){
        echo "<li class='page-item active'><span class='page-link' id='current-page'>$i</span></li>";
    }
    else{
        echo "<li class='page-item'><a class='page-link' href='?page={$i}'>$i</a></li>";
    }
}
if($page<$total_pages){
    echo "<li class='page-item'><a class='page-link' href='?page='".$page+1;
    echo " >Next</a></li>";
}
?>