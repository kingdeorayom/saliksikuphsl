<?php

if (!isset($_SESSION['isLoggedIn'])) {
    echo '<a href="../../../index.php">go back</a><br><br>';
    die('If you are seeing this message, it means you accessed this page outside of the normal process intended by the developers.<br>Please click the link above to return to the login page, or to the homepage if already logged in.');
}

?>

<div class="col-lg-10 px-5 col-md-12 col-xs-12 main-column" id="accountPreferencePanel">
    <div class="submissions">
        <h1 class="my-2 p-2 fw-bold" style="background-color: gainsboro;">Account Preference</h1>
    </div>
</div>