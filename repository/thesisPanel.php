<?php

if (!isset($_SESSION['isLoggedIn'])) {
    header("location: ../index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    die();
}

$date_time = date_create($fileInfo['publication_date']);
$date_time = date_format($date_time, "F Y");
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
                <h3><?php echo $article_visits['hits'] ?></h3>
                <p>Views</p>
                <hr class="mb-5">
                <!-- <h3>24</h3>
                    <p>Downloads</p>
                    <hr> -->
            </div>

            <div class='col-lg-9 col-md-12 col-xs-12 mx-auto main-column'>
                <h2>
                    <?php echo htmlspecialchars($fileInfo['research_title']) ?>
                    <?php if ($_SESSION['userType'] == 'admin') {
                        echo "<a target='_blank' class='edit-submission-icon' href='../admin/submissions/view.php?id=" . $_GET['id'] . "'><i class='fas fa-edit h6'></i></a>";
                    } ?>
                </h2>
                <hr class='my-4'>
                <p class='fw-bold'>
                    <?php
                    echo htmlspecialchars($fileInfo['author_first_name'] . " " . $fileInfo['author_surname']);
                    for ($i = 1; $i <= $fileInfo['coauthors_count']; $i++) {
                        echo htmlspecialchars(", {$fileInfo["coauthor{$i}_first_name"]} {$fileInfo["coauthor{$i}_surname"]}");
                    }
                    ?>
                <p><?php echo $date_time ?> </p>
                <?php if (in_array($fileInfo['file_id'], array_column($bookmarks, 'ref_id'))) {
                    echo "<p class='del-bookmark' data-id={$fileInfo['file_id']}><i class='fas fa-bookmark me-2'></i> Remove from Bookmarks</p>";;
                } else {
                    echo "<p class='add-bookmark' data-id={$fileInfo['file_id']}><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>";
                }
                ?>
                <h3 class='mt-5'>Abstract</h3>
                <p><?php echo htmlspecialchars($fileInfo['research_abstract']) ?></p>
                <p class='fw-bold'>Keywords: </p>
                <p class='fst-italic'><?php echo htmlspecialchars($fileInfo['keywords']) ?></p>

                <div class='row my-4'>

                    <?php

                    if ($_SESSION['userType'] == 'admin') { // files always shown for admin
                        echo '<p class="fw-bold mb-3">Attached Files</p>';
                        echo '<div class="col">';

                        if ($fileInfo['file1_shown']) :

                            $fileExt = substr(strrchr($fileInfo['file_dir'], '.'), 1);

                            if ($fileExt == 'pdf') {

                                echo '<a href="../src/' . $fileInfo['file_dir'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-pdf me-2\' style="color: red;"></i>Manuscript</button></a>';
                            } else if ($fileExt == 'docx') {
                                echo '<a href="./view-document.php?id=' . $fileInfo['file_id'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-word me-2\' style="color: blue;"></i>Manuscript</button></a>';
                            }

                        endif;

                        if ($fileInfo['file2_shown']) :

                            $fileExt2 = substr(strrchr($fileInfo['file_dir2'], '.'), 1);

                            if ($fileExt2 == 'pdf') {
                                echo '<a href="../src/' . $fileInfo['file_dir2'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-pdf me-2\' style="color: red;"></i>Survey Questionnaire</button></a>';
                            } else if ($fileExt2 == 'docx') {
                                echo '<a href="./view-document.php?id=' . $fileInfo['file_id'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-word me-2\' style="color: blue;"></i>Survey Questionnaire</button></a>';
                            }

                        endif;

                        echo '</div>';
                    } else if ($_SESSION['userType'] == 'user') {

                        if ($fileInfo['file1_shown'] || $fileInfo['file2_shown']) :
                            echo "<p class='fw-bold mb-3'>Attached Files</p>";
                        endif;

                        if (!$fileInfo['file1_shown'] && !$fileInfo['file2_shown']) :
                            echo "<div class='border border-1 bg-light'>
                                        <p class='my-3'><i class='fas fa-lock mx-1' style='color: #012265;'></i> To access the <strong>full manuscript</strong> and/or <strong>survey questionnaire</strong>, you may send a request through <a href='mailto:research@uphsl.edu.ph'>research@uphsl.edu.ph</a></p>
                                    </div>";
                        endif;

                        echo '<div class="col">';

                        if ($fileInfo['file1_shown']) :

                            $fileExt = substr(strrchr($fileInfo['file_dir'], '.'), 1);

                            if ($fileExt == 'pdf') {
                                echo '<a href="../src/' . $fileInfo['file_dir'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-pdf me-2\' style="color: red;"></i>Manuscript</button></a>';
                            } else if ($fileExt == 'docx') {
                                echo '<a href="./view-document.php?id=' . $fileInfo['file_id'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-word me-2\' style="color: blue;"></i>Manuscript</button></a>';
                            }
                        endif;

                        if ($fileInfo['file2_shown']) :

                            $fileExt2 = substr(strrchr($fileInfo['file_dir2'], '.'), 1);

                            if ($fileExt2 == 'pdf') {
                                echo '<a href="../src/' . $fileInfo['file_dir2'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-pdf me-2\' style="color: red;"></i>Survey Questionnaire</button></a>';
                            } else if ($fileExt2 == 'docx') {
                                echo '<a href="./view-document.php?id=' . $fileInfo['file_id'] . '" target="_blank"><button class=\'btn button-file m-1 rounded-0\'><i class=\'far fa-file-word me-2\' style="color: blue;"></i>Survey Questionnaire</button></a>';
                            }
                        endif;

                        echo '</div>';
                    }

                    ?>


                </div>

                <div class='row my-3'>
                    <div class='col-lg-3 border-top border-2'>
                        <h6 class='fw-bold my-3'>Resource Type</h6>
                    </div>
                    <div class='col-lg-9 border-top border-2'>
                        <p class='my-3'><?php echo htmlspecialchars($fileInfo['resource_type']) ?></p>
                    </div>
                    <div class='col-lg-3 border-top border-2'>
                        <h6 class='fw-bold my-3'>Researcher's Category</h6>
                    </div>
                    <div class='col-lg-9 border-top border-2'>
                        <p class='my-3'><?php echo htmlspecialchars($fileInfo['researchers_category']) ?></p>
                    </div>
                    <div class='col-lg-3 border-top border-2'>
                        <h6 class='fw-bold my-3'>Research Unit</h6>
                    </div>
                    <div class='col-lg-9 border-top border-2'>
                        <p class='my-3'><?php echo htmlspecialchars($fileInfo['research_unit']) ?></p>
                    </div>
                    <?php if (!empty($fileInfo['research_course'])) : ?>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Course</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'><?php echo htmlspecialchars($fileInfo['research_course']) ?></p>
                        </div>
                    <?php endif; ?>
                    <div class='col-lg-3 border-top border-2'>
                        <h6 class='fw-bold my-3'>Research Field</h6>
                    </div>
                    <div class='col-lg-9 border-top border-2'>
                        <p class='my-3'><?php echo htmlspecialchars($fileInfo['research_fields']) ?></p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>