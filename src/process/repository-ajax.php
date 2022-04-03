<?php

session_start();

include '../../includes/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
$results_per_page = 5;
$offset = ($page - 1) * $results_per_page;

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query = "SELECT
fi.*,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_date`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ii.*, ji.*, ci.* FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published'";

if (isset($_POST['exists'])) {
    if ($_POST['exists'] == 'anywhere') {
        if (isset($_POST['word_search']) && $_POST['word_search'] != '') {
            $words_exists = " AND (";
            $words_exists_array = explode(" ", $_POST['word_search']);
            foreach ($words_exists_array as $key => $word) {
                $words_exists .= "ri.research_title LIKE '%$word%' OR ri.research_abstract LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ji.journal_subtitle LIKE '%$word%' OR ji.journal_description LIKE '%$word%' OR ii.infographic_title LIKE '%$word%' LIKE '%$word%' OR ii.infographic_description LIKE '%$word%'";
                if ($key < count($words_exists_array) - 1) {
                    $words_exists .= " AND ";
                }
            }
            $words_exists .= ") ";
            $query .= $words_exists;
        }
        if (isset($_POST['phrase_search']) && $_POST['phrase_search'] != '') {
            $phrase_exists = " AND (ri.research_title LIKE '%{$_POST["phrase_search"]}%' OR ri.research_abstract LIKE '%{$_POST["phrase_search"]}%' OR ji.journal_title LIKE '%{$_POST["phrase_search"]}%' OR ji.journal_subtitle LIKE '%{$_POST["phrase_search"]}%' OR ji.journal_description LIKE '%{$_POST["phrase_search"]}%' OR ii.infographic_title LIKE '%{$_POST["phrase_search"]}%' OR ii.infographic_description LIKE '%{$_POST["phrase_search"]}%')";
            $query .= $phrase_exists;
        }
        if (isset($_POST['word_exists']) && $_POST['word_exists'] != '') {
            $word_list_exists = " AND (";
            $word_list_exists_array = explode(" ", $_POST['word_exists']);
            foreach ($word_list_exists_array as $key => $word) {
                $word_list_exists .= "ri.research_title LIKE '%$word%' OR ri.research_abstract LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ji.journal_subtitle LIKE '%$word%' OR ji.journal_description LIKE '%$word%' OR ii.infographic_title LIKE '%$word%' LIKE '%$word%' OR ii.infographic_description LIKE '%$word%'";
                if ($key < count($word_list_exists_array) - 1) {
                    $word_list_exists .= " OR ";
                }
            }
            $word_list_exists .= ") ";
            $query .= $word_list_exists;
        }
        if (isset($_POST['word_not_exists']) && $_POST['word_not_exists'] != '') {
            $word_list_not_exists = " AND (";
            $word_list_not_exists_array = explode(" ", $_POST['word_not_exists']);
            foreach ($word_list_not_exists_array as $key => $word) {
                $word_list_not_exists .= "(ri.research_title NOT LIKE '%$word%' AND ri.research_abstract NOT LIKE '%$word%') OR (ji.journal_title NOT LIKE '%$word%' AND ji.journal_subtitle NOT LIKE '%$word%' AND ji.journal_description NOT LIKE '%$word%') OR (ii.infographic_title NOT LIKE '%$word%' AND ii.infographic_description NOT LIKE '%$word%')";
                if ($key < count($word_list_not_exists_array) - 1) {
                    $word_list_not_exists .= " OR ";
                }
            }
            $word_list_not_exists .= ") ";
            $query .= $word_list_not_exists;
        }
    } else if ($_POST['exists'] == 'title') {
        if (isset($_POST['word_search']) && $_POST['word_search'] != '') {
            $words_exists = " AND (";
            $words_exists_array = explode(" ", $_POST['word_search']);
            foreach ($words_exists_array as $key => $word) {
                $words_exists .= "ri.research_title LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ii.infographic_title LIKE '%$word%'";
                if ($key < count($words_exists_array) - 1) {
                    $words_exists .= " AND ";
                }
            }
            $words_exists .= ") ";
            $query .= $words_exists;
        }
        if (isset($_POST['phrase_search']) && $_POST['phrase_search'] != '') {
            $phrase_exists = " AND (ri.research_title LIKE '%{$_POST["phrase_search"]}%' OR ji.journal_title LIKE '%{$_POST["phrase_search"]}%' OR ii.infographic_title LIKE '%{$_POST["phrase_search"]}%')";
            $query .= $phrase_exists;
        }
        if (isset($_POST['word_exists']) && $_POST['word_exists'] != '') {
            $word_list_exists = " AND (";
            $word_list_exists_array = explode(" ", $_POST['word_exists']);
            foreach ($word_list_exists_array as $key => $word) {
                $word_list_exists .= "ri.research_title LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ii.infographic_title LIKE '%$word%'";
                if ($key < count($word_list_exists_array) - 1) {
                    $word_list_exists .= " OR ";
                }
            }
            $word_list_exists .= ") ";
            $query .= $word_list_exists;
        }
        if (isset($_POST['word_not_exists']) && $_POST['word_not_exists'] != '') {
            $word_list_not_exists = " AND (";
            $word_list_not_exists_array = explode(" ", $_POST['word_not_exists']);
            foreach ($word_list_not_exists_array as $key => $word) {
                $word_list_not_exists .= "ri.research_title NOT LIKE '%$word%' OR ji.journal_title NOT LIKE '%$word%' OR ii.infographic_title NOT LIKE '%$word%'";
                if ($key < count($word_list_not_exists_array) - 1) {
                    $word_list_not_exists .= " OR ";
                }
            }
            $word_list_not_exists .= ") ";
            $query .= $word_list_not_exists;
        }
    }
}
if (isset($_POST['authored_by']) && $_POST['authored_by'] != '') {
    $authored_by = " AND (ri.author_first_name LIKE '{$_POST['authored_by']}' OR ri.author_surname LIKE '{$_POST['authored_by']}' OR ii.author_first_name LIKE '{$_POST['authored_by']}' OR ii.author_surname LIKE '{$_POST['authored_by']}' OR ji.chief_editor_first_name LIKE '{$_POST['authored_by']}' OR ji.chief_editor_last_name LIKE '{$_POST['authored_by']}' OR coauthor1_first_name LIKE '{$_POST['authored_by']}' OR coauthor1_surname LIKE '{$_POST['authored_by']}' OR coauthor2_first_name LIKE '{$_POST['authored_by']}' OR coauthor2_surname LIKE '{$_POST['authored_by']}' OR coauthor3_first_name LIKE '{$_POST['authored_by']}' OR coauthor3_surname LIKE '{$_POST['authored_by']}' OR coauthor4_first_name LIKE '{$_POST['authored_by']}' OR coauthor4_surname LIKE '{$_POST['authored_by']}')";
    $query .= $authored_by;
}
if (isset($_POST['advanced_from_year']) && $_POST['advanced_from_year'] != '' && isset($_POST['advanced_to_year']) && $_POST['advanced_to_year'] != '') {
    $date_range = " AND (YEAR(ri.publication_date) BETWEEN {$_POST['advanced_from_year']} AND {$_POST['advanced_to_year']} OR YEAR(ii.infographic_publication_date) BETWEEN {$_POST['advanced_from_year']} AND {$_POST['advanced_to_year']})";
    $query .= $date_range;
}
if (isset($_POST['advanced_from_year']) && $_POST['advanced_from_year'] != '' && isset($_POST['advanced_to_year']) && $_POST['advanced_to_year'] == '') {
    $date_from = " AND (YEAR(ri.publication_date) >= {$_POST['advanced_from_year']} OR YEAR(ii.infographic_publication_date) >= {$_POST['advanced_from_year']})";
    $query .= $date_from;
}
if (isset($_POST['advanced_from_year']) && $_POST['advanced_from_year'] == '' && isset($_POST['advanced_to_year']) && $_POST['advanced_to_year'] != '') {
    $date_to = "AND (YEAR(ri.publication_date) <= {$_POST['advanced_to_year']} OR YEAR(ii.infographic_publication_date) <= {$_POST['advanced_to_year']})";
    $query .= $date_to;
}

if (isset($_POST['title_query']) && $_POST['title_query'] != '') {
    $search = " AND (ri.research_title LIKE '%{$_POST["title_query"]}%' OR ji.journal_title LIKE '%{$_POST["title_query"]}%' OR ii.infographic_title LIKE '%{$_POST["title_query"]}%')";
    $query .= $search;
}
if (isset($_POST['publication_year'])) {
    $year = " AND (";
    foreach ($_POST['publication_year'] as $key => $value) {
        $year .= "YEAR(ri.publication_date) = $value OR YEAR(ii.infographic_publication_date) = $value";
        if ($key < count($_POST['publication_year']) - 1) {
            $year .= " OR ";
        }
    }
    $year .= ") ";
    $query .= $year;
}
if (isset($_POST['from_year']) && $_POST['from_year'] != '' && isset($_POST['to_year']) && $_POST['to_year'] != '') {
    $year_range = " AND (YEAR(ri.publication_date) BETWEEN {$_POST['from_year']} AND {$_POST['to_year']} OR YEAR(ii.infographic_publication_date) BETWEEN {$_POST['from_year']} AND {$_POST['to_year']})";
    $query .= $year_range;
}
if (isset($_POST['from_year']) && $_POST['from_year'] != '' && isset($_POST['to_year']) && $_POST['to_year'] == '') {
    $from_year_range = " AND (YEAR(ri.publication_date) >= {$_POST['from_year']} OR YEAR(ii.infographic_publication_date) >= {$_POST['from_year']})";
    $query .= $from_year_range;
}
if (isset($_POST['from_year']) && $_POST['from_year'] == '' && isset($_POST['to_year']) && $_POST['to_year'] != '') {
    $to_year_range = " AND (YEAR(ri.publication_date) <= {$_POST['to_year']} OR YEAR(ii.infographic_publication_date) <= {$_POST['to_year']})";
    $query .= $to_year_range;
}

if (isset($_POST['from_year']) && $_POST['from_year'] != '' && isset($_POST['to_year']) && $_POST['to_year'] != '') {
    $year_range = " AND (YEAR(ri.publication_date) BETWEEN {$_POST['from_year']} AND {$_POST['to_year']} OR YEAR(ii.infographic_publication_date) BETWEEN {$_POST['from_year']} AND {$_POST['to_year']})";
    $query .= $year_range;
}
if (isset($_POST['resource_type'])) {
    $resource_type = " AND (";
    foreach ($_POST['resource_type'] as $key => $value) {
        $resource_type .= "ri.resource_type LIKE '$value'";
        if ($key < count($_POST['resource_type']) - 1) {
            $resource_type .= " OR ";
        }
    }
    $resource_type .= ") ";
    $query .= $resource_type;
}
if (isset($_POST['research_field'])) {
    $research_field = " AND (";
    foreach ($_POST['research_field'] as $key => $value) {
        $research_field .= "ri.research_fields LIKE '%$value%'";
        if ($key < count($_POST['research_field']) - 1) {
            $research_field .= " OR ";
        }
    }
    $research_field .= ") ";
    $query .= $research_field;
}
if (isset($_POST['resource_unit'])) {
    $resource_unit = " AND (";
    foreach ($_POST['resource_unit'] as $key => $value) {
        $resource_unit .= "ri.research_unit LIKE '%$value%' OR ji.department LIKE '%$value%'";
        if ($key < count($_POST['resource_unit']) - 1) {
            $resource_unit .= " OR ";
        }
    }
    $resource_unit .= ") ";
    $query .= $resource_unit;
}
if (isset($_POST['researcher_category'])) {
    $researcher_category = " AND (";
    foreach ($_POST['researcher_category'] as $key => $value) {
        $researcher_category .= "ri.researchers_category LIKE '%$value%'";
        if ($key < count($_POST['researcher_category']) - 1) {
            $researcher_category .= " OR ";
        }
    }
    $researcher_category .= ") ";
    $query .= $researcher_category;
}


$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->get_result();
$total_rows = mysqli_num_rows($result);
$statement->close();

$total_pages = ceil($total_rows / $results_per_page);

$statement = $connection->prepare($query . " ORDER BY fi.file_id ASC LIMIT ?, ?");
$statement->bind_param("ii", $offset, $results_per_page);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

$statement = $connection->prepare("SELECT * FROM user_bookmarks WHERE user_id = ?");
$statement->bind_param("i", $_SESSION["userid"]);
$statement->execute();
$result = $statement->get_result();
$bookmarks = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();



if ($page > $total_pages && $total_pages != 0) {
    echo '<h5 style="color: grey;"><br>No Results on this page. Please go back.</h5>';
}
// function to escape all results in $results array
function filter(&$value){
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
foreach ($published as $key => $result) :
    array_walk_recursive($result,"filter");
    if ($result['file_type'] === 'thesis') {
        $date_time = date_create($result['publication_date']);
        $date_time = date_format($date_time,"M d, Y");
        echo "<div class='repositoryItem p-2'>
        <p class='fw-bold text-start' style='color: #012265;'>{$result['resource_type']} </p>
        <a href='repository/view-article.php?id={$result['file_id']}' class='article-title'>
            <h4 class='fw-bold mb-3'>{$result['research_title']}</h4>
        </a>
        <p class='fw-bold'>{$result['researcher_surname']}, {$result['researcher_first_name']}";
        for ($i = 1; $i <= $result['research_coauthors_count']; $i++) {
            echo ", {$result["coauthor{$i}_surname"]}, {$result["coauthor{$i}_first_name"]}";
        }
        echo "</p>
        <p class='fw-bold'>{$date_time}</p>
        <p>{$result['research_abstract']}</p>";
        if(in_array($result['file_id'],array_column($bookmarks,'ref_id'))){
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
                <p class='fw-bold' style='color: #012265;'>Journal </p>
            </div>
            <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
            <img src='src/{$result['file_dir2']}' width='150'>
            </div>
            <div class='col-sm-12 col-lg-10'>
                <div class='col'>
                    <a href='repository/view-article.php?id={$result['file_id']}' class='article-title'>
                        <h4 class='fw-bold mb-3'>{$result['journal_title']}</h4>
                    </a>
                    <h5 class='mb-3'>{$result['journal_subtitle']}</h5>
                    <p class='fw-bold'>Volume {$result['volume_number']} Series of {$result['serial_issue_number']}</p>
                    <p>{$result['journal_description']}</p>";
                    if(in_array($result['file_id'],array_column($bookmarks,'ref_id'))){
                        echo "<p class='del-bookmark' data-id={$result['file_id']}><i class='fas fa-bookmark me-2'></i> Added to Bookmarks</p>";;
                    }
                    else {
                        echo "<p class='add-bookmark' data-id={$result['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
                    }
                echo "</div>
            </div>
            <div class='col-sm-12 col-lg-2 d-none d-sm-none d-lg-block'>
                <img src='src/{$result['file_dir2']}' width='150'>
            </div>
        </div>
        <hr class='my-2'>
    </div>";
    } else if ($result['file_type'] === 'infographic') {
        $date_time = date_create($result['infographic_publication_date']);
        $date_time = date_format($date_time,"M d, Y");
        echo "<div class='repositoryItem p-2'>
        <div class='row'>
            <div class='text-start'>
                <p class='fw-bold' style='color: #012265;'>Infographic </p>
            </div>
            <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
            </div>
            <div class='col-sm-12 col-lg-10'>
                <div class='col'>
                    <a href='repository/view-article.php?id={$result['file_id']}' class='article-title'>
                        <h4 class='fw-bold mb-3'>{$result['infographic_title']}</h4>
                    </a>
                    <p class='fw-bold'>{$date_time}</p>
                    <p>{$result['infographic_description']}</p>";
                    if(in_array($result['file_id'],array_column($bookmarks,'ref_id'))){
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

if ($total_rows != 0) {
    echo "<div class='row repository-pagination mt-3' id='repository-pagination'>
        <nav aria-label='Page navigation'>
            <ul class='pagination d-flex justify-content-center'>";
    $previous_page = $page - 1;
    $next_page = $page + 1;
    if ($page != 1) {
        echo "<li class='page-item prev'><a class='page-link' data-id='$previous_page'>Previous</a></li>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<li class='page-item active'><span class='page-link' data-id='current-page'>$i</span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' data-id='$i'>$i</a></li>";
        }
    }
    if ($page < $total_pages) {
        echo "<li class='page-item next'><a class='page-link' data-id=$next_page>Next</a></li>";
    }
} else {
    echo '<h5 style="color: grey;"><br>No results found. Try another search filter.</h5>';
}
