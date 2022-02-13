<?php

session_start();       

                
                
if (!isset($_SESSION['isLoggedIn'])) {
    echo '<div style="font-family: arial; padding: 3%; font-size: 30px; text-align: center;">
    <p style="font-size: 50px; font-weight: bold">Oops!</p>
    <p>If you are seeing this message, it means you accessed a page outside of the normal process intended by the developers.</p>
    <p>Please click <a href="../../../../index.php">here</a> to return to the login page, or to the homepage if already logged in.</p>
    <br><br><br>
    <p style="font-size: 20px; color: grey;">SALIKSIK: UPHSL Research Repository</p>
</div>';
    die();
    // echo '<a href="../../../../index.php">go back to login page</a><br><br>';
    // die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Approval</title>
    <!-- jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const queryId = urlParams.get('id');

            checkFileInfo().then((item)=>{
               const fileInfo = JSON.parse(item);

               const thesisPanel = document.getElementById("thesisDissertationPanel")
               const journalPanel = document.getElementById("researchJournalPanel")
               const infographicsPanel = document.getElementById("infographicsPanel")

            if(fileInfo!== null){ //checks if file exists
                if(fileInfo["status"]==="pending"){ // checks if file status matches pending
                    if(fileInfo["file_type"]==="thesis"){
                        thesisPanel.hidden=false;
                        journalPanel.hidden=true;
                        infographicsPanel.hidden=true;
                        thesisFill(fileInfo)
                        }
                    else if(fileInfo["file_type"]=="journal"){
                        thesisPanel.hidden=true;
                        journalPanel.hidden=false;
                        infographicsPanel.hidden=true;
                        journalFill(fileInfo);
                        }
                    else if (fileInfo["file_type"]=="infographic"){
                        thesisPanel.hidden=true;
                        journalPanel.hidden=true;
                        infographicsPanel.hidden=false;
                        infographicFill(fileInfo)
                        }
                }
                else{
                // file status does not match expected status
                }
            }
            else{
                // file does not exist

            }
        })
            function checkFileInfo(){
                return new Promise(function(resolve,reject){
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET","../../../../src/process/get-file.php?id="+queryId);

                    xhr.onload = () =>
                    xhr.status == 200
                        ? resolve(xhr.response)
                        : reject(Error(xhr.statusText));
                    xhr.send();
                })
            };
            function thesisFill(fileInfo){
                console.log(fileInfo);
                const thesisInputs = document.querySelector('[name="thesis-form"]').elements;
                thesisInputs[0].value = fileInfo.resource_type;
                thesisInputs[1].value = fileInfo.researchers_category;
                thesisInputs[2].value = fileInfo.research_unit;
                thesisInputs[3].value = fileInfo.research_title;
                thesisInputs[4].value = fileInfo.author_first_name;
                thesisInputs[5].value = fileInfo.author_middle_initial;
                thesisInputs[6].value = fileInfo.author_surname;
                thesisInputs[7].value = fileInfo.author_name_ext;
                thesisInputs[8].value = fileInfo.author_email;
                thesisInputs[9].value = fileInfo.publication_month
                thesisInputs[10].value = fileInfo.publication_day
                thesisInputs[11].value = fileInfo.publication_year
                thesisInputs[12].value = fileInfo.coauthors_count
                thesisInputs[13].value = fileInfo.coauthor1_first_name
                thesisInputs[14].value = fileInfo.coauthor1_middle_initial
                thesisInputs[15].value = fileInfo.coauthor1_surname
                thesisInputs[16].value = fileInfo.coauthor1_name_ext
                thesisInputs[17].value = fileInfo.coauthor1_email
                
                thesisInputs[18].value = fileInfo.coauthor2_first_name
                thesisInputs[19].value = fileInfo.coauthor2_middle_initial
                thesisInputs[20].value = fileInfo.coauthor2_surname
                thesisInputs[21].value = fileInfo.coauthor2_name_ext
                thesisInputs[22].value = fileInfo.coauthor2_email

                thesisInputs[23].value = fileInfo.coauthor3_first_name
                thesisInputs[24].value = fileInfo.coauthor3_middle_initial
                thesisInputs[25].value = fileInfo.coauthor3_surname
                thesisInputs[26].value = fileInfo.coauthor3_name_ext
                thesisInputs[27].value = fileInfo.coauthor3_email

                thesisInputs[28].value = fileInfo.coauthor4_first_name
                thesisInputs[29].value = fileInfo.coauthor4_middle_initial
                thesisInputs[30].value = fileInfo.coauthor4_surname
                thesisInputs[31].value = fileInfo.coauthor4_name_ext
                thesisInputs[32].value = fileInfo.coauthor4_email

                thesisInputs[33].value = fileInfo.research_abstract
                thesisInputs[34].value = fileInfo.keywords
                
                const fieldsString = fileInfo.research_fields
                const fieldsArray = fieldsString.split(',')
                console.log(fieldsArray)

                const fieldsInput = document.getElementsByName("researchFields[]")
                console.log(fieldsInput)
                
                for(var key in fieldsInput){
                    if(fieldsInput.hasOwnProperty(key)){
                        for(var val in fieldsArray){
                            if(fieldsInput[key].value===fieldsArray[val].trim()){
                            fieldsInput[key].checked=true;
                            }
                        }
                    }
                }







            }
            function journalFill(fileInfo){
                const journalInputs = document.querySelector('[name="journal-form"]').elements;
                document.querySelector('[name="journal-form"]').dataset.id=fileInfo.file_id
                journalInputs[0].value= fileInfo.journal_title
                journalInputs[1].value= fileInfo.journal_subtitle
                journalInputs[2].value= fileInfo.department
                journalInputs[3].value= fileInfo.volume_number
                journalInputs[4].value= fileInfo.serial_issue_number
                journalInputs[5].value= fileInfo.ISSN
                journalInputs[6].value= fileInfo.chief_editor_first_name
                journalInputs[7].value= fileInfo.chief_editor_middle_initial
                journalInputs[8].value= fileInfo.chief_editor_last_name
                journalInputs[9].value= fileInfo.chief_editor_name_ext
                journalInputs[10].value= fileInfo.chief_editor_email
                journalInputs[11].value= fileInfo.journal_description

                const authorSubmitted = document.getElementsByName("author-submitted")
                authorSubmitted[0].innerText = fileInfo.file_uploader;
                authorSubmitted[1].innerText = fileInfo.file_uploader;

                const dateSubmitted = document.getElementsByName("date-submitted")
                // dateSubmitted[0].innerText = fileInfo.file_uploader;
                // dateSubmitted[1].innerText = fileInfo.file_uploader;

                // journalTitleField.value= fileInfo.journal_title;
                const journalCover = document.querySelector("#journal-cover");
                const journalCoverName = fileInfo.file_name.split(".pdf")
                journalCover.innerHTML = journalCoverName[0] +".jpg"

                const journalFileName = document.querySelector("#journal-file-name");
                
                console.log(fileInfo.file_name.split(".pdf"));
                journalFileName.innerHTML = fileInfo.file_name;
            }
            function infographicFill(fileInfo){
                const infographicInputs = document.querySelector('[name="infographic-form"]').elements

                infographicInputs[0].value = fileInfo.infographic_research_unit
                infographicInputs[1].value = fileInfo.infographic_researcher_category
                infographicInputs[2].value = fileInfo.infographic_publication_month
                infographicInputs[3].value = fileInfo.infographic_publication_day
                infographicInputs[4].value = fileInfo.infographic_publication_year
                infographicInputs[5].value = fileInfo.infographic_title
                infographicInputs[6].value = fileInfo.author_first_name
                infographicInputs[7].value = fileInfo.author_middle_initial
                infographicInputs[8].value = fileInfo.author_surname
                infographicInputs[9].value = fileInfo.author_ext
                infographicInputs[10].value = fileInfo.author_email
                infographicInputs[11].value = fileInfo.editor_first_name
                infographicInputs[12].value = fileInfo.editor_middle_initial
                infographicInputs[13].value = fileInfo.editor_surname
                infographicInputs[14].value = fileInfo.editor_ext
                infographicInputs[15].value = fileInfo.editor_email
                infographicInputs[16].value = fileInfo.coauthors_count

                infographicInputs[17].value = fileInfo.coauthor1_first_name
                infographicInputs[18].value = fileInfo.coauthor1_middle_initial
                infographicInputs[19].value = fileInfo.coauthor1_surname
                infographicInputs[20].value = fileInfo.coauthor1_name_ext
                infographicInputs[21].value = fileInfo.coauthor1_email

                infographicInputs[22].value = fileInfo.coauthor2_first_name
                infographicInputs[23].value = fileInfo.coauthor2_middle_initial
                infographicInputs[24].value = fileInfo.coauthor2_surname
                infographicInputs[25].value = fileInfo.coauthor2_name_ext
                infographicInputs[26].value = fileInfo.coauthor2_email

                infographicInputs[27].value = fileInfo.coauthor3_first_name
                infographicInputs[28].value = fileInfo.coauthor3_middle_initial
                infographicInputs[29].value = fileInfo.coauthor3_surname
                infographicInputs[30].value = fileInfo.coauthor3_name_ext
                infographicInputs[31].value = fileInfo.coauthor3_email

                infographicInputs[32].value = fileInfo.coauthor4_first_name
                infographicInputs[33].value = fileInfo.coauthor4_middle_initial
                infographicInputs[34].value = fileInfo.coauthor4_surname
                infographicInputs[35].value = fileInfo.coauthor4_name_ext
                infographicInputs[36].value = fileInfo.coauthor4_email

                infographicInputs[37].value = fileInfo.infographic_description

                const infographicFileName = document.querySelector("#infographic-file-name")
                infographicFileName.innerHTML = fileInfo.file_name
            }
    });
  
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../../styles/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../../../../styles/custom/main-style.css" type="text/css">
    <link rel="stylesheet" href="../../../../styles/custom/pages/submission-forms-style.css" type="text/css">
</head>


<body>

    <!--Header and Navigation section-->

    <?php include_once './extra-header-footer/header.php' ?>

    <section class="submit-research" style="font-family: 'Roboto';">
        <div class="container p-5">
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
                
                <?php include_once './view-approval-forms/thesisDissertationPanel.php' ?>
                <?php include_once './view-approval-forms/researchJournalPanel.php' ?>
                <?php include_once './view-approval-forms/infographicsPanel.php' ?>


            </div>
        </div>
    </section>

    <!--Footer-->

    <?php include_once './extra-header-footer/footer.php' ?>
    <script src="https://kit.fontawesome.com/dab8986b00.js" crossorigin="anonymous"></script>
    <script src="../../../../scripts/bootstrap/bootstrap.js"></script>
</body>

</html>