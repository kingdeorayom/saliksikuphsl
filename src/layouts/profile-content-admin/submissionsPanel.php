<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="submissionsPanel">
    <h1 class="my-2 p-2" style="background-color: gainsboro;">Submissions</h1>
    <hr class="my-4">
    <div class="row fw-bold p-3 text-light text-center d-flex justify-content-center">
        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="pending-container">
            <p>FOR APPROVAL</p>
            <h1 class="display-4" >0</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="revision-container">
            <p>FOR REVISION</p>
            <h1 class="display-4" >0</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="revised-container">
            <p>REVISED</p>
            <h1 class="display-4" >0</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="published-container">
            <p>PUBLISHED</p>
            <h1 class="display-4" >0</h1>
        </div>
        <div class="col py-3 mx-1 my-1 adminPageCountColumn" id="submissions-container">
            <p>ALL SUBMISSIONS</p>
            <h1 class="display-4" >0</h1>
        </div>
    </div>

    <div class="row">
        <div class="col my-1 mx-1">
            <form action="">
                <div class="input-group">
                    <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions" id="search-submissions-admin">
                    <button class="btn text-light search-button btn-lg rounded-0" type="" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-sm-12 col-md-4">
            <label class="fw-bold">View:</label>
            <select class="form-select rounded-0 my-2" aria-label="Default select example" id="submission-status-dropdown">
                <option value="pending" selected>For Approval</option>
                <option value="for revision">For Revision</option>
                <option value="revised">Revised</option>
                <option value="published">Published</option>
                <option value="submissions">All Submissions</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-4">
            <label class="fw-bold">Sort by:</label>
            <select class="form-select rounded-0 my-2" aria-label="Default select example" id ="submission-category-dropdown">
                <option selected>All category</option>
                <option>Resource Type</option>
                <option>Research Unit</option>
                <option>Researcher's Category</option>
            </select>
        </div>
    </div>
    <div class="row my-4">

        <!--For Approval-->

        <div class="forApproval my-3"  id="pending-results-container">
            <h5>For Approval</h5>
            <hr class="mb-4">
            <!-- results-container shows "No Results!" or something when empty -->
            <div class = "results-container" hidden><div>No Results!</div></div>
        </div>

        <!--For Revision-->

        <div class="forRevision my-3" id="revision-results-container" hidden>
            <h5>For Revision</h5>
            <hr class="mb-4">
            <!-- results-container shows "No Results!" or something when empty -->
            <div class = "results-container" hidden><div>No Results!</div></div>
        </div>

        <!--Revised-->

        <div class="revised my-3" id="revised-results-container" hidden>
            <h5>Revised</h5>
            <hr class="mb-4">
            <!-- results-container shows "No Results!" or something when empty -->
            <div class = "results-container" hidden><div>No Results!</div></div>
        </div>

        <!--Published-->

        <div class="published my-3" id="published-results-container" hidden>
            <h5>Published</h5>
            <hr class="mb-4">
            <!-- results-container shows "No Results!" or something when empty -->
            <div class = "results-container" hidden><div>No Results!</div></div>
        </div>

    </div>
</div>

<script>
    document.querySelector('body').addEventListener('click',function(event){
        if(event.target.className === 'btn text-light rounded-0 mt-3 submission-link-button'){
            console.log('make ajax call here?')
            console.log(event.target.dataset.id)
            window.location.href="../../layouts/profile-content-admin/submissions/view-approval.php"
        }
    })
</script>