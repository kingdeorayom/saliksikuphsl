<?php echo "<section class='submit-research' style='font-family: 'Roboto';'>
        <div class='container p-5'>

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
                    <h2>{$fileInfo['research_title']}</h2>
                    <hr class='my-4'>
                    <p class='fw-bold'>{$fileInfo['author_surname']}, {$fileInfo['author_first_name'][0]}.";
                    for($i=1;$i<=$fileInfo['coauthors_count'];$i++){
                        echo ", {$fileInfo["coauthor{$i}_surname"]}, {$fileInfo["coauthor{$i}_first_name"][0]}.";
                    }
                    echo "<p>{$fileInfo['publication_year']}, {$fileInfo['publication_month']} {$fileInfo['publication_day']}</p>
                    <p class='bookmark'><i class='far fa-bookmark me-2'></i> Add to Bookmarks</p>
                    <h3 class='mt-5'>Abstract</h3>
                    <p>{$fileInfo['research_abstract']}</p>
                    <p class='fw-bold'>Keywords: </p>
                    <p class='fst-italic'>{$fileInfo['keywords']}</p>

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
                            <p class='my-3'>{$fileInfo['resource_type']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Researcher's Category</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['researchers_category']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Unit</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['research_unit']}</p>
                        </div>
                        <div class='col-lg-3 border-top border-2'>
                            <h6 class='fw-bold my-3'>Research Field</h6>
                        </div>
                        <div class='col-lg-9 border-top border-2'>
                            <p class='my-3'>{$fileInfo['research_fields']}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>"
?>