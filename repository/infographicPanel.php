<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=".urlencode($_SERVER['REQUEST_URI']));
    die();
}

$date_time = date_create($fileInfo['infographic_publication_date']);
$date_time = date_format($date_time,"F Y");
?>

<section class='submit-research' style="font-family: 'Roboto';">
        <div class='container p-5'>
        <div class="row my-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item prev-dir-breadcrumb"><a href="../repository.php" style="color: #012265; text-decoration:none">Repository</a></li>
                <li class="breadcrumb-item active active-dir-breadcrumb" aria-current="page">View Article</li>
            </ol>
        </nav>
    </div>
            <div class='row'>

                <div class='col-lg-2 col-md-12 col-sm-12'>
                    <h5 class='fw-bold'>Article Metrics</h5>
                    <hr>
                    <h3><?php echo $article_visits['hits']?></h3>
                    <p>Views</p>
                    <hr>
                    <!-- <h3>24</h3>
                    <p>Downloads</p>
                    <hr> -->
                </div>

                <div class='col-lg-9 col-md-12 col-xs-12 mx-auto main-column'>
                    <h2><?php echo htmlspecialchars($fileInfo['infographic_title']); ?></h2>
                    <hr class='my-4'>
                    <p class='fw-bold'><?php
                    echo htmlspecialchars($fileInfo['author_surname'].", ".$fileInfo['author_first_name']);
                    for($i = 1; $i <= $fileInfo['coauthors_count']; $i++) {
                        echo htmlspecialchars(", {$fileInfo["coauthor{$i}_surname"]}, {$fileInfo["coauthor{$i}_first_name"]}.");
                    }
                    ?>
                    <p><?php echo $date_time?></p>
                    <?php  if(in_array($fileInfo['file_id'],array_column($bookmarks,'ref_id'))){
                        echo "<p class='del-bookmark' data-id={$fileInfo['file_id']}><i class='fas fa-bookmark me-2'></i> Remove from Bookmarks</p>";;
                    }
                    else {
                        echo "<p class='add-bookmark' data-id={$fileInfo['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
                    }
                    ?>
                    <h3 class='mt-5'>Abstract</h3>
                    <p><?php echo htmlspecialchars($fileInfo['infographic_description']) ?></p>

                    <div class='row my-4'>
                        <label class='fw-bold mb-3'>Attached Files</label>
                        <div class='col'>
                        <?php if($fileInfo['file1_shown']):?>
                            <a href="../src/<?php echo $fileInfo['file_dir'] ?>" target="_blank"><button class='btn button-file mx-1 rounded-0'><i class='far fa-file-pdf me-2' style="color: red;"></i>Infographic</button></a>
                        <?php endif?>
                        </div>
                    </div>

                    <div class='row my-5'>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Resource Type</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>Infographic</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Author</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo htmlspecialchars("{$fileInfo['author_first_name']} {$fileInfo['author_surname']}") ?></p>
                        </div>
                        <?php if(!empty($fileInfo['coauthor1_first_name'])){
                            echo "<div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Contributors</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>".htmlspecialchars($fileInfo['coauthor1_first_name']." ".$fileInfo['coauthor1_surname']) ."</p>
                            <p class='my-3'>".htmlspecialchars($fileInfo['coauthor2_first_name']." ".$fileInfo['coauthor2_surname']) ."</p>
                            <p class='my-3'>".htmlspecialchars($fileInfo['coauthor3_first_name']." ".$fileInfo['coauthor3_surname']) ."</p>
                            <p class='my-3'>".htmlspecialchars($fileInfo['coauthor4_first_name']." ".$fileInfo['coauthor4_surname']) ."</p>
                        </div>";} ?>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Graphics Editor</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo htmlspecialchars("{$fileInfo['editor_first_name']} {$fileInfo['editor_surname']}") ?></p>
                        </div>
                        
                    </div>

                </div>

            </div>

        </div>
    </section>
