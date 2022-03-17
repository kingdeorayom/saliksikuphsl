<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../../layouts/general/error.php");
    die();
}


?>

<section class='submit-research' style="font-family: 'Roboto';">
        <div class='container p-5'>
        <div class="row my-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item prev-dir-breadcrumb"><a href="../../pages/navigation/repository.php" style="color: #012265; text-decoration:none">Repository</a></li>
                <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page">View Article</li>
            </ol>
        </nav>
    </div>
            <div class='row'>

                <div class='col-lg-2 col-md-12 col-sm-12'>
                    <h5 class='fw-bold'>Article Metrics</h5>
                    <hr>
                    <h3>123</h3>
                    <p>Views</p>
                    <hr>
                    <h3>24</h3>
                    <p>Downloads</p>
                    <hr>
                </div>

                <div class='col-lg-9 col-md-12 col-xs-12 mx-auto main-column'>
                    <h2><?php echo $fileInfo['research_title'] ?></h2>
                    <hr class='my-4'>
                    <p class='fw-bold'>
                    <?php
                    echo $fileInfo['author_surname'].", ".$fileInfo['author_first_name'][0].".";
                    for($i = 1; $i <= $fileInfo['coauthors_count']; $i++) {
                        echo ", {$fileInfo["coauthor{$i}_surname"]}, {$fileInfo["coauthor{$i}_first_name"][0]}.";
                    }
                    ?>
                    <?php echo "<p>{$fileInfo['publication_year']}, {$fileInfo['publication_month']} {$fileInfo['publication_day']}</p>"?>
                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                    <h3 class='mt-5'>Abstract</h3>
                    <?php echo "<p>{$fileInfo['research_abstract']}</p>"?>
                    <p class='fw-bold'>Keywords: </p>
                    <?php echo "<p class='fst-italic'>{$fileInfo['keywords']}</p>" ?> 

                    <div class='row my-4'>
                        <p class='fw-bold mb-3'>Attached Files</p>
                        <div class='col'>
                            <button class='btn button-file mx-1 rounded-0'><i class='far fa-file-pdf me-2' style="color: red;"></i> Full manuscript.pdf</button>
                            <button class='btn button-file mx-1 my-2 rounded-0'><i class='far fa-file-pdf me-2' style="color: red;"></i> Survey questionnaire.pdf</button>
                        </div>
                    </div>

                    <div class='row my-3'>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Resource Type</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo $fileInfo['resource_type'] ?></p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Researcher's Category</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo $fileInfo['researchers_category'] ?></p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Unit</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo $fileInfo['research_unit'] ?></p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Field</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo $fileInfo['research_fields'] ?></p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>