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

                <div class='col-lg-9 col-md-12 col-xs-12 mx-auto main-column my-2'>

                    <div class='row'>
                    <div class='col-sm-12 d-sm-block d-md-none text-center'>
                        <img src='../../../assets/images/dump/u135.svg' width='150'>
                        </div>
                        <div class='col'>
                        <h2>{$fileInfo['journal_title']}</h2>
                        <h5 class='mb-3'>{$fileInfo['journal_subtitle']}</h5>
                        <p class='fw-bold'>{$fileInfo['chief_editor_last_name']}, {$fileInfo['chief_editor_first_name'][0]}.";
echo "<p class='fw-bold'>Volume 11 Series of 2019</p>
                        <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                        <hr class='my-3'>
                        </div>
                        <div class='col-lg-2 d-none d-md-block text-center'>
                        <img src='../../../assets/images/dump/u135.svg' width='150'>
                        </div>
                    </div>

                    

                    <h3 class='mt-3'>Description</h3>
                    <p>{$fileInfo['journal_description']}</p>

                    <div class='row my-4'>
                        <label class='fw-bold mb-3'>Attached Files</label>
                        <div class='col'>
                            <button class='btn button-file'><i class='far fa-file-pdf me-2'></i> File name.pdf</button>
                        </div>
                    </div>

                    <div class='row my-5'>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Resource Type</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>Journal</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Volume Number</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['volume_number']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Serial Issue Number</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['serial_issue_number']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>ISSN</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['ISSN']}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>";
