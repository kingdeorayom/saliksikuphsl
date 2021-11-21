<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back to login page</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="mySubmissionsPanel">
    <h1 class="my-2">Submissions</h1>
    <div class="row">
        <hr class="my-4">
    </div>
</div>