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
        <div class="col my-3 mx-1">
            <form action="../../process/get-submissions.php" method="POST">
                <div class="input-group">
                    <input type="search" class="form-control form-search rounded-0" aria-label="Search the repository" aria-describedby="button-addon2" placeholder="Search submissions">
                    <button class="btn btn-primary search-button btn-lg rounded-0" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div id="results-container">

        </div>
        <div id="pending-results-container" > PENDING</div>
        <div id="revision-results-container"hidden> For Revision</div>
        <div id="revised-results-container"hidden> Revised</div>
        <div id="published-results-container"hidden> Published</div>
        <div id="submissions-results-container"hidden> All Submissions</div>




    </div>
</div>