<?php echo "<section class='submit-research' style=\"font-family: 'Roboto';\">
        <div class='container p-5'>
        <div class=\"row my-3\">
        <nav style=\"--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);\" aria-label=\"breadcrumb\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item prev-dir-breadcrumb\"><a href=\"../../pages/navigation/repository.php\" style=\"color: #012265; text-decoration:none\">Repository</a></li>
                <li class=\"breadcrumb-item active active-dir-breadcrumb\" aria-current=\"page\">View Article</li>
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

                <div class='col-lg-10 col-md-12 col-xs-12 main-column'>
                    <h2>{$fileInfo['infographic_title']}</h2>
                    <hr class='my-4'>
                    <p class='fw-bold'>{$fileInfo['author_surname']}, {$fileInfo['author_first_name'][0]}.";
for ($i = 1; $i <= $fileInfo['coauthors_count']; $i++) {
    echo ", {$fileInfo["coauthor{$i}_surname"]}, {$fileInfo["coauthor{$i}_first_name"][0]}.";
}
echo "<p>{$fileInfo['infographic_publication_year']}, {$fileInfo['infographic_publication_month']} {$fileInfo['infographic_publication_day']}</p>
                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                    <h3 class='mt-5'>Abstract</h3>
                    <p>{$fileInfo['infographic_description']}</p>

                    <div class='row my-4'>
                        <label class='fw-bold mb-3'>Attached Files</label>
                        <div class='col'>
                            <button class='btn btn-danger'>File 1.pdf</button>
                            <button class='btn btn-danger'>File 2.png</button>
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
                            <h6 class='fw-bold my-3'>Researcher's Category</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['infographic_researcher_category']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Unit</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['infographic_research_unit']}</p>
                        </div>
                        
                    </div>

                </div>

            </div>

        </div>
    </section>";
