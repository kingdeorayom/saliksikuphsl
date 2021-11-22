<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="mySubmissionsPanel">
    <div class="submissions">
        <h1 class="my-2 p-2 fw-bold" style="background-color: gainsboro;">Submissions</h1>
        <div class="pendingApproval my-3">
            <h4 class="fw-bold">Pending approval</h4>
            <hr class="my-4">
            <p>list of pending approvals here</p>
            <p>list of pending approvals here</p>
            <p>list of pending approvals here</p>
        </div>
        <div class="forRevision my-3">
            <h4 class="fw-bold">For revision</h4>
            <hr class="my-4">
            <p>list of for revisions here</p>
            <p>list of for revisions here</p>
            <p>list of for revisions here</p>
        </div>
    </div>
    <div class="published">
        <h1 class="my-2 p-2 fw-bold" style="background-color: gainsboro;">Published Works</h1>
        <div class="publishedWorks my-3">
            <hr class="my-4">
            <p>list of published works here</p>
            <p>list of published works here</p>
            <p>list of published works here</p>
            <p>list of published works here</p>
        </div>
    </div>
</div>