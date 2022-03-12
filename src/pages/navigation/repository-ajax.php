<?php

session_start();

include '../../process/connection.php';

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$results_per_page = 5;
$offset = ($page - 1) * $results_per_page;

if (mysqli_connect_errno()) {
    exit("Failed to connect to the database: " . mysqli_connect_error());
};

$query = "SELECT
fi.*,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, ii.*, ji.*, ci.* FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id LEFT JOIN coauthors_information AS ci on ci.group_id = fi.coauthor_group_id WHERE fi.status = 'published'";

if (isset($_GET['exists'])) {
    if ($_GET['exists'] == 'anywhere') {
        if (isset($_GET['word_search']) && $_GET['word_search'] != '') {
            $words_exists = " AND (";
            $words_exists_array = explode(" ", $_GET['word_search']);
            foreach ($words_exists_array as $key => $word) {
                $words_exists .= "ri.research_title LIKE '%$word%' OR ri.research_abstract LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ji.journal_subtitle LIKE '%$word%' OR ji.journal_description LIKE '%$word%' OR ii.infographic_title LIKE '%$word%' LIKE '%$word%' OR ii.infographic_description LIKE '%$word%'";
                if ($key < count($words_exists_array) - 1) {
                    $words_exists .= " AND ";
                }
            }
            $words_exists .= ") ";
            $query .= $words_exists;
        }
        if (isset($_GET['phrase_search']) && $_GET['phrase_search'] != '') {
            $phrase_exists = " AND (ri.research_title LIKE '%{$_GET["phrase_search"]}%' OR ri.research_abstract LIKE '%{$_GET["phrase_search"]}%' OR ji.journal_title LIKE '%{$_GET["phrase_search"]}%' OR ji.journal_subtitle LIKE '%{$_GET["phrase_search"]}%' OR ji.journal_description LIKE '%{$_GET["phrase_search"]}%' OR ii.infographic_title LIKE '%{$_GET["phrase_search"]}%' OR ii.infographic_description LIKE '%{$_GET["phrase_search"]}%')";
            $query .= $phrase_exists;
        }
        if (isset($_GET['word_exists']) && $_GET['word_exists'] != '') {
            $word_list_exists = " AND (";
            $word_list_exists_array = explode(" ", $_GET['word_exists']);
            foreach ($word_list_exists_array as $key => $word) {
                $word_list_exists .= "ri.research_title LIKE '%$word%' OR ri.research_abstract LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ji.journal_subtitle LIKE '%$word%' OR ji.journal_description LIKE '%$word%' OR ii.infographic_title LIKE '%$word%' LIKE '%$word%' OR ii.infographic_description LIKE '%$word%'";
                if ($key < count($word_list_exists_array) - 1) {
                    $word_list_exists .= " OR ";
                }
            }
            $word_list_exists .= ") ";
            $query .= $word_list_exists;
        }
        if (isset($_GET['word_not_exists']) && $_GET['word_not_exists'] != '') {
            $word_list_not_exists = " AND (";
            $word_list_not_exists_array = explode(" ", $_GET['word_not_exists']);
            foreach ($word_list_not_exists_array as $key => $word) {
                $word_list_not_exists .= "(ri.research_title NOT LIKE '%$word%' AND ri.research_abstract NOT LIKE '%$word%') OR (ji.journal_title NOT LIKE '%$word%' AND ji.journal_subtitle NOT LIKE '%$word%' AND ji.journal_description NOT LIKE '%$word%') OR (ii.infographic_title NOT LIKE '%$word%' AND ii.infographic_description NOT LIKE '%$word%')";
                if ($key < count($word_list_not_exists_array) - 1) {
                    $word_list_not_exists .= " OR ";
                }
            }
            $word_list_not_exists .= ") ";
            $query .= $word_list_not_exists;
        }
    } else if ($_GET['exists'] == 'title') {
        if (isset($_GET['word_search']) && $_GET['word_search'] != '') {
            $words_exists = " AND (";
            $words_exists_array = explode(" ", $_GET['word_search']);
            foreach ($words_exists_array as $key => $word) {
                $words_exists .= "ri.research_title LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ii.infographic_title LIKE '%$word%'";
                if ($key < count($words_exists_array) - 1) {
                    $words_exists .= " AND ";
                }
            }
            $words_exists .= ") ";
            $query .= $words_exists;
        }
        if (isset($_GET['phrase_search']) && $_GET['phrase_search'] != '') {
            $phrase_exists = " AND (ri.research_title LIKE '%{$_GET["phrase_search"]}%' OR ji.journal_title LIKE '%{$_GET["phrase_search"]}%' OR ii.infographic_title LIKE '%{$_GET["phrase_search"]}%')";
            $query .= $phrase_exists;
        }
        if (isset($_GET['word_exists']) && $_GET['word_exists'] != '') {
            $word_list_exists = " AND (";
            $word_list_exists_array = explode(" ", $_GET['word_exists']);
            foreach ($word_list_exists_array as $key => $word) {
                $word_list_exists .= "ri.research_title LIKE '%$word%' OR ji.journal_title LIKE '%$word%' OR ii.infographic_title LIKE '%$word%'";
                if ($key < count($word_list_exists_array) - 1) {
                    $word_list_exists .= " OR ";
                }
            }
            $word_list_exists .= ") ";
            $query .= $word_list_exists;
        }
        if (isset($_GET['word_not_exists']) && $_GET['word_not_exists'] != '') {
            $word_list_not_exists = " AND (";
            $word_list_not_exists_array = explode(" ", $_GET['word_not_exists']);
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
if (isset($_GET['authored_by']) && $_GET['authored_by'] != '') {
    $authored_by = " AND (ri.author_first_name LIKE '{$_GET['authored_by']}' OR ri.author_surname LIKE '{$_GET['authored_by']}' OR ii.author_first_name LIKE '{$_GET['authored_by']}' OR ii.author_surname LIKE '{$_GET['authored_by']}' OR ji.chief_editor_first_name LIKE '{$_GET['authored_by']}' OR ji.chief_editor_last_name LIKE '{$_GET['authored_by']}' OR coauthor1_first_name LIKE '{$_GET['authored_by']}' OR coauthor1_surname LIKE '{$_GET['authored_by']}' OR coauthor2_first_name LIKE '{$_GET['authored_by']}' OR coauthor2_surname LIKE '{$_GET['authored_by']}' OR coauthor3_first_name LIKE '{$_GET['authored_by']}' OR coauthor3_surname LIKE '{$_GET['authored_by']}' OR coauthor4_first_name LIKE '{$_GET['authored_by']}' OR coauthor4_surname LIKE '{$_GET['authored_by']}')";
    $query .= $authored_by;
}
if (isset($_GET['advanced_from_year']) && $_GET['advanced_from_year'] != '' && isset($_GET['advanced_to_year']) && $_GET['advanced_to_year'] != '') {
    $date_range = " AND (ri.publication_year BETWEEN {$_GET['advanced_from_year']} AND {$_GET['advanced_to_year']} OR ii.infographic_publication_year BETWEEN {$_GET['advanced_from_year']} AND {$_GET['advanced_to_year']})";
    $query .= $date_range;
}
if (isset($_GET['advanced_from_year']) && $_GET['advanced_from_year'] != '' && isset($_GET['advanced_to_year']) && $_GET['advanced_to_year'] == '') {
    $date_from = " AND (ri.publication_year >= {$_GET['advanced_from_year']} OR ii.infographic_publication_year >= {$_GET['advanced_from_year']})";
    $query .= $date_from;
}
if (isset($_GET['advanced_from_year']) && $_GET['advanced_from_year'] == '' && isset($_GET['advanced_to_year']) && $_GET['advanced_to_year'] != '') {
    $date_to = "AND (ri.publication_year <= {$_GET['advanced_to_year']} OR ii.infographic_publication_year <= {$_GET['advanced_to_year']})";
    $query .= $date_to;
}

if (isset($_GET['title_query']) && $_GET['title_query'] != '') {
    $search = " AND (ri.research_title LIKE '%{$_GET["title_query"]}%' OR ji.journal_title LIKE '%{$_GET["title_query"]}%' OR ii.infographic_title LIKE '%{$_GET["title_query"]}%')";
    $query .= $search;
}
if (isset($_GET['publication_year'])) {
    $year = " AND (";
    foreach ($_GET['publication_year'] as $key => $value) {
        $year .= "ri.publication_year = $value OR ii.infographic_publication_year = $value";
        if ($key < count($_GET['publication_year']) - 1) {
            $year .= " OR ";
        }
    }
    $year .= ") ";
    $query .= $year;
}
if (isset($_GET['from_year']) && $_GET['from_year'] != '' && isset($_GET['to_year']) && $_GET['to_year'] != '') {
    $year_range = " AND (ri.publication_year BETWEEN {$_GET['from_year']} AND {$_GET['to_year']} OR ii.infographic_publication_year BETWEEN {$_GET['from_year']} AND {$_GET['to_year']})";
    $query .= $year_range;
}
if (isset($_GET['from_year']) && $_GET['from_year'] != '' && isset($_GET['to_year']) && $_GET['to_year'] == '') {
    $from_year_range = " AND (ri.publication_year >= {$_GET['from_year']} OR ii.infographic_publication_year >= {$_GET['from_year']})";
    $query .= $from_year_range;
}
if (isset($_GET['from_year']) && $_GET['from_year'] == '' && isset($_GET['to_year']) && $_GET['to_year'] != '') {
    $to_year_range = " AND (ri.publication_year <= {$_GET['to_year']} OR ii.infographic_publication_year <= {$_GET['to_year']})";
    $query .= $to_year_range;
}

if (isset($_GET['from_year']) && $_GET['from_year'] != '' && isset($_GET['to_year']) && $_GET['to_year'] != '') {
    $year_range = " AND (ri.publication_year BETWEEN {$_GET['from_year']} AND {$_GET['to_year']} OR ii.infographic_publication_year BETWEEN {$_GET['from_year']} AND {$_GET['to_year']})";
    $query .= $year_range;
}
if (isset($_GET['resource_type'])) {
    $resource_type = " AND (";
    foreach ($_GET['resource_type'] as $key => $value) {
        $resource_type .= "fi.file_type LIKE '$value' OR ri.resource_type LIKE '$value'";
        if ($key < count($_GET['resource_type']) - 1) {
            $resource_type .= " OR ";
        }
    }
    $resource_type .= ") ";
    $query .= $resource_type;
}
if (isset($_GET['research_field'])) {
    $research_field = " AND (";
    foreach ($_GET['research_field'] as $key => $value) {
        $research_field .= "ri.research_fields LIKE '%$value%'";
        if ($key < count($_GET['research_field']) - 1) {
            $research_field .= " OR ";
        }
    }
    $research_field .= ") ";
    $query .= $research_field;
}
if (isset($_GET['resource_unit'])) {
    $resource_unit = " AND (";
    foreach ($_GET['resource_unit'] as $key => $value) {
        $resource_unit .= "ri.research_unit LIKE '%$value%' OR ji.department LIKE '%$value%' OR ii.infographic_research_unit LIKE '%$value%'";
        if ($key < count($_GET['resource_unit']) - 1) {
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

$total_pages = ceil($total_rows / $results_per_page);

$statement = $connection->prepare($query . " ORDER BY fi.file_id ASC LIMIT ?, ?");
$statement->bind_param("ii", $offset, $results_per_page);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();

if ($page > $total_pages && $total_pages != 0) {
    echo '<h5 style="color: grey;"><br>No Results on this page. Please go back.</h5>';
}
foreach ($published as $key => $result) :
    if ($result['file_type'] === 'thesis') {
        echo "<div class='repositoryItem p-2'>
        <p class='fw-bold text-start' style='color: #012265;'>{$result['resource_type']} {$result['file_id']}</p>
        <a href='../../layouts/repository/view-article.php?id={$result['file_id']}' class='article-title'>
            <h4 class='fw-bold mb-3'>{$result['research_title']}</h4>
        </a>
        <p class='fw-bold'>{$result['researcher_surname']}, {$result['researcher_first_name'][0]}.";
        for ($i = 1; $i <= $result['research_coauthors_count']; $i++) {
            echo ", {$result["coauthor{$i}_surname"]}, {$result["coauthor{$i}_first_name"][0]}.";
        }
        echo "</p>
        <p class='fw-bold'>{$result['publication_year']}</p>
        <p>{$result['research_abstract']}</p>
        <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
        <hr class='my-2'>
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
    } else if ($result['file_type'] === 'infographic') {
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

endforeach;

if ($total_rows != 0) {
    echo "<div class='row repository-pagination' id='repository-pagination'>
        <nav aria-label='Page navigation'>
            <ul class='pagination d-flex justify-content-center'>";
    $previous_page = $page - 1;
    $next_page = $page + 1;
    if ($page != 1) {
        echo "<li class='page-item'><a class='page-link' href='?page=$previous_page'";
        echo " >Previous</a></li>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<li class='page-item active'><span class='page-link' id='current-page'>$i</span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='?page={$i}'>$i</a></li>";
        }
    }
    if ($page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=$next_page'";
        echo " >Next</a></li>";
    }
} else {
    echo '<h5 style="color: grey;"><br>No results found. Try another search filter.</h5>';
}
