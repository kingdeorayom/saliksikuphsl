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

$statement = $connection->prepare("SELECT COUNT(*) FROM file_information WHERE status = 'published'");
$statement->execute();
$result = $statement->get_result();
$total_rows = $result->fetch_array()[0];
$statement->close();

$total_pages = ceil($total_rows/$results_per_page);

$query = "SELECT `file_id`,`file_type`,`file_name`,`file_dir`,`file_uploader`,`status`,`research_id`,`resource_type`,`researchers_category`,`research_unit`,`research_title`,`research_abstract`,`research_fields`,`keywords`,`publication_month`,`publication_day`,`publication_year`,ri.coauthors_count AS `research_coauthors_count`,ri.author_first_name AS researcher_first_name, ri.author_middle_initial AS researcher_middle_initial, ri.author_surname AS researcher_surname, ri.author_name_ext AS researcher_name_ext, ri.author_email AS researcher_email, `infographic_research_unit`, `infographic_researcher_category`,`infographic_publication_month`, `infographic_publication_year`, `infographic_title`, `infographic_description`, ii.author_first_name, ii.author_middle_initial, ii.author_surname, ii.author_ext, ii.author_email, ii.editor_first_name, ii.editor_middle_initial, ii.editor_surname, ii.editor_ext, ii.editor_email, ji.journal_title, ji.journal_subtitle, ji.department, ji.volume_number, ji.serial_issue_number, ji.ISSN, ji.journal_description, ji.chief_editor_first_name, ji.chief_editor_middle_initial, ji.chief_editor_last_name, ji.chief_editor_name_ext, ji.chief_editor_email FROM file_information AS fi LEFT JOIN research_information as ri ON ri.file_ref_id=fi.file_id LEFT JOIN journal_information AS ji ON ji.file_ref_id=fi.file_id LEFT JOIN infographic_information AS ii ON ii.file_ref_id=fi.file_id WHERE fi.status = 'published' ORDER BY fi.file_id ASC LIMIT ?, ?";
$statement = $connection->prepare($query);
$statement->bind_param("ii",$offset,$results_per_page);
$statement->execute();
$result = $statement->get_result();
$published = $result->fetch_all(MYSQLI_ASSOC);
$statement->close();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repository</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../styles/custom/pages/repository-style.css" type="text/css">
</head>

<body>
    <!--Header and Navigation section-->

    <?php include_once '../../layouts/general/header.php' ?>

    <!-- Search Section -->
    <section class="search-section p-5" style="font-family: 'Roboto';">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 id="masthead-title-text">Search the repository</h2>

                    <div class="input-group my-3">
                        <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2">
                        <button class="btn text-light rounded-0 search-button btn-lg" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center mb-3">
                    <a href="#"><button class="btn btn-link btn-lg search-option-buttons" type="button" id="button-addon2"><i class="fas fa-search fa-2x p-3" style="color: gray;"></i><br>Advanced Search</button></a>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <a href="#"><button class="btn btn-link btn-lg search-option-buttons" type="button" id="button-addon2"><i class="fas fa-book fa-2x p-3" style="color: gray;"></i><br>Browse Researches</button></a>
                </div>
            </div>
        </div>
    </section>

    <section class="submit-research" style="font-family: 'Roboto';">
        <div class="container px-4 py-5">

            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block">
                    <p class="fw-bold"><i class="fas fa-filter"></i> SEARCH FILTERS</p>
                    <hr>
                    <p class="side-menu-text fw-bold">Publication Year</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2021" id="checkBox2021">
                        <label class="form-check-label" for="checkBox2021">2021</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2020" id="checkBox2020">
                        <label class="form-check-label" for="checkBox2020">2020</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2019" id="checkBox2019">
                        <label class="form-check-label" for="checkBox2019">2019</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2018" id="checkBox2018">
                        <label class="form-check-label" for="checkBox2018">2018</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="2017" id="checkBox2017">
                        <label class="form-check-label" for="checkBox2017">2017</label>
                    </div>
                    <a class="my-3 text-dark" data-bs-toggle="collapse" href="#customRangeCollapse" role="button" aria-expanded="false" aria-controls="collapseExample">Custom Range</a>
                    <div class="collapse" id="customRangeCollapse">
                        <div class="input-group my-3">
                            <input type="text" class="form-control">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <p class="side-menu-text fw-bold">Resource Type</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="dissertation" id="checkBoxDissertation">
                        <label class="form-check-label" for="checkBoxDissertation">Dissertation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="thesis" id="checkBoxThesis">
                        <label class="form-check-label" for="checkBoxThesis">Thesis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="journal" id="checkBoxJournal">
                        <label class="form-check-label" for="checkBoxJournal">Journal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="infographics" id="checkBoxInfographics">
                        <label class="form-check-label" for="checkBoxInfographics">Infographics</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="annual_report" id="checkBoxAnnualReport">
                        <label class="form-check-label" for="checkBoxAnnualReport">Annual Report</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="research_agenda" id="checkBoxResearchAgenda">
                        <label class="form-check-label" for="checkBoxResearchAgenda">Research Agenda</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="research_competency_development_program" id="checkBoxRCDP">
                        <label class="form-check-label" for="checkBoxRCDP">Research Competency Development Program</label>
                    </div>
                    <hr>
                    <p class="side-menu-text fw-bold">Research Field</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxAccountancyMarketing">
                        <label class="form-check-label" for="checkBoxAccountancyMarketing">Accountancy and Marketing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxArtsHumanities">
                        <label class="form-check-label" for="checkBoxArtsHumanities">Arts and Humanities</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxEducationalManagement">
                        <label class="form-check-label" for="checkBoxEducationalManagement">Educational Management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxEducationSocialSciences">
                        <label class="form-check-label" for="checkBoxEducationSocialSciences">Education and Social Sciences</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxBusinessManagement">
                        <label class="form-check-label" for="checkBoxBusinessManagement">Business Management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxHealthSciences">
                        <label class="form-check-label" for="checkBoxHealthSciences">Health and Sciences</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxITEngineering">
                        <label class="form-check-label" for="checkBoxITEngineering">IT and Engineering</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxLawJusticeSystem">
                        <label class="form-check-label" for="checkBoxLawJusticeSystem">Law and Justice System</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxMarineAviation">
                        <label class="form-check-label" for="checkBoxMarineAviation">Marine and Aviation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxTourismHospitality">
                        <label class="form-check-label" for="checkBoxTourismHospitality">Tourism and Hospitality</label>
                    </div>
                    <hr>
                    <p class="side-menu-text fw-bold">Research Unit</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxBasicEducation">
                        <label class="form-check-label" for="checkBoxBasicEducation">Basic Education</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxSeniorHighSchool">
                        <label class="form-check-label" for="checkBoxSeniorHighSchool">Senior High School</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxArtsSciences">
                        <label class="form-check-label" for="checkBoxArtsSciences">Arts and Sciences</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxBusinessAccountancy">
                        <label class="form-check-label" for="checkBoxBusinessAccountancy">Business and Accountancy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxCriminology">
                        <label class="form-check-label" for="checkBoxCriminology">Criminology</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxComputerStudies">
                        <label class="form-check-label" for="checkBoxComputerStudies">Computer Studies</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxEducation">
                        <label class="form-check-label" for="checkBoxEducation">Education</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxEngineering">
                        <label class="form-check-label" for="checkBoxEngineering">Engineering</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxHospitalityManagement">
                        <label class="form-check-label" for="checkBoxHospitalityManagement">International Hospitality Management</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxMaritime">
                        <label class="form-check-label" for="checkBoxMaritime">Maritime</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkBoxGraduateSchool">
                        <label class="form-check-label" for="checkBoxGraduateSchool">Graduate School</label>
                    </div>
                </div>

                
                <div class="col-lg-10 col-md-12 col-xs-12 main-column">
                    <h1>Suggestions</h1>
                    <hr class="my-2">
                    <?php foreach($published as $key=>$result):
                                if ($result['file_type'] === 'thesis') {
                                    echo "<div class='repositoryItem p-2'>
                                    <p class='fw-bold text-start' style='color: #012265;'>{$result['resource_type']} {$result['file_id']}</p>
                                    <a href='../../layouts/repository/view-article.php' class='article-title'>
                                        <h4 class='fw-bold mb-3'>{$result['research_title']}</h4>
                                    </a>
                                    <p class='fw-bold'>Jallorina, A., Galicia, L.</p>
                                    <p class='fw-bold'>{$result['publication_year']}</p>
                                    <p>{$result['research_abstract']}</p>
                                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                                    <hr class='my-2'>
                                </div>";
                                }
                                else if ($result['file_type'] === 'journal'){
                                    echo "<div class='repositoryItem p-2'>
                                    <div class='row'>
                                        <div class='text-start'>
                                            <p class='fw-bold' style='color: #012265;'>Journal {$result['file_id']}</p>
                                        </div>
                                        <div class='col-sm-12 col-lg-2 d-sm-block d-lg-none text-center mb-3 mt-1'>
                                            <img src='../../../assets/images/dump/u135.svg' width='150'>
                                        </div>
                                        <div class='col-sm-12 col-lg-10'>
                                            <div class='col'>
                                                <a href='../../layouts/repository/view-article.php' class='article-title'>
                                                    <h4 class='fw-bold mb-3'>{$result['journal_title']}</h4>
                                                </a>
                                                <h5 class='mb-3'>{$result['journal_subtitle']}</h5>
                                                <p class='fw-bold'>Volume 11 Series of 2019</p>
                                                <p>The BRIEF (Business Research Innovations and Educational Forum) is a collection of faculty and student researches in 2019.</p>
                                                <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                                            </div>
                                        </div>
                                        <div class='col-sm-12 col-lg-2 d-none d-sm-none d-lg-block'>
                                            <img src='../../../assets/images/dump/u135.svg' width='150'>
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
                                            <img src='../../../assets/images/dump/u148.svg' width='150'>
                                        </div>
                                        <div class='col-sm-12 col-lg-10'>
                                            <div class='col'>
                                                <a href='../../layouts/repository/view-article.php' class='article-title'>
                                                    <h4 class='fw-bold mb-3'>{$result['infographic_title']}</h4>
                                                </a>
                                                <h5 class='mb-3'>{$result['infographic_publication_year']}</h5>
                                                <p class='fw-bold'>Volume 11 Series of 2019</p>
                                                <p>{$result['infographic_description']}</p>
                                                <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                                            </div>
                                        </div>
                                        <div class='col-sm-12 col-lg-2 d-none d-sm-none d-lg-block'>
                                            <img src='../../../assets/images/dump/u148.svg' width='150'>
                                        </div>
                                    </div>
                                    <hr class='my-2'>
                                </div>";
                                }
                                ?>
                            <?php endforeach ?>
                    

                    

                    <div class="row repository-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item" <?php if($page==1){ echo 'hidden';} ?>><a class="page-link" href="" >Previous</a></li>
                                <?php for ($i=1; $i <= $total_pages; $i++){ 
                                    if($i==$page){
                                        echo "<li class='page-item active'><span class='page-link' href='?page={$i}'>$i</span></li>";
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link' href='?page={$i}'>$i</a></li>";
                                    }
                                } ?>
                                <li class="page-item" <?php if($page==$total_pages){echo 'hidden';} ?>><a class="page-link" href=<?php echo '?page='.$page+1?>>Next</a></li>
                            </ul>
                            
                        </nav>
                    </div>

                </div>

            </div>

        </div>
    </section>


    <!--Footer section-->

    <?php include_once '../../layouts/general/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>