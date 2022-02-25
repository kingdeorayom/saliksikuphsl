<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>
<div class="row my-3 d-lg-none">
                <h5>Submission Details</h5>
                <hr>
                <p class="side-menu-text">Submitted by:</p>
                <p class="side-menu-text" name="author-submitted">Juan Dela Cruz</p>
                <hr>
                <p class="side-menu-text">Submitted on:</p>
                <p class="side-menu-text" name="date-submitted">2021-11-17 08:52:03</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-2 d-none d-md-none d-lg-block">
                    <!--col-md-12 to stack on top of next column. remove display-none-->
                    <h5>Submission Details</h5>
                    <hr>
                    <p class="side-menu-text">Submitted by:</p>
                    <p class="side-menu-text" name="author-submitted">Juan Dela Cruz</p>
                    <hr>
                    <p class="side-menu-text">Submitted on:</p>
                    <p class="side-menu-text" name="date-submitted">2021-11-17 08:52:03</p>
                    <hr>
</div>
<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="infographicsPanel">

    <!-- container for alert messages -->
    <div id='alert-container-infographic'>

    </div>
    <!-- container for alert messages -->
    <h1 class="my-2">File Upload Information</h1>
    <hr>
    <form onsubmit="submitFormInfographic(event)" name="infographic-form" data-id="<?php echo $fileInfo['file_id']?>" data-coauthor_id="<?= $fileInfo['coauthor_group_id'] ?>">
        <div class="row">
            <div class="col-lg-3">
                <label class="py-2 fw-bold">Research Unit<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownResearchUnit">
                <?php foreach($department_list as $key=>$row): ?>
                    <option value = "<?php echo $row['name'] ?>" <?=$fileInfo['infographic_research_unit']==$row['name']? 'selected':''?>><?php echo $row['name'] ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="col-lg-3 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Researcher's Category<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-3 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownResearchersCategory">
                <option value="Undergraduate" <?=$fileInfo['infographic_researcher_category']=='Undergraduate'? 'selected' :''?>>Undergraduate</option>
                    <option value="Postgraduate" <?=$fileInfo['infographic_researcher_category']=='Postgraduate'? 'selected' :''?>>Postgraduate</option>
                    <option value="Faculty" <?=$fileInfo['infographic_researcher_category']=='Faculty'? 'selected' :''?>>Faculty</option>
                    <option value="Non_teaching_staff" <?=$fileInfo['infographic_researcher_category']=='Non_teaching_staff'? 'selected' :''?>>Non-teaching Staff</option>
                    <option value="School_head" <?=$fileInfo['infographic_researcher_category']=='School_head'? 'selected' :''?>>School Head</option>
                </select>
            </div>
            <div class="col-lg-3 d-sm-block d-lg-none">
                <label class="py-2 fw-bold">Publication Date<span class="text-danger"> *</span></label>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationMonth" id="info-month-picker" onchange="changeInputInfo()">
                    <!-- <option value="" selected>Month</option> -->
                    <option value=1 selected>January</option>
                    <option value=2>February</option>
                    <option value=3>March</option>
                    <option value=4>April</option>
                    <option value=5>May</option>
                    <option value=6>June</option>
                    <option value=7>July</option>
                    <option value=8>August</option>
                    <option value=9>September</option>
                    <option value=10>October</option>
                    <option value=11>November</option>
                    <option value=12>December</option>
                </select>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationDay" id="info-day-picker">
                    <!-- <option value="" selected>Day</option> -->
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <select class="form-select" aria-label="Default select example" name="dropdownPublicationYear" id="info-year-picker" onchange="changeInputInfo()" required>
                    <!-- <option value="" selected>Year</option> -->
                    <option value="2022">2022</option>
                    <option value="2021" selected>2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                </select>
            </div>
        </div>
        <div class="row my-2">
            <div>
                <label class="fw-bold">Title/Topic<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldInfographicsTitle" value = "<?php echo $fileInfo['infographic_title']?>" required>
            </div>
        </div>
        <div class="row my-2">
            <label class="py-2 fw-bold">Corresponding Author<span class="text-danger"> *</span></label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorFirstName" placeholder="First Name*" value = "<?php echo $fileInfo['author_first_name']?>" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorMiddleInitial" placeholder="Middle Initial" value = "<?php echo $fileInfo['author_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorLastName" placeholder="Surname*" value = "<?php echo $fileInfo['author_surname']?>" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldAuthorNameExtension" placeholder="Extension" value = "<?php echo $fileInfo['author_ext']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmail" value = "<?php echo $fileInfo['author_email']?>" required>
                <label class="text-secondary my-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row my-2">
            <label class="py-2 fw-bold">Graphics Editor<span class="text-danger"> *</span></label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorFirstName" placeholder="First Name*" value = "<?php echo $fileInfo['editor_first_name']?>" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorMiddleInitial" placeholder="Middle Initial" value = "<?php echo $fileInfo['editor_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorLastName" placeholder="Surname*" value = "<?php echo $fileInfo['editor_surname']?>" required>
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldGraphicsEditorNameExtension" placeholder="Extension" value = "<?php echo $fileInfo['editor_ext']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldGraphicsEditorEmail" value = "<?php echo $fileInfo['editor_email']?>" required>
                <label class="text-secondary my-2">Consider your active email address</label>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-4 col-sm-12">
                <label class="fw-bold">No. of Co-Authors</label>
                <select id="dropdownInfographicsCoAuthors" class="form-select my-3" aria-label="Default select example" name="dropdownCoAuthors" onchange="showInfographicsCoAuthorsField();" required>
                    <option value=0 <?=$fileInfo['coauthors_count']==0?'selected':'' ?>>0</option>
                    <option value=1 <?=$fileInfo['coauthors_count']==1?'selected':'' ?>>1</option>
                    <option value=2 <?=$fileInfo['coauthors_count']==2?'selected':'' ?>>2</option>
                    <option value=3 <?=$fileInfo['coauthors_count']==3?'selected':'' ?>>3</option>
                    <option value=4 <?=$fileInfo['coauthors_count']==4?'selected':'' ?>>4</option>
                </select>
                <label class="text-secondary">Max 4 co-authors allowed</label>
            </div>
        </div>
        <div class="row" id="co-author-1-info-panel" <?=$fileInfo['coauthors_count']>=1 ?'':'style="display: none;"' ?>>
            <label class="py-2 fw-bold">Co-Author 1</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor1" placeholder="First Name*" value ="<?php echo $fileInfo['coauthor1_first_name']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor1" placeholder="Middle Initial" value ="<?php echo $fileInfo['coauthor1_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor1" placeholder="Surname*" value ="<?php echo $fileInfo['coauthor1_surname']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor1" placeholder="Extension" value ="<?php echo $fileInfo['coauthor1_name_ext']?>">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor1" value ="<?php echo $fileInfo['coauthor1_email']?>">
            </div>
        </div>
        <div class="row" id="co-author-2-info-panel" <?=$fileInfo['coauthors_count']>=2 ?'':'style="display: none;"' ?>>
            <label class="py-2 fw-bold">Co-Author 2</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor2" placeholder="First Name*" value ="<?php echo $fileInfo['coauthor2_first_name']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor2" placeholder="Middle Initial" value ="<?php echo $fileInfo['coauthor2_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor2" placeholder="Surname*" value ="<?php echo $fileInfo['coauthor2_surname']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor2" placeholder="Extension" value ="<?php echo $fileInfo['coauthor2_name_ext']?>">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor2" value ="<?php echo $fileInfo['coauthor2_email']?>">
            </div>
        </div>
        <div class="row" id="co-author-3-info-panel" <?=$fileInfo['coauthors_count']>=3 ?'':'style="display: none;"' ?>>
            <label class="py-2 fw-bold">Co-Author 3</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor3" placeholder="First Name*" value ="<?php echo $fileInfo['coauthor3_first_name']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor3" placeholder="Middle Initial" value ="<?php echo $fileInfo['coauthor3_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor3" placeholder="Surname*"  value ="<?php echo $fileInfo['coauthor3_surname']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor3" placeholder="Extension"  value ="<?php echo $fileInfo['coauthor3_name_ext']?>">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor3"  value ="<?php echo $fileInfo['coauthor3_email']?>">
            </div>
        </div>
        <div class="row" id="co-author-4-info-panel" <?=$fileInfo['coauthors_count']>=4 ?'':'style="display: none;"' ?>>
            <label class="py-2 fw-bold">Co-Author 4</label>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldFirstNameCoAuthor4" placeholder="First Name*" value ="<?php echo $fileInfo['coauthor4_first_name']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldMiddleInitialCoAuthor4" placeholder="Middle Initial" value ="<?php echo $fileInfo['coauthor4_middle_initial']?>">
            </div>
            <div class="col-lg-4 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldLastNameCoAuthor4" placeholder="Surname*" value ="<?php echo $fileInfo['coauthor4_surname']?>">
            </div>
            <div class="col-lg-2 col-sm-12 py-2">
                <input type="text" class="form-control" name="textFieldNameExtCoAuthor4" placeholder="Extension" value ="<?php echo $fileInfo['coauthor4_name_ext']?>">
            </div>
            <div class="col-lg-6 col-sm-12 my-2">
                <label class="fw-bold">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="textFieldEmailAuthor4" value ="<?php echo $fileInfo['coauthor4_email']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label fw-bold">Description<span class="text-danger"> *</span></label>
                    <textarea class="form-control" name="textareaDescription" rows="10" required><?php echo $fileInfo['infographic_description']?></textarea>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <label class="fw-bold mb-3">Attached Files</label>
            <div class="col">
                <label class="my-2" id="infographic-file-name">Infographic.pdf</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Show in Repository</label>
                </div>
            </div>
        </div>
        <hr>

        <div class="row" id="publishButtonInfographics">
            <div class="col">
                <input type="submit" class="btn btn-primary button-submit-research rounded-0" value="Edit" id="submitInfographicsButton">
            </div>
        </div>

    </form>
</div>
<script src="../../../scripts/custom/info-calendar-date-picker.js"></script>

<script>
    var alertContainerInfographic = document.getElementById("alert-container-infographic")
    var infographicsForm = document.forms.namedItem("infographic-form");

    function submitFormInfographic(event) {
        event.preventDefault();
        const fileId = event.target.dataset.id
        const authorGroupId = event.target.dataset.coauthor_id
        
        
        var formdata = new FormData(infographicsForm);

        formdata.append("fileId",fileId);
        formdata.append("coauthor_id",authorGroupId);
        postInfographic(formdata).then(data => checkResponseInfographic(JSON.parse(data)));
        //     for (var pair of formdata.entries()) {
        //     console.log(pair[0]+ ', ' + pair[1]); 
        // }
        window.scrollTo(0, 0);
    }

    function postInfographic(data) {
        return new Promise((resolve, reject) => {
            var http = new XMLHttpRequest();
            http.open("POST", "../../process/update-file.php");
            http.onload = () => http.status == 200 ? resolve(http.response) : reject(Error(http.statusText));
            http.onerror = (e) => reject(Error(`Networking error: ${e}`));
            http.send(data);

        });
    }

    function checkResponseInfographic(data) {
        if (data.response === "type_error") {
            alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is in <strong>PDF</strong> format, or that the file to be uploaded is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }
        if (data.response === "generic_error") {
            alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> Check to make sure the file is <strong>less than 10 MB</strong> or that the file to be submitted is attached.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }
        if (data.response === "size_error") {
            alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> The file size is too large. The maximum allowed size is 10 MB.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }
        if (data.response === "duplicate_error") {
            alertContainerInfographic.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert" id = "file-type-alert"><strong>File upload failed!</strong> There is already a file with the same name uploaded to the database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }
        if (data.response === "success") {
            form.reset();
            alertContainerInfographic.innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>File upload success!</strong> Wait for your submission to be approved by the administration. You can view the submission status by checking My Submissions under My Profile.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
        }

    }
</script>